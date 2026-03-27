<?php
/**
 *
 * @package Quick Style
 * Portuguese translation
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
	'QUICK_STYLE'						=> 'Mudanca rapida de estilo',
	'QUICK_STYLE_EXPLAIN'				=> 'Adiciona uma caixa suspensa de estilos ao cabecalho de cada pagina para alternar rapidamente entre estilos. Baseado no original Prime Quick Style por primehalo.',
	'QUICK_STYLE_SETTINGS'				=> 'Configuracoes de mudanca rapida de estilo',
	'QUICK_STYLE_DEFAULT_LOC'			=> 'Usar localizacao padrao do template',
	'QUICK_STYLE_DEFAULT_LOC_EXPLAIN'	=> 'Por padrao, a extensao Quick Style insere o seletor de estilos a direita da navegacao breadcrumb no cabecalho. Definir como "nao" permitira incluir o quickstyle_event em outro lugar no seu estilo.',
	'QUICK_STYLE_PERMISSION_EXPLAIN'	=> 'O acesso ao seletor de estilos e controlado pela permissao <strong>Pode usar Quick Style</strong>. Configure-a em Administracao &raquo; Permissoes &raquo; Permissoes de utilizadores ou grupos.',
	'QUICK_STYLE_OVERRIDE_ENABLED'		=> 'A configuracao "Substituir estilo do usuario" esta ativada neste forum. O seletor de estilos nao funcionara ate que voce a desative.',

	'ACL_U_QUICKSTYLE'					=> 'Pode usar Quick Style',
));
