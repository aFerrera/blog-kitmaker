<!-- VISTA PARA VISUALIZACIÓN INDIVIDUAL DE TODOS LOS POSTS -->
<div id="cajaTabla" class="center-align center-block">
  <h2>ENTRADAS DEL BLOG</h2>
  <!-- DATATABLE DE POSTS -->
  <table id="myTable" class="highlight">
    <thead>
      <th>ID</th>
      <th>TITULO</th>
      <th>AUTOR</th>
      <th>TEXTO</th>
      <th>FECHA</th>
      <th>ver</th>
      <th></th>
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
              <button  type="submit" class="visualizarNoticia" name="visualizarNoticia" class="waves-light btn red lighten-3"><i class="material-icons">&#xE8B6;</i></button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
