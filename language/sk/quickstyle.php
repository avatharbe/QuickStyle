<?php
/**
 *
 * @package Quick Style
 * Slovak translation
 *
 * @copyright (c) 2015 PayBas
 * @copyright (c) 2026 Avathar
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * Based on the original Prime Quick Style by Ken F. Innes IV (primehalo)
 *
 */

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'QUICK_STYLE'	=> 'Styl',

	// is_enableable() error messages
	'QUICKSTYLE_PHP_VERSION_FAIL'	=> 'Toto rozšírenie vyžaduje PHP %1$s alebo novší. Používate PHP %2$s.',
	'QUICKSTYLE_PHPBB_VERSION_FAIL'	=> 'Toto rozšírenie vyžaduje phpBB %1$s alebo novší. Používate phpBB %2$s.',
));
