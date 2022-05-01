# Desafio Back-end
O desafio consiste em estruturar uma API RESTful e um banco de dados ligado a mesma. Trata-se de um sistema que permite cadastrar usuários externamente e, ao realizarem login, poderão registrar clientes, produtos e vendas. A linguagem escolhida foi PHP (Laravel).

## Requisitos

- [PHP 7+](https://www.php.net/downloads.php);
- MySQL (ou outro banco de dados relacional);
- [Composer](https://getcomposer.org/);
- [Laravel 8+](https://laravel.com/);
- [Postman](https://www.postman.com/downloads/);
- IDE: [VSCode](https://code.visualstudio.com/download) ou outra.

## Como rodar

- Clone este repositório digitando o seguinte comando no terminal:
```
git clone https://github.com/b-tavares/desafio-back-end.git
```

- Instale o composer digitando o seguinte comando no terminal:
```
composer install
```

O autoload do Composer pode ser atualizado pelo código:
    ```
    composer dumpautoload
    ```
    
- Pacote JWT Auth [(documentação)](https://jwt-auth.readthedocs.io/en/develop/).
    - Instalação:
    ```
    composer require tymon/jwt-auth
    ```
    - Publicação:
    ```
    php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
    ```
    - Chave JWT:
    ```
    php artisan jwt:secret
    ```
   
- Configure o banco de dados da aplicação através do arquivo .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome-bancodedados
DB_USERNAME=root
DB_PASSWORD=
```

- Suba a tabela para o MySQL (ou outro banco de sua escolha):
```
php artisan migrate
```

- Inicie o servidor digitando o seguinte comando no terminal:
```
php artisan serve
```

## Rotas

- ### Usuários

    #### **/signup** _criação de conta_
    | **Rota**        | **Método** | **Chaves**            |
    |-----------------|------------|-----------------------|
    | api/auth/signup | POST       | Name; email; password |


    #### **/login** _acesso à conta_
    | **Rota**        | **Método** | **Chaves**            |
    |-----------------|------------|-----------------------|
    | api/auth/login  | POST       | Email; password       |

    #### **/logout** _sair da conta_
    | **Rota**        | **Método** | 
    |-----------------|------------|
    | api/auth/logout | POST       | 

- ### Clientes
    <br>
    #### **/clients** _listagem de todos os clientes_
    | Rota | Método |
    |---|---|
    | /auth/clients | POST |

### Endereços

### Produtos

### Vendas


## Dificuldades encontradas
