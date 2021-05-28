Bonjour,

Le mini project est dockerisé. Donc pour le lancer, il faut lancer ces commandes : 
- docker-compose build
- docker-compose up -d 
- winpty docker exec -it php-container bash
    * composer install
    * php artisan optimize:clear
    * php artisan migrate
    * php artisan db:seed

On peut accéder au projet via cet url: http://localhost:8000/

Voici les identifiants pour accéder en tant qu'administrateur :
- email: horchani.wissem@icloud.com
- pass: 1234

Sinon, vous pouver s'inscrire pour mettre des commentaires.

Cordialement,
