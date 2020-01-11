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

  <div class="container">
    <div class="row">
    
          <div class="jumbotron  border_radius_none" style="list-style: none; border-right: solid 2px black; width: 25%; float: left; height: 550px">
            <div style="width: 215%;">
              <img class="navbar-brand" style="margin-bottom: 5%; margin-top: -5%; margin-left: 1.5%;" src="<?= base_url()?>assets/imagens/usuarios/<?= $this->session->userdata('imagem_perfil'); ?>"></a>
            </div>
           
              <li class="link" style="font-size: 30px; border-bottom: solid 2px black; text-align: center; margin-bottom: 10%;" href="#"><?= $nome[0]; ?></li>
              <li class="active" style="margin-bottom: 3%;"><a class="link" href="<?= site_url('User_controller/perfil');?>">Perfil</a></li>
              <li class="active" style="margin-bottom: 3%;"><a class="link" href="<?= site_url('Eventos_controller/meusEventos');?>/<?= $this->session->userdata("cpf"); ?>">Meus Eventos</a></li>
              <li style="margin-bottom: -5%;"><a class="link" data-toggle="modal" data-target="#exampleModalLogout" href="#">Logout</a></li>
              
          </div>
          <div class="jumbotron border_radius_none" style="float: left; width: 75%; height: 550px">
            
          <h2>Doações Feitas</h2>

          <?php 
                if($result == null){ ?>

                    <p style="text-align: center; margin-top: 20%;">Você ainda não efetuou nenhuma doação.<p>
                    
          <?php }else{ ?>

          <table class="table" style="margin-top: 2%;">
            <thead>
                    <tr>
                        <th scope="col">Tipo de doação</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Quantidade doada</th>
                        <th scope="col">Evento</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>

                  <?php 

                    foreach($result as $doacao){ ?>

                        <tr>
                            <td scope="row"><?= $doacao->tipo_doacao; ?></td>
                            <td><?= $doacao->descricao_doacao; ?></td>
                            <td><?= $doacao->qtd_doacao; ?></td>
                            <td><?= $doacao->nome_evento; ?></td>
                            <td> <a href="<?= site_url('Doacao_controller/editDoacao');?>/<?=$doacao->id_doacao ;?>">Editar</a> | 
                            <a href="#" data-toggle="modal" data-target="#exampleModalExcluir<?=$doacao->id_doacao ;?>">Excluir</a>


                            </td>
                        </tr>

                         <!-- modal de confirmação -->
                         <div class="modal" id="exampleModalExcluir<?= $doacao->id_doacao ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Tem certeza que deseja excluir essa doação?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                

                                    <div class="modal-body">
                                        <div style="float: right;">
                                            <button type="button" class="btn" style="background-color: grey; color: white;" data-dismiss="modal" aria-label="Close">Cancelar</button>
                                            
                                            <a class="btn btn-primary" href="<?= site_url('Doacao_controller/excluirDoacao');?>/<?=$doacao->id_doacao; ?>">Excluir</a>
                                        </div>
                                    </div>
                        
                                </div>
                            </div>
                        </div>
                        <!-- fim do modal -->


                <?php  } 
                } ?>


                </tbody>
            </table>
          </div>

    </div>
  </div>

<?php require("rodape.php"); ?>
