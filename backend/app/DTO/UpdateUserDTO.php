<?php


namespace App\DTO;
use App\Models\User;

class UpdateUserDTO
{
    public function __construct(
        public ?string $nome = null,
        public ?string $sobrenome = null,
        public ?string $email = null,
        public ?string $foto_perfil = null,
        public ?string $sexo = null,
        public ?int $perfil_id 
    ) {}

    public static function fromRequest(array $requestData): self
    {
        return new self(
            nome: $requestData['nome'] ?? null,
            sobrenome: $requestData['sobrenome']?? null,
            email: $requestData['email'],
            
            foto_perfil: $requestData['foto_perfil'] ?? null,
            sexo: $requestData['sexo'] ?? null,
            perfil_id: $requestData['perfil_id']
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome,
            'email' => $this->email,
            'foto_perfil' => $this->foto_perfil,
            'sexo' => $this->sexo,
            'perfil_id' => $this->perfil_id,
        ], fn($valor) =>  $valor!== null);
    }

   
}
