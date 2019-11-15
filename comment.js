    $(document).ready(function(){
        $('#comment_send').click(function(event){
            event.preventDefault();
        var comment = $('#comment').serialize();
        $.ajax({
            url: 'comment.php',
            type: 'POST',
            dataType: "JSON",
            data: comment,
            success: function(){
                alert('Ok');
            }
        });
        });
    });