function show(cur_div)
{
    if(cur_div == 'adduser')
    {
        $('#admincon').html("<p>Add User</p><p><input type='text' id='uname'><br><br><input type='button' value='add user' placeholder='Enter Username' onClick='adduser()'></p>");
    }else if(cur_div == 'addevents')
    {
        $('#admincon').html("<p>Add Events</p><p><input type='text' id='event'><br><br><input type='button' value='add events' placeholder='Enter Event Name' onClick='addevent()'></p>");
    }else
    {
        document.location.href = "https://boxport.in/events/public/assignuser";
    }
}

function adduser()
{
    var uname = $('#uname').val();
    $.ajax({
        url : 'https://boxport.in/events/public/ajax/adduser',
        data : {'uname' : uname },
        method :'POST',
        async : false,
         headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
        success : function (data)
        {
            alert(data);
        }
        
        
        
    });
}

function addevent()
{
    var event = $('#event').val();
    $.ajax({
        url : 'https://boxport.in/events/public/ajax/addevent',
        data : {'event' : event },
        method :'POST',
        async : false,
         headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
        success : function (data)
        {
            alert(data);
        }
        
        
        
    });
}

function retrive_data()
{
    var event = $('#event').val();
    $.ajax({
        url : 'https://boxport.in/events/public/ajax/retrivedata',
        data : {'event' : event },
        method :'POST',
        async : false,
         headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
        success : function (data)
        {
            alert(data);
        }
        
        
        
    });
}

function assignuser()
{
	var event = $('#selevent').val();
	var uname = $('#seluser').val();
    $.ajax({
        url : 'https://boxport.in/events/public/ajax/assignuser',
        data : {'eventid' : event, 'uid' : uname},
        method :'POST',
        async : false,
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
        success : function (data)
        {
            alert(data);
        }
        
        
        
    });
}

function logout()
{
	 document.location.href = "https://boxport.in/events/public/logout";
}
