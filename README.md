# Projeto Marvel

Sistema de votação do melhor filme e serie da Marvel. 

Este projeto foi desenvolvido em Laravel 9, utilizando Sail, Sanctum, LiveWire e JetStream.

Para acessar, você deve acessar com uma conta google do gruponewway.



Como instalar: 

- Clone o repositório
- Execute o script:

        ./vendor/bin/sail up -d 

- Acesse http://localhost:8888


# Marvel API

Esta API disponibiliza:

    - Consultar filmes e series disponíves
    - Inserir filmes e series
    - Alterar nome e outras informações
    - Excluir filmes e series
    - Consultar filmes e series mais votados

## **Como utilizar**

Para algumas requisições, é necessário a utilização do token.

### Gerar Token

    - Acesse o Projeto Marvel
        - clique em seu nome (canto superior direito)
        - Profile
        - clique no botão Gerar Api Token

## **Filmes**
 
### Buscar filmes

>GET
 
```
/api/movies
```
*Parâmetro*

Campo| Tipo | Descrição
:----------|:------|:------
name    *(Opcional)*|str | Digitar o nome ou parte do nome
id      *(Opcional)*|int| Digitar o id do filme

> **200** OK
```json
[
  {
    "id": 1,
    "name": "Homem de Ferro",
    "release_date": "2010-09-16",
    "created_at": "2022-04-07T18:37:47.000000Z",
    "updated_at": "2022-04-07T18:50:47.000000Z",
    "votes": null
  }
]
```

### Adicionar filme
> POST
```
/api/movies
```
**Header**
Campo | Tipo |  Descrição
:----------|:------|:------
Authorization|str | Token de acesso Bearer **Token**
Content-Type|str|multipart/form-data
Accept|str|application/json

**Parâmetro**
Campo | Tipo |  Descrição
:----------|:------|:------
name    |str | Digitar o nome completo
release_date      |Date| Data no formato AAAA-MM-DD


> **201** Created
```json
{
  "status": "success",
  "msg": "Filme inserido com sucesso!"
}
```
### Alterar filme
> PUT
```
/api/movies/:id_do_filme
```
**Header**
Campo | Tipo |  Descrição
:----------|:------|:------
Authorization|str | Token de acesso Bearer **Token**
Content-Type|str|application/x-www-form-urlencoded
Accept|str|application/json

**Parâmetro**
Campo | Tipo |  Descrição
:----------|:------|:------
name    *(Opcional)*|str | Digitar o nome completo
release_date      *(Opcional)*|Date| Data no formato AAAA-MM-DD


> **200** OK
```json
{
  "status": "success",
  "msg": "Informações do filme alteradas com sucesso!"
}
```

### Excluir filme
> DELETE
```
/api/movies/:id_do_filme
```
**Header**
Campo | Tipo |  Descrição
:----------|:------|:------
Authorization|str | Token de acesso Bearer **Token**
Accept|str|application/json

> **200** OK
```json
{
  "status": "success",
  "msg": "Filme excluído com sucesso!"
}
```
### Consultar filme mais votado
___
## **Series**
 
### Buscar Series

>GET
 
```
/api/series
```
*Parâmetro*

Campo| Tipo | Descrição
:----------|:------|:------
name    *(Opcional)*|str | Digitar o nome ou parte do nome
id      *(Opcional)*|int| Digitar o id do filme

> **200** OK
```json
[
  {
    "id": 1,
    "name": "Gavião Arqueiro",
    "release_date": "2021-12-22",
    "created_at": "2022-04-07T21:34:56.000000Z",
    "updated_at": "2022-04-07T21:34:56.000000Z",
    "seasons": 1,
    "votes": null
  }
]
```
### Adicionar serie
> POST
```
/api/series
```
**Header**
Campo | Tipo |  Descrição
:----------|:------|:------
Authorization|str | Token de acesso Bearer **Token**
Content-Type|str|multipart/form-data
Accept|str|application/json

**Parâmetro**
Campo | Tipo |  Descrição
:----------|:------|:------
name    |str | Digitar o nome completo
seasons    |int | Digitar a quantidade de temporadas
release_date      |Date| Data no formato AAAA-MM-DD


> **201** Created
```json
{
  "status": "success",
  "msg": "Série inserida com sucesso!"
}
```
### Alterar série
> PUT
```
/api/series/:id_da_serie
```
**Header**
Campo | Tipo |  Descrição
:----------|:------|:------
Authorization|str | Token de acesso Bearer **Token**
Content-Type|str|application/x-www-form-urlencoded
Accept|str|application/json

**Parâmetro**
Campo | Tipo |  Descrição
:----------|:------|:------
name    *(Opcional)*|str | Digitar o nome completo
seasons    *(Opcional)*|int | Digitar a quantidade de temporadas
release_date      *(Opcional)*|Date| Data no formato AAAA-MM-DD


> **200** OK
```json
{
  "status": "success",
  "msg": "Informações da série alteradas com sucesso!"
}
```

### Excluir série
> DELETE
```
/api/serie/:id_do_serie
```
**Header**
Campo | Tipo |  Descrição
:----------|:------|:------
Authorization|str | Token de acesso Bearer **Token**
Accept|str|application/json

> **200** OK
```json
{
  "status": "success",
  "msg": "Série excluída com sucesso!"
}
```
### Consultar série mais votada




