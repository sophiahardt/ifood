<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFood</title>
</head>
<body>
    <h2>Ifood</h2>

    <button type="button" onclick="window.location.href='public/cliente/add_cliente.php'">Adicionar Cliente</button>
    <button type="button" onclick="window.location.href='public/restaurantes/add_restaurante.php'">Adicionar Restaurante</button>
    <br>

    <h2>Lista de Clientes</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
        </tr>

        <?php
        include 'infra/conexao.php';
        $sql = "SELECT * FROM clientes";
        $clientes = $conn->query($sql);
        while ($cliente = $clientes->fetch_assoc()) {
        ?>

        <tr>
            <td><?php echo $cliente['id']; ?></td>
            <td><?php echo $cliente['nome']; ?></td>
            <td><?php echo $cliente['email']; ?></td>
            <td><?php echo $cliente['telefone']; ?></td>
            <td><?php echo $cliente['endereco']; ?></td>
            <td>
                <button type="button" onclick="window.location.href='public/cliente/edit_cliente.php?id=<?php echo $cliente['id']; ?>'">Editar</button>
                <button type="button" onclick="if (confirm('Tem certeza que deseja excluir este cliente?')) { window.location.href='public/cliente/delete_cliente.php?id=<?php echo $cliente['id']; ?>'; }">Excluir</button>
            </td>
        </tr>

        <?php
        }
        ?>

    <h2>Lista de Restaurantes</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Telefone</th>
            <th>Endereço</th>
        </tr>

        <?php
        $sql = "SELECT * FROM restaurantes";
        $restaurantes = $conn->query($sql);
        while ($restaurante = $restaurantes->fetch_assoc()) {
        ?>

        <tr>
            <td><?php echo $restaurante['id']; ?></td>
            <td><?php echo $restaurante['nome']; ?></td>
            <td><?php echo $restaurante['categoria']; ?></td>
            <td><?php echo $restaurante['telefone']; ?></td>
            <td><?php echo $restaurante['endereco']; ?></td>
            <td>
                <button type="button" onclick="window.location.href='public/restaurantes/edit_restaurante.php?id=<?php echo $restaurante['id']; ?>'">Editar</button>
                <button type="button" onclick="if (confirm('Tem certeza que deseja excluir este restaurante?')) { window.location.href='public/restaurantes/delete_restaurante.php?id=<?php echo $restaurante['id']; ?>'; }">Excluir</button>
            </td>
        </tr>

        <?php
        }
        ?>
    </table>



</body>
</html>