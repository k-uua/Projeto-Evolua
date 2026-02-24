@extends('layouts.app')
@section('titulo', 'Registrar')
@section('conteudo')

<div>
    <h2>Registrar</h2>
   <form action="" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="sobrenome" placeholder="Sobrenome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha"required>
        <input type="password_confirmation" name="confirm_password" placeholder="Confirmar Senha" required>
        <input type="file" name="foto_perfil">
        <label for="foto_perfil">Foto de perfil</label>
        <label for="sexo">Sexo</label>
        <input type="radio" name="sexo"  value="masculino" placeholder="Masculino">
        <input type="radio" name="sexo" value="feminino" placeholder="Feminino"> 
        
        
        <button type="submit">Cadastrar</button>
    </form>
    <a href="{{ route('registerPage') }}">Não possui uma conta? Cadastre-se!</a>
</div>

@endsection
