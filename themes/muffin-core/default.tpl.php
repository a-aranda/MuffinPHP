<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Muffin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
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
            <a class="navbar-brand pull-right" href="#"><small><?=login_menu()?></small></a>
        </nav>
     </div>
    </div>      
    
    <div id="muff-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <p id="muffin-php" class="text-center">Muffin PHP</p>
            <center><img src="img/hr-muff-divider.png" id="hr-divider" height="8px" alt=""></center>
            <p class="text-center">This is a prebaked framework that makes building web applications easier and faster.</p>
          </div>
          <div class="col-sm-4">
            <center><img id="muff" src="img/muff.png" alt=""></center>
          </div>
          <div class="col-sm-4">
            <center>
              <ul>
                <a href="">Documentation</a>
                <a href="">About me</a>
                <a href="">Fork my Github</a>
              </ul>
              <a href=""><img src="img/btn-download.png" id="btn-download" alt=""></button></a>
             </center>
          </div>
        </div>
      </div>
    </div>

    <div class="container content">
      <div class="row">
        <div class="col-sm-8">
          <p><?=$header?></p>
          <?=get_messages_from_session()?> 
          <?=@$main?>
          <?=render_views()?>
        </div>
        <div class="col-sm-3 col-md-offset-1 sidebar">
          <h3><b class="muffin"></b>Navigation Sidebar</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, nemo, magnam, id recusandae excepturi a ipsam iure pariatur eius vitae quos ex incidunt! Dolorem, inventore ea optio beatae minima ipsam.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, ratione, repellendus nulla ea dolorem ut sit nostrum aliquid expedita repudiandae. Repudiandae, expedita alias ad facere magni cumque vitae? Quae, obcaecati!</p>
        </div>
      </div>
    </div>
    <footer id="nav-bottom">
      <img src="img/muff-cat.png" height="116" alt="">
      <div class="container">
        
        <nav class="navbar navbar-static-bottom" role="navigation">
          <p class="text-center">Powered by <a href="#" class="navbar-link">Muffin PHP </a>&copy; by <a href="#" class="navbar-link">Alvaro Aranda Muñoz</a></p>
          <!--<?=$footer?>-->
      <!--<?=get_debug()?>-->
        </nav>
      </div>
    </footer>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script>
      console.log('Click count:');
      $("#btn-download").hover(function() { $(this).attr("src", "img/btn-download-hover.png")}, function() { $(this).attr("src", "img/btn-download.png")});
    </script>
  </body>
</html>