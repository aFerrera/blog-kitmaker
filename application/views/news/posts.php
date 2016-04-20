<?php ?>
<!-- VISTA PARA VISUALIZACIÓN DE POSTS MEDIANTE CARTAS-->
<div id="cajaNoticias">
  <h2>ULTIMAS ENTRADAS</h2>

  <a href="<?=site_url('news/create')?>" style="margin-left: 20px;" class="btn-floating btn-large waves-effect waves-light blue-grey lighten-3"><i class="material-icons">add</i></a>

  <?php foreach ($news as $news_item): ?>
    <div class="row cartas center-block centered">
      <div class="col s12 m6"  style="width: 98%;  overflow: hidden;">
        <div class="card blue lighten-4">
          <div class="card-content black-text">
            <p class="card-title tituloPost"><b><?php echo $news_item['titulo']; ?></b></p>
            <p class="textoPost"><?php echo substr($news_item['texto'], 0, 256); ?></p>
            <br>

            <div class="extraInfo">
              <p><b>Autor:</b> <?php echo $news_item['autor']; ?></p>
              <p><b>Fecha:</b> <?php echo $news_item['fecha']; ?></p>
            </div>
          </div>
          <div class="card-action">
            <?php echo form_open('news/irApost'); ?>
            <input type="hidden" name="idNoticia" value="<?php echo $news_item['id']; ?>">
            <input type="submit" name="name" value="ver post" class=" btn waves-light blue-grey lighten-3 black-text">
          </form>

          <?php if($this->session->userdata('root')== 1){ ?>
          <?php echo form_open('news/borrarPost'); ?>
          <input type="hidden" name="idNoticia" value="<?php echo $news_item['id']; ?>">
          <input type="submit" name="eliminaNoticia" value="Eliminar entrada" class="eliminaNoticia btn waves-light red lighten-3 black-text">
        </form>
        <?php }?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
</div>
