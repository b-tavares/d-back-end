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
    
- Pacote JWT Auth:
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
DB_HOST=
DB_PORT=3306
DB_DATABASE=nome-bancodedados
DB_USERNAME=
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
> **/signup**
> 
Criação de conta. 
> post: **/login**
> 
Acesso à conta.

> post: **/logout**
> 
Sair da conta.

| **Rota** | **Método** | **Chaves** |
|---|---|---|
| auth/signup | POST | Nome; email; password. |
| auth/login | POST | Email; password. |
| auth/logout | POST |  |

### Clientes
___
> post: **/clients**
>
Listagem de todos/as os/as clientes cadastrados, contendo apenas dados principais, ordenados pelo ID. 
> post: **/client/new**
> 
Cadastro de novos/as clientes;
> post: **/client/{id}**
> 
Visualizar dados completos do cliente, incluindo endereço, assim como vendas ordenadas pela mais recente. Possível filtrar as vendas por mês && ano.
> put: **/client/edit/{id}**
> 
Editar dados principais de cliente já cadastrado.
> post: **/client/delete/{id}**
> 
 Deletar dados de cliente cadastrado, incluindo endereço e vendas.
 
| **Rota** | **Método** | **Chaves** |
|---|---|---|
| auth/clients | POST |  |
| auth/client/new | POST | Name; CPF; phone; email. |
| auth/client/{id} | POST |  |
| auth/client/edit/{id} | PUT | Name; phone; email. |
| auth/client/delete/{id} | POST |  |

### Endereços
___

> post: **/adress/new**
> 
Cadastro novo endereço vinculado a cliente já existente.
> put: **/adress/edit/{id}**
> 
Editar endereço de cliente já cadastrado.

| **Rota** | **Método** | **Chaves** |
|---|---|---|
| auth/adress/new | POST | Street; number; district; city; state; zipcode; client_id.  |
| auth/adress/edit/{id} | PUT | Street; number; district; city; state; zipcode. |

### Produtos
___

> post: **/products**
>
Listagem de todos os produtos cadastrados ordenados alfabeticamente, contendo apenas dados principais.

> post: **/products/new**
> 
Cadastro de novos produtos (livros).
> post: **/products/{id}**
> 
Visualizar informações completas do produto cadastrado.
> put: **/products/edit/{id}**
> 
Editar informações de produto já cadastrado.
> put: **/products/erase/{id}**
> 
Exclusão lógica (*soft delete*) de produto cadastrado.
> put: **/products/restore/{id}**
> 
Restaurar produto que foi deletado com *soft delete*.
> post: **/products/delete/{id}**
> 
 Deletar definitivamente produto cadastrado.

| **Rota** | **Método** | **Chaves** |
|---|---|---|
| auth/products | POST | Name; author; publisher; year; description; sku; price; quantity. |
| auth/product/new | POST |  |
| auth/product/{id} | POST |  |
| auth/product/edit/{id} | PUT | Name; author; publisher; year; description; sku; price; quantity. |
| auth/product/erase/{id} | POST |  |
| auth/product/restore/{id} | POST |  |
| auth/product/delete/{id} | POST |  |

 ### Vendas
___

> post: **/sales/new**
> 
Cadastro de nova venda de um produto a um cliente. Colunas de preço e preço total são preenchidos automaticamente a partir do *product_id*.
| **Rota** | **Método** | **Chaves** |
|---|---|---|
| auth/sale/new | POST | client_id; product_id; quantity. |

## Dificuldades encontradas
- Configuração JWT para autenticação e middleware. Resolvido através da [(documentação)](https://jwt-auth.readthedocs.io/en/develop/quick-start/) e pesquisa em fóruns.
- Filtro de pesquisa por data e hora de vendas, dentro da visualização individual do cliente. Resolvido através da documentação do [Laravel](https://laravel.com/docs/7.x/queries#where-clauses) e [Eloquent](https://laravel-docs-pt-br.readthedocs.io/en/latest/eloquent/#escopo-de-queryconsulta).
