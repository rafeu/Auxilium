<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doacao_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('Doacao_model');

	}

	public function indexCadastrar($id_evento){
		$data['result'] = $this->Doacao_model->buscaDoacao($id_evento);
		$this->load->view('cadastroDoacao_view', $data);
	}

	public function indexEditar($id_doacao){
		$data['result'] = $this->Doacao_model->getDataDoacao($id_doacao);
		$this->load->view('editDoacao_view', $data);
	}

	public function createDoacao($id_evento){	
		$this->Doacao_model->insereDoacao();
		$this->session->set_flashdata("doacaoCadastrada", "Doação cadastrada com sucesso!");
		redirect("Eventos_controller/perfilEvento/".$id_evento);	
	}

	public function editDoacao($id_doacao){
		$data['row'] = $this->Doacao_model->buscaDoacaoEspecifica($id_doacao);
		$this->load->view('editDoacao_view', $data);
	}

	public function updateDoacao($id_doacao){
		$this->Doacao_model->updateDoacao($id_doacao);
		$this->session->set_flashdata("doacaoEditada", "Doação editada com sucesso!");
		redirect("Doacao_controller/userDoacao/".$this->session->userdata('cpf'));	
	}

	public function excluirDoacao($id_doacao){
		$this->Doacao_model->excluirDoacao($id_doacao);
		$this->session->set_flashdata("doacaoExcluida", "Doação excluida com sucesso!");
		redirect("Doacao_controller/userDoacao/".$this->session->userdata('cpf'));	
	}

	function userDoacao($cpf){
		$data['result'] = $this->Doacao_model->getDataDoacao($cpf);
		$this->load->view('minhasDoacoes_view', $data);
	}


}
