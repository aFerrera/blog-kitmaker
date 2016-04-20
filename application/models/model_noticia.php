<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_noticia extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->helper('date');
  }

  function insertNoticia($titulo, $texto, $imagen){

    $text = stripslashes(nl2br($texto));

    if($this->session->userdata('usuario')){
      $data = array(
        'titulo' => $titulo,
        'texto' => $text,
        'fecha' => standard_date('DATE_W3C', now()),
        'autor' => $this->session->userdata('usuario'),
        'imagen' => $imagen
      );
      return $this->db->insert('noticia', $data);
    }else{
      $data = array(
        'titulo' => $titulo,
        'texto' => $texto,
        'fecha' => standard_date('DATE_W3C', now()),
        'autor' => 'Anonimo',
        'imagen' => $imagen
      );
      return $this->db->insert('noticia', $data);
    }

  }

  public function borrarPost($id){
    $this->db->where('id', $id);
    return $this->db->delete('noticia');
  }

  /*FUNCION QUE DEVUELVE LOS POSTS*/
  public function getNoticias() {

    $this->db->order_by("id", "desc");
    $this->db->limit(10);
    $query = $this->db->get('noticia');
    return $query->result_array();

  }

  public function getAllNoticias() {

    $this->db->order_by("id", "desc");
    $query = $this->db->get('noticia');
    return $query->result_array();

  }

  public function getNoticia($id){
    $this->db->where("id", $id);
    $query = $this->db->get('noticia');
    return $query->result_array();
  }

  public function getComentarios($id){
    $this->db->order_by("id", "desc");
    $this->db->where("noticia", $id);
    $query = $this->db->get('comentario');
    return $query->result_array();
  }

  function insertComentario($comentario, $autor, $noticia){

    $texto = stripslashes(nl2br($comentario));

    if($this->session->userdata('usuario')){
      $data = array(
        'autor' => $autor,
        'fecha' => standard_date('DATE_W3C', now()),
        'contenido' => $texto,
        'noticia' => $noticia
      );
    }else{
      $data = array(
        'autor' => 'Anonimo',
        'fecha' => standard_date('DATE_W3C', now()),
        'contenido' => $texto,
        'noticia' => $noticia
      );
    }


    return $this->db->insert('comentario', $data);


  }

  /*FUNCION QUE DEVUELVE TODOS LOS COMENTARIOS*/
  public function get_allComents() {
    $query = $this->db->get('comentario');
    return $query->result_array();
  }

  /*FUNCION PARA LOS LIKES*/
  public function likeUp($id, $likes){
    $data = array(
      'likes' => $likes + 1
    );
      $this->db->where('id', $id);
      return $this->db->update('comentario', $data);
  }
}
