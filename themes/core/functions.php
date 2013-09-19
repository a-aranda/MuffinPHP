    <?php
    

    /**
    * Print debuginformation from the framework.
    */
    function get_debug() {
      $muff = CMuffinPHP::Instance();
      $html = "<h2>Debuginformation</h2><hr><p>The content of the config array:</p><pre>" . htmlentities(print_r($muff->config, true)) . "</pre>";
      $html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($muff->data, true)) . "</pre>";
      $html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($muff->request, true)) . "</pre>";
      return $html;
    }