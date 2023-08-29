(function($) {
    "use strict";
    // ______________Active Class
    $(".app-sidebar .toggle-menu.side-menu a").each(function() {
        var pageUrl = window.location.href.split(/[?#]/)[0];
        if(this.href == pageUrl) {
            $(this).addClass("active");
            $(this).parent().addClass("active"); // add active to li of the current link
            $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
            $(this).parent().parent().prev().click(); // click the item to make it drop
        }
    });

    // ______________Loader
    $(window).on("load", function(e) {
        $("#loading").fadeOut("slow");
    })
    // ______________Horizontal-menu Active Class
    $(document).ready(function() {
        $(".horizontalMenu-list li a").each(function() {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if(this.href == pageUrl) {
                $(this).addClass("active");
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
                $(this).parent().parent().prev().click(); // click the item to make it drop
            }
        });
    });

    // ______________ Back to Top
    $(window).on("scroll", function(e) {
        if($(this).scrollTop() > 0) {
            $('#back-to-top').fadeIn('slow');
        } else {
            $('#back-to-top').fadeOut('slow');
        }
    });

    $("#back-to-top").on("click", function(e) {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    // Set Default validation clases and placement
    $.validator.setDefaults({
        errorClass: "is-invalid",
        errorElement: "div",
        errorPlacement: function(error, element) {
            if(element.closest('.form-group').length) {
                if (true) {}
                error.addClass('invalid-feedback');
                error.appendTo(element.closest('.form-group'));
            }
        },
        highlight: function (element, errorClass, validClass) {
            var elem = $(element);
            if (elem.closest('.form-group').find('.select2-container').length > 0) {
                elem.closest('.form-group').find('.select2-container').addClass(errorClass);
            } else {
                elem.addClass(errorClass);
            }
        },

        unhighlight: function (element, errorClass, validClass) {
            var elem = $(element);
            if (elem.closest('.form-group').find('.select2-container').length > 0) {
                elem.closest('.form-group').find('.select2-container').removeClass(errorClass);
            } else {
                elem.removeClass(errorClass);
            }
        }
    });

    // Show file name on custom file inputs
    $(".custom-file-input").on("change", function() {
        let filenames = [];
        let files = $(this)[0].files;
        if (files.length > 1) {
            filenames.push("Total Files (" + files.length + ")");
        } else {
            for (let i in files) {
                if (files.hasOwnProperty(i)) {
                    filenames.push(files[i].name);
                }
            }
        }
        $(this).next(".custom-file-label").html(filenames.join(","));
    });

    $(document).on('click', '*[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        // $(this).ekkoLightbox();
    });
    $('[data-toggle="popover"]').popover();
})(jQuery);
