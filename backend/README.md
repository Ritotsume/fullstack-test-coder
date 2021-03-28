# Backend Fullstack Test

Esse é o backend do projeto teste, com ele é possível:
- **No dashboard**:
- Cadastrar, visualizar, editar e excluir posts
- Visualizar informações de contato enviadas através de formulário, ou por meio de qualquer requisição POST feita para a API.


- **Na página inicial**:
- Apenas contém informações de como utilizar as requisições para a API.


Conforme descrito no arquivo [README.md](../README.md) que está na raiz desse repositório, alguns comandos devem ser executados para instalar as dependências do projeto. Seguem:

## Instalando as dependências do projeto e executando configurações iniciais

>**Atenção**: Os passos a seguir são para um ambiente de desenvolvimento.

```
composer install
```

>editar o arquivo `.env` e inserir as informações corretas do banco de dados. Crie o arquivo caso não exista, use `.env.example` como exemplo.

```
php artisan key:generate
php artisan storage:link
php artisan migrate:fresh --seed
php artisan test
npm install
npm run dev
```

>**Obs**: `php artisan db:seed` irá inserir *dummy data* (dados fictícios) no banco, inclusive o usuário para testes.

>**Obs2**: os teste de rotas visam apenas checar as principais rotas da aplicação referentes a API, que são: posts, o post específico e o envio de informações através do formulário de contato.


Para testar a aplicação, execute:
```
php artisan serve
```


Usuário padrão **PARA TESTES** para acessar a área de admin.
>**email**: admin@admin.com   
>**pass**: password
