$(document).ready(function() {
    $('.sidebar-header').on('click', function () {
        $('#sidebar').toggleClass('closed');
        localStorage.setItem('sidebar', $('#sidebar').attr("class"));
    });

    $('#sidebar').addClass(localStorage.getItem('sidebar'));
    var item = localStorage.getItem('active');
    if ($("#" + item).hasClass("menutop")) {
        $("#" + item).addClass('active');
    } else {
        $("#" + item).addClass('show');
        $("#" + item).prev().addClass('active');
    }

    $('.collapse').on('click', function () {
        $('.collapse').prev().removeClass('active');
        $(this).addClass('active');
        localStorage.setItem('active', this.id);
    });

    $('.collapse').on('show.bs.collapse', function () {
        $('.collapse').collapse('hide');
        $('.collapse').removeClass('active');
        $('.collapse').prev().removeClass('active');
    });

    $('.collapse').on('shown.bs.collapse', function () {
        $(this).collapse('show');
        $(this).prev().addClass('active');
    });

    $('.collapse').on('hidden.bs.collapse', function () {
        $(this).prev().removeClass('active');
    });
});