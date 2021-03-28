@extends('dashboard.layouts.app')

@section('panel-content')
  <div class="container-fluid">

    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            <div class="card-header">Criar Artigo</div>

            <div class="card-body">
              @csrf

              <div class="form-group">
                <label for="">Título</label>
                <input type="text" name="title" placeholder="Título" class="form-control title"
                  value="{{ old('title') }}">
              </div>

              <div class="form-group">
                <label for="">Resumo</label>
                <input type="text" name="excerpt" placeholder="Resumo" class="form-control"
                  value="{{ old('excerpt') }}">
              </div>

              <div class="form-group">
                <label for="">Conteúdo</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control"
                  placeholder="Sua postagem aqui...">{{ old('body') }}</textarea>
              </div>

              <div class="form-group">
                <label for="">Imagem</label>
                <div class="custom-file">
                  <input type="file" name="image" class="custom-file-input" id="image" value="{{ old('image') }}">
                  <label for="image" class="custom-file-label">Imagem...</label>
                </div>
                <div>
                  <span class="file-input-str-image"></span>
                </div>
              </div>

              <div class="form-group">
                <label for="">Slug</label>
                <input type="text" name="slug" placeholder="Slug" class="form-control slug"
                  value="{{ Helper::slugify(old('title')) }}">
              </div>

              <div class="form-group">
                <label for="">Meta Description</label>
                <input type="text" name="meta_description" placeholder="Meta Description" class="form-control"
                  value="{{ old('meta_description') }}">
              </div>

              <div class="form-group">
                <label for="">Meta Keywords</label>
                <input type="text" name="meta_keywords" placeholder="Meta Keywords" class="form-control"
                  value="{{ old('meta_keywords') }}">
              </div>

              <div class="form-group">
                <label for="">Status</label>
                <?php
                $status = filter_input(INPUT_POST, 'status', FILTER_VALIDATE_INT);
                $selected = '';
                if (!is_null($status)) {
                $selected = ' selected';
                }
                ?>
                <select name="status" class="form-control">
                  <option value="PENDING" {{ $selected }}>Pending</option>
                  <option value="DRAFT" {{ $selected }}>Draft</option>
                  <option value="PUBLISHED" {{ $selected }}>Published</option>
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
