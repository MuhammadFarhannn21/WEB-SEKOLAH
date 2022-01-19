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
            <h4 class="page-title" style="margin-left: 18px;">Validasi {{ $jenisFormulir->nama }}</h4>
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
              <form data-target="{{ url('admin/pembayaran-formulir/diterimaSelected') }}" id="terimaForm" onsubmit="return false;">
                <table id="dataTableAPI" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                      <thead>
                          <tr>
                              <th style="width: 5% !important">
                                    <div class="custom-control custom-checkbox">
                                        @csrf
                                        <input type="checkbox" class="custom-control-input" id="checkAll">
                                        <label class="custom-control-label" for="checkAll"></label>
                                    </div>
                              </th>
                              <th width="10px">No</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Telepon</th>
                              <th>Asal Sekolah</th>
                              <th>Status</th>
                              <th>Biaya</th>
                              <th>Bukti Pembayaran</th>
                              <th>Tanggal</th>
                              <th>Keterangan</th>
                          </tr>
                      </thead>     
                      <tbody>
                         
                      </tbody>                   
                </table>

                <div id="btnRemoveAllWrapper" style="display: none">
                  <button id="btnRemoveAll" class="btn btn-primary my-3" type="submit" disabled>Konfirmasi </button>
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

      var url_api = '{!! url('admin/pembayaran-formulir/api') !!}';
      
      // Bagian Datatable
      var dataTableLoad = $("#dataTableAPI").DataTable({
              processing: true,
              serverSide: true,
              ajax: url_api,
              columns: [
                  {data: 'checkBox', orderable: false, searchable: false},
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'nama', name: 'nama'},
                  {data: 'email', name: 'email'},
                  {data: 'telepon', name: 'telepon'},
                  {data: 'asal_sekolah', name: 'asal_sekolah'},
                  {data: 'status', name: 'status'},
                  {data: 'biaya', name: 'biaya'},
                  {data: 'bukti_pembayaran', name: 'bukti_pembayaran'},
                  {data: 'created_at', name: 'created_at'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ], 
          });

        // Bagian Button Refresh
        $(document).on('click', '#btnRefresh', function(){  
          dataTableLoad.ajax.reload();
        }); 

          // Bagian Checklist
        $(document).ready(function () {
            $('#checkAll').change(function() {
                var thisTag =   $(this);

                if (thisTag.prop('checked') == true) {
                    $('[name="checkedItem[]"]').prop('checked', true).change();
                } else {
                    $('[name="checkedItem[]"]').prop('checked', false).change();
                }
            });

            $(document).on('change', ':checkbox', function() {
                if ($(':checkbox:checked').length) {
                    $('#btnRemoveAllWrapper').show();
                    $('#btnRemoveAll').prop("disabled", false);
                } else {
                    $('#btnRemoveAllWrapper').hide();
                    $('#btnRemoveAll').prop("disabled", true);
                }
            });
            
        });
        
     
        // Bagian Delete Checklist
        $('#terimaForm').submit(function() {
          $.ajax({
              url: $(this).data('target'),
              type: "post",
              data: new FormData(this),
              dataType: "json",
              processData: false,
              contentType: false,
              beforeSend : function() {
                    $('#btnRemoveAll').attr('disabled', true);
                },
              success: function(res) {
                  toastAlert('success', 'Successfully Konfirmasi Data');
                  $(':checkbox').prop('checked', false).change();
                  dataTableLoad.ajax.reload();
                  $('#btnRemoveAll').attr('disabled', false);
              },
              error : function(res) {
                    toastAlert('error', 'Server Sedang Error');
                    dataTableLoad.ajax.reload();
                    $('#btnRemoveAll').attr('disabled', false);
                }
          });
        });

        $(document).on('click', '#btnDiterima', function(e) {
            e.preventDefault();
            $.ajax({
                  url: $(this).attr('href'),
                  type: "get",
                  dataType: "json",
                  success: function(res) {
                      toastAlert('success', res.Message);
                      $(':checkbox').prop('checked', false).change();
                      dataTableLoad.ajax.reload();
                  },
                  error : function(res) {
                        toastAlert('error', 'Server Sedang Error');
                    }
              });
         });

        $(document).on('click', '#btnDitolak', function(e) {
            e.preventDefault();
            $.ajax({
                  url: $(this).attr('href'),
                  type: "get",
                  dataType: "json",
                  success: function(res) {
                      toastAlert('success', res.Message);
                      $(':checkbox').prop('checked', false).change();
                      dataTableLoad.ajax.reload();
                  },
                  error : function(res) {
                      toastAlert('error', 'Server Sedang Error');
                  }
              });
         });
  
    });
  </script>
@endsection