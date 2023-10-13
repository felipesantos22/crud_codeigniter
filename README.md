# Desafio Backend L5 Networks

## O que vou desenvolver?

Irei desenvolver uma API e um banco de dados para uma loja! Para isso irei usar PHP, MySql e Codeigniter.

Neste projeto irei:

- Desenvolver endpoints que estarão conectados ao banco de dados seguindo os princípios do REST;
- Trabalhar a relação de clientes para pedidos e de pedidos para produtos.

## Missão essencial

- Desenvolver API até 17/10 com as melhores praticas possível.

## O que preciso saber para fazer o projeto?

-  Entender o conceito de Migrations
-  Entender o conceito de Model
-  Entender relacionamentos 1:N bidirecional entre Clientes e pedidos
-  Entender relacionamentos N:N entre pedidos e produtos
-  Entender como criar uma rota com JWT

## Requisitos obrigatórios do projeto

 1. Criar migrations para client, product, order e order_product
 2. Criar o models para client, product e order
 3. Endpoints de CRUD (Create, Read, Update e Delete) de client com os campos (CPF e/ou CNPJ, nome e/ou Razão social, endereço)
 4. Endpoints de CRUD (Create, Read, Update e Delete) de product
 5. Endpoints de CRUD (Create, Read, Update e Delete) de order, com status (Em Aberto, Pago ou Cancelado)

## Requisitos não eliminatórios

6. Implementar paginação e filtro de dados nos endpoints de listagem dos dados. Os dados poderão ser filtrados por qualquer campo.
7.	Implementar validação de token JWT com data de expiração. Este token pode ser gerado através do link https://jwt.io/ 
O token deve ser enviado para API através do header Authentication
8.	Integrar API(s) externas nos endpoints de cadastro/edição, como por exemplo:API(s) para consulta de dados de endereço por CEP


 ✌️
