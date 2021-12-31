@extends('layouts.app')

@section('title')
Cetak Nota
@endsection

@section('header')

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
                   <td width="40%">No.Transaksi : {{$simpanan->no_transaksi}}
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
                   <td>{{str_pad($simpanan->anggota->no_anggota,3,'0',STR_PAD_LEFT)}}/ {{$simpanan->anggota->nama_lengkap}}
                        
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
           <hr>
           <p align="right"><a href="/simpanan/transaksi" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a> <a href="/simpanan/cetak-nota/{{$simpanan->uuid}}/print" class="btn btn-default" target="_blank"><i class="fa fa-print"></i> Print</a></p>
        </x-card>
    </section>
</div>


@endsection
@section('footer')

@stop
