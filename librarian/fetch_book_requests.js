 //onload
            $(document).ready(function(){
                
                $.ajax({
                    url:"fetch_book_request.php",
                    type:"post",
                    data:{
                        
                    },
                    success:function(data){
                   
                        var obj=JSON.parse(data);
                        var table_content=""
                        $('#book_display').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.book_id+"</td>";
                            table_content+="<td>"+value.date+"</td>";
                            table_content+="<td>"+value.title+"</td>";
                            table_content+="<td>"+value.usn+"</td>";
                            table_content+="<td>"+value.name+"</td>";
                            table_content+="<td>"+value.email+"</td>";
                            table_content+="<td>"+value.semester+"</td>";
                            table_content+="<td>"+value.branch+"</td>";
                            table_content+="<td>"+value.stock+"</td>";
                           if (value.stock>0) {
                           table_content+="<td><span class=\"btn btn-danger\" style=\"color:#fff\" id=\"b"+value.rid+"\" onclick=\"approve('"+value.rid+"',this.id,'"+value.book_id+"')\" >Approve</span></td>";
                               
                            }else{
                            table_content+="<td><span class=\"btn btn-warning\" style=\"color:#fff\" >Out Of Stock</span></td>";
                           }
                           table_content+="</tr>";
                        });
                        $("#book_display").append(table_content);
                    }
                });
            });






        function approve(rid,thsid,book_id){
               
                var rid=rid;
                var dates=Date.today();
                var approved_date=dates.toISOString().substring(0, 10);
                var book_id=book_id;
                $.ajax({
                    url:"approve_books.php",
                    type:"post",
                    data:{
                        "rid":rid,
                        "approved_date":approved_date,
                        "book_id":book_id
                    },
                    success:function(data){
                       
                        document.getElementById(thsid).innerHTML="Approved <i class=\"fa fa-check \"></i>";
                        getuserdetails(rid);    
                        
                    }
                });
        }

        function getuserdetails(rid){
          
             var rid=rid;
                
                $.ajax({
                    url:"getuserdetails.php",
                    type:"post",
                    data:{
                        "rid":rid,
                        
                    },
                    success:function(data){
                       var obj=JSON.parse(data);
                        
                        $.each(obj,function(index,value){
                           send_sms(value.mobile,value.name,value.book_id) 
                        });
                    }
                });
        }



    function send_sms(mobile,name,book_id){
        var mobile=mobile;
        var name=name;
        var book_id=book_id;
                
                $.ajax({
                    url:"send_sms.php",
                    type:"post",
                    data:{
                        "mobile":mobile,
                        "name":name,
                        "book_id":book_id
                        
                    },
                    success:function(data){
                       alert(data);
                    }
                });
    }