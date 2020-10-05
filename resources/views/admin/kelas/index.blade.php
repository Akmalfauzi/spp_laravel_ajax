@extends('admin.layout.master')
@section('icon_menu')
<i class="fas fa-credit-card"></i>
@endsection
@section('title_menu')
Kelas
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
						<table class="table table-striped" id="tbl">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Kelas</th>
									<th>Kompetensi Keahlian</th>
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
	<x-slot name="modalSize">modal-md</x-slot>
	<x-slot name="idForm">formAdd</x-slot>
	<x-slot name="form">
			<div class="row">
				<div class="col-md-6">
                    <input type="hidden" name="id" id="id">
					<div class="form-group" id="nama_kelas">
						<label for="">Nama Kelas</label>
						<input type="text" class="form-control" name="nama_kelas">
					</div>										
				</div>
				<div class="col-md-6">
					<div class="form-group" id="kompetensi_keahlian_id">
                        <label for="">Kompetensi Keahlian</label>
                        <select name="kompetensi_keahlian_id" class="form-control">
                            @forelse ($kompetensi as $kom)
                                <option value="{{ $kom->id }}">{{ $kom->nama_kompetensi }}</option>
                            @empty
                            <option value="">Kosong</option>
                            @endforelse
                        </select>
					</div>
				</div>
			</div>
	</x-slot>
</x-modal>
@endsection

@push('js')
	@include('admin.kelas.script')
@endpush