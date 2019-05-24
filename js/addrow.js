var i=1;

$(document).ready(function(){
     
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input id='montime-'"+i+" name='montime"+i+"' type='text' placeholder='' class='form-control input-md'  /></td><td><input id='mon-'"+i+"  name='mon"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input id='tuetime-'"+i+" name='tuetime"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input id='tue-'"+i+" name='tue"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input id='wedtime-'"+i+" name='wedtime"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input id='wed-'"+i+" name='wed"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input id='thutime-'"+i+" name='thutime"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input id='thu-'"+i+"  name='thu"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input id='fritime-'"+i+" name='fritime"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input id='fri-"+i+"' name='fri-"+i+"' type='text' placeholder=''  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++;
      
      $("#varval").val(i);
  });

});

function post(){
  i -= 1;
  var montime,mon,tuetime,tue,wedtime,wed,thutime,thu,fritime,fri;
  //start loop here
  montime = $("#montime-"+i).val();
  mon = $("#mon-"+i).val();
  tuetime = $("#tuetime-"+i).val();
  tue = $("#tue-"+i).val();
  wedtime = $("#wedtime-"+i).val();
  wed = $("#wed-"+i).val();
  thutime = $("#thutime-"+i).val();
  thu = $("#thu-"+i).val();
  fritime = $("#fritime-"+i).val();
  fri = $("#fri-"+i).val();
  console.log(fri);
  $.post('content.php', {postmontime: montime, postmon: mon, posttuetime: tuetime, posttue: tue, postwedtime: wedtime, postwed: wed, postthutime: thutime, postthu: thu, postfritime: fritime, postfri: fri},
  function(data){
    console.log("working" + data);
  }
  );
  i += 1;
}