@extends('admin.layout.master')
@section('icon_menu')
<i class="fas fa-random"></i>
@endsection
@section('title_menu')
Role
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
									<th>Nama Role</th>
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
				<div class="col-md-12">
                    <input type="hidden" name="id" id="id">
					<div class="form-group" id="nama_role">
						<label for="">Nama Role</label>
						<input type="text" class="form-control" name="nama_role">
					</div>					
				</div>
			</div>
	</x-slot>
</x-modal>
@endsection

@push('js')
	@include('admin.role.script')
@endpush