<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['iniciarSesion'] = "welcome/iniciarSesion";
$route['cerrarSe'] = "welcome/cerrarSession";
$route['verProd'] = "AdminController/getProductos";
$route['insertarProd'] = "AdminController/insertarProducto";
$route['updateProd'] = "AdminController/updateProducto";
$route['deleteProd'] = "AdminController/deleteProducto";
$route['verProdStock'] = "AdminController/getProductosStock";
$route['verProdVenta'] = "VendedorController/getProductos";
$route['verCarro'] = "VendedorController/getcarro";
$route['addCarro'] = "VendedorController/addCarro";
$route['vaciarCarro'] = "VendedorController/vaciarCarro";
$route['verCarro2'] = "VendedorController/getcarro2";
$route['pagarVenta'] = "VendedorController/realizarPago";
$route['verVentas'] = "AdminController/getVentas";