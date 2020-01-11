<?php require("cabecalho.php"); ?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<!-- <section class="banner_part"> -->
  <div class="container">
    <div class="row">
    
    <?php  
      $imagem = $this->session->userdata('imagem_perfil');
      $extensao = explode(".", $imagem);
    ?>
    
      <div class="jumbotron  border_radius_none" style="list-style: none; border-right: solid 2px black; width: 25%; float: left; height: 550px">
        <div style="width: 215%;">
          <?php if($this->session->userdata('imagem_perfil') != null and $extensao[1] != null){ ?>
            <img class="navbar-brand" style="margin-bottom: 5%; margin-top: -5%; margin-left: 1.5%;" src="<?= base_url()?>assets/imagens/usuarios/<?= $this->session->userdata('imagem_perfil'); ?>">
          <?php } ?>
        </div>

  
          <li class="link" style="font-size: 30px; border-bottom: solid 2px black; text-align: center; margin-bottom: 10%;" href="#"><?= $nome[0]; ?></li>
          <li class="active" style="margin-bottom: 3%;"><a class="link" href="<?= site_url('Eventos_controller/meusEventos');?>/<?= $this->session->userdata("cpf"); ?>">Meus Eventos</a></li>
          <li style="margin-bottom: 3%;"><a class="link" href="<?= site_url('Doacao_controller/userDoacao');?>/<?= $this->session->userdata("cpf"); ?>">Minhas Doações</a></li>
          <li style="margin-bottom: -5%;"><a class="link" data-toggle="modal" data-target="#exampleModalLogout" href="#">Logout</a></li>

          
      </div>
      <div class="jumbotron border_radius_none" style="float: left; width: 75%; height: 550px">
        <h2>Informações Pessoais</h2>
        <br><br>
        <h4>CPF: </h4><h4 style="color: grey;"><?= $this->session->userdata("cpf"); ?></h4>
        <br>
        <h4>Email: </h4><h4 style="color: grey;" ><?= $this->session->userdata("email"); ?></h4>
        <br>
        <h4>Telefone: </h4><h4 style="color: grey;"><?= $this->session->userdata("telefone"); ?></h4>
        
        <a href="<?= site_url('User_controller/indexEditar');?>/<?=$this->session->userdata("cpf"); ?>" class="btn_1" style="float: right; margin-right: -0.5%; margin-top: 14%; color: white;"> Editar </a>
        
      </div>

    </div>
  </div>
</section>

<?php require("rodape.php"); ?>
