@extends('layouts.dashboard.app')

@section('title', 'Keterangan Sehat')
@section('keterangansehat', 'active')
@section('breadcrumb', 'tambah_keterangan_sehat')
@section('judul', 'Keterangan Sehat')
@section('container')

<div class="card">
    <div class="card-body">
        <form class="form form-horizontal" id="keterangan-sehat" onsubmit="showLoader()" action="/keterangan/sehat" method="post" >
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Tujuan Surat <b class="color-red">*</b></label>
                        <input type="text" class="form-control" name="tujuan" id="tujuan" aria-label="Recipient's username" required>
                    </div>
                    <div class="md-3">
                        <label>ID Rekam Medis Pasien <b class="color-red">*</b></label>
                        <select name="pasien_id" id="pasien_id" class="form-select" onchange="setPasien(this)" required>
                            <option disabled selected value="">Pilih ID Rekam Medis Pasien</option>
                            @foreach ($pasien_id as $pas)
                                <option value="{{ $pas['id'] }}">{{ $pas['id_rekam_medis'] }} - {{ $pas['nama_pasien'] }} </option>
                            @endforeach
                        </select>
                    </div>
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
                            <input type="number" class="form-control" name="tinggi_badan" id="tinggi_badan"  required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Berat Badan <b class="color-red">*</b></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="berat_badan" id="berat_badan"  required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">kg</span>
                            </div>
                        </div>
                    </div>
                    <div class=" mb-3">
                        <label>Suhu Tubuh <b class="color-red">*</b></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="suhu_tubuh" id="suhu_tubuh"  required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Celcius</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Tekanan Darah <b class="color-red">*</b></label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="tekanan_darah" id="tekanan_darah" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">mmHg</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Denyut Nadi <b class="color-red">*</b></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="denyut_nadi" id="denyut_nadi" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">/menit</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Laju Pernapasan <b class="color-red">*</b></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="laju_pernapasan" id="laju_pernapasan" required  >
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">/menit</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Saturasi Oksigen <b class="color-red">*</b></label>
                        <input type="number" id="saturasi" class="form-control" name="saturasi" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label>Hasil Pemeriksaan <b class="color-red">*</b></label>
                        <input class="form-check-input" type="radio" name="hasil" id="hasil" value="0" checked> Tidak Sehat
                        <input class="form-check-input " type="radio" name="hasil" id="hasil" value="1"> Sehat
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-end">
                    <button type="submit"  class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-light-secondary">Reset</button>
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
        let pasien = @json($pasien_id);
        function setPasien(select){
            id = $(select).val()
            let pas = pasien.find(data => data.id == id);
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
    </script>
@stop
                                                

@endsection