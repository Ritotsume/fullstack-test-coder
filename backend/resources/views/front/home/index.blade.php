@extends('front.layouts.front')

@section('content')
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Juvenal Feed API</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#apiNavbar"
        aria-controls="apiNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="apiNavbar">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="{{ route('login') }}">Login</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container content-api-page">
    <h1>Bem vindo a API Juvenal Feed!</h1>

    <p>
      Para usar a API apenas faça uma requisição GET para <code>{{ request()->getSchemeAndHttpHost() }}/api/posts</code>
      isso irá retornar um JSON como o mostrado a seguir:

      <pre class="code-one">
        <code>
          [
            {
                "id": 1,
                "title": "Lorem ipsum dolor",
                "excerpt": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed erat tortor, vehicula quis efficitur et, imperdiet non lacus. Sed quis porta magna.",
                "body": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed erat tortor, vehicula quis efficitur et, imperdiet non lacus. Sed quis porta magna. Etiam accumsan euismod enim quis euismod.",
                "image": "https://source.unsplash.com/900x600/?abstract",
                "slug": "lorem-ipsum-dolor",
                "meta_description": "Lorem ipsum dolor META DESCRIPTION",
                "meta_keywords": "lorem, ipsum, dolor, meta, keywords",
                "status": "PUBLISHED",
                "created_at": "2021-03-26T22:21:45.000000Z",
                "updated_at": null
            },
            {
                "id": 2,
                "title": "Dolor consequuntur a quis quod.",
                "excerpt": "Doloremque earum dolores fugiat est accusamus. Sequi voluptas voluptas molestias dolorum aliquam hic voluptatibus omnis. Sed et voluptatum culpa.",
                "body": "Velit magni voluptatum fugiat assumenda sit dolorum perspiciatis. Beatae harum tenetur veniam vel voluptas. Similique laudantium nobis est omnis consequatur aliquid enim. Enim quia velit eos aut a id et voluptatem.",
                "image": "https://source.unsplash.com/900x600/?abstract,nature,watter,animals",
                "slug": "dolor-consequuntur-a-quis-quod",
                "meta_description": "Repellendus qui et maiores suscipit est sit eius. Non pariatur excepturi molestiae asperiores aut cumque error. Et debitis hic voluptate explicabo doloribus eum eligendi.",
                "meta_keywords": "eveniet,sed,qui,ullam,expedita,voluptatem",
                "status": "PUBLISHED",
                "created_at": "2021-03-26T22:21:45.000000Z",
                "updated_at": "2021-03-26T22:21:45.000000Z"
            }
          ]
        </code>
      </pre>
    </p>

    <hr>

    <p>
      Caso queira buscar por um post específico, apenas faça uma requisição GET para
      <code>{{ request()->getSchemeAndHttpHost() }}/api/posts/<em>:slug</em></code>,
      onde <b>:slug</b> é o slug do post, como mostrado no JSON acima.

      Por exemplo, a seginte requisição
      <code>{{ request()->getSchemeAndHttpHost() }}/api/posts/<em>lorem-ipsum-dolor</em></code> irá retornar um JSON
      como o que é mostrado
      abaixo:


      <pre class="code-one">
        <code>
          {
            "id": 1,
            "title": "Lorem ipsum dolor",
            "excerpt": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed erat tortor, vehicula quis efficitur et, imperdiet non lacus. Sed quis porta magna.",
            "body": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed erat tortor, vehicula quis efficitur et, imperdiet non lacus. Sed quis porta magna. Etiam accumsan euismod enim quis euismod. Mauris nisi lorem, tincidunt non pulvinar eu, fermentum quis nunc. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.",
            "image": "https://source.unsplash.com/900x600/?abstract",
            "slug": "lorem-ipsum-dolor",
            "meta_description": "Lorem ipsum dolor META DESCRIPTION",
            "meta_keywords": "lorem, ipsum, dolor, meta, keywords",
            "status": "PUBLISHED",
            "created_at": "2021-03-25T18:50:08.000000Z",
            "updated_at": null
          }
        </code>
      </pre>
    </p>

    <p>
      Também é possível enviar mensagem de contato pela API, para isso, basta realizar uma requisição POST para 
      <code>{{ request()->getSchemeAndHttpHost() }}/api/contacts</code>, passando os seguintes parâmentros listados abaixo:


      <pre class="code-one">
        <code>
            "name": String (seu nome),
            "email": String (formato de email),
            "phone": String (formato de telefone),
            "subject": String (o assunto da mensagem),
            "message": String (a mensagem em si)
        </code>
      </pre>
    </p>
  </div>
@endsection
