<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
</head>
<body>
<h5 align="center">Detail Anggota</h5>
<div class="row">
    <div class="col-md-6">
        <table width="100%" class="table-striped">
            <tr>
                <td>Nomor</td>
                <td>:</td>
                <td>{{str_pad($anggota->no_anggota,3,'0',STR_PAD_LEFT)}}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{$anggota->nik}}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{$anggota->nama_lengkap}}</td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td>{{$anggota->t4_lahir}}, {{TanggalAja($anggota->tgl_lahir)}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{$anggota->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{$anggota->agama->nama_agama}}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <table width="100%" class="table-striped">
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$anggota->alamat}}</td>
            </tr>
            <tr>
                <td>Kota</td>
                <td>:</td>
                <td>{{$anggota->kota}}</td>
            </tr>
            <tr>
                <td>Kode Pos</td>
                <td>:</td>
                <td>{{$anggota->kode_pos}}</td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>:</td>
                <td>{{$anggota->no_hp}}</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td>{{$anggota->keterangan}}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>{{$anggota->status}}</td>
            </tr>
        </table>
    </div>
</div>

    <hr>

<table id="datatablemodal" class="table table-bordered table-hover table-striped">
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
<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready( function () {
        var id = {{$id}};
        $('#datatablemodal').DataTable({
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
    });
</script>
</body>
</html>
