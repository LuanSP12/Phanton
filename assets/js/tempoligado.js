			setInterval("messages()", 1000);
function messages(){
var body = "";

                if (window.XMLHttpRequest) {
                                xmlhttp = new XMLHttpRequest();
                } else if (window.ActiveXObject) {
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } else {
                        alert("Seu navegador não suporta a qualidade de nosso site");
                                return;
                }

        xmlhttp.open("POST", "comandos/habbo/tempoligado", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=ISO-8859-1");
        xmlhttp.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
        xmlhttp.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
        xmlhttp.setRequestHeader("Pragma", "no-cache");

        xmlhttp.onreadystatechange = processReqChange;
        xmlhttp.send(null);

}

function processReqChange() {
        if (xmlhttp.readyState == 4) {
                        if (xmlhttp.status == 200) {
                        document.getElementById("tempoligado").innerHTML = xmlhttp.responseText;
                                } else {

                                }
        }
}