     $(document).ready(function(){

    var inProgress = false;
    var startFrom = 1;

        $(window).scroll(function() {

            if($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !inProgress) {

            $.ajax({
                url: 'obrabotchik.php',
                method: 'POST',
                data: {"startFrom" : startFrom},
                beforeSend: function() {
                inProgress = true;}
                }).done(function(data){

                data = jQuery.parseJSON(data);

                if (data.length > 0) {

                $.each(data, function(index, data){
                var row = data.photos,
                    text_all = data.text_area;


                // if(row.substr(row.length - 4) == '.mp4'){
                // $("#articles").append("<a href='show.php?id="+ data.id +"'><div class='row'><img src='image/"+ data.ava +"' class='header_wall'><span>"+ data.name +"</span><br><span class='text'>"+ data.dates +"</span><span class='like'><img src='image/like.png'><div style='float: right;margin: 4px;'>"+ data.likes +"</div></span><video controls src='image/" + data.photos + "'></video></div></a>");
                // }
                 if(row == ""){
                 $("#articles").append("<a href='show.php?id="+ data.id +"'><div class='row'><div style='width: 100%;height: 50px;position: absolute;margin: -9 0 0 0;'><a href='profile.php?ids="+ data.ids +"'><img src='image/"+ data.ava +"' class='header_wall'><span class='text'><div style='float:left'>"+ data.name +"<div><span class='text_area'>"+ data.text_area +"</span></span></a><span class='data'>"+ data.dates +"</span></div><div class='mar'></div></div><div class='pointer'></div></a>");
                }else if((row.substr(row.length - 4) != '.mp4')){
                $("#articles").append("<a href='show.php?id="+ data.id +"'><div class='row'><div style='width: 100%;height: 50px;position: absolute;margin: -9 0 0 0;'><a href='profile.php?ids="+ data.ids +"'><img src='image/"+ data.ava +"' class='header_wall'><span class='text'>"+ data.name +"</span></a><span class='data'>"+ data.dates +"</span></div><div class='mar'><img src='image/" + data.photos + "'></div></div><div class='pointer'></div></a>");
                }

                });

                inProgress = false;
                startFrom += 10;
                }});
            }
        });
    });




    // <span class='text_area'><p class='art'>"+ data.text_area.substr(0,1000) + "</p></span>
    // <p class='art'>"+ data.text_area.substr(0,50) +"</p>
