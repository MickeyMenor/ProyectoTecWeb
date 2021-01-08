/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function cambiaTexto(nodo, placeholder, senderId)
{
    var i = nodo.selectedIndex;
    var seleccionado = nodo.options[i];
    var destino = document.getElementById(placeholder);
    
    if (seleccionado.id.includes("-1"))
    {
        destino.value = "";
        destino.readOnly = false;
    }
    else
    {
        destino.value = seleccionado.text;
        destino.readOnly = true;
    }
    
    document.getElementById(senderId).value = seleccionado.id;
}

function verificaEliminacion()
{
    var answer = window.confirm("Estás seguro");
    return answer;
}

function cambiaIdMedicamentoOferta(nodo)
{
    var i = nodo.selectedIndex;
    var seleccionado = nodo.options[i];
    var destino = document.getElementById('IdMedicamento');
    
    destino.value = seleccionado.id;
}

function cambiaIdCategoriaSeleccionada(nodo)
{
    var i = nodo.selectedIndex;
    var seleccionado = nodo.options[i];
    var destino = document.getElementById('IdCategoria');
    var id = seleccionado.id.substring(1, seleccionado.id.length);
    
    destino.value = id;
}

function cambiaIdMedicamentoSeleccionado(nodo)
{
    var i = nodo.selectedIndex;
    var seleccionado = nodo.options[i];
    var destino = document.getElementById('IdMedicamento');
    var id = seleccionado.id.substring(1, seleccionado.id.length);
    
    destino.value = id;
}

function modificaCosto(diferencia)
{
    var nodoCosto = document.getElementById('ImporteTotal');
    var total = parseFloat(nodoCosto.getAttribute('value'));
    var costo = Number(total + diferencia).toFixed(2);
    
    nodoCosto.setAttribute('value', costo);
    document.getElementById('CostoTotal').value = costo;
    nodoCosto.innerHTML = '<h3><strong>' + costo + '</strong></h3></td>';
}

function modificaProducto(idPrecioUn, idPrecioTot, nodo)
{
    if (!isNaN(nodo.value))
    {
        var cant = nodo.value;
        var cu = parseFloat(document.getElementById(idPrecioUn).getAttribute('value'));
        var precio = Number(cu * cant).toFixed(2);
        var ct = document.getElementById(idPrecioTot);
        var dif = precio - Number(ct.getAttribute('value')).toFixed(2);
        
        ct.setAttribute('value', precio);
        ct.innerHTML = '<strong>' + precio + '</strong>';
        modificaCosto(dif);
    }
}

function quitaProducto(idProducto, idCosto)
{
    var importe = -parseFloat(document.getElementById(idCosto).getAttribute('value'));
    var nodo = document.getElementById(idProducto);
    nodo.remove();
    modificaCosto(importe);
}