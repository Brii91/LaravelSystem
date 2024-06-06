@extends('admin/adminlayout')

@section('container')

<br>

@if(Session::has('wrong'))

    <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Opps !</strong> {{Session::get('wrong')}}
</div>
<br>
    @endif
    @if(Session::has('success'))

    <div class="success">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Congrats !</strong> {{Session::get('success')}}
</div>
    <br>
    @endif


@foreach($products as $product)
<div class="card">
  <h5 class="card-header">Detalle del cliente</h5>
  <div class="card-body">
    <h5 class="card-text">Factura No : {{  $product->invoice_no }}</h5>
    <br>
    <?php


        $user=DB::table('users')->where('id',$product->user_id)->first();

    ?>
    <p class="card-text">Nombre del cliente : {{ $user->name }}</p>
    <p class="card-text">Número del cliente : {{ $user->phone }}</p>
    <p class="card-text">Gmail del cliente : {{ $user->email }}</p>
    <a href="/customer" class="btn btn-primary"><b>Detalles</a>
  </div>
</div>

@break;




@endforeach


<br>




<div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Detalle del producto</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                          
           
                            <th>Nombre del producto </th>
                            <th> Precio </th>
                            <th> Cantidad </th>
                            <th> Subtotal </th>
                          
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                          <tr>
                           
                      
                            <td> {{ $product->name }} </td>
                            <td> {{ $product->price }} </td>
                            <td>


                            {{ $product->quantity }}


                            </td>


                            <td>  {{  $product->subtotal }}</td>
                      
                          </tr>

                        @endforeach

                        @foreach($extra_charge as $charge)
                          <tr>
                           
                      
                            <td> {{ $charge->name }} </td>
                      
                           <td>

                           </td>
                           <td></td>


                            <td>  {{  $charge->price }}</td>
                      
                          </tr>

                        @endforeach

                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total </td>
                            <td class="">  RD${{  $wihout_discount_price }}</td>                   
                    
                    
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td>Discount </td>
                            <td class="">  RD${{  $discount_price }}</td>                   
                    
                    
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td><h3>Total</h3> </td>
                            <td class=""><h3>  RD${{  $total_price }} </h3></td>                   
                    
                    
                        </tr>
                       
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              @foreach($products as $product)
              @if($product->product_order=="yes")
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  
                 
                    
                      <a href="{{  asset('/invoice/cancel-order/'.$product->invoice_no) }}" class="btn btn-danger">Cancel Order</a>
                    </form>

                    @break;

   

                  </div>
                </div>

            </div>



            @endif
            @endforeach


         




@endsection()



<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.success {
  padding: 20px;
  background-color: #4BB543 ;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>