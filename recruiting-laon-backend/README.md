## Backend Laravel API

### Requisitos Mínimos
- MySql 8
- PHP 8.0
- Composer 2.3

### Como instalar
Após realizar o clone do projeto, voce deve.

Adicionar o arquivo .env, voce pode copiar o .env-sample como exemplo. Adicionar as configurações de acesso ao seu banco de dados Mysql em:

    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=


Na raiz desta pasta rodar o comando

### `composer install`


Em seguida, executar as migrations para criar as tabelas no banco de dados:

### `php artisan migrate`


Por fim, executar os seeders para uma brevia população no bancod e dados:

### `php artisan db:seed`


Caso esteja rodando em localhost

###  `php artisan serve`

Irá iniciar um servidor desta aplicação que por padrão será na porta :8000


## Documentação da API
https://documenter.getpostman.com/view/2596673/Uz5JGagJ
