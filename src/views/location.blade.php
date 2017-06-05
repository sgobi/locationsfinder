<!DOCTYPE html>
<html>
<head>

</head>
<body>

<p>Click the button to get your coordinates.</p>

<p>Your Location: <span id="location"></span></p>


{{csrf_field()}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    var ip = null;

    $(document).ready(function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showLocation);
        } else {

            showLocation(position);
        }
    });


    $.get("http://ipinfo.io", function (response) {
        ip = response.ip;

        showLocation(position);
    }, "jsonp");


    function showLocation(position) {

        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

//getLocation.php
//        $.ajaxSetup({
//            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
//        });

        $.ajax({
            type: 'POST',
            url: 'location/show',
            data: {'latitude': latitude, 'longitude': longitude, 'ip': ip, '_token': $('input[name=_token]').val()},
            success: function (msg) {

                if (msg) {
                    $("#location").html(msg);
                } else {
                    $("#location").html('Not Available');
                }
            }
        });
    }
</script>

</body>
</html>