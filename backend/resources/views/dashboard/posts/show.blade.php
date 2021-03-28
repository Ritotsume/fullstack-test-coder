@extends('dashboard.layouts.app')

@section('panel-content')
<div class="container-fluid">

  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                Detalhe do Artigo
                <div class="float-right btn-group" role="group">
                  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info" role="button">Editar</a>
                  <a href="{{ route('posts.index') }}" class="btn btn-secondary" role="button">Voltar</a>
                </div>
              </div>

              <div class="card-body">
                @if (is_null($post))
                  <p>
                    Nenhum dado foi encontrado.
                  </p>
                @else

                  <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="">Resumo</label>
                    <input type="text" name="excerpt" class="form-control" value="{{ $post->excerpt }}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="">Conteúdo</label>
                    <textarea
                      name="body"
                      cols="30"
                      rows="10"
                      class="form-control"
                      disabled>{{ $post->body }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="">Imagem</label>
                    <img 
                      src="{{ filter_var($post->image, FILTER_VALIDATE_URL) ? $post->image : \App\Models\Post::thumbnail($post->image, 'cropped') }}" 
                      width="200" 
                      class="m-1" 
                      />
                  </div>

                  <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ $post->slug }}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="">Meta Description</label>
                    <input type="text" name="meta_description" class="form-control" value="{{ $post->meta_description }}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" value="{{ $post->meta_keywords }}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="">Status</label>
                    <input type="text" name="status" class="form-control" value="{{ $post->status }}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="">Created At</label>
                    <input type="text" name="created_at" class="form-control" value="{{ $post->created_at }}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="">Updated At</label>
                    <input type="text" name="updated_at" class="form-control" value="{{ $post->updated_at }}" disabled>
                  </div>
                @endif
              </div>
          </div>
      </div>
  </div>
  
</div>
@endsection