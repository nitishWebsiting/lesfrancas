(function () {
    $(document).ready(function () {
        var sizeWindow = $(window).width();
        subMenu();
        $(window).resize(function () {
            sizeWindow = $(window).width();
            subMenu()
        });

        function subMenu(){
            if(sizeWindow > 991) {
                var a = $('.thematiqueMenu__lists').children('.menu-item');
                a.hover(function () {
                    $(this).children('.sub-menu').addClass('active');
                });
                a.mouseleave(function () {
                    $(this).children('.sub-menu').removeClass('active');
                });
            }else{
                $('.sub-menu').removeClass('active');
            }
        }
    });
})();