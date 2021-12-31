@extends('layouts.app')

@section('title')
Identitas Koperasi
@endsection

@section('header')

@endsection

@section('content')
<div class="content-wrapper">
    <x-breadchumb title="Identitas Koperasi" menu1="Dashboard" link1="home" menu3="Identitas Koperasi"/>

    <section class="content">
        <x-card judul="Identitas Koperasi">
            <form action="/data-master/identitas-koperasi/update" class="form-horizontal" method="POST">
                @csrf
                <input type="hidden" name="uuid" value="{{$identiti->uuid}}">
                <div class="row">
                    <div class="col-md-6">
                        <x-forms.input_v id="nama_koperasi" type="text" name="nama_koperasi" label="Nama Koperasi" isRequired="false" value="{{$identiti->nama_koperasi}}" isReadonly="" placeholder=""/>
                        <x-forms.input_v id="nama_pimpinan" type="text" name="nama_pimpinan" label="Nama Pimpinan" isRequired="false" value="{{$identiti->nama_pimpinan}}" isReadonly="" placeholder=""/>
                        <x-forms.input_v id="no_hp" type="text" name="no_hp" label="No. Handphone" isRequired="false" value="{{$identiti->no_hp}}" isReadonly="" placeholder=""/>
                        <x-forms.input_v id="no_telp" type="text" name="no_telp" label="Nomor Telepon" isRequired="false" value="{{$identiti->no_telp}}" isReadonly="" placeholder=""/>

                    </div>
                    <div class="col-md-6">
                        <x-forms.input_v id="alamat" type="text" name="alamat" label="Alamat" isRequired="false" value="{{$identiti->alamat}}" isReadonly="" placeholder=""/>
                        <x-forms.input_v id="kota" type="text" name="kota" label="Kota/Kabupaten" isRequired="false" value="{{$identiti->kota}}" isReadonly="" placeholder=""/>
                        <x-forms.input_v id="email" type="text" name="email" label="Email" isRequired="false" value="{{$identiti->email}}" isReadonly="" placeholder=""/>
                        <x-forms.input_v id="website" type="text" name="website" label="Website" isRequired="false" value="{{$identiti->website}}" isReadonly="" placeholder=""/>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
                

            </form>
        </x-card>
    </section>
</div>


@endsection
@section('footer')


@stop
