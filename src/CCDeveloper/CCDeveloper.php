 <?php
/**
 * Controller for development and testing purpose, helpful methods for the developer.
 * 
 * @package MuffinPHP Core
 */
class CCDeveloper extends CObject implements IController {

  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
  }

  /**
    * Implementing interface IController. All controllers must have an index action.
   */
  public function Index() { 
    $this->Menu();
  }

  /**
    * Create some tests for internal testing and understanding of the framework
   */
  public function testing(){

  //testing functions
  //
  $dirfunc = dirname(__FILE__);
  $this->data['header'] = '<h1>Header: Lydia</h1>';
  $this->data['footer'] = '<p>Alvaro Aranda on MuffinPHP</p>';
  $this->data['main'] = <<<EOD
  <h2>Some private Testing</h2>
  <p>The directory of this file is this one: $dirfunc</p>
EOD;


  }

  /**
    * Create a list of links in the supported ways.
   */
  public function Links() {  
    $this->Menu();
    
    $url = 'developer/links';
    $current      = $this->request->CreateUrl($url);

    $this->request->cleanUrl = false;
    $this->request->querystringUrl = false;    
    $default      = $this->request->CreateUrl($url);
    
    $this->request->cleanUrl = true;
    $clean        = $this->request->CreateUrl($url);    
    
    $this->request->cleanUrl = false;
    $this->request->querystringUrl = true;    
    $querystring  = $this->request->CreateUrl($url);
    
    $this->data['main'] .= <<<EOD
<h2>CRequest::CreateUrl()</h2>
<p>Here is a list of urls created using above method with various settings. All links should lead to
this same page.</p>
<ul>
<li><a href='$current'>This is the current setting</a>
<li><a href='$default'>This would be the default url</a>
<li><a href='$clean'>This should be a clean url</a>
<li><a href='$querystring'>This should be a querystring like url</a>
</ul>
<p>Enables various and flexible url-strategy.</p>
EOD;
  }

  /**
    * Create a method that shows the menu, same for all methods
   */
private function Menu() {  
    
    $menu = array('developer', 'developer/index', 'developer/links','developer/displayobject','developer/display_object','developer/display-object');
    
    $html = null;
    foreach($menu as $val) {
      $html .= "<li><a href='" . $this->request->CreateUrl($val) . "'>$val</a>";  
    }
    
    $this->data['title'] = "The Developerr Controller";
    $this->data['header'] = '<h1>Header: Lydia</h1>';
    $this->data['footer'] = '<p>Alvaro Aranda on MuffinPHP</p>';
    $this->data['main'] = <<<EOD
<h1>The Developer Controller</h1>
<p>This is what you can do for now in kmom03</p>
<ul>
$html
</ul>
EOD;
  }

  /**
    * Display all items of the CObject.
  */
public function DisplayObject() {   
      $this->Menu();
      
      $this->data['main'] .= <<<EOD
<h2>Dumping content of CDeveloper</h2>
<p>Here is the content of the controller, including properties from CObject which holds access to common resources in CMuffinPHP.</p>
EOD;
      $this->data['main'] .= '<pre>' . htmlent(print_r($this, true)) . '</pre>';
   }
  
}