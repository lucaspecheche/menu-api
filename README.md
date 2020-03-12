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

#### Backlog:
- Adicionar resources de produtos;
- Ajustar barra de pesquisa global;
- Confirmar e-mail;
- Pedir endereço do cliente e fazer integração para consulta de CEP;
- Apresentar erros em Modal com mais informações;
- Criar CI com Git Actions;
- Migrar para Mysql (izi)
- Criar coleções utilizando MongoDB para os Pedidos;
- Criar relatórios por produtos mais vendidos.
- Criar relatórios de cliente/pedidos.

