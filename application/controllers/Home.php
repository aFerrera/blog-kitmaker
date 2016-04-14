<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
		$this->form_validation->set_message('loginok', 'Usuario o clave incorrectos');
		$this->form_validation->set_message('matches', '%s no coincide con %s');
		$this->form_validation->set_message('cambiook', 'No se puede realizar el cambio de clave');
		//$this->load->library('usuarioLib'); No necesitamos cargar la librería por ahora
		$this->CI = & get_instance(); // Esto para acceder a la instancia que carga la librería

		$this->load->library('usuarioLib');
		$this->CI->load->model('Model_Usuario');

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
	public function index()
	{
		$data['titulo'] = 'Índice';
		$this->load->view('templates/header', $data);
		$this->load->view('home/inicio');
		$this->load->view('templates/footer');
	}

	public function acceso_denegado() {
		$this->load->view('templates/header');
		$this->load->view('home/acceso_denegado');
	}

	public function ingresar() {
		$this->form_validation->set_rules('login', 'Usuario', 'required|callback_loginok');
		$this->form_validation->set_rules('password', 'Clave', 'required');
		if($this->form_validation->run() == FALSE) {
			$this->ingreso();
		}
		else {
			$data['titulo']= 'Principal';
			$this->load->view('templates/header', $data);
			$this->load->view('home/principal');
			$this->load->view('templates/footer');
		}
	}


	public function ingreso() {
		$data['contenido'] = 'home/ingreso';
		$data['titulo'] = 'Ingreso';
		$this->load->view('templates/header', $data);
		$this->load->view('home/inicio', $data);
		$this->load->view('templates/footer');

	}

	public function loginok() {
		$login = $this->input->post('login');
		$password = $this->input->post('password');
		return $this->login($login, $password);
	}

	public function login($user, $password){
		$query = $this->CI->Model_Usuario->get_login($user, $password);
		if($query->num_rows() > 0){
			$usuario = $query->row();
			$this->CI->session->set_userdata('usuario', $usuario->user);
			$this->CI->session->set_userdata('root', $usuario->admin);
			return TRUE;
		}else{
			$this->CI->session->sess_destroy();
			return FALSE;
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->load->view('templates/header');
		$this->load->view('home/inicio');
		$this->load->view('templates/footer');
	}


	public function registrarse(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('newUser', 'User', 'required');
		$this->form_validation->set_rules('newPass', 'Password', 'required');

		$nuevoUser = $this->input->post('newUser');
    $nuevaPass = $this->input->post('newPass');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('templates/header');
      $this->load->view('home/signIn');
      $this->load->view('templates/footer');
    } else {
      $this->Model_Usuario->insertUser($nuevoUser, $nuevaPass);
      $this->load->view('templates/header');
      $this->load->view('home/inicio');
      $this->load->view('templates/footer');
    }
	}


	public function principal(){
		$this->load->view('templates/header');
		$this->load->view('home/principal');
		$this->load->view('templates/footer');
	}


}
