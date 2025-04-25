<?php 

// CONTROLAR COMUNICAÇÕES COM TRANSAÇÕES

/*
A transação é um mecanismo processual de comunicação
com a base de dados no qual podemos efetuar um conjunto de
isntruções SQL e, caso acontece um erro, podemos "voltar atrás"
nas execuções que foram efetuada. No caso de haver sucesso,
podemos finalizar essas comunicações todas.

Vamos ver com um exemplo.
*/

// dados de ligação
$database = 'udemy_loja_online';
$username = 'root';

// ligação
$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);

try {
    $ligacao->exec("INSERT INTO usuarios VALUES(0,'user1','111')");
    $ligacao->exec("INSERT INTO usuarios VALUES(0,'user2','222')");
    $ligacao->exec("INSERT INTO usuarios VALUES(0,'user3','333')");
    // erro proposital
    $ligacao->exec("INSERT INTO users VALUES(0,'user4', '444')");

} catch (PDOException $err) {
    
    echo 'Aconteceu um erro no SQL!';
}