@extends('layouts.app')

@section('title')
Tambah {{$jenis_pinjaman->nama_jenis}}
@endsection

@section('header')

@endsection

@section('content')
<div class="content-wrapper">
    <x-breadchumb title="Tambah {{$jenis_pinjaman->nama_jenis}}" menu1="Dashboard" menu2="Data Pinjaman" link2="pinjaman/data-pinjaman" link1="home" menu3="Tambah {{$jenis_pinjaman->nama_jenis}}"/>

    <section class="content">
        <x-card judul="Tambah {{$jenis_pinjaman->nama_jenis}}">
        <form action="/pinjaman/tambah/submit" method="POST">
                @csrf
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <x-forms.input_v id="tgl_pinjaman" type="date" name="tgl_pinjaman" label="Tanggal Peminjaman" isRequired="true" value="{{date('Y-m-d')}}" isReadonly="true" placeholder=""/>
                </div>
                <div class="col-md-4"></div>
            </div>
                <div class="row">
                    <div class="col-md-3">
                        <x-forms.select_v id="anggota_id" name="anggota_id" label="Anggota" isRequired="true" isSelect2="true">
                            <option value="">Cari...</option>
                            @foreach($anggota as $a)
                                <option value="{{$a->id}}">{{str_pad($a->no_anggota,3,'0',STR_PAD_LEFT)}} - {{$a->nama_lengkap}}</option>
                            @endforeach
                        </x-forms.select_v>
                  
                        <x-forms.input_v id="nama_anggota" type="text" name="nama_anggota" label="Nama" isRequired="true" value="" isReadonly="true" placeholder=""/>
                      
                        <input type="hidden" name="no_urut" value="{{$nomor_pinjaman}}">
                        <input type="hidden" name="jenispinjaman_id" value="{{$jenis_pinjaman->id}}">
                    </div>
                    <div class="col-md-3">
                        <x-forms.input_v id="no_pinjaman" type="text" name="no_pinjaman" label="No. Pinjaman" isRequired="true" value="PJ-06/{{date('Y')}}/{{$nomor_pinjaman}}" isReadonly="true" placeholder=""/>
                        <x-forms.select_v id="tgl_jatuhtempo" name="tgl_jatuhtempo" label="Tanggal Jatuh Tempo" isRequired="true" isSelect2="true">
                            <option value="">[Tanggal]</option>
                            <?php for($a=1; $a<=31; $a+=1){ ?>
                                <option value="{{$a}}" @if(old("tgl_jatuhtempo") == $a) selected @endif>{{$a}}</option>
                            <?php } ?>
                        </x-forms.select_v>
                    </div>
                    <div class="col-md-3">
                        <x-forms.select_v id="jangka_waktu" name="jangka_waktu" label="Jangka Waktu (bulan)" isRequired="true" isSelect2="true">
                            <option value="">[Jangka waktu]</option>
                            @foreach($jangkawaktu as $jk)
                                <option value="{{$jk->jangka_waktu}}" @if(old('jangka_waktu') == $jk->jangka_waktu) selected @endif>{{$jk->jangka_waktu}}</option>
                            @endforeach
                        </x-forms.select_v>
                        <x-forms.input_v id="jml_pinjaman" type="text" name="jml_pinjaman" label="Jumlah Pinjaman" isRequired="true" value="" isReadonly="false" onkeyup="angsuran();" placeholder=""/>
                    </div>
                    <div class="col-md-3">
                    
                        <x-forms.input_v id="bunga" type="text" name="bunga" label="Bunga %" isRequired="true" value="" isReadonly="false" placeholder="contoh: 2.5"/>
                        <x-forms.input_v id="keterangan" type="text" name="keterangan" label="Uraian/Keterangan" isRequired="true" value="" isReadonly="false" placeholder=""/>

                    </div>
                </div>
                <div class="row">
                    
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
<!-- Select2 -->
<script src="{{asset('admin')}}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{asset('admin')}}/mask_plugin/dist/jquery.mask.min.js"></script>
<script>
    $(document).ready( function () {
        $('.select2').select2({ width: '100%' });
        $('#jml_pinjaman').mask('000.000.000.000.000', {reverse: true});

        $('#anggota_id').change(function(){
            var id = $(this).val();
            var url = '{{ route("getAnggota", "vid") }}';
            url = url.replace('vid', id);
            

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    
                    if(response != null){
                        $('#nama_anggota').val(response.nama_lengkap);
                        $('#keterangan').val('PINJAMAN a.n'+' '+response.nama_lengkap);
                    }
                }
            });
        });

        $('#jangka_waktu').change(function(){
            var id = $(this).val();
            var url = '{{ route("getBunga", "vid") }}';
            url = url.replace('vid', id);
            

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    
                    if(response != null){
                        $('#bunga').val(response.nilai_bunga);
                    }
                }
            });
        });

       
    });
</script>
<script type="text/javascript">
     function angsuran(){
        var jangka_waktu = document.getElementById("jangka_waktu").value;
        var jml_pinjaman = document.getElementById('jml_pinjaman').value;
        var bunga = document.getElementById('bunga').value;
        
        var ags_pokok = parseInt(jml_pinjaman)/parseInt(jangka_waktu);
        var bunga_perbulan = parseInt(jml_pinjaman)*(parseFloat(bunga)*1/100);

        var angsuranperbulan = parseInt(ags_pokok)+parseInt(bunga_perbulan);

        document.getElementById("angsuran_pokok").value=parseInt(angsuranperbulan);
    }
</script>
@stop
