(function () {
    $(document).ready(function () {
        var count = 0;
        $('.loginRegister__switchForm').click(function (e) {
            e.preventDefault();
            if(count % 2 == 0) {
                $('.loginRegister__login').fadeOut();
                $('.loginRegister__register').fadeIn();
            }else{
                $('.loginRegister__register').fadeOut();
                $('.loginRegister__login').fadeIn();
            }
            count++;
        })
    });
})();
