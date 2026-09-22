# Rotas do projeto

Como não há framework, cada "rota" é um arquivo `.php` de verdade dentro
de `php/public/` — a URL é literalmente o caminho do arquivo. Todo
arquivo de rota segue o mesmo padrão: `session_start()` →
`AuthController::exigirLogin()` → chama o Controller do módulo (veja
`docs/arquitetura-mvc.md`).

Base local: `http://localhost:8080`

## Autenticação

| Rota | Método | Login exigido? | O que faz |
|---|---|---|---|
| `/login.php` | GET | não | Mostra o formulário de login |
| `/login.php` | POST | não | Valida usuário/senha e cria a sessão |
| `/logout.php` | GET | sim | Encerra a sessão e volta pro login |
| `/index.php` | GET | sim | Painel inicial com os 3 atalhos (Livros, Alunos, Empréstimos) |

## Livros

| Rota | Método | O que faz | Model usado |
|---|---|---|---|
| `/livros/index.php` | GET | Lista todos os livros | `Livro::listarTodos()` |
| `/livros/criar.php` | GET | Mostra o formulário de novo livro | — |
| `/livros/criar.php` | POST | Cadastra o livro enviado no formulário | `Livro::create()` |
| `/livros/editar.php?id=X` | GET | Mostra o formulário preenchido com os dados do livro `X` | `Livro::buscarPorId()` |
| `/livros/editar.php?id=X` | POST | Salva as alterações do livro `X` | `Livro::atualizar()` |
| `/livros/excluir.php?id=X` | GET | Remove o livro `X` | `Livro::excluir()` |

## Alunos

| Rota | Método | O que faz | Model usado |
|---|---|---|---|
| `/alunos/index.php` | GET | Lista todos os alunos | `Aluno::listarTodos()` |
| `/alunos/criar.php` | GET | Mostra o formulário de novo aluno | — |
| `/alunos/criar.php` | POST | Cadastra o aluno enviado no formulário | `Aluno::create()` |
| `/alunos/editar.php?id=X` | GET | Mostra o formulário preenchido com os dados do aluno `X` | `Aluno::buscarPorId()` |
| `/alunos/editar.php?id=X` | POST | Salva as alterações do aluno `X` | `Aluno::atualizar()` |
| `/alunos/excluir.php?id=X` | GET | Remove o aluno `X` | `Aluno::excluir()` |

## Empréstimos

| Rota | Método | O que faz | Model usado |
|---|---|---|---|
| `/emprestimos/index.php` | GET | Lista todos os empréstimos (com nome do aluno e título do livro) | `Emprestimo::listarTodos()` |
| `/emprestimos/criar.php` | GET | Mostra o formulário (aluno + livros disponíveis) | `Aluno::listarTodos()`, `Livro::listarDisponiveis()` |
| `/emprestimos/criar.php` | POST | Registra o empréstimo | `Emprestimo::realizar()` |
| `/emprestimos/devolver.php?id=X` | GET | Registra a devolução do empréstimo `X` | `Emprestimo::devolver()` |

## Observações

- Todas as rotas, exceto `/login.php`, redirecionam para `/login.php` se
  não houver sessão ativa (`$_SESSION['funcionario_id']` vazio).
- As ações de exclusão e devolução usam `GET` por simplicidade didática
  (com `confirm()` no HTML antes de seguir o link). Em um projeto maior,
  o ideal seria usar `POST`/`DELETE` para ações que alteram dados.
- Não existe um roteador central: cada arquivo dentro de `livros/`,
  `alunos/` e `emprestimos/` é o próprio ponto de entrada da URL.
