<?php
/**
 *
 * @package Quick Style
 * German translation
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
	'QUICK_STYLE'	=> 'Stil',

	// is_enableable() error messages
	'QUICKSTYLE_PHP_VERSION_FAIL'	=> 'Diese Erweiterung benötigt PHP %1$s oder höher. Du verwendest PHP %2$s.',
	'QUICKSTYLE_PHPBB_VERSION_FAIL'	=> 'Diese Erweiterung benötigt phpBB %1$s oder höher. Du verwendest phpBB %2$s.',
));
