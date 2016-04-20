<footer class="page-footer blue-grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <p><?=$this->session->userdata('usuario')?> - <?= date('d-m-Y H:i') ?> </p>
        <p class="black-text text-lighten-4">Prueba Blog</p>
        <p>Powered by:  <a href="http://www.codeigniter.com/">CodeIgniter</a>, <a href="http://materializecss.com/">MaterializeCss</a>, <a href="https://design.google.com/icons/">material_Icons</a></p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="black-text">Links</h5>
        <ul>
          <li><a href="<?=base_url()?>">HOME</a></li>
          <li><a href="<?=site_url('news/create')?>">NUEVA ENTRADA</a></li>
          <li><a href="<?=site_url('news/posts')?>">POSTS</a></li>
          <li><a href="<?=site_url('news/allPosts')?>">TODOS LOS POSTS</a></li>
          <?php if($this->session->userdata('usuario')){?>
            <li><a href="<?=site_url('home/logout')?>">LOGOUT</a></li>
            <?php }?>
          </ul>
        </div>
      </div>
    </div>
  <div class="footer-copyright">
    <div class="container">
      © 2016 KitMaker
    </div>
  </div>
</footer>
</body>
<script type="text/javascript" src="<?=base_url('assets/js/carousel.js')?>"></script>
</html>
