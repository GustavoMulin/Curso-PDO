<?php

// CONTROLAR COMUNICAÇÕES COM TRANSAÇÕES

/*
Vê como é simples controlar eventuais erros num processo
de comunicação.
Adicionei um beginTransaction() antes de iniciar as comunicações.
Depois as comunicações.
No final, não existindo nenhum erro, surge o commit()
o commit() vai consolidar na base de dados todas as comunicações definidas.

No caso de acontecer um erro, como é o caso, as 3 primeiras inserções
não vão ser aplicadas, porque vai ser disparada a exceção e, dentro do
bloco do catch, temos um rollback.

O rollBack() indica que tudo o que foi inserido com sucesso, dentro da
transação, deve ser revertido.
*/

// dados de ligação
$database = 'udemy_loja_online';
$username = 'root';

// ligação
$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);

try {
    $ligacao->beginTransaction();
    $ligacao->exec("INSERT INTO usuarios VALUES(0,'user4','444')");
    $ligacao->exec("INSERT INTO usuarios VALUES(0,'user5','555')");
    $ligacao->exec("INSERT INTO usuarios VALUES(0,'user6','666')");
    // erro proposital
    $ligacao->exec("INSERT INTO usuarios VALUES(0,'user7','777')");
    $ligacao->commit();
    echo "Tudo certo";

} catch (PDOException $e) {
    
    $ligacao->rollBack();
    echo "Aconteceu um erro no SQL!";
}