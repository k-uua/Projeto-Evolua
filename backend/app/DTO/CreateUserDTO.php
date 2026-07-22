<?php


namespace App\DTO;
use App\Models\User;

class CreateUserDTO
{
    public function __construct(
        public string $nome,
        public string $sobrenome,
        public string $email,
        public string $password,
        public ?string $foto_perfil = null,
        public ?string $sexo = null,
        public int $perfil_id 
    ) {}

    public static function fromRequest(array $requestData): self
    {
        return new self(
            nome: $requestData['nome'],
            sobrenome: $requestData['sobrenome'],
            email: $requestData['email'],
            password: $requestData['password'],
            foto_perfil: $requestData['foto_perfil'] ?? null,
            sexo: $requestData['sexo'] ?? null,
            perfil_id: $requestData['perfil_id']
        );
    }

   
}
