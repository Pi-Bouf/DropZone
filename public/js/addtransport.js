alert('addtransport.js');

var div;
var newInput;
var name=1;
function addEtape(){
    div = document.getElementById('etape')
    name++;
    alert('addEtape');
    newInput = document.createElement('input');
 
    newInput.setAttribute('type','text');
    newInput.setAttribute('name','villeEtape'+name);
    div.appendChild(newInput);
    if (name==5){
        var e = document.getElementById('formAjoutTransport');
        var but = document.getElementById('ajoutButton');
        e.removeChild(but);
    }
    
}

function occa(){
    alert('occa');
}

function regu(){
    alert('regu()');
}