<?php
/**
* To manage and analyse all modules of MuffinPHP.
* 
* @package MuffinPHP Core
*/
class CCModules extends CObject implements IController {

  /**
   * Constructor
   */
  public function __construct() { parent::__construct(); }


  /**
   * Show a index-page and display what can be done through this controller.
   */
  public function Index() {
    $modules = new CMModules();
    $controllers = $modules->AvailableControllers();
    $allModules = $modules->ReadAndAnalyse();
    $this->views->SetTitle('Manage Modules');
    $this->views->AddInclude(__DIR__ . '/index.tpl.php', array('controllers'=>$controllers), 'primary');
    $this->views->AddInclude(__DIR__ . '/sidebar.tpl.php', array('modules'=>$allModules), 'sidebar');
  }

   /**
   * Show a index-page and display what can be done through this controller.
   */
  public function Install() {
    $modules = new CMModules();
    $results = $modules->Install();
    $allModules = $modules->ReadAndAnalyse();
    $this->views->SetTitle('Install Modules');
    $this->views->AddInclude(__DIR__ . '/install.tpl.php', array('modules'=>$results), 'primary');
    $this->views->AddInclude(__DIR__ . '/sidebar.tpl.php', array('modules'=>$allModules), 'sidebar');
  }

}