<h1 align="center">Clinic Control</h1>

## 🚀 Tecnologias

<p>Sistema desenvolvido com as seguintes tecnologias:</p>

- HTML
- CSS
- JavaScript
- JQuery
- AJAX
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
- [x] Mensagens informativas (que ajudam e orientam o usuário).
- [x] Validação de CPF e máscaras com JQuery.
- [X] Requisições AJAX.

## 🕹️ Instalação

Certifique-se de ter o php, o apache e o composer instalados na sua máquina, caso não tenha, instale o executável do composer clicando neste link https://getcomposer.org/Composer-Setup.exe e instale o xampp para ter acesso ao apache a ao php. Agora clone o projeto e utilize o comando abaixo para instalar o gerenciador de pacotes do PHP (pode demorar um pouco)
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
Pronto! Agora é só ligar o seu banco de dados local e o servidor com o comando:
````
php artisan serve
````

## 🐧 Autor

<a href="https://github.com/NycolasCruz">
    <img src="https://github.com/NycolasCruz.png"  width="15%">
    <p>Nycolas Cruz</p>
</a>
