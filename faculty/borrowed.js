 //onload
            $(document).ready(function(){
                var sid=2;
                $.ajax({
                    url:"borrowed_books.php",
                    type:"post",
                    data:{
                        "sid":sid
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
                            table_content+="<td>"+value.approved_date+"</td>";
                           
                            var renew = new Date(value.approved_date);
                            var newdate = new Date(renew);

                            newdate.setDate(newdate.getDate() + 15);
                            var dd = newdate.getDate();

                            table_content+="<td>"+newdate.toISOString().substring(0, 10)+"</td>";
                            
                           if (1) {
                           // table_content+="<td><span class=\"btn btn-info\" style=\"color:#fff\" id=\"b"+value.rid+"\" onclick=\"renew('"+value.rid+"',this.id,'"+value.book_id+"')\">Renew</span></td>";
                           }else{
                            // table_content+="<td><span class=\"btn btn-warning\" style=\"color:#fff\" >Out Of Stock</span></td>";
                           }
                           table_content+="</tr>";
                        });
                        $("#book_display").append(table_content);
                    }
                });
            });






        function renew(rid,thsid,book_id){
               
                var rid=rid;
                var dates=Date.today();
                var renew_date=dates.toISOString().substring(0, 10);
                
                var book_id=book_id;
                $.ajax({
                    url:"renew_books.php",
                    type:"post",
                    data:{
                        "rid":rid,
                        "renew_date":renew_date,
                        "book_id":book_id
                    },
                    success:function(data){
                       
                        document.getElementById(thsid).innerHTML="renewed <i class=\"fa fa-check \"></i>";
                            
                        
                    }
                });
        }