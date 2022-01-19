@extends('frontend.layouts.master')


@section('konten')
<section class="breadcrumbs overlay" style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }})">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Agenda</h2>
				<ul class="bread-list">
					<li><a href="{{ url('/')}}">Home<i class="fa fa-angle-right"></i></a></li>
					<li class="active"><a href="{{ url('/agenda')}}">Agenda</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="blog b-archives section">
	<div class="container">
		<div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div id='calendar'></div>
                        <div style='clear:both'></div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
@endsection

@section('assets-bottom')
<script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('backend/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('backend/plugins/fullcalendar/js/fullcalendar.min.js') }}"></script>
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
@endsection