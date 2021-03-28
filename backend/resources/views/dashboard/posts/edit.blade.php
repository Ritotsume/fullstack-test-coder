@extends('dashboard.layouts.app')

@section('panel-content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            <div class="card-header">Artigos</div>

            <div class="card-body">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="">Título</label>
                <input type="text" name="title" placeholder="Título" class="form-control title"
                  value="{{ $post->title }}">
              </div>

              <div class="form-group">
                <label for="">Resumo</label>
                <input type="text" name="excerpt" placeholder="Resumo" class="form-control"
                  value="{{ $post->excerpt }}">
              </div>

              <div class="form-group">
                <label for="">Conteúdo</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control"
                  placeholder="Sua postagem aqui...">{{ $post->body }}</textarea>
              </div>

              <div class="form-group">
                <label for="">Imagem</label>
                @if ($post->image)
                  <div class="thumbwrapper">
                    <span class="deleteimage"><i class="fa fa-times"></i></span>
                    <img 
                      src="{{ filter_var($post->image, FILTER_VALIDATE_URL) ? $post->image : \App\Models\Post::thumbnail($post->image, 'cropped') }}" 
                      width="100" 
                      />
                    <input type="hidden" name="imaged" value="{{ $post->image }}">
                  </div>
                @endif
                <div class="custom-file">
                  <input type="file" name="image" class="custom-file-input" id="image">
                  <label for="image" class="custom-file-label">Imagem...</label>
                </div>
                <div>
                  <span class="file-input-str-image"></span>
                </div>
              </div>

              <div class="form-group">
                <label for="">Slug</label>
                <input type="text" name="slug" placeholder="Slug" class="form-control slug"
                  value="{{ $post->slug }}">
              </div>

              <div class="form-group">
                <label for="">Meta Description</label>
                <input type="text" name="meta_description" placeholder="Meta Description" class="form-control"
                  value="{{ $post->meta_description }}">
              </div>

              <div class="form-group">
                <label for="">Meta Keywords</label>
                <input type="text" name="meta_keywords" placeholder="Meta Keywords" class="form-control"
                  value="{{ $post->meta_keywords }}">
              </div>

              <div class="form-group">
                <label for="">Status</label>
                <select name="status" class="form-control">
                  <option value="PENDING" {{ $post->status === 'PENDING' ? ' selected' : '' }}>
                    Pending</option>
                  <option value="DRAFT" {{ $post->status === 'DRAFT' ? ' selected' : '' }}>Draft
                  </option>
                  <option value="PUBLISHED" {{ $post->status === 'PUBLISHED' ? ' selected' : '' }}>
                    Published</option>
                </select>
              </div>

            </div>
            <div class="card-footer">
              <button class="btn btn-success" type="submit">Enviar</button>
              <a href="{{ route('posts.index') }}" class="btn btn-secondary float-right" role="button">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
