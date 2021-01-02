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