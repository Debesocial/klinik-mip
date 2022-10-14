@extends('layouts.dashboard.app')

@section('title', 'Keterangan Sehat')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Keterangan Sehat')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

        <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist" style="width: 50%">
                                    <a class="list-group-item list-group-item-action active"
                                        id="list-datapasien-list" data-bs-toggle="list" href="#list-datapasien"
                                        role="tab">Data Pasien</a>
                                    <a class="list-group-item list-group-item-action" id="list-pemeriksaan-list"
                                        data-bs-toggle="list" href="#list-pemeriksaan" role="tab">Pemeriksaan</a>
                                     
                                </div>

            <div class="tab-content text-justify">
             <div class="tab-pane fade show active" id="list-datapasien" role="tabpanel" aria-labelledby="list-datapasien-list">                                      
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
            <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>ID Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="search" id="id_pasien" class="form-control"
                                                    name="id_pasien" placeholder="ID Pasien">
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Nama Pasien</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="nama_pasien" class="form-control"
                                                        name="nama_pasien" placeholder="Nama Pasien" required disabled>
                                                </div>

                                                <div class="col-md-6">
                                                    </div>
                                            <div class="col-md-2">
                                                <label>No Surat</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="no_surat" class="form-control"
                                                    name="no_surat" placeholder="No Surat" required disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Tempat Lahir</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="pasien_tempat_lahir" class="form-control"
                                                        name="pasien_tempat_lahir" placeholder="Tempat Lahir" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="date" id="pasien_tanggal_lahir" class="form-control"
                                                            name="pasien_tanggal_lahir" placeholder="Tanggal Lahir" required disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                            <div class="col-md-2">
                                                <label>Umur</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="umur" class="form-control"
                                                    name="umur" placeholder="Umur" required disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Pekerjaan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="pekerjaan" class="form-control"
                                                        name="pekerjaan" placeholder="Pekerjaan" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="perusahaan" class="form-control"
                                                            name="perusahaan" placeholder="Perusahaan" required disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                        
                                                <div class="col-md-2">
                                                <label>Divisi</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="perusahaan" class="form-control"
                                                    name="perusahaan" placeholder="Perusahaan" required disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Jabatan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="jabatan" class="form-control"
                                                        name="jabatan" placeholder="Jabatan" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        </div>

        <div class="tab-pane fade" id="list-pemeriksaan" role="tabpanel"
                                        aria-labelledby="list-pemeriksaan-list">
                                        <section id="basic-horizontal-layouts">
            <div class="row match-height">
            <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Anamnesis*</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="id_pasien" class="form-control"
                                                    name="id_pasien" placeholder="ID Pasien">
                                            </div>
                                            <div class="col-md-6">

                                                </div>
                                                <div class="col-md-2">
                                                    <label>Pemeriksa Fisik*</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                </div>
                                                <div class="col-md-6">
                                                    </div>    <br><br>

                                                <div class="col-md-2">
                                                    <label>Tinggi Badan</label>
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <input type="text" id="tinggi_badan" class="form-control"
                                                        name="tinggi_badan" placeholder="tinggi badan">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Cm</label>
                                                </div>
                                                <div class="col-md-5">
                                                    </div>
                                            
                                                    <div class="col-md-2">
                                                        <label>Berat Badan</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <input type="text" id="berat_badan" class="form-control"
                                                            name="berat_badan" placeholder="berat badan">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Kg</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        </div>

                                                    <div class="col-md-2">
                                                            <label>Suhu Tubuh</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <input type="text" id="suhu_tubuh" class="form-control"
                                                                name="suhu_tubuh" placeholder="suhu tubuh">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Celcius</label>
                                                     </div>
                                                    <div class="col-md-5">
                                                     </div>    
                                            
                                                     <div class="col-md-2">
                                                        <label>Tekanan Darah</label>
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <input type="text" id="tekanan_darah" class="form-control"
                                                            name="tekanan_darah" placeholder="Tekanan Darah">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>mmHg</label>
                                                 </div>
                                                <div class="col-md-5">
                                                 </div> 

                                                 <div class="col-md-2">
                                                    <label>Denyut Nadi</label>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <input type="text" id="denyut_nadi" class="form-control"
                                                        name="denyut_nadi" placeholder="">
                                            </div>
                                            <div class="col-md-1">
                                                <label>per</label>
                                             </div>
                                             <div class="col-md-2 form-group">
                                                <input type="text" id="satuan_nadi" class="form-control"
                                                        name="satuan_nadi" placeholder="">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Menit</label>
                                        </div>
                                            <div class="col-md-2">
                                             </div>

                                             <div class="col-md-2">
                                                <label>Laju Pernapasan</label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input type="text" id="laju_pernapasan" class="form-control"
                                                    name="laju_pernapasan" placeholder="">
                                        </div>
                                        <div class="col-md-1">
                                            <label>per</label>
                                         </div>
                                         <div class="col-md-2 form-group">
                                            <input type="text" id="per" class="form-control"
                                                    name="per" placeholder="">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Menit</label>
                                    </div>
                                        <div class="col-md-2">
                                         </div>

                                         <div class="col-md-2">
                                            <label>Saturasi Oksigen</label>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <input type="text" id="saturasi_oksigen" class="form-control"
                                                name="saturasi_oksigen" placeholder="">
                                    </div>
                                    <div class="col-md-7">
                                     </div> 

                                     <div class="col-md-2">
                                        <label>Pemeriksaan Penunjang</label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" id="id_pasien" class="form-control"
                                            name="id_pasien" placeholder="ID Pasien">
                                    </div>
                                    <div class="col-md-6">
                                    </div>

                                        <div class="col-md-2">
                                            <label>Diagnosa</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                        <select class="choices form-select">
                                            <optgroup label="diagnosa">
                                                <option value="romboid">IT</option>
                                                <option value="trapeze">HSE</option>
                                                <option value="triangle">Triangle</option>
                                                <option value="polygon">Polygon</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                        <div class="col-md-6">
                                        </div>

                                        <div class="col-md-2">
                                            <label>Diagnosa Sekunder</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                        <select class="choices form-select">
                                            <optgroup label="sekunder">
                                                <option value="romboid">IT</option>
                                                <option value="trapeze">HSE</option>
                                                <option value="triangle">Triangle</option>
                                                <option value="polygon">Polygon</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                        <div class="col-md-6">
                                        </div>

                                        <div class="col-md-2">
                                            <label>Klasifikasi Penyakit</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                        <select class="choices form-select">
                                            <optgroup label="klasifikasi">
                                                <option value="romboid">IT</option>
                                                <option value="trapeze">HSE</option>
                                                <option value="triangle">Triangle</option>
                                                <option value="polygon">Polygon</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                        <div class="col-md-6">
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </section>
        </div>

        


        
        </div>
                </div>   

@endsection