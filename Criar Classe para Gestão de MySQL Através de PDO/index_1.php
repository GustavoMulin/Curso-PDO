<?php

/*
Esta foi a estrutura que usámos durante os primeiros vídeos deste módulo.
*/

// dados de ligação
$database = 'udemy_loja_online';
$username = 'root';

// ligação
$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);

// carregar os dados (em formato de array de objetos)
$resultados = $ligacao->query("SELECT * FROM clientes LIMIT 20")->fetchAll(PDO::FETCH_OBJ);

// fecha a ligação
$ligacao = null;

/*
Imagina que vais ter que conectar várias vezes à base de dados!
Vamos melhorar o nosso código. Vamos torná-lo modelar.
Vamos fazer ainda melhor: vamos criar uma classe que pode ser
usada em qualquer projeto.

Quermos:
- uma classe que possa ser usada em qualquer projeto
- que permita efetuar todas as operações CRUD SQL
- que permita fazer queries básicas ou parametrizadas
- que permita configurar a ligação, e a forma como os dados são devolvidos
- que controle erros e nos devolva essa informação
- que nos possa devolver outras informações relevantes

IMPORTANTE: Este exercício é um bom ponto de partida para criares a tua
própria classe. Podes usar este código como ponto inicial.
vai ficar completamente funcional mas NÂO DEVE USAR EM PRODUÇÃO.

*/