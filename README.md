#para o backend

Crie o Arquivo .env
```sh
cp .env.example .env
```

Suba os serviços
```sh
bash up.sh
```


instale as dependencias do laravel
```sh
docker exec pagamento-asaas-app-1 composer install
```

gere a chave
```sh
docker exec pagamento-asaas-app-1 php artisan key:generate
```

Acessar o backend
[http://localhost:80](http://localhost:80)

Acessar o frontend
[http://localhost:3000](http://localhost:300)

Acessar o admin de banco de dados
[http://localhost:8080](http://localhost:8080)


