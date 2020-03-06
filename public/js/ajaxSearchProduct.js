const btn_searchProduct = document.getElementById('formSearch');

btn_searchProduct.addEventListener('keyup', func);

function func() {
    let value = this.value;

    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 & this.status == 200) {
            document.getElementById('content').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/assignment/Ajax/content/" + value, true);
    xhttp.send();
}

