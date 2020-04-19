<?php
  
  include_once('C:\xampp\htdocs\sistema\authentic.php');

    if($_SESSION['tipo'] != 2){
      header("Location: inicio.php?perm=erro_perm");
    }
    require "../functions.php";
?>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>S.E.P.O.</title>
      <?php 

        //Import bootstrap.min.css, bootstrap.min.js, jquery, css and fonts
        include_once 'import_head.php';

      ?>
  </head>

  <body>
       
    <?php 

    require '../profile.php';

    ?>
              
    <div class="row m-0"> 
      
      <?php

        require '../menu.php';
         
      ?>
      
      <div class="col-md-10 col-sm-12">
        <div id="msg"></div> 
        <div class="container">
          <div class="row">

              <div class="box">
                <header class="div-title-box">
                      <h1 class="title-box-main  d-flex justify-content-center">Cadastro do Aluno</h1>
                </header>

              <div class="div-content-box">
              
                <form class="form-cad" id="form" action=" method="POST" enctype="multipart/form-data">
                  <input type="hidden" id="tipo" value="aluno">
                  <div class="row">
    	           		<div class="divisao-cad col-md-8 col-sm-12 col-xs-12">
                          <article>
                            <header>
                              <h2 class="title-box-main  d-flex justify-content-center">Dados pessoais</h2>
                            </header>

                             <div class="row">
                              <div class="col-md-6 col-sm-6 col-xs-12">

                                <li><label>Matricula</label></li>
                                <li><input type="text" name="matricula" placeholder="Matricula" required=""></li>

                                <li><label>Nome do aluno</label></li>
                                <li><input type="text" name="nome" placeholder="Nome" required=""></li>

                                <li><label>Sobrenome do aluno</label></li>
                                <li><input type="text" name="sobrenome" placeholder="Sobrenome"></li>

                                <li><label>Data de nascimento</label></li>
                                <li><input type="text" name="data_nasc" placeholder="dd/mm/aaaa" pattern="[0,1,2,3]{1}[0-9]{1}\/[0,1]{1}[0-9]{1}\/[0-9]{4}" required="require"></li>

                                <li><label>CPF</label></li>
                                <li><input type="text" name="cpf" placeholder="CPF do aluno"></li>
                                
                                <li><label>RG</label></li>
                                <li><input type="text" name="rg" placeholder="RG do aluno"></li>

                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12">
                                
                                <li><label>Telefone</label></li>
                                <li><input type="text" name="cont_alu" placeholder="Contato do aluno"></li>

                                <li><label>Email</label></li>
                                <li><input type="text" name="email" class="field_email" placeholder="Email" required=""></li>
                                
                                <li><label>Tipo sanguíneo</label></li>
                                <li><input type="text" name="tipo_sangue" placeholder="Tipo sanguíneo"></li>

                                <li><label>Gênero</label></li>
                                <li><input type="text" name="genero" placeholder="M/F/O" pattern="[M,m,F,f,O,o]{1}"></li>

                                <li><label>Alergias</label></li>
                                <li><input type="text" name="alergia" placeholder="Alergias"></li>
                                
                                <li><label>Observações</label></li>
                                <li><input type="text" name="obs"  placeholder="Observações gerais"></li>
                               </div>

                               <div class="col-12">
                                <li><label>Endereço Completo</label></li>
                                <li><input type="text" name="end"  placeholder="Cidade-Bairro-Rua-Numero"></li>
                                
                                <div class="row d-flex justify-content-around align-items-center p-2">
                                  <li><label>Imagem de perfil</label></li>
                                    <li>
                                      <label for="file-upload1" class="custom-file-upload">
                                        Enviar Imagem
                                      </label>
                                      <input id="file-upload1" name="img_profile" type="file" style="display:none;">
                                      <label id="file-name"></label>
                                      <li>
                                        
                                        <img src="../img/icon-profile.png" id="img1" width="200" height="200" style="border-radius: 50%;">

                                      </li>
                                    </li>
                                </div>
                              </div> 
                            </div>
                        </article>
                    </div>

                    <div class="divisao-cad col-md-4 col-sm-12 col-xs-12">
                        <article>
                          <header>
                            <h2 class="title-box-main  d-flex justify-content-center">Dados do sistema</h2>
                          </header>

                          <li><label>Nome do usuário</label></li>
                          <li><input type="text" name="login" placeholder="Nome temporário" required=""></li>

                          <li><label>Senha do usuário</label></li>
                          <li><input type="password" name="senha" placeholder="Senha temporária" required=""></li>
                          
                          <header>
                            <h2 class="title-box-main  d-flex justify-content-center mt-2">Responsáveis</h2>
                          </header>
                            
                          <li><label>Responsável 1</label></li>
                          <li><input type="text" name="resp_1" placeholder="Nome responsável"></li>

                          <li><label>Contato responsável 1</label></li>
                          <li><input type="text" name="cont_1" placeholder="Contato 1"></li>

                          <li><label>Responsável 2</label></li>
                          <li><input type="text" name="resp_2" placeholder="Nome responsável"></li>

                          <li><label>Contato responsável 2</label></li>
                          <li><input type="text" name="cont_2" placeholder="Contato 2"></li>
                        </article>
                    </div>

    	          </div>

    				      <div class="row d-flex justify-content-center">
    							 <input class="btn btn-primary mt-2" id="btn-cad-aluno" type="submit" name="" value="Cadastrar">
                  </div>

    		      </form>
            </div>
          </div>
   
          </div> 
        </div> 
      </div>
    </div>
    <script>
      $(function(){
        $('#file-upload1').change(function(){
          const file = $(this)[0].files[0]
          const fileReader = new FileReader()
          fileReader.onloadend = function(){
            $('#img1').attr('src', fileReader.result)
          }
          fileReader.readAsDataURL(file)
        })
      })
     
    </script>
    <?php include '../footer.php'; ?>
    
</body>
    <script src='../js/cad_usu.js'></script>
</html>
