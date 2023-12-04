// public/js/custom.js

$(document).ready(function() {
    // Panggil fungsi untuk mengisi nilai input dengan jam digital
    fillDigitalClock();
});

function fillDigitalClock() {
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();

    // Tambahkan leading zero jika nilai < 10
    hours = (hours < 10 ? "0" : "") + hours;
    minutes = (minutes < 10 ? "0" : "") + minutes;

    // Format waktu menjadi HH:mm
    var formattedTime = hours + ":" + minutes;

    // Set nilai input dengan waktu yang sudah diformat
    $("#waktu_pulang").val(formattedTime);
}
