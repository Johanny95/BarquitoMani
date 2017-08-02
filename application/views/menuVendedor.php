<!DOCTYPE html>
<?php $user = $this->session->userdata("usuario") ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Barquito Manisero</title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">       
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>lib/css/materialize.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="grey lighten-5">
        <nav class="nav-extended black lighten-1">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="<?php echo site_url() ?>" class="brand-logo  hide-on-med-and-down">BM<i class="large material-icons right">gesture</i></a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a>Bienvenido <?php print $user->nombre . ' ' . $user->apellido ?></a></li>
                        <li><a id="cerrarSe"><i class="material-icons">power_settings_new</i></a></li>
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                        <li><a>Bienvenido <?php print $user->nombre . ' ' . $user->apellido ?></a></li>
                        <li><a id="cerrarSe"><i class="material-icons">power_settings_new</i></a></li>
                    </ul>
                    <ul class="tabs tabs-transparent fixed">
                        <li class="tab"><a href="#test1">Venta</a></li>
                        <li class="tab disabled"><a href="#test3">Proximamente..</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div id="test1" class="col s12">
                <br/>
                <div class="row">
                    <div class="col s6">
                        <h5>Buscar por nombre</h5>
                        <div class="input-field col s12">                                        
                            <input id="buscar" type="text" >
                            <label for="buscar">Buscar</label>
                        </div>
                        <table id="tabla">

                            <tbody id="tbody"></tbody>
                        </table>
                    </div>
                    <div class="col s6 z-depth-2">
                        <input type="submit" class="btn blue" value="Nueva venta" id="nuevaVenta"/>
                        <div class="row">
                            <div class="col s12"><h5>Resumen carro<i class="material-icons left">done</i></h5></div>
                            <div class="col s6">Total a pagar<input type="text" readonly="true" id="totalCarro"/></div>
                            <div class="col s6"><input type="submit" value="Realizar pago" id="btpagar" class="btn black"/></div>
                        </div>

                        <table>
                            <thead>
                                <tr><td>Id</td><td>Nombre</td><td>Cantidad</td><td>Precio</td></tr>
                            </thead>
                            <tbody id="tcarro">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>        

        <div id="modalCarro" class="modal">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <h4>¿Desea agregar el producto al carro?</h4>
                        <div class="col s4">
                            ID <input type="text" id="txt0" readonly="true"/>
                        </div>
                        <div class="col s4">
                            Nombre <input type="text" id="txt1" readonly="true"/>
                        </div>                        
                        <div class="col s4">
                            Precio <input type="text" id="txt3" readonly="true"/>
                        </div>
                        <div class="col s6">
                            Cantidad <input type="number" id="txt2" min="1" max="1000"/>
                        </div>
                        <div class="col s6">
                            Cantidad maxima <input type="number" id="stocktxt" readonly="true"/>
                        </div>
                    </div>
                </div>
                <input id="btAgregarCarro" type="submit" class="btn green" value="Agregar"/>
                <a  href="#!" class=" modal-action modal-close grey white-text waves-effect btn">Cancelar</a>
            </div>
        </div>


        <div id="modalpago" class="modal">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <h5>Realizar pago</h5>
                        <div class="input-field col s12">                                        
                            <input id="cliente" type="text" class="validate">
                            <label for="cliente">Nombre Cliente</label>
                        </div>
                        <div class="col s6">
                            Total a pagar $
                            <input type="text" id="totalPago" readonly="true"/>
                        </div>                        
                        <div class="col s6">
                            Al realizar el pago se descontara el stock y realizara los detalles de ventas
                        </div>                        
                    </div>
                </div>

                <input id="btVentaPago" type="submit" class="btn black" value="Aceptar Pago"/>
                <a  href="#!" class=" modal-action modal-close white black-text black-text waves-effect btn right">Cancelar</a>
            </div>
        </div>



        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>lib/js/materialize.min.js"></script>
        <script src="<?php echo base_url() ?>lib/js/myjs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                verProductosVenta();
                cargarCarro();
                verTotalCarro();
                $('.modal').modal();
                $('ul.tabs').tabs('select_tab', 'tab_id');
                $(".button-collapse").sideNav();
                $("#cerrarSe").click(function () {
                    cerrarSession();
                });

                $("#buscar").keypress(function () {
                    verProductosVenta();
                });
                $("body").on("click", "#btcarro", function (e) {
                    e.preventDefault();
                    var datos = $(this).val();
                    var fila = datos.split(",");
                    $("#txt0").val(fila[0]);
                    $("#txt1").val(fila[1]);
                    $("#txt2").val(1);
                    $("#txt3").val(fila[3]);
                    $("#stocktxt").val(fila[2]);
                    $('#modalCarro').modal('open');
                });

                $("#btAgregarCarro").click(function (e) {
                    AgregarCarro();
                    cargarCarro();
                    verTotalCarro();
                    $('#modalCarro').modal('close');
                });

                $("#nuevaVenta").click(function (e) {
                    e.preventDefault();
                    verTotalCarro();
                    vaciarCarro();
                });

                $("#btpagar").click(function (e) {
                    e.preventDefault();
                    var total = $("#totalCarro").val();
                    if (total > 0) {
                        $("#totalPago").val(total);
                        $('#modalpago').modal('open');
                    } else {
                        Materialize.toast("Carro vacio", 4000);
                    }
                });

                $("#btVentaPago").click(function (e) {
                    realizarPago();
                    verProductosVenta();
                    cargarCarro();
                    verTotalCarro();
                    Materialize.toast("Venta realizada con exito",5000);
                    $('#modalpago').modal('close');
                });

            });
        </script>
    </body>
</html>