<x-app-layout>
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5">Les informations sur l'atelier</h3>

    <div class="">

      @if(session()->has("successDelete"))
      <div class="alert alert-success">
        <h4>{{session()->get('successDelete')}}</h4>
      </div>
      @endif
      <tbody>
        <?php
        $compteur = 0;

        ?>

        <div class="infocenter">
          <div class="row col-12 dive text-center text-lg-start">


            <div>Le délai de rendez-vous est fixé à deux semaines par défaut pour tous les clients. <br>
              Tout client désireux de négocier une nouvelle date pour la réalisation de son modèle<br>
              peut contacter l'atelier via les coordonnées suivantes : <br><br>

              <a href="http:aligramboute225@gmail.com">E-mail : aligramboute225@gmail.com</a><br>
              <p>Telephone 1 : 0103065293</p>
              <p>Telephone 2 : 0749065280</p>
              <p>Telephone 3 : 0575168483</p><br>

              Ces trois numéros sont également opérationnels pour recevoir les dépôts.
            </div>

          </div>
        </div>

      </tbody>




    </div>
  </div>
</x-app-layout>