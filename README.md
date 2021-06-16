# API Inforce

## Projeto: 
API para conversão entre moedas. Moedas disponíveis: BRL, USD, EUR.

## Como usar:
O projeto se trata de uma API que traz a conversão entre as moedas selecionadas.
Seu uso é bem simples, basta dar um GET na URL: ```http://localhost:8000/api/converter/?base={moeda que será covertida}&to={para qual será convertida}&value={valor-desejado}```


<hr>

## Assíncrono:
As requisições são feitas pro backend de forma assíncrona, onde os resultados vem em tempo real sem que a página recarregue.

As requisições são feitas utilizando ajax, o código se encontra em `/public/js/script.js`

## Como rodar:

Para executar o projeto em sua máquina, onde tenha algum servidor, composer, php e MySQL

Com o projeto baixado, baixe as dependências com `composer update && composer install`.
Quando as dependências estiverem baixadas, copie o .env-example para um arquivo .env `cp .env-example .env`.

Será necessário criar um banco de dados, e editar as propriedades do .env para o seu ambiente, como seu login, senha e nome do banco.
Com o banco de dados criado, execute `php artisan migrate` para crirar as tabelas  e `php artisan db:seed` para popular as tabelas.

Com tudo pronto, execute `php artisan serve` e o projeto está pronto para ser usado!


## Dificuldades:
No backend, após pensar em toda a lógica de conversão, em usar o dólar como moeda coringa, o código fluiu naturalmente, depois adicionei as camadas de verificação.
No frontend eu encontrei maiores dificuldades, na parte de comunicação com o backend foi tranquilo, utilizei o javascript para tornar a requisição assíncrona, deixando bem moderno. 
Porém, para configurar um bom layou eu tive um pouco de dificuldade, já que design do frontend não é uma das minhas melhores habilidades, então tive que dedicar um bom tempo para terminar essa parte.


## Como funciona:

Após a escolha das moedas e escolha do valor, quando o usuário envia os dados, o javascript é responsável por fazer uma requisição para a API com esses dados. Essa API pega os valores pelo método GET, procura a moeda em seu banco de dados e faz uma série de verificações, como se as moedas selecionadas existem no banco e se o valor é valido, caso de erro, ele envia uma mensagem de erro amigável para o usuário no frontend.
Após essa verificação, a API pega os valores das moedas, cotadas em dólar para adotar um padrão, e os coloca em um algoritmo que retorna o valor da conversão, devolvendo esse valor para o javascript em formato JSON, que por fim é reponsável por colocar esse valor na tela.
