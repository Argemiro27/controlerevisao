function atualizarVariações() {
    var tipoVariacao = document.getElementById("tipovariacao").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("variacoes").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/variacoes/" + tipoVariacao, true);
    xhttp.send();
}
