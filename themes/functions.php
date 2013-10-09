<?php
/**
* Helpers for theming, available for all themes in their template files and functions.php.
* This file is included right before the themes own functions.php
*/

/**
* Create a url by prepending the base_url.
*/
function base_url($url) {
  return CMuffinPHP::Instance()->request->base_url . trim($url, '/');
}

/**
* Return the current url.
*/
function current_url() {
  return CMuffinPHP::Instance()->request->current_url;
}

/**
 * Render all views.
 */
function render_views() {
  return CMuffinPHP::Instance()->views->Render();
}

/**
 * Prepend the theme_url, which is the url to the current theme directory.
 */
function theme_url($url) {
  $ly = CLydia::Instance();
  return "{$ly->request->base_url}themes/{$ly->config['theme']['name']}/{$url}";
}