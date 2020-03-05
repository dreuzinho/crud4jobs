## CRUD4jobs


CRUD totalmente feito em PHP puro de forma simples. Novas funcionalidades poderão ser implementadas no futuro.
Com fins de treino, aprendizado e aperfeiçoamento de PHP, CSS, HTML, JS, Git e Gitflow.
Ele funciona com um cadastro feito por código (link) que só pode ser enviado por alguma conta já existente.

Funções:

- Login;
- Cadastro;
- Home com todos os emails e códigos cadastrados;
- Editar Dados (contas: email e senha);
- Excluir Dados (contas);

Instalação:

- Clone ou baixe o repo;
- Crie o banco de dados mySQL;

```CREATE DATABASE `crud4jobs`;```

```CREATE TABLE `usuarios` (`id` INT NOT NULL AUTO_INCREMENT, `email` VARCHAR(50) NOT NULL, `senha` VARCHAR(50) NOT NULL, `codigo` VARCHAR(20) NOT NULL, PRIMARY KEY (`id`));```

```INSERT INTO `usuarios` (`id`, `email`, `senha`, `codigo`) VALUES (NULL, 'test@mail.com', MD5('123'), 'admin');```

Feito com am💜r por **Vinicius Lima**
