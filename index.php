<?php
  include 'inc/pdo.php';
  include 'inc/function.php';
  include 'inc/request.php';

  if (isLogged()) {
    // header('Location: user_log.php');
  }
  include 'inc/header.php';

?>

  <div class="intro">
    <p>Bienvenue sur notre site InfoVaccins.com </br>
      Si vous souhaitez consulter vos informations concernant vos vaccins, </br>
      inscrivez-vous dès maintenant !</p>
    <div class="wrap">
      <?php if(!isLogged()){ ?>
      <!-- Bouton connexion -->
      <div class="connexion">
        <a href="connexion.php">Se connecter</a>
      </div>
      <!-- Bouton inscription -->
      <div class="inscription">
        <a href="inscription.php">S'inscrire</a>
      </div>
      <div class="clear"></div>
    <?php }else {?>
      <div class="connexion">
        <a href="deconnexion.php">Deconnexion</a>
      </div>
    <?php } ?>
    </div>
  </div>


          <div id ="FAQ">

              <h2>Questions fréquentes</h2>
              <div class="ligne"></div>
                <div class="wrap">
            <ul>
              <div class="boiteQuestion"> <li>Qu'est-ce que InfoVaccins.com?</li> </div>
              <p>InfoVaccins.com est un carnet de santé connecté accessible sous toutes les patformes.</p>
              <div class="boiteQuestion"> <li>À quoi sert-il?</li> </div>
              <p>Il permet de consulter les informations des différents vaccins mais également de s'y tenir
                 informé.Après inscription InfoVaccins.com vous avertira des prochains vaccins vous concernant personnellement.
              </p><br>
              <div class="boiteQuestion"> <li>Qui sont les concernés?</li> </div>
              <p>InfoVaccins.com concerne tous le monde.</p>
              <div class="boiteQuestion"> <li>Quels sont les avantages?</li> </div>
              <p>InfoVaccins.com permet une de s'informer rapidement et efficacement sans avoir besoins de consulter un médecin
              car toutes nos informations on était vérifié par des spécialiste en matière de vaccination.</p>
            </ul>

          </div>
        </div>


      <section id="equipe">

        <div class="wrap">
          <h2>Notre équipe</h2>
          <div class="ligne"></div>
          <div class="section1">
            <img src="images/Equipe/BaptisteAngot.jpg" alt="Un membre d'InfoVaccins.">
            <h3>Baptiste Angot </h3>
            <p>Développeur WEB à NFactory</p>
          </div>
          <div class="section1">
            <img src="images/Equipe/TurpinPaul.jpg" alt="Un membre d'InfoVaccins.">
            <h3>Paul Turpin</h3>
            <p>Développeur WEB à NFactory</p>
          </div>
          <div class="section1">
            <img src="images/logoAcceuil.png" alt="Un membre d'InfoVaccins.">
            <h3>Jean-Baptiste de Sain-Léger</h3>
            <p>Développeur WEB à NFactory</p>
          </div>
          <div class="section1">
            <img src="images/Equipe/NicolasDufresne.jpg" alt="Un membre d'InfoVaccins.">
            <h3>Nicolas Dufresne</h3>
            <p>Développeur WEB à NFactory</p>
          </div>
        </div>
        <div class="clear"></div>

      </section>

      <section id="partenaires">

        <div class="wrap">
          <h2>Nos partenaires</h2>
          <div class="ligne"></div>
          <!-- <div class="section2">
            <a href="#"><img src="images/logoAcceuil.png" alt="Un partenaire d'InfoVaccins."></a>
          </div>
          <div class="section2">
            <a href="#"><img src="images/logoAcceuil.png" alt="Un partenaire d'InfoVaccins."></a>
          </div>
          <div class="section2">
            <a href="#"><img src="images/logoAcceuil.png" alt="Un partenaire d'InfoVaccins."></a>
          </div>
          <div class="section2">
            <a href="#"><img src="images/logoAcceuil.png" alt="Un partenaire d'InfoVaccins."></a>
          </div>
          <div class="section2">
            <a href="#"><img src="images/logoAcceuil.png" alt="Un partenaire d'InfoVaccins."></a>
          </div>
          <div class="section2">
            <a href="#"><img src="images/logoAcceuil.png" alt="Un partenaire d'InfoVaccins."></a>
          </div>
          <div class="section2">
            <a href="#"><img src="images/logoAcceuil.png" alt="Un partenaire d'InfoVaccins."></a>
          </div>
          <div class="section2">
            <a href="#"><img src="images/logoAcceuil.png" alt="Un partenaire d'InfoVaccins."></a>
          </div> -->
        </div>
        <div class="clear"></div>

      </section>

  <?php

  $titre = 'Nouveau message';

  $error = array();

      // si le formulaire est soumis
      if ( !empty($_POST['submitnewpost']) ) {
          // Protection XSS
          $name = trim(strip_tags($_POST['name']));
          $email = trim(strip_tags($_POST['email']));
          // ?????? Voir ici si pas mieux htmlspecialchar ??? pour garder les balise html ++++
          $message = trim(strip_tags($_POST['message']));

          //verification auteur
          if (!empty($name)){
              if(strlen($name) < 3 ) {
          $error['name'] = 'Votre nom est trop court. (minimum 3 caractères)';
        } elseif(strlen($name) > 40) {
          $error['name'] = 'Votre nom est trop long.';
        }

          } else {
            $error['name'] = 'Veuillez entrer votre nom';
          }

          //verification title
          if (!empty($email)){
              if(strlen($email) < 3 ) {
          $error['email'] = 'Votre titre est trop court. (minimum 3 caractères)';
        } elseif(strlen($email) > 220) {
          $error['email'] = 'Votre titre est trop long.';
        }

          } else {
            $error['email'] = 'Veuillez renseigner un titre';
          }

          //verification content
          if (!empty($message)){
              if(strlen($message) < 3 ) {
          $error['message'] = 'Votre contenu est trop court. (minimum 3 caractères)';
        }

          } else {
            $error['message'] = 'Veuillez renseigner un contenu';
          }

          // Si aucune error
          if (count($error) == 0){
              $sql = "INSERT INTO /*articles (title,content,auteur,created_at,updated_at,status) VALUES (:title, :content, :auteur ,NOW(),NULL, 1);*/";
              // preparation de la requête
              $query = $pdo->prepare($sql);

              // Protection injections SQL
              $query->bindValue(':name',$name, PDO::PARAM_STR);
              $query->bindValue(':email',$email, PDO::PARAM_STR);
              $query->bindValue(':message',$message, PDO::PARAM_STR);

              // execution de la requête preparé
              $query->execute();
              // redirection vers page dashboard

          }

      }

   ?>

          <div class="section4">
            <section id="form_contact">
              <div class="wrap2">
                <h2>Contact</h2>
                <div class="ligne"></div>
                <p class="textintro">Si vous souhaitez nous contacter pour des informations complémentaires, remplissez le formulaire suivant :</p>

                <form action="" method="post">
                  <div class="w50">
                    <label for="name">Votre Nom</label>
                    <input class="inputerror" type="text" name="name" value="" placeholder="Ex: Pierre Martin">
                  </div>

                  <div class="w50">
                    <label for="email">Votre Email</label>
                    <input type="email" name="email" value="" placeholder="Ex: pierremartin@gmail.com">
                  </div>

                  <div class="w100">
                    <label for="message">Votre Message</label>
                    <textarea name="message" rows="8" cols="80" placeholder="Votre message..."></textarea>
                  </div>

                  <input type="submit" name="submit" value="Envoyer">
                </form>
              </div>
            </section>
          </div>
        <div class="clear"></div>
  <?php include 'inc/footer.php'; ?>
