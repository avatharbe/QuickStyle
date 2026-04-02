<?php
/**
 *
 * @package Quick Style
 * @copyright (c) 2015 PayBas
 * @copyright (c) 2026 Avathar
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * Based on the original Prime Quick Style by Ken F. Innes IV (primehalo)
 *
 */

namespace avathar\quickstyle\migrations;

use phpbb\db\migration\migration;

class release_2_0_1 extends migration
{
	public function effectively_installed(): bool
	{
		return isset($this->config['quickstyle_version']) && version_compare($this->config['quickstyle_version'], '2.0.1', '>=');
	}

	public static function depends_on(): array
	{
		return ['\avathar\quickstyle\migrations\release_2_0_0'];
	}

	public function update_data(): array
	{
		return [
			['config.update', ['quickstyle_version', '2.0.1']],
		];
	}
}
