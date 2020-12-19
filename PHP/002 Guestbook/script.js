let form = document.querySelector(".form");
let button = document.querySelector('button');

button.addEventListener('click', fun)

function fun() {
    let formData = {
        name: document.querySelector("input").value,
        comment: document.querySelector('textarea').value
    };

    const request = new XMLHttpRequest()

    request.onload = function () {
        location.reload()
    }

    request.open('POST', 'add.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send('name=' + encodeURIComponent(formData.name) + '&comment=' + encodeURIComponent(formData.comment));
}