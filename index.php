<?php $titrePage = "Accueil";
include('includes/header.php'); ?>


<div id="slider" class="carousel slide " data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
  </ul>
  
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Images/salle-menu.jpg" alt="Nos Salles" width="100%" height="100%" >
      <div class="carousel-caption ">

          <h3 class="text_slide">Nos Salles</h3>
          <p class="text_slide"></p>
      </div>    
    </div>
    <div class="carousel-item">
      <img src="Images/argentrie.jpg" alt="Nos Produits" width="100%" height="100%">
      <div class="carousel-caption ">

          <h3 class="text_slide">Nos Produits</h3>
          <p class="text_slide"></p>
      </div> 
    </div>

     <a class="carousel-control-prev" href="#slider" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#slider" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<div class="step-container"><div class="widget block block-static-block">
    <div class="container">
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <h2 class="text">Achetez tout le matériel pour votre réception en 3 étapes !</h2>
  </div>
</div>
  <div class="row" style=" margin-bottom: 50px;">

      <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="step row">
      <div class="col-xs-12 col-xs-half"><img class="img-responsive" src="https://www.options.fr/media/wysiwyg/icone_selection.png" alt="" /><span class="step-number">1</span><span class="step-label">Sélectionnez votre vaisselle, mobilier et décoration en ligne</span></div>
    </div>

    </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="step row">
      <div class="col-xs-12 col-xs-half"><img class="img-responsive" src="https://www.options.fr/media/wysiwyg/icone_quantite.png" alt="" /><span class="step-number">2</span><span class="step-label">Déterminez la quantité dont vous avez besoin</span></div>
    </div>

    </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="step row">
      <div class="col-xs-12 col-xs-half"><img class="img-responsive" src="https://www.options.fr/media/wysiwyg/icone_valider.png" alt="" /><span class="step-number">3</span><span class="step-label">Validez votre panier !</span></div>
    </div>

  </div>
</div>
</div>


<?php include('includes/footer.php'); ?>
