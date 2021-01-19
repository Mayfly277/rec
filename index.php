<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pentest viewer">
    <meta name="author" content="Mayfly">
    <title>Pentest records viewer</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/asciinema/asciinema-player.css" />
    <link rel="stylesheet" type="text/css" href="assets/sidebar.css" />
  </head>

  <body>
  <div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading">Pentest Actions records</div>
  <div class="list-group list-group-flush">
    <?php $fileList = glob('casts/*.cast'); 
          foreach($fileList as $filename){
            $f = pathinfo($filename);
            $info_file = $f['dirname'].'/'.$f['filename'].'.info';
            $info = htmlentities(preg_replace( "/\r|\n/", "", file_get_contents($info_file)), ENT_QUOTES);
            [$date,$cmd] = explode(' : ', $info);
            $content  = "<a href=\"#\" onclick=\"play('". $filename ."','" . $info . "')\" class=\"list-group-item list-group-item-action bg-light\">" . $date.' :<br>'.$cmd . "</a>";
            echo $content;
          } ?>
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>

  <div class="container-fluid">
    <div id="video">
     Tools to record commands on demand
    </div>
  </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/asciinema/asciinema-player.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    function play(filename, infos){
      document.getElementById('video').innerHTML = '<h2>' + infos + '</h2> <asciinema-player src="' + filename + '" poster="npt:0:10"></asciinema-player>';
    }
  </script>

</body>
</html>
