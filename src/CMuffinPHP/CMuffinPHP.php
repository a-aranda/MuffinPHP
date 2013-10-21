<?php 
/**
* Main class for MuffinPHP, holds everything.
*
* @package CMuffinPHP Core
*/
class CMuffinPHP implements ISingleton {

   private static $instance = null;

   /**
    * Singleton pattern. Get the instance of the latest created object or create a new one.
    * @return CMuffinPHP The instance of this class.
    */
   public static function Instance() {
      if(self::$instance == null) {
         self::$instance = new CMuffinPHP();
      }
      return self::$instance;
   }

/**
* Constructor
*/
protected function __construct() {
  // include the site specific config.php and create a ref to $muff to be used by config.php
  $muff = &$this;
  require(MUFFINPHP_SITE_PATH.'/config.php');
   
  // Create a database object.
  if(isset($this->config['database'][0]['dsn'])) {
      $this->db = new CDatabase($this->config['database'][0]['dsn']);
  }

  // Create a container for all views and theme data
  $this->views = new CViewContainer();

  // Set default date/time-zone
  date_default_timezone_set($this->config['timezone']);

  // Start a named session
  session_name($this->config['session_name']);
  session_start();
  $this->session = new CSession($this->config['session_key']);
  $this->session->PopulateFromSession();
  
  // Create a object for the user 
  $this->user = new CMUser($this);
}

/**
* Frontcontroller, check url and route to controllers.
*/
public function FrontControllerRoute() {
  // Step 1
  // Take current url and divide it in controller, method and parameters
  $this->request = new CRequest(); 
  $this->request->Init($this->config['base_url']); 
  $controller = $this->request->controller; 
  $method = $this->request->method; 
  $method = str_replace(array('_', '-'), '', $method); //accepts - and _ in links
  $arguments = $this->request->arguments;
  
  //check that the controller exists in the php config
  $controllerExists = isset($this->config['controllers'][$controller]);
  $controllerEnabled = false; $className = false; $classExists = false; //Initializing to false

  //In case it exists, then obtain the basic data from the controller
  if($controllerExists) { 
    $controllerEnabled = ($this->config['controllers'][$controller]['enabled'] == true); 
    $className = $this->config['controllers'][$controller]['class']; 
    $classExists = class_exists($className); 
  }
  // Step 2
  // Check if there is a callable method in the controller class, if then call it
  // Check if controller has a callable method in the controller class, if then call it 
  if($controllerExists && $controllerEnabled && $classExists) {
    $rc = new ReflectionClass($className);
    if($rc->implementsInterface('IController')) {
      if($rc->hasMethod($method)) {
        $controllerObj = $rc->newInstance();
        $methodObj = $rc->getMethod($method);
        $methodObj->invokeArgs($controllerObj, $arguments);
      } else {
        die("404. " . get_class() . ' error: Controller does not contain method.');
      }
    } else {
      die('404. ' . get_class() . ' error: Controller does not implement interface IController.');
    }
  }
  else {
    die('404. Page is not found.');
  }

}
  /**
    * ThemeEngineRender, renders the reply of the request to HTML or whatever.
    */
  public function ThemeEngineRender() {
    // Save to session before output anything
    $this->session->StoreInSession();

    // Is theme enabled?
    if(!isset($this->config['theme'])) {
      return;
    }
    
    // Get the paths and settings for the theme
    $themeName  = $this->config['theme']['name'];
    $themePath  = MUFFINPHP_INSTALL_PATH . "/themes/{$themeName}";
    $themeUrl   = $this->request->base_url . "themes/{$themeName}";
    
    // Add stylesheet path to the $muff->data array
    $this->data['stylesheet'] = "{$themeUrl}/".$this->config['theme']['stylesheet'];

    // Include the global functions.php and the functions.php that are part of the theme
    $muff = &$this;
    include(MUFFINPHP_INSTALL_PATH . '/themes/functions.php');
    $functionsPath = "{$themePath}/functions.php";
    if(is_file($functionsPath)) { //it might not exist because is not the core of the framework
      include $functionsPath;
    }
    // Extract $muff->data and $muff->view->data to own variables and handover to the template file
    extract($this->data);     
    extract($this->views->GetData());     
    $templateFile = (isset($this->config['theme']['template_file'])) ? $this->config['theme']['template_file'] : 'default.tpl.php'; 
    include("{$themePath}/{$templateFile}"); 
  }

}