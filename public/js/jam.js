$(document).ready(function() {
    // Panggil fungsi untuk mengupdate jam digital setiap detik
    updateDigitalClock();
    setInterval(updateDigitalClock, 1000); // Update setiap 1 detik
});

function updateDigitalClock() {
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();

    // Tambahkan leading zero jika nilai < 10
    hours = (hours < 10 ? "0" : "") + hours;
    minutes = (minutes < 10 ? "0" : "") + minutes;

    // Format waktu menjadi HH:mm
    var formattedTime = hours + ":" + minutes;

    // Set nilai input dengan waktu yang sudah diformat
    $("#waktu_kehadiran").val(formattedTime);
}
