<?php
class view extends controller{
    function upload_file($folder,$filesName,$filesType,$filesTmp,$filesError,$filesSize){
        $extentions=array();
        $allowed=array(
            'jpg',
            'jpeg',
            'png'
        );
        for($i=0;$i<sizeof($filesName);$i++){
            $fileExtention=explode('.',$filesName[$i]);
            $fileActualExtention=end($fileExtention);
            if(in_array($fileActualExtention,$allowed)){
                if($filesSize[$i]<3000000){
                    if($filesError[$i]===0){
                        $fileActualName=uniqid('',true).'.'.$fileActualExtention;
                        if($this->insertProduct($fileActualName,$folder)){
                            move_uploaded_file($filesTmp[$i],'../../images/'.$folder.'/'.$fileActualName);
                        }
                    }
                }
            }
        }
    }
    function showProducts($folder,$page){
        $datas=$this->getProducts($folder,$page);
            foreach($datas as $data){
                $nr= $data['rows'];
                echo '
                <div class="item ';
                if(
                $data['id']== null || $data['id']=="" ||
                $data['src']== null || $data['src']=="" ||
                $data['preco']== null || $data['preco']=="" ||
                $data['nome']== null || $data['nome']=="" ||
                $data['categoria']== null || $data['categoria']=="" ||
                $data['section']== null || $data['section']=="" ||
                $data['nome']=='(editar)'
                ){
                    echo "missing";
                }else{
                    echo "good";
                }

                echo ' ">
                  <img src="../../images/',$data['section'],'/',$data['src'],'" >
                  <a class="editar" href="editar.php?id=',$data['id'],'">Editar</a>
                  <a class="eliminar" href="eliminar.php?id=',$data['id'],'">Eliminar</a>
                </div>
                ';
            }
            $pages=ceil($nr/10);
            echo '<ul id="pages">';
            for($b=0;$b<$pages;$b++){
                    echo '<li> <a href="?page=',$b+1,'"class="
                    ';
                    if($_GET['page']==$b+1){
                    echo 'background';
                    }
                    echo '
                    "> ',$b+1,' </a></li>';
            }
            echo '</ul>';
    }
}
?>
