 //onload
            $(document).ready(function(){
                
                $.ajax({
                    url:"fetch_book_returns.php",
                    type:"post",
                    data:{
                        
                    },
                    success:function(data){
                
                        var obj=JSON.parse(data);
                        var table_content=""
                        $('#book_display').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.usn+"</td>";
                            table_content+="<td>"+value.book_id+"</td>";
                            table_content+="<td>"+value.title+"</td>";
                            table_content+="<td>"+value.approved_date+"</td>";
                            //submission Date
                            var renew = new Date(value.approved_date);
                            var newdate = new Date(renew);

                            newdate.setDate(newdate.getDate() + 15);
                            var dd = newdate.getDate();

                            table_content+="<td>"+newdate.toISOString().substring(0, 10)+"</td>";
                            //submission Date end

                            
                            
                            table_content+="<td>"+value.name+"</td>";
                            table_content+="<td>"+value.email+"</td>";
                            table_content+="<td>"+value.semester+"</td>";
                            table_content+="<td>"+value.branch+"</td>";
                            var penalty= getPenalty(newdate,value.approved_date);
                            table_content+="<td>"+penalty+" Rs</td>";
                            table_content+="<td>"+value.stock+"</td>";
                          
                           table_content+="<td><span class=\"btn btn-danger\" style=\"color:#fff\" id=\"b"+value.rid+"\" onclick=\"return_book('"+value.rid+"',this.id,'"+value.book_id+"')\">Return</span></td>";
                           
                           table_content+="</tr>";
                        });
                        $("#book_display").append(table_content);
                    }
                });
            });



            function getPenalty(submission_dated,approved_date){
                var start = approved_date;
                var end = Date.today();
                end = end.toISOString().substring(0, 10)
                start=Date.parse(start);
                end=Date.parse(end);

                // end - start returns difference in milliseconds 
                var diff = new Date(end - start);
                 
                // get days
                var days = diff/1000/60/60/24;
                
                if (days>15) {
                    var penalty=days-15;
                }else{
                    var penalty=0;
                }
                return penalty;
            }


        function return_book(rid,thsid,book_id){
               
                var rid=rid;
                var dates=Date.today();
                var approved_date=dates.toISOString().substring(0, 10);
                var book_id=book_id;
                $.ajax({
                    url:"return_confirm.php",
                    type:"post",
                    data:{
                        "rid":rid,
                        "approved_date":approved_date,
                        "book_id":book_id
                    },
                    success:function(data){
                       
                        document.getElementById(thsid).innerHTML="Received <i class=\"fa fa-check \"></i>";
                            
                        
                    }
                });
        }



$("#search_btn").on("click",function(){

            var detail=$("#search_book").val();

            if(detail){
                 
                $.ajax({
                    url:"search_book.php",
                    type:"post",
                    data:{
                        "detail":detail
                    },
                    success:function(data){

                        var obj=JSON.parse(data);
                        var table_content=""
                        $('#book_display').find( 'tr:not(:first)' ).remove();
                       $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.book_id+"</td>";
                            table_content+="<td>"+value.approved_date+"</td>";
                            table_content+="<td>"+value.title+"</td>";
                            table_content+="<td>"+value.usn+"</td>";
                            table_content+="<td>"+value.name+"</td>";
                            table_content+="<td>"+value.email+"</td>";
                            table_content+="<td>"+value.semester+"</td>";
                            table_content+="<td>"+value.branch+"</td>";
                            table_content+="<td>"+value.stock+"</td>";
                           if (value.stock>0) {
                           table_content+="<td><span class=\"btn btn-danger\" style=\"color:#fff\" id=\"b"+value.rid+"\" onclick=\"approve('"+value.rid+"',this.id,'"+value.book_id+"')\">Approve</span></td>";
                           }else{
                            table_content+="<td><span class=\"btn btn-warning\" style=\"color:#fff\" >Out Of Stock</span></td>";
                           }
                           table_content+="</tr>";
                        });
                        $("#book_display").append(table_content);
                    }
                });
            }
            else{
                alert("Enter search keyword");
                location.reload();
            }
         });

