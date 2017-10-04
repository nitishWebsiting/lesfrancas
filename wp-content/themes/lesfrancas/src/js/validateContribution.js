$(function () {
    /**
     * Ajax 
     */
     console.log('validate contribution');
     stop = false;
     $('#validate_form').submit( function(e) {
        e.preventDefault();
        var answer = $('input[name=validate]:checked').val();
        var comment = $('textarea[name=comment]').val();

        var post = $('input[name=post]').val();

        launchAjax = false;
        if( answer == 'yes' || answer == 'no' ){
            launchAjax = true;        
            if(answer == 'no' && comment == '') {
                $('#validate_container').after('<div class="alert alert-danger">Veuillez nous expliquer pourquoi vous ne souhaitez pas valider cette contribution.</div>');
                $('.alert-danger').delay( 1000 ).fadeOut( 400 );
                launchAjax = false;
            }
            if(stop){
                launchAjax = false;
            }
        }

        if( launchAjax ){
            $.post({
                url: ajaxurl,
                data: {
                    'action' : 'cree_contribution_answer',
                    'answer' : answer,
                    'comment' : comment,
                    'post' : post,
                },
                success: function(data){
                    //$('#validate_container').after('<div class="alert alert-info">Sending result</div>');
                    //console.log(data);
                    if( data.success )
                    {
                        $('.alert-info').fadeOut();
                        $('#validate_container').after(data.data);
                        $('#validate_container').html('');
                        stop = true;
                    }
                    else{
                        $('.alert-info').fadeOut();
                        $('#validate_container').after(data.data);
                        stop = false;
                    }
                },
                beforeSend: function(){
                    $('#validate_container .row:last').after('<div class="alert alert-info">Loading results...</div>');
                    stop = true;
                },
                error: function (data) {
                    $('#validate_container').after('<div class="alert alert-danger">Mistakes have been detected…</div>');
                }
            });
        }
     });
});