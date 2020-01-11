<?php require("cabecalho.php"); ?>

<section class="banner_part">
    <div class="container" style="margin-top: 10%;">
    
    <div class="row justify-content-center" style="margin-bottom: 5%;">
        <div class="col-xl-5">
            <div class="section_tittle text-center">
                <h2>Cadastro de Doação</h2>
            </div>
        </div>
    </div>

        <br>
        <br>
            <form name="formNovoEvento" method="post" action="<?= site_url('Doacao_controller/createDoacao')?>/<?= $result[0]->id_evento ?>" >
                
                <label for="tipo_doacao">Tipo de Doação</label>
                <?php $doacoes = explode(",", $result[0]->tipo_doacao_requerida); 
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
                    <label for="descricao_doacao">Descrição da doação</label>
                    <input type="text" class="form-control" name="descricao_doacao" id="descricao_doacao">
                    <small class="form-text text-muted">(Ex: Carrinhos hot wheels seminovos).</small>
                </div>
                
                <div class="form-group">
                    <label for="qtd_doacao">Quantidade de itens</label>
                    <input type="number" class="form-control" style="width: 10%;" name="qtd_doacao" id="qtd_doacao" min="0" required>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Através deste, afirmo que a doação será realizada com até 3 dias de antecedencia ao evento. Sujeito a punições.</label>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Não sou um robô.</label>
                </div>
                <div class="form-group form-check">
                    <input type="hidden" class="form-check-input" name="cpf_fk" id="cpf_fk" value="<?= $this->session->userdata("cpf"); ?>" required>
                    <input type="hidden" class="form-check-input" name="id_evento_fk" id="id_evento_fk" value="<?= $result[0]->id_evento ?>" required>
                </div>
        
                <button type="submit" class="btn btn-primary" style="width: 20%;" value="save">Doar</button>
            </form>
        </div>
    </div>
</section>
<br>
<br>

<?php require("rodape.php"); ?>