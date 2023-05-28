<h1 align="center">
  <img src="https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/99130786-151b-40c2-8039-958510d84fa0" alt="Laravel Backend For CSS Dictionary Logo" height="500" width="500">
</h1>
<p align="center">The Laravel Backend for CSS Dictionary is an API that brings together all the css properties, functions, effects and animations. Each collected code snippet has definition and examples for unique possible contexts.</p>

<p align="center"><i>"O Laravel Backend para dicionário CSS é uma API que reúne todas as propriedades, funções, efeitos e animações css. Cada trecho de código coletado possui definição e exemplos para singulares contextos possíveis.</i></p>

<p align="center">
    <a href="#">
        <img src="https://img.shields.io/badge/laravel-v10.11.0-FC6E51?logo=laravel&style=square" alt="Laravel version: v10.11.0">
   </a>
    <a href="#">
        <img src="https://img.shields.io/github/languages/top/rapha-developer/laravel-backend-for-css-dictionary?color=AC92EC&logo=php&logoColor=white" alt="Language most used: 76% of PHP">
    </a>
    <a href="https://rapha-developer-laravel.000webhostapp.com/">
        <img src="https://img.shields.io/badge/demo-online-brightgreen" alt="Click to check demo online">
    </a>
    <a href="#">
        <img src="https://img.shields.io/badge/Made%20with-%E2%9D%A4%EF%B8%8F-EC87C0.svg" alt="Made with love" />
    </a>
    <a href="#">
        <img src="https://img.shields.io/badge/license-MIT-1abc9c.svg" alt="License MIT" />
    </a> 
</p> 
<p align="center">
    <a href="#student-why">Why (por que?)</a> &nbsp;|&nbsp;
    <a href="#rocket-demo">Demo</a> &nbsp;|&nbsp;
    <a href="#desktop_computer-to-use">How to use? (Como usar)</a> &nbsp;|&nbsp;
    <a href="#clipboard-overview">Overview (Visão geral)</a> &nbsp;|&nbsp;
    <a href="#zap-about-laravel">About laravel</a> &nbsp;|&nbsp;  
    <a href="#pencil-license">License</a> 
</p>

## :student: **Why?**
<p align="left"><b>API: Application programming interface.</b><br />To learn how to create a web API with Laravel, with the basic functionalities of a <b>CRUD</b> (store, show, update and delete an element) for different css properties and their particular examples.</p><br />
<p align="left"><b>API: Interface de programação de aplicações.</b><br /><i>Para aprender a criar uma API web com Laravel, com as funcionalidades básicas de um <b>CRUD</b> (armazenar, mostrar, atualizar e deletar um elemento) para diferentes propriedades css e seus particulares exemplos.</i></p>
<br />

## :clipboard: Overview

[Overview](#overview)

- [Root Endpoint](#root-endpoint)
- [Authentication](#authentication)
- [Content-Type: JSON](#content-type-json)
- [API Rate Limit](#api-rate-limit)
- [Errors](#errors)

## Root Endpoint

<p align="left">The (Laravel Backend for CSS Dictionary) API root endpoint have only welcome's response for user. Please refer to the table below for the appropriate endpoint.</p>

<p align="left"><i>"A (Laravel Backend for CSS Dictionary) API endpoint raiz possui apenas uma resposta de boas vindas para o usuário. Por favor, consulte a tabela abaixo para obter o endpoint apropriado."</i></p>

Route name | Method | Endpoint
---------- | ------ | --------
API Root   | `GET`  | `/`

<br />

> #### Notes
> ######  Complete Endpoint
> ```bash
>   GET {website}/
> ```
> ######  Demo onlive (demonstração ao vivo)
> ```bash
>   https://rapha-developer-laravel.000webhostapp.com
> ```
> :point_right: <b>Ou</b> click [here](https://rapha-developer-laravel.000webhostapp.com)

<br />

## Authentication

### Public Routes
<p align="left">All public requests to the API can be accessed by any user. Even without needing any authentication. (Please, refer to the table below for the proper link).</p>
<p align="left"><i>Todas as solicitações públicas para a API podem ser acessadas por qualquer usuário. Inclusive, sem precisar de qualquer autenticação. (Por favor, consulte a tabela abaixo para obter o endpoint apropriado).</i></p>

Route name | Visibility | Method | Endpoint |  Description
---------- | ---------- | ------ | -------- | -------
Register user | `public` | `POST`  | `/register` | `Creates a user in database and generate a token for access protected routes.`
Login user | `public` | `POST` | `/login` | `Make login with the credentials {email, password} created by registered user`

<br />

> #### Notes
> ######  Complete Endpoint
> ```bash
>   POST {website}/register
> ```
> ######  Demo online (demonstração ao vivo)
> ```bash
>   https://rapha-developer-laravel.000webhostapp.com/register
> ```
> **AND** 
> ######  Complete Endpoint
> ```bash
>   POST {website}/login
> ```
> ######  Demo onlive (demonstração ao vivo)
> ```bash
>   https://rapha-developer-laravel.000webhostapp.com/login
> ```
<br />

### Protected Routes 
<p align="left">All protected requests to the API need an API token. Generate a token using <b>public routes</b> from API. (Please, refer to the table below for the proper link).</p>
<p align="left"><i>Todas as solicitações protegidas para a API precisam de um token de API. Gere um token usando <b>rotas públicas</b> da API. (Por favor, consulte a tabela abaixo para obter o endpoint apropriado).</i></p>

##### Properties routes

Route name | Visibility | Method | Endpoint
---------- | ---------- | ------ | --------
Properties.index | `protected` | `GET`  | `/properties`
Properties.store | `protected` | `POST` | `/properties`
Properties.show | `protected` | `GET` | `/properties/:id`
Properties.update | `protected` | `PATCH` | `/properties/:id`
Properties.delete | `protected` | `DELETE` | `/properties/:id`

##### Samples routes

Route name | Visibility | Method | Endpoint
---------- | ---------- | ------ | --------
Samples.index | `protected` | `GET`  | `/samples`
Samples.store | `protected` | `POST` | `/samples`
Samples.show | `protected` | `GET` | `/samples/:id`
Samples.update | `protected` | `PATCH` | `/samples/:id`
Samples.delete | `protected` | `DELETE` | `/samples/:id`

<br />

> #### Notes
> ######  The `bearer token` is sent in the Authorization header.
> ```bash
>   Authorization: Bearer 4|ViZeL2NUDQ3o9mbNCQPpGy7q0ZrHAjc2TNHEUcex 
> ```
:eyes: <b>Not use this token above, it just example!</b> :eyes: 
> ######  For example, using `Thunder Client` (VS Code extension) it would be:

https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/cf84fb36-0f6c-4a8a-a70f-b3472d8234eb

<br />

## Content-Type: JSON

<p align="left">Our REST API only supports <b>JSON content</b> for requests with a body and for responses.
For each request containing a body with JSON, you will need to attach the <b>header options below</b>:</p>
<p align="left"><i>Nossa API REST suporta apenas <b>conteúdo JSON</b> para solicitações com um corpo e para respostas.
Para cada requisição contendo corpo com JSON, você precisará anexar as <b>opções de cabeçalho abaixo</b>:</i></p>

| Header          | Value       |
| --------------- | ----------------- |
| `Accept` | `application/json` |
| `Content-Type`  | `application/json` |

<br />

> #### Notes
> ######  For example, using `Thunder Client` (VS Code extension) it would be:

<img src="https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/5c5db6d1-ef46-4d2e-a4a4-a2708eb2733d"
     alt="Photo with Content-Type=application/json in thunder client" width="500px" />

<br />

## Errors

<p align="left">The (Laravel Backend for CSS Dictionary) API can return the following errors:</p>
<p align="left"><i>A (Laravel Backend for CSS Dictionary) API pode retornar os seguintes erros:</i></p>

| Status Code | Description                                                           |  Solution
| ----------- | --------------------------------------------------------------------- | -------------------
| `401`       | <b>Unauthorized</b>: User has no token or token is not more valid.    | See [Authentication](#authentication).        |
| `403`       | <b>Forbidden</b>: User not have authorization to make this request. |  See [Authentication](#authentication).
| `404`       | <b>NOT FOUND.</b>                                                            |

<br />

## Endpoint Reference

### Register User
<p align="left">Register a new User</p>

##### Body Parameters

Name | Type | Status 
---- | ---------- | ------ 
name | `string` | `required` 
email | `email` | `required`  
password | `string` | `required`
password_confirmation | `string` | `required`  

> #### Notes
> - If you use an <b>email already registered</b>, you will get `422` error.
> - If you have success, you will get `200` status code.
> ######  For example, using `Thunder Client` (VS Code extension) it would be:

<img src="https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/6bc218bc-b606-4537-ae3d-be3a334f2c00"
     alt="Photo with response for register route" width="100%" />

<br />

### Login User
<p align="left">Login with the credentials of a registered user</p>

##### Body Parameters

Name | Type | Status 
---- | ---------- | ------ 
email | `email` | `required`  
password | `string` | `required`

> #### Notes
> - if you enter the <b>wrong</b> email or password, you will get `401` error.
> - If you have success, you will get `200` status code.
 ######  For example, using `Thunder Client` (VS Code extension) it would be:

<img src="https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/873dab4f-be12-4e2a-b945-c5142d4ddc02"
     alt="Photo with response for login route" width="100%" />

<br />

### All Properties
<p align="left">Select all properties stored by current user</p>

> #### Notes
> - if you enter with <b>invalid</b> token, you will get `401` error.
> - If you have success, you will get `200` status code.
 ######  For example, using `Thunder Client` (VS Code extension) it would be:

<img src="https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/4952f641-420e-4a6e-9398-2612cb5c886f"
     alt="Photo with response for all properties route" width="100%" />

<br />

### Store Property
<p align="left">Store a new property</p>

##### Body Parameters

Name | Type | Status 
---- | ---------- | ------ 
name | `string` | `required`  
description | `string` | `required`
category | `string` | `required`

> #### Notes
> - if you enter with <b>invalid</b> token, you will get `401` error.
> - If you have success, you will get `201` status code.
 ######  For example, using `Thunder Client` (VS Code extension) it would be:

<img src="https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/c148cdcf-6da5-4f2f-b060-888f79bd4d6a"
     alt="Photo with response for store property route" width="100%" />

<br />

### Show Single Property
<p align="left">Show single property by id</p>

##### URL Parameters

Name | Type | Status 
---- | ---------- | ------ 
id | `integer` | `required` 

> #### Notes
> - if you enter with <b>invalid</b> property id, you will get `404` error <b>(Not found exception)</b>.
> - If you have success, you will get `200` status code.
 ######  For example, using `Thunder Client` (VS Code extension) it would be:

<img src="https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/ca79ad7b-5a28-41dd-9752-7f1431fe8eff"
     alt="Photo with response for show single property route" width="100%" />

<br />

### Update Property
<p align="left">Update a property by id</p>

##### URL Parameters

Name | Type | Status 
---- | ---------- | ------ 
id | `integer` | `required` 

##### Body Parameters

Name | Type | Status 
---- | ---------- | ------ 
name | `string` | `optional`  
description | `string` | `optional`
category | `string` | `optional`

> #### Notes
> - if you enter with <b>invalid</b> property id, you will get `404` error <b>(Not found exception)</b>.
> - if you enter with property id from <b>another user</b>, you will get `403` error.
> - If you have success, you will get `200` status code.
 ######  For example, using `Thunder Client` (VS Code extension) it would be:

<img src="https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/47bd8c85-274e-47fa-8cc7-2b03d1d95e5a"
     alt="Photo with response for update property route" width="100%" />

<br />

### Delete Property
<p align="left">Delete a property by id</p>

##### URL Parameters

Name | Type | Status 
---- | ---------- | ------ 
id | `integer` | `required` 

> #### Notes
> - if you enter with <b>invalid</b> property id, you will get `404` error <b>(Not found exception)</b>.
> - if you enter with property id from <b>another user</b>, you will get `403` error.
> - If you have success, you will get `200` status code.
 ######  For example, using `Thunder Client` (VS Code extension) it would be:
 
<img src="https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/ac89d6e7-67a9-4afe-b2db-0cd6002fb569"
     alt="Photo with response for delete property route" width="100%" />

<br />

### All Samples
<p align="left">Select all samples stored by current user</p>

> #### Notes
> - if you enter with <b>invalid</b> token, you will get `401` error.
> - If you have success, you will get `200` status code.
 ######  For example, using `Thunder Client` (VS Code extension) it would be:

<img src="https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/71b5fb84-7dde-42ef-88c8-21863a2b76ea"
     alt="Photo with response for all samples route" width="100%" />
<br />

### Store Sample
<p align="left">Store a new Sample</p>

##### Body Parameters

Name | Type | Status 
---- | ---------- | ------ 
property_id | `integer` | `required`  
title | `string` | `required`
description | `string` | `required`
description_pt | `string` | `required`

> #### Notes
> - if you enter with property id from <b>another user</b>, you will get `403` error.
> - If you have success, you will get `201` status code.
 ######  For example, using `Thunder Client` (VS Code extension) it would be:

<img src="https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/9c3fd7bc-ce34-43d2-bdc9-f1edd4bd15c7"
     alt="Photo with response for store sample route" width="100%" />
<br />

### Show Single Sample
<p align="left">Show single sample by id</p>

##### URL Parameters

Name | Type | Status 
---- | ---------- | ------ 
id | `integer` | `required` 

> #### Notes
> - if you enter with <b>invalid</b> sample id, you will get `404` error <b>(Not found exception)</b>.
> - if you enter with id from <b>another user</b>, you will get `403` error.
> - If you have success, you will get `200` status code.
 ######  For example, using `Thunder Client` (VS Code extension) it would be:

<img src="https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/751fa4c5-ad4c-45a5-ac14-84826e8887ee"
     alt="Photo with response for show single sample route" width="100%" />
<br />

### Update Sample
<p align="left">Update a sample by id</p>

##### URL Parameters

Name | Type | Status 
---- | ---------- | ------ 
id | `integer` | `required` 

##### Body Parameters

Name | Type | Status 
---- | ---------- | ------ 
property_id | `integer` | `optional`  
title | `string` | `optional`  
description | `string` | `optional`
description_pt | `string` | `optional`

> #### Notes
> - if you enter with <b>invalid</b> sample id, you will get `404` error <b>(Not found exception)</b>.
> - if you enter with id from <b>another user</b>, you will get `403` error.
> - if you enter with property id from <b>another user</b>, you will get `403` error.
> - If you have success, you will get `200` status code.
 ######  For example, using `Thunder Client` (VS Code extension) it would be:

<img src="https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/3848f084-a3a4-4859-8b48-3b5bf227b79f"
     alt="Photo with response for update sample route" width="100%" />
<br />

### Delete Sample
<p align="left">Delete a sample by id</p>

##### URL Parameters

Name | Type | Status 
---- | ---------- | ------ 
id | `integer` | `required` 

> #### Notes
> - if you enter with <b>invalid</b> sample id, you will get `404` error <b>(Not found exception)</b>.
> - if you enter with sample id from <b>another user</b>, you will get `403` error.
> - If you have success, you will get `200` status code.
 ######  For example, using `Thunder Client` (VS Code extension) it would be:

<img src="https://github.com/rapha-developer/laravel-backend-for-css-dictionary/assets/91702283/401cca71-5616-4c9c-bd9b-75782d609068"
     alt="Photo with response for delete sample route" width="100%" />
<br />

## :zap: About Laravel

<p align="left">Laravel is a web application framework with expressive, elegant syntax. Laravel takes the pain out of development by easing common tasks used in many web projects.</p>
<p align="left">Laravel é um framework de aplicações web com sintaxe expressiva e elegante. O Laravel facilita o desenvolvimento facilitando tarefas comuns usadas em muitos projetos da web.</p>

## :pencil: **License**

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
