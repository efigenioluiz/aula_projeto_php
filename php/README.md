# Sistema de Empréstimos da Biblioteca — Projeto de Sala (PHP puro + MVC)

Projeto sem framework, organizado em MVC manual, para 3 aulas práticas.
Sobe com o `docker-compose.yml` já existente na raiz do repositório.

## Como rodar

```bash
docker compose up -d
```

- App: http://localhost:8080
- phpMyAdmin: http://localhost:8081 (server: mysql, usuário: root, senha: root)

Antes de usar, importe `php/database/schema.sql` no banco `aula_db`
(pelo phpMyAdmin: aba SQL > cole o conteúdo do arquivo > Executar).

Login de teste: **usuario:** `admin` **senha:** `1234`

## Estrutura

```
php/public/
├── config/Banco.php          # conexão PDO (pronto)
├── models/                   # uma classe por entidade, acesso ao banco
├── controllers/               # regras de cada tela (recebe request, chama model, chama view)
├── views/                    # HTML puro (um arquivo por tela)
├── livros/ alunos/ emprestimos/   # pontos de entrada (URLs) de cada módulo
├── login.php / logout.php / index.php
└── css/style.css             # um único CSS simples para tudo
```

## Roteiro das 3 aulas

**Aula 1 — Módulo Livros (professor conduz, feito quase todo em conjunto)**
Model, Controller, Views e telas de Livros já prontos (listar, criar, excluir).
Falta só o `UPDATE` em `models/Livro.php::atualizar()` — implementar isso
**junto com a turma**, reaproveitando o padrão do `create()`.

**Aula 2 — Módulo Alunos (turma faz sozinha em sala)**
Controller, Views e URLs de Alunos já prontos e funcionando; só falta
completar os métodos do `models/Aluno.php` (create, listarTodos,
buscarPorId, atualizar, excluir), copiando o padrão de `Livro.php`.
Tarefa simples e contida, para praticar sozinhos com um exemplo pronto ao lado.

**Aula 3 — Módulo Empréstimos (desafio)**
Junta Aluno + Livro. As consultas (listagens com JOIN) já estão prontas.
O desafio é implementar `models/Emprestimo.php::realizar()` e `::devolver()`:
verificar disponibilidade, gravar o empréstimo, e atualizar o estoque do
livro na devolução. Os passos estão comentados no próprio arquivo.

## O que já vem 100% pronto
- Conexão com banco (PDO)
- Login/logout com sessão e senha com hash (`password_hash`/`password_verify`)
- CSS único e simples
- Módulo de Livros completo (exceto o UPDATE, feito em aula)
- Toda a "fiação" MVC (controllers, views, rotas) dos módulos de Alunos e Empréstimos
