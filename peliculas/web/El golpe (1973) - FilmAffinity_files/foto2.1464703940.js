$(document).ready(function(){
    $('.lightbox').colorbox({
        onComplete: function(){
            $(".cboxPhoto").click(function(){
                $.colorbox.close();
            });
        },
        onOpen: function(){
            var title = $('.lightbox').data('t');
            var dat_t = $('.lightbox').attr('title');

            $('.lightbox').attr('title', title);
            $('.lightbox').data('t', dat_t);

            $('object').css({'visibility':'hidden'});
        },
        onClosed: function(){
            var title = $('.lightbox').data('t');
            var dat_t = $('.lightbox').attr('title');

            $('.lightbox').attr('title', title);
            $('.lightbox').data('t', dat_t);

            $('object').css({'visibility':'inherit'});
        }
    });
});
