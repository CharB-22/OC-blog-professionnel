<?php $this->title = "Mon blog professionnel"; ?>

<div class="container"> 
    
    <div class="hero position-relative">
        <div class="text-center position-absolute top-50 start-50 translate-middle">
            <h1>I'm Charlène Bennevault<br><em style="text-transform:uppercase">Developper and eCommerce Expert</em></h1>
        </div>
    </div> 


    <div id="about" class="container my-5">
        <div class="row text-center">
            <div class="col-xs-12 col-md-6 py-4">
                <img src="Public\images\photo_profil.jpg" class="img-thumbnail">  
            </div>
            <div class="col-xs-12 col-md-6 p-4 d-flex align-items-center">
                <p>Après 6 ans de carrière dans le eCommerce, j’ai décidé de franchir le pas et de me concentrer totalement sur l’aspect technique du web et me former au développement web. A travers la synergie de mon expertise commerciale et webmarketing et mes connaissances en développement, je souhaite apporter mon soutien aux entreprises qui souhaitent avoir un impact positif sur le monde.</p>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-evenly py-4">
            <a href="Public/cv_Charlene_Bennevault.pdf" target="_blank" type="button" class="btn btn-primary">Télécharger CV</a>
            <a href="index.php?route=bloglist" type="button" class="btn btn-primary">Voir les articles</a>
        </div>
    </div>

    <div id="contact" class="container my-5">
        <h2 class="my-5">Me contacter</h2>
        <form method="post" action="index.php?route=home#contact">
          <?php
            if (!empty($message))
            {
                echo "<div class='alert alert-". $message->getMessageFormat(). " alert-dismissible fade show' role='alert'>"
                . $message->getMessageContent() .
                    " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
          ?>
          <div class="row mb-3">
            <div class="form-group col-xs-12 col-md-6">
              <label for="lastname" class="form-label">Nom</label>
              <input type="text" class="form-control" id="lastname" name="senderLastName" aria-describedby="senderLastName" required>
            </div>
            <div class="form-group col-xs-12 col-md-6">
              <label for="name" class="form-label">Prénom</label>
              <input type="text" class="form-control" id="name" name="senderName" aria-describedby="senderName" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="email" class="form-label">Adresse Email</label>
            <input type="email" class="form-control" id="email" name="senderEmail" aria-describedby="senderEmail" required>
          </div>
          <div class="row mb-3">
            <label for="emailSubject" class="form-label">Sujet</label>
            <input type="text" class="form-control" id="emailSubject" name="emailSubject" aria-describedby="emailSubject" required>
          </div>
          <div class="row mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea id="message" name="emailContent" rows="4" cols="57" required></textarea>
          </div>
          <button type="submit" name="submitEmail" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</div>
