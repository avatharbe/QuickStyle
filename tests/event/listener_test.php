<?php
/**
 *
 * @package Quick Style
 * @copyright (c) 2026 Avathar
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace avathar\quickstyle\tests\event;

/**
 * Class listener_test
 * Unit tests for the Quick Style event listener
 *
 * @package avathar\quickstyle\tests\event
 */
class listener_test extends \phpbb_test_case
{
	/** @var \phpbb\auth\auth|\PHPUnit\Framework\MockObject\MockObject */
	protected $auth;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\language\language|\PHPUnit\Framework\MockObject\MockObject */
	protected $language;

	/** @var \phpbb\db\driver\driver_interface|\PHPUnit\Framework\MockObject\MockObject */
	protected $db;

	/** @var \phpbb\request\request_interface|\PHPUnit\Framework\MockObject\MockObject */
	protected $request;

	/** @var \phpbb\template\template|\PHPUnit\Framework\MockObject\MockObject */
	protected $template;

	/** @var \phpbb\user|\PHPUnit\Framework\MockObject\MockObject */
	protected $user;

	/** @var \avathar\quickstyle\event\listener */
	protected $listener;

	/**
	 * Set up test dependencies
	 *
	 * Initialises mocks for all listener constructor arguments and
	 * configures a default registered-user session.
	 *
	 * @return void
	 */
	public function setUp(): void
	{
		parent::setUp();

		global $phpbb_path_helper;
		$phpbb_path_helper = $this->getMockBuilder('\phpbb\path_helper')
			->disableOriginalConstructor()
			->getMock();
		$phpbb_path_helper->method('get_valid_page')
			->willReturn('index.php');

		$this->auth = $this->createMock('\phpbb\auth\auth');
		$this->config = new \phpbb\config\config(array(
			'override_user_style'   => 0,
			'quickstyle_default_loc' => 1,
			'cookie_name'           => 'phpbb3',
			'default_style'         => 1,
		));
		$this->language = $this->createMock('\phpbb\language\language');
		$this->db = $this->createMock('\phpbb\db\driver\driver_interface');
		$this->request = $this->createMock('\phpbb\request\request_interface');
		$this->template = $this->createMock('\phpbb\template\template');
		$this->user = $this->getMockBuilder('\phpbb\user')
			->disableOriginalConstructor()
			->getMock();
		$this->user->data = array(
			'user_id'       => 2,
			'is_registered' => true,
			'user_style'    => 1,
			'session_page'  => 'index.php',
		);
		$this->user->page = array(
			'page_name' => 'index.php',
			'page'      => 'index.php',
			'root_script_path' => '/',
			'script_path' => '/',
			'query_string' => '',
		);
	}

	/**
	 * Instantiate the listener under test with current mocks/config
	 *
	 * @return void
	 */
	protected function set_listener()
	{
		$this->listener = new \avathar\quickstyle\event\listener(
			$this->auth,
			$this->config,
			$this->language,
			$this->db,
			$this->request,
			$this->template,
			$this->user,
			'./phpBB/',
			'php'
		);
	}

	/**
	 * Test that the listener subscribes to the expected phpBB events
	 *
	 * @return void
	 */
	public function test_getSubscribedEvents()
	{
		$this->assertEquals(array(
			'core.page_header_after',
			'core.ucp_display_module_before',
			'core.user_setup',
			'core.permissions',
		), array_keys(\avathar\quickstyle\event\listener::getSubscribedEvents()));
	}

	/**
	 * Test that the style selector is disabled when override_user_style is active
	 *
	 * When the board forces a single style, the listener should skip
	 * all ACL checks and produce no template output.
	 *
	 * @return void
	 */
	public function test_construct_disabled_when_override()
	{
		$this->config['override_user_style'] = 1;
		$this->auth->expects($this->never())
			->method('acl_get');

		$this->set_listener();
		$this->listener->select_style_form();
	}

	/**
	 * Test that the quickstyle_default_loc config value is passed to the template
	 *
	 * Verifies that the S_QUICK_STYLE_DEFAULT_LOC template variable reflects
	 * the configured location (0 = custom event, 1 = breadcrumb area).
	 *
	 * @return void
	 */
	public function test_construct_reads_default_loc()
	{
		$this->config['quickstyle_default_loc'] = 0;
		$this->auth->method('acl_get')
			->willReturn(true);

		// With default_loc = 0 (custom), the template should still receive the value
		$this->db->method('sql_query')->willReturn(true);
		$this->db->method('sql_fetchrow')
			->willReturnOnConsecutiveCalls(
				array('style_id' => 1, 'style_name' => 'prosilver'),
				array('style_id' => 2, 'style_name' => 'subsilver2'),
				false
			);
		$this->db->method('sql_freeresult');

		$this->template->expects($this->once())
			->method('assign_vars')
			->with($this->callback(function ($vars) {
				return $vars['S_QUICK_STYLE_DEFAULT_LOC'] === 0;
			}));

		$this->set_listener();
		$this->listener->select_style_form();
	}

	/**
	 * Test that the u_quickstyle permission is registered in the misc category
	 *
	 * @return void
	 */
	public function test_add_permissions()
	{
		$this->set_listener();

		$event = new \phpbb\event\data(array(
			'permissions' => array(),
		));

		$this->listener->add_permissions($event);

		$this->assertArrayHasKey('u_quickstyle', $event['permissions']);
		$this->assertEquals(array('lang' => 'ACL_U_QUICKSTYLE', 'cat' => 'misc'), $event['permissions']['u_quickstyle']);
	}

	/**
	 * Test that the style selector is hidden when the user lacks u_quickstyle permission
	 *
	 * @return void
	 */
	public function test_select_style_form_no_permission()
	{
		$this->auth->method('acl_get')
			->with('u_quickstyle')
			->willReturn(false);

		$this->template->expects($this->never())
			->method('assign_vars');

		$this->set_listener();
		$this->listener->select_style_form();
	}

	/**
	 * Test that the dropdown is not rendered when only one style is active
	 *
	 * A single-style board has no reason to show a switcher.
	 *
	 * @return void
	 */
	public function test_select_style_form_single_style_hidden()
	{
		$this->auth->method('acl_get')
			->willReturn(true);

		// Only one style — dropdown should not be shown
		$this->db->method('sql_query')->willReturn(true);
		$this->db->method('sql_fetchrow')
			->willReturnOnConsecutiveCalls(
				array('style_id' => 1, 'style_name' => 'prosilver'),
				false
			);
		$this->db->method('sql_freeresult');

		$this->template->expects($this->never())
			->method('assign_vars');

		$this->set_listener();
		$this->listener->select_style_form();
	}

	/**
	 * Test that the dropdown is rendered correctly with multiple active styles
	 *
	 * Verifies that:
	 * - the language file is loaded
	 * - one block var is assigned per style
	 * - the S_QUICK_STYLE_SHOW flag is true
	 * - the current style name is set
	 * - the default location value is passed through
	 *
	 * @return void
	 */
	public function test_select_style_form_multiple_styles()
	{
		$this->auth->method('acl_get')
			->willReturn(true);

		$this->db->method('sql_query')->willReturn(true);
		$this->db->method('sql_fetchrow')
			->willReturnOnConsecutiveCalls(
				array('style_id' => 1, 'style_name' => 'prosilver'),
				array('style_id' => 2, 'style_name' => 'subsilver2'),
				false
			);
		$this->db->method('sql_freeresult');

		$this->language->expects($this->once())
			->method('add_lang')
			->with('quickstyle', 'avathar/quickstyle');

		$this->template->expects($this->exactly(2))
			->method('assign_block_vars')
			->with('quickstyle', $this->isType('array'));

		$this->template->expects($this->once())
			->method('assign_vars')
			->with($this->callback(function ($vars) {
				return $vars['S_QUICK_STYLE_SHOW'] === true
					&& $vars['QUICK_STYLE_CURRENT_NAME'] === 'prosilver'
					&& $vars['S_QUICK_STYLE_DEFAULT_LOC'] === 1;
			}));

		$this->set_listener();
		$this->listener->select_style_form();
	}

	/**
	 * Test that set_guest_style does nothing for logged-in users
	 *
	 * The guest cookie logic must only apply to ANONYMOUS sessions.
	 *
	 * @return void
	 */
	public function test_set_guest_style_ignores_registered_user()
	{
		$this->user->data['user_id'] = 2;

		// Should not read any cookie for registered users
		$this->request->expects($this->never())
			->method('variable');

		$this->set_listener();

		$event = new \phpbb\event\data(array(
			'style_id' => 0,
		));

		$this->listener->set_guest_style($event);
		$this->assertEquals(0, $event['style_id']);
	}

	/**
	 * Test that set_guest_style reads the cookie and applies a valid style for guests
	 *
	 * @dataProvider guest_cookie_data
	 *
	 * @param int  $cookie_style      Style ID from the cookie (0 = no cookie)
	 * @param bool $style_valid       Whether the style ID exists and is active
	 * @param int  $expected_style_id Expected style_id after the event handler runs
	 *
	 * @return void
	 */
	public function test_set_guest_style_applies_cookie($cookie_style, $style_valid, $expected_style_id)
	{
		if (!defined('ANONYMOUS'))
		{
			define('ANONYMOUS', 1);
		}

		$this->user->data['user_id'] = ANONYMOUS;

		$this->request->method('variable')
			->willReturnMap(array(
				array('phpbb3_style', 0, false, \phpbb\request\request_interface::COOKIE, $cookie_style),
				array('quick_style', 0, false, \phpbb\request\request_interface::REQUEST, 0),
			));

		if ($cookie_style)
		{
			$this->db->method('sql_query')->willReturn(true);
			$this->db->method('sql_fetchfield')
				->willReturn($style_valid ? $cookie_style : false);
			$this->db->method('sql_freeresult');
		}

		$this->set_listener();

		$event = new \phpbb\event\data(array(
			'style_id' => 0,
		));

		$this->listener->set_guest_style($event);
		$this->assertEquals($expected_style_id, $event['style_id']);
	}

	/**
	 * Data provider for test_set_guest_style_applies_cookie
	 *
	 * @return array[] Each case: [cookie_style, style_valid, expected_style_id]
	 */
	public function guest_cookie_data(): array
	{
		return array(
			'no cookie'      => array(0, false, 0),
			'valid cookie'   => array(3, true, 3),
			'invalid cookie' => array(99, false, 0),
		);
	}
}
