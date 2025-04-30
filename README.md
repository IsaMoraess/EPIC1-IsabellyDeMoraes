# 🚗 Sistema de Gerenciamento de Veículos

Sistema web desenvolvido para o cadastro e gerenciamento de veículos, incluindo controle de usuários, manutenções e abastecimentos.

## 📚 Tecnologias Utilizadas

- **PHP** – Backend  
- **MySQL** – Banco de dados  
- **HTML5 & CSS3** – Interface do usuário  
- **JavaScript** – Funcionalidades adicionais  
- **PDO** – Conexão segura com o banco de dados  

## ⚙️ Funcionalidades

- Cadastro e login de usuários  
- Cadastro, edição e exclusão de veículos  
- Registro de abastecimentos e manutenções  
- Controle de sessões para segurança do usuário  
- Interface simples e responsiva  

## 🛠️ Como Executar o Projeto

### 1. Configurar o Ambiente

- Instale um servidor local como **XAMPP** ou **WAMP** (ou use `php -S` para rodar o PHP).  
- Certifique-se que o **MySQL** e o **Apache** estão ativos.

### 2. Clonar o Projeto

```bash
git clone https://github.com/IsaMoraess/EPIC1-IsabellyDeMoraes
cd EPIC1-IsabellyDeMoraes

Configurar o Banco de Dados
Crie o banco no MySQL:

CREATE DATABASE sistema_veiculos;

Edite o arquivo conexao.php:

$host = 'localhost';
$dbname = 'sistema_veiculos';
$username = 'root';
$password = '';

4. Importar Estrutura do Banco

mysql -u root -p sistema_veiculos < banco-de-dados/sistema_veiculos.sql

5. Iniciar o Servidor

php -S localhost:8000

Acesse no navegador:
http://localhost:8000


📁 Estrutura do Projeto
|-- banco-de-dados/
|   └── sistema_veiculos.sql
|-- codigo-fonte/
    └── projeto-veiculos/
        |-- index.php
        |-- login.php
        |-- cadastro.php
        |-- dashboard.php
        |-- css/
        |   └── style.css
        |-- js/
        |   └── script.js
        |-- php/
            |-- abastecimento.php
            |-- adicionar_abastecimento.php
            |-- adicionar_manutencao.php
            |-- dashboard.php
            |-- editar.php
            |-- excluir_abastecimento.php
            |-- excluir_manutencao.php
            |-- excluir.php
            |-- lista_manutencoes.php
            |-- lista_abastecimentos.php
            |-- lista_veiculos.php
            |-- conexao.php
            |-- login.php
            |-- cadastro.php
            |-- logout.php
            |-- veiculos.php
            |-- manutencao.php
            |-- relatorio_consumo.php
