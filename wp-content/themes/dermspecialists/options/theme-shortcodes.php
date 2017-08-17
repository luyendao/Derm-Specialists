<?php

add_shortcode('list', 'derms_list');
function derms_list($atts, $content = null) {

	return '<div class="list">' . $content . '<div class="cl">&nbsp;</div></div>';
}

add_shortcode('columns', 'derms_columns');
function derms_columns($atts, $content = null) {

	return '<div class="cols">' . do_shortcode($content) . '<div class="cl">&nbsp;</div></div>';
}

add_shortcode('twocolumns', 'derms_twocolumns');
function derms_twocolumns($atts, $content = null) {

	return '<div class="two-columns">' . do_shortcode($content) . '<div class="cl">&nbsp;</div></div>';
}

add_shortcode('column', 'derms_column');
function derms_column($atts, $content = null) {

	return '<div class="col">' . $content . '</div>';
}