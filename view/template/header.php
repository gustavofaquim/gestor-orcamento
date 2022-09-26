<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>MVC</title>
    <!-- <link rel="stylesheet" href="/assets/css/bootstrap.min.css" -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/da47ed77ef.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/api:client.js"></script>
  </head>
  <body>

   
      <?php 
      

      if(isset($_SESSION['logado'])){
        if($_SESSION['logado'] == True){
          $usuario = $_SESSION['user'];
          

          echo "<nav class='nav justify-content-center top-menu'>";
            echo "<a class='nav-link btn-login' href='/alterar-usuario?id=".$usuario->__get('id')."'>Perfil</a>";
            echo "<a class='nav-link' href='/'>Home</a>";
            echo "<a class='nav-link btn-login' href='/deslogar'>Sair</a>";
          echo"</nav>";

        }else{
          echo " <nav class='nav justify-content-center top-menu'>";
            echo "<a class='nav-link' href='/'>Home</a>";
            echo "<a class='nav-link' href='/post/'>Post</a>";
            echo "<a class='nav-link btn-login' href='/login'>Entrar</a>";
          echo"</nav>";
          
      }
      }else{
        echo " <nav class='nav justify-content-center top-menu'>";
          echo "<a class='nav-link' href='/'>Home</a>";
          echo "<a class='nav-link' href='/post/'>Post</a>";
          echo "<a class='nav-link btn-login' href='/login'>Entrar</a>";
        echo"</nav>";
         
      }
      
      ?>

    
