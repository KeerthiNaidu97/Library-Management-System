$(document).ready(function(){
		fetch_username();
	 });
	 function fetch_username(){
	var sid = localStorage['sid'];
	
	
	$.ajax({
                    url:"fetch_username.php",
                    type:"post",
                    data:{
                       "sid" :sid
                    },
                    success:function(data){
                     
                        var obj=JSON.parse(data);
                        
                        $.each(obj,function(index,value){
                           
								document.getElementById("user_name_disp").innerHTML = value.name;
                            
                        });
                        
                    }
                });
	}