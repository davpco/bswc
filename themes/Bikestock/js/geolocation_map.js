$(window).load(function(){

    function setCookie(key, value) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
    }

    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }


if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {

$.ajax({ url:'http://maps.googleapis.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&sensor=true',
         success: function(data){

            text = data.results[3].formatted_address;
           
            var res_york = text.match(/york/gi);
            var res_boston = text.match(/boston/gi);

            if (res_york == null || res_york == '' || getCookie("bike_city") == 'NY') {

            } else {
                text = window.location.href;
                url = text.split("?");
                if (url[1] != "map=nyc" || url[1] != '') {
                setCookie("bike_city", "NY");
                // window.location.href = url[0]+"?map=nyc";
                } else {
                setCookie("bike_city", "NY");
                }

            }

            if (res_boston == null || res_boston == '' || getCookie("bike_city") == 'BO') {

            } else {
                text = window.location.href;
                url = text.split("?");
                if (url[1] != "map=boston") {
                setCookie("bike_city", "BO");
                window.location.href = url[0]+"?map=boston";
                }
            }           

         }
});

})
}

});