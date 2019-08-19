var i=0;

$(document).ready(function(){
     //fetchdata();
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td contenteditable='true' class='  montime' id='montime-'"+i+" name='montime"+i+"' type='text' placeholder='' class='  form-control  '></td><td contenteditable='true' id='mon-'"+i+" class='  mon' name='mon"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  tuetime' id='tuetime-'"+i+" name='tuetime"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' id='tue-'"+i+" class='  tue' name='tue"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  wedtime' id='wedtime-'"+i+" name='wedtime"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  wed' id='wed-'"+i+" name='wed"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' id='thutime-'"+i+" class='  thutime' name='thutime"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  thu' id='thu-'"+i+"  name='thu"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  fritime' id='fritime-'"+i+" name='fritime"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' id='fri-"+i+"' class='  fri' name='fri"+i+"' type='text' placeholder=''  class='  form-control  '></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++;
     });

     $('#insert').click(function(){
       var montime = [];
       var mon = [];
       var tuetime = [];
       var tue = [];
       var wedtime = [];
       var wed = [];
       var thutime = [];
       var thu = [];
       var fritime = [];
       var fri = [];

       $('.montime').each(function(){
         montime.push($(this).text());
       });
       $('.mon').each(function(){
        mon.push($(this).text());
      });
       $('.tuetime').each(function(){
        tuetime.push($(this).text());
      });
      $('.tue').each(function(){
        tue.push($(this).text());
      });
      $('.wedtime').each(function(){
        wedtime.push($(this).text());
      });
      $('.wed').each(function(){
        wed.push($(this).text());
      });
      $('.thutime').each(function(){
        thutime.push($(this).text());
      });
      $('.thu').each(function(){
        thu.push($(this).text());
      });
      $('.fritime').each(function(){
        fritime.push($(this).text());
      });
      $('.fri').each(function(){
        //console.log($(this).text());
        fri.push($(this).text());
        //console.log($(this).text());
      });

      $.ajax({
        url: 'content.php',
        method: 'POST',
        data:{montime:montime, mon:mon, tuetime:tuetime, tue:tue, wedtime:wedtime, wed:wed, thutime:thutime, thu:thu, fritime:fritime,fri:fri},
        success:function(data){
         console.log(data); 
         fetchdata();
         //location.reload();
        }
      });

     });

    function fetchdata(){
       $.ajax({
         url: "fetch.php",
         method: "POST",
         success: function(data)
         {
           $('#container').html(data); 
           console.log('hello');
           window.location.reload(); // reloaded the page
         }
       });     
      }

});
