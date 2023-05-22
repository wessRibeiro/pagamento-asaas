#requisitos no ambiente homolog do ASAAS
- Crie uma conta no Asaas Sandbox( https://sandbox.asaas.com/ )
- Crie ao menos um Customer para salva-lo na base **(obrigatório)**
- Adicione sua key da ASAAS em .env ASAAS_API_KEY
- garanta as configs de banco:
`
  DB_CONNECTION=mysql
  DB_HOST=db
  DB_PORT=3306
  DB_DATABASE=laravel
  DB_USERNAME=root
  DB_PASSWORD=root
`
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
docker exec pagamento-asaas-app-1 php artisan migrate
docker exec pagamento-asaas-app-1 php artisan db:seed
```

###testes
alguns testes foram criados para demonstração execute o comando abaixo para verificar\
`docker exec pagamento-asaas-app-1 php artisan test`


Acessar o backend
[http://localhost:80](http://localhost:80)

Acessar o admin de banco de dados
[http://localhost:8080](http://localhost:8080)


