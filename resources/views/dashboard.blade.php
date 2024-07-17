<x-app-layout>
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="entete text-center text-uppercase border-bottom pb-2 mb-5">Gallerie d'image</h3>

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


        <div class="row text-center text-lg-start">

          @foreach($catalogue as $catalogue)
          <?php $compteur++; ?>
          <div class="imag col-12 col-md-3 mb-3" style="text-align: center; margin-top:10px;">
            <form action="{{route('add_to_cart',$catalogue->id)}}" method="post">
              @csrf
              <div class="block">
                <div class="block-imag">
                  <img src="/storage/{{$catalogue->cover_image}}" class=" ima img-responsive" alt="">
                </div>
                <h6 style="text-align: center;">{{ $catalogue->Nom }}</h6>
              </div>

              <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $compteur ?>">Detail</a>
              <!-- <a href="{{ route('add_to_cart', $catalogue->id) }}" class="btn btn-primary btn-block text-center" role="button"></a> -->
              <input type="submit" value="Ajouter au panier" class="btn btn-primary">

            </form>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal<?= $compteur ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

            @csrf
            <input type="hidden" name="_method" value="delete">
            </form>
            <div class="modal-dialog">
              <div class="">
                <div class="container rounded bg-white mt-5 mb-5">
                  <div class="row">
                    <div class="col-md-5 border-right">
                      <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="" width="300px" src="/storage/{{$catalogue->cover_image}}"><span class="font-weight-bold">
                          {{ $catalogue->Nom }}</span></div>
                    </div>
                    <div class="col-md-7 border-right">
                      <div class="p-3 py-5">
                        <div class="centrer d-flex justify-content-between align-items-center mb-3">
                          <strong>
                            <h2 class="">Detail de la photo</h2>
                          </strong>
                        </div>
                        <div class="row mt-2">
                          <div class="col-md-5 fw-bold"><label class="labels">Description</label></div>
                          <div class="col-md-7 ranger"><label class="labels">{{ $catalogue->Desciption }}</label></div>
                          <br><br>
                          <br><br>
                          <div class="col-md-5 fw-bold"><label class="labels">Prix pour enfant</label></div>
                          <div class="col-md-7 ranger"><label class="labels">{{ $catalogue->PrixEnf }}</label></div>
                          <br><br>
                          <div class="col-md-5 fw-bold"><label class="labels">Prix pour adulte</label></div>
                          <div class="col-md-7 ranger"><label class="labels">{{ $catalogue->PrixAdu }}</label></div>
                          <br><br>

                          <div class="col-md-5 fw-bold"><label class="labels">Date de publication</label></div>
                          <div class="col-md-7"><label class="labels">{{ $catalogue->created_at->format('d-m-Y') }}</label></div>
                        </div>


                      </div>
                    </div>

                  </div>

                </div>
              </div>
            </div>

          </div>


          @endforeach
        </div>
    </div>

    </tbody>




  </div>
  </div>
</x-app-layout>