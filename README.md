
# Projeto Super Terminais

Este projeto é composto por backend Laravel, frontend Vue.js e banco de dados PostgreSQL, rodando em containers Docker.

## Tecnologias utilizadas

- **Laravel** (PHP) no backend  
- **Vue.js 3** no frontend  
- **Sanctum** para autenticação e segurança da API  
- **PostgreSQL** para banco de dados  
- **Docker** e **Docker Compose** para containerização  

## Requisitos

- Docker e Docker Compose instalado

## Como rodar o projeto

1. Clone o repositório

```bash
git clone https://github.com/JoaoToga/superterminais.git
cd superterminais
```

2. Execute o comando para construir e iniciar os containers

```bash
docker-compose up --build
```

3. O backend Laravel estará disponível em:  
http://localhost:8000

4. O frontend Vue.js estará disponível em:  
http://localhost:3000

## Comandos extras

- Parar containers:

```bash
docker-compose down
```

- Rodar migrations e seeders (dentro do container backend):

```bash
docker-compose exec laravel-backend php artisan migrate:fresh --seed
```

- Caso queira limpar tudo e recomeçar, pare os containers:

```bash
docker-compose down -v
```

## Importante

- Certifique-se que as portas 8000 (backend), 3000 (frontend) e 5433 (Postgres) estejam livres no seu sistema.

---


# Acesse pelo navegador

http://localhost:3000

O login padrao é email: admin@gmail.com e senha: 1234

# Imagens do Sistema de Teste Tecnico

## Tela 1 - Login
![1](https://github.com/user-attachments/assets/3706db6d-c1dd-4e3d-b2a5-fc6998d99e75)

## Tela 2 - Cadastro Empresa
![2](https://github.com/user-attachments/assets/1a2e21a8-6fd9-42d2-bb5f-a5e1fdcb9754)

## Tela 3 - Listagem Empresa
![3](https://github.com/user-attachments/assets/d6105d98-6dc8-489f-9f22-8010ff6bcb51)

## Tela 3 - Visualizaçao Empresa
![4](https://github.com/user-attachments/assets/8bd289b4-45cc-4737-b4e6-ad13685883e5)


