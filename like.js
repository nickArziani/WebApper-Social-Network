    $(document).ready(function(){
        $('.click').click(function(event){
             event.preventDefault();
        var data = $('.like').serialize();
        $.ajax({
            url: 'like.php',
            type: "POST",
            dataType: "JSON",
            data: data,
            success: function(data){
                $(this).html(data);
            }
        });
        });
    });
