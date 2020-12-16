window.onload = function() {
    document.querySelector('.bottom_panel > .plus').addEventListener('click', plusRow);
    document.querySelector('.bottom_panel > .minus').addEventListener('click', minusRow);

    document.querySelector('.right_panel > .plus').addEventListener('click', plusСolumn);
    document.querySelector('.right_panel > .minus').addEventListener('click', minusСolumn);
    const tbody = document.querySelector("tbody")

    array = [
        [1,2,3,4],
        [5,6,7,8],
        [9,10,11,12],
        [13,14,15,16]
    ];

    let N = ''
    let amountRow = array.length
    newRow = []
    let amountСolumn = array[0].length

    function tableBuilder() {
        tbody.textContent = ""
        for (i = 0; i < array.length; i++) {
            var tr = document.createElement('tr')
            for (j = 0; j < array[i].length; j++) {
                var td = document.createElement('td')
                var script = document.createElement('script')
                td.innerHTML = `<input id="` + i + `_` + j + `" type="text" value="` + array[i][j] + `">`
                script.innerHTML = `
                document.getElementById("`+ i + `_` + j +`").addEventListener('input', function() {
                    array[`+ i + `][`+ j +`] = document.getElementById("`+ i + `_` + j +`").value
                });
                `
                tr.appendChild(td)
                tr.appendChild(script)
            }
            tbody.appendChild(tr)
        }
    }
    tableBuilder()

    minusRowCheker()

    function minusСolumnCheker() {
        p = -1
        g = 0
        voidColumn = "true"

        for (k = 0; k < array.length; k++) {
            if (array[k][array[k].length -1] != "") {
                voidColumn = "false"
            }
        }

        if (voidColumn === "false") {
            ppp()
        } else {
            for ( i = 0; i < array.length; i++) {
                array[i].pop()
            }
            amountСolumn = array[0].length
            tableBuilder()
            return
        }

        function ppp() {
            if (p < array.length) {
                p = p + 1
                if (array[p][array[p].length -1] != "") {
                    if (confirm("Столбец содержит данные! Удалить?")) {
                        for ( i = 0; i < array.length; i++) {
                            array[i].pop()
                        }
                        amountСolumn = array[0].length
                        tableBuilder()
                        return
                    } else {
                        return
                    }
                }
                ppp()
            }
        }
    }

    function plusRow() {
        for (i = 0; i < array[0].length; i++) {
            newRow.push('')
            console.log(array[0].length)
        }
        array.push(newRow)
        amountRow = array.length
        console.log(array)
        newRow = []
        tableBuilder()
    }

    function minusRow() {
        if (amountRow > 1) {
            array.pop()
            amountRow = array.length
            console.log(amountRow)
        } else {
            alert("Nope!")
        }
        tableBuilder()
    }

    function plusСolumn() {
        for ( i = 0; i < array.length; i++) {
            array[i].push(N)
        }
        console.log(array)
        amountСolumn = array[0].length
        tableBuilder()
    }

    function minusСolumn() {
        if (amountСolumn > 1) {
            minusСolumnCheker()
        } else {
            alert("Nope!")
        }
    }
}


// for (i = 0; i < array[0].length; i++) {
//     rowNumber = array[i]
//     for (k = 0; k < rowNumber.length; k++)
//         point = rowNumber[k]
//     console.log(rowNumber[k])
//     tbody.innerHTML += `<div>` + point + `</div>`
// }
// document.getElementById("`+ i + `_` + j +`").addEventListener('click', function() {console.log("11")});