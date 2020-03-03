
 function sumar(id) {
    
    var sumar = 1;

    window.location.href = "update/"+id+"/"+sumar+"";
        
}


function restar(id) {

    var restar  = -1;

    window.location.href = "update/"+id+"/"+restar+"";
        
}

function borrar(id) {
 
    window.location.href = "borrar/"+id+"";

}

function vaciar() {
 
    window.location.href = "clear";


}

