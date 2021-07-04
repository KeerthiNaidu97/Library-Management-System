 //onload
            $(document).ready(function(){
                fetch_ready_user();
             });
             function fetch_ready_user(){
                $.ajax({
                    url:"fetch_users.php",
                    type:"post",
                    data:{
                        
                    },
                    success:function(data){
                    
                        var obj=JSON.parse(data);
                        var c=1;
                        var table_content=""
                        $('#user_display').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+c++ +"</td>";
                            table_content+="<td>"+value.name+"</td>";
                            table_content+="<td>"+value.email+"</td>";
                            table_content+="<td>"+value.usn+"</td>";
                            table_content+="<td>"+value.branch+"</td>";
                            table_content+="<td>"+value.semester+"</td>";
                           
                           table_content+="<td><span class=\"btn btn-info\" style=\"color:#fff\" id=\"b"+value.sid+"\" onclick=\"edit_user('"+value.sid+"',this.id)\">Edit</span></td>";
                            table_content+="<td><span class=\"btn btn-danger\" style=\"color:#fff\" id=\"b"+value.sid+"\" onclick=\"delete_user('"+value.sid+"',this.id)\">Delete</span></td>";
                          
                           table_content+="</tr>";
                        });
                        $("#user_display").append(table_content);
                    }
                });
            } 


$("#search_btn").on("click",function(){

            var detail=$("#search_user").val();

            if(detail){
                 
                $.ajax({
                    url:"search_user.php",
                    type:"post",
                    data:{
                        "detail":detail
                    },
                    success:function(data){
                    
                        var obj=JSON.parse(data);
                        var c=1;
                        var table_content=""
                        $('#user_display').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+c++ +"</td>";
                            table_content+="<td>"+value.name+"</td>";
                            table_content+="<td>"+value.email+"</td>";
                            table_content+="<td>"+value.usn+"</td>";
                            table_content+="<td>"+value.branch+"</td>";
                            table_content+="<td>"+value.semester+"</td>";
                           
                           table_content+="<td><span class=\"btn btn-info\" style=\"color:#fff\" id=\"b"+value.sid+"\" onclick=\"edit_user('"+value.sid+"',this.id)\">Edit</span></td>";
                            table_content+="<td><span class=\"btn btn-danger\" style=\"color:#fff\" id=\"b"+value.sid+"\" onclick=\"delete_user('"+value.sid+"',this.id)\">Delete</span></td>";
                           table_content+="</tr>";
                        });
                        $("#user_display").append(table_content);
                    }
                });
            }
            else{
                alert("Enter search keyword");
                location.reload();
            }
         });



        function add_user(){

                var name = document.getElementById('name').value;
                var email = document.getElementById('email').value;
                var usn = document.getElementById('usn').value;
                var branch = document.getElementById('branch').value;
                var semester = document.getElementById('semester').value;

                $.ajax({
                    url:"add_user.php",
                    type:"post",
                    data:{
                        "name":name,
                        "email":email,
                        "usn":usn,
                        "branch":branch,
                        "semester":semester

                    },
                    success:function(data){
                       
                       alert(data); 
                      // document.getElementById("user_display").reload(true);   
                        
                    }
                });
        }

         function edit_user(sid,tsid){
                var sid=sid;
               

                $.ajax({
                    url:"edit_user.php",
                    type:"post",
                    data:{
                        "sid":sid
                        

                    },
                    success:function(data){
                    
                        var obj=JSON.parse(data);
                       
                       
                        $.each(obj,function(index,value){
                            document.getElementById('name').value= value.name;
                            document.getElementById('email').value = value.email;
                            document.getElementById('usn').value = value.usn;
                            document.getElementById('branch').value = value.branch;
                            document.getElementById('semester').value = value.semester;
                            document.getElementById('sid').value = value.sid;
                            fetch_ready_user();
                        });
                    }
                });
        }

        function update_user(){
                 var sid=document.getElementById('sid').value;
                var name = document.getElementById('name').value;
                var email = document.getElementById('email').value;
                var usn = document.getElementById('usn').value;
                var branch = document.getElementById('branch').value;
                var semester = document.getElementById('semester').value;
             
                $.ajax({
                    url:"update_user.php",
                    type:"post",
                    data:{
                        "name":name,
                        "email":email,
                        "usn":usn,
                        "branch":branch,
                        "semester":semester,
                        "sid":sid

                    },
                    success:function(data){
                       
                       alert(data); 
                       fetch_ready_user();
                      // document.getElementById("user_display").reload(true);   
                        
                    }
                });
        }

         function delete_user(sid,tsid){
                 var sid=sid;
               
             
                $.ajax({
                    url:"delete_user.php",
                    type:"post",
                    data:{
                       
                        "sid":sid

                    },
                    success:function(data){
                       
                       alert(data); 
                       fetch_ready_user();
                      // document.getElementById("user_display").reload(true);   
                        
                    }
                });
        }