<?php
/**
* Holding a instance of CMuffinPHP to enable use of $this in subclasses.
*
* @package MuffinPHP Core
*/
class CObject {

   /**
    * Members
    */
   public $config;
   public $request;
   public $data;
   public $db;
   public $views;
   public $session;
   

   /**
    * Constructor
    */
   protected function __construct() {
    $muff = CMuffinPHP::Instance();
    $this->config   = &$muff->config;
    $this->request  = &$muff->request;
    $this->data     = &$muff->data;
    $this->db       = &$muff->db;
    $this->views    = &$muff->views;
    $this->session  = &$muff->session;
  }

  /**
   * Redirect to another url and store the session
   */
  protected function RedirectTo($url) {
    $muff = CMuffinPHP::Instance();
    if(isset($muff->config['debug']['db-num-queries']) && $muff->config['debug']['db-num-queries'] && isset($muff->db)) {
      $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries());
    }    
    if(isset($muff->config['debug']['db-queries']) && $muff->config['debug']['db-queries'] && isset($muff->db)) {
      $this->session->SetFlash('database_queries', $this->db->GetQueries());
    }    
    if(isset($muff->config['debug']['timer']) && $muff->config['debug']['timer']) {
      $this->session->SetFlash('timer', $muff->timer);
    }    
    $this->session->StoreInSession();
    header('Location: ' . $this->request->CreateUrl($url));
  }

}