let els = document.getElementsByClassName('trigger');
let tri = document.getElementById('tri');

var xhr = new XMLHttpRequest();
Array.from(els).forEach((el)=>{
    el.addEventListener('click', makeRequest)
});

function makeRequest (e) {
    e.preventDefault(e);
    let id = ((this.parentElement.parentElement).id).substring(4)
    xhr.onreadystatechange = alertContent
    var params = 'statut=' +1
    console.log(id);
    xhr.open('POST','update?' +id)
    xhr.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
    xhr.send(params)


    
}

function alertContent() {
    if (xhr.readyState===XMLHttpRequest.DONE) {
        let tabl = JSON.parse(xhr.responseText)
        console.log(tabl)
        td = document.getElementById("td_"+tabl.id)
        td.innerHTML="Résolut"
        console.log(xhr.responseText)
    }
}

function makeRequestTri() {
    
    
}