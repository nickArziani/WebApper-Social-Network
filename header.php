<script src="jq.js"></script>
<link rel="icon" href="tmp/fav.png">
<div class="header">
<div style="margin:0 auto; width:598px">
        <div class='cont_ava'>
        <a href="wall.php"><div class='image_header'>WA</div></a>
        </div>

    <script>
        $(document).ready(function(){
          $('#res').animate({
                           left: 0,
                        });
            $('#inp').keyup(function(event){
                event.preventDefault();
                var search = $('#search').serialize();
                $.ajax({
                    url: 'search.php',
                    type: "POST",
                    data: search,
                    dataYype: "JSON",
                    success: function(data){
                      $('.img_ava').animate({
                        maxWidth: 120,
                        maxHeight: 120,
                        marginLeft: 59
                      });
                        $('.html').html(data);
                    }
                });
            }

          );
        });
    </script>
   <h1 class="name"><? echo $_COOKIE['name'] ?></h1>
   <a href="exit.php"><div>გასვლა</div></a>
   <img src="image/newspaper.png" class="newspaper">
</div>
</div>
