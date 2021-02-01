# Docker

Carregando Nginx, PHP-7.1, Mysql e PHPMyAdmin.

## Visão Geral

1. [Instalar Pré Requisitos](#pre-requisitos)

    Antes de executar o projeto, tenha certeza que os pré requisitos são atendidos.

2. [Clonar Projeto](#clonar-projeto)

    Baixe o código deste repositório no GitHub. 

3. [Rodar Projeto](#rodar-projeto)

    Com todos requisitos atendidos, aqui iniciamos o projeto.

___

## Pré Requisitos

Este projeto foi criado e testado no sistema operacional `Windows 10 64`. Entretando pode funcionar normalmente no Windows, Linux e MacOS.

Os requisitos abaixo devem estar disponíveis em seu sistema operacional:

* [Git](https://git-scm.com/downloads)
* [Docker](https://docs.docker.com/engine/installation/)
* [Docker Compose](https://docs.docker.com/compose/install/) `[Somente Windows]`

Confira se o `docker-compose` está instalado usando o comando abaixo: 

```sh
docker-compose
```

Confira a compatibilidade do Docker Compose:

* [Referência do Docker Compose versão 3](https://docs.docker.com/compose/compose-file/)

### Imagens Usadas

* [Nginx](https://hub.docker.com/_/nginx/)
* [PHP](https://hub.docker.com/_/php/)
* [MySQL](https://hub.docker.com/_/mysql/)
* [PHPMyAdmin](https://hub.docker.com/r/phpmyadmin/phpmyadmin/)

Este projeto funciona nas seguintes portas:

| Servidor   | Porta |
|------------|-------|
| Nginx      | 80    |
| PHP-FPM    | 9000  |
| MySQL      | 3306  |
| PHPMyAdmin | 8080  |

___

## Clonar Projeto

Com o [Git](http://git-scm.com/book/en/v2/Getting-Started-Installing-Git) instalado, clone o projeto com o comando abaixo:

```sh
git clone https://github.com/dovanirjr/docker-pjc.git
```

Acesse o diretório do projeto:

```sh
cd docker-pjc
```

### Estrutura do Projeto

```sh
.
├── data
│   └── mysql
├── etc
│   ├── mysql
│   │   └── Dockerfile
│   ├── nginx
│   │   └── Dockerfile
│   ├── php-fpm
│   │   └── Dockerfile
│   └── phpmyadmin
│       └── Dockerfile
├── www
│   └── public
│       └── index.php
├── .gitignore
├── docker-compose.yml
└── README.md
```

___

## Rodar Projeto

1. Iniciar aplicação:

    ```sh
    docker-compose up -d # Roda a aplicação em background
    ```

    **Aguarde, pode demorar vários minutos.**

    ```sh
    docker-compose logs -f # Imprime os logs da aplicação no terminal
    ```

2. Acesse no seu navegador:

    * [http://localhost](http://localhost/)
    * [http://localhost:8080](http://localhost:8080/) PHPMyAdmin (servidor: mysql, usuário: root, senha: root)

4. Parar e limpar serviços:

    ```sh
    docker-compose down -v
    ```

5. Instalação do Framework Laravel 7 e suas dependências:
    
    ```sh
    composer install
    ```

6. Renomear arquivo `.env.example` para `.env` dentro da pasta `www`

Obs.: para rodar as Migrations e os Seeders altere `DB_HOST` no `.env` para `localhost`, após as etapas 7 e 8 retorne para `mysql` para os testes da API.
Todos os comando a seguir devem serem executados dentro do diretorio `www`

7. Criando Tabelas no Banco:
    
    ```sh
    php artisan migrate


8. Populando as Tabelas no Banco:

    ```sh
    php artisan db:seed
    ```

