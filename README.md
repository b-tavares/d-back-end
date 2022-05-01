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
### Usuários
___
> post: **/signup**
> 
Criação de conta. 
> post: **/login**
> 
Acesso à conta.

> post: **/logout**
> 
Sair da conta.
<br>

### Clientes
___
> post: **/clients**
>
Listagem de todos/as os/as clientes cadastrados, contendo apenas dados principais. 
> post: **/client/new**
> 
Cadastro de novos/as clientes;
> post: **/client/{id}**
> 
Visualizar dados completos do cliente, assim como vendas recentes. Possível filtrar as vendas por mês && ano.
> put: **/client/edit/{id}**
> 
Editar dados de cliente já cadastrado.
> post: **/client/delete/{id}**
> 
 Deletar dados de cliente cadastrado, incluindo endereço e vendas.
 <br>

### Endereços
___

> post: **/adress/new**
> 
Cadastro novo endereço vinculado a cliente já existente.
> put: **/adress/edit/{id}**
> 
Editar endereço de cliente já cadastrado.
<br>

### Produtos
___
> post: **/products**
>
Listagem de todos os produtos cadastrados, contendo apenas dados principais.

> post: **/products/new**
> 
Cadastro de novos produtos;
> post: **/products/{id}**
> 
Visualizar informações completas do produto cadastrado.
> put: **/products/edit/{id}**
> 
Editar informações de produto já cadastrado.
> put: **/products/erase/{id}**
> 
Deletar (*soft delete*) produto cadastrado.
> put: **/products/restore/{id}**
> 
Restaurar produto que foi deletado com *soft delete*.
> post: **/products/delete/{id}**
> 
 Deletar definitivamente produto cadastrado.
 <br>
 ### Vendas
___

> post: **/sales/new**
> 
Cadastro de nova venda de um produto a um cliente.
<br>


## Dificuldades encontradas
