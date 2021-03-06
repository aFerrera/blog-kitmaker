<div class="center-align center-block" id="espacioPost">
  <?php foreach ($noticia as $item): ?>
    <div class="header-noticia">
      <h2><?php echo $item['titulo']; ?></h2>

      <p>Autor - <?php echo $item['autor']; ?></p>
      <p>Fecha - <?php echo $item['fecha']; ?></p>
    </div>
    <div class="body-noticia">
      <img class="imgPost center-block" src="<?php echo $item['imagen']; ?>" alt="" />
      <p><?php echo $item['texto']; ?></p>
    </div>
  <?php endforeach; ?>

  <div class="comentarios left-align">
    <h5>COMENTARIOS DE LA ENTRADA</h5>

    <ul class="collection">
      <?php foreach ($comentario as $itemComentario): ?>
        <li class="collection-item avatar ccc">

          <span class="title avatarComents"><i class="material-icons">&#xE853;</i><b>Autor-</b> <?php echo $itemComentario['autor'] ?>| <b><?php echo $itemComentario['fecha'] ?></b></span>
          <p class="contenidoComentario"><?php
          $str = $itemComentario['contenido'];
          echo $str = parse_smileys($str, base_url('/assets/smileys'));
           ?></p>

          <?php echo form_open('news/like'); ?>
          <input type="hidden" name="idNoticia" value="<?php echo $itemComentario['noticia']?>">
          <input type="hidden" name="idNoticia2" value="<?php echo $itemComentario['id']?>">
          <input type="hidden" name="likesComent" value="<?php echo $itemComentario['likes']?>">
          <button type="submit" class="secondary-content"><i class="material-icons">&#xE8DC;</i><?php echo $itemComentario['likes']?></button>
        </form>
      </li>
    <?php endforeach; ?>
  </ul>

    <div class="nuevoComentario">
      <?php echo validation_errors(); ?>

      <?php echo form_open('news/insertComent'); ?>

      <label for="comentario">Nuevo Comentario</label>
      <textarea id="comentario"  name="comentario" class="validate"></textarea>

      <input type="hidden" name="idNoticia" value="<?php echo $item['id']; ?>"/>

      <input type="hidden" name="autorComentario" value="<?php echo $this->session->userdata('usuario')?>"/>

      <input type="submit" name="insertaComentario" id="insertaComentario" value="Comentar post" class="waves-light btn orange lighten-4 black-text"/>
      <button id="smileButton" type="button" name="button" class="waves-light btn orange lighten-3"><img src="<?=base_url('assets/smileys/smile.gif')?>" alt="smiley" /></button>
      <div class="smileyTable" hidden="true">
        <?php echo $smiley_table; ?>
      </div>
    </form>
  </div>

</div>
</div>
