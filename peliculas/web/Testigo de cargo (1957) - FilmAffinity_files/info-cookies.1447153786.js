
$(function()
{
    $("#info-cookie").css('display', 'block');

    $('#info-cookie .fa-button-cookie').on('click', function()
    {
        $.post(pageUrl('client-prefs.ajax.php'), {'action' : 'acceptCookies'}, function()
        {
            $("#info-cookie").remove();
        });
    });
});
