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

<section class="banner_part">
  <div class="container">
    <div class="row">

    <?php  
      $imagem = $this->session->userdata('imagem_perfil');
      $extensao = explode(".", $imagem);
    ?>
    
      <div class="jumbotron  border_radius_none" style="list-style: none; border-right: solid 2px black; width: 25%; float: left;">
        <div style="width: 215%;">
          <?php if($this->session->userdata('imagem_perfil') != null and $extensao[1] != null){ ?>
            <img class="navbar-brand" style="margin-bottom: 5%; margin-top: -5%; margin-left: 1.5%;" src="<?= base_url()?>assets/imagens/usuarios/<?= $this->session->userdata('imagem_perfil'); ?>">
          <?php } ?>
        </div>

          <li class="link" style="font-size: 30px; border-bottom: solid 2px black; text-align: center; margin-bottom: 10%;" href="#"><?= $nome[0]; ?></li>
          <li class="active" style="margin-bottom: 3%;"><a class="link" href="#">Meus Eventos</a></li>
          <li style="margin-bottom: 3%;"><a class="link" href="<?= site_url('Doacao_controller/userDoacao');?>/<?= $this->session->userdata("cpf"); ?>">Minhas Doações</a></li>
          <li style="margin-bottom: -5%;"><a class="link" data-toggle="modal" data-target="#exampleModalLogout" href="#">Logout</a></li>

          
      </div>
      <div class="jumbotron border_radius_none" style="float: left; width: 75%;">
        <h2>Editar Doação</h2>
        <br><br>

        <form name="formNovoEvento" method="post" action="<?= site_url('Doacao_controller/updateDoacao')?>/<?= $row->id_doacao ?> " >

            <label for="tipo_doacao">Tipo da Doação</label>
            <?php $doacoes = explode(",", $row->tipo_doacao_requerida); 
                foreach ($doacoes as $doacao){
                  if($doacao == "Alimentos"){
            ?>  
                <div class="form-group form-check">
                    <input type="radio" class="form-check-input" id="tipo_doacao" name="tipo_doacao" value="<?= $doacao ?>">
                    <label class="form-check-label" for="tipo_doacao"><?= $doacao ?></label>
                    <small class="form-text text-muted">Alimentos são medidos em kg.</small>
                </div>
            <?php }else{ ?>
                <div class="form-group form-check">
                    <input type="radio" class="form-check-input" id="tipo_doacao" name="tipo_doacao" value="<?= $doacao ?>">
                    <label class="form-check-label" for="tipo_doacao"><?= $doacao ?></label>
                </div>
            <?php 
                  }
                }
            ?>

              <div class="form-group">
                  <label for="descricao_doacao">Descrição da Doação</label>
                  <textarea rows="4" class="form-control" name="descricao_doacao" id="descricao_doacao" required> <?= $row->descricao_doacao; ?> </textarea>
              </div>
              <div class="form-group">
                  <label for="qtd_doacao">Quantidade</label>
                  <input type="number" class="form-control" style="width: 10%;" name="qtd_doacao" id="qtd_doacao" min="0" value="<?= $row->qtd_doacao; ?>" required>
              </div>



          <!-- modal de confirmação -->
          <div class="modal" id="exampleModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Tem certeza que deseja salvar as alterações?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    

                        <div class="modal-body">
                            <div style="float: right;">
                                <button type="button" class="btn" style="background-color: grey; color: white;" data-dismiss="modal" aria-label="Close">Cancelar</button>
                                
                                <button type="submit" class="btn btn-primary" value="save">Salvar</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fim do modal -->


            <a style="color: white;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalEditar">Atualizar</a>
        </form>
        
      </div>
    </div>
  </div>
</section>


<?php require("rodape.php"); ?>
