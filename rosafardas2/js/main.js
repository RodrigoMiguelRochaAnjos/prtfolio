var hamburger = document.getElementById("hamburger");
var nav = document.getElementById("nav");

hamburger.onclick=function(){
  if(nav.classList.contains("active")){
    nav.classList.remove("active");
    hamburger.classList.remove("longe");
  }else{
    nav.classList.add("active");
    hamburger.classList.add("longe");
  }
}
