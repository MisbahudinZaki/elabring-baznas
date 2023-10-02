<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ELABRING</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>
    <div id="inner">
        <div id="sidebar" class="text-white">
            <p><img src="gambar/Logo baznas.jpg" alt="logo" width="70">
            BAZNAS KAB. PASAMAN
            </p>
            <br>
            <div class="text-center">
                    <p><a style="width: 100%;" class="btn btn-primary" href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i> dashboard</a></p>
                    <p><a style="width: 100%;" class="btn btn-light" href="{{route('absen.index')}}"><i class="fas fa-border-all"></i> absensi</a></p>
                    <p></p>

            </div>


            <div class="container">
                <p><a style="color:aliceblue; text-decoration:none; font-size:20px" href="{{route('changepassword')}}"><i class="fas fa-edit"></i> Ganti Password</a></p>
                <p><a style="color:aliceblue; text-decoration:none; font-size:20px" href="{{route('about')}}"><i class="far fa-building"></i> About</a></p>

            </div>
        </div>
    </div>
</body>
</html>
