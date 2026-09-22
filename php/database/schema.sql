-- Banco de dados: Sistema de Empréstimos da Biblioteca
-- Execute este script no phpMyAdmin (http://localhost:8081) ou via CLI do MySQL.

CREATE TABLE IF NOT EXISTS funcionario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS aluno (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    matricula VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS livro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    isbn VARCHAR(20),
    quantidade_total INT NOT NULL DEFAULT 1,
    quantidade_disponivel INT NOT NULL DEFAULT 1
);

CREATE TABLE IF NOT EXISTS emprestimo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aluno_id INT NOT NULL,
    livro_id INT NOT NULL,
    funcionario_id INT NOT NULL,
    data_emprestimo DATE NOT NULL,
    data_devolucao_prevista DATE NOT NULL,
    data_devolucao_real DATE NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'em_andamento',
    FOREIGN KEY (aluno_id) REFERENCES aluno(id),
    FOREIGN KEY (livro_id) REFERENCES livro(id),
    FOREIGN KEY (funcionario_id) REFERENCES funcionario(id)
);

-- Usuário funcionário para login: usuario = admin | senha = 1234
INSERT INTO funcionario (nome, usuario, senha) VALUES
('Funcionário Admin', 'admin', '$2y$10$VX7A4ee..zrcCZ45TspF2.5KxftxauTjEjkHUeo9lHE1oFXZ27wlW');

-- Alguns livros de exemplo para testar as telas
INSERT INTO livro (titulo, autor, isbn, quantidade_total, quantidade_disponivel) VALUES
('Dom Casmurro', 'Machado de Assis', '9788535910663', 3, 3),
('O Cortiço', 'Aluísio Azevedo', '9788508110465', 2, 2),
('Clean Code', 'Robert C. Martin', '9780132350884', 2, 2);
