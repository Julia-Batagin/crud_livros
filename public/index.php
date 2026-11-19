<?php 
require_once __DIR__ . '/../repositories/LivroRepository.php';

$repo = new LivroRepository();
$livro = $repo->listar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Livros</title>
    <style>
        body {
        margin: 0;
        padding: 40px 55px;
        background-color: #f3edf5;
        font-family: Arial, sans-serif;
        color: #4b1f5f;
    }

    h1 {
        color: #5b176f;
        font-family: Georgia, serif;
        font-size: 42px;
        margin-bottom: 25px;
    }

    a {
        color: #6b2380;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        color: #a13bb8;
        text-decoration: underline;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 25px;
        background-color: #ffffff;
        box-shadow: 0 4px 12px rgba(80, 30, 90, 0.12);
    }

    th {
        background-color: #dca8e6;
        color: #4b145d;
        font-family: Georgia, serif;
        font-size: 19px;
        padding: 14px 12px;
        border: 1px solid #b95bc8;
    }

    td {
        padding: 15px 12px;
        border: 1px solid #d8b5dd;
        color: #4d3153;
    }

    tr:hover td {
        background-color: #f8f0fa;
    }

    td a {
        color: #5d1675;
        margin-right: 8px;
    }

    td a:hover {
        color: #a52bbd;
    }

    h1::after {
        content: " 📚";
    }
    </style>
</head>

<body>

    <h1>Sistema de Cadastro de Livros 📚</h1>

    <nav>
        <a href="index.php">📝Listar Livros</a>
        <a href="criar.php">➕Novo Livro</a>
    </nav>

    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Gênero</th>
            <th>Ano Publicação</th>
        </tr>

        <?php foreach ($livro as $l): ?>
            <tr>
                <td><?= $l['id'] ?></td>
                <td><?= $l['titulo'] ?></td>
                <td><?= $l['autor'] ?></td>
                <td><?= $l['genero'] ?></td>
                <td><?= $l['ano_publicacao'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $l['id'] ?>">✏️ Editar</a> |
                    <a href="excluir.php?id=<?= $l['id'] ?>"
                       onclick="return confirm('Deseja excluir?')"><br>🗑️ Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>