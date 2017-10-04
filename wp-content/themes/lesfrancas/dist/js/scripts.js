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
                    $('#cree_main_cat .row:last').after('<div class="alert alert-info">Chargement de contributions...</div>');
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
                    $('#cree_main_cat .row:last').after('<div class="alert alert-info">Chargement de contributions...</div>');
                    stop = true;
                },
                error: function (data) {
                    $('#loadmore').before('<div class="alert alert-danger">Mistakes have been detected…</div>');
                }
            });
        }
    });

});
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




$(function () {
	console.log('done');
	//$('.datepicker').datepicker();

    $('#date_start').datetimepicker();
    $('#date_end').datetimepicker({
        useCurrent: false //Important! See issue #1075
    });
    $("#date_start").on("dp.change", function (e) {
        $('#date_end').data("DateTimePicker").minDate(e.date);
    });
    $("#date_end").on("dp.change", function (e) {
        $('#date_start').data("DateTimePicker").maxDate(e.date);
    });
});
// (function () {
//     $(document).ready(function () {
//         $('.favoriteButton').click(function (e) {
//             e.preventDefault();
//         })
//     })
// })();
// (function () {
//     $(document).ready(function () {
//         $('.inputText').focus(function () {
//             $(this).prev('.formLabel').addClass('focus')
//         });
//         $('.inputText').blur(function () {
//             $(this).prev('.formLabel').removeClass('focus')
//         });
//         // $('.inputSelect').focus(function () {
//         //     $(this).prev('.formLabel.select').addClass('focus')
//         // });
//         // $('.inputSelect').blur(function () {
//         //     $(this).prev('.formLabel.select').removeClass('focus')
//         // });
//
//     });
// })();

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
// (function () {
//     $(document).ready(function () {
//         $('.quiSommesNousLink').click(function (e) {
//             e.preventDefault();
//             $('.header__searchContainer').fadeOut();
//             $('.quiSommesNousContain').fadeOut();
//             $('.homeMain').fadeOut();
//             setTimeout(function () {
//                 $('.quiSommesNousComponents').fadeIn();
//             }, 800);
//         })
//     });
// })();

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
(function () {
    $(function(){
        $('.sectionSliderArticle').slick({
            dots: true,
            dotsClass: "sectionSliderArticle__dots",
            arrows: false
        });

        $('.sectionQR__slider').slick({
            dots: true,
            arrows: false,
            dotsClass: 'sectionQR__dots'
        });
    });
})();

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
                    $('#validate_container .row:last').after('<div class="alert alert-info">Chargement de contributions...</div>');
                    stop = true;
                },
                error: function (data) {
                    $('#validate_container').after('<div class="alert alert-danger">Mistakes have been detected…</div>');
                }
            });
        }
     });
});


$(function () {
  //Not Proud of it
  $('#first_name').attr('placeholder', 'Prénom')  
  $('#last_name').attr('placeholder', 'Nom')  
})