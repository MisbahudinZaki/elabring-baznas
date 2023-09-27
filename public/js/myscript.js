var modal = document.getElementById('myModal');
var btn = document.getElementById("tombolku");
var span = document.getElementById("tutup");

var modal2 = document.getElementById('editModal');
var btn2 = document.getElementById('mybutton');
var span2 = document.getElementById('close')

btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(e) {
    if (e.target == modal) {
        modal.style.display = "none";
    }
}

function masukkannama(){
    if (document.form1.Nama.value=="")
    {
        alert("anda belum menginputkan nama");
    }
}



//kedua

btn2.onclick = function() {
    modal2.style.display = "block";
}

span2.onclick = function() {
    modal2.style.display = "none";
}

window.onclick = function(x) {
    if (x.target == modal2) {
        modal2.style.display = "none";
    }
}
