<?php
/**
 *
 * @package Quick Style
 * Swedish translation
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
	'AV_QUICK_STYLE'						=> 'Snabbt stilbyte',
	'AV_QUICK_STYLE_EXPLAIN'				=> 'Lagger till en rullgardinsmeny for stilar i sidhuvudet pa varje sida for att snabbt vaxla mellan stilar. Baserad pa originalet Prime Quick Style av primehalo.',
	'AV_QUICK_STYLE_SETTINGS'				=> 'Installningar for snabbt stilbyte',
	'AV_QUICK_STYLE_DEFAULT_LOC'			=> 'Anvand standardplacering for mall',
	'AV_QUICK_STYLE_DEFAULT_LOC_EXPLAIN'	=> 'Som standard placerar tillaget Quick Style stilvalaren till hoger om brodsmulenavigationen i sidhuvudet. Om du staller in detta pa "nej" kan du inkludera quickstyle_event nagon annanstans i din stil.',
	'AV_QUICK_STYLE_PERMISSION_EXPLAIN'	=> 'Atkomst till stilvalaren styrs av ratttigheten <strong>Kan anvanda Quick Style</strong>. Konfigurera den under Administration &raquo; Rattigheter &raquo; Anvandardens eller gruppens rattigheter.',
	'AV_QUICK_STYLE_OVERRIDE_ENABLED'		=> 'Installningen "Avsidosatt anvandardens stil" ar aktiverad pa detta forum. Stilvalaren fungerar inte forran du inaktiverar den.',

	'ACL_U_QUICKSTYLE'					=> 'Kan anvanda Quick Style',
));
