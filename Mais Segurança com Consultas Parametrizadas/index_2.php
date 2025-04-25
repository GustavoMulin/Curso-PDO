<?php 

// MAIS SEGURANÇA COM CONSULTAS PARANETRIZADAS

// dados da ligação
$database = 'udemy_loja_online';
$username = 'root';

// ligação
$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);

$parametros = [
    ':u' => $_POST['username'],
    ':p' => $_POST['password']
];

$comando = $ligacao->prepare("SELECT * FROM usuarios WHERE username = :u AND passwrd = :p");
$comando->execute($parametros);
$resultados = $comando->fetchAll(PDO::FETCH_OBJ);

echo '<pre>';
print_r($resultados);

if(count($resultados) == 0) {
    echo 'Login inválido.<br>';
} else {
    echo 'Login OK!<br>';
}

// vamos testar a expressão ' or ''=' no campo da password
// já não vamos ter o problema anterior