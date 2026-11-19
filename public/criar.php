<?php 
require_once __DIR__ . '/../repositories/LivroRepository.php';

if($_POST){
    $livro = new Livro(
        $_POST['titulo'],
        $_POST['autor'],
        $_POST['genero'],
        $_POST['ano_publicacao'],
    );

    (new LivroRepository())->criar($livro);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Livro</title>
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
            margin-bottom: 15px;
        }

        h1::after {
            content: " 📚";
        }

        .voltar {
            color: #6b2380;
            text-decoration: none;
            font-weight: bold;
            font-size: 17px;
            display: inline-block;
            margin-bottom: 25px;
        }

        .voltar:hover {
            color: #a13bb8;
            text-decoration: underline;
        }

        form {
            width: 600px;
            background-color: #ffffff;
            padding: 30px;
            border: 1px solid #d8b5dd;
            box-shadow: 0 4px 12px rgba(80, 30, 90, 0.12);
        }

        input {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #d8b5dd;
            font-size: 16px;
            color: #4d3153;
        }

        input:focus {
            outline: none;
            border-color: #8e2ca5;
        }

        input::placeholder {
            color: #8d6d93;
        }

        button {
            background-color: #6b2380;
            color: white;
            border: none;
            padding: 12px 22px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #8e2ca5;
        }

    </style>
</head>
<body>

    <h1>Criar Livro</h1>

    <a href="index.php" class="voltar"> ← Voltar</a>

    <form action="" method="post">
        <input type="text" name="titulo" id="titulo" placeholder="Título">
        <input type="text" name="autor" id="autor" placeholder="Autor">
        <input type="text" name="genero" id="genero" placeholder="Gênero">
        <input type="number" name="ano_publicacao" id="ano_publicacao" placeholder="Ano Publicação">
        <button type="submit">Salvar</button>

    </form>

</body>
</html>
