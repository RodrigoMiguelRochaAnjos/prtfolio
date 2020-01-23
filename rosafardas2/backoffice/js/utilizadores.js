var Procurar=document.getElementById("Procurar");

Procurar.addEventListener("keyup", function(){
  var Pvalue=this.value;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){
      document.getElementById("resultado").innerHTML=this.responseText;
    }

  };
  xhttp.open("GET", "includes/procurarUtilizador.php?s="+Pvalue, true);

  xhttp.send();
});
