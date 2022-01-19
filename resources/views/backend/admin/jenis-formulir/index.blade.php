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
            <h4 class="page-title" style="margin-left: 18px;">Jenis Formulir</h4>
          </div>
          <div class="float-right" style="margin-right: 18px;">  
            <a href="#" onclick="triggerFormModal('{{ url('admin/jenis-formulir/create') }}')" class="btn btn-primary text-white" style="color: #fedd00;font-weight: 500" data-toggle="tooltip" data-placement="bottom" title="Create Data">Tambah</a>
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
              <form data-target="{{ url('admin/jenis-formulir/deleteSelected') }}" id="deleteForm" onsubmit="return false;">
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
                              <th>Tahun Ajaran</th>
                              <th>Biaya Formulir</th>
                              <th>Status</th>
                              <th>Created Date</th>
                              <th>Keterangan</th>
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

      var url_api = '{!! url('admin/jenis-formulir/api') !!}';
      
      // Bagian Datatable
      var dataTableLoad = $("#dataTableAPI").DataTable({
              processing: true,
              serverSide: true,
              ajax: url_api,
              columns: [
                  {data: 'checkBox', orderable: false, searchable: false},
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'nama', name: 'nama'},
                  {data: 'tahun_ajaran', name: 'tahun_ajaran'},
                  {data: 'biaya_formulir', name: 'biaya_formulir'},
                  {data: 'status', name: 'status'},
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
        
        // Bagian Create Data
      $(document).on('submit', '#createForm', function() {
            $.ajax({
                url: $(this).data('target'),
                type: "post",
                data: new FormData(this),
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend : function() {
                      $('#submit').attr('disabled', true);
                },
                success: function(res) {
                  if(res.ErrorCode == 0)
                  {
                    toastAlert('success', res.Message);
                    dataTableLoad.ajax.reload();
                  }
                  else
                  {
                    toastAlert('error', res.Message);
                  }
                  $('.modal').modal('hide');
                },
                error : function(res) {
                    toastAlert('error', 'Server Sedang Error');
                    $('.modal').modal('hide');
                }
            });
        });

        // Bagian Delete Checklist
        $('#deleteForm').submit(function() {
          Swal.fire({
                  title: 'Hapus Data',
                  text: 'Apakah Anda Yakin Untuk Menghapus Data Ini',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya'
              }).then((result) => {
                if (result.value) {
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
                        toastAlert('success', 'Successfully Delete Data');
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
            }
          });
        });

        // Bagian Delete
        $(document).on('click', '#btnDelete', function(e) {
            e.preventDefault();
            Swal.fire({
                  title: 'Hapus Data',
                  text: 'Apakah Anda Yakin Untuk Menghapus Data Ini',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya'
              }).then((result) => {
                if (result.value) {
                $.ajax({
                    url: $(this).attr('href'),
                    type: "get",
                    dataType: "json",
                    success: function(res) {
                        toastAlert('success', 'Successfully Deleted Data');
                        $(':checkbox').prop('checked', false).change();
                        dataTableLoad.ajax.reload();
                    },
                    error : function(res) {
                          toastAlert('error', 'Server Sedang Error');
                      }
                });
            }
          });
         });
    
        // Bagian Update
        $(document).on('submit', '#editForm', function() {
            $.ajax({
                url: $(this).data('target'),
                type: "post",
                data: new FormData(this),
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend : function() {
                      $('#submit').attr('disabled', true);
                },
                success: function(res) {
                  if(res.ErrorCode == 0)
                  {
                    toastAlert('success', res.Message);
                    dataTableLoad.ajax.reload();
                  }
                  else
                  {
                    toastAlert('error', res.Message);
                  }
                  $('.modal').modal('hide');
                },
                error : function(res) {
                    toastAlert('error', 'Server Sedang Error');
                    $('.modal').modal('hide');
                }
            });
        });
    });
  </script>
@endsection