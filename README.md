# Streaming-World

### Préparation:

  - Importer la BDD (Base de données) sur Php MyAdmin *(streaming_world.sql)*.
  - Adapter le fichier [database.php](application/config/database.php) dans *(application/config/database.php)* avec vos données de phpMyadmin
    ```sh 
    $config['dsn']      = 'mysql:host=VOTREHOST;dbname=streaming_world';
    $config['password'] = 'MOT DE PASSE DE VOTRE BDD';
    $config['user']     = 'IDENTIFIANT DE VOTRE BDD';
    ```

### Stripe:

  - Dans les fichier [charge.js](application/www/js/charge.js) & [ChargeController.class.php](application/controllers/payment/charge/ChargeController.class.php) si vous voulez voir les paiements, changer les clés publique *(application/www/js/charge.js)* et privée *(application/controllers/payment/charge/ChargeController.class.php)* avec les votres.
    ```sh
    Dans fichier charge.js
    1: var stripe = Stripe('VOTRE CLE PUBLIQUE');

    Dans fichier ChargeController.class.php
    38: \Stripe\Stripe::setApiKey('VOTRE CLE PRIVEE');
    ```
  - Le code de la carte bancaire est `4242 4242 4242 4242 04/24 242 42424`. **(Vous avez juste à entrer 42 jusqu'à remplir le formulaire)**.

### Streaming:
  - Les vidéos ne sont pas disponibles actuellement car elles sont enregistrées directement dans un fichier prévu à cet effet (elles prennent beaucoup d'espace).
  - Lorsque les vidéos seront hébergées, elles seront rendues disponibles.
  - Lorsque vous ajoutez un artwork, vous êtes libre d'enregistrer une image de fond dans le dossier spécifié à la page admin ou de ne pas le faire.


### Utilisateurs:

  - Vous pouvez bien sur enregistrer d'autres comptes (user) et gérer leur role avec un compte admin.
  - Il existe déjà 2 comptes: pseudo = admin, mdp = admin; pseudo = user, mdp = user.

# IMPORTANT!

  - Vous ne pouvez pas payer de commandes sans être connecté.
  - Pour passer un compte en 'admin', il faudra le changer directement avec un compte admin ou en bdd.
  - Les articles présents sur ce site ne sont pas réels, ils sont à des fins représentatifs. **`N'entrez donc JAMAIS vos identifiants bancaires même si vous ne serez pas débité`**. Cette partie est réservée à une simulation d'un site e-commerce.

##### Amusez-Vous bien sur Streaming-World.
##### Respectez-vous dans l'espace commentaire :).
