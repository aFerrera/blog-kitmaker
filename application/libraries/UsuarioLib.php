<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');

// Validaciones para el modelo de usuarios (login, cambio clave, CRUD Usuario)
class UsuarioLib {

  function __construct() {
    $this->CI = & get_instance(); // Esto para acceder a la instancia que carga la librería
    $this->CI->load->model('Model_Usuario');
  }



}
