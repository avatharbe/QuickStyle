<?php
/**
 *
 * @package Quick Style
 * @copyright (c) 2015 PayBas
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * Based on the original Prime Quick Style by Ken F. Innes IV (primehalo)
 *
 */

namespace avathar\quickstyle\migrations;

use phpbb\db\migration\migration;

/**
 * Class release_2_0_0
 *
 * @package avathar\quickstyle\migrations
 */
class release_2_0_0 extends migration
{

	/**
	 * @return bool
	 */
	public function effectively_installed(): bool
	{
		return isset($this->config['quickstyle_version']) && version_compare($this->config['quickstyle_version'], '2.0.0', '>=');
	}

	/**
	 * @return array
	 */
	public function update_data(): array
	{
		return array(
			// Config
			array('config.add', array('quickstyle_version', '2.0.0')),
			array('config.add', array('quickstyle_default_loc', '1')),

			// ACP module
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'QUICK_STYLE'
			)),

			array('module.add', array(
				'acp',
				'QUICK_STYLE',
				array(
					'module_basename'	=> '\avathar\quickstyle\acp\quickstyle_module',
					'modes'				=> array('settings'),
				),
			)),

			// User permission
			array('permission.add', array('u_quickstyle', true)),

			// Enable by default for everyone
			array('permission.permission_set', array('REGISTERED', 'u_quickstyle', 'group')),
			array('permission.permission_set', array('GUESTS', 'u_quickstyle', 'group')),
		);
	}
}
