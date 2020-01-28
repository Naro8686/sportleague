jQuery(document).ready(function($) {

    // if page in loading first time save that in session 
    if(sessionStorage.getItem('loading') == "ok"){
        $('body').removeAttr('style');
        $('header.start-loading-graph').removeClass('working');
    }

    AOS.init({
        // Global settings:
        disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        initClassName: 'aos-init', // class applied after initialization
        animatedClassName: 'aos-animate', // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
        throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 120, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 1000, // values from 0 to 3000, with step 50ms
        easing: 'ease-out-back', // default easing for AOS animations
        once: false, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
        anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

    });

    //scroll down header
    {
        // try {
        //     hljs.initHighlightingOnLoad();

        //    $('.graph__scroll').on('click', function(e) {
        //        $('html, body').animate({
        //            scrollTop: $('header').outerHeight()
        //        }, 1200);
        //    });
        // } catch(e) {
        //     // statements
        //     console.log(e);
        // }
        
    }

    // we are tolking slider
    {
        try {
            $('#weAreTolking .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                nav: false,
                responsive: {
                0: {
                  items: 1,
                  nav: true,
                  autoplay:true,
                  autoplayTimeout: 3500,
                  autoplayHoverPause:true
                },
                768: {
                  items: 2,
                  nav: true,
                  margin: 25,
                  autoplay:true,
                  autoplayTimeout: 3500,
                  autoplayHoverPause:true
                },
                1200: {
                  items: 3,
                  nav: false,
                  loop: false,
                  margin: 50,
                  autoplay:false,
                  autoplayHoverPause:false
                }
              }
            });
            $('#weAreTolking .owl-next').click(function() {
                $('#weAreTolking .owl-carousel').trigger('next.owl.carousel');
            })
            $('#weAreTolking .owl-prev').click(function() {
                $('#weAreTolking .owl-carousel').trigger('prev.owl.carousel', [300]);
            })
        } catch(e) {
            // statements
            console.log(e);
        }
    }

    /* Services hover */
    {
        try {
            // offer 1
            $('section#services .overlay .service_card.offer-1').hover(function() {
                if($(window).width() > 1200){
                    $(this).find('img:not(.svg)').removeClass('d-block').addClass('d-none');
                    $(this).find('img:not(.svg)').after('<svg xmlns="http://www.w3.org/2000/svg" width="109.576" height="109.576" viewBox="0 0 109.576 109.576" style=""><g id="Group_162" data-name="Group 162" transform="translate(0)"><g id="Group_124" data-name="Group 124" transform="translate(0 0)"><g id="Ellipse_1" data-name="Ellipse 1" transform="translate(0 0)" fill="none" stroke="#fff" stroke-width="2"><path stroke="none" d="M0,54.788A54.788,54.788 0,1,1 109.576,54.788A54.788,54.788 0,1,1 0,54.788" class="nWmtkppC_0"></path><path fill="none" d="M1,54.788A53.788,53.788 0,1,1 108.576,54.788A53.788,53.788 0,1,1 1,54.788" class="nWmtkppC_1"></path></g><path id="Path_4" data-name="Path 4" d="M112.432,105.643H24.2L68.122,29.522Z" transform="translate(-13.556 -25.302)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2" class="nWmtkppC_2"></path></g></g><style data-made-with="vivus-instant">.nWmtkppC_0{stroke-dasharray:345 347;stroke-dashoffset:346;animation:nWmtkppC_draw 1000ms linear 0ms forwards;}.nWmtkppC_1{stroke-dasharray:339 341;stroke-dashoffset:340;animation:nWmtkppC_draw 1000ms linear 0ms forwards;}.nWmtkppC_2{stroke-dasharray:265 267;stroke-dashoffset:266;animation:nWmtkppC_draw 1000ms linear 0ms forwards;}@keyframes nWmtkppC_draw{100%{stroke-dashoffset:0;}}@keyframes nWmtkppC_fade{0%{stroke-opacity:1;}92.3076923076923%{stroke-opacity:1;}100%{stroke-opacity:0;}}</style></svg>');
                }
            }, function() {
                if($(window).width() > 1200){
                    $(this).find('img:not(.svg)').removeClass('d-none').addClass('d-block');
                    $(this).find('svg').remove();
                }
            });
            // offer 2
            $('section#services .overlay .service_card.offer-2').hover(function() {
                if($(window).width() > 1200){
                    $(this).find('img:not(.svg)').removeClass('d-block').addClass('d-none');
                    $(this).find('img:not(.svg)').after('<svg xmlns="http://www.w3.org/2000/svg" width="100.894" height="114.504" viewBox="0 0 100.894 114.504" style=""><g id="Group_125" data-name="Group 125" transform="translate(-279 -77.086)"><g id="Rectangle_1" data-name="Rectangle 1" transform="translate(279 105.822)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2"><path width="100.88" height="58.847" stroke="none" d="M0 0 L100.88 0 L100.88 58.847 L0 58.847 Z" class="eJefXUjB_0"></path><path width="98.88" height="56.847" fill="none" d="M1 1 L99.88 1 L99.88 57.847 L1 57.847 Z" class="eJefXUjB_1"></path></g><path id="Line_4" data-name="Line 4" transform="translate(330.141 163.968)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M0,0L0,26.621" class="eJefXUjB_2"></path><path id="Line_5" data-name="Line 5" transform="translate(279.549 78.5)" fill="none" stroke="#fff" stroke-width="2" d="M0,28.527L50.592,0" class="eJefXUjB_3"></path><path id="Line_6" data-name="Line 6" transform="translate(330.019 78.5)" fill="none" stroke="#fff" stroke-width="2" d="M0,0L49.373,28.527" class="eJefXUjB_4"></path><path id="Line_7" data-name="Line 7" transform="translate(330.141 163.968)" fill="none" stroke="#fff" stroke-width="2" d="M49.039,0L0,26.621" class="eJefXUjB_5"></path><path id="Line_8" data-name="Line 8" transform="translate(279.549 162.984)" fill="none" stroke="#fff" stroke-width="2" d="M50.592,27.606L0,0" class="eJefXUjB_6"></path><path id="Line_9" data-name="Line 9" transform="translate(330.141 78.5)" fill="none" stroke="#fff" stroke-width="2" d="M0,0L25.22,28.022" class="eJefXUjB_7"></path><path id="Line_10" data-name="Line 10" transform="translate(302.118 78.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M28.022,0L0,28.022" class="eJefXUjB_8"></path><path id="Line_11" data-name="Line 11" transform="translate(280.646 106.522)" fill="none" stroke="#fff" stroke-width="2" d="M21.473,0L0,56.461" class="eJefXUjB_9"></path><path id="Line_12" data-name="Line 12" transform="translate(302.819 105.822)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M26.621,57.446L0,0" class="eJefXUjB_10"></path><path id="Line_13" data-name="Line 13" transform="translate(330.141 106.522)" fill="none" stroke="#fff" stroke-width="2" d="M25.22,0L0,57.446" class="eJefXUjB_11"></path><path id="Line_14" data-name="Line 14" transform="translate(356.061 107.223)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M22.418,56.045L0,0" class="eJefXUjB_12"></path></g><style data-made-with="vivus-instant">.eJefXUjB_0{stroke-dasharray:320 322;stroke-dashoffset:321;animation:eJefXUjB_draw 287ms linear 0ms forwards;}.eJefXUjB_1{stroke-dasharray:312 314;stroke-dashoffset:313;animation:eJefXUjB_draw 279ms linear 287ms forwards;}.eJefXUjB_2{stroke-dasharray:27 29;stroke-dashoffset:28;animation:eJefXUjB_draw 25ms linear 566ms forwards;}.eJefXUjB_3{stroke-dasharray:59 61;stroke-dashoffset:60;animation:eJefXUjB_draw 53ms linear 592ms forwards;}.eJefXUjB_4{stroke-dasharray:58 60;stroke-dashoffset:59;animation:eJefXUjB_draw 52ms linear 645ms forwards;}.eJefXUjB_5{stroke-dasharray:56 58;stroke-dashoffset:57;animation:eJefXUjB_draw 50ms linear 698ms forwards;}.eJefXUjB_6{stroke-dasharray:58 60;stroke-dashoffset:59;animation:eJefXUjB_draw 52ms linear 749ms forwards;}.eJefXUjB_7{stroke-dasharray:38 40;stroke-dashoffset:39;animation:eJefXUjB_draw 34ms linear 802ms forwards;}.eJefXUjB_8{stroke-dasharray:40 42;stroke-dashoffset:41;animation:eJefXUjB_draw 36ms linear 837ms forwards;}.eJefXUjB_9{stroke-dasharray:61 63;stroke-dashoffset:62;animation:eJefXUjB_draw 55ms linear 873ms forwards;}.eJefXUjB_10{stroke-dasharray:64 66;stroke-dashoffset:65;animation:eJefXUjB_draw 58ms linear 929ms forwards;}.eJefXUjB_11{stroke-dasharray:63 65;stroke-dashoffset:64;animation:eJefXUjB_draw 57ms linear 987ms forwards;}.eJefXUjB_12{stroke-dasharray:61 63;stroke-dashoffset:62;animation:eJefXUjB_draw 55ms linear 1044ms forwards;}@keyframes eJefXUjB_draw{100%{stroke-dashoffset:0;}}@keyframes eJefXUjB_fade{0%{stroke-opacity:1;}91.83673469387755%{stroke-opacity:1;}100%{stroke-opacity:0;}}</style></svg>');
                }
            }, function() {
                if($(window).width() > 1200){
                    $(this).find('img:not(.svg)').removeClass('d-none').addClass('d-block');
                    $(this).find('svg').remove();
                }
            });
            // offer 3
            $('section#services .overlay .service_card.offer-3').hover(function() {
                if($(window).width() > 1200){
                    $(this).find('img:not(.svg)').removeClass('d-block').addClass('d-none');
                    $(this).find('img:not(.svg)').after('<svg xmlns="http://www.w3.org/2000/svg" width="103.848" height="120.601" viewBox="0 0 103.848 120.601" style=""><g id="Group_1" data-name="Group 1" transform="translate(-859.26 -464.097)"><path id="Path_1" data-name="Path 1" d="M101.255,87.167H.9L50.4,1.082Z" transform="translate(860.1 465)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2" class="caaImDgk_0"></path><path id="Path_2" data-name="Path 2" d="M.9,29H101.255L51.078,115.175Z" transform="translate(860.1 467.535)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2" class="caaImDgk_1"></path><path id="Path_3" data-name="Path 3" d="M73.614,72.04H24.2L48.8,29.522Z" transform="translate(862.434 467.474)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2" class="caaImDgk_2"></path><path id="Line_1" data-name="Line 1" transform="translate(861.545 527.624)" fill="none" stroke="#fff" stroke-width="2" d="M0,23.998L50.178,0" class="caaImDgk_3"></path><path id="Line_2" data-name="Line 2" transform="translate(911.723 527.624)" fill="none" stroke="#fff" stroke-width="2" d="M49.087,23.998L0,0" class="caaImDgk_4"></path><path id="Line_3" data-name="Line 3" transform="translate(910.632 466.538)" fill="none" stroke="#fff" stroke-width="2" d="M1.091,61.086L0,0" class="caaImDgk_5"></path></g><style data-made-with="vivus-instant">.caaImDgk_0{stroke-dasharray:300 302;stroke-dashoffset:301;animation:caaImDgk_draw 357ms linear 0ms forwards;}.caaImDgk_1{stroke-dasharray:300 302;stroke-dashoffset:301;animation:caaImDgk_draw 357ms linear 357ms forwards;}.caaImDgk_2{stroke-dasharray:148 150;stroke-dashoffset:149;animation:caaImDgk_draw 176ms linear 714ms forwards;}.caaImDgk_3{stroke-dasharray:56 58;stroke-dashoffset:57;animation:caaImDgk_draw 67ms linear 891ms forwards;}.caaImDgk_4{stroke-dasharray:55 57;stroke-dashoffset:56;animation:caaImDgk_draw 66ms linear 958ms forwards;}.caaImDgk_5{stroke-dasharray:62 64;stroke-dashoffset:63;animation:caaImDgk_draw 74ms linear 1025ms forwards;}@keyframes caaImDgk_draw{100%{stroke-dashoffset:0;}}@keyframes caaImDgk_fade{0%{stroke-opacity:1;}91.83673469387755%{stroke-opacity:1;}100%{stroke-opacity:0;}}</style></svg>');
                }
            }, function() {
                if($(window).width() > 1200){
                    $(this).find('img:not(.svg)').removeClass('d-none').addClass('d-block');
                    $(this).find('svg').remove();
                }
            });
        } catch(e) {
            // statements
            console.log(e);
        }


        try {
            if($(window).width() < 1200){
                // offer 1
                $("section#services .overlay .service_card.offer-1").find('img:not(.svg)').removeClass('d-block').addClass('d-none');
                $("section#services .overlay .service_card.offer-1").find('img:not(.svg)').after('<svg xmlns="http://www.w3.org/2000/svg" width="109.576" height="109.576" viewBox="0 0 109.576 109.576" style=""><g id="Group_162" data-name="Group 162" transform="translate(0)"><g id="Group_124" data-name="Group 124" transform="translate(0 0)"><g id="Ellipse_1" data-name="Ellipse 1" transform="translate(0 0)" fill="none" stroke="#fff" stroke-width="2"><path stroke="none" d="M0,54.788A54.788,54.788 0,1,1 109.576,54.788A54.788,54.788 0,1,1 0,54.788" class="nWmtkppC_0"></path><path fill="none" d="M1,54.788A53.788,53.788 0,1,1 108.576,54.788A53.788,53.788 0,1,1 1,54.788" class="nWmtkppC_1"></path></g><path id="Path_4" data-name="Path 4" d="M112.432,105.643H24.2L68.122,29.522Z" transform="translate(-13.556 -25.302)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2" class="nWmtkppC_2"></path></g></g><style data-made-with="vivus-instant">.nWmtkppC_0{stroke-dasharray:345 347;stroke-dashoffset:346;animation:nWmtkppC_draw 1000ms linear 0ms forwards;}.nWmtkppC_1{stroke-dasharray:339 341;stroke-dashoffset:340;animation:nWmtkppC_draw 1000ms linear 0ms forwards;}.nWmtkppC_2{stroke-dasharray:265 267;stroke-dashoffset:266;animation:nWmtkppC_draw 1000ms linear 0ms forwards;}@keyframes nWmtkppC_draw{100%{stroke-dashoffset:0;}}@keyframes nWmtkppC_fade{0%{stroke-opacity:1;}92.3076923076923%{stroke-opacity:1;}100%{stroke-opacity:0;}}</style></svg>');
                
                // offer 2
            
                $('section#services .overlay .service_card.offer-2').find('img:not(.svg)').removeClass('d-block').addClass('d-none');
                $('section#services .overlay .service_card.offer-2').find('img:not(.svg)').after('<svg xmlns="http://www.w3.org/2000/svg" width="100.894" height="114.504" viewBox="0 0 100.894 114.504" style=""><g id="Group_125" data-name="Group 125" transform="translate(-279 -77.086)"><g id="Rectangle_1" data-name="Rectangle 1" transform="translate(279 105.822)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2"><path width="100.88" height="58.847" stroke="none" d="M0 0 L100.88 0 L100.88 58.847 L0 58.847 Z" class="eJefXUjB_0"></path><path width="98.88" height="56.847" fill="none" d="M1 1 L99.88 1 L99.88 57.847 L1 57.847 Z" class="eJefXUjB_1"></path></g><path id="Line_4" data-name="Line 4" transform="translate(330.141 163.968)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M0,0L0,26.621" class="eJefXUjB_2"></path><path id="Line_5" data-name="Line 5" transform="translate(279.549 78.5)" fill="none" stroke="#fff" stroke-width="2" d="M0,28.527L50.592,0" class="eJefXUjB_3"></path><path id="Line_6" data-name="Line 6" transform="translate(330.019 78.5)" fill="none" stroke="#fff" stroke-width="2" d="M0,0L49.373,28.527" class="eJefXUjB_4"></path><path id="Line_7" data-name="Line 7" transform="translate(330.141 163.968)" fill="none" stroke="#fff" stroke-width="2" d="M49.039,0L0,26.621" class="eJefXUjB_5"></path><path id="Line_8" data-name="Line 8" transform="translate(279.549 162.984)" fill="none" stroke="#fff" stroke-width="2" d="M50.592,27.606L0,0" class="eJefXUjB_6"></path><path id="Line_9" data-name="Line 9" transform="translate(330.141 78.5)" fill="none" stroke="#fff" stroke-width="2" d="M0,0L25.22,28.022" class="eJefXUjB_7"></path><path id="Line_10" data-name="Line 10" transform="translate(302.118 78.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M28.022,0L0,28.022" class="eJefXUjB_8"></path><path id="Line_11" data-name="Line 11" transform="translate(280.646 106.522)" fill="none" stroke="#fff" stroke-width="2" d="M21.473,0L0,56.461" class="eJefXUjB_9"></path><path id="Line_12" data-name="Line 12" transform="translate(302.819 105.822)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M26.621,57.446L0,0" class="eJefXUjB_10"></path><path id="Line_13" data-name="Line 13" transform="translate(330.141 106.522)" fill="none" stroke="#fff" stroke-width="2" d="M25.22,0L0,57.446" class="eJefXUjB_11"></path><path id="Line_14" data-name="Line 14" transform="translate(356.061 107.223)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M22.418,56.045L0,0" class="eJefXUjB_12"></path></g><style data-made-with="vivus-instant">.eJefXUjB_0{stroke-dasharray:320 322;stroke-dashoffset:321;animation:eJefXUjB_draw 287ms linear 0ms forwards;}.eJefXUjB_1{stroke-dasharray:312 314;stroke-dashoffset:313;animation:eJefXUjB_draw 279ms linear 287ms forwards;}.eJefXUjB_2{stroke-dasharray:27 29;stroke-dashoffset:28;animation:eJefXUjB_draw 25ms linear 566ms forwards;}.eJefXUjB_3{stroke-dasharray:59 61;stroke-dashoffset:60;animation:eJefXUjB_draw 53ms linear 592ms forwards;}.eJefXUjB_4{stroke-dasharray:58 60;stroke-dashoffset:59;animation:eJefXUjB_draw 52ms linear 645ms forwards;}.eJefXUjB_5{stroke-dasharray:56 58;stroke-dashoffset:57;animation:eJefXUjB_draw 50ms linear 698ms forwards;}.eJefXUjB_6{stroke-dasharray:58 60;stroke-dashoffset:59;animation:eJefXUjB_draw 52ms linear 749ms forwards;}.eJefXUjB_7{stroke-dasharray:38 40;stroke-dashoffset:39;animation:eJefXUjB_draw 34ms linear 802ms forwards;}.eJefXUjB_8{stroke-dasharray:40 42;stroke-dashoffset:41;animation:eJefXUjB_draw 36ms linear 837ms forwards;}.eJefXUjB_9{stroke-dasharray:61 63;stroke-dashoffset:62;animation:eJefXUjB_draw 55ms linear 873ms forwards;}.eJefXUjB_10{stroke-dasharray:64 66;stroke-dashoffset:65;animation:eJefXUjB_draw 58ms linear 929ms forwards;}.eJefXUjB_11{stroke-dasharray:63 65;stroke-dashoffset:64;animation:eJefXUjB_draw 57ms linear 987ms forwards;}.eJefXUjB_12{stroke-dasharray:61 63;stroke-dashoffset:62;animation:eJefXUjB_draw 55ms linear 1044ms forwards;}@keyframes eJefXUjB_draw{100%{stroke-dashoffset:0;}}@keyframes eJefXUjB_fade{0%{stroke-opacity:1;}91.83673469387755%{stroke-opacity:1;}100%{stroke-opacity:0;}}</style></svg>');

                // offer 3
                $('section#services .overlay .service_card.offer-3').find('img:not(.svg)').removeClass('d-block').addClass('d-none');
                $('section#services .overlay .service_card.offer-3').find('img:not(.svg)').after('<svg xmlns="http://www.w3.org/2000/svg" width="103.848" height="120.601" viewBox="0 0 103.848 120.601" style=""><g id="Group_1" data-name="Group 1" transform="translate(-859.26 -464.097)"><path id="Path_1" data-name="Path 1" d="M101.255,87.167H.9L50.4,1.082Z" transform="translate(860.1 465)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2" class="caaImDgk_0"></path><path id="Path_2" data-name="Path 2" d="M.9,29H101.255L51.078,115.175Z" transform="translate(860.1 467.535)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2" class="caaImDgk_1"></path><path id="Path_3" data-name="Path 3" d="M73.614,72.04H24.2L48.8,29.522Z" transform="translate(862.434 467.474)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2" class="caaImDgk_2"></path><path id="Line_1" data-name="Line 1" transform="translate(861.545 527.624)" fill="none" stroke="#fff" stroke-width="2" d="M0,23.998L50.178,0" class="caaImDgk_3"></path><path id="Line_2" data-name="Line 2" transform="translate(911.723 527.624)" fill="none" stroke="#fff" stroke-width="2" d="M49.087,23.998L0,0" class="caaImDgk_4"></path><path id="Line_3" data-name="Line 3" transform="translate(910.632 466.538)" fill="none" stroke="#fff" stroke-width="2" d="M1.091,61.086L0,0" class="caaImDgk_5"></path></g><style data-made-with="vivus-instant">.caaImDgk_0{stroke-dasharray:300 302;stroke-dashoffset:301;animation:caaImDgk_draw 357ms linear 0ms forwards;}.caaImDgk_1{stroke-dasharray:300 302;stroke-dashoffset:301;animation:caaImDgk_draw 357ms linear 357ms forwards;}.caaImDgk_2{stroke-dasharray:148 150;stroke-dashoffset:149;animation:caaImDgk_draw 176ms linear 714ms forwards;}.caaImDgk_3{stroke-dasharray:56 58;stroke-dashoffset:57;animation:caaImDgk_draw 67ms linear 891ms forwards;}.caaImDgk_4{stroke-dasharray:55 57;stroke-dashoffset:56;animation:caaImDgk_draw 66ms linear 958ms forwards;}.caaImDgk_5{stroke-dasharray:62 64;stroke-dashoffset:63;animation:caaImDgk_draw 74ms linear 1025ms forwards;}@keyframes caaImDgk_draw{100%{stroke-dashoffset:0;}}@keyframes caaImDgk_fade{0%{stroke-opacity:1;}91.83673469387755%{stroke-opacity:1;}100%{stroke-opacity:0;}}</style></svg>');
            }else{
                $("section#services .overlay .service_card.offer-1").find('img:not(.svg)').removeClass('d-none').addClass('d-block');
                $("section#services .overlay .service_card.offer-1").find('svg').remove();
                $("section#services .overlay .service_card.offer-2").find('img:not(.svg)').removeClass('d-none').addClass('d-block');
                $("section#services .overlay .service_card.offer-2").find('svg').remove();
                $("section#services .overlay .service_card.offer-3").find('img:not(.svg)').removeClass('d-none').addClass('d-block');
                $("section#services .overlay .service_card.offer-3").find('svg').remove();
            }

            $(window).resize(function(event) {
                $("section#services .overlay .service_card.offer-1").find('img:not(.svg)').removeClass('d-none').addClass('d-block');
                $("section#services .overlay .service_card.offer-1").find('svg').remove();
                $("section#services .overlay .service_card.offer-2").find('img:not(.svg)').removeClass('d-none').addClass('d-block');
                $("section#services .overlay .service_card.offer-2").find('svg').remove();
                $("section#services .overlay .service_card.offer-3").find('img:not(.svg)').removeClass('d-none').addClass('d-block');
                $("section#services .overlay .service_card.offer-3").find('svg').remove();
                if($(window).width() < 1200){
                    // offer 1
                    $("section#services .overlay .service_card.offer-1").find('img:not(.svg)').removeClass('d-block').addClass('d-none');
                    $("section#services .overlay .service_card.offer-1").find('img:not(.svg)').after('<svg xmlns="http://www.w3.org/2000/svg" width="109.576" height="109.576" viewBox="0 0 109.576 109.576" style=""><g id="Group_162" data-name="Group 162" transform="translate(0)"><g id="Group_124" data-name="Group 124" transform="translate(0 0)"><g id="Ellipse_1" data-name="Ellipse 1" transform="translate(0 0)" fill="none" stroke="#fff" stroke-width="2"><path stroke="none" d="M0,54.788A54.788,54.788 0,1,1 109.576,54.788A54.788,54.788 0,1,1 0,54.788" class="nWmtkppC_0"></path><path fill="none" d="M1,54.788A53.788,53.788 0,1,1 108.576,54.788A53.788,53.788 0,1,1 1,54.788" class="nWmtkppC_1"></path></g><path id="Path_4" data-name="Path 4" d="M112.432,105.643H24.2L68.122,29.522Z" transform="translate(-13.556 -25.302)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2" class="nWmtkppC_2"></path></g></g><style data-made-with="vivus-instant">.nWmtkppC_0{stroke-dasharray:345 347;stroke-dashoffset:346;animation:nWmtkppC_draw 1000ms linear 0ms forwards;}.nWmtkppC_1{stroke-dasharray:339 341;stroke-dashoffset:340;animation:nWmtkppC_draw 1000ms linear 0ms forwards;}.nWmtkppC_2{stroke-dasharray:265 267;stroke-dashoffset:266;animation:nWmtkppC_draw 1000ms linear 0ms forwards;}@keyframes nWmtkppC_draw{100%{stroke-dashoffset:0;}}@keyframes nWmtkppC_fade{0%{stroke-opacity:1;}92.3076923076923%{stroke-opacity:1;}100%{stroke-opacity:0;}}</style></svg>');
                    
                    // offer 2
                
                    $('section#services .overlay .service_card.offer-2').find('img:not(.svg)').removeClass('d-block').addClass('d-none');
                    $('section#services .overlay .service_card.offer-2').find('img:not(.svg)').after('<svg xmlns="http://www.w3.org/2000/svg" width="100.894" height="114.504" viewBox="0 0 100.894 114.504" style=""><g id="Group_125" data-name="Group 125" transform="translate(-279 -77.086)"><g id="Rectangle_1" data-name="Rectangle 1" transform="translate(279 105.822)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2"><path width="100.88" height="58.847" stroke="none" d="M0 0 L100.88 0 L100.88 58.847 L0 58.847 Z" class="eJefXUjB_0"></path><path width="98.88" height="56.847" fill="none" d="M1 1 L99.88 1 L99.88 57.847 L1 57.847 Z" class="eJefXUjB_1"></path></g><path id="Line_4" data-name="Line 4" transform="translate(330.141 163.968)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M0,0L0,26.621" class="eJefXUjB_2"></path><path id="Line_5" data-name="Line 5" transform="translate(279.549 78.5)" fill="none" stroke="#fff" stroke-width="2" d="M0,28.527L50.592,0" class="eJefXUjB_3"></path><path id="Line_6" data-name="Line 6" transform="translate(330.019 78.5)" fill="none" stroke="#fff" stroke-width="2" d="M0,0L49.373,28.527" class="eJefXUjB_4"></path><path id="Line_7" data-name="Line 7" transform="translate(330.141 163.968)" fill="none" stroke="#fff" stroke-width="2" d="M49.039,0L0,26.621" class="eJefXUjB_5"></path><path id="Line_8" data-name="Line 8" transform="translate(279.549 162.984)" fill="none" stroke="#fff" stroke-width="2" d="M50.592,27.606L0,0" class="eJefXUjB_6"></path><path id="Line_9" data-name="Line 9" transform="translate(330.141 78.5)" fill="none" stroke="#fff" stroke-width="2" d="M0,0L25.22,28.022" class="eJefXUjB_7"></path><path id="Line_10" data-name="Line 10" transform="translate(302.118 78.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M28.022,0L0,28.022" class="eJefXUjB_8"></path><path id="Line_11" data-name="Line 11" transform="translate(280.646 106.522)" fill="none" stroke="#fff" stroke-width="2" d="M21.473,0L0,56.461" class="eJefXUjB_9"></path><path id="Line_12" data-name="Line 12" transform="translate(302.819 105.822)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M26.621,57.446L0,0" class="eJefXUjB_10"></path><path id="Line_13" data-name="Line 13" transform="translate(330.141 106.522)" fill="none" stroke="#fff" stroke-width="2" d="M25.22,0L0,57.446" class="eJefXUjB_11"></path><path id="Line_14" data-name="Line 14" transform="translate(356.061 107.223)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2" d="M22.418,56.045L0,0" class="eJefXUjB_12"></path></g><style data-made-with="vivus-instant">.eJefXUjB_0{stroke-dasharray:320 322;stroke-dashoffset:321;animation:eJefXUjB_draw 287ms linear 0ms forwards;}.eJefXUjB_1{stroke-dasharray:312 314;stroke-dashoffset:313;animation:eJefXUjB_draw 279ms linear 287ms forwards;}.eJefXUjB_2{stroke-dasharray:27 29;stroke-dashoffset:28;animation:eJefXUjB_draw 25ms linear 566ms forwards;}.eJefXUjB_3{stroke-dasharray:59 61;stroke-dashoffset:60;animation:eJefXUjB_draw 53ms linear 592ms forwards;}.eJefXUjB_4{stroke-dasharray:58 60;stroke-dashoffset:59;animation:eJefXUjB_draw 52ms linear 645ms forwards;}.eJefXUjB_5{stroke-dasharray:56 58;stroke-dashoffset:57;animation:eJefXUjB_draw 50ms linear 698ms forwards;}.eJefXUjB_6{stroke-dasharray:58 60;stroke-dashoffset:59;animation:eJefXUjB_draw 52ms linear 749ms forwards;}.eJefXUjB_7{stroke-dasharray:38 40;stroke-dashoffset:39;animation:eJefXUjB_draw 34ms linear 802ms forwards;}.eJefXUjB_8{stroke-dasharray:40 42;stroke-dashoffset:41;animation:eJefXUjB_draw 36ms linear 837ms forwards;}.eJefXUjB_9{stroke-dasharray:61 63;stroke-dashoffset:62;animation:eJefXUjB_draw 55ms linear 873ms forwards;}.eJefXUjB_10{stroke-dasharray:64 66;stroke-dashoffset:65;animation:eJefXUjB_draw 58ms linear 929ms forwards;}.eJefXUjB_11{stroke-dasharray:63 65;stroke-dashoffset:64;animation:eJefXUjB_draw 57ms linear 987ms forwards;}.eJefXUjB_12{stroke-dasharray:61 63;stroke-dashoffset:62;animation:eJefXUjB_draw 55ms linear 1044ms forwards;}@keyframes eJefXUjB_draw{100%{stroke-dashoffset:0;}}@keyframes eJefXUjB_fade{0%{stroke-opacity:1;}91.83673469387755%{stroke-opacity:1;}100%{stroke-opacity:0;}}</style></svg>');
                                        
                    // offer 3
                    $('section#services .overlay .service_card.offer-3').find('img:not(.svg)').removeClass('d-block').addClass('d-none');
                    $('section#services .overlay .service_card.offer-3').find('img:not(.svg)').after('<svg xmlns="http://www.w3.org/2000/svg" width="103.848" height="120.601" viewBox="0 0 103.848 120.601" style=""><g id="Group_1" data-name="Group 1" transform="translate(-859.26 -464.097)"><path id="Path_1" data-name="Path 1" d="M101.255,87.167H.9L50.4,1.082Z" transform="translate(860.1 465)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2" class="caaImDgk_0"></path><path id="Path_2" data-name="Path 2" d="M.9,29H101.255L51.078,115.175Z" transform="translate(860.1 467.535)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2" class="caaImDgk_1"></path><path id="Path_3" data-name="Path 3" d="M73.614,72.04H24.2L48.8,29.522Z" transform="translate(862.434 467.474)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2" class="caaImDgk_2"></path><path id="Line_1" data-name="Line 1" transform="translate(861.545 527.624)" fill="none" stroke="#fff" stroke-width="2" d="M0,23.998L50.178,0" class="caaImDgk_3"></path><path id="Line_2" data-name="Line 2" transform="translate(911.723 527.624)" fill="none" stroke="#fff" stroke-width="2" d="M49.087,23.998L0,0" class="caaImDgk_4"></path><path id="Line_3" data-name="Line 3" transform="translate(910.632 466.538)" fill="none" stroke="#fff" stroke-width="2" d="M1.091,61.086L0,0" class="caaImDgk_5"></path></g><style data-made-with="vivus-instant">.caaImDgk_0{stroke-dasharray:300 302;stroke-dashoffset:301;animation:caaImDgk_draw 357ms linear 0ms forwards;}.caaImDgk_1{stroke-dasharray:300 302;stroke-dashoffset:301;animation:caaImDgk_draw 357ms linear 357ms forwards;}.caaImDgk_2{stroke-dasharray:148 150;stroke-dashoffset:149;animation:caaImDgk_draw 176ms linear 714ms forwards;}.caaImDgk_3{stroke-dasharray:56 58;stroke-dashoffset:57;animation:caaImDgk_draw 67ms linear 891ms forwards;}.caaImDgk_4{stroke-dasharray:55 57;stroke-dashoffset:56;animation:caaImDgk_draw 66ms linear 958ms forwards;}.caaImDgk_5{stroke-dasharray:62 64;stroke-dashoffset:63;animation:caaImDgk_draw 74ms linear 1025ms forwards;}@keyframes caaImDgk_draw{100%{stroke-dashoffset:0;}}@keyframes caaImDgk_fade{0%{stroke-opacity:1;}91.83673469387755%{stroke-opacity:1;}100%{stroke-opacity:0;}}</style></svg>');
                }
                else{
                    $("section#services .overlay .service_card.offer-1").find('img:not(.svg)').removeClass('d-none').addClass('d-block');
                    $("section#services .overlay .service_card.offer-1").find('svg').remove();
                    $("section#services .overlay .service_card.offer-2").find('img:not(.svg)').removeClass('d-none').addClass('d-block');
                    $("section#services .overlay .service_card.offer-2").find('svg').remove();
                    $("section#services .overlay .service_card.offer-3").find('img:not(.svg)').removeClass('d-none').addClass('d-block');
                    $("section#services .overlay .service_card.offer-3").find('svg').remove();
                }
            });
        } catch(e) {
            // statements
            console.log(e);
        }
    }  

    // we are tolking btn particles effent
    {
        try {
            (function() {
                    const bttn = document.querySelector('button.particles-button');
                    const bttnBack = document.querySelector('button.action');
                    
                    let particlesOpts = {
                        duration: 500,
                        easing: 'easeOutQuad',
                        speed: .1,
                        particlesAmountCoefficient: 10,
                        oscillationCoefficient: 80
                    };
                    particlesOpts.complete = () => {
                        if ( !buttonVisible ) {
                            anime.remove(bttnBack);
                            anime({
                                targets: bttnBack,
                                duration: 300,
                                easing: 'easeOutQuint',
                                opacity: 1,
                                scale: [0,1]
                            });
                            bttnBack.style.pointerEvents = 'auto';
                        }
                    };
                    const particles = new Particles(bttn, particlesOpts);
                    
                    let buttonVisible = true;
                    bttn.addEventListener('click', () => {
                        if ( !particles.isAnimating() && buttonVisible ) {
                            particles.disintegrate();
                            buttonVisible = !buttonVisible;
                        }
                    });
                    bttnBack.addEventListener('click', () => {
                        if ( !particles.isAnimating() && !buttonVisible ) {
                            particles.integrate({
                                duration: 800,
                                easing: 'easeOutSine'
                            });
                            buttonVisible = !buttonVisible;
                        }
                    });

                $('.modal, .modal-backdrop').click(function(event) {
                    setTimeout(()=>{
                           if(!$('.modal').hasClass('show')){
                            if ( !particles.isAnimating() && !buttonVisible ) {
                                particles.integrate({
                                    duration: 800,
                                    easing: 'easeOutSine'
                                });
                                buttonVisible = !buttonVisible;
                            }
                        } 
                    },1000)
                    
                });

            })();
        } catch(e) {
            // statements
            console.log(e);
        }
       
       try {
           (function() {
                const bttn = document.querySelector('button.particles-button2');
                const bttnBack = document.querySelector('button.action');

                
                let particlesOpts = {
                    duration: 500,
                    easing: 'easeOutQuad',
                    speed: .1,
                    particlesAmountCoefficient: 10,
                    oscillationCoefficient: 80
                };
                particlesOpts.complete = () => {
                    if ( !buttonVisible ) {
                        anime.remove(bttnBack);
                        anime({
                            targets: bttnBack,
                            duration: 300,
                            easing: 'easeOutQuint',
                            opacity: 1,
                            scale: [0,1]
                        });
                        bttnBack.style.pointerEvents = 'auto';
                    }
                };
                const particles = new Particles(bttn, particlesOpts);
                
                let buttonVisible = true;
                bttn.addEventListener('click', () => {
                    if ( !particles.isAnimating() && buttonVisible ) {
                        particles.disintegrate();
                        buttonVisible = !buttonVisible;
                    }
                });
                bttnBack.addEventListener('click', () => {
                    if ( !particles.isAnimating() && !buttonVisible ) {
                        particles.integrate({
                            duration: 800,
                            easing: 'easeOutSine'
                        });
                        buttonVisible = !buttonVisible;
                    }
                });
                 $('.modal, .modal-backdrop').click(function(event) {
                    setTimeout(()=>{
                           if(!$('.modal').hasClass('show')){
                            if ( !particles.isAnimating() && !buttonVisible ) {
                                particles.integrate({
                                    duration: 800,
                                    easing: 'easeOutSine'
                                });
                                buttonVisible = !buttonVisible;
                            }
                        } 
                    },1000)
                    
                });

            })();
       } catch(e) {
           // statements
           console.log(e);
       }
        
    } 

    // our clients silder
    {
        try {
            $('#ourClientes .owl-carousel').owlCarousel({
                loop: true,
                items: 6,
                margin: 10,
                responsiveClass: true,
                autoplay:true,
                autoplayTimeout: 4000,
                autoplayHoverPause:true,
                dots: false,
                dotsEach: false,
                responsive: {
                0: {
                  items: 3,
                  nav: false
                },
                600:{
                    items: 4,
                    nav: false
                },
                1200: {
                  items: 6,
                  nav: true,
                  margin: 30,
                  dots: false,
                  dotsEach: false
                }
              }
            });
            $('#ourClientes .owl-next').click(function() {
                $('#ourClientes .owl-carousel').trigger('next.owl.carousel');
            })
            $('#ourClientes .owl-prev').click(function() {
                $('#ourClientes .owl-carousel').trigger('prev.owl.carousel', [300]);
            });
        } catch(e) {
            // statements
            console.log(e);
        }
        
    }
    
    // portfolio responsive
    {
        try {
            let fltr_controls = $('#portfolio .simplefilter .fltr-controls');

            fltr_controls.click(function(event) {
                
                if(!$(this).hasClass('active')){
                    $('#portfolio .simplefilter .fltr-controls').removeClass('active');
                    $(this).addClass('active');
                    filterItems($(this).attr('data-filter'));
                }
            });
        
        } catch(e) {
            // statements
            console.log(e);
        }
        
        try {
            // portfolio hover effect
            {
                $('.portfolio_item').tilt({
                    glare: true,
                    maxGlare: .2
                });
                $('.zmdi').tilt({
                    scale: 1.2
                });
            }

        } catch(e) {
            // statements
            console.log(e);
        }

        function filterItems(group){
            let filtr_items = $('#portfolio .filtr-container .filtr-item');

            if(group != 'all'){
               for(let i = 0; i < filtr_items.length; i++ ){
                    let arrGroup = filtr_items.eq(i).attr('data-category').split(',');
                    let count = 0;
                    for(let j in arrGroup){
                        if(arrGroup[j] == group){
                            count++;
                        }
                    }
                    if(count > 0){
                        filtr_items.eq(i).show(800, function() {
                            filtr_items.eq(i).removeClass('close'); 
                        });
                    }else{
                        filtr_items.eq(i).hide(400, function() {
                            filtr_items.eq(i).addClass('close');
                        });
                    }
                } 
            }else{
                for(let i = 0; i < filtr_items.length; i++ ){
                    filtr_items.eq(i).show(800, function() {
                        filtr_items.eq(i).removeClass('close');
                    });
                } 
            }

            
        }

    }

    // footer form valid
    {

        try {
            $('.modal, .modal-backdrop').click(function(event) {
                for(var i = 0; i < $('#exampleModal form input').length; i++){
                    $('#exampleModal form input').eq(i).removeClass('error');
                    $('#exampleModal form input').eq(i).next('.modal-input-label').removeClass('error');
                }
                $('#exampleModal form .custom-control-input').removeClass('error');
                
            });
            $('#exampleModal form').submit(function(event) {
                var count = 0;
                for(var i = 0; i < $('#exampleModal form input').length; i++){
                    if(!$('#exampleModal form input').eq(i).val()){
                        $('#exampleModal form input').eq(i).addClass('error');
                        $('#exampleModal form input').eq(i).next('.modal-input-label').addClass('error');
                        count++;
                    }else{
                        $('#exampleModal form input').eq(i).removeClass('error');
                        $('#exampleModal form input').eq(i).next('.modal-input-label').removeClass('error');
                    }
                }
                console.log($('#exampleModal form .custom-control-input'))
                if(!$('#exampleModal form .custom-control-input').prop( "checked")){
                    $('#exampleModal form .custom-control-input').addClass('error');
                    count++;
                }
                if(count == 0){
                    return true;
                }else {
                    return false;
                }
            });
        } catch(e) {
            // statements
            console.log(e);
        }
        
    }

    // portfolio Book Silde down
    {
        try {
            var bookScrollTop = $('section#content .portfolio-box-content-start');
            var topNewNumber = bookScrollTop.css('top');
            var translateX = 5;
            if ($(window).width() > 992) {
                if($(window).scrollTop() > 100){
                    topNewNumber = 0;
                    bookScrollTop.css('top', topNewNumber + 'px');
                    bookScrollTop.children('.box').css('transform', 'translateX(' + 32 + '%)');
                }
                if($(window).scrollTop() < 100){
                    bookScrollTop.css('top','-195px');
                    topNewNumber = -195;
                    bookScrollTop.children('.box').css('transform', 'translateX(0%)');
                }
            }else{
                bookScrollTop.css('top','0px');
                bookScrollTop.children('.box').css('transform', 'translateX(0%)');
            }
            topNewNumber = parseInt(topNewNumber);
            $(window).scroll(function(event) {
                if ($(this).width() > 992) {
                    if($(this).scrollTop() > 100 && topNewNumber <= 0){
                        topNewNumber += 20;
                        bookScrollTop.css('top', topNewNumber + 'px');
                        bookScrollTop.children('.box').css('transform', 'translateX(' + translateX + '%)');
                        if(translateX >= 32){
                           translateX = 32;
                        }else{
                           translateX += 10;
                        }
                    }
                    if($(this).scrollTop() < 100){
                        bookScrollTop.css('top','-195px');
                        topNewNumber = -195;
                        translateX = 5;
                        bookScrollTop.children('.box').css('transform', 'translateX(0%)');
                    }
                }
            });
            
            $(window).resize(function(event) {
                if ($(window).width() > 992) {
                    if($(window).scrollTop() > 100){
                        topNewNumber = 0;
                        bookScrollTop.css('top', topNewNumber + 'px');
                        bookScrollTop.children('.box').css('transform', 'translateX(' + 32 + '%)');
                    }
                    if($(window).scrollTop() < 100){
                        bookScrollTop.css('top','-195px');
                        topNewNumber = -195;
                        bookScrollTop.children('.box').css('transform', 'translateX(0%)');
                    }
                }else{
                    bookScrollTop.css('top','0px');
                    bookScrollTop.children('.box').css('transform', 'translateX(0%)');
                }
            });

        } catch(e) {
            // statements
            console.log(e);
        }
    }

    // portfolio Gallery Slider eTatev slider
    {
        $('.slider-by-etatev .slider-by-etatev-body').height($('.slider-by-etatev .slider-by-etatev-body >li>img').height());

        $(window).resize(function(event) {
           $('.slider-by-etatev .slider-by-etatev-body').height($('.slider-by-etatev .slider-by-etatev-body >li>img').height());
        });
        var i = 0;
        var f = "first-et", t = "two-et", th = "three-et", a = "all-et", m = "move-et", mr = "move-r-et";
        var imgArray = $('.slider-by-etatev-body > li');
        var n = imgArray.length;

        imgArray.eq(0).addClass(f);
        imgArray.eq(1).addClass(t);
        imgArray.eq(2).addClass(th);

        for(var q = 3; q < n; q++){
            imgArray.eq(q).addClass(a);
        }

        $('.slider-by-etatev .nowShow').text(i+1);
        $('.slider-by-etatev .sliderLength').text(n);

        $('.slider-by-etatev-next').click(function(event) {
            if(i < n - 1){
                if(i <= n - 1 && i > -1 ) $('.slider-by-etatev-prev').removeClass('stop');

                imgArray.eq(i).addClass(m);
                setTimeout(()=>{
                    $('.slider-by-etatev-body > li.move-et').removeClass(f).removeClass(m).addClass(a);
                }, 500);
                imgArray.eq(i+1).addClass(f).removeClass(t);
                imgArray.eq(i+2).addClass(t).removeClass(th);
                imgArray.eq(i+3).addClass(th).removeClass(a);
                i++;
                $('.slider-by-etatev .nowShow').text(i+1);
                if(i == n - 1) $(this).addClass('stop');
            }
        });

        $('.slider-by-etatev-prev').click(function(event) {
            if(i <= n - 3 && i > 0){
                if(i >= 0 && i < n) $('.slider-by-etatev-next').removeClass('stop');
                imgArray.eq(i - 1).removeClass(a).addClass(f).addClass(mr);
                setTimeout(()=>{
                    $('.slider-by-etatev-body > li.move-r-et').removeClass(mr);
                }, 500);
                imgArray.eq(i).addClass(t).removeClass(f);
                imgArray.eq(i+1).addClass(th).removeClass(t);
                imgArray.eq(i+2).addClass(a).removeClass(th);
                $('.slider-by-etatev .nowShow').text(i--);
                if(i == 0) $(this).addClass('stop');
            }

            if(i == n - 2){
                $('.slider-by-etatev-next').removeClass('stop');
                imgArray.eq(i - 1).removeClass(a).addClass(f).addClass(mr);
                setTimeout(()=>{
                    $('.slider-by-etatev-body > li.move-r-et').removeClass(mr);
                }, 500);
                imgArray.eq(i).addClass(t).removeClass(f);
                imgArray.eq(i+1).addClass(th).removeClass(t);

                $('.slider-by-etatev .nowShow').text(i--);
                if(i == 0) $(this).addClass('stop');
            }else if(i == n - 1){
                $('.slider-by-etatev-next').removeClass('stop');
                imgArray.eq(i - 1).removeClass(a).addClass(f).addClass(mr);
                setTimeout(()=>{
                    $('.slider-by-etatev-body > li.move-r-et').removeClass(mr);
                }, 500);
                imgArray.eq(i).addClass(t).removeClass(f);

                $('.slider-by-etatev .nowShow').text(i--);
                if(i == 0) $(this).addClass('stop');
            }
        });
    }
    // Video
    $(".postcontentwrap iframe").wrap('<div class="videowrapper">');

});

