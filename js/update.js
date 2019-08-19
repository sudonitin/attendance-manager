window.onload = function(){
    var td = document.getElementsByTagName("td");
    for(var i=0; i<td.length; i++){
        td[i].setAttribute("contenteditable","true");
    }
    var addrow = document.createElement("input");
    addrow.setAttribute("type", "button");
    addrow.setAttribute("value", "Add row");
    addrow.setAttribute("id","add_row");
    addrow.setAttribute("class", "btn btn-danger");

    var small = document.createElement("small");
    var smallContent = document.createTextNode(" Leave the boxes empty if not needed");
    small.appendChild(smallContent);

    document.getElementById('container').appendChild(addrow);
    document.getElementById('container').appendChild(small);

    // get the number of rows already in this page which will be use to add row
    var trs = document.getElementsByTagName("tr");
    i = trs.length;
    console.log(i);
    $("#add_row").click(function(){
        
        $('#tab_logi1').append('<tr id="addr'+(i+1)+'"></tr>');

        $('#addr'+(i+1)).html("<td>"+ (i) +"</td><td contenteditable='true' class='  montime' id='montime-"+i+"' name='montime"+i+"' type='text' placeholder='' class='  form-control  '></td><td contenteditable='true' id='mon-"+i+"' class='  mon' name='mon"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  tuetime' id='tuetime-'"+i+" name='tuetime"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' id='tue-"+i+"' class='  tue' name='tue"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  wedtime' id='wedtime-"+i+"' name='wedtime"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  wed' id='wed-"+i+"' name='wed"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' id='thutime-"+i+"' class='  thutime' name='thutime"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  thu' id='thu-"+i+"'  name='thu"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  fritime' id='fritime-"+i+"' name='fritime"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' id='fri-"+i+"' class='  fri' name='fri"+i+"' type='text' placeholder=''  class='  form-control  '></td>");
  
        i++;
       });
}