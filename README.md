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
 

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200
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
  Retorna o detalhamento do curso recebendo seu nome

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


**Autenticar Usuário**
----
  Autentica o usuário e retorna os dados do mesmo

* **URL**

  /login

* **Method:**

  `POST`
  
*  **URL Params**

   **Required:**
 
   None

* **Data Params**

  `email=[string]`

  `senha=[string]`

* **Success Response:**

  * **Code:** 200
  * **Content:** `[
  {
    "id": "8",
    "email": "roberto@email.com",
    "senha": "$2y$10$Fp0ZUlaVY/xAAty3iO369eodLCE7IlWuW68979vdTOXs5XI4dTCJ.",
    "nome": "Roberto"
  }
]`
 
* **Error Response:**
  * **Code:** 404
  * **Content:** `{
  "status": 404,
  "error": 404,
  "messages": {
    "error": "Email incorreto."
  }`

  * **Code:** 404
  * **Content:** `{
  "status": 404,
  "error": 404,
  "messages": {
    "error": "Senha incorreta."
  }
}`

**Registrar usuário**
----
  Registra um novo usuário no sistema

* **URL**

  /register

* **Method:**

  `POST`
  
*  **URL Params**

   **Required:**
 
   None

* **Data Params**

  `nome=[string]`

  `email=[string]`

  `senha=[string]`

* **Success Response:**

  * **Code:** 201
  * **Content:** `{
  "status": 201,
  "error": null,
  "messages": {
    "success": "Dados salvos"
  }
}`
 
* **Error Response:**


**Criar novo carrinho**
----
  Cria um carrinho vazio no sistema para um determinado usuário

* **URL**

  /carrinho

* **Method:**

  `POST`
  
*  **URL Params**

   **Required:**
 
   None

* **Data Params**

  `id_usuario=[int]`


* **Success Response:**

  * **Code:** 201
  * **Content:** `{
  "status": 201,
  "error": null,
  "messages": {
    "success": "Carrinho criado."
  }
}`
 
 * **Error Response:**

**Listar carrinhos**
----
  Lista todos os carrinhos registrados no sistema

* **URL**

  /carrinho

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   None

* **Data Params**


* **Success Response:**

  * **Code:** 200
  * **Content:** `[
  {
    "id": "1",
    "id_user": "9",
    "total": "1000"
  },
  {
    "id": "2",
    "id_user": "8",
    "total": "10"
  },
  {
    "id": "3",
    "id_user": "10",
    "total": "0"
  },
  {
    "id": "4",
    "id_user": "10",
    "total": "400"
  }
]`
 
* **Error Response:**


  * **Code:** 404
  * **Content:** `{
  "status": 404,
  "error": 404,
  "messages": {
    "error": "Nenhum carrinho com id: 10"
  }
}`

**Detalhar carrinho**
----
  Detalha os cursos do carrinho e o valor total do mesmo

* **URL**

  /carrinho/$id

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   `id_carrinho=[int]`

* **Data Params**
    

* **Success Response:**

  * **Code:** 200
  * **Content:** `{
  "produtos": [
    {
      "id": "8",
      "id_curso": "1",
      "nome": "Inglês",
      "categoria": "Línguas",
      "descricao": "Curso de Inglês",
      "preco": "200"
    }
  ],
  "total": [
    {
      "total": "200"
    }
  ]
}`
 
* **Error Response:**


  * **Code:** 404
  * **Content:** `{
  "status": 404,
  "error": 404,
  "messages": {
    "error": "Nenhum carrinho com id: 10"
  }
}`

**Adicionar curso no carrinho**
----
  Adiciona um curso existente no sistema à um determinado carrinho

* **URL**

  /carrinho/add

* **Method:**

  `POST`
  
*  **URL Params**

   **Required:**
 
   None

* **Data Params**

  `id_carrinho=[int]`

  `id_curso=[int]`


* **Success Response:**

  * **Code:** 201
  * **Content:** `{
  "status": 201,
  "error": null,
  "messages": {
    "success": "Curso adicionado ao carrinho."
  }
}`
 
* **Error Response:**

  * **Code:** 404
  * **Content:** `{
  "status": 404,
  "error": 404,
  "messages": {
    "error": "Carrinho não cadastrado."
  }
}`

  * **Code:** 404
  * **Content:** `{
  "status": 404,
  "error": 404,
  "messages": {
    "error": "Curso não cadastrado."
  }
}`

**Remover curso do carrinho**
----
  Remove um curso existente no sistema de um determinado carrinho

* **URL**

  /carrinho/remove

* **Method:**

  `DELETE`
  
*  **URL Params**

   **Required:**
 
   None

* **Data Params**

  `id_carrinho=[int]`

  `id_curso=[int]`


* **Success Response:**

  * **Code:** 201
  * **Content:** `{
  "status": 201,
  "error": null,
  "messages": {
    "success": "Curso removido do carrinho."
  }
}`
 
* **Error Response:**

  * **Code:** 404
  * **Content:** `{
  "status": 404,
  "error": 404,
  "messages": {
    "error": "Carrinho não cadastrado."
  }
}`

  * **Code:** 404
  * **Content:** `{
  "status": 404,
  "error": 404,
  "messages": {
    "error": "Curso não cadastrado."
  }
}`
 


## Autor
Vitor Alan de Lima Santos

## License
[MIT](https://choosealicense.com/licenses/mit/)
