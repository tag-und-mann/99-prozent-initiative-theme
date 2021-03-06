function update_cards_height($){
    setTimeout(function () {
        $('.card-container').matchHeight({byRow: false});
    }, 300);
}

// single post - mob - if first tag is h1...h6, add class to get margin-top 0
jQuery( function( $ ) {

    let single_main_content = $('.single-main-content');

    single_main_content_heading_mt();

    $(window).resize(function(){
        single_main_content_heading_mt();
    });

    function single_main_content_heading_mt() {
        if(single_main_content.length > 0){
            if(document.getElementsByClassName("single-main-content")[0].firstElementChild.tagName === 'H1' ||
                document.getElementsByClassName("single-main-content")[0].firstElementChild.tagName === 'H2' ||
                document.getElementsByClassName("single-main-content")[0].firstElementChild.tagName === 'H3' ||
                document.getElementsByClassName("single-main-content")[0].firstElementChild.tagName === 'H4' ||
                document.getElementsByClassName("single-main-content")[0].firstElementChild.tagName === 'H5' ||
                document.getElementsByClassName("single-main-content")[0].firstElementChild.tagName === 'H6'
            ){
                $(document.getElementsByClassName("single-main-content")[0].firstElementChild).addClass('first-heading');
            }
        }
    }

});

// acf argumente blocks
jQuery( function( $ ) {
    let argumenteBlocks = $('.argumente-gutenberg-block');

    $(argumenteBlocks[0]).addClass('argumente-gutenberg-block-first');
});

// home argumente block
jQuery( function( $ ) {
    $('.argument').matchHeight({byRow: false});

    let argument_block_h = '';

    $('.argument-btn .open a, .argument-btn .close a').click(function (event) {
        event.preventDefault();

        let argument_style_attr = $('.argument').attr('style');

        if (argument_style_attr && argument_style_attr.indexOf("height") >= 0){
            let temp = argument_style_attr.split(' ')[1];
            argument_block_h = temp.split('px')[0];
        }

        $(this).parents('.argument').removeAttr('style');
        $(this).parents('.argument').toggleClass('active');
        $(this).parents('.argument').attr('style', 'min-height: ' + argument_block_h + 'px');

        if(!$(this).parents('.argument').hasClass('active')){
            $(this).parents('.argument').attr('style', 'height: ' + argument_block_h + 'px');
        }
    });
});

// navigation and languages switcher
jQuery( function( $ ) {
    let scrollH = $(this).scrollTop();
    let nav = $('nav');
    let nav_lis = nav.find('li');

    nav_lis.each(function( index, value ) {
        if(!$(value).hasClass('menu-item-has-children')){
            $(value).find('a').addClass('no-tick');
        }
    });

    $('.mobile-menu .menu ul li').each(function( index, value ) {
        if(!$(value).hasClass('menu-item-has-children')){
            $(value).find('a').addClass('no-tick');
        }
    });

    navBG(scrollH);

    $(window).scroll(function(event){

        navBG($(this).scrollTop());
    });

    function navBG(scrollH) {
        if(scrollH > 10){
            nav.addClass('nav-white-bg');
        }else{
            nav.removeClass('nav-white-bg');
        }
    }

    $('.burger-close').on('click', function (event) {
        $('.mobile-menu').fadeOut();


        if($('.overlay-container').css('top')!== '0px'){
            $('html').removeAttr('style');
        }
    });

    $('.burger-open').on('click', function (event) {
        $('.mobile-menu').fadeIn();
        $('html').css('overflow-x', 'unset');
    });

    $('footer, .mobile-menu, footer').on('click', function (event) {
        let lang_switcer = $('.wpml-ls-legacy-dropdown .wpml-ls-sub-menu');

        lang_switcer.css('visibility', 'hidden');
        lang_switcer.removeAttr('style');
    });

});

// matchHeight for cards
jQuery( function( $ ) {
    $('.card-container').matchHeight({byRow: false});

    $(window).resize(function(){
        $('.card-container').matchHeight({byRow: false});
    });
});

// home: show more logos
jQuery( function( $ ) {
    $('.logos-more-btn').on('click', function (event) {
        event.preventDefault();

        let logos = $('.logos-mob').find('.logo.logo-hidden');

        logos.each(function (key, value) {
            if(key < 3){
                $(value).fadeIn(function () {
                    $(value).removeClass('logo-hidden');
                });
            }
        });

        if(logos.length <=3 ){
            $('.logos-mob').find('.link').css('display', 'none');
        }
    });
});

// single post - top triagnle gradient
jQuery( function( $ ) {
    let points = $('.single-triangle-top.single-triangle-top-desk').find('stop');
    let single_sidebar = $('.single-sidebar');

    if(single_sidebar.length && single_sidebar.css('display') === 'block'){
        single_top_triangle_gradient();
    }

    $(window).resize(function(){
        if(single_sidebar.length && single_sidebar.css('display') === 'block'){
            single_top_triangle_gradient();
        }
    });

    function single_top_triangle_gradient() {
        let sidebar_start_px = single_sidebar.offset().left;
        let sidebar_end_px = single_sidebar.outerWidth();
        let body_width_px = $('body').outerWidth();

        let sidebar_start = sidebar_start_px * 100 / body_width_px;
        let sidebar_end = sidebar_start + sidebar_end_px * 100 / body_width_px;

        $(points[1]).attr('offset', sidebar_start + '%');
        $(points[2]).attr('offset', sidebar_start + '%');
        $(points[3]).attr('offset', sidebar_end + '%');
        $(points[4]).attr('offset', sidebar_end + '%');
    }
});

// formidable
jQuery( function( $ ) {
    let form_checkboxes = $('.form').find('.form_checkbox');

    // change label for title in home page newsletter section

    let home_newsletter_section = $('.home-newsletter-block');

    if(home_newsletter_section.length > 0){
        let home_newsletter_section_label = home_newsletter_section.find('.form_checkbox label').attr('for');

        home_newsletter_section.find('.form_checkbox label').attr('for', home_newsletter_section_label + '1');
        home_newsletter_section.find('.form_checkbox label input').attr('id', home_newsletter_section_label + '1');
    }

    form_checkboxes.each(function (key, value) {
        $(value).addClass('form-inputs-checkbox').find('label').addClass('checkbox-container').append('<span class="checkmark"></span>');
    });

    var x, i, j, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("form-select");
    for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < selElmnt.length; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        for (k = 0; k < y.length; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].insertBefore(b, x[i].childNodes[0]);
        x[i].insertBefore(a, x[i].childNodes[0]);
        a.addEventListener("click", function(e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
            $(this).parents('.form-select').find('.frm_error').css('display', 'none');
        });
    }

    function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);


    $('.open-btn-block').click(function () {
        $('.home-newsletter-block').find('.form').fadeIn();
        $(this).css('display', 'none');
    });

    $('.close-btn-block').click(function () {
        $('.home-newsletter-block').find('.form').fadeOut(function () {
            $('.open-btn-block').fadeIn();
        });
    });

    $(window).resize(function(){
        if($('.burger-open').css('display') === 'none'){
            $('.home-newsletter-block').find('.form').removeAttr('style');
            $('.open-btn-block').removeAttr('style');
        }
    });

});

// overlay forms
jQuery( function( $ ) {
    let schliesen = 'Schliessen';

    if(economiesuisseData.language === 'fr'){
        schliesen = 'Fermez le site';
    }

    if(economiesuisseData.language === 'it'){
        schliesen = 'Chiudere';
    }

    $('.overlay-container .form .frm_submit').append('<div class="form-close-btn">' + schliesen + '</div>');


    $('.overlay-open').click(function (event) {
        event.preventDefault();

        let type = $(this).data('type');

        $('.overlay-container .' + type).css('display', 'block');

        $('body').addClass('body-no-scroll');
        $('html').css('overflow-x', 'unset');

        $('.overlay-container').animate({
            top: '0',
        }, 300);
    });



    $('.overlay-container .overlay-close, .overlay-container .form-close-btn').click(function (event) {
        event.preventDefault();

        $('.overlay-container').animate({
            top: '100%',
        }, 300, function () {
            $('body').removeClass('body-no-scroll');
            $('html').removeAttr('style');

            $('.overlay-container .newsletter').css('display', 'none');
            $('.overlay-container .komitee').css('display', 'none');
            $('.overlay-container .testimonial').css('display', 'none');
        });
    });
});






// posts filter menu - open/close - desktop
jQuery( function( $ ) {

    let filters_menu = $('.filters-hidden');

    $('body').on('click', '.open-posts-filter-menu', function(event) {
        event.preventDefault();

        filters_menu.fadeIn();
    });

    $('body').on('click', '.close-posts-filter-menu', function(event) {
        event.preventDefault();

        filters_menu.fadeOut();
    });
});

// posts - filter icon position - open/close - mob
jQuery( function( $ ) {
    let scrollH = $(this).scrollTop();
    let filters_icon = $('.aktuell-filters-mob-icon');
    let filters_menu_mob = $('.aktuell-nav-mob');

    filtersIconSticky(scrollH);

    $(window).scroll(function(event){

        filtersIconSticky($(this).scrollTop());
    });

    function filtersIconSticky(scrollH) {

        if(filters_menu_mob.length > 0) {

            if (scrollH >  $('.aktuell-posts-mob').offset().top / 3 && scrollH < $('.link-container-mob').offset().top - window.innerHeight + 130) {
                filters_icon.addClass('sticky');
            }

            if (scrollH > $('.link-container-mob').offset().top - window.innerHeight + 130 || scrollH < $('.aktuell-posts-mob').offset().top / 3) {
                filters_icon.removeClass('sticky');
            }
        }
    }



    $('body').on('click', '.aktuell-filters-mob-icon', function(event) {
        event.preventDefault();

        filters_menu_mob.fadeIn();
        filters_icon.css('display', 'none');
    });

    $('body').on('click', '.close-posts-filter-menu-mob', function(event) {
        event.preventDefault();

        filters_menu_mob.fadeOut();
        filters_icon.removeAttr('style');
    });

    $('body').on('click', '.aktuell-nav-mob .show-tags p', function(event) {
        event.preventDefault();

        $('.aktuell-nav-mob .all-tags').toggleClass('all-tags-visible');
        $('.aktuell-nav-mob .show-tags p').toggleClass('active');
        $('.aktuell-nav-mob .show-tags .fa-angle-down').toggleClass('visible');
        $('.aktuell-nav-mob .show-tags .fa-angle-up').toggleClass('visible');
        $('.aktuell-nav-mob .filters').toggleClass('filter-paddings-smaller');
    });

    $(window).resize(function(){
        if($('.aktuell-posts-mob').css('display') === 'none') {
            $('.aktuell-nav-mob .all-tags').removeClass('all-tags-visible');
            $('.aktuell-nav-mob .show-tags p').toggleClass('active');
            $('.aktuell-nav-mob .show-tags .fa-angle-down').removeClass('visible');
            $('.aktuell-nav-mob .show-tags .fa-angle-up').addClass('visible');
            $('.aktuell-nav-mob .filters').removeClass('filter-paddings-smaller');
            filters_icon.removeAttr('style');
            filters_menu_mob.removeAttr('style');
        }
    });
});



// ajax - posts - desktop
// ajax - get more posts
jQuery( function( $ ) {
    $('body').on('click', '.get-more-posts a', function(event) {
        event.preventDefault();

        let cards = $('.aktuell-posts .card-simple');

        let ids = '';

        $.each( cards, function( key, value ) {
            ids += $(value).data('id') + ',';
        });


        let data = {
            action: 'getMorePosts',
            ids: ids,
            max_posts: max_posts,
            last_img_post: $(cards[cards.length - 1]).data('img'),
            last_counter: $(cards[cards.length - 1]).data('counter'),
            lang: economiesuisseData.language
        };

        $.ajax({
            beforeSend: function() {
                $('.posts-loader').css('display', 'block');
                $('.get-more-posts a').css('display', 'none');
            },
            url: economiesuisseData.ajax_url,
            type: 'POST',
            data: data,
            async: true,
            dataType: "json",
            success: function (res) {

                $('.posts-loader').css('display', 'none');

                $('.aktuell-posts').append(res.output);

                update_cards_height($);

                if(res.count === 1){
                    $('.get-more-posts a').css('display', 'inline-block');
                }

            }
        });
    });
});

// ajax - get filtered posts by tag or search input value
jQuery( function( $ ) {
    let default_posts = $('.aktuell-posts').html();
    let show_default_more_btn = $('.get-more-posts a').hasClass('show-more-btn');
    let old_max_posts = max_posts;


    $('body').on('click', '.filter-tag', function(event) {
        event.preventDefault();

        let temp = $(this).attr('data-filter');
        $(this).attr('data-filter', temp === '0' ? 1 : 0);
        $(this).toggleClass('selected');

        getFilteredInputSearchResults()
    });


    let searchValue = '';
    let searchEl = $('.aktuell-nav .search input');
    let timer;

    $('body').on('keydown', '.aktuell-nav .search input', function(event) {
        if(searchValue === searchEl.val().trim()){
            return;
        }

        $('.loader-fade-block').css('display', 'block');
    });


    $('body').on('keyup', '.aktuell-nav .search input', function(event) {

        if(searchValue === searchEl.val().trim()){
            return;
        }

        clearTimeout(timer);

        timer = setTimeout(getFilteredInputSearchResults, 500);

        searchValue = searchEl.val();

    });

    function getFilteredInputSearchResults() {

        let tags = $('.filter-tag[data-filter="1"]');
        let tags_ids = '';

        $.each(tags, function (key, value) {
            tags_ids += $(value).data('id') + ',';
        });

        let data = {
            action: 'getFilteredPosts',
            tags_ids: tags_ids,
            search: searchEl.val().trim(),
            lang: economiesuisseData.language
        };


        if(searchEl.val().trim().length  > 0 || tags.length > 0) {

            if(tags.length > 0) {
                $('.aktuell-nav .filters-count').text('(' + tags.length + ')');
                $('.open-posts-filter-menu .filters-count').text('(' + tags.length + ')');
            }

            $.ajax({
                beforeSend: function () {
                    $('.posts-loader').css('display', 'block');
                    $('.get-more-posts').removeClass('get-more-posts').addClass('get-more-filtered-posts');
                    $('.get-more-filtered-posts a').css('display', 'none');

                    $('.loader-fade-block').css('display', 'block');
                },
                url: economiesuisseData.ajax_url,
                type: 'POST',
                data: data,
                async: true,
                dataType: "json",
                success: function (res) {

                    max_posts = res.max_posts;
                    $('.loader-fade-block').css('display', 'none');
                    $('.posts-loader').css('display', 'none');

                    $('.aktuell-posts').html(res.output);

                    update_cards_height($);


                    if (res.count === 1) {
                        $('.get-more-filtered-posts a').css('display', 'inline-block');
                    }
                }
            });

        }else{

            $('.aktuell-nav .filters-count').text('');
            $('.open-posts-filter-menu .filters-count').text('');

            $('.loader-fade-block').css('display', 'none');

            $('.aktuell-posts').html(default_posts);
            max_posts = old_max_posts;
            $('.get-more-filtered-posts').removeClass('get-more-filtered-posts').addClass('get-more-posts');

            if(show_default_more_btn){
                $('.get-more-posts a').css('display', 'inline-block');
            }

            update_cards_height($);
        }
    }
});

// ajax - get more filtered posts
jQuery( function( $ ) {
    $('body').on('click', '.get-more-filtered-posts a', function(event) {
        event.preventDefault();

        let cards = $('.aktuell-posts .card-simple');

        let ids = '';

        $.each( cards, function( key, value ) {
            ids += $(value).data('id') + ',';
        });


        let temp = $(this).attr('data-filter');
        $(this).attr('data-filter', temp === '0' ? 1 : 0);
        $(this).toggleClass('selected');

        let tags = $('.filter-tag[data-filter="1"]');
        let tags_ids = '';

        $.each(tags, function (key, value) {
            tags_ids += $(value).data('id') + ',';
        });

        let data = {
            action: 'getMoreFilteredPosts',
            tags_ids: tags_ids,
            ids: ids,
            search: $('.aktuell-nav .search input').val(),
            max_posts: max_posts,
            last_img_post: $(cards[cards.length - 1]).data('img'),
            last_counter: $(cards[cards.length - 1]).data('counter'),
            lang: economiesuisseData.language
        };


        $.ajax({
            beforeSend: function() {
                $('.posts-loader').css('display', 'block');
                $('.get-more-filtered-posts a').css('display', 'none');
            },
            url: economiesuisseData.ajax_url,
            type: 'POST',
            data: data,
            async: true,
            dataType: "json",
            success: function (res) {

                $('.posts-loader').css('display', 'none');

                $('.aktuell-posts').append(res.output);

                update_cards_height($);

                if(res.count === 1){
                    $('.get-more-filtered-posts a').css('display', 'inline-block');
                }
            }
        });
    });
});



// ajax - posts - mob
// ajax - get more posts - mob
jQuery( function( $ ) {
    $('body').on('click', '.get-more-posts-mob a', function(event) {
        event.preventDefault();

        let cards = $('.aktuell-posts-mob .card-simple');

        let ids = '';

        $.each( cards, function( key, value ) {
            ids += $(value).data('id') + ',';
        });


        let data = {
            action: 'getMorePostsMob',
            ids: ids,
            max_posts: max_posts_mob,
            last_counter: $(cards[cards.length - 1]).data('counter'),
            lang: economiesuisseData.language
        };

        $.ajax({
            beforeSend: function() {
                $('.posts-loader').css('display', 'block');
                $('.get-more-posts-mob a').css('display', 'none');
            },
            url: economiesuisseData.ajax_url,
            type: 'POST',
            data: data,
            async: true,
            dataType: "json",
            success: function (res) {

                $('.posts-loader').css('display', 'none');

                $('.aktuell-posts-mob').append(res.output);

                update_cards_height($);

                if(res.count === 1){
                    $('.get-more-posts-mob a').css('display', 'inline-block');
                }
            }
        });
    });
});

// ajax - get filtered posts by tag or search input value - mob
jQuery( function( $ ) {
    let default_posts = $('.aktuell-posts-mob').html();
    let show_default_more_btn = $('.get-more-posts-mob a').hasClass('show-more-btn');
    let old_max_posts = max_posts_mob;


    $('body').on('click', '.filter-tag-mob', function(event) {
        event.preventDefault();

        let temp = $(this).attr('data-filter');
        $(this).attr('data-filter', temp === '0' ? 1 : 0);
        $(this).toggleClass('selected');

        getFilteredInputSearchResultsMob()
    });


    let searchValue = '';
    let searchEl = $('.aktuell-nav-mob .search input');
    let timer;

    $('body').on('keydown', '.aktuell-nav-mob .search input', function(event) {
        if(searchValue === searchEl.val().trim()){
            return;
        }

        $('.loader-fade-block').css('display', 'block');
    });


    $('body').on('keyup', '.aktuell-nav-mob .search input', function(event) {

        if(searchValue === searchEl.val().trim()){
            return;
        }

        clearTimeout(timer);

        timer = setTimeout(getFilteredInputSearchResultsMob, 500);

        searchValue = searchEl.val();

    });

    function getFilteredInputSearchResultsMob() {

        let tags = $('.filter-tag-mob[data-filter="1"]');
        let tags_ids = '';

        $.each(tags, function (key, value) {
            tags_ids += $(value).data('id') + ',';
        });

        let data = {
            action: 'getFilteredPostsMob',
            tags_ids: tags_ids,
            search: searchEl.val().trim(),
            lang: economiesuisseData.language
        };


        if(searchEl.val().trim().length  > 0 || tags.length > 0) {

            if(tags.length > 0) {
                $('.aktuell-nav-mob .filters-count').text('(' + tags.length + ')');
            }

            $.ajax({
                beforeSend: function () {
                    $('.posts-loader').css('display', 'block');
                    $('.get-more-posts-mob').removeClass('get-more-posts-mob').addClass('get-more-filtered-posts-mob');
                    $('.get-more-filtered-posts-mob a').css('display', 'none');

                    $('.loader-fade-block').css('display', 'block');
                },
                url: economiesuisseData.ajax_url,
                type: 'POST',
                data: data,
                async: true,
                dataType: "json",
                success: function (res) {

                    max_posts_mob = res.max_posts;
                    $('.loader-fade-block').css('display', 'none');
                    $('.posts-loader').css('display', 'none');

                    $('.aktuell-posts-mob').html(res.output);

                    update_cards_height($);

                    $('html,body').animate({
                        scrollTop: $('#aktuell-posts-mob').offset().top - 84
                    });

                    if (res.count === 1) {
                        $('.get-more-filtered-posts-mob a').css('display', 'inline-block');
                    }

                 }
            });

        }else{

            $('.aktuell-nav-mob .filters-count').text('');

            $('.loader-fade-block').css('display', 'none');

            $('.aktuell-posts-mob').html(default_posts);

            max_posts_mob = old_max_posts;

            $('.get-more-filtered-posts-mob').removeClass('get-more-filtered-posts-mob').addClass('get-more-posts-mob');

            if(show_default_more_btn){
                $('.get-more-posts-mob a').css('display', 'inline-block');
            }

            update_cards_height($);

            $('html,body').animate({
                scrollTop: $('#aktuell-posts-mob').offset().top - 84
            });
        }
    }
});

// ajax - get more filtered posts - mob
jQuery( function( $ ) {
    $('body').on('click', '.get-more-filtered-posts-mob a', function(event) {
        event.preventDefault();

        let cards = $('.aktuell-posts-mob .card-simple');

        let ids = '';

        $.each( cards, function( key, value ) {
            ids += $(value).data('id') + ',';
        });


        let temp = $(this).attr('data-filter');
        $(this).attr('data-filter', temp === '0' ? 1 : 0);
        $(this).toggleClass('selected');

        let tags = $('.filter-tag-mob[data-filter="1"]');
        let tags_ids = '';

        $.each(tags, function (key, value) {
            tags_ids += $(value).data('id') + ',';
        });

        let data = {
            action: 'getMoreFilteredPostsMob',
            tags_ids: tags_ids,
            ids: ids,
            search: $('.aktuell-nav-mob .search input').val(),
            max_posts: max_posts_mob,
            last_counter: $(cards[cards.length - 1]).data('counter'),
            lang: economiesuisseData.language
        };


        $.ajax({
            beforeSend: function() {
                $('.posts-loader').css('display', 'block');
                $('.get-more-filtered-posts-mob a').css('display', 'none');
            },
            url: economiesuisseData.ajax_url,
            type: 'POST',
            data: data,
            async: true,
            dataType: "json",
            success: function (res) {

                $('.posts-loader').css('display', 'none');

                $('.aktuell-posts-mob').append(res.output);

                update_cards_height($);

                if(res.count === 1){
                    $('.get-more-filtered-posts-mob a').css('display', 'inline-block');
                }
            }
        });
    });
});





// ajax - get filtered persons - desk
jQuery( function( $ ) {
    let personsEl = $('.persons');
    let default_persons = personsEl.html();

    let searchVorname = $('.komitee-nav .vorname input');
    let searchNachname = $('.komitee-nav .nachname input');
    let searchFunktion = $('.komitee-nav .funktion input');
    let searchPartei = $('.komitee-nav .partei input');
    let searchort = $('.komitee-nav .ort input');
    let searchGeneral = $('.komitee-nav .search input');

    let searchVornameVal = '';
    let searchNachnameVal = '';
    let searchFunktionVal = '';
    let searchParteiVal = '';
    let searchortVal = '';
    let searchGeneralVal = '';

    let timerPersons;

    $('body').on('keydown', '.komitee-nav input', function(event) {
        $('.komitee-mitglieders-container .loader-fade-block').css('display', 'block');
    });


    $('body').on('keyup', '.komitee-nav input', function(event) {

        if($('.komitee-nav .search input').val() !== '' && $($(':focus')[0]).data('type') === 'additional'){
            clearMainFields();
        }else{
            clearAditionFields();
        }

        clearTimeout(timerPersons);

        timerPersons = setTimeout(getFilteredPersonsSearchResults, 500);
    });


    function getFilteredPersonsSearchResults() {

        searchVornameVal = searchVorname.val().trim();
        searchNachnameVal = searchNachname.val().trim();
        searchFunktionVal = searchFunktion.val().trim();
        searchParteiVal = searchPartei.val().trim();
        searchortVal = searchort.val().trim();
        searchGeneralVal = searchGeneral.val().trim();


        let data = {
            action: 'getFilteredPersons',
            mainSearch: {
                vorname: searchVorname.val().trim(),
                nachname: searchNachname.val().trim(),
                funktion: searchFunktion.val().trim(),
                partei: searchPartei.val().trim(),
                ort: searchort.val().trim(),
            },
            generalText: searchGeneral.val().trim(),
            lang: economiesuisseData.language
        };


        if(!is_all_person_search_fields_empty(searchVornameVal, searchNachnameVal, searchFunktionVal, searchParteiVal, searchortVal, searchGeneralVal)) {

            $.ajax({
                beforeSend: function () {
                    $('.komitee-mitglieders-container .loader-fade-block').css('display', 'block');
                },
                url: economiesuisseData.ajax_url,
                type: 'POST',
                data: data,
                async: true,
                dataType: "json",
                success: function (res) {

                    $('.komitee-mitglieders-container .loader-fade-block').css('display', 'none');

                    personsEl.slick('unslick');

                    personsEl.html(res.output);

                    persons_slider($);

                }
            });

        }else{
            $('.komitee-mitglieders-container .loader-fade-block').css('display', 'none');

            personsEl.slick('unslick');

            personsEl.html(default_persons);

            persons_slider($);
        }
    }

    function is_all_person_search_fields_empty(searchVorname, searchNachname, searchFunktion, searchPartei, searchort, searchGeneral) {
        if(searchVorname.length === 0 && searchNachname.length === 0 && searchFunktion.length === 0 && searchPartei.length === 0 && searchort.length === 0 && searchGeneral.length === 0){
            return true;
        }

        return false;
    }

    function clearMainFields() {
        searchVorname.val('');
        searchNachname.val('');
        searchFunktion.val('');
        searchPartei.val('');
        searchort.val('');
    }

    function clearAditionFields() {
        searchGeneral.val('');
    }

});


// ajax - get more persons - mob
jQuery( function( $ ) {
    let searchGeneral = $('.komitee-nav-mob .search input');
    let personsEl = $('.persons-mob');

    $('body').on('click', '.get-more-persons-mob a', function (event) {
        event.preventDefault();

        let searchGeneralVal = searchGeneral.val().trim();

        let persons = $('.komitee-persons-mob .person-block-container');

        let ids = '';

        $.each( persons, function( key, value ) {
            ids += $(value).data('id') + ',';
        });


        let data = {
            action: 'getPersonsMob',
            generalText: searchGeneralVal,
            ids: ids,
            mainSearch: {
                vorname: '',
                nachname: '',
                funktion: '',
                partei: '',
                ort: '',
            },
            lang: economiesuisseData.language
        };


        $.ajax({
            beforeSend: function () {
                $('.komitee-mitglieders-container-mob .posts-loader').css('display', 'block');
                $('.get-more-persons-mob a').addClass('hide-more-btn').removeClass('show-more-btn');
            },
            url: economiesuisseData.ajax_url,
            type: 'POST',
            data: data,
            async: true,
            dataType: "json",
            success: function (res) {

                $('.komitee-mitglieders-container-mob .posts-loader').css('display', 'none');

                personsEl.append(res.output);

                if (res.count === 1) {
                    $('.get-more-persons-mob a').removeClass('hide-more-btn').addClass('show-more-btn');
                }
            }
        });
    });
});

// ajax - get filtered persons - mob
jQuery( function( $ ) {
    let personsEl = $('.persons-mob');
    let default_persons = personsEl.html();
    let default_persons_btn_status = $('.get-more-persons-mob a').hasClass('show-more-btn');

    let searchGeneral = $('.komitee-nav-mob .search input');

    let searchGeneralVal = '';

    let timerPersons;

    $('body').on('keydown', '.komitee-nav-mob input', function(event) {
        $('.komitee-mitglieders-container-mob .loader-fade-block').css('display', 'block');
    });


    $('body').on('keyup', '.komitee-nav-mob input', function(event) {

        clearTimeout(timerPersons);

        timerPersons = setTimeout(getFilteredPersonsSearchResultsMob, 500);
    });


    function getFilteredPersonsSearchResultsMob() {

        searchGeneralVal = searchGeneral.val().trim();

        let data = {
            action: 'getPersonsMob',
            generalText: searchGeneral.val().trim(),
            ids: '',
            mainSearch: {
                vorname: '',
                nachname: '',
                funktion: '',
                partei: '',
                ort: '',
            },
            lang: economiesuisseData.language
        };


        if(searchGeneralVal !== '') {

            $.ajax({
                beforeSend: function () {
                    $('.komitee-mitglieders-container-mob .loader-fade-block').css('display', 'block');
                    $('.get-more-persons-mob a').removeClass('show-more-btn').addClass('hide-more-btn');
                },
                url: economiesuisseData.ajax_url,
                type: 'POST',
                data: data,
                async: true,
                dataType: "json",
                success: function (res) {

                    $('.komitee-mitglieders-container-mob .loader-fade-block').css('display', 'none');

                    personsEl.html(res.output);

                    if (res.count === 1) {
                        $('.get-more-persons-mob a').removeClass('hide-more-btn').addClass('show-more-btn');
                    }
                }
            });

        }else{
            $('.komitee-mitglieders-container-mob .loader-fade-block').css('display', 'none');

            personsEl.html(default_persons);

            if(default_persons_btn_status){
                $('.get-more-persons-mob a').removeClass('hide-more-btn').addClass('show-more-btn');
            }
        }
    }

});
