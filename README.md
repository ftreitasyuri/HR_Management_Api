# API de Gestão de Funcionários

---

Bem-vindo à API de Gestão de Funcionários! Este projeto é uma API RESTful desenvolvida com Laravel 12 e utiliza Laravel Sanctum para autenticação e proteção de rotas.

## Sobre o Projeto

Este é a **versão 1 (v1)** do projeto, focado na gestão de informações de funcionários. A API fornece autenticação login e logout e a possibilidade de listas, cadastrar editar e exluir os dados dos funcionários,

## Tecnologias Utilizadas

-   **Laravel 12**: Framework PHP para desenvolvimento web.
-   **Laravel Sanctum**: Pacote de autenticação para SPAs, aplicativos móveis e APIs simples baseadas em token.
-   **PHP**: Linguagem de programação.
-   **MySQL**: Sistema de gerenciamento de banco de dados.

## Funcionalidades da v1

-   **Autenticação de Usuários**: Login e Logout tanto na api quando na web
-   **Gestão de Funcionários**: \* Criação de novos registros de funcionários.
    -   Visualização de funcionários (individuais e listagem).
    -   Atualização de informações de funcionários.
    -   Exclusão de registros de funcionários.
-   **Próximas features**:
    -   Crud do usuário    
    -   Controller para os dados para dashboard
-   **Proteção de Rotas**: Todas as rotas de gerenciamento de funcionários são protegidas por autenticação via token.

## Primeiros Passos

Siga as instruções abaixo para configurar e executar o projeto em sua máquina local.

### Pré-requisitos

Certifique-se de ter os seguintes softwares instalados:

-   PHP >= 8.2
-   Composer
-   Node.js e NPM
-   Um sistema de banco de dados (MySQL, PostgreSQL, SQLite, etc.)

### Instalação

1.  **Clone o repositório:**

    ```bash
    git init
    git clone https://github.com/ftreitasyuri/APIs.git
    cd nome-do-projeto
    ```

2.  **Instale as dependências do Composer:**

    ```bash
    composer install
    ```

3.  **Copie o arquivo de ambiente e configure-o:**

    ```bash
    cp .env.example .env
    ```

    Abra o arquivo `.env` e configure suas credenciais de banco de dados, `APP_URL` e outras variáveis de ambiente necessárias.

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=smte_hr_management
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4.  **Gere a chave da aplicação:**

    ```bash
    php artisan key:generate
    ```

5.  **Execute as migrações do banco de dados:**

    ```bash
    php artisan migrate
    ```

6.  **Seeder de dados:**
    Para popular o banco de dados com alguns dados de exemplo, execute o seeder:

    ```bash
    php artisan db:seed

    ```

7.  **Inicie o servidor de desenvolvimento:**

    ```bash
    php artisan serve
    php -S localhost:8000 -t public
    ```

8. **Para limpar caches**
````
composer clear-cache
composer install
composer dump-autoload -o

php artisan config-cache

```

## Uso da API

### Autenticação

Para acessar as rotas protegidas, você precisará obter um token de autenticação.

-   **Login de Usuário:** `POST /api/login`
    -   `email`, `password`

Após o login, você receberá um token de acesso que deve ser incluído no cabeçalho `Authorization` de todas as suas requisições subsequentes, no formato `Bearer {YOUR_TOKEN}`.

### Endpoints da API

Todos os endpoints de funcionários requerem autenticação.

-   **Listar todos os funcionários:** `GET /api/funcionarios`
-   **Criar um novo funcionário:** `POST /api/funcionarios`
    - Para ver os campos use a migration de funcionários ou a model, porque são muitos campos
-   **Obter um funcionário específico:** `GET /api/funcionarios/{id}`
-   **Atualizar um funcionário:** `PUT /api/funcionarios/{id}`
    -  Para ver os campos use a migration de funcionários ou a model, porque são muitos campos
-   **Excluir um funcionário:** `DELETE /api/funcionarios/{id}`

---

## Contribuição

Contribuições são bem-vindas! Se você tiver alguma sugestão, melhoria ou encontrar um bug, sinta-se à vontade para abrir uma _issue_ ou enviar um _pull request_.


**Desenvolvido por:** [Yuri Freitas / SmartTechEnterprise]
**Data:** Junho de 2025
