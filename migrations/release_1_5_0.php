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

namespace paybas\quickstyle\migrations;

use phpbb\db\migration\migration;

/**
 * Class release_1_5_0
 *
 * @package paybas\quickstyle\migrations
 */
class release_1_5_0 extends migration
{

	/**
	 * @return bool
	 */
	public function effectively_installed(): bool
	{
		return isset($this->config['quickstyle_version']) && version_compare($this->config['quickstyle_version'], '1.5.0', '>=');
	}

	/**
	 * @return array
	 */
	public static function depends_on(): array
	{
		return array(
			'\paybas\quickstyle\migrations\release_1_4_3',
		);
	}

	/**
	 * @return array
	 */
	public function update_data(): array
	{
		return array(
			array('config.update', array('quickstyle_version', '1.5.0')),
		);
	}
}
