@extends('admin.layout.master')
@section('icon_menu')
<i class="fas fa-user"></i>
@endsection
@section('title_menu')
User
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
									<th>Nama </th>
									<th>Role </th>
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
			<div class="row">
				<div class="col-md-6">
					<div class="form-group" id="name">
						<label for="">Nama</label>
						<input type="text" class="form-control" name="user">
					</div>					
				</div>
				<div class="col-md-6">
					<div class="form-group" id="email">
						<label for="">Email</label>
						<input type="email" class="form-control" name="email">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group" id="password">
						<label for="">Password</label>
						<input type="password" class="form-control" name="password">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group" id="role_id">
						<label for="">Role</label>
						<select name="role_id" id="" class="form-control">
							@forelse ($role as $item)
								<option value="{{ $item->id }}">{{ $item->nama_role }}</option>
							@empty
								Kosong
							@endforelse
						</select>
					</div>
				</div>
			</div>
	</x-slot>
</x-modal>
@endsection

@push('js')
	@include('admin.user.script')
@endpush