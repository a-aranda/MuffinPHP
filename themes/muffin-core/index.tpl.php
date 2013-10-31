<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel='shortcut icon' href='<?=theme_url($favicon)?>'/>

    <title><?=$title?></title>

    <!-- Bootstrap core CSS -->
    <link rel='stylesheet' href='<?=$stylesheet?>'/>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div id="top-navigation">
        <nav class="navbar navbar-fixed-top" role="navigation">
            <div class="navbar-brand pull-right" href="#"><small><?=login_menu()?></small></div>
        </nav>
     </div>
    </div>      
    <div id="muff-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <p id="muffin-php" class="text-center"><a href="<?=base_url()?>"><?=$header?></a></p>
            <center><img src="<?=theme_url($hr)?>" id="hr-divider" height="8px" alt=""></center>
            <p class="text-center"><?=$slogan?></p>
          </div>
          <div class="col-sm-4">
            <center><img id="muff" src="<?=theme_url($logo)?>" alt=""></center>
          </div>
          <div class="col-sm-4">
            <center>
              <ul>
                <a href="">Documentation</a>
                <a href="http://www.student.bth.se/~alar12/phpmvc/kmom01/index.php" target="_blank">About me</a>
                <a href="https://github.com/a-aranda/MuffinPHP" target="_blank">Fork my Github</a>
              </ul>
              <a href="https://github.com/a-aranda/MuffinPHP/releases"><img src="<?=theme_url($btn_download)?>" id="btn-download" alt=""></button></a>
             </center>
          </div>
        </div>
      </div>
    </div>


    <div class="container content">
      <div class="row">
        <div class="col-sm-8">
          <?php if(region_has_content('flash')): ?>
            <div id='outer-wrap-flash'>
              <div id='inner-wrap-flash'>
                <div id='flash'><?=render_views('flash')?></div>
              </div>
            </div>
            <?php endif; ?>

            <?php if(region_has_content('featured-first', 'featured-middle', 'featured-last')): ?>
            <div id='outer-wrap-featured'>
              <div id='inner-wrap-featured'>
                <div id='featured-first'><?=render_views('featured-first')?></div>
                <div id='featured-middle'><?=render_views('featured-middle')?></div>
                <div id='featured-last'><?=render_views('featured-last')?></div>
              </div>
            </div>
            <?php endif; ?>

            <div id='outer-wrap-main'>
              <div id='inner-wrap-main'>
                <div id='primary'><?=get_messages_from_session()?><?=@$main?><?=render_views('primary')?><?=render_views()?></div>
                <div id='sidebar'><?=render_views('sidebar')?></div>
              </div>
            </div>

            <?php if(region_has_content('triptych-first', 'triptych-middle', 'triptych-last')): ?>
            <div id='outer-wrap-triptych'>
              <div id='inner-wrap-triptych'>
                <div id='triptych-first'><?=render_views('triptych-first')?></div>
                <div id='triptych-middle'><?=render_views('triptych-middle')?></div>
                <div id='triptych-last'><?=render_views('triptych-last')?></div>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <div class="col-sm-3 col-md-offset-1 sidebar">
          <h3><b class="muffin"></b>About MuffinPHP</h3>
          <p>MuffinPHP is a php framework which offers a basic structure with some functionality for developing web applications.</p>
          <h3><b class="muffin"></b>About Me</h3>
          <p>My name is Álvaro Aranda and I'm a 24 years old guy from Madrid, Spain. In the past years I have been studying interaction design and user experience in Sweden, and I love everything that is related to design and the web. I hope this course will help me in improving my php skills.</p>
          <div id='sidebar'><?=render_views('sidebar')?></div>
        </div>
      </div>
    </div>

    <footer id="nav-bottom">
      <img src="<?=theme_url($cat)?>" height="116" alt="">
      <div class="container">
        
        <nav class="navbar navbar-static-bottom" role="navigation">
          <?=$footer?>
        </nav>
      </div>
    </footer>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script> //Handles the hover of the Download button
      $("#btn-download").hover(function() { $(this).attr("src", "<?=theme_url($btn_download_hover)?>")}, function() { $(this).attr("src", "<?=theme_url($btn_download)?>")});
    </script>
  </body>
</html>