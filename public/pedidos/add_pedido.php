<?php

include '../../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $id_restaurante = $_POST['id_restaurante'];
    $data_pedido = $_POST['data_pedido'];
    
    $sql = "INSERT INTO pedidos (id_cliente, id_restaurante, data_pedido) VALUES ('$id_cliente', '$id_restaurante', '$data_pedido')";
    if ($conn->query($sql) === TRUE) {
        echo "Pedido adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar pedido: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pedido</title>    
</head>
<body>
    <h2>Adicionar Pedido</h2>
    <form method="POST">
        <select name="cliente_id" required>
            <option value="">Selecione o Cliente</option>
            <?php
                $sql = "SELECT id FROM clientes";
                $clientes = $conn->query($sql);
                while ($cliente = $clientes->fetch_assoc()) {
            ?>

            <option value="<?php echo $cliente['id'];?>"><?php echo $cliente['nome'];?></option>


            <?php
                } 
            ?>

        <label for="id_restaurante">ID do Restaurante:</label>
        <input type="text" id="id_restaurante" name="id_restaurante" required>
        <br><br>
        <label for="data_pedido">Data do Pedido:</label>
        <input type="date" id="data_pedido" name="data_pedido" required>
        <br><br>
        <label for="valor">Valor do Pedido:</label>
        <input type="text" id="valor" name="valor" required>
        <br><br>
        <label for="status">Status do Pedido:</label>
        <select id="status" name="status" required>
            <option value="pendente">Pendente</option>
            <option value="em_preparo">Em Preparo</option>
            <option value="entregue">Entregue</option>
        </select>
        <br><br>
        <button type="submit">Cadastrar Pedido</button>
    </form>
    <br>
    <button type="button" onclick="window.location.href='../../index.php'">Voltar</button>
</body>
</html>

