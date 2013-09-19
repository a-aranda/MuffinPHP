 <?php
/**
 * Controller for development and testing purpose, helpful methods for the developer.
 * 
 * @package MuffinPHP Core
 */
class CCDeveloper implements IController {

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
  $muff = CMuffinPHP::Instance();
  $dirfunc = dirname(__FILE__);
  $muff->data['header'] = '<h1>Header: Lydia</h1>';
  $muff->data['footer'] = '<p>Alvaro Aranda on MuffinPHP</p>';
  $muff->data['main'] = <<<EOD
  <h2>Some private Testing</h2>
  <p>The directory of this file is this one: $dirfunc</p>
EOD;


  }

  /**
    * Create a list of links in the supported ways.
   */
  public function Links() {  
    $this->Menu();
    
    $muff = CMuffinPHP::Instance();
    
    $url = 'developer/links';
    $current      = $muff->request->CreateUrl($url);

    $muff->request->cleanUrl = false;
    $muff->request->querystringUrl = false;    
    $default      = $muff->request->CreateUrl($url);
    
    $muff->request->cleanUrl = true;
    $clean        = $muff->request->CreateUrl($url);    
    
    $muff->request->cleanUrl = false;
    $muff->request->querystringUrl = true;    
    $querystring  = $muff->request->CreateUrl($url);
    
    $muff->data['main'] .= <<<EOD
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
    $muff = CMuffinPHP::Instance();
    $menu = array('developer', 'developer/index', 'developer/links');
    
    $html = null;
    foreach($menu as $val) {
      $html .= "<li><a href='" . $muff->request->CreateUrl($val) . "'>$val</a>";  
    }
    
    $muff->data['title'] = "The Developer Controller";
    $muff->data['header'] = '<h1>Header: Lydia</h1>';
    $muff->data['footer'] = '<p>Alvaro Aranda on MuffinPHP</p>';
    $muff->data['main'] = <<<EOD
<h1>The Developer Controller</h1>
<p>This is what you can do for now :)</p>
<ul>
$html
</ul>
EOD;
  }
  
}