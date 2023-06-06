@extends('surat.surat')

@section('no_surat','No: MIP/FRM/KLN/013');
@section('no_revisi','00');

@section('body-surat')
    <div class="row">
        <div class="col text-end">
            <p>Site Krassi, {{ tanggal($tindakan->created_at, false, true) }}</p>
        </div>
    </div>


@endsection