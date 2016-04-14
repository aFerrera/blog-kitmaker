<div id="signIn" class="left-align center-block">
  <h2>SIGN IN</h2>

  <?php echo validation_errors(); ?>

  <?php echo form_open('home/registrarse'); ?>

  <label for="newUser">Nombre de usuario</label>
  <input type="text" name="newUser" class="validate"/>

  <label for="newPass">Texto</label>
  <input type="password" name="newPass" class="validate"/>


  <input type="submit" name="submit" id="nuevoUsuario" value="Gegistrarse" class="waves-light btn blue lighten-3 black-text"/>

</form>
</div>
