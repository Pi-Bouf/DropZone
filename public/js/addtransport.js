alert('addtransport.js');

var div;
var newInput;
var name=1;
function addEtape(){
    div = document.getElementById('etape')
    name++;
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
    console.log('occaa');
    document.getElementById('trajetOcca').style.display = "block";
    document.getElementById('trajetRegu').style.display = "none";
}

function regu(){
    console.log('regu');
    document.getElementById('trajetOcca').style.display = "none";
    document.getElementById('trajetRegu').style.display = "block";
}