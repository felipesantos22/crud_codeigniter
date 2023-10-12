# Desafio Backend L5 Networks

## O que vou desenvolver?

Irei desenvolver uma API e um banco de dados para a produção de conteúdo para uma loja! Para isso irei usar PHP, MySql e Codeigniter.

Neste projeto irei:

- Desenvolver endpoints que estarão conectados ao banco de dados seguindo os princípios do REST;
- Trabalhar a relação cliente pedido e pedido produto.
- Trabalhar a relação de clientes para pedidos e de pedidos para produtos.

## Missão essencial

- [X] Desenvolver API até 17/10 com as melhores praticas possível.

## O que preciso saber para fazer o projeto?

- [x] Entender o conceito de Migrations
- [x] Entender o conceito de Model
- [x] Entender o conceito de Seeders
- [x] Entender relacionamentos 1:N
- [x] Entender relacionamentos N:N
- [x] Entender como criar uma rota com JWT

## Habilidades para o projeto

### _Vão ser necessárias para realização do projeto_

- [x] [Interface da aplicação com o banco de dados](https://app.betrybe.com/learn/course/5e938f69-6e32-43b3-9685-c936530fd326/module/94d0e996-1827-4fbc-bc24-c99fb592925b/section/0ca77b1d-4770-4646-8368-167d2305e763/day/0da9bd44-abf6-43d6-96b9-9614274e6c36/lesson/f0806ecc-6ea9-45e1-9c81-b92a60db9b6b)
- [x] [Associations 1:N](https://app.betrybe.com/learn/course/5e938f69-6e32-43b3-9685-c936530fd326/module/94d0e996-1827-4fbc-bc24-c99fb592925b/section/0ca77b1d-4770-4646-8368-167d2305e763/day/94e113d7-6a86-4536-a1d3-08f55f557811/lesson/1f2a47c4-5a3c-411c-89cd-27190966915e)
- [x] [Associations N:N e Transactions](https://app.betrybe.com/learn/course/5e938f69-6e32-43b3-9685-c936530fd326/module/94d0e996-1827-4fbc-bc24-c99fb592925b/section/0ca77b1d-4770-4646-8368-167d2305e763/day/22fa9643-5f27-41f5-943b-2c7cc1c67c01/lesson/be289f53-bd25-4a5f-817e-1770bbf006b4)
- [x] [Dia 04: JWT - (JSON Web Token)](https://app.betrybe.com/learn/course/5e938f69-6e32-43b3-9685-c936530fd326/module/94d0e996-1827-4fbc-bc24-c99fb592925b/section/0ca77b1d-4770-4646-8368-167d2305e763/day/85fd2ed3-f6cc-4789-8990-7f5fe827422c/lesson/c93a3302-ddd6-4927-8c09-bf5307b5c492)

## Requisitos obrigatórios do projeto

- [x] 1. Criar migrations para client, product, order e order_product
- [x] 2. Crie o models para client, product e order
- [x] 3. Endpoints de CRUD (Create, Read, Update e Delete) de client com os campos (CPF e/ou CNPJ, nome e/ou Razão social, endereço)
- [x] 4. Endpoints de CRUD (Create, Read, Update e Delete) de product
- [x] 5. Endpoints de CRUD (Create, Read, Update e Delete) de order, com status (Em Aberto, Pago ou Cancelado)

## Requisitos não eliminatórios

- [ ] 6. Implementar paginação e filtro de dados nos endpoints de listagem dos dados. Os dados poderão ser filtrados por qualquer campo.
- [ ] 7.	Implementar validação de token JWT com data de expiração. Este token pode ser gerado através do link https://jwt.io/ 
O token deve ser enviado para API através do header Authentication
- [ ] 8.	Integrar API(s) externas nos endpoints de cadastro/edição, como por exemplo:API(s) para consulta de dados de endereço por CEP


 ✌️
