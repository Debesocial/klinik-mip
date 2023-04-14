<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('data_petugas', function (BreadcrumbTrail $trail) {
     $trail->push('Halaman Utama', route('dashboard'));
     $trail->push('Data Petugas', route('superadmin.datauser'));
});  
Breadcrumbs::for('tambah_data_petugas', function (BreadcrumbTrail $trail) {
     $trail->push('Halaman Utama', route('dashboard'));
     $trail->push('Data Petugas', route('superadmin.datauser'));
     $trail->push('Tambah Data Petugas', route('superadmin.datauser'));
});  