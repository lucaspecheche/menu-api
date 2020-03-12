<p align="center">
  <img src="https://menu.com.vc/media/store/logo/websites/1/Imagem1.png" width="200">
</p>

<hr>

**Desafio:** [Menu FullStack Challenge](https://github.com/ztech-company/fullstack-challenge)


**Ferramentas Utilizadas:**
 - Framework [Laravel 7](https://laravel.com);
 - Banco [Sqlite](https://www.sqlite.org/index.html);
 - Testes com [PHPUnit](https://phpunit.de);

#### Instalação e Configurações

Se você utiliza Linux, hoje sua vida será um pouco melhor. 👊
- Instalar [Docker](https://www.docker.com/get-started)
- **Linux**:  `make start` ou `bash ./init.bash` e ele irá fazer tudo para você.
- **Windows**: 
    - `docker-compose up -d`
    - `docker exec -ti menu-php bash -c "composer env"`
    - `docker exec -ti menu-php bash -c "composer install"`
    - `docker exec -ti menu-php bash -c "php artisan migrate"`
    - `docker exec -ti menu-php bash -c "php artisan db:seed"`

API será iniciada na porta `8000`
[Agora vamos lá ver?](http://localhost:8000)

#### Executar Testes:
- `docker exec -ti menu-php bash -c "composer tests"`
