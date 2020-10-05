@extends('admin.layout.master')
@section('icon_menu')
<i class="fas fa-credit-card"></i>
@endsection
@section('title_menu')
Pembayaran
@endsection
@section('content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-4 ml-4">
                        <button class="btn btn-md btn-primary" id="btnAdd">
                            <i class="fa fa-paper-plane"></i> Tambah Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabe">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Murid</th>
                                    <th>Kelas</th>
                                    <th>Petugas</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<x-modal>
    <x-slot name="modalSize">modal-lg</x-slot>
    <x-slot name="idForm">formAdd</x-slot>
    <x-slot name="form">
        <input type="hidden" name="id" id="id">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group" id="murid_id">
                    <label for="">Murid</label>
                    <select name="murid_id" id="" class="form-control">
                        @forelse ($murid as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_murid }}</option>
                        @empty
                            Kosong
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" id="tgl_bayar">
                    <label for="">Tanggal Bayar</label>
                    <input type="date" class="form-control" name="tgl_bayar">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" id="bulan">
                    <label for="">Bulan dibayar</label>
                    <select name="bulan" id="" class="form-control">
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" id="tahun">
                    <label for="">Tahun dibayar</label>
                    <input type="number" class="form-control" name="tahun">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" id="spp_id">
                    <label for="">Tahun - Nominal</label>
                    <select name="spp_id" id="" class="form-control">
                        <option value="">Pilih</option>
                        @forelse ($spp as $item)
                            <option value="{{ $item->id }}">{{ $item->tahun }} - {{ $item->nominal }}</option>
                        @empty
                            Kosong
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" id="jumlah_bayar">
                    <label for="">Jumlah Bayar</label>
                    <input type="number" readonly class="form-control" name="jumlah_bayar" >
                </div>
            </div>
        </div>
    </x-slot>
</x-modal>


<div class="modal fade" role="dialog" id="modalEdit">
    <div class="modal-dialog modal-lg" role="document">
        <form id="formEdit">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="idEdit">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" id="enama_petugas">
                                <label for="">Nama Petugas</label>
                                <input type="text" class="form-control" name="nama_petugas">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group" id="eemail">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group" id="epassword">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button id="btnClose" type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </button>
                    <button id="btnSubmit" type="submit" class="btn btn-primary">
                        <i class="fa fa-check"></i> Save changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('js')
    @include('admin.pembayaran.script')
@endpush
