<?php
/**
 *
 * @package Quick Style
 * Dutch translation by Dutch Translators (https://github.com/dutch-translators)
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

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'QUICK_STYLE'						=> 'Snelle Stijl',
	'QUICK_STYLE_EXPLAIN'				=> 'Deze extensie voegt een stijl dropdown box toe aan de header van elke pagina, zodat je snel van stijl kan wisselen. Gebaseerd op de originele “Prime Quick Style” van primehalo.',
	'QUICK_STYLE_SETTINGS'				=> 'Snelle Stijl instellingen',
	'QUICK_STYLE_DEFAULT_LOC'			=> 'Gebruik standaard template locatie',
	'QUICK_STYLE_DEFAULT_LOC_EXPLAIN'	=> 'Standaard zal de Snelle Stijl extensie de stijl-verwisselaar rechts van de broodkruimelnavigatie in de header plaatsen. Door deze optie op “nee“ in te stellen, geeft je de mogelijkheid om de quickstyle_event op een zelf uitgekozen plaats te plaatsen.',
	'QUICK_STYLE_PERMISSION_EXPLAIN'	=> 'Toegang tot de stijl-verwisselaar wordt beheerd via de <strong>Kan Quick Style gebruiken</strong> gebruikerspermissie. Configureer deze onder Beheer &raquo; Permissies &raquo; Gebruikers- of groepspermissies.',
	'QUICK_STYLE_OVERRIDE_ENABLED'		=> 'De “overschrijf gebruikersstijl” configuratie-instelling is ingeschakeld op dit forum. De stijl-verwisselaar zal niet werken totdat je deze instelling hebt uitgeschakeld.',

	'ACL_U_QUICKSTYLE'					=> 'Kan Quick Style gebruiken',
));
