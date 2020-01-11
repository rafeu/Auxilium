<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Auxilium</title>
    <link rel="icon" href="<?= base_url();?>assets/imagens/favicon.png">
    <!-- Bootstrap CSS -->
    <!-- mascara de formulario JS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/bootstrap.min.css">
        <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?= base_url();?>asse127pxts/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/style.css">
    <!-- nosso css -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/estilo.css">

</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu" style="background-color: white;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?= site_url();?>"> <img src="<?= base_url();?>assets/imagens/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" style="margin-left: -20%;" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?= base_url();?>">Home</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?= site_url('Eventos_controller');?>">Eventos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('principal/index_sobre');?>">Sobre</a>
                                </li>
                                <?php if($this->session->userdata('tip_user')==='1' or $this->session->userdata('tip_user')==='2'){ ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('User_controller');?>">Usuários</a>
                                </li>
                                <?php } ?>

                                <?php 
                                    
                                $nome = explode(" ", $this->session->userdata('nome_user')); 

                                    if($this->session->userdata('logged_in')){?>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Olá, <?= $nome[0]; ?>!
                                        </a>
                                        <div class="dropdown-menu" style="margin-top: 0%;" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="<?= site_url('user_controller/perfil');?>" >Perfil</a>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalLogout" href="#">Logout</a>
                                        </div>
                                    </li>


                                    <?php }else{ ?>
                                    <li class="d-none d-lg-block">
                                        <a data-toggle="modal" data-target="#exampleModalLogin" class="btn_1" href="#">Login</a>
                                    </li>

                                <?php } ?>
                            
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    
<?php if($this->session->flashdata("success")){ ?>

    <div>
        <p class="alert alert-success" style="margin-top: 7%; text-align: center; position: absolute; width: 100%;"><?= $this->session->flashdata("success");?></p>
        <meta HTTP-EQUIV='refresh' CONTENT='1'>
    </div>

<?php }elseif($this->session->flashdata("denied")){ ?>

    <div>
        <p class="alert alert-danger" style="margin-top: 7%; text-align: center; position: absolute; width: 100%;"><?= $this->session->flashdata("denied");?></p>
        <meta HTTP-EQUIV='refresh' CONTENT='1'>
    </div>

<?php }elseif($this->session->flashdata("eventoCriado")){ ?>

    <div>
        <p class="alert alert-success" style="margin-top: 1.2%; text-align: center; position: absolute; width: 100%;"><?= $this->session->flashdata("eventoCriado");?></p>
        <meta HTTP-EQUIV='refresh' CONTENT='2'>
    </div>

<?php }elseif($this->session->flashdata("eventoEditado")){ ?>

    <div>
        <p class="alert alert-success" style="margin-top: 1.2%; text-align: center; position: absolute; width: 100%;"><?= $this->session->flashdata("eventoEditado");?></p>
        <meta HTTP-EQUIV='refresh' CONTENT='2'>
    </div>

<?php }elseif($this->session->flashdata("eventoExcluido")){ ?>

    <div>
        <p class="alert alert-danger" style="margin-top: 1.2%; text-align: center; position: absolute; width: 100%;"><?= $this->session->flashdata("eventoExcluido");?></p>
        <meta HTTP-EQUIV='refresh' CONTENT='2'>
    </div>

<?php }elseif($this->session->flashdata("usuarioCadastrado")){ ?>

    <div>
        <p class="alert alert-success" style="margin-top: 7%; text-align: center; position: absolute; width: 100%;"><?= $this->session->flashdata("usuarioCadastrado");?></p>
        <meta HTTP-EQUIV='refresh' CONTENT='2'>
    </div>

<?php }elseif($this->session->flashdata("usuarioEditado")){ ?>

    <div>
        <p class="alert alert-success" style="margin-top: 7%; text-align: center; position: absolute; width: 100%;"><?= $this->session->flashdata("usuarioEditado");?></p>
        <meta HTTP-EQUIV='refresh' CONTENT='2'>
    </div>

<?php }elseif($this->session->flashdata("usuarioExcluido")){ ?>

    <div>
        <p class="alert alert-danger" style="margin-top: 7%; text-align: center; position: absolute; width: 100%;"><?= $this->session->flashdata("usuarioExcluido");?></p>
        <meta HTTP-EQUIV='refresh' CONTENT='2'>
    </div>

<?php }elseif($this->session->flashdata("doacaoCadastrada")){ ?>

    <div>
        <p class="alert alert-success" style="margin-top: 7%; text-align: center; position: absolute; width: 100%;"><?= $this->session->flashdata("doacaoCadastrada");?></p>
        <meta HTTP-EQUIV='refresh' CONTENT='2'>
    </div>

<?php }elseif($this->session->flashdata("doacaoEditada")){ ?>

    <div>
        <p class="alert alert-success" style="margin-top: 7%; text-align: center; position: absolute; width: 100%;"><?= $this->session->flashdata("doacaoEditada");?></p>
        <meta HTTP-EQUIV='refresh' CONTENT='2'>
    </div>

<?php }elseif($this->session->flashdata("doacaoExcluida")){ ?>

    <div>
        <p class="alert alert-danger" style="margin-top: 7%; text-align: center; position: absolute; width: 100%;"><?= $this->session->flashdata("doacaoExcluida");?></p>
        <meta HTTP-EQUIV='refresh' CONTENT='2'>
    </div>

<?php } ?>


        <!-- modal login -->
        <div class="modal fade" id="exampleModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                

                    <div class="modal-body">
                        <form name="formLogin" method="post" action="<?= site_url('User_controller/auth') ?> " >
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="emailLogin" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" name="senha" id="senhaLogin" placeholder="Senha">
                            </div>
                        </div>
                    <div class="modal-footer">
                        <a style="float: left;" href="<?= site_url('User_controller/esqueceuSenha'); ?>">Esqueceu sua senha?</a>
                        <button type="submit" class="btn btn-primary" value="save">Logar</button>
                    </div>
                        </form>
            </div>
        </div>
    </div>
    <!-- fim do modal -->


    <!-- modal de confirmação -->
    <div class="modal" id="exampleModalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tem certeza que deseja sair?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                

                    <div class="modal-body">
                        <div style="float: right;">
                            <button type="button" class="btn" style="background-color: grey; color: white;" data-dismiss="modal" aria-label="Close">Cancelar</button>
                            
                            <a class="btn btn-primary" href="<?= site_url('User_controller/logout'); ?>">Sair</a>
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>
    <!-- fim do modal -->