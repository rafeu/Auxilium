<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_model {

	public function __construct(){
		$this->load->database();
    }

    public function insereUser(){

        $novoUser = array(
            'cpf' => $this->input->post('cpf'),
            'nome_user' => $this->input->post('nome_user'),
            'email' => $this->input->post('email'),
            'dt_nasc' => $this->input->post('dt_nasc'),
            'telefone' => $this->input->post('telefone'),
            'senha' => md5($this->input->post('senha'))
            
        );

        if(null != $this->input->post('tip_user')){
            $novoUser['tip_user'] = $this->input->post('tip_user'); 
        }

        if(isset($_FILES['arquivo'])){

            $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION); //pega  extensão do arquivo
            $novo_nome = md5(uniqid($_FILES['arquivo']['name'])) . "." . $extensao; //define o novo nome do arquivo
            $diretorio = "assets/imagens/usuarios/"; //define a pasta destino da imagem
            $temp = $_FILES['arquivo']['tmp_name']; //nome temporário da imagem
            $formatosPermitidos= array("png", "jpeg", "jpg");

                if($_FILES["arquivo"]["size"] < 2000000 && in_array($extensao,$formatosPermitidos)){
                    move_uploaded_file($temp, $diretorio.$novo_nome); //efetua o upload

                    $novoUser['imagem_perfil'] = $novo_nome;
                }

        }


        $chars = array(".", "-", "/", "(", ")");
        $novoUser['cpf'] = str_replace($chars, "", $novoUser['cpf']);
        $novoUser['telefone'] = str_replace($chars, "", $novoUser['telefone']);

        $this->db->insert('usuario', $novoUser);

    }


    function buscaUser(){
        $query = $this->db->query('SELECT * FROM usuario ORDER BY tip_user DESC');
        return $query->result();
    }


    function getData($cpf){
        $query = $this->db->query('SELECT * FROM usuario WHERE `cpf` = '. $cpf );
        return $query->row();
    }


    function updateUser($cpf){
        

        $tip = array(
            'tip_user' => $this->input->post('tip_user')
        );


        $update = array(
            'cpf' => $this->input->post('cpf'),
            'nome_user' => $this->input->post('nome_user'),
            'email' => $this->input->post('email'),
            'dt_nasc' => $this->input->post('dt_nasc'),
            'telefone' => $this->input->post('telefone'),
            'tip_user' => $this->input->post('tip_user') 
        );

        if($this->input->post('senhaEdit') != NULL){
            $update['senha'] = md5($this->input->post('senhaEdit'));
        }


        if($_FILES['arquivo']['name'] != NULL){
            $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION); //pega  extensão do arquivo
            $novo_nome = md5(uniqid($_FILES['arquivo']['name'])) . "." . $extensao; //define o novo nome do arquivo
            $diretorio = "assets/imagens/usuarios/"; //define a pasta destino da imagem
            $temp = $_FILES['arquivo']['tmp_name']; //nome temporário da imagem
            $formatosPermitidos= array("png", "jpeg", "jpg");
            
            if($_FILES["arquivo"]["size"] < 2000000 && in_array($extensao,$formatosPermitidos)){
                move_uploaded_file($temp, $diretorio.$novo_nome); //efetua o upload

                $update['imagem_perfil'] = $novo_nome;
            }
            
            $row = $this->getData($cpf); //if para apagar da pasta a foto antiga do usuário
            if($row->imagem_perfil != 'usuario.png'){
                unlink($diretorio.$row->imagem_perfil);
            }
        }

        $chars = array(".", "-", "/", "(", ")");
        $update['cpf'] = str_replace($chars, "", $update['cpf']);
        $update['telefone'] = str_replace($chars, "", $update['telefone']);

        $this->db->where('cpf', $cpf);
        $this->db->update('usuario', $update);
        $update['logged_in'] = true;

        if($cpf == $this->session->userdata('cpf')){ //só atualiza os dados imediatamente se o editor for o dono da conta 
            $this->session->set_userdata($update);
        }
    }


    function excluirUser($cpf){
        $query = $this->db->query('DELETE FROM usuario WHERE `cpf` = '. $cpf);
    }


    function validate($email, $senha){
        $this->db->where('email',$email);
        $this->db->where('senha',$senha);
        $result = $this->db->get('usuario', 1);
        return $result;
      }
}