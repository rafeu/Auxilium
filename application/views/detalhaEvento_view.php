<?php include('cabecalho.php'); ?>

<section class="banner_part">

    <div class="container">
        <div class="row align-items-center">
            <div class="detalha_container">

                <!-- AQUI COLOCA O NOME, DEIXA AS CLASS -->
                <div>
                    <h1 class="nome_detalha" style="text-align: center; border-bottom: 2px solid #0c2e60;"><?= $row->nome_evento ?></h1>
                </div>
            </div>
                

                <!-- AQUI LINKAR A IMG QUANDO ESTIVER COM A OPÇÃO -->
            <div style="display: flex;
                        align-items: stretch;
                        width: 100%;
                        margin-top: 3.5%;
                        background-color: #ececec;">
            <div style="width: 50%;">
            
                <div class="img_detalha" style="
                    height: 500px;
                    background-image: url(<?= base_url(); ?>assets/imagens/eventos/<?= $row->imagem_evento?>); 
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-clip: content-box;
                    padding: 3%;
                    display: flex;"></div>
        

            
            
            <!-- AQUI COLOCA A DESCRICAO -->
            </div>
            <div class="descricao_detalha" style="background-color: #ececec; padding: 0% 3%">
                <div>
                <br><br>
                <h4>Data </h4><br><h4 style="color: grey;"> Inicio: <?= $row->dataInicio?> - <?=$row->horaInicio ?> </h4><h4 style="color: grey; border-bottom: solid 2px; height: 50px;"> Fim: <?= $row->dataFim?> - <?= $row->horaFim ?> </h4>
                <br>

                <h4>Local </h4><br><h4 style="color: grey; border-bottom: solid 2px; height: 50px;"> Rua <?= $row->rua?>, nº <?= $row->numero?> - <?= $row->bairro?> </h4></h4>
                <br>

                <h4>Doações Necessárias </h4>
                <br>

                <?php $doacoes = explode(",", $row->tipo_doacao_requerida); 
                    foreach ($doacoes as $doacao):
                ?>
                    
                    <h4 style="color: grey;"> <?= $doacao ?></h4>
                
                <?php    
                    endforeach;
                ?>
                
                </div>

                <?php if($this->session->userdata('logged_in') == TRUE): ?>
                <!-- AQUI CADASTRA A DOAÇÃO -->
                <div class="descricao_envia">
                    <a href="<?= site_url('Doacao_controller/indexCadastrar');?>/<?= $row->id_evento; ?>" class="btn_1" style="color: white; float: right;"> Realizar Doação </a>
                </div>
                <?php endif; ?>

            </div>
            </div>
            <div style="background-color: #ececec; float:left; display: flex; width: 100%;">
                <h4 style="float:left; margin-left: 1.5%;"> Descrição: </h4>
            </div>
            <div style="background-color: #ececec; float:left; display: flex; width: 100%; align-items: center; justify-content: center;" >
                <h3 style=" text-align: center; margin: 10%; height: 50px;"><?= $row->descricao ?></h3>
            </div>
            
        </div>
    </div>

    

</section>


<?php include('rodape.php'); ?>