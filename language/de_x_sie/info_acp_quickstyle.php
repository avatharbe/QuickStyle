<?php
/**
 *
 * @package Quick Style
 * German (formal) translation
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
	'AV_QUICK_STYLE'						=> 'Schneller Stilwechsel',
	'AV_QUICK_STYLE_EXPLAIN'				=> 'Fuegt ein Stil-Dropdown in die Kopfzeile jeder Seite ein, um schnell zwischen Stilen zu wechseln. Basierend auf dem originalen Prime Quick Style von primehalo.',
	'AV_QUICK_STYLE_SETTINGS'				=> 'Schneller Stilwechsel Einstellungen',
	'AV_QUICK_STYLE_DEFAULT_LOC'			=> 'Standard-Template-Position verwenden',
	'AV_QUICK_STYLE_DEFAULT_LOC_EXPLAIN'	=> 'Standardmaessig fuegt die Erweiterung den Stilwechsler rechts neben der Breadcrumb-Navigation in der Kopfzeile ein. Wenn Sie dies auf "Nein" setzen, koennen Sie das quickstyle_event an einer anderen Stelle in Ihrem Stil einbinden.',
	'AV_QUICK_STYLE_PERMISSION_EXPLAIN'	=> 'Der Zugriff auf den Stilwechsler wird ueber die Berechtigung <strong>Kann Quick Style verwenden</strong> gesteuert. Konfigurieren Sie diese unter Administration &raquo; Berechtigungen &raquo; Benutzer- oder Gruppenberechtigungen.',
	'AV_QUICK_STYLE_OVERRIDE_ENABLED'		=> 'Die Einstellung "Benutzerstil ueberschreiben" ist auf diesem Board aktiviert. Der Stilwechsler funktioniert nicht, bis Sie diese Einstellung deaktivieren.',

	'ACL_U_QUICKSTYLE'					=> 'Kann Quick Style verwenden',
));
