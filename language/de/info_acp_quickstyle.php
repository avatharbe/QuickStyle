<?php
/**
 *
 * @package Quick Style
 * German translation
 *
 * @copyright (c) 2015 PayBas
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
	'QUICK_STYLE'						=> 'Schneller Stilwechsel',
	'QUICK_STYLE_EXPLAIN'				=> 'Fuegt ein Stil-Dropdown in die Kopfzeile jeder Seite ein, um schnell zwischen Stilen zu wechseln. Basierend auf dem originalen Prime Quick Style von primehalo.',
	'QUICK_STYLE_SETTINGS'				=> 'Schneller Stilwechsel Einstellungen',
	'QUICK_STYLE_DEFAULT_LOC'			=> 'Standard-Template-Position verwenden',
	'QUICK_STYLE_DEFAULT_LOC_EXPLAIN'	=> 'Standardmaessig fuegt die Erweiterung den Stilwechsler rechts neben der Breadcrumb-Navigation in der Kopfzeile ein. Wenn du dies auf "Nein" setzt, kannst du das quickstyle_event an einer anderen Stelle in deinem Stil einbinden.',
	'QUICK_STYLE_PERMISSION_EXPLAIN'	=> 'Der Zugriff auf den Stilwechsler wird ueber die Berechtigung <strong>Kann Quick Style verwenden</strong> gesteuert. Konfiguriere sie unter Administration &raquo; Berechtigungen &raquo; Benutzer- oder Gruppenberechtigungen.',
	'QUICK_STYLE_OVERRIDE_ENABLED'		=> 'Die Einstellung "Benutzerstil ueberschreiben" ist auf diesem Board aktiviert. Der Stilwechsler funktioniert nicht, bis du diese Einstellung deaktivierst.',

	'ACL_U_QUICKSTYLE'					=> 'Kann Quick Style verwenden',
));
