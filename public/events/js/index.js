

$(document).ready(function () {
    $(".single-item").slick({
        dots: false,
        slidesToShow: 5,
        centerMode: true,
        centerPadding: '10px',
        focusOnSelect: true,
        // variableWidth: true
    });

    $( ".fore-more" ).on("click",function() {
        var grandparent = $(this).parent().parent().parent();
        if ($(grandparent).find('.openList').length == 1) {
            $(grandparent).find('.info-nav').removeClass( "openList" )
        }
        else{
            $(grandparent).find('.info-nav').addClass( "openList" )
        }
    });

    $('.video-slide_cont').slick({
        centerMode: true,
        touchMove: true,
        centerPadding: '200px',
        slidesToShow: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });

    $('.embed-responsive').on('click',function () {
        console.log('asd');
        $(this).find('img').css({
            'display': 'none'
        });

        $('<iframe>', {
            src: 'https://www.youtube.com/embed/tgbNymZ7vqY',
            id:  'myFrame',
            frameborder: 0,
            scrolling: 'no',
            class:"embed-responsive-item"
        }).appendTo(this);
    });

    $("#navBar li").click(function() {
        var c = $(this).attr("id");
        switch (c) {
            case "toContact":
                var d = $("#contact").position().top;

                return $("html, body").animate({
                    scrollTop: d
                }, 800), !1;
            case "toVideo":
                var d = $("#video").position().top;
                return $("html, body").animate({
                    scrollTop: d
                }, 800), !1;
            case "toTeam":
                var d = $("#team").position().top;
                return $("html, body").animate({
                    scrollTop: d
                }, 800), !1;
            case "toCourse":
                var d = $("#course").position().top;
                return $("html, body").animate({
                    scrollTop: d
                }, 800), !1;
        }
    });

    $( "#contact-form" ).submit(function() {
        // return ;
    });

    // <!-- Forms Validation-->

    $('#advanced-teacher').validate({
        rules:{
            name:{
                required: true,
                name: true,
                message: 'asd'
            },
            last:{
                required: true,
                last: true
            }
        },
        messages:{
            name: 'שדה נדרש',
            last: 'שדה נדרש'
        }
    });

    $('#person-details').validate({
        rules:{
            details_name:{
                required: true,
                details_name: true,
            },
            // details_last:{
            //     required: true,
            //     details_last: true
            // },
            details_number:{
                required: true,
                details_number: true
            },
        },
        messages:{
            details_name: 'נדרש שם',
            // details_last: 'Last name is required',
            details_number: 'מספר הטלפון הנייד נדרש'
        }
    });

    $('#message-form').validate({
        rules:{
            message_name:{
                required: true,
                message_name: true,
            },
            // message_last:{
            //     required: true,
            //     message_last: true
            // },
            message_number:{
                required: true,
                message_number: true
            },
        },
        messages:{
            message_name: 'נדרש שם',
            // message_last: 'Last name is required',
            message_number: 'מספר הטלפון הנייד נדרש'
        }
    });

    $('#contact-form').validate({
        rules:{
            contact_name:{
                required: true,
                contact_name: true,
            },
            contact_last:{
                required: true,
                contact_last: true
            },
            // contact_mail:{
            //     required: true,
            //     contact_mail: true,
            // },
        },
        messages:{
            contact_name: 'נדרש שם',
            contact_last: 'נדרש שם משפחה',
            // contact_mail: 'Mail is required'
        }
    });

    $('#person-details-event').validate({
        rules:{
            details_name_event:{
                required: true,
                details_name_event: true,
            },
            // details_last_event:{
            //     required: true,
            //     details_last_event: true
            // },
            details_number_event:{
                required: true,
                details_number_event: true,
            },
        },
        messages:{
            details_name_event: 'נדרש שם',
            // contact_last: 'Last name is required',
            details_number_event: 'מספר הטלפון הנייד נדרש'
        }
    });

// End forms validations


    $(".post-data").click(function (e) {
        e.preventDefault();
        var form = $(this).closest('form');

        var form_data = form.serializeArray();
        var url = $(this).data('url');
        $.ajax({
            url:url,
            data:form_data,
            method:"POST",
            success:function (data) {
                console.log(data);
            }
        });
        console.log(form.serializeArray());
    })
});

