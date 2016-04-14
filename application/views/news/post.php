<div class="center-align center-block" id="espacioPost">
  <?php foreach ($noticia as $item): ?>
    <div class="header-noticia">
      <h2><?php echo $item['titulo']; ?></h2>
      <p>Autor - <?php echo $item['autor']; ?></p>
      <p>Fecha - <?php echo $item['fecha']; ?></p>
    </div>
    <div class="body-noticia">
      <p><?php echo $item['texto']; ?></p>
    </div>
  <?php endforeach; ?>

  <div class="comentarios left-align">
    <h5>COMENTARIOS DE LA ENTRADA</h5>

    <ul class="collection">
      <?php foreach ($comentario as $itemComentario): ?>
        <li class="collection-item avatar">
          <img src="<?=base_url('assets/img/icono-user.png')?>" alt="" class="circle">
          <span class="title"><b>Autor-</b> <?php echo $itemComentario['autor'] ?>| <b>fecha-</b> <?php echo $itemComentario['fecha'] ?></span>
          <p><?php echo $itemComentario['contenido'] ?></p>
          <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
        </li>
      <?php endforeach; ?>
    </ul>

    <div class="nuevoComentario">
      <?php echo validation_errors(); ?>

      <?php echo form_open('news/insertComent'); ?>

      <label for="comentario">Nuevo Comentario</label>
      <textarea  name="comentario" class="validate"></textarea>

      <input type="hidden" name="idNoticia" value="<?php echo $item['id']; ?>"/>

      <input type="hidden" name="autorComentario" value="<?php echo $this->session->userdata('usuario')?>"/>

      <input type="submit" name="insertaComentario" id="insertaComentario" value="Comentar post" class="waves-light btn blue lighten-3 black-text"/>

    </form>
  </div>

</div>
</div>
