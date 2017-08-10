<?php
function printVar( $variable, $title = "" )
{
  $var = print_r( $variable, true );
   echo "<textarea id='cerrarVar' style='background-color:rgba(0, 0, 0, 0.84);color:rgb(18, 182, 201);box-shadow: 7px 11px 14px rgba(0, 0, 0, 0.4); border: 1px solid rgb(153, 153, 153);position:absolute;top:0;padding:20px;left:0;width:343px;height:30px;'>[$title] $var </textarea>";
}


// ob_start() funcion de PHP para solucionar los problemas con los header();
ob_start();

// Omitimos todo tipo de msn de error generados por PHP.
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);

// Llamamo nuestros componentes.
require_once "models/model.php";
require_once "controllers/controller.php";
require_once "models/crud.php";

// Instanciamos el obj principal para cargar el template base.
$mvc = new MvcController();
$mvc -> template();

/*
 	Configuración sublimeText
{
	"bold_folder_labels": true,
	"color_scheme": "Packages/Boxy Theme/schemes/Boxy Nova.tmTheme",
	"fade_fold_buttons": false,
	"font_face": "verdana",
	"font_size": 11,
	"highlight_line": true,
	"highlight_modified_tabs": true,
	"ignored_packages":
	[
		"Markdown",
		"Vintage"
	],
	"line_padding_bottom": 3,
	"line_padding_top": 3,
	"material_theme_accent_indigo": true,
	"material_theme_contrast_mode": true,
	"material_theme_panel_separator": true,
	"material_theme_small_statusbar": true,
	"material_theme_tabs_autowidth": true,
	"overlay_scroll_bars": "enabled",
	"theme": "Material-Theme.sublime-theme",
	"theme_bar": true,
	"theme_bar_shadow_hidden": true,
	"theme_dirty_accent_lime": true,
	"theme_dirty_colored_always": true,
	"theme_dirty_materialized": true,
	"theme_sidebar_folder_materialized": true,
	"theme_sidebar_indent_md": true,
	"theme_sidebar_size_xs": true,
	"theme_tab_font_xs": true,
	"theme_tab_selected_label_bold": true,
	"theme_tab_selected_underlined": true,
	"theme_tab_size_sm": true,
	"trim_trailing_white_space_on_save": true,
	"ui_big_tabs": true,
	"ui_fix_tab_labels": true,
	"ui_font_size_small": true,
	"ui_font_source_code_pro": true,
	"ui_separator": true,
	"ui_wide_scrollbars": true,
	"wide_caret": true,
	"word_separators": "(./\\()\"':,.;<~!@#$%^&*|+=[]{}`~?)",
	"word_wrap": true
}
*/