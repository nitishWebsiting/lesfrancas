(function () {
    $(document).ready(function () {
        var thematiqueMenu = $('.thematiqueMenu');
        var searchFilters = $('.searchFilters');

        $('.search--interact').click(function () {
            searchFilters.slideToggle(300);
            searchFilters.addClass('active');
            if (thematiqueMenu.hasClass('active')) {
                thematiqueMenu.slideUp(300);
                thematiqueMenu.removeClass('active');
            }
        });

        $('.thematique').click(function () {
            thematiqueMenu.toggleClass('active');
            if (thematiqueMenu.hasClass('active')) {
                thematiqueMenu.slideDown(300);
                searchFilters.slideToggle(300);
            } else {
                thematiqueMenu.slideUp(300);
            }
        });

        $('.menu').click(function () {
            thematiqueMenu.toggleClass('active');
            if (thematiqueMenu.hasClass('active')) {
                thematiqueMenu.slideDown(300);
                if(searchFilters.hasClass('active')){
                    searchFilters.slideUp(300);
                }
            } else {
                thematiqueMenu.slideUp(300);
            }
        });

        $('.rubrique').click(function () {
            $(this).next().slideToggle();
        });

        var sizeWindow;
        $(window).resize(function () {
            sizeWindow = $(window).width();
            if(sizeWindow >= 768 && sizeWindow < 991){
                if(searchFilters.hasClass('active')){
                    searchFilters.hide();
                }
            }
            if(sizeWindow >= 991){
                if(!thematiqueMenu.hasClass('active')) {
                    thematiqueMenu.addClass('active');
                    thematiqueMenu.show();
                }
            }else{
                if(thematiqueMenu.hasClass('active')) {
                    thematiqueMenu.removeClass('active');
                    thematiqueMenu.hide();
                }
            }
        })
    });
})();