@extends('layouts.dashboard.app')

@section('title', 'Ubah Keterangan Sehat')
@section('breadcrumb', 'ubah_keterangan_sehat')
@section('keterangansehat', 'active')
@section('judul', 'Ubah Keterangan Sehat')
@section('container')

<div class="card">
    <div class="card-body">
        <form class="form form-horizontal" id="keterangan-sehat" onsubmit="showLoader()" action="/ubah/keterangan/sehat/{{$keterangan->id}}" method="post" >
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        {!! detailPasienSurat([
                            'Nama Pasien' => 'nama_pasien',
                            'Tempat Lahir' => 'tempat_lahir',
                            'Tanggal Lahir' => 'tanggal_lahir',
                            'Umur' => 'umur',
                            'Pekerjaan' => 'pekerjaan',
                            'Kategori' => 'kategori_pasien_id',
                            'Perusahaan' => 'perusahaan_id',
                            'Divisi' => 'divisi_id',
                            'Jabatan' => 'jabatan_id',
                            'Jenis Kelamin' => 'jenis_kelamin'
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Tinggi Badan <b class="color-red">*</b></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="tinggi_badan" id="tinggi_badan" value="{{$keterangan->tinggi_badan}}" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Berat Badan <b class="color-red">*</b></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="berat_badan" id="berat_badan" value="{{$keterangan->berat_badan}}" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">kg</span>
                            </div>
                        </div>
                    </div>
                    <div class=" mb-3">
                        <label>Suhu Tubuh <b class="color-red">*</b></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="suhu_tubuh" id="suhu_tubuh" value="{{$keterangan->suhu_tubuh}}" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Celcius</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Tekanan Darah <b class="color-red">*</b></label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="tekanan_darah" id="tekanan_darah" value="{{$keterangan->tekanan_darah}}" required>
                            <span class="input-group-text" id="basic-addon2">/</span>
                            <input type="number" class="form-control" name="tekanan_darah_per" id="tekanan_darah_per" value="{{$keterangan->tekanan_darah_per}}" required>
                            <span class="input-group-text" id="basic-addon2">mmHg</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Denyut Nadi <b class="color-red">*</b></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="denyut_nadi" id="denyut_nadi" value="{{$keterangan->denyut_nadi}}" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">/menit</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Laju Pernapasan <b class="color-red">*</b></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="laju_pernapasan" id="laju_pernapasan" value="{{$keterangan->laju_pernapasan}}" required  >
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">/menit</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Saturasi Oksigen <b class="color-red">*</b></label>
                        <input type="number" id="saturasi" class="form-control" name="saturasi" placeholder="" value="{{$keterangan->saturasi}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Pemeriksaan Fisik <b class="color-red">*</b></label>
                        <textarea name="pemeriksaan_fisik" id="pemeriksaan_fisik" class="form-control" required>{{$keterangan->pemeriksaan_fisik}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Buta Warna <b class="color-red">*</b></label>
                        <input class="form-check-input" type="radio" name="buta_warna" id="buta_warna" value="0" {{$keterangan->buta_warna==0?'checked':''}}> Tidak
                        <input class="form-check-input " type="radio" name="buta_warna" id="buta_warna" value="1" {{$keterangan->buta_warna==1?'checked':''}}> Ya
                    </div>
                    <div class="mb-3">
                        <label>Hasil Pemeriksaan <b class="color-red">*</b></label>
                        <input class="form-check-input" type="radio" name="hasil" id="hasil" value="0" {{$keterangan->hasil==0?'checked':''}}> Tidak Sehat
                        <input class="form-check-input " type="radio" name="hasil" id="hasil" value="1"{{$keterangan->hasil==1?'checked':''}}> Sehat
                    </div>
                    <div class="mb-3" id="alasan" style="display: {{$keterangan->hasil==1?'none':''}}">
                        <label for="">Alasan tidak sehat</label>
                        <textarea name="alasan_sakit" id="alasan_sakit" class="form-control" placeholder="Masukkan alasan tidak sehat">{{$keterangan->alasan_sakit}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-end">
                    <button type="submit"  class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@section('js')
    <script>
        $('select').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });
        
        let colId = [
            'nama_pasien',
            'tempat_lahir',
            'tanggal_lahir',
            'umur',
            'pekerjaan',
            'kategori_pasien_id',
            'perusahaan_id',
            'divisi_id',
            'jabatan_id',
            'jenis_kelamin'
        ];
        let pasien = @json($keterangan->pasien);
        function setPasien(){
            let pas = pasien;
            pas.perusahaan_id = cekNull(pas.perusahaan?.nama_perusahaan_pasien);
            pas.divisi_id = cekNull(pas.divisi?.nama_divisi_pasien);
            pas.jabatan_id = cekNull(pas.jabatan?.nama_jabatan);
            pas.kategori_pasien_id = cekNull(pas.kategori.nama_kategori);
            pas.umur = getAge(pas.tanggal_lahir);
            colId.forEach(col => {
                $('#'+col).text(': '+pas[col]);
            });
        }
        function getAge(dateString) {
            var today = new Date();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }
        setPasien();

        $('[id*="hasil"]').change(function(){
            var val = $(this).val();
            if (val == 0) {
                $('#alasan').show();
            }else{
                $('#alasan').hide();
                $('#alasan_sakit').val('');
            }
        })
    </script>
@stop

@endsection