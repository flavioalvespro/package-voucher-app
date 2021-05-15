<p align="center"><a href="https://www.bitis.com.br/" target="_blank"><img src="https://cdn.shortpixel.ai/client/to_webp,q_lossless,ret_img/https://www.bitis.com.br/wp-content/themes/bitis/img/logo-bitis.png" width="400"></a></p>

## Sobre o projeto

Esse projeto trata-se de uma avaliação técnica da empresa Bitis

## Dependências

* PHP 7.2.*
* Laravel 7.x
* Composer
* MySQL

## Clonando e instalando as dependências

Clonando o Projeto
````bash
git clone https://github.com/flavioalvespro/package-voucher-app.git
````
Instalando dependências
````bash
composer install
````

## Configuração do .env

Necessário preencher a sessão do .env referente a base de dados criada em seu servidor MySQL a ser utilizada no projeto.

## Rodando migrations e Seeders

Após o preenchimento das informações de sua base de dados no .env, siga os passos abaixo para executar as migrations e seeders do projeto.

Executando migrations
````bash
php artisan migrate
````
Executando Seeders
````bash
php artisan db:seed
````

Após a execução das migrations e seeders você terá um cliente chamado Flávio Alves, e uma Oferta chamada Power Offer na sua base.

## Executando os Testes

No diretório tests/Feature/Api existem as classes de teste ClientTest, OfferTest, e VoucherTest. Antes de executar os testes é necessário preencher o arquivo phpunit.xml na raiz do projeto com o nome do seu servidor, no caso mysql e da base de dados criada no passo acima para validar os testes. Após configurar corretamenta, execute o comando:

Executando Testes
````bash
php artisan test
````

## Testando a REST API

Na raiz do projeto você encontrará no diretório ./conf o arquivo Bitis.postman_collection.json com a collection do Postman para ser utilizado nos testes

## Rodando o projeto

Para rodar o projeto em sua máquina, contando que você configurou o ambiente corretamente, basta rodar o comando

````bash
php artisan serve
````

Nesse momento a aplicação rodará na porta 8000 padrão do serve do laravel

