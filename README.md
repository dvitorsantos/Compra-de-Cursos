# Compra de Cursos 🛒

API para sistema de compra de cursos.


**Listar Cursos**
----
  Retorna todos os cursos cadastrados

* **URL**

  /cursos

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   `id=[integer]`

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
  * **Content:** `[
  {
    "id": "1",
    "nome": "Inglês",
    "descricao": "Curso de Inglês",
    "categoria": "Línguas",
    "preco": "200",
    "imagem": null,
    "created_at": "2021-08-19 18:14:25.858698"
  },
  {
    "id": "2",
    "nome": "Libras",
    "descricao": "Curso de Libras",
    "categoria": "Línguas",
    "preco": "120",
    "imagem": null,
    "created_at": "2021-08-19 18:14:25.858698"
  }]`
 
* **Error Response:**

**Detalhar curso**
----
  Retorna todos os cursos cadastrados

* **URL**

  /cursos/:nome

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   `nome=[string]`

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200
  * **Content:** `[
  {
    "id": "4",
    "nome": "Java",
    "descricao": "Curso de Java",
    "categoria": "Programação",
    "preco": "4000",
    "imagem": null,
    "created_at": "2021-08-19 18:15:46.220768"
  }
]`
 
* **Error Response:**
 * **Code:** 404 <br />
    **Content:** `{
  "status": 404,
  "error": 404,
  "messages": {
    "error": "Nenhum curso cadastrado com nome javae"
  }
}`


**Listar usuarios**
----
  Retorna todos os usuarios cadastrados

* **URL**

  /usuarios

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   None

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200
  * **Content:** `[
  {
    "id": "8",
    "email": "roberto@email.com",
    "senha": "$2y$10$Fp0ZUlaVY/xAAty3iO369eodLCE7IlWuW68979vdTOXs5XI4dTCJ.",
    "nome": "Roberto"
  },
  {
    "id": "9",
    "email": "vitor@gmail.com",
    "senha": "$2y$10$Rh1/AY1SeZUwpqLrv0TQQev9FJlTS0l2APjXZAVpZ/qUr20C8Cc2i",
    "nome": "Vitor"
  }]`
 
* **Error Response:**

```bash
/login
```
#### (POST) Recebe email e senha para autenticação do usuário
```bash
/register
```
#### (POST) Recebe nome, email e senha para criação de um novo usuário
```bash
/carrinho
```
#### (GET) Lista todos os carrinhos

```bash
/carrinho/$id
```
#### (GET) Detalha o carrinho pelo id


```bash
/carrinho/add
```
#### (GET) Recebe id do curso e id do carrinho para adicionar no carrinho

```bash
/carrinho/remove
```
#### (GET) Recebe id do curso e id do carrinho para remover o curso do carrinho

## Autor
Vitor Alan de Lima Santos

## License
[MIT](https://choosealicense.com/licenses/mit/)
