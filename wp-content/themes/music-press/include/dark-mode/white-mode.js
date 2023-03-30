jQuery(function($) {
    let cookieStorage = {
        setCookie: function setCookie(key, value, time, path) {
            let expires = new Date();
            expires.setTime(expires.getTime() + time);
            let pathValue = '';
            if (typeof path !== 'undefined') {
                pathValue = 'path=' + path + ';';
            }
            document.cookie = key + '=' + value + ';' + pathValue + 'expires=' + expires.toUTCString();
        },
        getCookie: function getCookie(key) {
            let keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
            return keyValue ? keyValue[2] : null;
        },
        removeCookie: function removeCookie(key) {
            document.cookie = key + '=; Max-Age=0; path=/';
        }
    };
$('body').addClass('dark-mode');
    $('.dark-mode-button').on("click", function() {
        //Show either moon or sun
        $('.dark-mode-button').toggleClass('active');
        //If dark mode is selected
        if ($('.dark-mode-button').hasClass('active')) {
            //Add dark mode class to the body
            $('body').removeClass('dark-mode');
            cookieStorage.setCookie('myNightMode', 'true', 123459876, '/');
        } else {
            $('body').addClass('dark-mode');
            setTimeout(function() {
                cookieStorage.removeCookie('myNightMode');
            }, 100);
        }
    })

    if (cookieStorage.getCookie('myNightMode')) {
        $('body').removeClass('dark-mode');
        $('.dark-mode-button').addClass('active');
    }
})