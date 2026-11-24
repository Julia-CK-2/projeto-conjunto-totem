<?php
include_once('connection/conexao.php');
$descricao=$_POST['descricao'];

if(is_file($_FILES['arquivo']['tmp_name'])){
 
 $foto = $_FILES['arquivo']['name'];
 
 if(!eregi("^image\/(png|jpg)$", $_FILES['arquivo']['type']))
 {
  echo "<script>alert('Formato Inválido')</script>";
 }else{
  
  if(file_exists("imagens/$foto")){
   $a = 1;
   while(file_exists("imagens/[$a]$foto")){
    $a++;
   }
   
   $foto = "[".$a."]".$foto;
   $sqlstring = "INSERT INTO fotos (id_foto, descricao,imagem) VALUES(null,'$descricao', '$foto')";
    mysqli_query($conexao,$sqlstring);
  }
  
  if(!move_uploaded_file($_FILES['arquivo']['tmp_name'], "imagens/".$foto))
   {
    echo "<script>alert('Formato Inválido')</script>";
   }
 
 }
 
  header("Location: admin.php");
 
}else{
 header("Location: admin.php");
}
mysqli_close($conexao);
?>