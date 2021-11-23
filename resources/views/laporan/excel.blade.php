<table>
  <tr>
    <th>No</th>
    <th>Nama Usaha</th>
    <th>Sektor</th>
    <th>Badan Hukum</th>
    <th>Kota/Kab.</th>
    <th>Pemilik Usaha</th>
    <th>NIK Pemilik</th>
    <th>Email Pemilik</th>
    <th>WA Pemilik</th>
    <th>Jenis Usaha</th>
    <th>Siup Usaha</th>
    <th>Mulai Usaha</th>
    <th>Alamat Usaha</th>
    <th>Email Usaha</th>
    <th>Telepon Usaha</th>
    <th>Web Usaha</th>
    <th>Keahlian</th>
    <th>Pengalaman</th>
    <th>Portofolio</th>
    <th>Status Member</th>
    <th>Deskripsi</th>
    <th>Tanggal Daftar</th>
  </tr>
  <?php $no = 0; ?>
  @foreach ($data as $list)
  <?php $no++ ; ?>
  <tr>
    <td>{{$no}}</td>
    <td>{{$list->nama_usaha}}</td>
    <td>{{$list->nama_sektor}}</td>
    <td>{{$list->nama_badan_hukum}}</td>
    <td>{{$list->nama_kab_kota}}</td>
    <td>{{$list->nama_pemilik}}</td>
    <td>{{$list->nik_pemilik}}</td>
    <td>{{$list->email_pemilik}}</td>
    <td>{{$list->wa_pemilik}}</td>
    <td>{{$list->jenis_usaha}}</td>
    <td>{{$list->siup_usaha}}</td>
    <td>{{\Carbon\Carbon::parse($list->mulai_usaha)->format('d M Y')}}</td>
    <td>{{$list->alamat_usaha}}</td>
    <td>{{$list->email_usaha}}</td>
    <td>{{$list->telepon_usaha}}</td>
    <td>{{$list->web_usaha}}</td>
    <td>{{$list->keahlian}}</td>
    <td>{{$list->pengalaman}}</td>
    <td>{{$list->portofolio}}</td>
    <td>{{$list->member}}</td>
    <td>{{$list->deskripsi}}</td>
    <td>{{\Carbon\Carbon::parse($list->created_at)->format('d M Y')}}</td>
  </tr>
  @endforeach
</table>