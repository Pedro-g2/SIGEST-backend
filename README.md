# 🚀 Instruções para Rodar a API de Cadastro do SIGEST

Este guia detalha os passos necessários para configurar seu ambiente de desenvolvimento e executar a API de cadastro do SIGEST localmente.

---

## 📋 Sumário

1.  [Pré-requisitos](#1-pré-requisitos)
    * [XAMPP](#xampp)
    * [Git](#git)
    * [Visual Studio Code](#visual-studio-code)
    * [Composer](#composer)
2.  [Criando e Executando o Projeto](#2-criando-e-executando-o-projeto)
    * [Clonar o Repositório](#clonar-o-repositório)
    * [Configurar o Arquivo `.env`](#configurar-o-arquivo-env)
    * [Instalar Dependências](#instalar-dependências)
    * [Executar Migrations](#executar-migrations)
    * [Iniciar o Servidor](#iniciar-o-servidor)
3.  [Acesso às rotas da API](#3-acesso-as-rotas-da-api)

---

## 1. Pré-requisitos

Verifique se o seu computador possui os seguintes programas instalados:

### XAMPP
Um pacote que inclui Apache, MariaDB e PHP, essencial para rodar o ambiente de desenvolvimento web local.
* [Baixar e Instalar XAMPP](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.12/xampp-windows-x64-8.2.12-0-VS16-installer.exe/download)
* OBS: o PHP precisa está na versão 8.2 ou mais.

### Git
Sistema de controle de versão distribuído para gerenciar o código-fonte.
* [Baixar e Instalar Git](https://github.com/git-for-windows/git/releases/download/v2.50.1.windows.1/Git-2.50.1-64-bit.exe)

### Visual Studio Code
Um editor de código-fonte leve e poderoso.
* [Baixar e Instalar Visual Studio Code](https://vscode.download.prss.microsoft.com/dbazure/download/stable/2901c5ac6db8a986a5666c3af51ff804d05af0d4/VSCodeUserSetup-x64-1.101.2.exe)

### Composer
Gerenciador de dependências para PHP, usado para instalar bibliotecas e pacotes do Laravel.
* [Baixar e Instalar Composer](https://getcomposer.org/Composer-Setup.exe)
    * **Passos durante a instalação do Composer:**
        1.  Abra o instalador.
        2.  Clique em "Install for all users".
        3.  Ignore a caixa de seleção "Developer mode".
        4.  Na tela "Settings Check", navegue até a pasta onde o XAMPP está instalado e acesse a pasta `php`. Dentro da pasta `php`, selecione o arquivo `php.exe` e prossiga com a instalação.
        5.  Siga os passos: "next", "install" e finalize a instalação.

    * **Teste a Instalação do Composer:**
        Após criar uma pasta para o projeto e abri-la no VS Code, digite no terminal o comando:
        ```bash
        composer create-project laravel/laravel nome_do_projeto
        ```
        Caso a criação do projeto funcione corretamente, o Composer fará o download dos arquivos do Laravel e construirá a estrutura de pastas no VS Code.

    * **Solução para Erro de Descompactação de Arquivos:**
        Se ocorrer um erro de descompactação de arquivos, navegue até a pasta de instalação do XAMPP, acesse a pasta `php`, localize o arquivo `php.ini`, abra-o e localize a linha `;extension=zip`. Se a linha estiver iniciando com ponto e vírgula (`;`), remova o ponto e vírgula do início da instrução e salve o arquivo. Tente executar novamente o comando `composer create-project laravel/laravel nome_do_projeto` para a criação do projeto Laravel.

---

## 2. Criando e Executando o Projeto

Siga estes passos para clonar, configurar e executar o projeto SIGEST-backend localmente:

### Clonar o Repositório
Abra seu terminal (ex: Git Bash, Prompt de Comando ou Terminal do VS Code) e clone o repositório da API:
```bash
git clone [https://github.com/Pedro-g2/SIGEST-backend.git](https://github.com/Pedro-g2/SIGEST-backend.git)
```

### Configurar o Arquivo .env
O arquivo .env contém as variáveis de ambiente do seu projeto, incluindo as credenciais do banco de dados.

Abra o arquivo .env e localize as informações de conexão do banco de dados. Preencha-as de acordo com o seu banco de dados, por exemplo:
* DB_CONNECTION=mariadb
* DB_HOST=127.0.0.1
* DB_PORT=3306
* DB_DATABASE=sigest
* DB_USERNAME=root
* DB_PASSWORD=

### Instalar Dependências
Navegue até a pasta raiz do seu projeto Laravel no terminal e execute o Composer para baixar todas as dependências restantes do projeto:
```bash
composer install
```

### Executar Migrations
As Migrations do Laravel são responsáveis por criar a estrutura das tabelas no seu banco de dados.
```bash
php artisan migrate
```

Após a execução, verifique seu banco de dados (no caso do exemplo, "sigest") para confirmar que as tabelas (como professor) foram criadas corretamente.

### Iniciar o Servidor
Para a maioria dos cenários de desenvolvimento, é mais simples usar o servidor embutido do Laravel:
```bash
php artisan serve
```

O servidor será iniciado normalmente em http://127.0.0.1:8000.

## 3. Acesso às rotas da API

### Método GET - listagem de todas as linhas da tabela:
```bash
http://127.0.0.1:8000/api/professors
```

### Método GET (com id) - listagem de um registro específico da tabela:
```bash
http://127.0.0.1:8000/api/professors/"id_do_registro"
```

### Método POST - cadastro:
```bash
http://127.0.0.1:8000/api/professors
```

### Método PUT ou PATCH - atualização de algum registro da tabela:
```bash
http://127.0.0.1:8000/api/professors/"id_do_registro"
```

### Método DELETE - deletar um registro da tabela:
```bash
http://127.0.0.1:8000/api/professors/"id_do_registro"
```
