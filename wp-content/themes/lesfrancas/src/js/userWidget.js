(function () {
    $(document).ready(function () {
            var breakpoint = 1200;
            var sizeWindow = $(window).width();
            var lock = false;

            if(sizeWindow <= breakpoint){
                lock = true;
            }else{
                lock = false;
            }
            $(window).resize(function () {
                sizeWindow = $(window).width();
                if(sizeWindow <= breakpoint){
                    lock = true;
                }else if(sizeWindow >= breakpoint){
                    lock = false;
                }
            });
        function userWidgetClick() {
            var count = 0;
            $('.userWidget__items--acount').click(function (e) {
                // Permet de cliquer et de faire dérouler le menu une seule fois
                // Au second click, redirection vers la page mon compte
                if(count < 1){
                    e.preventDefault();
                }
                count++;
                $('.userWidget__items').slideToggle(100);
            });
        }
        if(lock == true){
            userWidgetClick();
        }
    })
})();
