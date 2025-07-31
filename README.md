#FactuZen App
#Projet fil-rouge

FactuZen, une application Symfony conçue pour gérer simplement les clients, devis et factures d’un indépendant ou d’une petite entreprise.

#Guide d'Installation pour un dev:
<ul>
    <li>Run: composer install</li>
    <li> Create .env.local file and specify the database url with the name of your desired db</li>
    <li>Run: symfony console doctrine:database:create</li>
    <li>Make a migration and migrate</li>
    <li>Lastly if you want you can load fixture date via: symfony console doctrine:fixtures:load</li>
</ul>
