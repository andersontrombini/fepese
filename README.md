# Laravel Product API

Bem-vindo à documentação da API Laravel para gerenciamento de produtos. Esta API permite a realização das operações básicas CRUD (Create, Read, Update, Delete) em produtos.

## Índice

1. [Requisitos](#requisitos)
2. [Instalação](#instalação)
3. [Configuração](#configuração)
4. [Endpoints](#endpoints)
    - [Listar Produtos](#listar-produtos)
    - [Detalhes do Produto](#detalhes-do-produto)
    - [Criar Produto](#criar-produto)
    - [Atualizar Produto](#atualizar-produto)
    - [Excluir Produto](#excluir-produto)
5. [Exemplos de Requisições](#exemplos-de-requisições)
6. [Considerações Finais](#considerações-finais)

## Requisitos

- PHP >= 7.4
- Composer
- Laravel >= 8.x
- Banco de dados MySQL ou SQLite

## Instalação

1. Clone este repositório:
   `bash`
   git clone https://github.com/seu-usuario/seu-repositorio.git
Instale as dependências do Composer:

```bash
Copy code
composer install
Copie o arquivo .env.example para .env e configure o banco de dados.

Gere a chave de aplicativo Laravel:

```bash
Copy code
php artisan key:generate
Execute as migrações e os seeders:

```bash
Copy code
php artisan migrate --seed
Configuração
A configuração da API é feita principalmente no arquivo .env. Certifique-se de configurar corretamente o banco de dados, cache e outras configurações necessárias.

Endpoints
Listar Produtos
Endpoint: GET /api/products

Retorna a lista de todos os produtos.

Detalhes do Produto
Endpoint: GET /api/products/{id}

Retorna os detalhes de um produto específico com base no ID.

Criar Produto
Endpoint: POST /api/products

Cria um novo produto com base nos dados fornecidos no corpo da requisição.

Atualizar Produto
Endpoint: PUT /api/products/{id}

Atualiza os detalhes de um produto específico com base no ID e nos dados fornecidos no corpo da requisição.

Excluir Produto
Endpoint: DELETE /api/products/{id}

Exclui um produto específico com base no ID.

Exemplos de Requisições
Aqui estão alguns exemplos de como interagir com a API usando cURL:

Listar Produtos:

bash
Copy code
curl -X GET http://localhost:8000/api/products
Detalhes do Produto:

bash
Copy code
curl -X GET http://localhost:8000/api/products/1
Criar Produto:

bash
Copy code
curl -X POST -H "Content-Type: application/json" -d '{"name":"Novo Produto","price":19.99,"description":"Descrição do novo produto"}' http://localhost:8000/api/products
Atualizar Produto:

bash
Copy code
curl -X PUT -H "Content-Type: application/json" -d '{"name":"Produto Atualizado","price":29.99,"description":"Nova descrição do produto"}' http://localhost:8000/api/products/1
Excluir Produto:

bash
Copy code
curl -X DELETE http://localhost:8000/api/products/1
Considerações Finais
Esta é uma API simples para CRUD de produtos em Laravel. Sinta-se à vontade para contribuir, relatar problemas ou propor melhorias. Obrigado por usar nossa API!
