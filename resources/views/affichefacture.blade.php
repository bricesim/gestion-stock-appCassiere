<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>affichefacture</title>

    <style>
      body{
          background-color: #F6F6F6;
          margin: 0;
          padding: 0;
      }
      h1,h2,h3,h4,h5,h6{
          margin: 0;
          padding: 0;
      }
      p{
          margin: 0;
          padding: 0;
      }
      .container{
          width: 80%;
          margin-right: auto;
          margin-left: auto;
      }
      .brand-section{
         background-color: #4653c9;
         padding: 10px 40px;
      }
      .logo{
          width: 50%;
      }

      .row{
          display: flex;
          flex-wrap: wrap;
      }
      .col-6{
          width: 50%;
          flex: 0 0 auto;
      }
      .text-white{
          color: #fff;
      }
      .company-details{
          float: right;
          text-align: right;
      }
      .body-section{
          padding: 16px;
          border: 1px solid gray;
      }
      .heading{
          font-size: 20px;
          margin-bottom: 08px;
      }
      .sub-heading{
          color: #262626;
          margin-bottom: 05px;
      }
      table{
          background-color: #fff;
          width: 100%;
          border-collapse: collapse;
      }
      table thead tr{
          border: 1px solid #111;
          background-color: #5c66c7;
      }
      table td {
          vertical-align: middle !important;
          text-align: center;
      }
      table th, table td {
          padding-top: 08px;
          padding-bottom: 08px;
      }
      .table-bordered{
          box-shadow: 0px 0px 5px 0.5px gray;
      }
      .table-bordered td, .table-bordered th {
          border: 1px solid #dee2e6;
      }
      .text-right{
          text-align: end;
      }
      .w-20{
          width: 20%;
      }
      .float-right{
          float: right;
      }
  </style>
</head>
<body>

  <div class="container">
      <div class="brand-section">
          <div class="row">
              <div class="col-6">
                  <h1 class="text-white">Stock manager</h1>
              </div>
          </div>
      </div>
      <div class="body-section">
          <div class="row">
              <div class="col-6">
                  <h2 class="heading">Facture N°:
                      {{$facture->num_facture}}
                  </h2>
                  <p class="sub-heading">Order Date: {{$facture->created_at}}  </p>
              </div>
              <div class="col-6">
                  <p class="sub-heading">Full Name:  </p>
                  <p class="sub-heading">Address:  </p>
                  <p class="sub-heading">Phone Number:  </p>
              </div>
          </div>
      </div>



      <div class="body-section">
          <h3 class="heading">Ordered Items</h3>
          <br>
          <table class="table-bordered">
              <thead>
                  <tr>
                      <th>Product</th>
                      <th class="w-20">Price</th>
                      <th class="w-20">Quantity</th>
                      <th class="w-20">Grandtotal</th>
                  </tr>
              </thead>
              <tbody>
                  <td>
                    @if(($facture->nom_produit1)!=null){{$facture->nom_produit1}}
                    @elseif(($facture->nom_produit2)!=null){{$facture->nom_produit2}}
                    @elseif (($facture->nom_produit3)!=null){{$facture->nom_produit3}}
                    @endif
                  </td>
                  <td>
                    @if(($facture->nom_produit1)!=null)${{$facture->prixU_produit1}}
                    @elseif(($facture->nom_produit2)!=null)$ {{$facture->prixU_produit2}}
                    @elseif (($facture->nom_produit3)!=null)${{$facture->prixU_produit3}}
                    @endif
                  </td>
                  <td>
                    @if(($facture->nom_produit1)!=null){{$facture->qté_produit1}}
                    @elseif(($facture->nom_produit2)!=null){{$facture->qté_produit2}}
                    @elseif (($facture->nom_produit3)!=null){{$facture->qté_produit3}}
                    @endif
                  </td>
                  <td>
                    @if(($facture->nom_produit1)!=null)${{$facture->prixT_produit1}}
                    @elseif(($facture->nom_produit2)!=null)${{$facture->prixT_produit2}}
                    @elseif (($facture->nom_produit3)!=null)${{$facture->prixT_produit3}}

                    @endif
                  </td>
              </tr>
                  <tr>
                      <td colspan="3" class="text-right">Grand Total</td>
                      <td>$ {{$facture->prixTotal}} </td>
                  </tr>
              </tbody>
          </table>
          <br>
          <h3 class="heading">Payment Status: Paid</h3>
          <h3 class="heading">Payment Mode: Cash on Delivery</h3>
      </div>

  </div>


</body>
</html>
