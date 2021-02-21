$(() => {
    const url = 'http://data.fixer.io/api/latest';
    const access_key = '6d42ff22fd18c394839583a4b0b8715c';

    $.get(
        url, 
        {
            'access_key': access_key,
            'symbols': 'USD, EUR, RUB'
        }, 
        (response) => {
            console.log(response);
            if(response.success) {
				$('.currency-usd').html((response.rates.RUB / response.rates.USD).toFixed(2));
				$('.currency-eur').html((response.rates.RUB / response.rates.EUR).toFixed(2));
			} else{
                $('.currency-usd').html('?');
				$('.currency-eur').html('?');
				alert('ERROR! ' + response.error.type);
			}
        }
    );
});