(function () {
    $(document).ready(function () {
        $('.ListGroup__link').click(function (e) {
            e.preventDefault();
            var ListGroup__questionContainer = $(this).parent('.ListGroup__questionContainer');
            var a = ListGroup__questionContainer.next('.ListGroup__subQuestionContainer').children('.ListGroup__text');
            a.fadeToggle(300);
            $('.ListGroup__text--sub').fadeOut(300);
        });

        $('.ListGroup__text').click(function () {
            $(this).next('.ListGroup__text--sub').fadeToggle(300);
        });
    });
})();