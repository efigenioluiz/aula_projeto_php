# Como identificar relacionamentos ao criar um diagrama de classes

Guia rápido para ensinar em sala, usando o próprio projeto da biblioteca
como exemplo vivo. Veja também `diagramas-uml.md` (diagramas prontos) e
`arquitetura-mvc.md`.

## 1. O que é um relacionamento, na prática

Relacionamento é a resposta a uma pergunta simples: **"essa classe
precisa saber da outra pra fazer sentido?"**
Um `Emprestimo` sem saber *de qual* `Aluno` e *de qual* `Livro` é inútil —
não dá pra devolver nem cobrar ninguém. Isso é um relacionamento.

Ensine a turma a **não pensar em "linha entre caixinhas"** primeiro.
Pensem em **frase em português** primeiro, linha depois. A linha é só a
tradução visual da frase.

## 2. Método de 4 passos (use o enunciado da biblioteca ao vivo)

Pegue o estudo de caso e faça isso com a turma, no quadro:

**Passo 1 — circule os substantivos.** São os candidatos a classe.
> "aluno *solicita* empréstimo", "funcionário *registra* devolução",
> "livro *disponível*"
→ Aluno, Funcionário, Livro, Empréstimo.

**Passo 2 — sublinhe os verbos que ligam dois substantivos.** Esses
verbos viram o nome do relacionamento.
> aluno **solicita** empréstimo → `Aluno —realiza→ Emprestimo`
> funcionário **registra** empréstimo → `Funcionario —registra→ Emprestimo`
> empréstimo **é de** um livro → `Emprestimo —refere-se a→ Livro`

**Passo 3 — para cada linha, faça a pergunta dupla:**
- "**Quantos** Empréstimos um Aluno pode ter?" → vários → `0..*` do lado
  do Empréstimo
- "**Quantos** Alunos tem em um Empréstimo?" → só um → `1` do lado do
  Aluno

Ensine assim, sempre em par: a multiplicidade fica **do lado oposto** de
quem você está contando. É o erro mais comum — aluno escreve a
multiplicidade do lado errado da linha.

**Passo 4 — pergunte: "esse relacionamento carrega alguma informação
própria?"**
Esse é o pulo do gato que a maioria não vê sozinha.

## 3. Quando o relacionamento vira classe

- Um empréstimo **não é só** "esse aluno pegou esse livro". Ele tem
  **data de empréstimo, data prevista, data real, status**. Informação
  que não pertence nem ao Aluno, nem ao Livro — pertence à *relação entre
  os dois*.
- Quando isso acontece, o relacionamento **vira uma classe própria**
  (classe de associação), com os IDs das outras duas como atributos
  (`alunoId`, `livroId`, `funcionarioId` em `Emprestimo`).

Regra simples pra dar em sala:
> "Se você só precisa **ligar** duas classes, é uma linha. Se a ligação
> **tem data, status, quantidade, valor** — vira uma classe no meio."

Peça pra turma achar outros exemplos do dia a dia: matrícula
(Aluno+Disciplina, com nota e frequência), pedido (Cliente+Produto, com
data e quantidade). É o mesmo padrão do `Emprestimo`.

## 4. Erros mais comuns

1. **Esquecer a chave estrangeira quando a relação virou classe** —
   desenhar a linha `Aluno—Emprestimo` mas não colocar `alunoId` dentro
   de `Emprestimo`. Pergunte: "se eu fosse programar essa classe em PHP,
   que atributo eu precisaria pra saber quem é o dono desse empréstimo?"
2. **Trocar o lado da multiplicidade** — sempre reforce: a pergunta
   "quantos X por Y" responde o número que fica **perto do Y**, não perto
   do X.
3. **Confundir associação com herança** — Aluno não "é um" Empréstimo,
   Aluno "tem" Empréstimos. Se a resposta natural for "é um/é uma", é
   herança; se for "tem/possui/realiza", é associação.
4. **Criar uma classe pra tudo** — nem todo substantivo do enunciado é
   classe. "Devolução" não virou classe própria aqui porque é só um
   *estado* do Empréstimo (`status = 'devolvido'`), não uma entidade com
   identidade própria.

## 5. Exercício rápido pra aplicar com a turma

Depois de mostrar o diagrama pronto (`diagramas-uml.md`), apague as
multiplicidades e o `Emprestimo` inteiro do quadro e peça pra
reconstruírem em dupla, só com o enunciado em mãos, seguindo os 4 passos.
Funciona bem porque eles já viram a resposta certa antes — o exercício é
sobre *processo*, não sobre acertar do zero.
