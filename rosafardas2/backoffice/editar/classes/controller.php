<?php
class controller extends model{
    function getProducts($folder,$page){
        $mysqli= $this->connect();
        $p=$page-1;
        if( isset($p) && $p!="" && is_numeric($p)){
            if($p<=0){
                $p=0;
            }
            $p=$p*15;
        }
        $result=$mysqli->prepare('select count(*) over(),p.id, p.src, p.preco, p.nome, c.name, s.name from products p left join categorias c on p.id_categoria=c.id left join section s on p.id_section= s.id where s.name=? order by p.id desc limit ?,10');
        $result->bind_param('si',$folder,$p);
        if($result->execute()){
            $result->bind_result($num,$id,$src,$preco,$nome,$categoria,$section);
            $result->store_result();
            $datas=array();
            if($result->num_rows>0){
                while($result->fetch()){
                    $datas[]=[
                        'id'=>$id,
                        'src'=>$src,
                        'preco'=>$preco,
                        'nome'=>$nome,
                        'categoria'=>$categoria,
                        'section'=>$section,
                        'rows'=>$num
                    ];
                }
                return $datas;
            }
        }
    }
    function insertProduct($src,$folder){
        $mysqli= $this->connect();
        if($folder=="Men"){
            $folder=1;
        }else if($folder=="Women"){
            $folder=2;
        }else if($folder=="Children"){
            $folder=3;
        }
        $preco=10;
        $nome='(editar)';
        $cat=1;
        $result=$mysqli->prepare('insert into products(src,preco,nome,id_categoria,id_section) values(?,?,?,?,?)');
        $result->bind_param('sdsii',$src,$preco,$nome,$cat,$folder);
        return $result->execute();
    }
}
?>
