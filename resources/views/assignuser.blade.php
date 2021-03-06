<html>

<head><title>Event Management</title>
<link href="https://boxport.in/events/public/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>    
    
    <body>
            <div class="wrapper">
            
                <h2 class="hdtxt">Admin - Assign User to Events <span style="float:right;"><a style="color:#007bff;text-decoration:underline;" href="javascript:logout()" >Log Out</a></span></h2>
                
                <div class="container">
                
                  <p>Select Event  : <select name="selevent" id="selevent">
					  
					   @foreach ($allevents as $eventobj)
					
							<option value="{{ $eventobj->id }}">{{$eventobj->event_name}}</option>
						@endforeach
						
                  
                  </select>
                  
                  <br><br>
                 
                   <p>Select User  : <select name="seluser" id="seluser" >
					  
					   @foreach ($alluser as $userobj)
					
							<option value="{{ $userobj->id }}">{{$userobj->uname}}</option>
						@endforeach
						
                  
                  </select>
                  
                 <br><br> 
                  
                  <input type="button" value="Assign Event" onclick="assignuser()">
                  </p>
                     
                </div>

                <div class="container" id="admincon">
                    
                    
                    
                    
                </div>
            </div>
    </body>
    
    
    <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
    
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="https://boxport.in/events/public/js/main.js" type="text/javascript"></script>
</html>
