<?php
include './conexao.php';

// Verifica se o campo de busca foi enviado via POST
$confirmar = isset($_POST["txtConfirmar"]) ? $_POST["txtConfirmar"] : "";

// Consulta utilizando as colunas reais da sua tabela 'ingredientes'
$sql = "SELECT * FROM ingredientes WHERE nome LIKE :confirmar";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':confirmar', "%$confirmar%", PDO::PARAM_STR);
$stmt->execute();

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($resultados);

if ($linhas > 0) {
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td>Código</td>";
    echo "<td>Ingrediente</td>";
    echo "<td>Preço Unitário</td>";
    echo "<td>Quantidade</td>";
    echo "<td>Total do Ingrediente</td>";
    echo "<td colspan='2'>Operações</td>";
    echo "</tr>";

    foreach ($resultados as $dados) {
        // Usando a chave primária correta da sua tabela
        $cd = $dados["cd_ingredientes"];
        $nome = $dados["nome"];
        $preco = $dados["preco"];
        // Como a quantidade pode vir nula ou 0 inicialmente, tratamos com operador de coalescência
        $quantidade = $dados["quantidade"] ?? 0;

        // Cálculo do total do ingrediente (Preço x Quantidade)
        $total_ingrediente = $preco * $quantidade;
    
        echo "<tr>"
           . "<td>$cd</td>"
           . "<td>$nome</td>"
           . "<td>R$ " . number_format($preco, 2, ',', '.') . "</td>"
           
           // Coluna de quantidade com os botões de - e +
           . "<td align='center'>"
           . "<form method='POST' action='alterar.php' style='display:inline;'>"
           . "<input type='hidden' name='operacao' value='diminuir'>"
           . "<input type='hidden' name='cd_ingredientes' value='$cd'>"
           . "<input type='submit' value=' - '>"
           . "</form>"
           . " <span style='margin: 0 10px;'>$quantidade</span> "
           . "<form method='POST' action='alterar.php' style='display:inline;'>"
           . "<input type='hidden' name='operacao' value='aumentar'>"
           . "<input type='hidden' name='cd_ingredientes' value='$cd'>"
           . "<input type='submit' value=' + '>"
           . "</form>"
           . "</td>"

           // Exibe o preço total calculado
           . "<td>R$ " . number_format($total_ingrediente, 2, ',', '.') . "</td>"

           // Botão de Confirmar/Ação individual
           . "<td>"
           . "<form method='POST' action='alterar.php'>"
           . "<input type='hidden' name='operacao' value='confirmar'>"
           . "<input type='hidden' name='cd_ingredientes' value='$cd'>"
           . "<input type='submit' value='Confirmar'>"
           . "</form>"
           . "</td>"
           
           . "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Não há nenhum ingrediente encontrado.</p>";
}
?>

<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Totem de pedidos</title>
</head>
<body>
	<div class="container">
        <div class="confirmacao_pedido">
            <button id="cancelar" name="Cancelar"> Cancelar </button>
        </div>

        <div class="tipo_pedido">
            <button id="confirmar" name="Confirmar"> Finalizar </button>
        </div>
        <br>
	</div>
</body>
</html>