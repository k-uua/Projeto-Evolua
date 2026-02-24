@extends('layouts.app')
@section('titulo', 'Login')
@section('conteudo')

<div>
    <h2>Login</h2>
   <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="senha" placeholder="Senha">
        <button type="submit">Entrar</button>
    </form>
    <a href="`{{ route('registerPage') }}">Não possui uma conta? Cadastre-se!</a>
</div>

@endsection