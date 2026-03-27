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
	'AV_QUICK_STYLE'						=> 'Rychla zmena stylu',
	'AV_QUICK_STYLE_EXPLAIN'				=> 'Prida rozbalovaci ponuku stylov do hlavicky kazdej stranky na rychle prepinanie medzi stylmi. Zalozene na originalnom Prime Quick Style od primehalo.',
	'AV_QUICK_STYLE_SETTINGS'				=> 'Nastavenia rychlej zmeny stylu',
	'AV_QUICK_STYLE_DEFAULT_LOC'			=> 'Pouzit predvolene umiestnenie sablony',
	'AV_QUICK_STYLE_DEFAULT_LOC_EXPLAIN'	=> 'V predvolenom nastaveni rozsirenie Quick Style vlozi prepinac stylov napravo od drobcekovej navigacie v hlavicke. Nastavenim na "nie" mozete quickstyle_event umiestnit inde vo vasom style.',
	'AV_QUICK_STYLE_PERMISSION_EXPLAIN'	=> 'Pristup k prepinacu stylov je riadeny opravnenim <strong>Moze pouzivat Quick Style</strong>. Nastavte ho v Administracia &raquo; Opravnenia &raquo; Opravnenia uzivatelov alebo skupin.',
	'AV_QUICK_STYLE_OVERRIDE_ENABLED'		=> 'Na tomto fore je povolene nastavenie "Prepisat styl uzivatela". Prepinac stylov nebude fungovat, kym toto nastavenie nezakazete.',

	'ACL_U_QUICKSTYLE'					=> 'Moze pouzivat Quick Style',
));
