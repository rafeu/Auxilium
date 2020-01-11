<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos_model extends CI_model {

	public function __construct(){
		$this->load->database();
    }
    
    public function insereEvento(){

        $checkboxes = $this->input->post('check_list[]');
        $check_list = implode(", ", $checkboxes);

        $id = uniqid();

        $endereco = array(
            'id_endereco' => $id,
            'rua' => $this->input->post('rua'),
            'numero' => $this->input->post('numero'),
            'bairro' => $this->input->post('bairro')
        );

        $this->db->insert('endereco', $endereco);

        echo "<pre>"; var_dump($_FILES); echo "</pre>";

        $novoEvento = array(
            'nome_evento' => $this->input->post('nome_evento'),
            'descricao' => $this->input->post('descricao'),
            'id_endereco_fk' => $id,
            'tipo_doacao_requerida' => $check_list,
            'dataInicio' => $this->input->post('dataInicio'),
            'dataFim' => $this->input->post('dataFim'),
            'horaInicio' => $this->input->post('horaInicio'),
            'horaFim' => $this->input->post('horaFim'),
            'iniciativa' => $this->input->post('iniciativa'),
            'iniciativa_cpf_fk' => $this->input->post('iniciativa_cpf_fk')
        );
        
        if(isset($_FILES['arquivo'])){

            $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION); //pega  extensão do arquivo
            $novo_nome = md5(uniqid($_FILES['arquivo']['name'])) . "." . $extensao; //define o novo nome do arquivo
            $diretorio = "assets/imagens/eventos/"; //define a pasta destino da imagem
            $temp = $_FILES['arquivo']['tmp_name']; //nome temporário da imagem
            $formatosPermitidos= array("png", "jpeg", "jpg");

                if($_FILES["arquivo"]["size"] < 2000000 && in_array($extensao,$formatosPermitidos)){
                    move_uploaded_file($temp, $diretorio.$novo_nome); //efetua o upload

                    $novoEvento['imagem_evento'] = $novo_nome;
                }
        }

        $this->db->insert('eventos', $novoEvento);
    }


    function buscaEventos(){
        $query = $this->db->query('SELECT * FROM eventos, endereco WHERE id_endereco_fk = id_endereco');
        return $query->result();
    }


    function getDataEvento($id_evento){
        $query = $this->db->query('SELECT * FROM eventos, endereco WHERE `id_evento` = '. $id_evento .' and id_endereco_fk = id_endereco');
        return $query->row();
    }


    function updateEvento($id_evento){

        $checkboxes = $this->input->post('check_list[]');
        $check_list = implode(", ", $checkboxes);

        $endereco = array(
            'rua' => $this->input->post('rua'),
            'numero' => $this->input->post('numero'),
            'bairro' => $this->input->post('bairro')
        );

        $update = array(
            'nome_evento' => $this->input->post('nome_evento'),
            'descricao' => $this->input->post('descricao'),
            'tipo_doacao_requerida' => $check_list,
            'dataInicio' => $this->input->post('dataInicio'),
            'dataFim' => $this->input->post('dataFim'),
            'horaInicio' => $this->input->post('horaInicio'),
            'horaFim' => $this->input->post('horaFim'),
        );

        if($_FILES['arquivo']['name'] != NULL){
            $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION); //pega  extensão do arquivo
            $novo_nome = md5(uniqid($_FILES['arquivo']['name'])) . "." . $extensao; //define o novo nome do arquivo
            $diretorio = "assets/imagens/eventos/"; //define a pasta destino da imagem
            $temp = $_FILES['arquivo']['tmp_name']; //nome temporário da imagem
            $formatosPermitidos= array("png", "jpeg", "jpg");

            if($_FILES["arquivo"]["size"] < 2000000 && in_array($extensao,$formatosPermitidos)){
                move_uploaded_file($temp, $diretorio.$novo_nome); //efetua o upload

                $update['imagem_evento'] = $novo_nome;
            }
            
            $row = $this->getDataEvento($id_evento); //if para apagar da pasta a foto antiga do usuário
            if($row->imagem_evento != 'evento.png'){
                unlink($diretorio.$row->imagem_evento);
            }
        }


        $this->db->where('id_evento', $id_evento);
        $this->db->update('eventos', $update);

        $this->db->where('id_endereco', $this->input->post('id_endereco'));
        $this->db->update('endereco', $endereco);
    }


    function excluirEvento($id_evento, $endereco){
        
        $query = $this->db->query('DELETE FROM eventos WHERE `id_evento` = '. $id_evento );
        $query = $this->db->query('DELETE FROM endereco WHERE `id_endereco` = "'. $endereco .' " ');
        
    }

    function pesquisaEventos($pesquisa){

        $pesquisa = $this->input->post('txtBusca');

        $this->db->from('eventos');
        $this->db->join('endereco', 'id_endereco = id_endereco_fk');

        $this->db->like('nome_evento', $pesquisa);
        $this->db->or_like('rua', $pesquisa);
        $this->db->or_like('bairro', $pesquisa);

        $query = $this->db->get();

        return $query->result_array();
    }

    function buscaMeusEventos($cpf){
        $query = $this->db->query('SELECT * FROM eventos, endereco WHERE iniciativa_cpf_fk = '. $cpf .' and id_endereco = id_endereco_fk ');
        return $query->result();
    }


}