
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Al-Quran</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Al-Quran</a>
      <!-- <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link 1</a></li>
        <li><a href="#">Navbar Link 2</a></li>
        <li><a href="#">Navbar Link 3</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Mobile 1</a></li>
        <li><a href="#">Navbar Mobile 2</a></li>
        <li><a href="#">Navbar Mobile 3</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->
    </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Al-Quran</h1>
        <div class="row center">
          <h5 class="header col s12 light">Aplikasi Web Sederhana Audio Surah</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="img/bg-01.jpg" alt="Background Al-Quran"></div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s6">
          <label>Pilih Surah</label>
          <select id="surah">
            <option value="" disabled selected>Choose your option</option>
            <?php 
              $url = 'https://al-quran-8d642.firebaseio.com/data.json?print=pretty';
              $opts = array(
                'http'=>array(
                  'method'=>"GET"
                )
              );
              $context = stream_context_create($opts);
              $file = file_get_contents($url, false, $context);
              $parsedata = json_decode($file, TRUE);
              foreach ($parsedata as $data) {
                  echo '
                    <option value="'.$data['nomor'].'">'.$data['nama'].'</option>
                  ';
              }
            ?>
          </select>
        <div id="hasil"></div>
        <div id="load" style="display: none;">
          <img src="img/load.svg">
        </div>
        </div>
        <div class="col s6">
          <div id="ayat" style="margin-bottom: 0px; margin-top: 0px;"></div>
        </div>
      </div>
    </div>
  </div>

  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">About Us</h5>
          <p class="grey-text text-lighten-4">We are a team of college students from State Polytechnic of Ujung Pandang working on this project. Any amount would help support and continue development on this project and is greatly appreciated.</p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container right-align">&copy; 2019 MjReaper Team</a>
      </div>
    </div>
  </footer>


  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
    $(document).ready(function(){
      $('select').formSelect();
    });
  </script>

  <script>
    $(document).ready(function(){

      $('#surah').change(function(){
        var id = $('#surah').val();
          $.ajax({
            type : 'GET',
            url : 'hasil.php', 
            data :  {'id' : id}, 

            beforeSend: function(){
              // Show image container
              $("#load").show();
            },

            success: function (data) {
            $("#load").hide();
            $("#hasil").html(data);
          }
        });
      });

      $('#surah').change(function(){
        var id = $('#surah').val();
          $.ajax({
            type : 'GET',
            url : 'ayat.php', 
            data :  {'id' : id}, 

            beforeSend: function(){
              // Show image container
              $("#load").show();
            },

            success: function (data) {
            $("#load").hide();
            $("#ayat").html(data);
          }
        });
      });
    });

  </script>

  </body>
</html>
