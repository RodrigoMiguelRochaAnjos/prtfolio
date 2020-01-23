jQuery(function($){
  var filtroBtn=document.getElementsByClassName('filter-button');
  var filtro=document.getElementsByClassName('filter-inner');
  var modal=$("modal");

  var i=0;
  while(i<filtroBtn.length){
    addL(i);
    i++;

  }
  function addL(value){
    filtroBtn[value].addEventListener("click",function(){
      if(filtro[value].classList.contains('resize')){

        filtro[value].classList.remove('resize');
      }else{
        filtro[value].classList.add('resize');
      }
    });
  }



  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#tmp').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imgIn").change(function() {
    readURL(this);
  });

  $("#addP").click(function(){
    if($("#modal").hasClass("active1")){

      $("#modal").removeClass('active1');
    }else{
      $("#modal").addClass('active1');
    }
  });
  $("#x").click(function(){
    if($("#modal").hasClass("active1")){

      $("#modal").removeClass('active1');
    }else{
      $("#modal").addClass('active1');
    }
  });
});
