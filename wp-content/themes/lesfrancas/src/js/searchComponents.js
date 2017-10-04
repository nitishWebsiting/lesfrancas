(function () {
    $(document).ready(function () {
        $('.searchComponents__icon').click(function () {
            $('.searchComponents__form').fadeToggle(200);
        });

        var searchResponsive = $('.search-responsive');
        var sizeWindow = $(window).width();
        function sizeW() {
            if(sizeWindow >= 991) {
                searchResponsive.hide();
            }else{
                searchResponsive.show();
            }
            $(window).resize(function () {
                 sizeWindow = $(window).width();
                 if(sizeWindow >= 991){
                    searchResponsive.hide();
                 }else{
                    searchResponsive.show();
                 }
            });
        }
        sizeW();
    });
})();