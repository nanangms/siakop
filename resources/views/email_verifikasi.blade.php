<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Akun Gudep Diaktifkan</title>
</head>
<body>
    <h4>Assalamualaikum Warahmatullahi Wabarakatuh, {{ $name }}</h4>
    <p><strong>Akun Gudep Anda sudah kami verifikasi, dengan Nama Gudep terdaftar : {{$nama_gudep}}</strong><br><br>
        silahkan login di halaman website SIPRAM melalui link di bawah ini. <br>
        <a href="{{url('login')}}">{{url('login')}}</a>
    </p>
    <br>
    Gunakan email dan password yang sudah anda daftarkan sebelumnya<br><br>
    <p>Salam, Admin SIPRAM</p>
</body>
</html>