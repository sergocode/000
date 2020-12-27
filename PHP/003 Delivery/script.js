let form = document.querySelector(".form")
let button = document.querySelector('input[type=button]')
let message = document.querySelector('.response')
let weight = document.querySelector('input[type=number]')

button.addEventListener('click', fun)
weight.addEventListener('input', validation)

function validation() {
    weight.value = Math.floor(weight.value)
}

async function fun() {
    let selectCities = document.querySelector('#cities')
    let currentCity = selectCities.options[selectCities.selectedIndex].value
    let formData = {
        city: currentCity,
        weight: weight.value
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
    let status = APImessage['status']
    if (status === 'error') {
        message.style.color = "red";
    } else {
        message.style.color = "#000";
    }
}