@extends('layouts.app')

@section('title')
Cetak Nota
@endsection

@section('header')
<!-- Toastr -->
  <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <x-breadchumb title="Cetak Nota" menu1="Dashboard" link1="home" menu3="Cetak Nota"/>

    <section class="content">
        <x-card judul="No. Transaksi #{{$simpanan->no_transaksi}}">
           <h3 align="center">Bukti Transaksi Simpanan</h3>
           <hr>
           <table width="100%">
               <tr>
                   <td width="60%"></td>
                   <td width="40%"><strong>No.Transaksi</strong> : {{$simpanan->no_transaksi}}
                    <br><strong>Tanggal</strong> : {{TanggalAja($simpanan->tgl_transaksi)}}
                </td>
               </tr>
           </table>
           <table>
               <tr>
                   <td width="200px"><strong>Jenis Transaksi</strong></td>
                   <td>:</td>
                   <td>@if($simpanan->jenis_transaksi == 'debit')
                        Penarikan Tunai
                        @elseif($simpanan->jenis_transaksi == 'kredit')
                        Setoran Tunai
                        @endif
                   </td>
               </tr>
               <tr>
                   <td><strong>Nomor/Nama Anggota</strong></td>
                   <td>:</td>
                   <td>{{str_pad($simpanan->anggota->no_anggota,3,'0',STR_PAD_LEFT)}}/ {{$simpanan->anggota->nama_lengkap}}
                        
                   </td>
               </tr>
               <tr>
                   <td><strong>Jenis Simpanan</strong></td>
                   <td>:</td>
                   <td>{{$simpanan->jenissimpanan->nama_jenis}}</td>
               </tr>
               <tr>
                   <td><strong>Keterangan</strong></td>
                   <td>:</td>
                   <td>{{$simpanan->keterangan}}</td>
               </tr>
               <tr>
                   <td><strong>Total</strong></td>
                   <td>:</td>
                   <td>Rp. {{number_format($simpanan->jumlah,0,',','.')}},-</td>
               </tr>
               <tr>
                   <td><strong>Terbilang</strong></td>
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
           <hr>
           <p align="right">
            <a href="/simpanan/transaksi" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
            @if(auth()->user()->role->nama_role == "Super Admin" or auth()->user()->role->nama_role == "Admin")
                    @if($simpanan->tgl_transaksi == date('Y-m-d'))
                        <button class="btn btn-danger hapus" data-name="{{$simpanan->no_transaksi}}" data-id="{{$simpanan->uuid}}" title="Batalkan Transaksi"><i class="fa fa-times"></i> Batalkan</button>
                    @else
                    
                    @endif
                @else
                    
                @endif

            
            <a href="/simpanan/cetak-nota/{{$simpanan->uuid}}/print" class="btn btn-default" target="_blank"><i class="fa fa-print"></i> Print</a></p>
        </x-card>
    </section>
</div>


@endsection
@section('footer')
<!-- Toastr -->
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
<script>
  $(document).ready( function () {
   

    $('body').on('click', '.hapus', function (event) {
        event.preventDefault();

        var data_name = $(this).attr('data-name'),
            title = data_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
            data_id = $(this).attr('data-id');
        swal({
            title: "Anda Yakin?",
            text: "Mau Membatalkan Transaksi : "+ title +"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((result) => {
            if (result) {
                $.ajax({
                    url: "/simpanan/"+data_id+"/delete",
           
                    success: function (response) {
                    
                        swal({
                            icon: "success",
                            title: "BERHASIL!",
                            text: "Data Transaksi Berhasil dibatalkan/dihapus",
                            footer: '<a href="/simpanan/transaksi">Kembali?</a>'
                          });

                    },
                    error: function (xhr) {
                        swal("Oops...", "Terjadi Kesalahan", "error");
                        
                    }
                });
            }
        });
    });

  });
</script>
@stop
