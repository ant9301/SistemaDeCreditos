$(document).ready(function(){
    
var calendar = $('#calendar').fullCalendar('getCalendar');

calendar.on('dayClick', function(date, jsEvent, view) {
  console.log('clicked on ' + date.format());
});
})
