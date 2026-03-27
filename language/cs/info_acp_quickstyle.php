<?php
/**
 *
 * @package Quick Style
 * Czech translation
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
	'AV_QUICK_STYLE_EXPLAIN'				=> 'Prida rozbalovaci nabidku stylu do zahlavi kazde stranky pro rychle prepinani mezi styly. Zalozeno na originalnim Prime Quick Style od primehalo.',
	'AV_QUICK_STYLE_SETTINGS'				=> 'Nastaveni rychle zmeny stylu',
	'AV_QUICK_STYLE_DEFAULT_LOC'			=> 'Pouzit vychozi umisteni sablony',
	'AV_QUICK_STYLE_DEFAULT_LOC_EXPLAIN'	=> 'Ve vychozim nastaveni rozsireni Quick Style vlozi prepinac stylu napravo od drobeckove navigace v zahlavi. Nastavenim na "ne" muzete quickstyle_event umistit jinam ve svem stylu.',
	'AV_QUICK_STYLE_PERMISSION_EXPLAIN'	=> 'Pristup k prepinaci stylu je rizen opravnenim <strong>Muze pouzivat Quick Style</strong>. Nastavte ho v Administrace &raquo; Opravneni &raquo; Opravneni uzivatelu nebo skupin.',
	'AV_QUICK_STYLE_OVERRIDE_ENABLED'		=> 'Na tomto foru je povoleno nastaveni "Prepsat styl uzivatele". Prepinac stylu nebude fungovat, dokud toto nastaveni nezakazete.',

	'ACL_U_QUICKSTYLE'					=> 'Muze pouzivat Quick Style',
));
