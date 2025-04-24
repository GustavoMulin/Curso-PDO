<?php 

// dados de ligação

use function PHPSTORM_META\sql_injection_subst;

$database = 'udemy_loja_online';
$username = 'root';

// ligação
$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);

$username = $_POST['usuario'];
$passwrd = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE username = '$username' AND passwrd = '$passwrd'";

$resultados = $ligacao->query($sql)->fetchAll(PDO::FETCH_OBJ);

// fechar ligação
$ligacao = null;

echo '<pre>';
print_r($resultados);
echo '<br>';

// analisar se houve login válido
if(count($resultados) == 0) {
    echo 'Login inválido.';
} else {
    echo 'Login OK!';
}

// agora vamos colocar a seguinte expressão na password: ' or ''='

echo '<br><br>' . $sql;
?>