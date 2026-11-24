
    <?php
    
    include_once('connection/conexao.php');
//var combos

$itens = [
    ["nome" => "Hambúrguer de Carne", "tipo" => "Hambúrguer", "preco" => 27.50, "id" => 1],
    ["nome" => "Hambúrguer com Bacon", "tipo" => "Hambúrguer", "preco" => 32.50, "id" => 2],
    ["nome" => "Hambúrguer de Frango", "tipo" => "Hambúrguer", "preco" => 27.50, "id" => 3]
    ["nome" => "Hambúrguer de Peixe", "tipo" => "Hambúrguer", "preco" => 26.25, "id" => 4],
    ["nome" => "Hambúrguer Double Cheese", "tipo" => "Hambúrguer", "preco" => 25.50, "id" => 5],
    ["nome" => "Hambúrguer Vegano", "tipo" => "Hambúrguer", "preco" => 24.75, "id" => 6]
    ["nome" => "Quarteirão", "tipo" => "Hambúrguer", "preco" => 36.60, "id" => 7],
    ["nome" => "Casquinha", "tipo" => "Sobremesa", "preco" => 3.00, "id" => 8],
    ["nome" => "Sundae", "tipo" => "Sobremesa", "preco" => 6.00, "id" => 9]
    ["nome" => "Batata Frita", "tipo" => "Acompanhamento", "preco" => 7.00, "id" => 10],
    ["nome" => "Nuggets", "tipo" => "Acompanhamento", "preco" => 5.00, "id" => 11],
    ["nome" => "Refrigerante", "tipo" => "Bedida", "preco" => 12.50, "id" => 12]
    ["nome" => "Suco", "tipo" => "Bedida", "preco" => 15.75, "id" => 13],
    ["nome" => "Água", "tipo" => "Bedida", "preco" => 4.00, "id" => 14]
    ["nome" => "Combo de Quarteirão, Fritas e Refri", "tipo" => "Combo", "preco" => 55.75, "id" => 15],
    ["nome" => "Combo de Double Cheese, Fritas e Refri", "tipo" => "Combo", "preco" => 40.35, "id" => 16],
    ["nome" => "Combo Full Meal", "tipo" => "Combo", "preco" => 40.35, "id" => 17]
];

$ingredientes = [
    ["nome" => "Bacon", "preco" => 2.50, "Iid" => 1],
    ["nome" => "Queijo", "preco" =>  1.00, "Iid" => 2],
    ["nome" => "Cebolas", "preco" => 1.50, "Iid" => 3],
    ["nome" => "Queijo Prato", "preco" => 2.50, "Iid" => 4],
    ["nome" => "Molho Verde", "preco" => 0.50, "Iid" => 5],
    ["nome" => "Ketchup", "preco" => 0.50, "Iid" => 6],
    ["nome" => "Mostarda", "preco" => 0.50, "Iid" => 7],
    ["nome" => "Maionese", "preco" => 0.50, "Iid" => 8],
    ["nome" => "Alho", "preco" => 0.75, "Iid" => 9],
    ["nome" => "Molho de Pimenta", "preco" => 1.50, "Iid" => 10],
    ["nome" => "Gergilhim", "preco" => 0.50, "Iid" => 11],
    ["nome" => "Cauda de Morango", "preco" =>  1.00, "Iid" => 12],
    ["nome" => "Cauda de Chocolate", "preco" =>  1.00, "Iid" => 13],
    ["nome" => "Cauda de Caramelo", "preco" =>  1.00, "Iid" => 14],
    ["nome" => "Amendoim", "preco" => 0.50, "Iid" => 15]
   
];



//var pedido


$itensped = $_POST['carrinho'];
$preco = $_POST['price'];
$qt = $_POST['qt'];
$subtotal = $preco * $qt;
$total = 0;


$carrinhoArray = [' '];




//add item_pedido
$carrinhoArray[] = $itens, $ingredientes;

//tirar um item
if (isset($_GET['id'])) {
    $idItem = $_GET['id'];
   

    if (isset($_SESSION['carrinho'][$idItem])) {
        unset($_SESSION['carrinho'][$idItem]);
        else{echo "falha ao remover produto."};
    }
}

if (isset($_GET['id'])) {
 $idIngre = $_GET['id'];

    if (isset($_SESSION['carrinho'][$idIngre])) {
        unset($_SESSION['carrinho'][$idIngre]);
        else{echo "falha ao remover produto."};
    }
}

else{echo "falha ao remover produto."};

carrinho(
if(isset($_POST['submit'])){

$sql = "INSERT INTO pedido SET
                  cd_pedido = '$itens',
                  quantidade = $qt,
                  preco_total = $total";

$res2 = mysqli_query($conexao, $sql);

    $_SESSION['pedido'] = "Pedido feito com sucesso!";
    header(../token/tela_inicio.html);
}
else{
    $_SESSION['pedido'] = "Pedido cancelado ou falha ao processar pedido.";
    header(../token/tela_inicio.html); } 

)



//add ingrediente

//delete ingrediente

?>