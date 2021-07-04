 //onload
            $(document).ready(function(){
                fetch_ready_book();
             });
             function fetch_ready_book(){
                $.ajax({
                    url:"fetch_book.php",
                    type:"post",
                    data:{
                        
                    },
                    success:function(data){
                    
                        var obj=JSON.parse(data);
                        var c=1;
                        var table_content=""
                        $('#book_display').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+c++ +"</td>";
                            table_content+="<td>"+value.book_id+"</td>";
                            table_content+="<td>"+value.title+"</td>";
                            table_content+="<td>"+value.author+"</td>";
                            table_content+="<td>"+value.stock+"</td>";
                            
                           
                           table_content+="<td><span class=\"btn btn-info\" style=\"color:#fff\" id=\"b"+value.book_id+"\" onclick=\"edit_book('"+value.book_id+"',this.id)\">Edit</span></td>";
                            table_content+="<td><span class=\"btn btn-danger\" style=\"color:#fff\" id=\"b"+value.book_id+"\" onclick=\"delete_book('"+value.book_id+"',this.id)\">Delete</span></td>";
                          
                           table_content+="</tr>";
                        });
                        $("#book_display").append(table_content);
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
                        var c=1;
                        var table_content=""
                        $('#book_display').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+c++ +"</td>";
                            table_content+="<td>"+value.book_id+"</td>";
                            table_content+="<td>"+value.title+"</td>";
                            table_content+="<td>"+value.author+"</td>";
                            table_content+="<td>"+value.stock+"</td>";
                            
                           
                           table_content+="<td><span class=\"btn btn-info\" style=\"color:#fff\" id=\"b"+value.book_id+"\" onclick=\"edit_book('"+value.book_id+"',this.id)\">Edit</span></td>";
                            table_content+="<td><span class=\"btn btn-danger\" style=\"color:#fff\" id=\"b"+value.book_id+"\" onclick=\"delete_book('"+value.book_id+"',this.id)\">Delete</span></td>";
                          
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



        function add_book(){

                var book_id = document.getElementById('book_id').value;
                var title = document.getElementById('title').value;
                var author = document.getElementById('author').value;
                var stock = document.getElementById('stock').value;

                $.ajax({
                    url:"add_book.php",
                    type:"post",
                    data:{
                        "book_id":book_id,
                        "title":title,
                        "author":author,
                        "stock":stock

                    },
                    success:function(data){
                       
                       alert(data); 
                       fetch_ready_book();
                      // document.getElementById("user_display").reload(true);   
                        
                    }
                });
        }

         function edit_book(book_id,tbook_id){
                var book_id=book_id;
               

                $.ajax({
                    url:"edit_book.php",
                    type:"post",
                    data:{
                        "book_id":book_id
                        

                    },
                    success:function(data){
                    
                        var obj=JSON.parse(data);
                       
                       
                        $.each(obj,function(index,value){
                            document.getElementById('book_id').value= value.book_id;
                            document.getElementById('title').value = value.title;
                            document.getElementById('author').value = value.author;
                            document.getElementById('stock').value = value.stock;
                           
                            fetch_ready_book();
                        });
                    }
                });
        }

        function update_book(){
                 var book_id=document.getElementById('book_id').value;
                var title = document.getElementById('title').value;
                var author = document.getElementById('author').value;
                var stock = document.getElementById('stock').value;
             
                $.ajax({
                    url:"update_book.php",
                    type:"post",
                    data:{
                        "title":title,
                        "author":author,
                        "stock":stock,
                        "book_id":book_id

                    },
                    success:function(data){
                       
                       alert(data); 
                       fetch_ready_book();
                      // document.getElementById("user_display").reload(true);   
                        
                    }
                });
        }

         function delete_book(book_id,tbook_id){
                 var book_id=book_id;
               
             
                $.ajax({
                    url:"delete_book.php",
                    type:"post",
                    data:{
                       
                        "book_id":book_id

                    },
                    success:function(data){
                       
                       alert(data); 
                       fetch_ready_book();
                      // document.getElementById("user_display").reload(true);   
                        
                    }
                });
        }