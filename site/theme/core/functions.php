    <?php
  
    /**
    * Print debuginformation from the framework.
    */
   
   //check about this file...not sure when is used
    function get_debug() {
      $muff = CMuffinPHP::Instance();
     
        $html = "<h2>Debug Information</h2><hr><p>The content of the config array:</p><pre>" . htmlent(print_r($muff->config, true)) . "</pre>";
        $html .= "<hr><p>The content of the data array:</p><pre>" . htmlent(print_r($muff->data, true)) . "</pre>";
        $html .= "<hr><p>The content of the request array:</p><pre>" . htmlent(print_r($muff->request, true)) . "</pre>";
        return $html;
       
    }