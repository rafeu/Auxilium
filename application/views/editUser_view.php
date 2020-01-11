<?php require("cabecalho.php"); ?>

<section class="banner_part">
    <div class="container" style="margin-top: 10%;">
        <h1> Editar Usuário </h1>
        <br>
        <br>
            <form name="formNovoEvento" method="post" id="editUser" action="<?= site_url('User_controller/updateUser')?>/<?= $row->cpf; ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" value="<?= $row->cpf; ?>" placeholder="CPF" required>
                    <small class="form-text text-muted">O campo preenche a pontuação sozinho.</small>
                </div>
                <div class="form-group">
                    <label for="nomeCompleto">Nome</label>
                    <input type="text" class="form-control" name="nome_user" id="nomeCompleto" value="<?= $row->nome_user; ?>" placeholder="Nome Completo">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= $row->email; ?>" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="dataNascimento">Data de Nascimento</label>
                    <input type="text" class="form-control" name="dt_nasc" id="dataNascimento" value="<?= $row->dt_nasc; ?>" placeholder="Data de Nascimento">
                    <small class="form-text text-muted">O campo preenche a pontuação sozinho.</small>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="telefone" value="<?= $row->telefone; ?>" placeholder="Telefone">
                    <small class="form-text text-muted">Residencial ou celular.</small>
                </div>
                <div>
                    <label for="imagem_perfil">Foto de perfil</label><br>
                    <input type="file" name="arquivo">
                    <small class="form-text text muted">Foto de perfil não obrigatória.</small>
                </div>
                <br>

                <?php if($this->session->userdata('tip_user') == 2 ){ ?>

                <div style="background-color: #DCDCDC; padding: 1%;">
                    <h5>Opções de administrador</h5>
                    <div class="form-group">
                        <label for="tip_user">Tipo do Usuário</label>
                        <input type="number" class="form-control" name="tip_user" id="tip_user" min="0" max="2" value="<?= $row->tip_user; ?>">
                    </div>
                </div>
                <br>
                <?php } ?>
                <?php if($row->cpf == $this->session->userdata('cpf')){ //só aparece a opção de senha se o editor for o dono da conta ?>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senhaEdit" placeholder="Senha" required>
                </div>
                

                <div class="form-group">
                    <label for="confirmaSenha">Confirmar Senha</label>
                    <input type="password" class="form-control" name="" id="confirmaSenhaEdit" placeholder="Confirmar senha" required>
                </div>

                <?php } ?>
            
            
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
</section>
<br>
<br>
        
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script>
                $(function(){
                    $("#editUser").submit(function(){
                    var senha  = $("#senhaEdit").val();
                    var senha2 = $("#confirmaSenhaEdit").val();
                        if(senha != senha2){
                            event.preventDefault();
                            alert("As senhas não são iguais!");
                        }
                    });
                });
            </script>

                
    

<?php require("rodape.php"); ?>