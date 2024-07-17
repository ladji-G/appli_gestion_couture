<x-app-layout>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5">Liste des commandes</h3>

        <div class="">

            @if(session()->has("successDelete"))
            <div class="alert alert-success">
                <h4>{{session()->get('successDelete')}}</h4>
            </div>
            @endif
            <div class="col-12 d-flex justify-content-center"><div class="etatcmd col-8 d-flex justify-content-center"><strong>Liste des commandes en cours de traitement</strong></div></div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="milieu">N°</th>
                        <th scope="col" class="milieu">Nom</th>
                        <th scope="col" class="milieu">Nom du model</th>
                        <th scope="col" class="milieu">Commander le</th>
                        <th style="width: 350px;" class="milieu" scope="col">Etat de votre Commande</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $compteur = 0;

                    ?>
                    @foreach($commandes as $commande)
                    <?php $compteur++;  
                    if ($commande->panier != NULL) {
                    ?>
                    
                    <tr class="align-middle">
                        <th class="milieu" scope="row"><strong> {{ $loop->index + 1 }} </strong></th>
                        <td>{{ $commande->panier->user->name }}</td>
                        <td>{{ $commande->panier->Nom }}</td>
                        <td class="milieu">{{ $commande->created_at->format('d-m-Y') }}</td>
                        <td class="centrr">
                           <strong><p class="siz">En cours de traitement</p></strong>
                        </td>
                    </tr>
                    <?php  } //fin if ($commande  ?>
                    @endforeach
                </tbody>
            </table>
            <br><br><br><br>

            <div class="col-12 d-flex justify-content-center"><div class="etcmd col-8 d-flex justify-content-center"><strong>Liste des commandes terminées</strong></div></div> 
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="milieu">N°</th>
                        <th scope="col" class="milieu">Prenom</th>
                        <th scope="col" class="milieu">Nom du model</th>
                        <th scope="col" class="milieu">Terminé le</th>
                        <th style="width: 350px;" class="milieu" scope="col">Etat de votre Commande</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $compteur = 0;

                    ?>
                    @foreach($commandes as $commande)
                    <?php $compteur++;  
                    if ($commande->panier != NULL) {
                    ?>
                    
                    <tr class="align-middle">
                        <th class="milieu" scope="row"><strong> {{ $loop->index + 1 }} </strong></th>
                        <td>{{ $commande->panier->user->name }}</td>
                        <td>{{ $commande->panier->Nom }}</td>
                        <td class="milieu">{{ $commande->updated_at->format('d-m-Y') }}</td>
                        <td class="centrr">
                           <strong><p class="size">Prête</p></strong>
                        </td>
                    </tr>
                    <?php  } //fin if ($commande  ?>
                    @endforeach
                </tbody>
            </table>            





        </div>


    </div>

</x-app-layout>