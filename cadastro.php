<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <script>
    function carrega() {
        var campo = document.getElementById("cep");
        var digitado = campo.value;
        var rua = document.getElementById("endereco");
        
        if(digitado.length > 7) {
            var endereco = "http://viacep.com.br/ws/" + digitado + "/json/";
            
            var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var resposta = JSON.parse(this.responseText);
        rua.value = resposta.logradouro;
        console.log("teste");
    }
  };
  xhttp.open("GET", endereco, true);
  xhttp.send();
        }
    }    
    
    window.onload = function() {        document.getElementById("cep").addEventListener("keyup", function() {
            carrega();
        });
    }
    </script>
</head>
<body>
    <form action="salva.php">
        <input type="text" name="cep" id="cep">
        <input type="text" name="endereco" id="endereco">
        <input type="submit" value="Salvar">
    </form>
</body>
</html>