<x-app-layout>

      <div class="card m-5">
      @section('content')

        <div class="card-header">
            <p class="entete">Le Panier</p>
        </div>
    <div class="card-body">
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:45%">Product</th>
            <th style="width:45%">Nom</th>
            <!-- <th style="width:30%">Quantity</th> -->
        </tr>
    </thead>
  
    <tbody>
            @foreach($panier as $catalogue)
            
            <form action="{{route('valider',$catalogue->id)}}" method="post">
                @csrf
                    <tr data-id="{{$catalogue->id}}">
                        <td data-th="Product">
                            <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ asset('storage/') }}/{{ $catalogue['photo'] }}" style="width: 100px; height: 100px;" class="img-responsive"/>
                            </div>
                            </div>
                        </td>
                        <td data-th="Nom">
                                <div class="mt-4 col-sm-9">
                                    <h4 class="nomargin">{{ $catalogue->Nom }}</h4>
                                </div>
                        </td>
                        <!-- <td data-th="Quantity">
                        <div class="mt-4 col-sm-3 hidden-xs">
                            <input type="number" value="{{ $catalogue->quantite }}" style="width: 70px; height: 30px; text-align: center;" class="form-control quantity cart_update" min="1" />
                        </div>
                        </td> -->
                        <td class="actions" data-th="">

                        <div class="row d-flex " style="flex-wrap:nowrap">
                            <div class="col mb-4">  
                                    <button class="btn btn-success"><i class="fa fa-money"></i> Valider</button>
                            </div>
                            <div class="col mb-4">
                                    <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                            </div> 
                        </div>

                        </td>
                        
                    </tr>
            @endforeach
          

    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('dashboard') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continuer vos commande</a>
            </td>
        </tr>
        </form>
    </tfoot>
    
</table> 


@section('scripts')
<script type="text/javascript">
   
    $(".cart_update").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    $(".cart_remove").click(function (e) {
        e.preventDefault();
//    var nbPanier = document.getElementsByClassName("cart_remove").innerHTML;
        var ele = $(this);
   
        if(confirm("Voulez-vous vraiment supprimer?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>
@endsection

</div>
</div>
</x-app-layout>
