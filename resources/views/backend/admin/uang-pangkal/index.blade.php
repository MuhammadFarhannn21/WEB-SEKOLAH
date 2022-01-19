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
            <h4 class="page-title" style="margin-left: 18px;">Validasi Pembayaran Uang Pangkal</h4>
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
          <div class="form-group">
            <label class="text-muted">Biaya Uang Pangkal</label>
            <input type="text" class="form-control" value="{{ number_format($jenisFormulir->biaya_uang_pangkal) }}" disabled />
          </div>
          <div class="form-group">
            <label class="text-muted">Nomor Rekening</label>
            <input type="text" class="form-control" value="{{ $jenisFormulir->no_rekening }}" disabled />
          </div>
          <div class="form-group">
            <label class="text-muted">Bank</label>
            <input type="text" class="form-control" value="{{ $jenisFormulir->nama_bank_rekening }}" disabled />
          </div>

           <!-- Nav tabs -->
            <ul class="nav nav-pills nav-justified" role="tablist">
              <li class="nav-item waves-effect waves-light">
                  <a class="nav-link  active show" data-toggle="tab" href="#step-1" role="tab" aria-selected="false">Cicilan 1</a>
              </li>
              <li class="nav-item waves-effect waves-light">
                  <a class="nav-link" data-toggle="tab" href="#step-2" role="tab" aria-selected="true">Cicilan 2</a>
              </li>
              <li class="nav-item waves-effect waves-light">
                  <a class="nav-link" data-toggle="tab" href="#step-4" role="tab" aria-selected="false">Cicilan 3</a>
              </li>
                
            </ul>
            <div class="tab-content">
                <div class="tab-pane p-3 active show" id="step-1" role="tabpanel">
                  <div class="card-body table-responsive">
                      <table id="dataTableAPICicilan1" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Sisa</th>
                                    <th>Cicilan</th>
                                    <th>Bukti</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>     
                            <tbody>
                               
                            </tbody>                   
                      </table>
                  </div>
                </div>
                <div class="tab-pane p-3" id="step-2" role="tabpanel">
                  <div class="card-body table-responsive">
                      <table id="dataTableAPICicilan2" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Sisa</th>
                                    <th>Cicilan</th>
                                    <th>Bukti</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>     
                            <tbody>
                               
                            </tbody>                   
                      </table>
                  </div>
                </div>
                <div class="tab-pane p-3" id="step-4" role="tabpanel">
                  <div class="card-body table-responsive">
                      <table id="dataTableAPICicilan3" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Sisa</th>
                                    <th>Cicilan</th>
                                    <th>Bukti</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
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
      // Bagian Datatable
      var dataTableLoad1 = $("#dataTableAPICicilan1").DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! url('admin/pembayaran-uang-pangkal/apiCicilan1') !!}',
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'nama', name: 'nama'},
                  {data: 'email', name: 'email'},
                  {data: 'sisa', name: 'sisa'},
                  {data: 'cicilan', name: 'cicilan'},
                  {data: 'bukti_pembayaran', name: 'bukti_pembayaran'},
                  {data: 'status', name: 'status'},
                  {data: 'tanggal', name: 'tanggal'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ], 
          });

      var dataTableLoad2 = $("#dataTableAPICicilan2").DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! url('admin/pembayaran-uang-pangkal/apiCicilan2') !!}',
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'nama', name: 'nama'},
                  {data: 'email', name: 'email'},
                  {data: 'sisa', name: 'sisa'},
                  {data: 'cicilan', name: 'cicilan'},
                  {data: 'bukti_pembayaran', name: 'bukti_pembayaran'},
                  {data: 'status', name: 'status'},
                  {data: 'tanggal', name: 'tanggal'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ], 
          });


      var dataTableLoad3 = $("#dataTableAPICicilan3").DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! url('admin/pembayaran-uang-pangkal/apiCicilan3') !!}',
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'nama', name: 'nama'},
                  {data: 'email', name: 'email'},
                  {data: 'sisa', name: 'sisa'},
                  {data: 'cicilan', name: 'cicilan'},
                  {data: 'bukti_pembayaran', name: 'bukti_pembayaran'},
                  {data: 'status', name: 'status'},
                  {data: 'tanggal', name: 'tanggal'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ], 
          });

        // Bagian Button Refresh
        $(document).on('click', '#btnRefresh', function(){  
          dataTableLoad1.ajax.reload();
          dataTableLoad2.ajax.reload();
          dataTableLoad3.ajax.reload();
        }); 


        $(document).on('click', '#btnDiterimaCicilan1', function(e) {
            e.preventDefault();
            $.ajax({
                  url: $(this).attr('href'),
                  type: "get",
                  dataType: "json",
                  success: function(res) {
                      toastAlert('success', res.Message);
                     dataTableLoad1.ajax.reload();
                      dataTableLoad2.ajax.reload();
                      dataTableLoad3.ajax.reload();
                  },
                  error : function(res) {
                        toastAlert('error', 'Server Sedang Error');
                    }
              });
         });

        $(document).on('click', '#btnDitolakCicilan1', function(e) {
            e.preventDefault();
            $.ajax({
                  url: $(this).attr('href'),
                  type: "get",
                  dataType: "json",
                  success: function(res) {
                      toastAlert('success', res.Message);
                      dataTableLoad1.ajax.reload();
                      dataTableLoad2.ajax.reload();
                      dataTableLoad3.ajax.reload();
                  },
                  error : function(res) {
                      toastAlert('error', 'Server Sedang Error');
                  }
              });
         });

        $(document).on('click', '#btnDiterimaCicilan2', function(e) {
            e.preventDefault();
            $.ajax({
                  url: $(this).attr('href'),
                  type: "get",
                  dataType: "json",
                  success: function(res) {
                      toastAlert('success', res.Message);
                      dataTableLoad1.ajax.reload();
                      dataTableLoad2.ajax.reload();
                      dataTableLoad3.ajax.reload();
                  },
                  error : function(res) {
                        toastAlert('error', 'Server Sedang Error');
                    }
              });
         });

        $(document).on('click', '#btnDitolakCicilan2', function(e) {
            e.preventDefault();
            $.ajax({
                  url: $(this).attr('href'),
                  type: "get",
                  dataType: "json",
                  success: function(res) {
                      toastAlert('success', res.Message);
                      dataTableLoad1.ajax.reload();
                      dataTableLoad2.ajax.reload();
                      dataTableLoad3.ajax.reload();
                  },
                  error : function(res) {
                      toastAlert('error', 'Server Sedang Error');
                  }
              });
         });

        $(document).on('click', '#btnDiterimaCicilan3', function(e) {
            e.preventDefault();
            $.ajax({
                  url: $(this).attr('href'),
                  type: "get",
                  dataType: "json",
                  success: function(res) {
                      toastAlert('success', res.Message);
                      dataTableLoad1.ajax.reload();
                      dataTableLoad2.ajax.reload();
                      dataTableLoad3.ajax.reload();
                  },
                  error : function(res) {
                        toastAlert('error', 'Server Sedang Error');
                    }
              });
         });

        $(document).on('click', '#btnDitolakCicilan3', function(e) {
            e.preventDefault();
            $.ajax({
                  url: $(this).attr('href'),
                  type: "get",
                  dataType: "json",
                  success: function(res) {
                      toastAlert('success', res.Message);
                      dataTableLoad1.ajax.reload();
                      dataTableLoad2.ajax.reload();
                      dataTableLoad3.ajax.reload();
                  },
                  error : function(res) {
                      toastAlert('error', 'Server Sedang Error');
                  }
              });
         });
  
    });
  </script>
@endsection