let listaKolumn = new Array();
let listaBr = new Array();

przeladowanie();

function przeladowanie()
{
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
}

function inicjalizujKolumny()
{
    listaKolumn.push(document.getElementById("kluczGlowny"));
}

function dodajKolumne()
{
    
    let kreatorTabeli = document.getElementById("listaKolumn");

    let nowaKolumna = document.createElement("input");
    nowaKolumna.setAttribute("type", "text");    
    listaKolumn.push(nowaKolumna);
    nowaKolumna.setAttribute("placeholder", "kolumna "+ (listaKolumn.length - 1));
    nowaKolumna.setAttribute("name", listaKolumn.length - 1);
    kreatorTabeli.appendChild(nowaKolumna);
    
    let br = document.createElement("br");
    kreatorTabeli.appendChild(br);

    listaBr.push(br);

}

function usunKolumne()
{
    if(listaKolumn.length <= 1)
        return;

    let kolumna = listaKolumn.pop();
    kolumna.remove();

    let br = listaBr.pop();
    br.remove();
}

function zaladujStrone(url)
{  
    window.location = url;
}

