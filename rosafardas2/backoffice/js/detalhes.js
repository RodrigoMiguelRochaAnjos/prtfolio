var id=document.getElementById("myId").value;
var Preco=document.getElementById("Preco");
var Sub=document.getElementById("Sub");


var Titulo=document.getElementById("Titulo");
var Descricao=document.getElementById("Descricao");

var TituloEn=document.getElementById("TituloEn");
var DescricaoEn=document.getElementById("DescricaoEn");

var TituloEs=document.getElementById("TituloEs");
var DescricaoEs=document.getElementById("DescricaoEs");


Titulo.addEventListener("keyup", function(){
  var Pvalue=this.value;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){
    }

  };
  xhttp.open("GET", "includes/updateTitulo.php?id="+id+"&t="+Pvalue, true);

  xhttp.send();
});


Descricao.addEventListener("keyup", function(){
  var Pvalue=this.value;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){


    }

  };
  xhttp.open("GET", "includes/updateDescricao.php?id="+id+"&t="+Pvalue, true);
  xhttp.send();
});



TituloEn.addEventListener("keyup", function(){
  var Pvalue=this.value;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){
    }

  };
  xhttp.open("GET", "includes/updateTituloEN.php?id="+id+"&t="+Pvalue, true);

  xhttp.send();
});


DescricaoEn.addEventListener("keyup", function(){
  var Pvalue=this.value;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){


    }

  };
  xhttp.open("GET", "includes/updateDescricaoEN.php?id="+id+"&t="+Pvalue, true);
  xhttp.send();
});



TituloEs.addEventListener("keyup", function(){
  var Pvalue=this.value;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){
    }

  };
  xhttp.open("GET", "includes/updateTituloES.php?id="+id+"&t="+Pvalue, true);

  xhttp.send();
});


DescricaoEs.addEventListener("keyup", function(){
  var Pvalue=this.value;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){


    }

  };
  xhttp.open("GET", "includes/updateDescricaoES.php?id="+id+"&t="+Pvalue, true);
  xhttp.send();
});



Preco.addEventListener("keyup", function(){
  var Pvalue=this.value;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){


    }

  };
  xhttp.open("GET", "includes/updatePreco.php?id="+id+"&t="+Pvalue, true);
  xhttp.send();
});

Sub.addEventListener("keyup", function(){
  var Pvalue=this.value;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){


    }

  };
  xhttp.open("GET", "includes/updateSub.php?id="+id+"&t="+Pvalue, true);
  xhttp.send();
});
