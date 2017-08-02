var url = "http://localhost/ProyectoFinal/index.php";

function validarSession() {
    var rut = $("#rut").val();
    var clave = $("#pass").val();
    $.ajax({
        url: url + '/iniciarSesion',
        type: 'POST',
        dataType: 'json',
        data: {"rut": rut, "pass": clave}
    }).success(function (msg) {
        if (msg.msg == "error") {
            Materialize.toast("Datos ingresados no validos", 4000);
            $("#rut").val("").html();
            $("#pass").val("").html();
        } else if (msg.msg == "vendedor") {
            window.location = url + '/VendedorController';
        } else if (msg.msg == "administrador") {
            window.location = url + "/AdminController";
        }
    });
}

function cerrarSession() {
    $.ajax({
        url: url + '/cerrarSe', type: 'POST', dataType: 'json'
    }).success(function (msg) {
        if (msg.msg == 'ok') {
            window.location = url;
        }
    });
}

function verProductos() {
    $("#tbody").empty();
    var nombre = $("#buscar").val();
    $.ajax({
        url: url + '/verProd',
        type: 'POST',
        dataType: 'json',
        data: {"nombre": nombre}
    }).success(function (msg) {
        $.each(msg, function (i, o) {
            var fila = "<tr><td>" + o.idproducto + "</td>";
            fila += "<td>" + o.nombre + "</td>";
            fila += "<td>" + o.stock + "</td>";
            fila += "<td>" + o.precio + "</td>";
            fila += '<td> <button id="btedit" value="' + o.idproducto + "," + o.nombre + "," + o.stock + "," + o.precio + '" class="btn-floating  waves-effectwaves-light blue"><i class="material-icons">edit</i></button>';
            fila += ' <button id="btdelete" value="' + o.idproducto + "," + o.nombre + '" class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button></td></tr>';
            $("#tbody").append(fila);
        });
    });
}

function verProductosVenta() {
    $("#tbody").empty();
    var nombre = $("#buscar").val();
    $.ajax({
        url: url + '/verProdVenta',
        type: 'POST',
        dataType: 'json',
        data: {"nombre": nombre}
    }).success(function (msg) {
        $.each(msg, function (i, o) {
            var fila = "<tr><td>" + o.idproducto + "</td>";
            fila += "<td>" + o.nombre + "</td>";
            fila += "<td>" + o.stock + "</td>";
            fila += "<td>" + o.precio + "</td>";
            fila += '<td> <button id="btcarro" value="' + o.idproducto + "," + o.nombre + "," + o.stock + "," + o.precio + '" class="btn-floating  waves-effect waves-light blue"><i class="material-icons">add_shopping_cart</i></button>';
            $("#tbody").append(fila);
        });
    });
}

function cargarCarro() {
    $("#tcarro").empty();
    $.getJSON(url + "/verCarro", function (objetos) {
        $.each(objetos, function (i, o) {
            var fila = "<tr><td>" + o.idproducto + "</td>";
            fila += "<td>" + o.nombre + "</td>";
            fila += "<td>" + o.stock + "</td>";
            fila += "<td>" + o.precio + "</td>";
            fila += '<td> <button id="btborrar" value="' + o.idproducto + "," + o.nombre + "," + o.stock + "," + o.precio + '" class="btn-floating  waves-effect waves-light red"><i class="material-icons">delete</i></button>';
            $("#tcarro").append(fila);
        })
    });
}

function verTotalCarro() {
    $.getJSON(url + "/verCarro2", function (objetos) {
        if (objetos.msg == "carro") {
            $("#totalCarro").val(0);
        } else {
            var suma = 0;
            $.each(objetos, function (i, o) {
                suma = suma + (o.stock * o.precio);
            })
            $("#totalCarro").val(suma);
            $("#totalPago").val(suma);
        }
    });
}


function verProductos1() {
    $("#tbody1").empty();
    var nombre = $("#buscar").val();
    $.ajax({
        url: url + '/verProd',
        type: 'POST',
        dataType: 'json',
        data: {"nombre": nombre}
    }).success(function (msg) {
        $.each(msg, function (i, o) {
            var fila = "<tr><td>" + o.idproducto + "</td>";
            fila += "<td>" + o.nombre + "</td>";
            fila += "<td>" + o.stock + "</td>";
            fila += "<td>" + o.precio + "</td>";
            fila += '<td> <button id="btedit" value="' + o.idproducto + "," + o.nombre + "," + o.stock + "," + o.precio + '" class="btn-floating  waves-effectwaves-light blue"><i class="material-icons">edit</i></button>';
            fila += ' <button id="btdelete" value="' + o.idproducto + "," + o.nombre + '" class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button></td></tr>';
            $("#tbody1").append(fila);
        });
    });
}

function verProductosStock() {
    $("#tbody1").empty();
    var stock = $("#rangestock").val();
    $.ajax({
        url: url + '/verProdStock',
        type: 'POST',
        dataType: 'json',
        data: {"stock": stock}
    }).success(function (msg) {
        $.each(msg, function (i, o) {
            var fila = "<tr><td>" + o.idproducto + "</td>";
            fila += "<td>" + o.nombre + "</td>";
            fila += "<td>" + o.stock + "</td>";
            fila += "<td>" + o.precio + "</td>";
            fila += '<td> <button id="btedit" value="' + o.idproducto + "," + o.nombre + "," + o.stock + "," + o.precio + '" class="btn-floating  waves-effectwaves-light blue"><i class="material-icons">edit</i></button>';
            fila += ' <button id="btdelete" value="' + o.idproducto + "," + o.nombre + '" class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button></td></tr>';
            $("#tbody1").append(fila);
        });
    });
}

function AgregarCarro() {
    var id = $("#txt0").val();
    var nombre = $("#txt1").val();
    var stock = $("#txt2").val();
    var precio = $("#txt3").val();
    var stockM = $("#stocktxt").val();
    if (stock <= stockM) {
        $.ajax({
            url: url + '/addCarro',
            type: 'POST',
            dataType: 'json',
            data: {"id": id, "nombre": nombre, "stock": stock, "precio": precio}
        }).success(function (msg) {
            if (msg.msg == "ok") {
                Materialize.toast("Producto añadido", 4000);
                $('#modalcarro').modal('close');
            }
        });
    } else {
        Materialize.toast("Stock insuficiente, verificar", 4000);
    }
}




function vaciarCarro() {
    $.ajax({
        url: url + '/vaciarCarro',
        type: 'POST',
        dataType: 'json',
        data: {}
    }).success(function (msg) {
        if (msg.msg == "ok") {
            cargarCarro();
            Materialize.toast("Carro vaciado", 4000);
        }
    });
}

function insertarProd() {
    var nombre = $("#nombre").val();
    var stock = $("#stock").val();
    var precio = $("#precio").val();
    $.ajax({
        url: url + '/insertarProd',
        type: 'POST',
        dataType: 'json',
        data: {"nombre": nombre, "stock": stock, "precio": precio}
    }).success(function (msg) {
        if (msg.msg == "ok") {
            Materialize.toast("Ingresado con exito", 3000);
            verProductos();
            $("#nombre").val("").html();
            $("#stock").val("").html();
            $("#precio").val("").html();
        } else {
            Alert("Error");
            $("#nombre").val("").html();
            $("#stock").val("").html();
            $("#precio").val("").html();
        }
    });
}
function eliminarProd() {
    var id = $("#id").val();
    $.ajax({
        url: url + '/deleteProd',
        type: 'POST',
        dataType: 'json',
        data: {"id": id}
    }).success(function (msg) {
        if (msg.msg == "ok") {
            Materialize.toast("Eliminado con exito", 3000);
        } else {
            Alert("Error");
        }
    });
}


function updateProd() {
    var id = $("#txt0").val();
    var nombre = $("#txt1").val();
    var stock = $("#txt2").val();
    var precio = $("#txt3").val();
    $.ajax({
        url: url + '/updateProd',
        type: 'POST',
        dataType: 'json',
        data: {"id": id, "nombre": nombre, "stock": stock, "precio": precio}
    }).success(function (msg) {
        if (msg.msg == "ok") {
            Materialize.toast("Actualizado", 3000);
            verProductos();
        }
    });
}

function realizarPago() {
    var total = $("#totalPago").val();
    var nombre = $("#cliente").val();
    $.ajax({
        url: url + '/pagarVenta',
        type: 'POST',
        dataType: 'json',
        data: {"cliente": nombre, "total": total}
    }).success(function (msg) {

    });
}

function verVentas() {
    $("#tbodyVenta").empty();
    $.getJSON(url + "/verVentas", function (objetos) {
        $.each(objetos, function (i, o) {
            var fila = "<tr><td>" + o.fecha + "</td>";
            fila += "<td>" + o.nombre + " " + o.apellido + "</td>";
            fila += "<td>" + o.rut + "</td>";
            fila += "<td>" + o.nombreCliente + "</td>";
            fila += "<td>" + o.total + "</td></tr>";
            $("#tbodyVenta").append(fila);
        });
    });
}