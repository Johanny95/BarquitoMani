<!DOCTYPE html>
<?php $user = $this->session->userdata("admin") ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Barquito Manisero</title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">       
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>lib/css/materialize.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="orange lighten-5">
        <nav class="nav-extended brown lighten-1">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="<?php echo site_url() ?>" class="brand-logo  hide-on-med-and-down">BM<i class="large material-icons right">gesture</i> Administrador</a>
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
                        <li class="tab"><a href="#test1">Producto</a></li>
                        <li class="tab"><a href="#test2">Control Stock</a></li>
                        <li class="tab"><a href="#test3">Control Venta</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div id="test1" class="col s12">
                <div class="row">
                    <div class="col s4">
                        <h5 class="brown-text">Nuevo producto</h5>                            
                        <div class="input-field col s12">                                        
                            <input id="nombre" type="text" class="validate" required="true">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="input-field col s12">                                        
                            <input id="stock" type="number" class="validate" required="true" min="1">
                            <label for="stock">Stock</label>
                        </div>
                        <div class="input-field col s12">                                        
                            <input id="precio" type="number" class="validate" required="true" min="0">
                            <label for="precio">Precio</label>
                        </div>
                        <input type="submit" id="btagregar" class="btn brown white-text" value="Agregar"/>
                    </div>
                    <div class="col s8 z-depth-1">
                        <h5>Buscar por nombre</h5>
                        <div class="input-field col s12">                                        
                            <input id="buscar" type="text" >
                            <label for="buscar">Buscar</label>
                        </div>
                        <table id="tabla">
                            <thead></thead>
                            <tbody id="tbody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="test2" class="col s12">
                <div class="row">
                    <div class="col s12"><br/>
                        <h4>Control Stock</h4>
                        <p class="range-field">
                            <input type="range" id="rangestock" min="0" max="100" />
                        </p>
                        <div class="row">
                            <div class="col s3">
                                Producto con stock menor o igual a :
                            </div>
                            <input type="number" readonly="true" id="stocklabel" class="col s1"/>
                            <div class="col s8"></div>
                        </div>
                        <table id="tabla1">
                            <thead></thead>
                            <tbody id="tbody1"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="test3" class="col s12">
                <div class="row">
                    <div class="col s12">
                        <h5>Detalles ventas</h5>
                        <hr/>
                        <table id="tablaVenta">
                            <thead><tr><td>Fecha</td><td>Vendedor</td><td>Rut Vendedor</td><td>Cliente</td><td>Total</td></tr></thead>
                            <tbody id="tbodyVenta">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="modalupdate" class="modal">
        <div class="modal-content">
            <h4>Actualizar</h4>
            <div class="row">
                <div class="col s6">
                    Id Producto<input type="text" id="txt0" />
                </div>
                <div class="col s6">
                    Nombre <input type="text" id="txt1" />
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    Stock <input type="text" id="txt2" />
                </div>
                <div class="col s6">
                    Precio <input type="text" id="txt3" />
                </div>
            </div>
            <a id="btupdate" href="#!" class=" modal-action modal-close waves-effect waves-green btn">Actualizar</a>

        </div>
    </div>

    <div id="modaldelete" class="modal">
        <div class="modal-content">
            <h4>¿Desea eliminar el producto?</h4>
            <div class="col s6">
                ID <input type="text" id="id" readonly="true"/>
            </div>
            <div class="col s6">
                Nombre <input type="text" id="nombretxt" readonly="true"/>
            </div>
            <input id="btEliminar" type="submit" class="btn red" value="Eliminar"/>
            <a  href="#!" class=" modal-action modal-close grey black-text waves-effect btn">Cancelar</a>
        </div>
    </div>



    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>lib/js/materialize.min.js"></script>
    <script src="<?php echo base_url() ?>lib/js/myjs.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('.modal').modal();
            verProductos();
            verProductos1();
            verVentas();
            $('ul.tabs').tabs('select_tab', 'tab_id');
            $(".button-collapse").sideNav();
            $("#cerrarSe").click(function () {
                cerrarSession();
            });
            $("#buscar").keypress(function (e) {
                verProductos();
            });
            $("#rangestock").change(function (e) {
                e.preventDefault();
                verProductosStock();
                $("#stocklabel").val($("#rangestock").val()).html();
            });

            $("#btagregar").click(function (e) {
                e.preventDefault();
                insertarProd();
            });
            $("#btEliminar").click(function (e) {
                e.preventDefault();
                eliminarProd();
                $('#modaldelete').modal('close');
                verProductos();
            });

            $("body").on("click", "#btedit", function (e) {
                e.preventDefault();
                var datos = $(this).val();
                var fila = datos.split(",");
                $("#txt0").val(fila[0]);
                $("#txt1").val(fila[1]);
                $("#txt2").val(fila[2]);
                $("#txt3").val(fila[3]);
                $('#modalupdate').modal('open');
            });

            $("body").on("click", "#btdelete", function (e) {
                e.preventDefault();
                var datos = $(this).val();
                var fila = datos.split(",");
                $("#id").val(fila[0]);
                $("#nombretxt").val(fila[1]);
                $('#modaldelete').modal('open');
            });

            $("#btupdate").click(function (e) {
                e.preventDefault();
                updateProd();
                $('#modal1').modal('close');
            });

        });
    </script>
</body>
</html>