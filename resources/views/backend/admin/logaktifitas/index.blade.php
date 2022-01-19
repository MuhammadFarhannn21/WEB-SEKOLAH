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
            <h4 class="page-title" style="margin-left: 18px;">Log Aktifitas</h4>
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
                <table id="dataTableAPI" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                      <thead>
                          <tr>
                              <th width="10px">No</th>
                              <th>Subject</th>
                              <th>URL</th>
                              <th>Method</th>
                              <th>IP</th>
                              <th>User ID</th>
                              <th>User Name</th>
                          </tr>
                      </thead>     
                      <tbody>
                         
                      </tbody>                   
                </table>
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

      var url_api = '{!! url('admin/logaktifitas/api') !!}';
      
      // Bagian Datatable
      var dataTableLoad = $("#dataTableAPI").DataTable({
              processing: true,
              serverSide: true,
              ajax: url_api,
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'subject', name: 'subject'},
                  {data: 'url', name: 'url'},
                  {data: 'method', name: 'method'},
                  {data: 'ip', name: 'ip'},
                  {data: 'user_id', name: 'user_id'},
                  {data: 'username', name: 'username'},
                 
              ], 
          });

        // Bagian Button Refresh
        $(document).on('click', '#btnRefresh', function(){  
          dataTableLoad.ajax.reload();
        }); 

    });
  </script>
@endsection