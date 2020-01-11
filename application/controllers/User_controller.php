<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('User_model');

	}

	public function index(){
		$data['result'] = $this->User_model->buscaUser();
		$this->load->view('user_view', $data);
	}

	public function esqueceuSenha(){
		$data['result'] = $this->User_model->buscaUser();
		$this->load->view('esqueceuSenha', $data);
    }
    

	public function indexCadastro(){
		$data['result'] = $this->User_model->buscaUser();
		$this->load->view('cadastroUser_view', $data);
	}

	public function indexEditar($cpf){
		$data['row'] = $this->User_model->getData($cpf);
		$this->load->view('editUser_view', $data);
	}

	public function createUser(){	
		$this->User_model->insereUser();
		$this->session->set_flashdata("usuarioCadastrado", "Usuário cadastrado com sucesso!");
		if($this->session->userdata('cpf')){
			redirect("User_controller");	
		}else{
			redirect("Principal");	
		}
	}

	public function updateUser($cpf){
		$this->User_model->updateUser($cpf);
		$this->session->set_flashdata("usuarioEditado", "Usuário editado com sucesso!");
		if($this->session->userdata('cpf') != $cpf){
			redirect("User_controller");	
		}else{
			redirect("User_controller/perfil");	
		}
	}

	public function excluirUser($cpf){
		$this->User_model->excluirUser($cpf);
		$this->session->set_flashdata("usuarioExcluido", "Usuário excluido com sucesso!");
		if($this->session->userdata('cpf') != $cpf){
			redirect("User_controller");	
		}else{
			redirect("Principal");	
		}	
	}

	function auth(){
		$email    = $this->input->post('email',TRUE);
		$senha 	  = md5($this->input->post('senha',TRUE));
		$validate = $this->User_model->validate($email, $senha);
		
		if($validate->num_rows() > 0){
			$data  = $validate->row_array();
			$nome  = $data['nome_user'];
			$cpf   = $data['cpf'];
			$telefone = $data['telefone'];
			$email = $data['email'];
			$tip_user = $data['tip_user'];
			$imagem_perfil = $data['imagem_perfil'];
			
			$sesdata = array(
				'nome_user' => $nome,
				'cpf'		=> $cpf,
				'telefone'	=> $telefone,
				'email'     => $email,
				'tip_user'  => $tip_user,
				'logged_in' => TRUE,
				'imagem_perfil' => $imagem_perfil
			);
			
			$this->session->set_userdata($sesdata);

			
			$this->session->set_flashdata("success", "Seja bem vindo!");

			// access login for admin
			if($tip_user === '0'){
				redirect('page');
	 
			// access login for staff
			}elseif($tip_user === '1'){
				redirect('page/staff');
	 
			// access login for author
			}else{
				redirect('page/author');
			}
		}else{
			
			$this->session->set_flashdata("denied", "Email ou senha incorretos.");
			redirect('Principal');
		}
	}

	function logout(){
	  	$this->session->sess_destroy();
	  	redirect('Principal');
	 }

	function perfil(){
		$data['result'] = $this->User_model->buscaUser();
		$this->load->view('perfil_view', $data);
	}



}
