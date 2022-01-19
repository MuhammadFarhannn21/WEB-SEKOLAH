@extends('backend.layouts.master')

@section('assets-header')
{{-- sssssss --}}
<link href="{{ asset('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
<script>
    var editor_config = {
      path_absolute : "/",
      selector: '#textarea',
      height: 300,
      theme: 'modern',
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
      image_advtab: true,
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
      ],
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }
      
          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
          });
      }
    };
    tinymce.init(editor_config);
</script>
<link href="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title" style="margin-left: 18px;">Sound Cloud</h4>
            
        </div>
    </div>
</div>


<div class="col-sm-12">
{!! Form::open(['url' => 'admin/sound/create', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
    @include('backend.admin.sound._form')
{!! Form::close() !!}
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

@endsection