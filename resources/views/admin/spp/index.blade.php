@extends('admin.layout.master')
@section('icon_menu')
<i class="fas fa-credit-card"></i>
@endsection
@section('title_menu')
Spp
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
									<th>Tahun</th>
									<th>Nominal</th>
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
					<div class="form-group" id="tahun">
						<label for="">Tahun</label>
						<input type="number" class="form-control" name="tahun">
					</div>										
				</div>
				<div class="col-md-6">
					<div class="form-group" id="nominal">
						<label for="">Nominal</label>
						<input type="number" class="form-control" name="nominal">
					</div>
				</div>
			</div>
	</x-slot>
</x-modal>
@endsection

@push('js')
	@include('admin.spp.script')
@endpush