<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>No.Transaksi #: {{$simpanan->no_transaksi}}</title>
    <style>
      .ukfont{
        font-family: sans-serif;
      }
      .font{
        font-family: sans-serif;
        font-size: 10;
      }
    </style>
</head>
<body class="font">
    <h3 align="center">Bukti Transaksi Simpanan</h3>
   <hr>
   <table width="100%">
       <tr>
           <td width="60%"></td>
           <td width="40%">No.Transaksi #: {{$simpanan->no_transaksi}}
            <br>Tanggal : {{TanggalAja($simpanan->tgl_transaksi)}}
        </td>
       </tr>
   </table>
   <table>
        <tr>
           <td width="200px">Jenis Transaksi</td>
           <td>:</td>
           <td>@if($simpanan->jenis_transaksi == 'debit')
                Penarikan Tunai
                @elseif($simpanan->jenis_transaksi == 'kredit')
                Setoran Tunai
                @endif
           </td>
       </tr>
       <tr>
           <td>Nomor/Nama Anggota</td>
           <td>:</td>
           <td>{{str_pad($simpanan->anggota->no_anggota,3,'0',STR_PAD_LEFT)}} / {{$simpanan->anggota->nama_lengkap}}
                
           </td>
       </tr>
       <tr>
           <td>Jenis Simpanan</td>
           <td>:</td>
           <td>{{$simpanan->jenissimpanan->nama_jenis}}</td>
       </tr>
       <tr>
           <td>Keterangan</td>
           <td>:</td>
           <td>{{$simpanan->keterangan}}</td>
       </tr>
       <tr>
           <td>Total</td>
           <td>:</td>
           <td>Rp. {{number_format($simpanan->jumlah,0,',','.')}},-</td>
       </tr>
       <tr>
           <td>Terbilang</td>
           <td>:</td>
           <td>{{terbilang($simpanan->jumlah)}} rupiah</td>
       </tr>
   </table>

   
   <hr>
   <table width="100%">
       <tr>
           <td width="50%" align="center">Kasir <br><br><br><br><br>

            {{$simpanan->user->name}}</td>
           <td width="50%" align="center">
               @if($simpanan->jenis_transaksi == 'debit')
                Penerima <br><br><br><br><br>
                @elseif($simpanan->jenis_transaksi == 'kredit')
                Penyetor <br><br><br><br><br>
                @endif
                {{$simpanan->anggota->nama_lengkap}}
           </td>
       </tr>
   </table>
</body>
</html>

