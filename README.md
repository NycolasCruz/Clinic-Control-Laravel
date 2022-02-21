<h1 align="center">Clinic Control</h1>

## 🚀 Tecnologias

<p>Sistema desenvolvido com as seguintes tecnologias:</p>

- HTML
- CSS
- JavaScript
- JQuery
- PHP
- Laravel
- Font Awesome
- Bootstrap
- Sweet Alert

## 🖥️ Sobre

<p align="justify">O projeto tem como principal função agilizar o cadastro de novos pacientes e classificá-los com base no total de sintomas relacionados ao Covid-19 que forem apresentados no momento do cadastro, funcionando como uma espécie de triagem que determina os pacientes que estão com maiores e menores chances de estarem contaminados com o vírus.</p>

## 🔧 Características

- [x] Projeto base finalizado
- [x] Apresenta fácil compreensão e adaptação
- [x] Criação, visualização, edição e remoção de pacientes.
- [x] Campo de pesquisa para filtrar pacientes a partir do nome ou nome social.
- [x] Página específica que exibe os sintomas de cada paciente.
- [x] Mensagens informativas (que ajudam e orientam o usuário)
- [x] Validação de CPF e máscaras com JQuery 

## ⏱️ Em Breve

- [ ] Requisições AJAX
- [ ] Autenticação (quem não estiver logado poderá apenas visualizar os pacientes já cadastrados e suas informações)
- [ ] Exibição dos pacientes também em forma de tabela (mais produtividade)

## 🕹️ Instalação

Ao clonar o projeto, utilize o comando abaixo para instalar o gerenciador de pacotes do PHP (pode demorar um pouco)
````
composer install
````
Depois, copie todo o conteúdo do arquivo '.env.example' em um novo arquivo chamado '.env' e gere sua chave encriptografada com o comando:
````
php artisan key:generate
````
Agora crie um banco de dados com o nome clinic_control e insira as migrations com o comando abaixo
````
php artisan migrate
````
Pronto! Agora é só ligar o seu banco de dados e o servidor com o comando:
````
php artisan serve
````

## 🤖 Autor

<a href="https://github.com/NycolasCruz">
    <img src="https://github.com/NycolasCruz.png"  width="15%">
    <p>Nycolas Cruz</p>
</a>
