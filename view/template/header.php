<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>MVC</title>
    <!-- <link rel="stylesheet" href="/assets/css/bootstrap.min.css" -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b183461405.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </head>
  <body>


    
  <nav class="navbar navbar-dark bg-dark menu-superior">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoOculto" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>

  <div class='collapse container-fluid menu' id='conteudoOculto'>
    <ul class="">
    <a href="/"><li class="">Inicio</li></a>
      <a href='/listar-contas'><li class=""><i class="fa-solid fa-piggy-bank"></i> Contas</li></a>
      <a href="/listar-categorias"><li class="">Categorias</li></a>
    </ul>
  </div>

  <?php include 'total.php'; ?>
    
