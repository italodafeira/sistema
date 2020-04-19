<?php

include_once('C:\xampp\htdocs\sistema\authentic.php');
include_once('C:\xampp\htdocs\sistema\news.php');

define("BASE", 'http://localhost/sistema/painel');
define("THEME", 'http://localhost//sistema/painel');
define("THEME_PATH", __DIR__);
define("THEME_LINK", BASE);

$configBase = BASE;

$configUrl = explode("/", strip_tags(filter_input(INPUT_GET, "url", FILTER_DEFAULT)));

$configUrl[0] = (!empty($configUrl[0]) ? $configUrl[0] : "inicio");
$configSiteName = "WdpShoes";

//Checagem de permissão
$tipo = "";

  if($_SESSION['tipo'] == 0){
    $tipo = "aluno";  
  }else if($_SESSION['tipo'] == 1){
    $tipo = "professor";
  }else if($_SESSION['tipo'] == 2){
    $tipo = "admin";
  }else{
    $tipo = "INVÁLIDO";
  }

$configBasePanel = BASE . "/painel";
$configThemePath = THEME_PATH;
$configThemeLink = THEME_LINK;

require_once('C:\xampp\htdocs\sistema\proj_esc_func\conexao.php');

$conexao = new Conexao();

$conexao = $conexao->conectar();

$id_escola = $_SESSION['escola'];


//PEGANDO OS DADOS DO BD PARA CRIAR A PAGINA

$query = "select * from config";
$stmt  = $conexao->query($query);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$titulo     = $row['titulo_site'];
$img_esc    = $row['img_escola'];
$img1       = "../img/" . $row['img_dest1'];
$img2       = "../img/" . $row['img_dest2'];
$img3       = "../img/" . $row['img_dest3'];
$desc_esc   = "../img/" . $row['desc_esc'];
$contato    = $row['contato'];
$local      = $row['img_local'];
$txt_img1  = $row['txt_img1'];
$txt_img2  = $row['txt_img2'];
$txt_img3  = $row['txt_img3'];

?>
<!DOCTYPE>
<html>
  <head>
      <title>S.E.P.O.</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <?php 

      //Import bootstrap.min.css, bootstrap.min.js, jquery, css and fonts
      include_once '../import_head.php';

    ?>
      
  </head>

  <body>
    <?php 
      require '../profile.php';
    ?>
          
    <div class="container-fluid d-flex">
      
    <div class="row">
      <?php
         require '../menu.php';          
      ?>

          <div class="col-md-10 pb-4">
            <?php 
              //QUERY STRING
              if (is_dir("{$configThemePath}/{$configUrl[0]}")) {
                  require "{$configThemePath}/{$configUrl[0]}/{$configUrl[1]}.php";
              }elseif (file_exists("{$configThemePath}/{$configUrl[0]}.php") && !is_dir("{$configThemePath}/{$configUrl[0]}.php")) {
                  //theme root
                  require "{$configThemePath}/{$configUrl[0]}.php";
              }elseif (!empty($configUrl[1]) && file_exists("{$configThemePath}/{$configUrl[0]}/{$configUrl[1]}.php") && !is_dir("{$configThemePath}/{$configUrl[0]}/{$configUrl[1]}.php")) {
                  //theme folder
                  require "{$configThemePath}/{$configUrl[0]}/{$configUrl[1]}.php";
              } else {
                  //theme 404
                  if (file_exists("{$configThemePath}/404.php") && !is_dir("{$configThemePath}/404.php")) {
                      require "{$configThemePath}/404.php";
                  } else {
                      echo "<div class='container'><div class='trigger trigger-error icon-error radius'>Desculpe, mas a página não existe!</div></div>";
                  }
              }
            ?>
          </div>
        </div>
      </div>
    </div>                 
  
  <?php include '../footer.php'; ?>
  <script type="text/javascript">
    function redirect(tipo){
      window.location = 'showData.php?type=' + tipo; 
    }

  </script>
  <script type="text/javascript" src="../js/slide.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
