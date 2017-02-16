var div;
var newInput;
var name=1;
function addEtape(){
    div = document.getElementById('etape')
    name++;
    t = document.createTextNode(name+'.'); 
    div.appendChild(t);

    newInput = document.createElement('input');
 
    newInput.setAttribute('type','text');
    newInput.setAttribute('name','villeEtape'+name);
    div.appendChild(newInput);
    div.appendChild(document.createElement('br'));
    if (name==5){
        var e = document.getElementById('divLeft');
        var but = document.getElementById('ajoutButton');
        e.removeChild(but);
    }
    
}

function occa(){
    document.getElementById('trajetOcca').style.display = "block";
    document.getElementById('trajetRegu').style.display = "none";
}

function regu(){
    document.getElementById('trajetOcca').style.display = "none";
    document.getElementById('trajetRegu').style.display = "block";
}