<script type="text/javascript">
$(function() {

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});


	var tbl = $('#tbl').DataTable({
          processing: true,
          serverSide: true,
          language: {
            loadingRecords: '&nbsp;',
            processing: '<div class="spinner"></div>'
          },
          ajax: "{{ route('user.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'user'},
              {data: 'role.nama_role', name: 'nama_role'},
              {mData: 'id', render: function(data,type,row){
                return `<div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-list"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class=" btn btn-primary" href="#" id="btnEdit" data-id="${data}"><i class="fa fa-edit"></i> Edit</a>
                    <a class=" btn btn-danger" href="#" id="btnHapus" data-id="${data}"><i class="fa fa-trash"></i> Hapus</a>
                    </div>
                </div>`;
              }
              },
          ]
      });  
	
	$('#btnAdd').on('click', function(){
		$('#modalShow').modal('show');
		$('.modal-title').html('Tambah');
	});

	$('#formAdd').on('submit', function(e){
		e.preventDefault();
		$('#btnSubmit').html('<i class="fa fa-spinner"></i> Loading').attr('disabled','disabled');
		let formData = new FormData();
		$.ajax({
			url: "{{ route('user.index') }}",
			type: "post",
			cache: false,
			processData: false,
			contentType: false,
			success: function(res){
				console.log(res);
			},
			error: function(err){
				let error = err.responseJSON.errors;
				$.each(error, function(key,val){
					$('#'+key).find(':input').append('<small>jang</small>');
				});
			},
		});
	});
})
</script>	