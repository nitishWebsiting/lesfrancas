$(function () {
    /**
     * Ajax 
     */
    stop = false;
    $(window).scroll(function() {

        var category = $( '#cree_main_cat' ).attr('data-category');
        var numItems = $('.sectionPageFront').length;
        launchAjax = false;
        if(numItems > 10){
            if($(window).scrollTop() + $(window).height() > $(document).height() - 1) {
                launchAjax = true;
                if(stop){
                    launchAjax = false;
                }
            }            
        }

        if (launchAjax) {
            $.post({
                url: ajaxurl,
                data: {
                    'action': 'cree_get_category',
                    'category': category,
                    'numItems': numItems
                }, 
                success: function(data){
                    $('#cree_main_cat .row:last').after('<div class="alert alert-info">Loading results...</div>');
                    if(data.success)
                    {
                        $('.alert-info').fadeOut();
                        $('.cree_cat_article:last').after(data.data);
                        stop = false;
                    }
                    else
                    {
                        $('.alert-info').fadeOut();
                        $('#cree_main_cat .row:last').after(data.data);
                        stop = true;
                    }
                },
                beforeSend: function(){
                    $('#cree_main_cat .row:last').after('<div class="alert alert-info">Loading results...</div>');
                    stop = true;
                },
                error: function (data) {
                    $('#loadmore').before('<div class="alert alert-danger">Mistakes have been detected…</div>');
                }
            });
        }
    });

});