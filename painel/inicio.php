<div class="row">
            
            <?php 
              if($_SESSION['tipo'] == 2){ 
                include "admin/dash_admin.php";
              }
            ?>

            <div class="col-md-12 col-sm-12">
              <section class="box pb-2">
                
                <header class="div-title-box">
                  <h1 class="title-box-main d-flex justify-content-center">Destaques</h1>
                </header>

                <div class="col-12 slideshow-container">

                      <div class="mySlides fade">
                          <div class="numbertext">1 / 3</div>
                          <img src="<?= $img1 ?>">
                          <div class="text"><?= $txt_img1 ?></div>
                      </div>

                      <div class="mySlides fade">
                          <div class="numbertext">2 / 3</div>
                          <img src="<?= $img2 ?>">
                          <div class="text"><?= $txt_img2 ?></div>
                      </div>

                      <div class="mySlides fade">
                          <div class="numbertext">3 / 3</div>
                          <img src="<?= $img3 ?>">
                          <div class="text"><?= $txt_img3 ?></div>
                      </div>

                      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                      <a class="next" onclick="plusSlides(1)">&#10095;</a>

                  </div>

                <br>

                <div style="text-align:center">
                  <span class="dot" onclick="currentSlide(1)"></span> 
                  <span class="dot" onclick="currentSlide(2)"></span> 
                  <span class="dot" onclick="currentSlide(3)"></span> 
                </div>

                <style type="text/css">
                .fade:not(.show) {
                        opacity: 1;
                    }
                </style>

              </section>
            </div>
            
            <div class="col-md-12 col-sm-12">
              <section class="box">
                <header class="div-title-box">
                  <h1 class="title-box-main d-flex justify-content-center"> Por dentro da escola </h1>
                </header>
               
                <div class="div-content-box">
                  <div class="row">
                
                  <?php showNews('../img/noticia/', $conexao) ?>
              
                  </div>
                </div>
              </section>
            </div>