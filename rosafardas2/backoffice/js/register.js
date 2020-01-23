var password2=document.getElementById("Password2");
var password1=document.getElementById("Password1");
var nome=document.getElementById("Nome");
var email=document.getElementById("Email");
var submit=document.getElementById("submit");
var checks=document.getElementsByClassName("check");

var nch=document.getElementById("minmax");
var lowercase=document.getElementById("lowercase");
var uppercase=document.getElementById("uppercase");
var numeric=document.getElementById("numeric");
var igualdade=document.getElementById("igualdade");

password1.addEventListener("focusin",focar);
password2.addEventListener("focusin",focar1);

password1.addEventListener("keyup",limites);
password2.addEventListener("keyup",igual);
password1.addEventListener("keyup",enable);
password2.addEventListener("keyup",enable);
nome.addEventListener("keyup",enable);
email.addEventListener("keyup",enable);

function focar(){
  document.getElementById("Req1").style.height="0px";
  document.getElementById("Req").style.height="auto";
}
function focar1(){
  document.getElementById("Req").style.height="0px";
  document.getElementById("Req1").style.height="auto";
}


function limites(){

  if(password1.value.length>=6 && password1.value.length<=16){
    nch.classList.remove("uncheck");
    nch.classList.add("check");
  }else{
    nch.classList.remove("check");
    nch.classList.add("uncheck");
  }
  if(hasUpperCase(password1.value)){
    uppercase.classList.remove("uncheck");
    uppercase.classList.add("check");
  }else{
    uppercase.classList.remove("check");
    uppercase.classList.add("uncheck");
  }
  if(hasLowerCase(password1.value)){
    lowercase.classList.remove("uncheck");
    lowercase.classList.add("check");
  }else{
    lowercase.classList.remove("check");
    lowercase.classList.add("uncheck");
  }
  if(hasNumber(password1.value)){
    numeric.classList.remove("uncheck");
    numeric.classList.add("check");
  }else{
    numeric.classList.remove("check");
    numeric.classList.add("uncheck");
  }
}
function igual(){
  if(password1.value===password2.value){
    igualdade.classList.remove("uncheck");
    igualdade.classList.add("check");
  }else{
    igualdade.classList.remove("check");
    igualdade.classList.add("uncheck");
  }
}

function enable(){
  if(checks.length==5 && password1 !="" && password2 !="" && nome.value != "" && email.value !=""){
    submit.removeAttribute('disabled');
    submit.setAttribute('class','hover_submit');
  }else{
    submit.setAttribute('disabled',"");
    submit.setAttribute('class','');
  }
}
function hasUpperCase(str){
  return (/[A-Z]/.test(str))
}
function hasLowerCase(str){
  return (/[a-z]/.test(str))
}
function hasNumber(str){
  return (/[0-9]/.test(str))
}
