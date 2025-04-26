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

````bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio


### 2. Configurar o banco de dados
Crie o banco no MySQL:
```sql
CREATE DATABASE sistema_veiculos;
````

Configure `conexao.php`:

```php
$host = 'localhost';
$dbname = 'sistema_veiculos';
$username = 'root';
$password = '';
```

### 3. Importar estrutura do banco

```sh
mysql -u root -p sistema_veiculos < banco.sql
```

### 4. Iniciar o servidor

```sh
php -S localhost:8000
```

Acesse: `http://localhost:8000`

## Estrutura do Projeto

```
/
|-- php/
|   |-- abastecimento.php
|   |-- adicionar_abastecimento.php
|   |-- adicionar_manutencao.php
|   |-- dashboard.php
|   |-- editar.php
|   |-- excluir_abastecimento.php
|   |-- excluir_manutencao.php
|   |-- excluir.php
|   |-- lista_manutencao.php
|   |-- lista_abastecimento.php
|   |-- lista_veiculos.php
|   |-- conexao.php
|   |-- login.php
|   |-- cadastro.php
|   |-- logout.php
|   |-- veiculos.php
|   |-- manutencao.php
|   |-- relatorio_consumo.php
|-- index.php
|-- login.php
|-- cadastro.php
|-- dashboard.php
|-- README.md

```

## Como Contribuir

1. Faça um fork
2. Crie uma branch (`git checkout -b minha-feature`)
3. Commit suas alterações (`git commit -m 'Descrição da feature'`)
4. Envie (`git push origin minha-feature`)
5. Abra um Pull Request

## Licença

Este projeto está sob a licença MIT.
