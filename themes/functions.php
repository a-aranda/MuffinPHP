<?php
/**
 * Helpers for theming, available for all themes in their template files and functions.php.
 * This file is included right before the themes own functions.php
 */
 

/**
 * Print debuginformation from the framework.
 */
function get_debug() {
  // Only if debug is wanted.
  $muff = CMuffinPHP::Instance();  
  if(empty($muff->config['debug'])) {
    return;
  }
  
  // Get the debug output
  $html = null;
  if(isset($muff->config['debug']['db-num-queries']) && $muff->config['debug']['db-num-queries'] && isset($muff->db)) {
    $flash = $muff->session->GetFlash('database_numQueries');
    $flash = $flash ? "$flash + " : null;
    $html .= "<p>Database made $flash" . $muff->db->GetNumQueries() . " queries.</p>";
  }    
  if(isset($muff->config['debug']['db-queries']) && $muff->config['debug']['db-queries'] && isset($muff->db)) {
    $flash = $muff->session->GetFlash('database_queries');
    $queries = $muff->db->GetQueries();
    if($flash) {
      $queries = array_merge($flash, $queries);
    }
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $queries) . "</pre>";
  }    
  if(isset($muff->config['debug']['timer']) && $muff->config['debug']['timer']) {
    $html .= "<p>Page was loaded in " . round(microtime(true) - $muff->timer['first'], 5)*1000 . " msecs.</p>";
  }    
  if(isset($muff->config['debug']['muffin']) && $muff->config['debug']['muffin']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CMuffinPHP:</p><pre>" . htmlent(print_r($muff, true)) . "</pre>";
  }    
  if(isset($muff->config['debug']['session']) && $muff->config['debug']['session']) {
    $html .= "<hr><h3>SESSION</h3><p>The content of CMuffinPHP->session:</p><pre>" . htmlent(print_r($muff->session, true)) . "</pre>";
    $html .= "<p>The content of \$_SESSION:</p><pre>" . htmlent(print_r($_SESSION, true)) . "</pre>";
  }    
  return $html;
}


/**
 * Get messages stored in flash-session.
 */
function get_messages_from_session() {
  $messages = CMuffinPHP::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
}


/**
 * Login menu. Creates a menu which reflects if user is logged in or not.
 */
function login_menu() {
  $muff = CMuffinPHP::Instance();
  if($muff->user['isAuthenticated']) {
    $items = "<a href='" . create_url('user/profile') . "'>" . $muff->user['acronym'] . "</a> ";
    if($muff->user['hasRoleAdministrator']) {
      $items .= "<a href='" . create_url('acp') . "'>acp</a> ";
    }
    $items .= "<a href='" . create_url('user/logout') . "'>logout</a> ";
  } else {
    $items = "<a href='" . create_url('user/login') . "'>login</a> ";
  }
  return "<nav>$items</nav>";
}


/**
 * Prepend the base_url.
 */
function base_url($url=null) {
  return CMuffinPHP::Instance()->request->base_url . trim($url, '/');
}


/**
 * Create a url to an internal resource.
 *
 * @param string the whole url or the controller. Leave empty for current controller.
 * @param string the method when specifying controller as first argument, else leave empty.
 * @param string the extra arguments to the method, leave empty if not using method.
 */
function create_url($urlOrController=null, $method=null, $arguments=null) {
  return CMuffinPHP::Instance()->request->CreateUrl($urlOrController, $method, $arguments);
}


/**
 * Prepend the theme_url, which is the url to the current theme directory.
 */
function theme_url($url) {
  $muff = CMuffinPHP::Instance();
  return "{$muff->request->base_url}themes/{$muff->config['theme']['name']}/{$url}";
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