<table width="100%">
	<tr>
		<td colspan="3">
			<h4>Identitas Anggota</h4>
		</td>
	</tr>
	<tr>
		<td><strong>No. Anggota</strong></td>
		<td>:</td>
		<td>{{str_pad($user->anggota->no_anggota,3,'0',STR_PAD_LEFT)}}</td>
	</tr>
	<tr>
		<td><strong>Nama Lengkap</strong></td>
		<td>:</td>
		<td>{{$user->anggota->nama_lengkap}}</td>
	</tr>
	<tr>
		<td><strong>NIK</strong></td>
		<td>:</td>
		<td>{{$user->anggota->nik}}</td>
	</tr>
	<tr>
		<td><strong>Jenis Kelamin</strong></td>
		<td>:</td>
		<td>{{$user->anggota->jenis_kelamin}}</td>
	</tr>
	<tr>
		<td><strong>Tempat, Tanggal Lahir</strong></td>
		<td>:</td>
		<td>{{$user->anggota->t4_lahir}}, {{tanggalAja($user->anggota->tgl_lahir)}}</td>
	</tr>
	<tr>
		<td><strong>Agama</strong></td>
		<td>:</td>
		<td>{{$user->anggota->agama->nama_agama}}</td>
	</tr>
	<tr>
		<td><strong>Kota</strong></td>
		<td>:</td>
		<td>{{$user->anggota->kota}}</td>
	</tr>
	<tr>
		<td><strong>Alamat</strong></td>
		<td>:</td>
		<td>{{$user->anggota->alamat}}</td>
	</tr>
	<tr>
		<td><strong>Kode Pos</strong></td>
		<td>:</td>
		<td>{{$user->anggota->kode_pos}}</td>
	</tr>
	<tr>
		<td><strong>No. Telp/HP</strong></td>
		<td>:</td>
		<td>{{$user->anggota->no_hp}}</td>
	</tr>
	<tr>
		<td><strong>Catatan/Keterangan</strong></td>
		<td>:</td>
		<td>{{$user->anggota->keterangan}}</td>
	</tr>
	<tr>
		<td colspan="3"><hr></td>
	</tr>
	<tr>
		<td colspan="3">
			<h4>Detail Pengguna</h4>
		</td>
	</tr>
	<tr>
		<td><strong>Nama Pengguna</strong></td>
		<td>:</td>
		<td>{{$user->name}}</td>
	</tr>
	<tr>
		<td><strong>E-mail</strong></td>
		<td>:</td>
		<td>{{$user->email}}</td>
	</tr>
	<tr>
		<td><strong>No. Handphone</strong></td>
		<td>:</td>
		<td>{{$user->no_hp}}</td>
	</tr>
	<tr>
		<td><strong>Status Aktif</strong></td>
		<td>:</td>
		<td>@if($user->is_active == 'Y')
                    <span class="badge badge-success">Aktif</span>
                @else
                    <span class="badge badge-danger">Tidak Aktif</span>
                @endif</td>
	</tr>
	<tr>
		<td><strong>Status Verifikasi</strong></td>
		<td>:</td>
		<td>@if($user->verifikasi == 'Y')
                    <span class="badge badge-success">Terverifikasi</span>
                @elseif($user->verifikasi == 'N'){
                    <span class="badge badge-danger">Ditolak</span>
                @else
                    <span class="badge badge-warning">Belum Diverifikasi</span>
                @endif</td>
	</tr>
	<tr>
		<td><strong>Terakhir Login</strong></td>
		<td>:</td>
		<td>{{TanggalWaktu($user->last_login_at)}}</td>
	</tr>
	<tr>
		<td><strong>Bergabung Sejak</strong></td>
		<td>:</td>
		<td>{{TanggalWaktu($user->created_at)}}</td>
	</tr>
</table>