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

namespace avathar\quickstyle\acp;

/**
 * Class quickstyle_info
 *
 * @package avathar\quickstyle\acp
 */
class quickstyle_info
{
	/**
	 * @return array
	 */
	public function module()
	{
		return array(
			'filename'	=> '\avathar\quickstyle\acp\quickstyle_module',
			'title'		=> 'AV_QUICK_STYLE',
			'modes'		=> array(
				'settings'	=> array('title' => 'AV_QUICK_STYLE_SETTINGS', 'auth' => 'ext_avathar/quickstyle && acl_a_board', 'cat' => array('AV_QUICK_STYLE')),
			),
		);
	}
}
