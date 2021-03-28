@extends('dashboard.layouts.app')

@section('panel-content')
<div class="container-fluid">

  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">Contatos</div>

              <div class="card-body">
                @if (is_null($contacts) or count($contacts) <= 0)
                  <p class="m-3">
                    Nenhum dado foi encontrado.
                  </p>
                @else
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($contacts as $contact)
                        <tr>
                          <td>{{ $contact->name }}</td>
                          <td>{{ $contact->email }}</td>
                          <td>{{ $contact->phone }}</td>
                          <td>
                            <form method="post" action="{{ route('contacts.destroy', $contact->id) }}">
                              <div class="btn-group" role="group">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-warning" role="button">V</a>
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