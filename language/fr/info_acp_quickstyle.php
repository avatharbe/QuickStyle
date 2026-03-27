<?php
/**
 *
 * @package Quick Style
 * French translation by Galixte (http://www.galixte.com)
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
	'AV_QUICK_STYLE'						=> 'Style rapide',
	'AV_QUICK_STYLE_EXPLAIN'				=> 'Ajoute un menu déroulant en haut de chaque page pour changer de style. Cette extension est basée sur le MOD original « Prime Quick Style » créé par primehalo.',
	'AV_QUICK_STYLE_SETTINGS'				=> 'Paramètres du style rapide',
	'AV_QUICK_STYLE_DEFAULT_LOC'			=> 'Utiliser l&#039;emplacement par défaut du style',
	'AV_QUICK_STYLE_DEFAULT_LOC_EXPLAIN'	=> 'Par défaut, l&#039;extension style rapide positionne le menu déroulant de changement de style en haut de la page à droite de la barre de navigation après le fil d&#039;Ariane. Paramétrer sur « Non » permettra de placer quickstyle_event à un autre endroit dans votre style.',
	'AV_QUICK_STYLE_PERMISSION_EXPLAIN'	=> 'L&#039;accès au changement de style est contrôlé par la permission <strong>Peut utiliser Quick Style</strong>. Configurez-la dans Administration &raquo; Permissions &raquo; Permissions des utilisateurs ou des groupes.',
	'AV_QUICK_STYLE_OVERRIDE_ENABLED'		=> 'Le paramètre « Annuler le style de l&#039;utilisateur » est activé sur ce forum. Le changement de style ne fonctionnera pas jusqu&#039;à ce que vous le désactiviez.',

	'ACL_U_QUICKSTYLE'					=> 'Peut utiliser Quick Style',
));
