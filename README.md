## Teste tecnico - desafio Laravel.

### Tecnologias utilizadas:

- Laravel 8
- Docker
- VueJs 2
- Bootstrap 4.6

### Instalação
1 - Clonar repositorio
```bash
$ git clone https://github.com/aldaircerdeira2019/desafio_laravel.git
```

2 - criar arquivo .env igual o .env.example
```bash
DB_CONNECTION=mysql
DB_HOST=mysql-app
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=laravel
```
3 - rodar o docker
```bash
docker-compose up -d
```

4 - entrar no container
```bash
docker exec -it desafiolaravel bash
```
5 - rodar as migrations
```bash
php artisan migrate
```
6 - rodar as seed
```bash
php artisan migrate --seed
```

7 - host http://localhost:8080/

### usuario para teste

    email = test@test.com.br

    senha = 12345678


obs: 

- se alterar a porta é necessario altera tambem no arquivo de configuração do sanctum, senão a autenticação não vai funcionar.
