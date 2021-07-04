 //onload
            $(document).ready(function(){
                
                $.ajax({
                    url:"fetch_books.php",
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
                            table_content+="<td>"+value.title+"</td>";
                            table_content+="<td>"+value.author+"</td>";
                            table_content+="<td>"+value.stock+"</td>";
                           
                           table_content+="<td><span class=\"btn btn-info\" style=\"color:#fff\" id=\"b"+value.book_id+"\" onclick=\"request('"+value.book_id+"',this.id)\">Request</span></td>";
                           table_content+="</tr>";
                        });
                        $("#book_display").append(table_content);
                    }
                });
            });



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
                            table_content+="<td>"+value.title+"</td>";
                            table_content+="<td>"+value.author+"</td>";
                            table_content+="<td>"+value.stock+"</td>";
                           
                            table_content+="<td><span class=\"btn btn-info\" style=\"color:#fff\" id=\"b"+value.book_id+"\" onclick=\"request('"+value.book_id+"',this.id)\">Request</span></td>";
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



        function request(bid,thsid){
                var sid =2;
                var book_id=bid;
                var dates=Date.today();
                var date=dates.toISOString().substring(0, 10);
                $.ajax({
                    url:"request_book_p.php",
                    type:"post",
                    data:{
                        "book_id":book_id,
                        "sid":sid,
                        "date":date
                    },
                    success:function(data){
                       
                        document.getElementById(thsid).innerHTML="Requested <i class=\"fa fa-check \"></i>";
                            
                        
                    }
                });
        }