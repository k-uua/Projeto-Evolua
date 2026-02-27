# 🏋️ Evolua

Plataforma SaaS para gestão de alunos, treinos e evolução física voltada para Personal Trainers.

---

## 📌 Sobre o Projeto

O **Evolua** é um sistema desenvolvido para facilitar o dia a dia de profissionais de educação física, permitindo:

* Cadastro e gerenciamento de alunos
* Criação de fichas de treino personalizadas
* Organização de exercícios por grupo muscular
* Registro de cargas e histórico de evolução
* Base estruturada para geração de gráficos de progresso

O projeto está sendo desenvolvido com foco em escalabilidade e monetização futura no modelo SaaS.

---

## 🚀 Tecnologias Utilizadas

* PHP 8+
* Laravel
* React
* MySQL
* Docker
* Capacitor (versão mobile)
* Git + GitHub

---

## 🏛️ Arquitetura

* Controllers finos
* Service Layer para regras de negócio
* Jobs para tarefas assíncronas (envio de e-mail, e geração de PDF)
* API REST 
* Polices
* Cache para otimização

---

## 🏗 Estrutura Inicial do Projeto

O MVP contempla:

### 🔐 Autenticação e Perfis

* Login com e-mail e senha
* Perfis:

  * Personal Trainer
  * Aluno
* Controle de permissões por papel

### 🏋️ Gestão de Exercícios

* Cadastro de exercícios
* Grupo muscular
* Equipamento (opcional)
* Link de mídia (GIF/Vídeo)
* Exercícios globais ou privados do personal

### 📋 Montagem de Treinos

* Ficha vinculada ao aluno
* Séries
* Repetições
* Carga
* Descanso
* Observações

### 📊 Evolução

* Registro separado de cargas
* Histórico por exercício
* Estrutura para geração de gráficos

---

## 🐳 Ambiente com Docker

O projeto utiliza Docker para padronização do ambiente.

### Subir o projeto

```bash
docker compose up -d
```

Depois:

```bash
docker exec -it app php artisan migrate
```

---

## 🗂 Estrutura de Branches

* `main` → versão estável
* `dev` → desenvolvimento ativo
* `feature/*` → novas funcionalidades

---

## 📌 Padrão de Commits

Utilizamos padrão semântico:

* feat: nova funcionalidade
* fix: correção de bug
* refactor: melhoria interna
* chore: ajustes gerais
* docs: documentação

Exemplo:

```
feat: criação da estrutura de treinos
fix: correção relacionamento aluno-ficha
```

## 👥 Público-Alvo

* Personal Trainers
* Profissionais autônomos
* Academias de pequeno e médio porte
