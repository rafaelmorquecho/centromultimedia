//
$(document).ready(function(){


    var tcTexts = TranslateContext.getInstance(commonTextsJs);

    $(".rate-movie-box").each(function(index, rBox){

        var movieId = $(rBox).attr('data-movie-id');
        var userRating = $(rBox).attr('data-user-rating');

        if(userRating != '')
        {
            userRating = isNaN(parseInt( userRating )) ? 0 : parseInt( userRating );

            var urlRating = '/imgs/myratings/' + userRating + '_.png';
            var hasReview = $('.review-img', rBox).attr('data-review') != undefined;
            var htmlSelect = '';

            if(!hasReview)
                htmlSelect += '<option value="-1">' +  tcTexts.t('rating-ns') + '</option>';

            if(userRating >=1 && userRating <=10)
                $("#share-rating-" +  movieId, rBox).show();

            for(i = 10; i >= 1; i--)
            {
                htmlSelect += '<option value="'+ i + '">'+ i + ' - ' +  tcTexts.t('rating-' + i) + '</option>';
            }

            if(userRating != -1)
                $('.rating-img', rBox).empty().append($('<img>').attr('src', urlRating).attr('alt', tcTexts.t('rating-' + userRating) ) );
            else
                $('.rating-img', rBox).empty().append($('<img>').attr('src', '/imgs/myratings/ns_.png') );

            $('.rating-select', rBox).empty().append(htmlSelect).val(userRating).change(function(){

                var myrBox = $(this).closest(".rate-movie-box");

                $(".rating-img", myrBox).append('<span>').addClass('sending-rating').html(tcTexts.t('sending rating'));
                $("#share-rating-" +  movieId, myrBox).hide();

                var myMovieId = $(myrBox).attr('data-movie-id');
                var rsid = $(this).attr('id');
                var itk = $(this).data('itk');

                $.post( "ratingajax.php", { id: myMovieId, rating: $('.rating-select', myrBox).val(), rsid: rsid, itk: itk, action: 'rate' }, function(data){
                        if(data.result == -1 )
                        {
                            $(".rating-img img", myrBox).hide();
                            $(".rating-img", myrBox).append('<span>').removeClass('sending-rating').addClass('error-sending-rating').html(tcTexts.t('error text') );
                        }
                        else
                        {
                            $(".rating-img", myrBox).empty().append('<img src="/imgs/myratings/' + data.rating +'_.png" />');
                            if(data.rating != 'ns')
                                $("#share-rating-" +  movieId, myrBox).show();
                        }
                });
            })
        }
    })
})
