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
            <h4 class="page-title" style="margin-left: 18px;">Laporan Pembayaran Formulir</h4>
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
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Asal Sekolah</th>
                              <th>Tanggal Bayar</th>
                              <th>Status</th>
                              <th>Uang Masuk</th>
                          </tr>
                      </thead>     
                      <tbody>
                        @php
                        $totalPemasukan = 0;
                        $no=1;
                        @endphp
                        @foreach($data as $row)
                        @php
                        $totalPemasukan += $row->jenisFormulir->biaya_formulir;
                        @endphp
                         <tr>
                              <td>{{$no++}}</td>
                              <td>{{$row->user == null ? "-" : $row->user->name}}</td>
                              <td>{{$row->user == null ? "-" :$row->user->email}}</td>
                              <td>{{$row->user == null ? "-" :$row->user->asal_sekolah}}</td>
                              <td>{{$row->created_at->format('d/m/Y')}}</td>
                              <td>{{$row->status}}</td>
                              <td>{{number_format($row->jenisFormulir->biaya_formulir)}}</td>
                          </tr>
                         @endforeach
                      </tbody> 
                      <tfoot>
                        <tr>
                            <th width="10px" colspan="6">Total</th>
                            <th>{{ number_format($totalPemasukan) }}</th>
                        </tr>
                      </tfoot>                  
                </table>
            </div>
            
        </div>
        <div class="card-footer">
          <a href="{{ url('admin/pembayaran-formulir/laporan/excel') }}" class="btn btn-success">Export Excel</a>
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
      $("#dataTableAPI").DataTable({});
    });
  </script>
@endsection