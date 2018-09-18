<script type="text/javascript">
    $( document ).ready(function() {
        loaderOff();
        $('ul.pagination li').hide().filter(':lt(1), :nth-last-child(1)').show();
    });
    function loaderOn(){
        $(".loader-wrapper").show();
    }
    function loaderOff(){
        $(".loader-wrapper").delay(500).fadeOut();
    }
    // MODAL VIEW
    @if(Session::has('message'))
    $( document ).ready(function() {
        $.magnificPopup.open({
            items: {
                src: $('<div id="message" class="zoom-anim-dialog col-lg-4 col-md-6 col-sm-7 col-xs-11 center-col bg-white text-center modal-popup-main padding-80px-tb">'+
                    '<span class="text-extra-dark-gray text-uppercase alt-font text-extra-large font-weight-600 margin-20px-bottom display-block">{{Session::get('message_title')}}</span>'+
                    '<p class="margin-four">{{Session::get('message_content')}}</p>'+
                    '<a class="btn btn-medium btn-rounded btn-orange popup-modal-dismiss" href="#">U redu</a>'+
                    '</div>'),
                type: 'inline'
            }
        });
    });
    @endif

    @if($termsOfUse->count() > 0)
        $( document ).ready(function() {

            var cookiePolicy = false;

            checkCookiePolicy();

            if (cookiePolicy === true) {
                $(".cookie-policy").addClass('hidden');
            } else {
                $(".cookie-policy").removeClass('hidden');
                $(".cookie-policy").addClass('animated fadeInUpBig');
            }

            function setCookiePolicy(cookiePolicyName, cookiePolicyValue, expirationDays) {
                var date = new Date();
                date.setTime(date.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
                var expires = "expires=" + date.toGMTString();
                document.cookie = cookiePolicyName + "=" + cookiePolicyValue + "; " + expires;
            }

            function getCookiePolicy(cookiePolicyName) {
                var cookiePolicy = cookiePolicyName + "=";
                var cookiePolicyArray = document.cookie.split(';');
                for (var i = 0; i < cookiePolicyArray.length; i++) {
                    var cookie = cookiePolicyArray[i].trim();
                    if (cookie.indexOf(cookiePolicy) === 0) return cookie.substring(cookiePolicy.length, cookie.length);
                }
                return "";
            }

            function checkCookiePolicy() {
                var checkCookiePolicy = getCookiePolicy("SportskaTelevizijaCookiePolicy");
                if (checkCookiePolicy !== "") {
                    return cookiePolicy = true;
                } else {
                    return cookiePolicy = false;
                }
            }

            $('.cookie-button').click(function () {
                setCookiePolicy("SportskaTelevizijaCookiePolicy", "accepted", 365);
                $(".cookie-policy").addClass('fadeOutUpBig');
            });
        });
    @endif
</script>