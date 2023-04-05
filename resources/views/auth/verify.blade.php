@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quase lá! Precisamos apenas que você valide o email antes de presseguir.</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Email de validação reenviado, verifique sua caixa de entrada.
                        </div>
                    @endif

                    Antes de utilizar os recursos, por favor valide seu email através do link encaminhado.
                    Caso não tenha recebido, solicite o reenvido no link:
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Solicitar novo link</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
