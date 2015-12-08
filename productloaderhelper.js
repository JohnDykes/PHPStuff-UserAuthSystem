
$(document).ready(function () {
    $.getJSON( "productloader.php", function( data ) {

        $.each(data, function (key, value) {             //Needs work...eventually will populate index page rather than just being logged.
            console.log(key, value);
        });


    })


});



