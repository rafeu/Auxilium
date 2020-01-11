<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doacao_model extends CI_model {

	public function __construct(){
		$this->load->database();
    }
    
    public function insereDoacao(){
        $novaDoacao = array(
            'tipo_doacao' => $this->input->post('tipo_doacao'),
            'descricao_doacao' => $this->input->post('descricao_doacao'),
            'qtd_doacao' => $this->input->post('qtd_doacao'),
            'cpf_fk' => $this->input->post('cpf_fk'),
            'id_evento_fk' => $this->input->post('id_evento_fk')
        );
        
        $this->db->insert('doacao', $novaDoacao);
    }


    function buscaDoacao($id_evento){
        $query = $this->db->query('SELECT tipo_doacao_requerida, id_evento FROM eventos where id_evento ='. $id_evento);
        return $query->result();
    }


    function buscaDoacaoEspecifica($id_doacao){
        $query = $this->db->query('SELECT id_doacao, tipo_doacao, qtd_doacao, nome_evento, descricao_doacao, tipo_doacao_requerida FROM doacao, eventos where id_doacao ='. $id_doacao);
        return $query->row();
    }


    function getDataDoacao($cpf){
        $query = $this->db->query('SELECT id_doacao, tipo_doacao, qtd_doacao, nome_evento, descricao_doacao FROM doacao, usuario, eventos WHERE `id_evento` = `id_evento_fk` and `cpf_fk` = ' . $cpf . ' GROUP BY `id_doacao` ');
        return $query->result();
    }


    function updateDoacao($id_doacao){
        $update = array(
            'tipo_doacao' => $this->input->post('tipo_doacao'),
            'descricao_doacao' => $this->input->post('descricao_doacao'),
            'qtd_doacao' => $this->input->post('qtd_doacao')
        );

        $this->db->where('id_doacao', $id_doacao);
        $this->db->update('doacao', $update);
    }


    function excluirDoacao($id_doacao){
        $query = $this->db->query('DELETE FROM doacao WHERE `id_doacao` = '. $id_doacao);
    }
}