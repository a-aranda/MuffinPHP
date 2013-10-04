    <?php
    

    // /**
    // * Print debuginformation from the framework.
    // */
    // function get_debug() {
    //   $muff = CMuffinPHP::Instance();
    //   if ($muff->config['debug'] == 'on'){
    //     $html = "<h2>Debug Information</h2><hr><p>The content of the config array:</p><pre>" . htmlent(print_r($muff->config, true)) . "</pre>";
    //     $html .= "<hr><p>The content of the data array:</p><pre>" . htmlent(print_r($muff->data, true)) . "</pre>";
    //     $html .= "<hr><p>The content of the request array:</p><pre>" . htmlent(print_r($muff->request, true)) . "</pre>";
    //     return $html;
    //   }
    //   else return null;
    // }

    /**
* Print debuginformation from the framework.
*/
function get_debug() {
  $muff = CMuffinPHP::Instance(); 
  $html = null;
  if(isset($muff->config['debug']['db-num-queries']) && $muff->config['debug']['db-num-queries'] && isset($muff->db)) {
    $html .= "<p>Database made " . $muff->db->GetNumQueries() . " queries.</p>";
  }   
  if(isset($muff->config['debug']['db-queries']) && $muff->config['debug']['db-queries'] && isset($muff->db)) {
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $muff->db->GetQueries()) . "</pre>";
  }   
  if(isset($muff->config['debug']['lydia']) && $muff->config['debug']['lydia']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CLydia:</p><pre>" . htmlent(print_r($muff, true)) . "</pre>";
  }   
  return $html;
}