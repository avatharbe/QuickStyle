<?php
/**
 *
 * @package Quick Style
 * Ukrainian translation
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
	'QUICK_STYLE'						=> 'Швидка змiна стилю',
	'QUICK_STYLE_EXPLAIN'				=> 'Додае випадаючий список стилiв у заголовок кожноi сторiнки для швидкого перемикання мiж стилями. На основi оригiнального Prime Quick Style вiд primehalo.',
	'QUICK_STYLE_SETTINGS'				=> 'Налаштування швидкоi змiни стилю',
	'QUICK_STYLE_DEFAULT_LOC'			=> 'Використовувати стандартне розташування шаблону',
	'QUICK_STYLE_DEFAULT_LOC_EXPLAIN'	=> 'За замовчуванням розширення Quick Style розмiщуе перемикач стилiв праворуч вiд навiгацii хлiбних крихт у заголовку. Якщо встановити "нi", можна включити quickstyle_event в iншому мiсцi вашого стилю.',
	'QUICK_STYLE_PERMISSION_EXPLAIN'	=> 'Доступ до перемикача стилiв контролюеться дозволом <strong>Може використовувати Quick Style</strong>. Налаштуйте його в Адмiнiстрування &raquo; Дозволи &raquo; Дозволи користувачiв або груп.',
	'QUICK_STYLE_OVERRIDE_ENABLED'		=> 'На цьому форумi увiмкнено налаштування "Перевизначити стиль користувача". Перемикач стилiв не працюватиме, поки ви не вимкнете це налаштування.',

	'ACL_U_QUICKSTYLE'					=> 'Може використовувати Quick Style',
));
