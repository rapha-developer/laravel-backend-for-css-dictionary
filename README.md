<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Overview

[Overview](#overview)

- [Root Endpoint](#root-endpoint)
- [Authentication](#authentication)
- [Content-Type: JSON](#content-type-json)
- [API Rate Limit](#api-rate-limit)
- [Errors](#errors)

## Root Endpoint

<p align="left">The (Laravel Backend for CSS Dictionary) API root endpoint have only welcome's response for user. Please refer to the table below for the appropriate endpoint.</p>

<p align="left"><i>"O (Laravel Backend for CSS Dictionary) API endpoint raiz possui apenas uma resposta de boas vindas para o usuário. Por favor, consulte a tabela abaixo para obter o endpoint apropriado."</i></p>

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

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
