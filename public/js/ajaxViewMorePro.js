let value = 1;
let viewMore = document.getElementById('viewMore');
let numEndViewMore = document.getElementById('numEndViewMore').textContent;

if (value == numEndViewMore) {
    viewMore.style.display = 'none';
}

viewMore.addEventListener('click', funcAjax);


function funcAjax() {
    value++;
    if (value == numEndViewMore) {
        viewMore.style.display = 'none';
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 & this.status == 200) {
            document.getElementById('products').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "Ajax/products/" + value, true);
    xhttp.send();
}