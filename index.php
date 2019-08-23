<?php include('server.php');

// pega o registro a ser atualizado
if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $edicao = true;
    $query_registro = mysqli_query($db, "SELECT * FROM info WHERE ID=$id;");
    $registro = mysqli_fetch_array($query_registro);
    $id = $registro['ID'];
    $nome = $registro['NOME'];
    $endereco = $registro['ENDERECO'];
    $cidade = $registro['CIDADE'];
    $estado = $registro['ESTADO'];
    $pais = $registro['PAIS'];
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CRUD PHP com MySQL</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php if (isset($_SESSION['msg'])) : ?>
    <div class="msg">
        <?php
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            ?>
    </div>
    <?php endif ?>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>País</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($linha = mysqli_fetch_array($resultados)) { ?>
            <tr>
                <td><?php echo $linha['NOME']; ?></td>
                <td><?php echo $linha['ENDERECO']; ?></td>
                <td><?php echo $linha['CIDADE']; ?></td>
                <td><?php echo $linha['ESTADO']; ?></td>
                <td><?php echo $linha['PAIS']; ?></td>
                <td><a class="link-editar" href="index.php?editar=<?php echo $linha['ID']; ?>">Editar</a></td>
                <td><a class="link-excluir" href="index.php?excluir=<?php echo $linha['ID']; ?>">Excluir</a></td>
            <tr>
                <?php } ?>
        </tbody>
    </table>

    <form action="server.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="input-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" autocomplete="off" value="<?php echo $nome; ?>">
        </div>
        <div class="input-group">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" autocomplete="off" value="<?php echo $endereco; ?>">
        </div>
        <div class="input-group">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" autocomplete="off" value="<?php echo $cidade; ?>">
        </div>
        <div class="input-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" autocomplete="off" value="<?php echo $estado; ?>">
        </div>
        <div class="input-group">
            <label for="pais">País</label>
            <input type="text" name="pais" autocomplete="off" value="<?php echo $pais; ?>">
        </div>
        <div class="input-group">
            <?php if ($edicao == false) : ?>
            <button type="submit" class="btn-salvar" name="salvar">Salvar</button>
            <?php else : ?>
            <button type="submit" class="btn-atualizar" name="atualizar">Atualizar</button>
            <?php endif ?>
        </div>
    </form>
</body>

</html>