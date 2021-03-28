@extends('dashboard.layouts.app')

@section('panel-content')
<div class="container-fluid">

  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">Artigos</div>

              <div class="card-body">
                @if (is_null($posts) or count($posts) <= 0)
                  <p class="m-3">
                    Nenhum dado foi encontrado.
                  </p>
                @else
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Imagem</th>
                        <th>Título</th>
                        <th>Resumo</th>
                        <th>Status</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($posts as $post)
                        <tr>
                          <td>
                            <img 
                              src="{{ filter_var($post->image, FILTER_VALIDATE_URL) ? $post->image : \App\Models\Post::thumbnail($post->image, 'cropped') }}" 
                              width="100" 
                              alt="{{ $post->title }}" 
                              />
                          </td>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->excerpt }}</td>
                          <td>{{ $post->status }}</td>
                          <td>
                            <form method="post" action="{{ route('posts.destroy', $post->id) }}">
                              <div class="btn-group" role="group">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-warning" role="button">V</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-info" role="button">E</a>
                                <button type="submit" class="btn btn-sm btn-danger">D</button>
                              </div>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @endif
              </div>
          </div>
      </div>
  </div>
  
</div>
@endsection