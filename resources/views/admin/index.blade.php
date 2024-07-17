@extends('admin.layouts.app')
@section('admin')

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="width: 100%">
  <div class="modal-dialog ">
<div class="row d-flex  align-items-center justify-content-center border">
    <div class="col-6 d-flex  ">


    <div class="modal-content">
      <div class="modal-header">
        <h1 class="titre modal-title" id="exampleModalLabel">Voici plus de détails sur notre atelier de couture</h1>
      </div>
      <div class="modal-body">
         <br>
<strong> <h1 class="badra">BaDrA Couture</h1></strong> <br><br><br>
<strong> Description de l'atelier :</strong> BaDrA Couture est un atelier de couture spécialisé dans la <br> 
création de vêtements sur mesure et la réalisation de retouches. Situé au cœur de la ville, notre atelier offre un espace inspirant et <br> 
convivial où les passionnés de couture peuvent donner vie à leurs idées. <br><br>

<strong> Équipement de l'atelier</strong> : Nous considérons une large gamme d'équipements professionnels <br> 
pour répondre à tous les besoins de couture. Notre atelier est équipé de plusieurs machines 
à coudre industrielles, <br> d'une surjeteuse, d'une machine à broder, d'une presse à repasser 
professionnelle, <br> d'une table de coupe spacieuse et de divers outils de couture tels que des ciseaux, 
des épingles, des mètres rubans, etc. <br><br>

<h5><strong> Prestations proposées :</strong></h5><br>

<strong> 1.	Création de vêtements sur mesure :</strong> Nous travaillons en étroite collaboration avec nos clients pour <br>
 créer des vêtements uniques qui correspondent à leurs goûts, à leur style et à leurs mesures. <br> 
 De la conception initiale à la réalisation finale, notre équipe de couturiers expérimentés guide <br>
  les clients à chaque étape du processus pour s'assurer que leur vision se concrétise. <br><br>

 <strong> 2.	Modification de vêtements :</strong> Nous proposons également des services de modification de vêtements <br>
 pour les personnes qui souhaitent donner une nouvelle vie à leurs pièces préférées. <br>
 Que ce soit pour ajuster la taille, raccourcir ou allonger les ourlets, modifier les manches ou les cols, <br>
 notre équipe de couturiers qualifiés peut réaliser toutes sortes de modifications pour s'adapter parfaitement à vos besoins. <br><br>
 <strong> 3.	Conseils en matière de couture :</strong> Notre équipe d'experts en couture est disponible pour fournir des conseils et<br>
  des recommandations aux couturiers en herbe ou à ceux qui sauront améliorer leurs compétences. <br>
  Que vous ayez besoin d'aide pour choisir le bon tissu, comprendre un patron ou maîtriser une technique <br> 
  de couture spécifique, nous sommes là pour vous guider et vous aider à progresser dans votre parcours couture. <br><br>

  <strong> 3.	Cours de couture :</strong> Nous organisons également des cours de couture pour les débutants et les personnes souhaitant <br>
  approfondir leurs connaissances. Nos cours sont dégradés par des professionnels de la couture qui vous guideront <br> 
  à travers différentes techniques et projets. Que vous souhaitiez apprendre les bases de la couture, <br> 
  perfectionner vos compétences ou vous lancer dans des projets avancés, nos cours sont adaptés à tous les niveaux. <br><br>

  <strong> 4.	Location d'espace de couture :</strong> Nous offrons la possibilité de louer notre espace de couture entièrement équipé <br> 
  pour ceux qui souhaitent travailler sur leurs projets personnels. Que vous ayez besoin d'un endroit tranquille <br> 
  pour vous loger sur vos créations ou que vous n'ayez pas l'équipement nécessaire à la maison, notre atelier est <br> 
  l'endroit idéal. La location d'espace comprend l'accès à nos machines à coudre, à notre matériel de couture <br> 
  et à notre espace de travail confortable. <br><br>

  <strong> 5.	Vente de fournitures de couture :</strong> Nous avons également une sélection de fournitures de couture disponibles à la vente. <br> 
  Que ce soit des tissus de haute qualité, des fils, des boutons, des fermetures éclair, des rubans ou d'autres <br> 
  accessoires de couture, nous avons proposé une gamme de produits soigneusement sélectionnés pour répondre à vos besoins. <br> 
  Nos experts en couture sont disponibles pour vous conseiller et vous aider à choisir les fournitures adéquates pour vos projets.


        </div>
    </div>
    </div>
</div>



  </div>
</div>

    <div class="complet text-center carton text-uppercase my-1 p-4 bg-body rounded shadow-sm">
    <marquee><strong><h1 class="bienvenue border-bottom pb-0 mb-0">Bienvenue dans mon application de gestion</h1></strong></marquee>
    </div>
    <div>
    <!doctype html>
    <html lang="en">

  <head>
    <title>Barberz &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  </head>

  <body class="bg-body-tertiary" data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


                  <!-- image en arrière plan -->
                <div class="imagedefond">
                  <strong><h1 class="mb-0 centrer">Plus qu'une simple couture</h1></strong>
                    <p>

                    <div>
                      <strong><a href="{{ route('admin.register') }}" class="registration taille">Creer un nouveau Admin</a></strong> <br> <br>
                      <strong><a href="{{ route('couturier.register') }}" class="registration taille">Creer un nouveau Employé</a></strong>
                    </div>
                    <strong></strong>
                  </p>
                </div>

                <!-- <h1>Tutoriel HTML et CSS</h1>
                <div class="photo" id="ex1"></div> -->

                      <!-- endImageback -->

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>


    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-12">


              <!--bouton Modal  -->
            <button type="button" class="bouton btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                   Plus de détails
            </button> 


            </div>
          </div>
        </div>
      </div>
    </div>
    

    <!-- END section -->




    


    </div>

  </body>

</html>


    </div>


@endsection