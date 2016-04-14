<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	function __construct(){
		parent::__construct();

		//$this->load->library('usuarioLib'); No necesitamos cargar la librería por ahora
		$this->CI = & get_instance(); // Esto para acceder a la instancia que carga la librería

		//$this->load->library('newsLib');
		$this->CI->load->model('Model_noticia');

	}


	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see https://codeigniter.com/user_guide/general/urls.html
	*/


  public function create(){
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Text', 'required');


    $titulo = $this->input->post('title');
    $texto = $this->input->post('text');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('templates/header');
      $this->load->view('news/create');
      $this->load->view('templates/footer');
    } else {
			$this->Model_noticia->insertNoticia($titulo, $texto);
			$this->posts();
		}

	}

	public function insertComent(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('comentario', 'Text', 'required');
		$contenido = $this->input->post('comentario');
		$autor = $this->input->post('autorComentario');
		$noticia = $this->input->post('idNoticia');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('news/post');
			$this->load->view('templates/footer');
		} else {
			$this->Model_noticia->insertComentario($contenido, $autor, $noticia);
			$this->posts();
		}

	}

	public function posts() {
		$data['news'] = $this->Model_noticia->getNoticias();
		$this->load->view('templates/header');
		$this->load->view('news/posts', $data);
		$this->load->view('templates/footer');
	}

	public function allPosts() {
		$data['news'] = $this->Model_noticia->getNoticias();
		$this->load->view('templates/header');
		$this->load->view('news/allPosts', $data);
		$this->load->view('templates/footer');
	}

	public function irApost(){
		$this->load->helper('form');
		$codigo = $this->input->post('idNoticia');

		$data['noticia'] = $this->Model_noticia->getNoticia($codigo);
		$data['comentario'] = $this->Model_noticia->getComentarios($codigo);

		$this->load->view('templates/header');
		$this->load->view('news/post', $data);
		$this->load->view('templates/footer');
	}

	public function borrarPost(){
		$this->load->helper('form');
		$codigo = $this->input->post('idNoticia');

		$this->Model_noticia->borrarPost($codigo);
		$this->posts();
	}

	/* MONTAR PÁGINA DE TODOS LOS COMENTARIOS
	* @Author: Antonio ferrera
	*/
	public function allComents() {
		$data['coments'] = $this->Model_noticia->get_allComents();
		$this->load->view('templates/header');
		$this->load->view('news/allComents', $data);
		$this->load->view('templates/footer');
	}



}
