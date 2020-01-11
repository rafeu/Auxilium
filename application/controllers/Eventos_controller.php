<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('Eventos_model');

	}

	public function index(){
		$data['result'] = $this->Eventos_model->buscaEventos();
		//echo "<pre>"; var_dump($data); echo "</pre>";
		$this->load->view('eventos_view', $data);
	}

	public function indexCadastro(){
		$data['result'] = $this->Eventos_model->buscaEventos();
		$this->load->view('cadastroEvento_view', $data);
	}

	public function indexEditar($id_evento){
		$data['row'] = $this->Eventos_model->getDataEvento($id_evento);
		$this->load->view('editEvento_view', $data);
	}

	public function createEvento(){	
		$this->Eventos_model->insereEvento();
		$this->session->set_flashdata("eventoCriado", "Evento criado com sucesso!");
		redirect("Eventos_controller");	
	}

	public function updateEvento($id_evento){
		$this->Eventos_model->updateEvento($id_evento);
		$this->session->set_flashdata("eventoEditado", "Evento editado com sucesso!");
		redirect("Eventos_controller");
	}

	public function excluirEvento($id_evento){
		$data['row'] = $this->Eventos_model->getDataEvento($id_evento);
		$endereco = $data['row']->id_endereco_fk;

		$this->Eventos_model->excluirEvento($id_evento, $endereco);
		$this->session->set_flashdata("eventoExcluido", "Evento excluido com sucesso!");
		redirect("Eventos_controller");	
	}

	function perfilEvento($id_evento){
		$data['row'] = $this->Eventos_model->getDataEvento($id_evento);
		$this->load->view('detalhaEvento_view', $data);
	}

	function pesquisaEvento(){
		$data['row'] = $this->Eventos_model->pesquisaEventos($_POST);
		$this->load->view('resultadoPesquisaEvento_view', $data);
	}

	function meusEventos($cpf){
		$data['result'] = $this->Eventos_model->buscaMeusEventos($cpf);
		$this->load->view('meusEventos_view', $data);
	}

}
