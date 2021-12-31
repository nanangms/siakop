<form action="/simpanan/{{$simpanan->uuid}}/update" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
             
            <x-forms.input_v id="no_anggota" type="text" name="no_anggota" label="No. Anggota" isRequired="true" value="{{str_pad($simpanan->anggota->no_anggota,3,'0',STR_PAD_LEFT)}}" isReadonly="true"/>
            <x-forms.input_v id="nama_anggota" type="text" name="nama_anggota" label="Nama" isRequired="true" value="{{$simpanan->anggota->nama_lengkap}}" isReadonly="true"/>
            <x-forms.input_v id="no_transaksi" type="text" name="no_transaksi" label="No. Transaksi" isRequired="true" value="{{$simpanan->no_transaksi}}" isReadonly="true"/>
            <x-forms.input_v id="tgl_transaksi" type="date" name="tgl_transaksi" label="Tanggal Transaksi" isRequired="true" value="{{$simpanan->tgl_transaksi}}" isReadonly="true"/>
            
        </div>
        <div class="col-md-6">
            <x-forms.select_v id="jenis_transaksi" name="jenis_transaksi" label="Jenis Transaksi" isRequired="true" isSelect2="">
                <option value="">[Pilih]</option>
                <option value="kredit" @if($simpanan->jenis_transaksi == 'kredit') selected @endif>Simpanan</option>
                <option value="debit" @if($simpanan->jenis_transaksi == 'debit') selected @endif>Penarikan</option>
            </x-forms.select_v>
            <x-forms.select_v id="jenissimpanan_id" name="jenissimpanan_id" label="Posisi Transaksi" isRequired="true" isSelect2="">
                <option value="">[Pilih]</option>
                @foreach($jenis_simpanan as $data)
                    <option value="{{$data->id}}" @if($simpanan->jenissimpanan_id == $data->id) selected @endif>{{$data->kode_jenis}} {{$data->nama_jenis}}</option>
                @endforeach
            </x-forms.select_v>
            <x-forms.input_v id="keterangan" type="text" name="keterangan" label="Uraian/Keterangan" isRequired="true" value="{{$simpanan->keterangan}}" isReadonly=""/>
           
            <x-forms.input_v id="jumlah" type="text" name="jumlah" label="Jumlah" isRequired="true" value="{{$simpanan->jumlah}}" isReadonly=""/>
        
        </div>
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
    </div>
   
    
</form>
<script src="{{asset('admin')}}/mask_plugin/dist/jquery.mask.min.js"></script>
<script>
    $(document).ready( function () {
        $('#jumlah').mask('000.000.000.000.000', {reverse: true});
    });
</script>