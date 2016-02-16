<script>
$(function() { // document ready
  
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    
    defaultDate: new Date().toJSON().slice(0,10),//'2015-01-31',
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    events: [
      {
        title: 'All Day Event',
        start: '2016-02-01'
      },
      {
        title: 'Long Event',
        start: '2016-02-07',
        end: '2016-02-10'
      },
      {
        id: 999,
        title: 'Repeating Event',
        start: '2016-02-09T16:00:00' 
      },
	  {
		title: "Weekly Meeting",
		start: '13:00',
		end: '07:00',
		dow: [1, 3]
	  },
	  //{
	  // 	id:1000, start: "10:00", end: "12:00", dow:[1,4],
	 //	ranges[{start: "2016/02/01", end: "2016/04/01"}]
		
	 // },
      {
        id: 999,
        title: 'Repeating Event',
        start: '2014-11-16T16:00:00'
      },
      {
        title: 'Conference',
        start: '2014-11-11',
        end: '2014-11-13'
      },
      {
        title: 'Meeting',
        start: '2014-11-12T10:30:00',
        end: '2014-11-12T12:30:00'
      },
      {
        title: 'Lunch',
        start: '2014-11-12T12:00:00'
      },
      {
        title: 'Meeting',
        start: '2014-11-12T14:30:00'
      },
      {
        title: 'Happy Hour',
        start: '2014-11-12T17:30:00'
      },
      {
        title: 'Dinner',
        start: '2014-11-12T20:00:00'
      },
      {
        title: 'Birthday Party',
        start: '2014-11-13T07:00:00'
      },
      {
        title: 'Click for Google',
        url: 'http://google.com/',
        start: '2014-11-28'
      }
    ]
  });
  
});
</script>