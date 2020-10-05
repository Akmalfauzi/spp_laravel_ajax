@extends('admin.layout.master')
@section('icon_menu')
<i class="fas fa-history"></i>
@endsection
@section('title_menu')
History Pembayaran
@endsection
@section('content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabe">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Murid</th>
                                    <th>Kelas</th>
                                    <th>Petugas</th>
                                    <th>Bulan Bayar</th>
                                    <th>Tahun Bayar</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Tanggal Bayar</th>
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



@push('js')
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
          ajax: "{{ route('history') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'murid.nama_murid', name: 'nama_murid'},
              {data: 'murid.kelas.nama_kelas', name: 'nama_kelas'},
              {data: 'petugas.nama_petugas', name: 'nama_petugas'},
              {data: 'bulan', name: 'jml'},
              {data: 'tahun', name: 'jml'},
              {data: 'jumlah_bayar', name: 'jml'},
              {data: 'tgl_bayar', name: 'tgl'},
          ]
      });

    });
    </script>
@endpush
