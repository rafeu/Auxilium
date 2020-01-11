<?php require("cabecalho.php"); ?>



    <!-- Modal Cadastro -->
    <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Cadastro de Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="formNovoEvento" method="post" action="<?= site_url('Eventos_controller/createEvento') ?> " >
                    <div class="form-group">
                        <label for="Nome">Nome do Evento</label>
                        <input type="text" class="form-control" name="nome_evento" id="nome_evento" placeholder="Nome do evento" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" required>
                    </div>
                    <!-- CHECKBOXES -->
                    <br>
                    <div class="form-group">
                        <label>Doações Requeridas</label>
                        <br>
                        <div class="conjunto" style="float:left ">
                            <input type="checkbox" name="check_list[]" id="tecidos" value="Tecidos" style="height: 1.5em;width: 1.5em;">
                            <label for="tecidos" style="font-size:1.1em;">Tecidos em geral (roupas, cobertores...)</label>
                        </div>

                        <div class="conjunto" style="float:right; margin-right: 5%;">
                            <input type="checkbox" name="check_list[]" id="brinquedos" value="Brinquedos" style="height: 1.5em;width: 1.5em;">
                            <label for="brinquedos" style="font-size:1.1em;">Brinquedos</label>
                        </div>

                        <div style="clear:both;"></div>

                        <div class="conjunto" style="float:left">
                            <input type="checkbox" name="check_list[]" id="materiaisConstrução" value="Materiais de construção" style="height: 1.5em;width: 1.5em;">
                            <label for="materiaisConstrução" style="font-size:1.1em;">Materiais de Construção</label>
                        </div>

                     

                        <div class="conjunto" style="float:right; margin-right:6.8%;">
                            <input type="checkbox" name="check_list[]" id="alimentos" value="Alimentos" style="height: 1.5em;width: 1.5em;"> 
                            <label for="alimentos" style="font-size:1.1em;">Alimentos</label>
                        </div>

                        <!-- <div class="conjunto" style="float:right; margin-right: 11.8%;">
                            <input type="checkbox" name="check_list[]" id="outros" value="Outros" style="height: 1.5em;width: 1.5em;"> 
                            <label for="outros" style="font-size:1.1em;">Outros</label>
                        </div>               -->
                    </div>
                    <!-- CHECKBOXES -->
                    <br><br>
                    <div style="clear:both;"></div>
                    <div>
                        <label for="imagem_evento">Foto do evento</label><br>
                        <input type="file" name="arquivo">
                        <small class="form-text text muted">A foto deve ser obrigatóriamente relacionada ao evento.</small>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>Endereço</label><br>
                        <input type="text" class="form-control" name="rua" id="rua" placeholder="Rua" required>
                        <br>
                        <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" required>
                        <br>
                        <input type="number" class="form-control" name="numero" id="numero" placeholder="Número" required>
                    </div>
                    <div class="form-group">
                        <label for="dataInicio">Data de inicio</label>
                        <input type="text" class="form-control" name="dataInicio" id="dataInicio" placeholder="Data de inicio" required>
                        <small class="form-text text-muted">O campo preenche a pontuação sozinho.</small>
                    </div>
                    <div class="form-group">
                        <label for="dataFim">Data de fim</label>
                        <input type="text" class="form-control" name="dataFim" id="dataFim" placeholder="Data de fim" required>
                        <small class="form-text text-muted">O campo preenche a pontuação sozinho.</small>
                    </div>
                    <div class="form-group">
                        <label for="horaInicio">Horário de inicio</label>
                        <input type="text" class="form-control" name="horaInicio" id="horaInicio" placeholder="Horário de inicio" required>
                        <small class="form-text text-muted">O campo preenche a pontuação sozinho.</small>
                    </div>
                    <div class="form-group">
                        <label for="horaFim">Horário de fim</label>
                        <input type="text" class="form-control" name="horaFim" id="horaFim" placeholder="Horário de fim" required>
                        <small class="form-text text-muted">O campo preenche a pontuação sozinho.</small>
                    </div>

                    <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Não sou um robô.</label>
                </div>
            

                    <div class="form-group">
                        <input type="hidden" name="iniciativa" id="iniciativa" value="<?= $this->session->userdata("nome_user") ?>">
                        <input type="hidden" name="iniciativa_cpf_fk" id="iniciativa_cpf_fk" value="<?= $this->session->userdata("cpf") ?>">
                    </div>

                    <button type="submit" class="btn btn-primary" value="save">Cadastrar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->

    <!--::review_part start::-->
    <section class="special_cource padding_top" style="margin-top: 5%;">
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center">
                    <div style="width: 100%;">
                        <div class="section_tittle text-center">
                            <h2>Meus eventos</h2>
                        </div>
                    </div>

                <div style="width: 10% ">
                    <?php if($this->session->userdata('logged_in') == TRUE): ?>      
                        <div>
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro" >
                                Cadastrar
                            </button>
                        </div>
                    <?php endif; ?>
                    
                </div>

                    <div class="row" style="margin-top: 3%; width: 100%;">
                        <?php 
                            if($result == null){ ?>
                                <div style="text-align: center; width: 100%;">
                                    <h5 style="margin-top: 10%; padding: 11px; background-color: #f4f4f4;">Não há nenhum evento cadastrado.</h5>
                                </div>
                        <?php }else{ ?>
                        <?php foreach($result as $evento){ ?>

                        <div class="col-sm-6 col-lg-4" style="margin-bottom: 3%;">
                            <div class="single_special_cource">
                                <div style=" height: 260px; background-image: url(<?= base_url(); ?>assets/imagens/eventos/<?= $evento->imagem_evento?>); background-position: center; background-repeat: no-repeat; background-size: cover; background-clip: content-box;" class="special_img" style="max-width: 100%;"></div>
                                <div class="special_cource_text">
                                    <h4 class="btn_4"><?= $evento->dataInicio?> - <?=$evento->horaInicio ?></h4>
                                    <a href="<?= site_url('Eventos_controller/perfilEvento');?>/<?= $evento->id_evento ?>">
                                        <h3><?= $evento->nome_evento; ?></h3>
                                    </a>
                                    <div style="overflow: hidden; height: 55px;">
                                        <p class="card-text"><?= $evento->descricao; ?></p>
                                    </div>
                                    <br>
                                    <div class="author_info_text">
                                        <p>Endereco:</p>
                                        <h5>  Rua <?=$evento->rua ?>, n° <?=$evento->numero ?> -  <?=$evento->bairro ?></h5>
                                    </div>
                                    <?php 
                                     
                                            if($this->session->userdata('cpf') == $evento->iniciativa_cpf_fk): ?>
                                                
                                        <div>
                                            <a href="<?= site_url('Eventos_controller/indexEditar');?>/<?=$evento->id_evento; ?>">Editar</a> | 
                                            <a href="#" data-toggle="modal" data-target="#exampleModalExcluir<?=$evento->id_evento; ?>">Excluir</a>
                                        </div>

                                            <!-- modal de confirmação -->
                                            <div class="modal" id="exampleModalExcluir<?= $evento->id_evento; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Tem certeza que deseja excluir o evento <?= $evento->nome_evento; ?>?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    

                                                        <div class="modal-body">
                                                            <div style="float: right;">
                                                                <button type="button" class="btn" style="background-color: grey; color: white;" data-dismiss="modal" aria-label="Close">Cancelar</button>
                                                                
                                                                <a class="btn btn-primary" href="<?= site_url('Eventos_controller/excluirEvento');?>/<?=$evento->id_evento; ?>">Excluir</a>
                                                            </div>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- fim do modal -->

                                        <?php endif; ?>

                                    <div class="author_info">
                                        <div class="author_img">
                                            <img src="img/author/author_1.png" alt="">
                                            <div class="author_info_text" style="height: 65px">
                                                <p>Iniciativa:</p>
                                                <h5 style="margin-left: 15%;"> <?=$evento->iniciativa ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } 
                    }?>

                    </div>
                    </div>
                </div>
            </section>
        </secition>
            <!--::blog_part end::-->

 

<?php require("rodape.php"); ?>