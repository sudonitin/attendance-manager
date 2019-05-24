var i=0;

$(document).ready(function(){
     
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input class='input-md montime' id='montime-'"+i+" name='montime"+i+"' type='text' placeholder='' class='input-md form-control input-md'  /></td><td><input id='mon-'"+i+" class='input-md mon' name='mon"+i+"' type='text' placeholder=''  class='input-md form-control input-md'></td><td><input class='input-md tuetime' id='tuetime-'"+i+" name='tuetime"+i+"' type='text' placeholder=''  class='input-md form-control input-md'></td><td><input id='tue-'"+i+" class='input-md tue' name='tue"+i+"' type='text' placeholder=''  class='input-md form-control input-md'></td><td><input class='input-md wedtime' id='wedtime-'"+i+" name='wedtime"+i+"' type='text' placeholder=''  class='input-md form-control input-md'></td><td><input class='input-md wed' id='wed-'"+i+" name='wed"+i+"' type='text' placeholder=''  class='input-md form-control input-md'></td><td><input id='thutime-'"+i+" class='input-md thutime' name='thutime"+i+"' type='text' placeholder=''  class='input-md form-control input-md'></td><td><input class='input-md thu' id='thu-'"+i+"  name='thu"+i+"' type='text' placeholder=''  class='input-md form-control input-md'></td><td><input class='input-md fritime' id='fritime-'"+i+" name='fritime"+i+"' type='text' placeholder=''  class='input-md form-control input-md'></td><td><input id='fri-"+i+"' class='input-md fri' name='fri"+i+"' type='text' placeholder=''  class='input-md form-control input-md'></td>");

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
        fri.push($(this).text());
      });

      $.ajax({
        url: 'content.php',
        method: 'POST',
        data:{montime:montime, mon:mon, tuetime:tuetime, tue:tue, wedtime:wedtime, wed:wed, thutime:thutime, thu:thu, fritime:fritime,fri:fri},
        success:function(data){
         console.log(data); 
        }
      });

     });
});

// function post(){
//   i -= 1;
//   var montime,mon,tuetime,tue,wedtime,wed,thutime,thu,fritime,fri;
//   //start loop here
//   // for(var j=0; j<=i; j++){
//   //   montime = $("#montime-"+i).val();
//   //   mon = $("#mon-"+i).val();
//   //   tuetime = $("#tuetime-"+i).val();
//   //   tue = $("#tue-"+i).val();
//   //   wedtime = $("#wedtime-"+i).val();
//   //   wed = $("#wed-"+i).val();
//   //   thutime = $("#thutime-"+i).val();
//   //   thu = $("#thu-"+i).val();
//   //   fritime = $("#fritime-"+i).val();
//   //   fri = $("#fri-"+i).val();
//   //   //console.log(fri);
//   //   $.post('content.php', {postmontime: montime, postmon: mon, posttuetime: tuetime, posttue: tue, postwedtime: wedtime, postwed: wed, postthutime: thutime, postthu: thu, postfritime: fritime, postfri: fri},
//   //   function(data){
//   //     console.log("working" + data);
//   //   }
//   //   );
      
//   // }

//   montime = $("#montime-"+i).val();
//   mon = $("#mon-"+i).val();
//   tuetime = $("#tuetime-"+i).val();
//   tue = $("#tue-"+i).val();
//   wedtime = $("#wedtime-"+i).val();
//   wed = $("#wed-"+i).val();
//   thutime = $("#thutime-"+i).val();
//   thu = $("#thu-"+i).val();
//   fritime = $("#fritime-"+i).val();
//   fri = $("#fri-"+i).val();
//   var tt = {};
//   tt.montime = montime;
//   tt.mon = mon;
//   tt.tuetime = tuetime;
//   tt.tue = tue;
//   tt.wedtime = wedtime;
//   tt.wedtime = wed;
//   tt.thutime = thutime;
//   tt.thu = thu;
//   tt.fritime = fritime;
//   tt.fri = fri; 
//   $.ajax({
//     url: "content.php",
//     method: "post",
//     data: tt,
//     success: function(data){
//       console.log(data);
//     }
//   })
//   i += 1;
// }
