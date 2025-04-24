<?php 

// MAIS SEGURANÇA COM CONSULTAS PARANETRIZADAS

/*
No vídeo anterior vimos umas das principais falhas
evocadas no uso do PHP na sua conexão com o MySQL:
SQL Injection.

Para solucionar este problema, vamos voltar ao mesmo ecercício,
mas desta vez com a execução da query de uma forma diferente.
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
            <label for="Senha">Password</label>
            <input type="text" name="senha">
        </div>
        <div>
            <input type="submit" value="Entrar">
        </div>
    </form>

</body>
</html>