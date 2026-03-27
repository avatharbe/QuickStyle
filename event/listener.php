<?php
/**
 *
 * @package QuickStyle
 * @copyright (c) 2015 PayBas
 * @copyright (c) 2026 Avathar
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * Based on the original Prime Quick Style by Ken F. Innes IV (primehalo)
 *
 */

namespace avathar\quickstyle\event;

use phpbb\auth\auth;
use phpbb\config\config;
use phpbb\db\driver\driver_interface;
use phpbb\request\request_interface;
use phpbb\template\template;
use phpbb\user;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use phpbb\language\language;

/**
 * Class listener
 *
 * @package avathar\quickstyle\event
 */
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\request\request_interface */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string PHP extension */
	protected $phpEx;

	/** @var bool */
	protected $enabled;

	/** @var int */
	protected $default_loc;

	/** @var \phpbb\language\language */
	protected $language;

	/**
	 * listener constructor.
	 *
	 * @param \phpbb\auth\auth                 $auth
	 * @param \phpbb\config\config              $config
	 * @param \phpbb\language\language          $language
	 * @param \phpbb\db\driver\driver_interface $db
	 * @param \phpbb\request\request_interface  $request
	 * @param \phpbb\template\template          $template
	 * @param \phpbb\user                       $user
	 * @param                                   $root_path
	 * @param                                   $phpEx
	 */
	public function __construct(auth $auth, config $config, language $language, driver_interface $db,
			request_interface $request, template $template, user $user, $root_path, $phpEx)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->language = $language;
		$this->db = $db;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->root_path = $root_path;
		$this->phpEx = $phpEx;

		// Setup the common settings
		$this->enabled = !$config['override_user_style'];
		$this->default_loc = (int) ($config['quickstyle_default_loc'] ?? 1);
	}

	/**
	 * @return array
	 */
	public static function getSubscribedEvents(): array
	{
		return array(
			'core.page_header_after'         => 'select_style_form',
			'core.ucp_display_module_before' => 'switch_style',
			'core.user_setup'                => 'set_guest_style',
			'core.permissions'               => 'add_permissions',
		);
	}

	/**
	 * Register extension permissions
	 * @param \phpbb\event\data $event
	 */
	public function add_permissions($event)
	{
		$permissions = $event['permissions'];
		$permissions['u_quickstyle'] = array('lang' => 'ACL_U_QUICKSTYLE', 'cat' => 'misc');
		$event['permissions'] = $permissions;
	}

	/**
	 * handler for core.page_header_after
	 * Assign the style switcher form variables
	 */
	public function select_style_form()
	{
		if ($this->enabled && $this->auth->acl_get('u_quickstyle'))
		{
			$current_style = ($this->user->data['is_registered']) ? (int) $this->user->data['user_style'] : (int) $this->request_cookie('style', $this->user->data['user_style']);

			// Query active styles
			$sql = 'SELECT style_id, style_name FROM ' . STYLES_TABLE . ' WHERE style_active = 1 ORDER BY style_name ASC';
			$result = $this->db->sql_query($sql);
			$styles = array();
			while ($row = $this->db->sql_fetchrow($result))
			{
				$styles[] = $row;
			}
			$this->db->sql_freeresult($result);

			if (count($styles) > 1)
			{
				$this->language->add_lang('quickstyle', 'avathar/quickstyle');

				if ($this->user->data['is_registered'])
				{
					$redirect = 'redirect=' . urlencode(str_replace(array('&amp;', '../'), array('&', ''), build_url('style')));
					$base_action = append_sid("{$this->root_path}ucp.$this->phpEx", 'i=prefs&amp;mode=personal&amp;' . $redirect);
					$base_action = preg_replace('/(?:&amp;|(\?))style=[^&]*(?(1)&amp;|)?/i', "$1", $base_action);
				}
				else
				{
					$base_action = build_url(array('quick_style', 'style'));
					$base_action .= (strpos($base_action, '?') === false) ? '?' : '&amp;';
					$base_action .= 'quick_style=';
				}

				$current_style_name = '';
				foreach ($styles as $style)
				{
					$is_current = ((int) $style['style_id'] === $current_style);
					if ($is_current)
					{
						$current_style_name = $style['style_name'];
					}

					$this->template->assign_block_vars('quickstyle', array(
						'STYLE_ID'   => $style['style_id'],
						'STYLE_NAME' => $style['style_name'],
						'S_CURRENT'  => $is_current,
						'U_ACTION'   => $this->user->data['is_registered']
						? $base_action . '&amp;quick_style=' . $style['style_id']
						: $base_action . $style['style_id'],
					));
				}

				$this->template->assign_vars(array(
					'S_QUICK_STYLE_SHOW'        => true,
					'QUICK_STYLE_CURRENT_NAME'  => $current_style_name,
					'S_QUICK_STYLE_DEFAULT_LOC' => $this->default_loc,
				));
			}
		}
	}

	/**
	 * handler for core.ucp_display_module_before
	 * The UCP event is only triggered when the user is logged in, so we have to set the guest cookie using some other event
	 */
	public function switch_style()
	{
		$style = $this->request->variable('quick_style', 0);
		if ($this->enabled && $style)
		{
			$style = ($this->config['override_user_style']) ? (int) $this->config['default_style'] : (int) $style;

			if ($this->is_valid_style($style))
			{
				$sql = 'UPDATE ' . USERS_TABLE . ' SET user_style = ' . $style . ' WHERE user_id = ' . (int) $this->user->data['user_id'];
				$this->db->sql_query($sql);
			}

			// Redirect the user back to their last viewed page (non-AJAX requests)
			$redirect = urldecode($this->request->variable('redirect', $this->user->data['session_page']));
			$redirect = reapply_sid($redirect);
			redirect($redirect);
		}
	}

	/**
	 * handler for core.user_setup
	 * Handle style switching by guests (not logged in visitors)
	 * @param $event
	 */
	public function set_guest_style($event)
	{
		if ($this->enabled && (int) $this->user->data['user_id'] === ANONYMOUS)
		{
			// Apply cookie style if no style_id already set
			if (!$event['style_id'])
			{
				$cookie_style = (int) $this->request_cookie('style', 0);
				if ($cookie_style && $this->is_valid_style($cookie_style))
				{
					$event['style_id'] = $cookie_style;
				}
			}

			// Set the cookie (and redirect) when the style is switched
			$style = $this->request->variable('quick_style', 0);
			if ($style)
			{
				$style = ($this->config['override_user_style']) ? (int) $this->config['default_style'] : (int) $style;

				if ($this->is_valid_style($style))
				{
					$this->user->set_cookie('style', $style, 0);
				}

				// Redirect the user back to their last viewed page (non-AJAX requests)
				$redirect = urldecode($this->request->variable('redirect', $this->user->data['session_page']));
				$redirect = reapply_sid($redirect);
				redirect($redirect);
			}
		}
	}

	/**
	 * Check if a style ID corresponds to an active style
	 *
	 * @param int $style_id
	 * @return bool
	 */
	private function is_valid_style(int $style_id): bool
	{
		$sql = 'SELECT style_id FROM ' . STYLES_TABLE . ' WHERE style_id = ' . $style_id . ' AND style_active = 1';
		$result = $this->db->sql_query($sql);
		$valid = (bool) $this->db->sql_fetchfield('style_id');
		$this->db->sql_freeresult($result);
		return $valid;
	}

	/**
	 * @param      $name
	 * @param null $default
	 * @return mixed
	 */
	private function request_cookie($name, $default = null)
	{
		$name = $this->config['cookie_name'] . '_' . $name;
		return $this->request->variable($name, $default, false, 3);
	}
}
