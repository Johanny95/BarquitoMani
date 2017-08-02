<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Barquito Manisero</title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">       
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>lib/css/materialize.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="orange lighten-5">
        <div class="container">
            <nav class="transparent z-depth-0 fixed" >
                <div class="nav-wrapper">
                    <a href="<?php echo site_url() ?>" class="brand-logo brown-text hide-on-med-and-down">BARMANI<i class="large material-icons right">gesture</i></a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse brown-text"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#modal1" class="brown-text"><i class="material-icons left">input</i>Entrar</a></li>
                    </ul>
                    <ul class="side-nav orange lighten-5" id="mobile-demo">
                        <li><a href="#modal1" class="grey-text"><i class="material-icons">input</i>Entrar</a></li>
                    </ul>
                </div>
            </nav>
            <div class="row">               
                <div class="col s12">
                    <ul class="tabs transparent">
                        <li class="tab col-md-3"><a href="#test1" class="black-text">INICIO</a></li>
                        <li class="tab col-md-3"><a href="#test2" class="black-text">NOSOTROS</a></li>
                    </ul>
                    <div id="test1">
                        <br/>                       
                        <div class="slider">
                            <ul class="slides">
                                <li>
                                    <img src="http://www.bbva-cxgastronomia.com/contingut/uploads/2015/11/Article-Propietats-Avellana1.jpg"> <!-- random image -->
                                    <div class="caption center-align">
                                        <h3>This is our big Tagline!</h3>
                                        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                                    </div>
                                </li>
                                <li>
                                    <img src="http://s03.s3c.es/imag/_v0/635x300/d/4/9/nueces.jpg" class="responsive-img"> <!-- random image -->
                                    <div class="caption left-align">
                                        <h3>Left Aligned Caption</h3>
                                        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                                    </div>
                                </li>
                                <li>
                                    <img src="http://www.alumniunab.cl/wp-content/uploads/2013/10/frutos-secos.jpg"> <!-- random image -->
                                    <div class="caption right-align">
                                        <h3>Right Aligned Caption</h3>
                                        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                                    </div>
                                </li>
                                <li>
                                    <img src="https://mejorconsalud.com/wp-content/uploads/2014/02/El-mani-y-sus-beneficios-500x375.jpg"> <!-- random image -->
                                    <div class="caption center-align">
                                        <h3>This is our big Tagline!</h3>
                                        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>   
                    </div>
                    <div id="test2"><br/>
                        <center><img src="https://maniobresculinaries.files.wordpress.com/2014/09/gispert2.jpg" style="width: 95%;"></center>
                        <div style="position: absolute; top: 0; margin-top: 30%; margin-left: 10%;">
                            <h4 class="white-text">Bienvenido</h4>
                            <h6 class="white-text">Te invitamos a revisar los catalogos de productos ingresando a nuestra tienda</h6>
                            <a href="#modal1" class="btn teal white-text"><i class="material-icons left">input</i>Entrar</a></a>
                        </div>

                    </div>
                    

                </div>                 


                <div id="modal1" class="modal orange lighten-5">
                    <div class="modal-content">

                        <div class="container">
                            <div class="row">
                                <h5 class="brown-text">Iniciar Sesión</h5>
                                <div class="col s6">
                                    <div class="input-field col s12">                                        
                                        <input id="rut" type="text" class="validate">
                                        <label for="rut">Rut Persona</label>
                                    </div>
                                    <div class="input-field col s12">                                        
                                        <input id="pass" type="password" class="validate">
                                        <label for="pass">Contraseña</label>
                                    </div>
                                    <input id="btIniciar" type="submit" class="btn teal lighten-2" value="Entrar"/>
                                    <br/><br/><h5 class="brown-text"><b class="teal-text">Johanny </b>López Méndez</h5>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
                    </div>
                </div>

            </div>
        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>lib/js/materialize.min.js"></script>
        <script src="<?php echo base_url() ?>lib/js/myjs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                $('ul.tabs').tabs('select_tab', 'tab_id');
                $(".button-collapse").sideNav();
                $('.modal').modal();
                $('.carousel.carousel-slider').carousel({full_width: true});
                $('.slider').slider({full_width: true});
                $("#btIniciar").click(function (){
                    validarSession();
                });
                
            });
        </script>
    </body>
</html>
