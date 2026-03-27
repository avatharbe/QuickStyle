<?php
/**
 *
 * @package Quick Style
 * Spanish translation by Raul [ThE KuKa] (www.phpbb-es.com)
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
	'AV_QUICK_STYLE'						=> 'Estilo Rápido',
	'AV_QUICK_STYLE_EXPLAIN'				=> 'Añade un cuadro de estilo desplegable a la cabecera de cada página para cambiar rápidamente de estilos. Basado en el original de Prime Quick Style por primehalo.',
	'AV_QUICK_STYLE_SETTINGS'				=> 'Ajustes de Estilo Rápido',
	'AV_QUICK_STYLE_DEFAULT_LOC'			=> 'Usar ubicación por defecto de plantilla',
	'AV_QUICK_STYLE_DEFAULT_LOC_EXPLAIN'	=> 'Por defecto, la extensión Estilo Rápido insertará el conmutador de estilo a la derecha de la ruta de navegación en la cabecera. Al establecer esto como “no“, le permitirá incluir el quickstyle_event en otra parte de su estilo.',
	'AV_QUICK_STYLE_PERMISSION_EXPLAIN'	=> 'El acceso al selector de estilos se controla mediante el permiso <strong>Puede usar Quick Style</strong>. Configurelo en Administracion &raquo; Permisos &raquo; Permisos de usuarios o de grupos.',
	'AV_QUICK_STYLE_OVERRIDE_ENABLED'		=> 'La configuracion “Anular estilo del usuario” esta habilitada en este foro. El selector de estilos no funcionara hasta que la desactive.',

	'ACL_U_QUICKSTYLE'					=> 'Puede usar Quick Style',
));
