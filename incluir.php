<?php
include './conexao.php';

// Verifica se o campo 'txtConfirmar' foi enviado via POST
if (isset($_POST["txtConfirmar"])) {
    $confirmar = $_POST["txtConfirmar"];
} else {
    $confirmar = "";
}

// Consulta usando a variável $confirmar com PDO Prepared Statements
$sql = "SELECT * FROM item WHERE item LIKE :confirmar";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':confirmar', "%$confirmar%", PDO::PARAM_STR);
$stmt->execute();

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($resultados);

if ($linhas > 0) {
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td>Código</td>";
    echo "<td>Itens</td>";
    echo "<td>Preço</td>";
    echo "<td>Quantidade</td>";
    echo "<td colspan='2'>Operacoes</td>";
    echo "</tr>";

    foreach ($resultados as $dados) {
        $cd = $dados["cd"];
        $item = $dados["item"];
        $preco = $dados["preco"];
        $quantidade = $dados["quantidade"];

        $total_item = $preco * $quantidade;
        $total_item = $preco * $quantidade;
    
        echo "<tr>"
           . "<td>$cd</td>"
           . "<td>$item</td>"
           . "<td>R$ " . number_format($preco, 2, ',', '.') . "</td>"
           . "<td>R$ " . number_format($total_item, 2, ',', '.') . "</td>"
           
           //botão de customização
           . "<td>"
           . "<form method='POST' action='customizar.php'>"
           . "<input type='hidden' name='cd' value='$cd'>"
           . "<input type='submit' value='Customizar' class='btn-customizar'>"
           . "</form>"
           . "</td>"

           . "</tr>"

            //botão de - e +
           . "<td align='center'>"
           . "<form method='POST' action='alterar.php' style='display:inline;'>"
           . "<input type='hidden' name='operacao' value='diminuir'>"
           . "<input type='hidden' name='cd' value='$cd'>"
           . "<input type='submit' value=' - '>"
           . "</form>"
           . " <span style='margin: 0 10px;'>$quantidade</span> "
           . "<form method='POST' action='alterar.php' style='display:inline;'>"
           . "<input type='hidden' name='operacao' value='aumentar'>"
           . "<input type='hidden' name='cd' value='$cd'>"
           . "<input type='submit' value=' + '>"
           . "</form>"
           . "</td>"


           . "<td>R$ " . number_format($total_item, 2, ',', '.') . "</td>"


           . "<td>"
           . "<form method='POST' action='alterar.php'>"
           . "<input type='hidden' name='operacao' value='confirmar'>"
           . "<input type='hidden' name='cd' value='$cd'>"
           . "<input type='submit' value='Confirmar'>"
           . "</form>"
           . "</td>"
           
           . "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Não há nenhum pedido.</p>";
}
?>


<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Totem de pedidos</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
	<div class="container">
        <div class="confirmacao_pedido">
		<img>
		
		<button id="cancelar" name="Cancelar" onclick=" "> Cancelar </button>
		</div>

        <div class="tipo_pedido">
            <img>
            
            <button id="confirmar" name="Confirmar" onclick=" "> Finalizar </button>
            </div>
            <br>
	</div>

</body>
</html> 