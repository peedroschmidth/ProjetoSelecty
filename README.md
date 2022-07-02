-> Instalar o composer.
-> Instalar o servidor XAMPP.
-> Startar o MySQL no XAMPP. 
-> Ajustar no arquivo .env para a tabela existente, ou criar uma nova database.
-> Clonar o projeto no GitHub.
-> Rodar os seguintes comandos na pasta do projeto:

composer global require laravel/installer (caso o laravel não esteja instalado)

php artisan serve (criar o servidor)

php migration (criar as tabelas no banco)

abrir o projeto no https://localhost