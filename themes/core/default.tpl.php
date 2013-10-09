<!doctype html>
<html lang='en'> 
<head>
  <meta charset='utf-8'/>
  <title><?=$title?></title>
  <link rel='shortcut icon' href='<?=$favicon?>'/>
  <link rel='stylesheet' href='<?=$stylesheet?>'/>
</head>
<body>
  <div id='wrap-header'>
    <div id='header'>
    <div id='banner'>
      <p class='site-title'><?=$header?></p>
    </div>
    </div>
  </div>
  <div id='wrap-main'>
    <div id='main' role='main'>
      <?=@$main?>
      <?=render_views()?>
    </div>
  </div>
  <div id='wrap-footer'>
    <div id='footer'>
      <?=$footer?>
      <?=get_debug()?>
    </div>
  </div>
</body>
</html>