@extends('dashboard.layouts.app')

@section('panel-content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @php
                        // var_dump(Storage::disk('public')->exists('posts'), Storage::disk('public'), auth()->user());
                    @endphp

                    {{-- {{ __('You are logged in!') }} --}}
                    Meus parabéns! Agora tente navegar pelo menu ao lado e veja se encontra o que precisa.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
