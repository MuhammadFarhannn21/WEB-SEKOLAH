@extends('backend.layouts.master')

@section('assets-header')
<link href="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box" >
          <div class="float-left">
            <h4 class="page-title" style="margin-left: 18px;">Pemberkasan</h4>
          </div>
          <div class="float-right" style="margin-right: 18px;">  
            <a href="#" id="btnRefresh" class="btn btn-success" style="color: white"><span class="ti-reload"></span></a>
          </div>
            
        </div>
    </div>
</div>

<div class="py-2">
  
</div>

<div class="col-sm-12">
    <div class="card m-b-20">
        <div class="card-body">
            
            <div class="card-body table-responsive">
              <form data-target="{{ url('admin/pendaftar/deleteSelected') }}" id="deleteForm" onsubmit="return false;">
                <table id="dataTableAPI" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                      <thead>
                          <tr>
                              <th width="10px">No</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Ukuran Baju</th>
                              <th>Ijazah</th>
                              <th>Foto 2x3</th>
                              <th>Foto 3x4</th>
                              <th>KK</th>
                              <th>Akte Kelahiran</th>
                              
                          </tr>
                      </thead>     
                      <tbody>
                         
                      </tbody>                   
                </table>

                <div id="btnRemoveAllWrapper" style="display: none">
                  <button id="btnRemoveAll" class="btn btn-danger my-3" type="submit" disabled>Hapus </button>
                </div>
              </form>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('assets-footer')
  <script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/jszip.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/pdfmake.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/vfs_fonts.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/buttons.print.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/buttons.colVis.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('backend/assets/pages/datatables2.init.js') }}"></script>
  <script src="{{ asset('js/alert.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function() {

      var url_api = '{!! url('admin/berkas-calon-siswa/api') !!}';
      
      // Bagian Datatable
      var dataTableLoad = $("#dataTableAPI").DataTable({
              processing: true,
              serverSide: true,
              ajax: url_api,
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'nama', name: 'nama'},
                  {data: 'email', name: 'email'},
                  {data: 'ukuran_baju', name: 'ukuran_baju'},
                  {data: 'ijazah', name: 'ijazah'},
                  {data: 'pas_foto_2_3', name: 'pas_foto_2_3'},
                  {data: 'pas_foto_3_4', name: 'pas_foto_3_4'},
                  {data: 'kk', name: 'kk'},
                  {data: 'akte_kelahiran', name: 'akte_kelahiran'},
                  
              ], 
          });

        // Bagian Button Refresh
        $(document).on('click', '#btnRefresh', function(){  
          dataTableLoad.ajax.reload();
        }); 
    });
  </script>
@endsection