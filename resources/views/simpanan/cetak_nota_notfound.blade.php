@extends('layouts.app')

@section('title')
Cetak Nota
@endsection

@section('header')

@endsection

@section('content')
<div class="content-wrapper">
    <x-breadchumb title="Transaksi Tidak Ditemukan" menu1="Dashboard" link1="home" menu3="Transaksi Tidak Ditemukan"/>

    <section class="content">
        <x-card judul="Transaksi Tidak Ditemukan">
            <p align="center">
                <img src="{{asset('images/Search_Not_Found.png')}}" width="500px">
            </p>
           <h3 align="center">Transaksi Tidak Ditemukan</h3>
        </x-card>
    </section>
</div>


@endsection
@section('footer')

@stop
