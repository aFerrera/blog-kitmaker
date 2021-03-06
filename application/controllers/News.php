<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	/*CRUD TABLA NOTICIAS*/
	function __construct(){
		parent::__construct();

		//$this->load->library('usuarioLib'); No necesitamos cargar la librería por ahora
		$this->CI = & get_instance(); // Esto para acceder a la instancia que carga la librería

		//$this->load->library('newsLib');
		$this->CI->load->model('Model_noticia');
		$this->CI->load->helper('smiley');
		$this->load->library("pagination");
		$this->load->helper("url");
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

	/*public function example1() {
			$config = array();
			$config["base_url"] = base_url() . "welcome/example1";
			$config["total_rows"] = $this->Model_noticia->record_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["results"] = $this->Countries->
					fetch_countries($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();

			$this->load->view("example1", $data);
	}*/

	/*INSERTAR NOTICIA*/
  public function create(){
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Text', 'required');


    $titulo = $this->input->post('title');
    $texto = $this->input->post('text');
		$imagen = $this->input->post('imagen');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('templates/header');
      $this->load->view('news/create');
      $this->load->view('templates/footer');
    } else {
			$this->Model_noticia->insertNoticia($titulo, $texto, $imagen);
			$this->posts();
		}

	}

	/*INSERTAR COMENTASRIO*/
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
			$this->irApost();
		}

	}

	/*CARGA DE NOTICIAS*/
	public function posts() {
		//$data['news'] = $this->Model_noticia->getNoticias();
		$config = array();
		$config["base_url"] = base_url() . "index.php/news/posts";
		$config["total_rows"] = $this->Model_noticia->record_count();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;

		// If you want to wrap your pagination in something
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		// If you want to wrap the "go to first" link
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="btn orange lighten-4">';
		$config['first_tag_close'] = '</li>';

		// If you want to wrap the "go to last" link
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="btn orange lighten-4">';
		$config['last_tag_close'] = '</li>';

		// If you want to wrap the next link
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="btn orange lighten-4">';
		$config['next_tag_close'] = '</li>';

		// If you want to wrap the previous link
		$config['prev_link'] = 'Last';
		$config['prev_tag_open'] = '<li class="btn orange lighten-4">';
		$config['prev_tag_close'] = '</li>';

		// Wrap/style active link
		$config['cur_tag_open'] = '<li class="active btn orange lighten-3">';
		$config['cur_tag_close'] = '</li>';

		// Wrap the 'digit' link.
		$config['num_tag_open'] = '<li class="btn orange lighten-4">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["results"] = $this->Model_noticia->fetch_posts($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();

		$this->load->view('templates/header');
		$this->load->view('news/posts', $data);
		$this->load->view('templates/footer');
	}

	/*CARGA DE NOTICIAS SIN EXCEPCIÓN*/
	public function allPosts() {
		$data['news'] = $this->Model_noticia->getAllNoticias();
		$this->load->view('templates/header');
		$this->load->view('news/allPosts', $data);
		$this->load->view('templates/footer');
	}

	/*NOTICIA EN PARTICULAR, FILTRADO POR CÓDIGO*/
	public function irApost(){
		$this->load->helper('form');

		$this->load->helper('smiley');
		$this->load->library('table');

		$image_array = get_clickable_smileys(base_url('assets/smileys'), 'comentario');

		$col_array = $this->table->make_columns($image_array, 8);

		$data['smiley_table'] = $this->table->generate($col_array);

		$codigo = $this->input->post('idNoticia');

		$data['noticia'] = $this->Model_noticia->getNoticia($codigo);
		$data['comentario'] = $this->Model_noticia->getComentarios($codigo);

		$this->load->view('templates/header');
		$this->load->view('news/post', $data);
		$this->load->view('templates/footer');
	}

	/*DELETE POST*/
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

	/*SISTEMA DE LIKES*/
	public function like(){
		  $this->load->helper('form');
			$codigo = $this->input->post('idNoticia2');
			$likes = $this->input->post('likesComent');
			$cNoticia = $this->input->post('idNoticia');

			$this->Model_noticia->likeUp($codigo, $likes);

			$data['noticia'] = $this->Model_noticia->getNoticia($cNoticia);
			$data['comentario'] = $this->Model_noticia->getComentarios($cNoticia);

			$this->load->view('templates/header');
			$this->load->view('news/post', $data);
			$this->load->view('templates/footer');

	}



}
