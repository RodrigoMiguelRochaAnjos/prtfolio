var id=document.getElementById("id").value;
var Nome=document.getElementById("Nome");
var Email=document.getElementById("Email");
var Token=document.getElementById("Token");
var EmailConfirmed=document.getElementById("EmailConfirmed");
var date=document.getElementById("date");


Nome.addEventListener("keyup", function(){
  var Pvalue=this.value;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){
    }

  };
  xhttp.open("GET", "includes/updateUtilizador.php?row=Nome&id="+id+"&t="+Pvalue, true);

  xhttp.send();
}
);

Email.addEventListener("keyup", function(){
  var Pvalue=this.value;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){
    }

  };
  xhttp.open("GET", "includes/updateUtilizador.php?row=Email&id="+id+"&t="+Pvalue, true);

  xhttp.send();
}
);

Token.addEventListener("keyup", function(){
  var Pvalue=this.value;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){
    }

  };
  xhttp.open("GET", "includes/updateUtilizador.php?row=Token&id="+id+"&t="+Pvalue, true);

  xhttp.send();
}
);



EmailConfirmed.addEventListener("keyup", function(){
  var Pvalue=this.value;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){
    }

  };
  xhttp.open("GET", "includes/updateUtilizador.php?row=isEmailConfirmed&id="+id+"&t="+Pvalue, true);

  xhttp.send();
}
);



date.addEventListener("keyup", function(){
  var Pvalue=this.value;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){
    }

  };
  xhttp.open("GET", "includes/updateUtilizador.php?row=dateCreated&id="+id+"&t="+Pvalue, true);

  xhttp.send();
}
);
