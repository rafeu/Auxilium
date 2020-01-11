<?php require("cabecalho.php"); ?>


<section class="banner_part">
    <div class="container" style="margin-top: 10%;">
        <h1> Cadastro de Usuário</h1>
        <br>
        <br>
            <form id="novoUser" name="formNovoEvento" method="post" action="<?= site_url('User_controller/createUser') ?>" enctype="multipart/form-data">
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
                    <input type="email" class="form-control" name="email" id="emailCadastro" placeholder="Email">
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
                <div>
                    <label for="imagem_perfil">Foto de perfil</label><br>
                    <input type="file" name="arquivo">
                    <small class="form-text text muted">Foto de perfil não obrigatória.</small>
                </div>
                <br>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senhaCadastro" placeholder="Senha" required>
                </div>
                <div class="form-group">
                    <label for="confirmaSenha">Confirmar Senha</label>
                    <input type="password" class="form-control" name="confirmaSenha" id="confirmaSenha" placeholder="Confirmar senha" required>
                </div> 


                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Não sou um robô.</label>
                </div>

                <?php if($this->session->userdata('tip_user') == 1){ ?>
                
                <div style="background-color: #DCDCDC; padding: 1%;">
                    <h5>Opções de desenvolvedor</h5>
                    <div class="form-group">
                        <label for="tip_user">Tipo do Usuário</label>
                        <input type="number" class="form-control" name="tip_user" id="tip_user" min="0" max="1" value="<?= $row->tip_user; ?>">
                    </div>
                </div>
                <br>

                <?php }elseif($this->session->userdata('tip_user') == 2 ){ ?>

                <div style="background-color: #DCDCDC; padding: 1%;">
                    <h5>Opções de desenvolvedor</h5>
                    <div class="form-group">
                        <label for="tip_user">Tipo do Usuário</label>
                        <input type="number" class="form-control" name="tip_user" id="tip_user" min="0" max="2" value="<?= $row->tip_user; ?>">
                    </div>
                </div>
                <br>
                <?php } ?>
            
            

                <button type="submit" id="submit" class="btn btn-primary" value="save">Registrar</button>
                
            </form>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script>
                $(function(){
                    $("#novoUser").submit(function(){
                    var senha  = $("#senhaCadastro").val();
                    var senha2 = $("#confirmaSenha").val();
                        if(senha != senha2){
                            event.preventDefault();
                            alert("As senhas não são iguais!");
                        }
                    });
                });
            </script>

        </div>
    </div>
</section>
<br>
<br>

<?php require("rodape.php"); ?>