@extends('layouts.app')

@section('title')
Tambah Simpanan
@endsection

@section('header')
<!-- Select2 -->
  <link rel="stylesheet" href="{{asset('admin')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('admin')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <x-breadchumb title="Setoran/Penarikan Tunai" menu1="Dashboard" link1="home" menu3="Setoran/Penarikan Tunai"/>

    <section class="content">
        <x-card judul="Form Setoran/Penarikan Tunai">
            <form action="/simpanan/tambah/submit" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                         <x-forms.select_v id="anggota_id" name="anggota_id" label="Anggota" isRequired="true" isSelect2="true">
                            <option value="">Cari...</option>
                            @foreach($anggota as $a)
                                <option value="{{$a->id}}">{{str_pad($a->no_anggota,3,'0',STR_PAD_LEFT)}} - {{$a->nama_lengkap}}</option>
                            @endforeach
                        </x-forms.select_v>
                  
                        <x-forms.input_v id="nama_anggota" type="text" name="nama_anggota" label="Nama" isRequired="true" value="" isReadonly="true" placeholder=""/>
                      
                        <input type="hidden" name="no_urut" value="{{$format_notransaksi}}">
                        
                        
                    </div>
                    <div class="col-md-3">
                        <x-forms.input_v id="no_transaksi" type="text" name="no_transaksi" label="No. Transaksi" isRequired="true" value="SA-06/{{date('Y')}}/{{$format_notransaksi}}" isReadonly="true" placeholder=""/>
                        <x-forms.input_v id="tgl_transaksi" type="date" name="tgl_transaksi" label="Tanggal Transaksi" isRequired="true" value="{{date('Y-m-d')}}" isReadonly="true" placeholder=""/>
                    </div>
                    <div class="col-md-3">
                        <x-forms.select_v id="jenis_transaksi" name="jenis_transaksi" label="Posisi Transaksi" isRequired="true" isSelect2="">
                            <option value="">[Pilih]</option>
                            <option value="kredit">Setoran Tunai</option>
                            <option value="debit">Penarikan Tunai</option>
                        </x-forms.select_v>
                        <x-forms.select_v id="jenissimpanan_id" name="jenissimpanan_id" label="Jenis Simpanan" isRequired="true" isSelect2="">
                            <option value="">[Pilih]</option>
                            @foreach($jenis_simpanan as $data)
                                <option value="{{$data->id}}">{{$data->kode_jenis}} {{$data->nama_jenis}}</option>
                            @endforeach
                        </x-forms.select_v>
                        
                    
                    </div>
                    <div class="col-md-3">
                        <x-forms.input_v id="keterangan" type="text" name="keterangan" label="Uraian/Keterangan" isRequired="true" value="" isReadonly="" placeholder=""/>
                       
                        <x-forms.input_v id="jumlah" type="text" name="jumlah" label="Jumlah/Nominal" isRequired="true" value="" isReadonly="" placeholder=""/>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
                </div>
               
                
            </form>
        </x-card>
    </section>


    <section class="content" id="data-simpanan">
        <x-card judul="Data Simpanan">
            <table id="datatable" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th colspan="1" rowspan="2">No. Transaksi</th>
                        <th colspan="1" rowspan="2">Tanggal</th>
                        <th colspan="1" rowspan="2">Jenis Simpanan</th>
                        <th colspan="1" rowspan="2">Uraian/Keterangan</th>
                        <th colspan="2" rowspan="1">Posisi Transaksi</th>
                        <th colspan="1" rowspan="2">Saldo</th>
                    </tr>
                    <tr>
                        <th>Penarikan</th>
                        <th>Setoran</th>
                    </tr>
                </thead>
                <tbody>
               
                </tbody>
            </table>
        </x-card>

    </section>

    
</div>
@endsection
@section('footer')
<!-- Select2 -->
<script src="{{asset('admin')}}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{asset('admin')}}/mask_plugin/dist/jquery.mask.min.js"></script>
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready( function () {
        $('.select2').select2();
        $('#jumlah').mask('000.000.000.000.000', {reverse: true});
        $("#data-simpanan").hide();

        $('#anggota_id').change(function(){
            var id = $(this).val();
            var url = '{{ route("getAnggota", "vid") }}';
            url = url.replace('vid', id);
            $('#datatable').DataTable().clear().destroy();
            $('#datatable').DataTable({
                retrieve: true,
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "/simpanan/table/simpanan-anggota/"+id,
                columns: [
                    {data: 'no_transaksi', name: 'no_transaksi'},
                    {data: 'tgl_transaksi', name: 'tgl_transaksi'},
                    {data: 'jenissimpanan', name: 'jenissimpanan'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'debit', name: 'debit',className: "text-right"},
                    {data: 'kredit', name: 'kredit',className: "text-right"},
                    {data: 'saldo', name: 'saldo',className: "text-right"}
                ]
            });

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    $("#data-simpanan").show();
                    
                    if(response != null){
                        $('#nama_anggota').val(response.nama_lengkap);
                    }
                }
            });
        });

        $('#jenissimpanan_id').change(function(){
            var id = $(this).val();
            var nama = $('#nama_anggota').val();
            var url = '{{ route("getJenissimpanan", ":id") }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response){
            
                    if(response != null){
                        $('#keterangan').val(response.nama_jenis+', '+nama);
                    }
                }
            });
        });
    });
</script>

@stop
