<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

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
            <p id="muffin-php" class="text-center"><a href="<?=base_url()?>">Muffin PHP</a></p>
            <center><img src="<?=theme_url("img/hr-muff-divider.png")?>" id="hr-divider" height="8px" alt=""></center>
            <p class="text-center">This is a prebaked framework that makes building web applications easier and faster.</p>
          </div>
          <div class="col-sm-4">
            <center><img id="muff" src="<?=theme_url("img/muff.png")?>" alt=""></center>
          </div>
          <div class="col-sm-4">
            <center>
              <ul>
                <a href="">Documentation</a>
                <a href="http://www.student.bth.se/~alar12/phpmvc/kmom01/index.php" target="_blank">About me</a>
                <a href="https://github.com/a-aranda/MuffinPHP" target="_blank">Fork my Github</a>
              </ul>
              <a href=""><img src="<?=theme_url("img/btn-download.png")?>" id="btn-download" alt=""></button></a>
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
          <h3><b class="muffin"></b>Navigation Sidebar</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, nemo, magnam, id recusandae excepturi a ipsam iure pariatur eius vitae quos ex incidunt! Dolorem, inventore ea optio beatae minima ipsam.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, ratione, repellendus nulla ea dolorem ut sit nostrum aliquid expedita repudiandae. Repudiandae, expedita alias ad facere magni cumque vitae? Quae, obcaecati!</p>
        </div>
      </div>
    </div>

    <footer id="nav-bottom">
      <img src="<?=theme_url("img/muff-cat.png")?>" height="116" alt="">
      <div class="container">
        
        <nav class="navbar navbar-static-bottom" role="navigation">
          <p class="text-center">Powered by <a href="#" class="navbar-link">Muffin PHP </a>&copy; by <a href="#" class="navbar-link">Alvaro Aranda Muñoz</a></p>
        </nav>
      </div>
    </footer>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script>
      console.log('Click count:');
      $("#btn-download").hover(function() { $(this).attr("src", "<?=theme_url("img/btn-download-hover.png")?>")}, function() { $(this).attr("src", "<?=theme_url("img/btn-download.png")?>")});
    </script>
  </body>
</html>