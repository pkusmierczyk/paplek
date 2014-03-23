$(document).ready(function() {
    $('.header div').hover(function() {
        $(this).css('background-color', '#C6E3C6');
    },
    function() {
        $(this).css('background-color', 'green');
    });

    $('#register_passwd_second').keyup(function() {
        var passwd = $('#register_passwd_first').val();console.log(passwd);
        if (passwd != $(this).val()) {
            $(this).css('border', '2px solid red');
        }
    });

    $('.header-logo').hover(function() {
        $(this).css('background-color', 'grey');
    },
    function() {
        $(this).css('background-color', '#70B870');
    });

    $('.post-comment').hide();

    $('.core-post').hover(function() {
        $(this).children('.post-comment').show();
    },
    function() {
        $('.post-comment').hide();
    });
});