# Fronted Fullstack Test

Esse é o frontend do teste fullstack feito em Vue, os detalhes do que foi usado na confecção dessa aplicação estão no arquivo [README.md](../README.md) na pasta raiz deste repositório.

>Recomendo visitar a pasta do `backend` antes de testar essa aplicação, uma vez que ela foi construída baseada na API que está na pasta `backend`.

## Project setup

Estando nessa pasta, execute o comando abaixo para instalar as dependências do projeto.

```
npm install
```

### Compilações e hot-reloads para ambiente de desenvolvimento
>**Atenção**: antes de executar o comando abaixo, lembre-se de alterar os links nos arquivos que fazem as requisições a API. São eles: `./src/views/AllPosts.vue`, `./src/views/SinglePost.vue` e `./src/views/Contact.vue`.

A critério de testes, execute o comando abaixo para testar essa aplicação.
```
npm run serve
```

### Para ambientes de produção
```
npm run build
```

### Para customizações e configurações
Veja [Configuration Reference](https://cli.vuejs.org/config/).

