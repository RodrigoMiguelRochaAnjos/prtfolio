document.getElementById("NomeNav").onclick=function(){
  if(document.getElementById("menu").classList.contains('open')){
    document.getElementById("menu").classList.remove('open');

  }else{
    document.getElementById("menu").classList.add('open');

  }
}
document.onclick= function(event){
  if(event.target != document.getElementById("menu") && event.target != document.getElementById("NomeNav")){
    document.getElementById("menu").classList.remove('open');
  }
}
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
