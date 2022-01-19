@extends('backend.layouts.master')

@section('assets-header')
<link href="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title" style="margin-left: 18px;">Agenda</h4>
            
        </div>
    </div>
</div>




<div class="row">
    <div class="col-sm-12">
      <div class="card m-b-20">
          <div class="card-body">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#home2" role="tab">Daftar Agenda</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#profile2" role="tab">Tambah Agenda</a>
                  </li>
              </ul>

              <div class="tab-content">
                  <div class="tab-pane active p-3  table-responsive" id="home2" role="tabpanel">
                      <table id="datatable" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                              <tr>
                                  <th width="10px">No</th>
                                  <th>Judul</th>
                                  <th>Mulai</th>
                                  <th>Sampai</th>
                                  <th>Keterangan</th>
                              </tr>
                          </thead>     
                          <tbody>
                              <?php $no=1 ?>
                              @foreach($data as $agenda)
                              <tr>
                                  <td width="10px">{{ $no++}}</td>
                                  <td>{{ $agenda->title}}</td>
                                  <?php $start=date_create($agenda->start); ?> 
                                  <td>{{ date_format($start,"d F Y")}}</td>
                                  <?php $end=date_create($agenda->end); ?> 
                                  <td>{{ date_format($end,"d F Y")}}</td>
                             
                                  <td>
                                      <a href="{{ url('admin/agenda/update',$agenda->id)}}" class="btn btn-sm btn-success">Edit</a>
                                      <a href="{{ url('admin/agenda/delete',$agenda->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');">Hapus</a>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>                   
                      </table>
                  </div>
                  <div class="tab-pane p-3" id="profile2" role="tabpanel">
                      <form action="{{ url('/admin/agenda/store') }}" method="post">
                      {{ csrf_field() }}  
                          <div class="form-group">  
                            <div class="table-responsive">  
                                 <table class="table" id="dynamic_field">  
                                      <tr>
                                          <th>Judul</th>
                                          <th>Mulai</th>
                                          <th>Sampai</th>
                                          <th>Keterangan</th>
                                      </tr>
                                      <tr>  
                                           <td><input name="title[]" type="text" class="form-control" required /></td> 
                                           <td><input name="start[]" type="date" class="form-control" required /></td> 
                                           <td><input name="end[]" type="date" class="form-control" required /></td> 
                                           <td><button type="button" class="btn btn-sm btn-danger btn_remove">Hapus</button></td>
                                      </tr>  
                                 </table>  
                            </div>  
                          </div> 

                          <div class="m-t-20">
                              <button class="btn btn-primary" type="submit">Simpan</button>
                              <button type="button" class="btn btn-secondary add-file">+</button>
                          </div>
                      </form>
                  </div>

              </div>
          </div>
      </div>
    </div>

    <div class="col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div id='calendar'></div>
                <div style='clear:both'></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('assets-footer')
  <script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{ asset('backend/plugins/moment/moment.js')}}"></script>
  <script src="{{ asset('backend/plugins/fullcalendar/js/fullcalendar.min.js')}}"></script>
  <script>
$(document).ready(function() {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    $('#external-events div.external-event').each(function() {
        var eventObject = {
            title: $.trim($(this).text()) 
        };
        $(this).data('eventObject', eventObject);
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });

    });


    /* initialize the calendar
     -----------------------------------------------------------------*/

    var calendar =  $('#calendar').fullCalendar({
        header: {
            left: 'title',
            center: 'month',
            right: 'prev,next today'
        },
        editable: false,
        firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
        selectable: false,
        defaultView: 'month',

        axisFormat: 'h:mm',
        columnFormat: {
            month: 'ddd',    // Mon
            week: 'ddd d', // Mon 7
            day: 'dddd M/d',  // Monday 9/7
            agendaDay: 'dddd d'
        },
        titleFormat: {
            month: 'MMMM YYYY', // September 2009
            week: "MMMM YYYY", // September 2009
            day: 'MMMM YYYY'                  // Tuesday, Sep 8, 2009
        },
        allDaySlot: false,
        selectHelper: false,
        select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
                calendar.fullCalendar('renderEvent',
                    {
                        title: title,
                        start: start,
                        end: end,
                        allDay: allDay
                    },
                    true // make the event "stick"
                );
            }
            calendar.fullCalendar('unselect');
        },
        droppable: false, // this allows things to be dropped onto the calendar !!!
        drop: function(date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }

        },

        events: [
            @foreach(\App\Agenda::all() as $agenda)
            {
                title: '{{$agenda->title}}',
                start: '{{ $agenda->start}}',
                end: '{{ $agenda->end}}',
                className: 'bg-pink',
                url:'#',
            },
            @endforeach
        ],
    });


});
</script>

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
  <script src="{{ asset('backend/assets/pages/datatables.init.js') }}"></script>
  <script>
     $(document).ready(function(){  
          var i=1;  
          $('.add-file').click(function(){  
               i++;  
               $('#dynamic_field').append('<tr id="row'+i+'"><td><input name="title[]" type="text" class="form-control" required /></td> <td><input name="start[]" type="date" class="form-control" required /></td> <td><input name="end[]" type="date" class="form-control" required /></td> <td><button type="button" class="btn btn-sm btn-danger btn_remove" id="'+i+'">Hapus</button></td></tr>');  
          });  
          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          });  
           
     });  
  </script>
@endsection