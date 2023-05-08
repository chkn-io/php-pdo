$('.register').click(function(){
    // if($('#name').val() == ''){
    //     $('#name').css({'border':'1px solid red'})
    // }
    $.ajax({
        url:'router/router.php?ind=register',
        data:$('#registration').serialize(),
        type:'POST',
        beforeSend:function(){
            // $('.register').html('Submitting...')
            $('#preloader').css({'display':'block'})
        },
        success:function(e){
            if(e == 'success'){
                $('#registration_status').html('<p class="alert alert-success">Successfully Registered</p>')
            }
            // $('.register').html('Register')
            $('#preloader').css({'display':'none'})
        }
    })
})