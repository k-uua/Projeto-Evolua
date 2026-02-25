@extends('layouts.app')
@section('titulo', 'Registrar')
@section('conteudo')

<div>
    <h2>Cadastro personal</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="sobrenome" placeholder="Sobrenome" required>
        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Senha" required>
        <input type="password" name="password_confirmation" placeholder="Confirmar Senha" required>

        <label for="foto_perfil">Foto de perfil</label>
        <input type="file" name="foto_perfil" id="foto_perfil" accept="image/*">

        <p>Sexo</p>
        <label><input type="radio" name="sexo" value="masculino" required> Masculino</label>
        <label><input type="radio" name="sexo" value="feminino" required> Feminino</label>

        <label for="biografia">Biografia</label>
        <textarea name="biografia" id="biografia"></textarea>

        <button type="submit">Cadastrar</button>
    </form>

    <a href="{{ route('login') }}">Já tem uma conta? Entrar</a>
</div>

@endsection