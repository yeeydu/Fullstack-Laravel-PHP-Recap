$(document).ready(function () {

    $('.navDropdown').mouseenter(function () {
        $(this).addClass('show')
        $(this).children('.dropdown-menu-wide').addClass('show');
    });

    $('.navDropdown').mouseleave(function () {
        $(this).removeClass('show');
        $(this).children('.dropdown-menu-wide').removeClass('show');
    });
});

// Search function
$("#myFilter").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#listTable tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});
