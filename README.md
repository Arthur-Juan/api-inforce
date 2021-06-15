# API Inforce

## Projeto: 
API para conversão entre moedas. Moedas disponíveis: BRL, USD, EUR.

## Como usar:
O projeto se trata de uma API que traz a conversão entre as moedas selecionadas.
Seu uso é bem simples, basta dar um GET na URL: ```http://localhost:8000/api/converter/?base={moeda que será covertida}&to={para qual será convertida}&value={valor-desejado}```


<hr>

## Assíncrono
As requisições são feitas pro backend de forma assíncrona, onde os resultados vem em tempo real sem que a página recarregue.

As requisições são feitas utilizando ajax, o código se encontra em `/public/js/script.js`

## Como rodar

Para executar o projeto em sua máquina, onde tenha algum servidor, composer, php e MySQL

Com o projeto baixado, baixe as dependências com `composer update && composer install`.
Quando as dependências estiverem baixadas, copie o .env-example para um arquivo .env `cp .env-example .env`.

Será necessário criar um banco de dados, e editar as propriedades do .env para o seu ambiente, como seu login, senha e nome do banco.
Com o banco de dados criado, execute `php artisan migrate` para crirar as tabelas  e `php artisan db:seed` para popular as tabelas.

Com tudo pronto, execute `php artisan serve` e projeto está pronto para ser usado!
