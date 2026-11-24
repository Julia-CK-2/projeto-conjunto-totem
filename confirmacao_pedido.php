<?php
include'./conexao.php';
if(isset($_POST["txtConfirmacao"])){
$consulta = $_POST["txtConfirmacao"];
}else{
    $consulta = "";
}
$sql = "SELECT * FROM item WHERE item LIKE '%$confirmar%'";
$result = mysqli_query($conexao, $sql);
$linhas = mysqli_num_rows($result);
if ($linhas > 0){
    echo "<table border = '1'>"."<tr>"
    ."<tr>"
    ."<td>Código</td>"
    ."<td>Itens</td>"
    ."<td>Preço</td>"
    ."<td colspan= '2'>Opções</td></td>"
    ."<tr>"

    while($dados = mysqli_fetcj=h_array($result)){
        $cd = $dados["cd"];
        $item = $dados["item"];
        $preco = $dados["preco"];
    
        $total_item = $preco * $quantidade;

    echo    "<tr>"
            ."<td>$cd</td>"
            ."<td>$item</td>"
            ."<td>R$" . number_format($preco, 2, ',', '.')."</td>"
            ."<form method='POST' action='alterar.php'>"
            ."<td>"
            ."<input type='hidden' name='operacao' value='confirmar'>"
            ."<input type='hidden' name='cd' value='$cd'>"
            ."<input type='submit' value='confirmar'>"
            ."</form>"
            ."</td>"
            ."</tr>"
    
    
    }
    echo "</table>"
    } else {
        echo "<p>Não há nehum pedido.</p>"
    }



?>