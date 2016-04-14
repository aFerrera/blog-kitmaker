<div class="contenido">
  <h2>BIENVENIDO, <?=$this->session->userdata('usuario'); ?></h2>

  <p>Que deseas hacer?</p>


     <ul class="collapsible" data-collapsible="accordion" style="max-width: 600px; margin: 10px auto 10px auto;">
         <li>
             <div class="collapsible-header blue lighten-4"><i class="material-icons">&#xE8B6;</i>VER POSTS</div>
             <div class="collapsible-body"><p><a href="<?=site_url('news/posts')?>">ULTIMOS AÑADIDOS</a> | <a href="<?=site_url('news/allPosts')?>">TODOS LOS POSTS</a></p></div>
         </li>
         <li>
             <div class="collapsible-header blue lighten-4"><i class="material-icons">&#xE22B;</i>AÑADIR POST</div>
             <div class="collapsible-body"><p><a href="<?=site_url('news/create')?>">CREAR NUEVO POST</a></p></div>
         </li>
         <li>
             <div class="collapsible-header blue lighten-4"><i class="material-icons">&#xE8B6;</i>VER COMENTARIOS</div>
             <div class="collapsible-body"><p><a href="<?=site_url('news/allComents')?>">TODOS LOS COMENTARIOS</a></p></div>
         </li>
         <li>
             <div class="collapsible-header blue lighten-4"><i class="material-icons">&#xE853;</i>CREAR CUENTA</div>
             <div class="collapsible-body"><p><a href="<?=site_url('home/registrarse')?>">REGISTRARSE EN EL BLOG</a></p></div>
         </li>
         <?php if($this->session->userdata('usuario')){?>
         <li>
             <div class="collapsible-header blue lighten-4"><i class="material-icons">&#xE5CD;</i>LOGOUT</div>
             <div class="collapsible-body"><p><a href="<?=site_url('home/logout')?>">LOGOUT</a></p></div>
         </li>
         <?php } ?>
     </ul>

</div>
