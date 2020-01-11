<?php require("cabecalho.php"); ?>

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>Encontre eventos beneficentes</h5>
                            <h1>Auxilie nas causas de sua preferência</h1>
                            <p>Auxilium visa o encontro de pessoas dispostas a ajudar o próximo e aqueles que estão precisando de um amparo, em amplos aspectos</p>

                            <?php if($this->session->userdata('logged_in') == TRUE): ?>
                            
                                <a href="<?= site_url('Eventos_controller');?>" class="btn_2" style="margin-top: 20%">⠀⠀Explorar⠀⠀</a>  

                            <?php else: ?>

                                <button type="button" class="btn_1" data-toggle="modal" data-target="#exampleModalCenter" style="margin-top: 20%">
                                ⠀⠀⠀Login⠀⠀⠀
                                </button>

                                <a href="<?= site_url('User_controller/indexCadastro'); ?>" class="btn_2">Cadastre-se</a>
                            
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <div class="banner_index" style="background-image: url(<?= base_url();?>assets/imagens/index_image.svg);"></div>
            </div>
           
    </section>
</body>
    <!-- banner part start-->

<?php require("rodape.php"); ?>
