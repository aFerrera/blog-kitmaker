<html>
<head>
  <title>BLOG</title>

  <!--jQuery -->
  <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
  <!-- JS-->
  <script src="<?= base_url('assets/js/main.js')?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

</head>
<body>
  <nav>
    <div class="nav-wrapper blue lighten-4">
      <img id="logo" alt="kitmaker_logo" src="<?= base_url('assets/img/kitmaker_logo.png')?>">
      <a class="brand" href="#"><b>-<?=$this->session->userdata('usuario')?></b></a>
      <!-- Dropdown Trigger -->
      <a style="position: relative; left: 20px; float: left; width: 200px;" class='dropdown-button btn-large blue lighten-3 black-text' href='#' data-activates='dropdown1'>MENU</a>

      <!-- Dropdown Structure -->
      <ul id='dropdown1' class='dropdown-content blue lighten-3 black-text'>
        <li><a href="<?=base_url()?>">HOME</a></li>
        <li><a href="<?=site_url('news/create')?>">NUEVA ENTRADA</a></li>
        <li><a href="<?=site_url('news/posts')?>">POSTS</a></li>
        <li><a href="<?=site_url('news/allPosts')?>">TODOS LOS POSTS</a></li>
        <li><a href="<?=site_url('home/principal')?>">PRINCIPAL</a></li>
        <?php if($this->session->userdata('usuario')){?>
        <li><a href="<?=site_url('home/logout')?>">LOGOUT</a></li>
        <?php }?>
      </ul>
    </div>
  </nav>
