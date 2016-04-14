<div id="cajaTabla" class="center-align center-block">
    <h2>COMENTARIOS DEL BLOG</h2>
    <table id="myTable2" class="highlight">
        <thead>
        <th>NOTICIA</th>
        <th>ID</th>
        <th>AUTOR</th>
        <th>COMENTARIO</th>
        <th>LIKES</th>
        <th>FECHA</th>

        </thead>
        <tbody>
            <?php foreach ($coments as $coments_item): ?>
                <tr>
                    <td><?php echo $coments_item['noticia']; ?></td>
                    <td><?php echo $coments_item['id']; ?></td>
                    <td><?php echo $coments_item['autor']; ?></td>
                    <td><?php echo $coments_item['contenido']; ?></td>
                    <td>+<?php echo $coments_item['likes']; ?></td>
                    <td><?php echo $coments_item['fecha']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
