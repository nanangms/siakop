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

<x-card judul="Detail Anggota">
<div class="row">
    <div class="col-md-6">
        <table width="100%" class="table-striped" cellpadding="4" cellspacing="0">
            <tr>
                <td><strong>Nomor</strong></td>
                <td>:</td>
                <td>{{str_pad($anggota->no_anggota,3,'0',STR_PAD_LEFT)}}</td>
            </tr>
            <tr>
                <td><strong>NIK</strong></td>
                <td>:</td>
                <td>{{$anggota->nik}}</td>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td>:</td>
                <td>{{$anggota->nama_lengkap}}</td>
            </tr>
            <tr>
                <td><strong>Tempat, Tanggal Lahir</strong></td>
                <td>:</td>
                <td>{{$anggota->t4_lahir}}, {{TanggalAja($anggota->tgl_lahir)}}</td>
            </tr>
            <tr>
                <td><strong>Jenis Kelamin</strong></td>
                <td>:</td>
                <td>{{$anggota->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td><strong>Agama</strong></td>
                <td>:</td>
                <td>{{$anggota->agama->nama_agama}}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <table width="100%" class="table-striped" cellpadding="4" cellspacing="0">
            <tr>
                <td><strong>Alamat</strong></td>
                <td>:</td>
                <td>{{$anggota->alamat}}</td>
            </tr>
            <tr>
                <td><strong>Kota</strong></td>
                <td>:</td>
                <td>{{$anggota->kota}}</td>
            </tr>
            <tr>
                <td><strong>Kode Pos</strong></td>
                <td>:</td>
                <td>{{$anggota->kode_pos}}</td>
            </tr>
            <tr>
                <td><strong>No. HP</strong></td>
                <td>:</td>
                <td>{{$anggota->no_hp}}</td>
            </tr>
            <tr>
                <td><strong>Keterangan</strong></td>
                <td>:</td>
                <td>{{$anggota->keterangan}}</td>
            </tr>
            <tr>
                <td><strong>Status</strong></td>
                <td>:</td>
                <td>@if($anggota->status == 'AKTIF')
                    <span class="badge badge-success">AKTIF</span>
                @else
                    <span class="badge badge-danger">TIDAK AKTIF</span>
                @endif</td>
            </tr>
        </table>
    </div>
</div>
</x-card>
    <hr>
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>@if(!$simpanan_pokok)
            Rp 0,-
            @else
            Rp {{number_format($simpanan_pokok->saldo,0,',','.')}},-
            @endif
        </h3>

        <p>Simpanan Pokok</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>@if(!$simpanan_wajib)
            Rp 0,-
            @else
            Rp {{number_format($simpanan_wajib->saldo,0,',','.')}},-
            @endif
        </h3>
        <p>Simpanan Wajib</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>
            @if(!$simpanan_sukarela)
            Rp 0,-
            @else
            Rp {{number_format($simpanan_sukarela->saldo,0,',','.')}},-</h3>
            @endif
        </h3>

        <p>Simpanan Sukarela</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>@if(!$simpanan_wajib_khusus)
            Rp 0,-
            @else
            Rp {{number_format($simpanan_wajib_khusus->saldo,0,',','.')}},-</h3>
            @endif
        </h3>

        <p>Simpanan Wajib Khusus</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
<x-card judul="Riwayat Transaksi">
    <p align="right">
        <a href="" class="btn btn-info"><i class="fa fa-print"></i> Rekening Koran</a>
    </p>
    <hr>
<table id="datatablemodal" class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th colspan="1" rowspan="2">No. Transaksi</th>
            <th colspan="1" rowspan="2">Tanggal</th>
            <th colspan="1" rowspan="2">Jenis Simpanan</th>
            <th colspan="1" rowspan="2">Uraian/Keterangan</th>
            <th colspan="2" rowspan="1">Posisi Transaksi</th>
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
                {data: 'kredit', name: 'kredit',className: "text-right"}
            ]
        });
    });
</script>
</body>
</html>
