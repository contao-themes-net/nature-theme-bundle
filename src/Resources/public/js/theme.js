jQuery(document).ready(function($) {

    /* =================== *
     * Tabs         	   *
     * =================== */
    $('.ce_tabsNavElement li').on('click', function() {
        var tab = $(this).data('tab');

        $('.ce_tabsNavElement li').removeClass('is-active');
        $(this).addClass('is-active');

        $('.tab-content').removeClass('is-active');
        $('.tab-content[data-content="' + tab + '"]').addClass('is-active');
    });
	var firstTab = $('.ce_tabsNavElement li.first').attr('data-tab');
	$('.ce_tabsNavElement li.first, .tab-content[data-content="' + firstTab + '"]').addClass('is-active');

    /* =================== *
     * Parallax Opacity    *
     * =================== */
    if( $(".header-image").length > 0 || $(".parallax-slider").length > 0 ) {
        parallaxScroll();
        $(window).scroll(function(e){
            parallaxScroll();
        });
    }

    function parallaxScroll() {
        var scrolled = $(window).scrollTop();

        var opacity = scrolled / 350 - 1;
        if(opacity < 0) {
            opacity = Math.abs(opacity);
        } else {
            opacity = 0;
        }

        if($(".header-image").length > 0) $(".header-image .title").css("opacity",opacity);
        if($(".parallax-slider").length > 0 && $(window).width() > 768) $(".parallax-slider .text").css("opacity",opacity);
    }

    /* =================== *
     * Sticky Teaserbox    *
     * =================== */
    if( $(".sticky-teaserbox").length > 0 ) {
        $(".sticky-teaserbox").closest(".mod_article").removeClass("block");
        $(".sticky-teaserbox").closest(".container").addClass("sticky-container");
        $("<div class='sticky-column'></div>").insertBefore(".sticky-teaserbox:nth-of-type(1)");
    }
    $(".sticky-teaserbox").each( function() {
        var style = $(this).find(".inside > .image_container").attr("style").replace(/\"/g, "'"); // replace for ie11
        $(".sticky-column").append('<div class="sticky-column-background" style="'+style+'"></div>');
    });

    /* =================== *
     * File Upload   	   *
     * =================== */
    $('input[type="file"]').on("change", function(){
        $(this).closest(".file").find(".file-name").addClass("active");
        $(this).closest(".file").find(".file-name").text( $(this).val().replace("C:\\fakepath\\","") );
    });

    /* =================== *
     * Modal Dialog  	   *
     * =================== */
    $(".modal-button").click( function() {
        var modalId = $(this).attr("data-target");
        $(modalId).toggleClass("is-active");
    });

    $(".modal .delete, .modal-background").click( function() {
        $(this).closest(".modal").toggleClass("is-active");
    });

    /* =================== *
     * Mobile Menu   	   *
     * =================== */
    $(".toggle-more, .toggle-less").click( function(e) {
        $(this).closest("a").next().toggleClass("active");
        $(this).closest("a").find(".toggle-more, .toggle-less").toggleClass("active");
        e.preventDefault();
    });

    /* =================== *
     * Top Link     	   *
     * =================== */
    $(window).scroll(function () {
        scrollPos = $(document).scrollTop();

        $("footer .ce_toplink").addClass("active");
        if(scrollPos <= 500) {
            $("footer .ce_toplink").removeClass("active");
        }
    });

    $(document).on('click', 'footer .ce_toplink:not(.custom)', function(event){
        event.preventDefault();

        $("html, body").animate({ scrollTop: 0 }, 1000);
    });

    /* =================== *
     * Smooth Scroll	   *
     * =================== */
    $('a[href*=\\#]').on('click', function(event){
        var href = $(this).attr('href');
        href = href.substr(0,href.indexOf('#'));
        href = href.replace('./','');

        var path = window.location.pathname;
        path = path.replace('/','');

        if ( $(this).attr('target') != '_blank' && path == href) {
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top}, 1000);
        }
    });

    /* =================== *
     * Touch Navigation	   *
     * =================== */
    $(".navbar").on("touchstart",".navbar-menu:not(.is-active) a.submenu:not(.open)", function(e) {
        if( $(this).parent().parent().hasClass("level_1") ) {
            $("#navbarMain:not(.is-active) .navbar-dropdown").removeClass("open");
        }
        if( $(this).parent().parent().hasClass("level_2") ) {
            $("#navbarMain:not(.is-active) .level_2 .navbar-dropdown").removeClass("open");
        }
        $("#navbarMain a.open").removeClass("open");
        $(this).addClass("open");
        $(this).next().addClass("open");
        e.preventDefault();
    });
});

document.addEventListener('DOMContentLoaded', function(e) {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach( function(el) {
            el.addEventListener('click', function(e) {

                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
        });
    }

});
