@extends('dashboard.layouts.app')

@section('panel-content')
<div class="container-fluid">

  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                Detalhe do Contato
                <div class="float-right btn-group" role="group">
                  <a href="{{ route('contacts.index') }}" class="btn btn-secondary" role="button">Voltar</a>
                </div>
              </div>

              <div class="card-body">
                @if (is_null($contact))
                  <p>
                    Nenhum dado foi encontrado.
                  </p>
                @else

                  <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" name="name" class="form-control" value="{{ $contact->name }}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $contact->email }}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="">Telefone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="">Mensagem</label>
                    <textarea
                      name="message"
                      cols="30"
                      rows="10"
                      class="form-control"
                      disabled>{{ $contact->message }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="">Created At</label>
                    <input type="text" name="created_at" class="form-control" value="{{ $contact->created_at }}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="">Updated At</label>
                    <input type="text" name="updated_at" class="form-control" value="{{ $contact->updated_at }}" disabled>
                  </div>
                @endif
              </div>
          </div>
      </div>
  </div>
  
</div>
@endsection