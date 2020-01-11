<?php require("cabecalho.php"); ?>

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">

            <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro" style="margin-top: 20%">
                Cadastrar
                </button>

                <!-- Modal Cadastro -->
                <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Cadastro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="formNovoEvento" method="post" action="<?= site_url('User_controller/createUser') ?> " >
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF" required>
                                    <small class="form-text text-muted">O campo preenche a pontuação sozinho.</small>
                                </div>
                                <div class="form-group">
                                    <label for="nomeCompleto">Nome</label>
                                    <input type="text" class="form-control" name="nome_user" id="nomeCompleto" placeholder="Nome Completo">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="dataNascimento">Data de Nascimento</label>
                                    <input type="text" class="form-control" name="dt_nasc" id="dataNascimento" placeholder="Data de Nascimento">
                                    <small class="form-text text-muted">O campo preenche a pontuação sozinho.</small>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone">
                                    <small class="form-text text-muted">Residencial ou celular.</small>
                                </div>
                                <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirmaSenha">Confirmar Senha</label>
                                    <input type="password" class="form-control" name="" id="confirmaSenha" placeholder="Confirmar senha" required>
                                </div>

                                <?php if($this->session->userdata('tip_user') == 1){ ?>
                
                                <div style="background-color: #DCDCDC; padding: 1%;">
                                    <h5>Opções de desenvolvedor</h5>
                                    <div class="form-group">
                                        <label for="tip_user">Tipo do Usuário</label>
                                        <input type="number" class="form-control" name="tip_user" id="tip_user" min="0" max="1" value="0">
                                    </div>
                                </div>
                                <br>

                                <?php }elseif($this->session->userdata('tip_user') == 2 ){ ?>

                                <div style="background-color: #DCDCDC; padding: 1%;">
                                    <h5>Opções de desenvolvedor</h5>
                                    <div class="form-group">
                                        <label for="tip_user">Tipo do Usuário</label>
                                        <input type="number" class="form-control" name="tip_user" id="tip_user" min="0" max="2" value="0">
                                    </div>
                                </div>
                                <br>
                                <?php } ?>

                                <button type="submit" class="btn btn-primary" id="submit" value="save">Registrar</button>
                            </form>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                                <script>
                                    $(function(){
                                        $("#submit").click(function(){
                                        var senha = $("#senha").val();
                                        var senha2 = $("#confirmaSenha").val();
                                            if(senha != senha2){
                                                event.preventDefault();
                                                alert("As senhas não são iguais!");
                                            }
                                        });
                                    });
                            </script>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- end Modal -->

                <table class="table" style="margin-top: 2%;">
                    <thead>
                        <tr>
                            <th scope="col">CPF</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo de usuário</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Nascimento</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach($result as $usuario){ ?>

                        <tr>
                            <th scope="row"><?= $usuario->cpf; ?></th>
                            <td><?= $usuario->nome_user; ?></td>

                            <?php if($usuario->tip_user == 2){?>
                                <td>Administrador</td>
                            <?php }elseif($usuario->tip_user == 1){ ?>
                                <td>Moderador</td>
                            <?php }elseif($usuario->tip_user == 0){ ?>
                                <td>Usuário Comum</td>
                            <?php } ?>
                            
                            <td><?= $usuario->email; ?></td>
                            <td><?= $usuario->telefone; ?></td>
                            <td><?= $usuario->dt_nasc; ?></td>
                            <?php   
                            
                            if($this->session->userdata('tip_user') == '1'){ 
                                if($usuario->tip_user == 2 or $usuario->tip_user == 1 ){ 
                            
                            ?>
                                <td>
                                    <a style="color: #D0D0D0;">Editar</a> | 
                                    <a style="color: #D0D0D0;">Excluir</a>
                                </td>

                            <?php }else{ ?>

                            <td>
                                <a href="<?= site_url('User_controller/indexEditar');?>/<?=$usuario->cpf; ?>">Editar</a> | 
                                <a href="#" data-toggle="modal" data-target="#exampleModalExcluir<?= $usuario->cpf ?>">Excluir</a>
                            </td>

                            <?php   

                                } 
                            }elseif($this->session->userdata('tip_user') == '2'){ 
                                
                            ?>       
                                        
                            <td>
                                <a href="<?= site_url('User_controller/indexEditar');?>/<?=$usuario->cpf; ?>">Editar</a> | 
                                <a href="#" data-toggle="modal" data-target="#exampleModalExcluir<?= $usuario->cpf ?>">Excluir</a>
                            </td>
                            <?php } ?>
                        </tr>

                        <!-- modal de confirmação -->
                        <div class="modal" id="exampleModalExcluir<?= $usuario->cpf ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Tem certeza que deseja excluir o usuário <?= $usuario->nome_user ?>?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                

                                    <div class="modal-body">
                                        <div style="float: right;">
                                            <button type="button" class="btn" style="background-color: grey; color: white;" data-dismiss="modal" aria-label="Close">Cancelar</button>
                                            
                                            <a class="btn btn-primary" href="<?= site_url('User_controller/excluirUser');?>/<?=$usuario->cpf; ?>">Excluir</a>
                                        </div>
                                    </div>
                        
                                </div>
                            </div>
                        </div>
                        <!-- fim do modal -->

                    <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </section>
    <!-- banner part start-->

    
                        

    <?php require("rodape.php"); ?>
