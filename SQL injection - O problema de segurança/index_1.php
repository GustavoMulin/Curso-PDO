<?php 

    // SQL INJECTION - O PROBLEMA DE SEGURANÇA

    /*
    Nos recursos desta aula vai encontrar o ficheiro usuario.sql
    Vamos adicionar esta tabela à base de dados da udemy_loja_online.

    Adicionamos 3 usuários para simular um sistema de login.
    Neste vídeo vamos ver uma possível fragilidade das nossas
    queries que podem comprometer a segurança da aplicação.
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="index_2.php" method="post">
        <div>
            <label for="Usuario">Username</label>
            <input type="text" name="usuario">
        </div>
        <div>
            <label for="senha">Password</label>
            <input type="password" name="senha">
        </div>
        <div>
            <input type="submit" value="Entrar">
        </div>
    </form>

</body>
</html>