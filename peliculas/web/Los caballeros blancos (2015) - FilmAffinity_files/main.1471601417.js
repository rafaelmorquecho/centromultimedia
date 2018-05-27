var ff = 0;
var adp = 1;

var swUserPrefs = true;

function ol()
{
    if(ff != 0)
        ff.focus();
}


function pDateTime(value)
{
    if(value == undefined)
        return;

    var d = new Date(value * 1000);
    document.write(d.toLocaleString());
}

function pDate(value)
{
    if(value == undefined)
        return;

    var d = new Date(value * 1000);

    document.write( d.toLocaleDateString() );
}

function pTime(value)
{
    if(value == undefined)
        return;

    var d = new Date(value * 1000);

    document.write( d.toLocaleTimeString() );
}

function togglerw(id)
{
    rtext = document.getElementById('text' + id);
    rlink = document.getElementById('link' + id);

    if(rtext.style.display == 'none')
    {
        rtext.style.display = '';
        rlink.style.display = 'none';
    }
    else
    {
        rtext.style.display = 'none';
        rlink.style.display = '';
    }
}

function openShop(name, link)
{
    w = window.open(link, name, '');
    w.focus();
}


function clickAd(url)
{
    window.open(url);
}

function pageUrl($page)
{
    return '/' + site_loc + '/' + $page;
}


function securePageUrl($page)
{
    var domain = baseDomain();

    var protocol = 'https://';
    if(domain.match(/filmaffinity.com$/) == null)
        protocol = 'http://';

    return  protocol + domain + pageUrl($page);
}


function baseDomain()
{
    return location.host.replace('www.', '');
}


function corsAjax(url, params, callback)
{
    $.ajax({
        type: "POST",
        url: url,

        xhrFields: {
            withCredentials: true
        },

        data: params,

        dataType: supportDataType()
    })
    .done(function(data)
    {
        callback(data);
    });
}


function supportDataType()
{
    var supportDataType = 'jsonp';
    if(supportCORS())
    {
        supportDataType = 'json';
    }

    return supportDataType;
}



function supportCORS()
{
    var cors = ('withCredentials' in new XMLHttpRequest());

    return cors;
}


function hideUserMenu()
{
    $('.user-card-profile .pop-menu .menu').hide();
    $('.user-card-profile .pop-menu .switch-menu').removeClass('visible');
}


function sendpv(data)
{
    $.post("/sp.php", {"r": data, "sw": $(window).width(), "sh": $(window).height(), "adb": dadb()});
}


function dadb()
{
    var value = 0;
    if(typeof adsbl === 'undefined')
    {
        value = 1;
    }

    return value;
}


function sessPing(stk, secs)
{
    var msecs = secs * 1000;

    setTimeout(function()
    {
        var params = {};
        params.action = 'ping';
        params.stk = stk;

        $.post(pageUrl('session.ajax.php'), params, function(data)
        {
            if(data.result === 0)
            {
                sessPing(data.stk, data.psSecs);
            }
        });
    }, msecs);
}


function renderVersionReminder(text)
{
    if(typeof(Storage) !== "undefined")
    {
        var render = true;


        var lastRem = localStorage.getItem('remVersion');

        if(lastRem)
        {
            var ts = Math.round(new Date().getTime()/1000);

            if( lastRem > ts )
            {
                //Aun no ha caducado
                render = false;
            }
        }

        if(render)
        {
            var remCount = localStorage.getItem('remVersionCount');
            if(remCount == null)
            {
                remCount = 0;
            }

            remCount = parseInt(remCount);

            if(remCount < 5)
            {
                localStorage.setItem('remVersionCount', remCount + 1);
            }
            else
            {
                hideVersionReminder();
                render = false;
            }
        }

        if(render)
        {
            var reminder =  '<div class="version-reminder">';
                reminder +=    '<div class="body">' + text + '</div>';
                reminder +=    '<div class="close"><i class="fa fa-times"></i></div>';
                reminder += '</div>';


            $('#header-bottom .version-selector').prepend(reminder);
        }
    }
}


function hideVersionReminder()
{
    var duration = 60 * 60 * 24 * 7;

    var ts = Math.round(new Date().getTime()/1000);

    localStorage.setItem('remVersion', ts + duration);
    localStorage.setItem('remVersionCount', 0);

    $('#header-bottom .version-reminder').hide();

}


$(function(){
    var signInUrl = pageUrl('login.php');
    var signOutUrl = pageUrl('logout.php');

    if( typeof nrp == 'undefined')
    {
        var signInUrl = pageUrl('login.php?rp=' + encodeURIComponent(window.location.href));
        var signOutUrl = pageUrl('logout.php?rp=' + encodeURIComponent(window.location.href));
    }

    $('a.sign-in').attr('href', signInUrl);
    $('a.sign-out').attr('href', signOutUrl);

    $('.sign-in').click(function(event){

        event.preventDefault();

        window.location.href = signInUrl;
    });

    $('.sign-out').click(function(event){

        event.preventDefault();

        corsAjax(securePageUrl('account.ajax.php?action=logout'), null, function(result)
        {
            if(result.result == 0)
                location.reload();
        });

    });

  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 300);
        return false;
      }
    }
  });

    // toplink
    $('#top-anch').hide();
    $(window).scroll(function(){
        if($(window).scrollTop() >= 100)
        {
            $('#top-anch').fadeIn(500);
        }
        else
        {
            $('#top-anch').fadeOut(500);
        }
    });


    $('.version-selector ul.version > li').on('click', function()
    {
        var ul = $(this).closest('ul');
        ul.toggleClass('slide');

        if($(this).attr('data-version') == site_loc)
        {
            $('li:not(.fixed)', ul).toggle();
            $('li.fixed', ul).toggleClass('selected');
        }
        else
        {

            if($(this).hasClass('info'))
            {
                location.href = pageUrl('fa-international.php');
            }
            else
            {
                var params = {};
                params.key = 'version';
                params.value = $(this).attr('data-version');
                params.action = 'changeVersion';

                $.post(pageUrl('client-prefs.ajax.php'), params, function()
                {
                    var pathParts = location.pathname.split('/');
                    pathParts.shift();
                    pathParts.shift();

                    location.href = location.protocol + '//' + location.host + '/' + params.value + '/' + pathParts.join('/') + location.search;
                });
            }
        }
    });



    $('.version-reminder .close').on('click', function()
    {
        hideVersionReminder();
    });


    $( "#top-search-input" ).autocomplete({
        source: function( request, response ) {
            corsAjax( pageUrl("search-ac.ajax.php?action=searchTerm"), {'term': request.term}, function(result){
                response( result.results );
            });
        },
        minLength: 2,
        select: function( event, ui ) {
            if(ui.item.id == 'se-a')
            {
                window.location.href = pageUrl( "search.php?stext=" + $('#top-search-input').val() + "&stype=all" );
            }
            else
            {
                window.location.href = pageUrl("film" + ui.item.id + ".html");
            }
        }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $("<li>").html( item.label ).appendTo( $(ul).addClass('t-s') )
    }




    $('.user-card-profile .switch-menu').on('click', function(event)
    {
        event.preventDefault();
        event.stopPropagation();

        if($(this).hasClass('visible'))
        {
            hideUserMenu();
        }
        else
        {
            $('.menu', $(this).closest('.pop-menu')).show();
            $(this).addClass('visible');
        }
    });


    $('.user-card-profile .pop-menu span.sn-icon').on('click', function(event)
    {
        event.stopPropagation();

        var dialog = $('.user-card-profile .templates .go-to-url' );
        if($('a', dialog).attr('href') == '')
        {
            var friendId = $('.user-card-profile').attr('data-user-id');
            $.post(pageUrl("users-ajax.php"), {'action': 'getUserWeb', 'friendId': friendId}, function(data)
            {
                dialog.find('a').attr('href', data.url).html(data.url);

                openUserWebDialog(dialog.clone());
            });
        }
        else
        {
            openUserWebDialog(dialog.clone());
        }
    });


    $('.mr-user-info-wrapper.sn .snets .fa-globe').on('click', function(event)
    {
        event.preventDefault();
        event.stopPropagation();


        var friendId = $(this).closest('.user-info').data('user-id');
        $.post(pageUrl("users-ajax.php"), {'action': 'getUserWebPop', 'friendId': friendId}, function(data)
        {
            openUserWebDialog($(data.pop));
        });

    });


    if($('.reviews-useful-bar').length > 0)
    {
        $.each($('.reviews-useful-bar > div'), function(index, bar)
        {
            $(bar).animate(
            {
                width: $(this).data('percent')
            }, 3000, 'easeOutCirc');
        });

    }


    function openUserWebDialog(dialog)
    {
        dialog.dialog(
        {
            resizable: false,
            height:200,
            width: 400,
            modal: true,
            open: function ()
            {
                $('a').blur();
            }
        });
    }

})
