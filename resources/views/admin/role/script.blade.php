<script>
    $(function(){
    
    
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
              ajax: "{{ route('role.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'nama_role', name: 'nama_role'},
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
            $('#formAdd').trigger('reset');
            removeValidation();
        });
    
        $('#formAdd').on('submit', function(e){
            e.preventDefault();
            let formData = new FormData(this);
            let url = "{{ route('role.store') }}";
            save(url,formData);
            addValidation();
        });
    
        $('.table').on('click', '#btnEdit', function() {
            let id = $(this).data('id');   
            $('#modalShow').modal('show');
            $('.modal-title').html('Edit');
            $('#formAdd').trigger('reset');
            removeValidation();
    
            $.ajax({
                url: "{{ route('role.index') }}"+ '/' + id + '/edit',
                type: "get",
                success: (res) => {
                    console.log(res);
                    $('#id').val(res.id);
                    $.each(res, function(key,val){
                        $('#'+key).find(':input').val(val);
                    });
                },
                error: (res) => {
                    gagal();    
                }
            });
    
        });
    
        $('.table').on('click', '#btnHapus',function(){
            let id = $(this).data('id');        
    
            $.ajax({
                url: "{{ route('role.index') }}"+ '/' +id,
                type: "delete",
                success: (res) => {
                    hapus();
                    tbl.ajax.reload();
                },
                error: (res) => {
                    error();
                }
            });
    
        });
    
        function save(url,data){
          $.ajax({
            url: url,
            data: data,
            type: "post",
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
              $('#modalShow').modal('hide');
              tbl.ajax.reload();
              success();
            },
            error: function(err){
              let error = err.responseJSON.errors;
              if (err.status == 422) {
                $.each(error, function(key,val){
                  $('#'+key).append(`<small class="text-danger text-error">${val}</small>`);
                  $('#'+key).find(':input').addClass('is-invalid').addClass('validation');
                });
              }else{
                console.log('server error');
              }
            },
            });
        }
        
    
    
    });
    </script>