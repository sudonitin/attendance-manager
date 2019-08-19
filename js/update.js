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

    var deleterow = document.createElement("input");
    deleterow.setAttribute("type", "button");
    deleterow.setAttribute("value", "Delete row");
    deleterow.setAttribute("id","delete_row");
    deleterow.setAttribute("class", "btn btn-dark");

    var insert = document.createElement("input");
    insert.setAttribute("type","submit");
    insert.setAttribute("value", "Update");
    insert.setAttribute("name","update");
    insert.setAttribute("id","update");
    insert.setAttribute("class", "btn btn-primary");

    var small = document.createElement("small");
    var smallContent = document.createTextNode(" Leave the boxes empty if not needed and delete the rows if empty");
    small.appendChild(smallContent);

    var space = document.createElement("small");
    var spaceContent = document.createTextNode(" ");
    space.appendChild(spaceContent);

    document.getElementById('container').appendChild(insert);
    document.getElementById('container').appendChild(space);
    document.getElementById('container').appendChild(addrow);
    document.getElementById('container').appendChild(space);
    document.getElementById('container').appendChild(deleterow);
    document.getElementById('container').appendChild(small);

    // get the number of rows already in this page which will be use to add row
    var trs = document.getElementsByTagName("tr");
    i = trs.length;

    $("#add_row").click(function(){
        
        $('#tab_logi1').append('<tr id="addr'+(i)+'"></tr>');

        $('#addr'+(i)).html("<td>"+ (i) +"</td><td contenteditable='true' class='  montime' id='montime-"+i+"' name='montime"+i+"' type='text' placeholder='' class='  form-control  '></td><td contenteditable='true' id='mon-"+i+"' class='  mon' name='mon"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  tuetime' id='tuetime-'"+i+" name='tuetime"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' id='tue-"+i+"' class='  tue' name='tue"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  wedtime' id='wedtime-"+i+"' name='wedtime"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  wed' id='wed-"+i+"' name='wed"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' id='thutime-"+i+"' class='  thutime' name='thutime"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  thu' id='thu-"+i+"'  name='thu"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' class='  fritime' id='fritime-"+i+"' name='fritime"+i+"' type='text' placeholder=''  class='  form-control  '></td><td contenteditable='true' id='fri-"+i+"' class='  fri' name='fri"+i+"' type='text' placeholder=''  class='  form-control  '></td>");
  
        i++;
       });
    
    $("#delete_row").click(function(){
        i = i-1;
        console.log(i);
        if(i>1){
        $("#addr"+(i)).html('');
        }
    });

    // update table
    $('#update').click(function(){
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
         url: 'updateContent.php',
         method: 'POST',
         data:{montime:montime, mon:mon, tuetime:tuetime, tue:tue, wedtime:wedtime, wed:wed, thutime:thutime, thu:thu, fritime:fritime,fri:fri},
         success:function(data){
          console.log(data); 
          alert("time table updated successfully!!");
          window.location.href = '/attendance/pages/'; //after updating load to home screen
         }
       });
 
      });
}