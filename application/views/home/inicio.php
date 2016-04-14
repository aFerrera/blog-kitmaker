<div class="parallax-container">
  <div class="parallax" ><img src="<?=base_url('assets/img/nevado1.jpg') ?>" style="display: block; transform: translate3d(-50%, 512px, 0px); width: auto;"></div>
</div>

<div id="content" class=" section blue lighten-5 center-block center-align">

  <h2>BIENVENIDO AL BLOG</h2>
  <?php if($this->session->userdata('usuario')){echo 'hola de nuevo!';}else{?>
  <p>Tambien puedes continuar como invitado para ver algunos posts: <a href="<?=site_url('/home/principal') ?>">ENTRAR COMO INVITADO</a></p>
  <?php }?>
  <h3><?echo $titulo?></h3>
  <?= form_open('home/ingresar', array('class'=>'form-horizontal')); ?>

  <?= my_validation_errors(validation_errors()); ?>

  <div class="control-group">
    <?= form_label('Usuario :', 'login', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'login', 'id'=>'login', 'placeholder' => 'Usuario...', 'value'=>set_value('login')));?>
  </div>

  <div class="control-group">
    <?= form_label('Password :', 'password', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'password', 'name'=>'password', 'id'=>'password', 'value'=>set_value('password')));?>
  </div>

  <div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Ingresar', 'class'=>'btn btn-primary')); ?>

  </div>

  <?= form_close(); ?>
</div>

<div class="parallax-container">
  <div class="parallax" ><img src="<?=base_url('assets/img/nevado1.jpg') ?>" style="display: block; transform: translate3d(-50%, 512px, 0px); width: auto;"></div>
</div>
