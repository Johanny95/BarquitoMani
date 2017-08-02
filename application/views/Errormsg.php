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
        <div class="container"><br/><br/><br/>
            <div class="row">
                <div class="col s2"></div>
                <center>
                    <div class="col s8">
                        <div class="preloader-wrapper active">
                            <div class="spinner-layer spinner-red-only">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                    <div class="circle"></div>
                                </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                        <h4>Error en la pagina.</h4>
                        <h5>No posees permisos para estar aqui</h5>
                        <h6>Seras redireccionado en unos segundos...</h6>
                        <meta http-equiv="REFRESH" content="2,URL=<?php echo site_url()?>" >
                    </div>
                </center>
                <div class="col s2"></div>
            </div>
        </div>




        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>lib/js/materialize.min.js"></script>
        <script src="<?php echo base_url() ?>lib/js/myjs.js" type="text/javascript"></script>

    </body>
</html>
