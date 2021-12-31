<table width="100%">
	<tr>
		<td><strong>No. Anggota</strong></td>
		<td>:</td>
		<td>{{str_pad($model->no_anggota,3,'0',STR_PAD_LEFT)}}</td>
	</tr>
	<tr>
		<td><strong>Nama Lengkap</strong></td>
		<td>:</td>
		<td>{{$model->nama_lengkap}}</td>
	</tr>
	<tr>
		<td><strong>NIK</strong></td>
		<td>:</td>
		<td>{{$model->nik}}</td>
	</tr>
	<tr>
		<td><strong>Jenis Kelamin</strong></td>
		<td>:</td>
		<td>{{$model->jenis_kelamin}}</td>
	</tr>
	<tr>
		<td><strong>Tempat, Tanggal Lahir</strong></td>
		<td>:</td>
		<td>{{$model->t4_lahir}}, {{tanggalAja($model->tgl_lahir)}}</td>
	</tr>
	<tr>
		<td><strong>Agama</strong></td>
		<td>:</td>
		<td>{{$model->agama->nama_agama}}</td>
	</tr>
	<tr>
		<td><strong>Kota</strong></td>
		<td>:</td>
		<td>{{$model->kota}}</td>
	</tr>
	<tr>
		<td><strong>Alamat</strong></td>
		<td>:</td>
		<td>{{$model->alamat}}</td>
	</tr>
	<tr>
		<td><strong>Kode Pos</strong></td>
		<td>:</td>
		<td>{{$model->kode_pos}}</td>
	</tr>
	<tr>
		<td><strong>No. Telp/HP</strong></td>
		<td>:</td>
		<td>{{$model->no_hp}}</td>
	</tr>
	<tr>
		<td><strong>Catatan/Keterangan</strong></td>
		<td>:</td>
		<td>{{$model->keterangan}}</td>
	</tr>
</table>