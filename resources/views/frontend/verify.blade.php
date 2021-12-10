<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Konfirmasi Alamat Email Anda</h2>
        <div>
            Halo, {{$nama}}<br>
            Terima kasih telah membuat akun di SIAKOP. <br>
            Silahkan klik link dibawah ini untuk konfirmasi alamat email anda <br>
            {{ route('register.confirmation', $confirmation_code) }}<br/><br>

            Terima Kasih.
 
        </div>
    </body>
</html>