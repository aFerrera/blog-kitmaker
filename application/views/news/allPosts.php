<!-- VISTA PARA VISUALIZACIÓN INDIVIDUAL DE TODOS LOS POSTS -->
<div id="cajaTabla" class="center-align center-block">
  <h2>ENTRADAS DEL BLOG</h2>
  <!-- DATATABLE DE POSTS -->
  <table id="myTable2" class="highlight">
    <thead>
      <tr>
        <th>ID</th>
        <th>TITULO</th>
        <th>AUTOR</th>
        <th>TEXTO</th>
        <th>FECHA</th>
        <th>ver</th>
        <th></th>
      </tr>


    </thead>
    <tbody>
      <?php foreach ($news as $news_item): ?>
        <tr>
          <td><?php echo $news_item['id']; ?></td>
          <td><?php echo $news_item['titulo']; ?></td>
          <td><?php echo $news_item['autor']; ?></td>
          <td><?php echo substr($news_item['texto'], 0, 64); ?></td>
          <td><?php echo $news_item['fecha']; ?></td>
          <td>
              <?php echo form_open('news/irApost'); ?>
              <input type="hidden" name="idNoticia" id="idNoticia" value="<?php echo $news_item['id']; ?>"/>
              <button  type="submit" class="visualizarNoticia" name="visualizarNoticia" class="waves-light btn blue lighten-3"><i class="material-icons">&#xE8B6;</i></button>
            </form>
          </td>
          <td>
            <?php if($this->session->userdata('root')== 1){ ?>
            <?php echo form_open('news/borrarPost'); ?>
            <input type="hidden" name="idNoticia" value="<?php echo $news_item['id']; ?>">
            <button  type="submit" class="bNoticia" name="bNoticia" class="waves-light btn red lighten-3"><i class="material-icons">&#xE5CD;</i></button>

          </form>
          <?php }?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
