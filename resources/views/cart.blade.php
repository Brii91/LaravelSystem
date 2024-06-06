@extends('layout', ['title'=> 'Home'])

@section('page-content')
<div>
    <br>
    @if(Session::has('wrong'))
    <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Opps !</strong> {{Session::get('wrong')}}
</div>
    @endif
    @if(Session::has('success'))
    <br>
    <div class="success">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Congrats !</strong> {{Session::get('success')}}
</div>
    <br>
    @endif
    <br>
    
    <br>
    <br>
    <style>
        .notice {
            font-size: 24px;
            font-weight: bold;
            color: red;
            background-color: yellow;
            padding: 10px;
            border: 2px solid red;
            border-radius: 5px;
            text-align: center;
            margin: 20px 0;
        }
    </style>

    <h1 class="notice">*OJO* Recomendable hacer sus pedidos con dos días de antelación.</h1>

    
<table id="cart" class="table table-hover table-condensed container">
    <thead>
        <tr>
            <th style="width:50%">Producto</th>
            <th style="text-align:center;width:10%">Precio</th>
            <th style="width:8%">Cantidad</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @foreach($carts as $product)
            @php $total += $product['price'] * $product['quantity'] @endphp
            <tr>
                <td>{{$product->name}}</td>
                <td style="text-align:center">RD${{$product->price}}</td>
                <td style="text-align:center">{{$product->quantity}}</td>
                <td style="text-align:center">RD${{$product->subtotal}}</td>
                <td style="text-align:center" class="actions" data-th="">
                    <form method="post" action="{{route('cart.destroy', $product)}}" onsubmit="return confirm('Sure?')">
                        @csrf
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash">
                        </i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    
  
      @if($total_price!=0)


            @foreach($extra_charge as $chrage)
            <tr>
                <td>{{  $chrage->name }}</td>
                <td style="text-align:center"></td>
                <td style="text-align:center"></td>
                
              
                <td style="text-align:center">RD${{  $chrage->price }}</td>


        
                </tr>
            @endforeach



      @endif
        @php 
        

        
        @endphp
        </tbody>
    <tfoot>
        
        </tr>
        <tr>
        @php 
        
        
        $total = $total_price + $total_extra_charge;
        
        Session::put('total',$total_price);

        if($total_price!=0)
        {
            $total_price=$total_price+$total_extra_charge;
            $without_discount_price=$without_discount_price + $total_extra_charge;

        }




        
        @endphp
       
            <td colspan="5" class="text-right"><h5><strong>Total RD${{ $without_discount_price }}</strong></h5></td>
        </tr>
        
        <tr>
      
            <td colspan="5" class="text-right"><h3><strong>Total RD${{ $total_price }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/menu') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continuar comprando</a>
                <form style="display:inline" method="post" action="{{route('confirm_place_order', $total)}}">
                    @csrf
                    <style>
        .form-group {
            margin-bottom: 1em;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5em;
        }

        .form-group textarea {
            width: 100%;
            height: 100px;
            padding: 0.5em;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            padding: 0.75em 1.5em;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #218838;
        }
    </style>
                    <div class="form-group">
    <label for="observations">Observaciones:</label>
    <textarea id="observations" name="observations" placeholder="Escribe tus observaciones aquí..."></textarea>
</div>

<div class="form-group">
    <label for="date">Fecha:</label>
    <input type="date" id="date" name="date" min="{{ date('Y-m-d', strtotime('+1 day')) }}">
</div>

<div class="form-group">
        <label for="time">Hora:</label>
            <select id="hour" name="hour">
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <span>:</span>
            <select id="minute" name="minute">
                @for ($i = 0; $i < 60; $i+=5)
                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                @endfor
            </select>
            <select id="tanda" name="tanda">
                <option value="AM">AM</option>
                <option value="PM">PM</option>
            </select>
        </div>
    </div>
<script>
document.getElementById('form').addEventListener('submit', function(e) {
    const timeInput = document.getElementById('time').value;
    const timePattern = /^(0[1-9]|1[0-2]):([0-5][0-9])\s?(AM|PM)$/i;

    if (!timePattern.test(timeInput)) {
        alert('La hora debe estar en formato hh:mm AM/PM.');
        e.preventDefault();
    }
});
</script>


                    @if($total_price==0)
                    <button class="btn btn-success" disabled>Pedir</button>
                    @else
                    <a href="{{route('Notification')}}">
    <button id="carrito-acciones-comprar" class="carrito-acciones-comprar">Pedir ahora</button>
</a>
                    @endif
                </form>
            </td>
        </tr>
    </tfoot>
</table>
</div>
@endsection


<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}


.success {
  padding: 20px;
  background-color: #4BB543;
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