var dropZone=document.getElementById("dropZone");
var page=document.getElementById("page").value;
var folder=document.getElementById("folder").value;


      function show(pag){
          xhttp=new XMLHttpRequest();
          xhttp.onreadystatechange=function(){
              if(this.readyState==4 && this.status==200){
                  document.getElementById("images").innerHTML=this.responseText;
              }
          }
          xhttp.open('post','getProducts.php?page='+pag+'&folder='+folder);
          xhttp.send();
      }
      show(page);
      function upload(files){
        var formData= new FormData();
        var xhttp= new XMLHttpRequest();

        for(var x =0; x<files.length; x++){
            formData.append('files[]', files[x]);
        }
        formData.append('folder', folder);

        xhttp.onload= function(){
            data=this.responseText;
            console.log(data);
            show(page);
        }
        xhttp.open('post','upload.php');
        xhttp.send(formData);
      }
      dropZone.ondrop=function(e){
        e.preventDefault();
        this.className='dropzone';
        upload(e.dataTransfer.files);
      }

      dropZone.ondragover= function(){
        this.className='dropzone dragover';
        return false
      }
      dropZone.ondragleave= function(){
        this.className='dropzone';
        return false
      }
