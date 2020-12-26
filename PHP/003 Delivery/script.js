let form = document.querySelector(".form");
let button = document.querySelector('input[type=button]');
let message = document.querySelector('.response');

button.addEventListener('click', fun)

async function fun() {
    let selectCities = document.querySelector('#cities');
    let formData = {
        city: selectCities.options[selectCities.selectedIndex].value,
        weight: document.querySelector('input[type=text]').value
    };

    const response = await fetch('server.php',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: ('city=' + encodeURIComponent(formData.city) + '&weight=' + encodeURIComponent(formData.weight))
    })
    let APImessage = await response.json()
    message.innerHTML = APImessage['message']

}