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
        dropdownElement.addClass('active');
    }

    // Version Toggle
    $('#header_version_toggle').on('change', function () {
        let option = $(this).find(':selected');
        if (option.data('page') !== 'current') {
            window.location.href = option.data('url');
        }
    })
});
