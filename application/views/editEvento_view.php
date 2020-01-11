<?php require("cabecalho.php"); ?>

<section class="banner_part">
    <div class="container" style="margin-top: 10%;">
        <h1> Editar Evento </h1>
        <br>
        <br>
            <form name="formNovoEvento" method="post" action="<?= site_url('Eventos_controller/updateEvento')?>/<?= $row->id_evento; ?>" enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="Nome">Nome do Evento</label>
                    <input type="text" class="form-control" name="nome_evento" id="nome_evento" value="<?= $row->nome_evento ?> ">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" value="<?= $row->descricao ?> ">
                </div>
                <!-- CHECKBOXES -->
                <div class="form-group">
                    <label>Doações Requeridas</label>
                    <br><br>
                    <div class="conjunto" style="float:left ">
                        <input type="checkbox" name="check_list[]" id="tecidos" value="Tecidos" style="height: 1.5em;width: 1.5em;">
                        <label for="tecidos" style="font-size:1.1em;">Tecidos em geral (roupas, cobertores...)</label>
                    </div>

                    <div class="conjunto" style="float:right; margin-right: 55%;">
                        <input type="checkbox" name="check_list[]" id="brinquedos" value="Brinquedos" style="height: 1.5em;width: 1.5em;">
                        <label for="brinquedos" style="font-size:1.1em;">Brinquedos</label>
                    </div>

                    <div style="clear:both;"></div>

                    <div class="conjunto" style="float:left">
                        <input type="checkbox" name="check_list[]" id="materiaisConstrução" value="Materiais de construção" style="height: 1.5em;width: 1.5em;">
                        <label for="materiaisConstrução" style="font-size:1.1em;">Materiais de Construção</label>
                    </div>

                    <div class="conjunto" style="float:right; margin-right: 55.7%;">
                        <input type="checkbox" name="check_list[]" id="alimentos" value="Alimentos" style="height: 1.5em;width: 1.5em;"> 
                        <label for="alimentos" style="font-size:1.1em;">Alimentos</label>
                    </div>

                </div>
                <!-- CHECKBOXES -->
                <br><br>
                <div>
                    <label for="imagem_evento">Foto do evento</label><br>
                    <input type="file" name="arquivo">
                    <small class="form-text text muted">A foto deve ser obrigatóriamente relacionada ao evento.</small>
                </div>
                <br><br>
                
                <div class="form-group">
                    <label>Endereço</label><br>
                    <input type="text" class="form-control" name="rua" id="rua" value="<?= $row->rua ?>" required>
                    <br>
                    <input type="text" class="form-control" name="bairro" id="bairro" value="<?= $row->bairro ?>" required>
                    <br>
                    <input type="number" class="form-control" name="numero" id="numero" value="<?= $row->numero ?>" required>

                    <input type="hidden" name="id_endereco" id="id_endereco" value="<?= $row->id_endereco ?>">
                    </div>
                <div class="form-group">
                    <label for="dataInicio">Data de inicio</label>
                    <input type="text" class="form-control" name="dataInicio" id="data" value="<?= $row->dataInicio ?> ">
                </div>
                <div class="form-group">
                    <label for="dataFim">Data de fim</label>
                    <input type="text" class="form-control" name="dataFim" id="data" value="<?= $row->dataFim ?> ">
                </div>
                <div class="form-group">
                    <label for="horaInicio">Horário de inicio</label>
                    <input type="text" class="form-control" name="horaInicio" id="hora" value="<?= $row->horaInicio ?> ">
                </div>
                <div class="form-group">
                    <label for="horaFim">Horário de fim</label>
                    <input type="text" class="form-control" name="horaFim" id="hora" value="<?= $row->horaFim?> ">
                </div>


                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Não sou um robô.</label>
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
</section>
<br>
<br>

<?php require("rodape.php"); ?>