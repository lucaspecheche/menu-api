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
- **Windows**: `docker-compose up -d && docker exec -ti menu-php bash -c "composer env && composer install && php artisan migrate && php artisan db:seed"`
- API será iniciada na porta `8000`

Agora vamos lá ver? [Seguir para o App](http://localhost:8000)

#### Retornos Padronizados:
```
//200
{
  "message": "Success",
  "data": [
    ....
   ]
}
```

```
{
  "shortMessage": "invalidData",
  "message": "O campo email é obrigatório.",
  "description": [
    "O campo email é obrigatório.",
    "O campo first name é obrigatório.",
    "O campo last name é obrigatório."
  ]
}
```

#### Executar Testes:
- `docker exec -ti menu-php bash -c "composer tests"`
