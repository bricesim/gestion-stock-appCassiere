<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>enregVente</title>

    <script src ="/assets/jquery.js"></script>

    <script type="text/javascript">


       function addField()
       {
      var produits = $("#produits");
      var container = $("#container");
      clone = produits.clone();
      clone.appendTo(container);


       }



    </script>



</head>
<body>
    <form class="user" action="{{ route('affichefacture') }}" method="Get">
        <div id="container">
            <div id="produits" name="titre[]">
                <label for="listes" class="form-label">produits  </label>
                <input class="form-control" list="listes_sympt" name="listes[]"
                           id="listes" placeholder="produit?...">
                <datalist id="listes_sympt">
                    @foreach ($produit as $prod)
                        <option value="{{$prod->name}} " label="{{$prod->name}} ">
                    @endforeach
                </datalist>

                <label for="listes" class="form-label">quantité souhaité </label>
                <input type="number"  value="0" name="quantiter[]" id="listes" >

            </div>
        </div>
                <button type="button" onclick="addField()" >+</button>

        <div style="margin-top: 10px;">
            <button type="submit">Afficher la facture</button>
        </div>

    </form>
    <div class="card">
        <h3>Facture
            <a href="{{route('generate')}}" class="btn btn-danger btn-sm float mx-1">Telecharger</a>
        </h3>
    </div> 

</body>
</html>
