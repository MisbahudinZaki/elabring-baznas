<!-- resources/views/waktu-sekarang.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waktu Sekarang</title>
</head>
<body>
    <h1>Waktu Sekarang</h1>
    <p>Waktu saat ini: {{ $waktuSekarang->toDateTimeString() }}</p>
</body>
</html>
