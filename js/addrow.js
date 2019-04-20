$(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='time"+i+"' type='text' placeholder='' class='form-control input-md'  /></td><td><input  name='mon"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='time"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='tue"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='time"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='wed"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='time"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='thu"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='time"+i+"' type='text' placeholder=''  class='form-control input-md'></td><td><input  name='fri"+i+"' type='text' placeholder=''  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++;
  });
});