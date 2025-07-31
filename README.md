<h1>FactuZen App</h1>
<h5>Projet fil-rouge</h5>

FactuZen, une application Symfony conçue pour gérer simplement les clients, devis et factures d’un indépendant ou d’une petite entreprise.

<h2>Guide d'Installation pour un dev:</h2>
<ul>
    <li>Run: composer install</li>
    <li> Create .env.local file and specify the database url with the name of your desired db</li>
    <li>Run: symfony console doctrine:database:create</li>
    <li>Make a migration and migrate</li>
    <li>Lastly if you want you can load fixture data via: symfony console doctrine:fixtures:load</li>
</ul>
