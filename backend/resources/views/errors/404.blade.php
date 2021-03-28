@extends('errors.layouts.app')

@section('error-content')
  <div class="container-fluid page-404">

    <div class="text-center">
      <div class="error mx-auto" data-text="Oops!">Oops!</div>
      <p class="lead text-gray-800 mb-5">Página não encontrada</p>
      <p class="text-gray-500 mb-0">Parece que você procura por algo que não existe.</p>
      <a href="{{ url()->previous() }}">&larr; Tente começar do início</a>
    </div>
  </div>
@endsection
