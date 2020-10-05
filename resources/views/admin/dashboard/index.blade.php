@extends('admin.layout.master')
@section('icon_menu')
<i class="fas fa-fire"></i>
@endsection
@section('title_menu')
Dashboard - {{ auth()->user()->role_id == 1 ? 'Admin' : '' }} {{ auth()->user()->role_id == 2 ? 'Petugas' : '' }} {{ auth()->user()->role_id == 3 ? 'Murid' : '' }}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Petugas</h4>
          </div>
          <div class="card-body">
            {{ $petugas }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Murid</h4>
          </div>
          <div class="card-body">
            {{ $murid }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Spp</h4>
          </div>
          <div class="card-body">
            {{ $spp }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-credit-card"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Pembayaran</h4>
          </div>
          <div class="card-body">
            {{ $pembayaran }}
          </div>
        </div>
      </div>
    </div>                  
  </div>
@endsection