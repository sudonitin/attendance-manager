$(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='montime"+i+"' type='text' placeholder='' class='form-control input-md'  /></td><td><input  name='mon"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='tuetime"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='tue"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='wedtime"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='wed"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='thutime"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='thu"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='fritime"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='fri"+i+"' type='text' placeholder=''  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++;
  });
});