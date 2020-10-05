<script>
    $(function(){
    
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var tbl = $('#tabe').DataTable({
              processing: true,
              serverSide: true,
              language: {
                loadingRecords: '&nbsp;',
                processing: '<div class="spinner"></div>'
              },
              ajax: "{{ route('pembayaran.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'murid.nama_murid', name: 'nama_murid'},
                  {data: 'murid.kelas.nama_kelas', name: 'nama_kelas'},
                  {data: 'petugas.nama_petugas', name: 'nama_petugas'},
                  {data: 'jumlah_bayar', name: 'jml'},
                  {data: 'tgl_bayar', name: 'tgl'},
                  {mData: 'id', render: function(data,type,row){
                    return `
                        <a class=" btn btn-danger" href="#" id="btnHapus" data-id="${data}"><i class="fa fa-trash"></i> Hapus</a>`;
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
            let url = "{{ route('pembayaran.store') }}";
            save(url,formData);
            addValidation();
        });
    
        $('.table').on('click', '#btnEdit', function() {
            let id = $(this).data('id');   
            $('#modalEdit').modal('show');
            $('.modal-title').html('Edit');
            removeValidation();
    
            $.ajax({
                url: "{{ route('pembayaran.index') }}"+ '/' + id + '/edit',
                type: "get",
                success: (res) => {
                    console.log(res);
                    $('#idEdit').val(res.id);
                    $.each(res, function(key,val){
                        $('#e'+key).find(':input').val(val);
                        $('#eemail').find(':input').val(res.user.email);
                    });
                },
                error: (res) => {
                    gagal();    
                }
            });

            
    
        });

        $('#formEdit').on('submit', function(e){
            e.preventDefault();
            let id = $('#idEdit').val();
            let url = "{{ url('admin/pembayaran/updatePembayaran') }}"+'/'+id;
            let formData = new FormData(this);
            updateData(url,formData,id);   
        });

        
    
        $('.table').on('click', '#btnHapus',function(){
            let id = $(this).data('id');        
    
            $.ajax({
                url: "{{ route('pembayaran.index') }}"+ '/' +id,
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

        $('#spp_id').on('change', function(){
            let id = $(this).find(':input').val();
            $.ajax({
                url: "{{ url('admin/changeJumlahBayar') }}"+'/'+id,
                type: "get",
                success: (res) => {
                    $('#jumlah_bayar').find(':input').val(res.nominal);
                },
                error: (err) => {
                    console.log(err);
                },
            })
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

        function updateData(url,data,id){
            console.log(data);
          $.ajax({
            url: url,
            data: data,
            type: "post",
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
              $('#modalEdit').modal('hide');
              tbl.ajax.reload();
              success();
            },
            error: function(err){
              let error = err.responseJSON.errors;
              if (err.status == 422) {
                $.each(error, function(key,val){
                  $('#e'+key).append(`<small class="text-danger text-error">${val}</small>`);
                  $('#e'+key).find(':input').addClass('is-invalid').addClass('validation');
                });
              }else{
                console.log('server error');
              }
            },
            });
        }
        
    
    
    });
    </script>