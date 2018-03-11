$( function() {
    var availablemarca = [
        'audi','alfa romeo','bmw','citroen','ferrari','fiat','ford','honda','hyundai','jaguar','jeep','kia','lamborghini','land rover','lexus',
        'lotus','maserati','mazda','mercedes','mini','mitsubishi','nissan','opel','pagani','peugeot','porsche','renault','seat','skoda','subaru','susuki',
        'tesla','toyota','volkswagen','volvo'
    ];
    $( "#marca" ).autocomplete({
        source: availablemarca
    });
} );