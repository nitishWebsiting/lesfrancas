(function () {
    $(document).ready(function () {
        $('.contact--event > a').click(function (e) {
            e.preventDefault();
            $('.footer__contactPopup').show();
        });
        $('.contactPopup__closeIcon').click(function (e) {
            e.preventDefault();
            $('.footer__contactPopup').hide();
        })
    });
})();



