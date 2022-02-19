// noinspection JSUnresolvedFunction

$(function () {
    // Sidebar Dropdown Toggle
    $('.idocs-navigation .nav .nav-item a.nav-link.has-dropdown').on('click', function () {
        event.preventDefault();
        $('+ul.nav', this).slideToggle();
    });

    // Add Active class to sidebar dropdown element
    let dropdownElement = $('li.nav-item ul.nav a.nav-link.active').parent().parent().parent().children('a.nav-link.has-dropdown');
    if (dropdownElement.length > 0) {
        dropdownElement.addClass('active dropdown-open');
    }

    // Version Toggle
    $('#header_version_toggle').on('change', function () {
        let option = $(this).find(':selected');
        if (option.data('page') !== 'current') {
            window.location.href = option.data('url');
        }
    }).niceSelect();

    // Animate Scroll to Heading
    function loadHash(hashObj) {
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $("html, body").animate({scrollTop: $(hashObj).offset().top - 70}, 500);
    }

    // Scroll to Heading
    $('#markdown_content > h1 + ul > li a').on('click', function (event) {
        if (this.hash !== "") {
            let hash = this.hash;
            // Prevent default anchor click behavior
            event.preventDefault();
            loadHash(hash);
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
        }
    });
    if (window.location.hash) loadHash(window.location.hash);

    // DropDown Animation
    $('a.nav-link.has-dropdown').on('click', function () {
        $(this).toggleClass('dropdown-open');
    });
});
