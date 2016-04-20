<div id="completo" class="left-align center-block">



  <div id="createPost" class="left-align center-block">
    <h2>NUEVO POST</h2>

    <?php echo validation_errors(); ?>

    <?php echo form_open('news/create'); ?>

    <label for="title">Título post</label>
    <input type="text" name="title" class="validate"/>

    <label for="text">Texto</label>
    <textarea name="text"></textarea>

    <p>Si lo desea, puede insertar una imagen por URL.</p>

    <label for="imagen">URL imagen</label>
    <input type="text" name="imagen" class="validate"/>

    <input type="submit" name="submit" id="nuevoPost" value="Añadir al blog" class="waves-light btn blue-grey lighten-3 black-text"/>

  </form>
</div>

</div>
