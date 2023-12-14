document.addEventListener('DOMContentLoaded',function(){
    var today = new Date();
    var dd =
    String(today.getDate()).padStart(2, '0'); var mm = String(today.getMonth()
    + 1).padStart(2,'0'); //january adalah 0
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;

    document.getElementById('tanggal_pegawai').value = today;
});
