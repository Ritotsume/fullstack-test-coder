# Fullstack teste

## Requerimentos:
- Basicamente os mesmos do Laravel que podem ser consultados aqui: [Laravel](https://laravel.com/docs/8.x/deployment#server-requirements)

Abaixo segue uma lista do que foi usado para desenvolver a solução:

## No Backend
- Laravel 8
- Bootstrap 4
- SBAdmin 2 (Template)


### Motivo pelo qual foram usados tais itens no Backend
- **Laravel**: por ser um framework de fácil manuseio, com uma gama de recursos bastante ampla.
- **Bootstrap 4**: é um framework bastante conhecido para criação de páginas web, tem uma gama de recursos bem ampla e permite a criação de páginas bonitas com bastante facilidade.
- **SBAdmin 2**: um template de dashboard simples, que mesmo nessa simplicidade já permite adiantar alguma coisa na parte do desenvolvimento.


## No Frontend
- Vue
- Vue Router
- Bootstrap Vue
- vue-the-mask
- moment.js

### Motivo pelo qual foram usados tais itens no Frontend
- **Vue**: pela simplicidade e praticidade em criar os componentes que irão compor o frontend.
- **Vue Router**: pra adicionar as rotas, por exemplo, dos posts, a página single dos posts e a página de contato.
- **Bootstrap Vue**: uma implementação bastante prática para se usar o Bootstrap com o Vue, traz componentes, diretivas, etc. Permite adicionar componentes de maneira rápida.
- **The Mask**: utilizei esse somente pelo fato de haver o campo de telefone no form de contato. The Mask possui uma vasta gama de máscaras para os mais diversos tipos de campos de formulário, de CPF a telefones. Nessa aplicação *The Mask* foi usado como uma diretiva no componente `Contact.vue`.
- **moment.js**: para formatação das datas nos posts. Foi criado um filtro para uso na aplicação. O filtro recebe dois parâmetros, sendo eles: uma String contendo a data em si e o formato para se apresentar essa data.

## Para implementar o projeto

Você deverá clonar esse repositório, após esse passo, siga as instruções abaixo:

### Backend
Na pasta `backend` execute os comandos que seguem:

Para ambiente que NÃO seja de produção:
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

>Maiores informações no arquivo [README.md](./backend/README.md) presente na pasta do `backend`.


### Frontend
Na pasta `frontend` execute os comandos que seguem:

>**Atenção**: antes de executar `npm run serve`, lembre-se de alterar os links nos arquivos que fazem as requisições a API. São eles: `./src/views/AllPosts.vue`, `./src/views/SinglePost.vue` e `./src/views/Contact.vue`.


```
npm install
npm run serve
```

>Maiores informações no arquivo [README.md](./frontend/README.md) presente na pasta do `frontend`.

Usuário padrão **PARA TESTES** para acessar a área de admin.
>**email**: admin@admin.com   
>**pass**: password

Na pasta `screenshots` estão algumas imagens da aplicação sendo executada.
