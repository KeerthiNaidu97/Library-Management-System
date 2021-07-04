 //onload
            $(document).ready(function(){
                var sid=localStorage['sid'];
                $.ajax({
                    url:"fetch_penalty.php",
                    type:"post",
                    data:{
                        "sid":sid
                    },
                    success:function(data){
                    alert(data);
                        var obj=JSON.parse(data);
                        var table_content=""
                        $('#book_display').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.book_id+"</td>";
                            table_content+="<td>"+value.title+"</td>";
                            table_content+="<td>"+value.author+"</td>";
                            table_content+="<td>"+value.approved_date+"</td>";
                            //submission Date
                            var renew = new Date(value.approved_date);
                            var newdate = new Date(renew);

                            newdate.setDate(newdate.getDate() + 15);
                            var dd = newdate.getDate();

                            table_content+="<td>"+newdate.toISOString().substring(0, 10)+"</td>";
                            //submission Date end

                            var penalty= getPenalty(newdate,value.approved_date);
                            table_content+="<td>"+penalty+" Euro</td>";
                           
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
                    var penalty = days-15;
                }else{
                    var penalty=0;
                }
                return penalty;
            }




