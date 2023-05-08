$('#message').keypress(function(e){
    if(e.keyCode == 13){
        $.ajax({
            url:'router/router.php?ind=send',
            data:{
                'message':$('#message').val()
            },
            type:'POST',
            success:function(e){
                $('#message').val('')
                $('#message').focus()
            }
        })
    }
})

setInterval(function(){
    $.ajax({
        url:'router/router.php?ind=collect',
        type:'GET',
        success:function(e){
            $('#messages').html(e)
        }
    })
},1000)