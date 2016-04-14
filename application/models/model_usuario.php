<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Usuario extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function all() {
    $query = $this->db->get('usuario');
    return $query->result();
  }

  function find($id) {
    $this->db->where('id', $id);
    return $this->db->get('usuario')->row();
  }

  function insertUser($user, $pass) {
    $data = array(
      'user' => $user,
      'password' => MD5($pass),
      'admin' => 0
    );
    return $this->db->insert('usuario', $data);
  }

  function update($registro) {
    $this->db->set($registro);
    $this->db->where('id', $registro['id']);
    $this->db->update('usuario');
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('usuario');
  }

  function get_login($user, $pass) {
    $this->db->where('user', $user);
    $this->db->where('password', MD5($pass));
    return $this->db->get('usuario');
  }

}
