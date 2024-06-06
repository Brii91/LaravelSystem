@extends('admin/adminlayout')

@section('container')

<div class="row">
</div>
<div class="row">
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">Cantidad : {{ $pending_order }}</h3>
                            <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success ">
                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Pedidos</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">Cantidad : {{ $processing_order }}</h3>
                            <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success">
                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">Cantidad : {{ $cancel_order }}</h3>
                            <p class="text-danger ms-2 mb-0 font-weight-medium"></p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-danger">
                            <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Pedidos cancelados</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">Cantidad : {{ $complete_order }}</h3>
                            <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                        </div>
                    </div>
                    <div class="icon icon-box-success ">
                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pedidos</h4>

                <div id="chartContainer" style="height: 170px; width: 100%; background-color: transparent !important;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>

                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Total</h6>
                        <p class="text-muted mb-0"></p>
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">RD${{ $total }}</h6>
                    </div>
                </div>

                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Completados</h6>
                        <p class="text-muted mb-0"></p>
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">RD${{ $cash_on_payment }}</h6>
                    </div>
                </div>

                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">En proceso</h6>
                        <p class="text-muted mb-0"></p>
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">RD${{ $online_payment }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <h4 class="card-title mb-1">Mejor calificación</h4>
                    <p class="text-muted mb-1">Votantes</p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="preview-list">

                            @php
                            $i=1;
                            @endphp
                            @foreach($per_rate as $prod)
                            @if($i>5)
                            @break
                            @endif
                            @php
                            $index_search = array_search($prod, $copy_product);
                            $product_get=DB::table('products')->where('id',$index_search)->first();
                            $copy_product[$index_search]=NULL;
                            $voter=DB::table('rates')->where('product_id',$index_search)->count();
                            $i++;
                            @endphp

                            @if($product_get)
                            <div class="preview-item border-bottom">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-primary">
                                        <img class="img-xs" src="{{ asset('assets/images/'.$product_get->image) }}" alt="">
                                    </div>
                                </div>
                                <div class="preview-item-content d-sm-flex flex-grow">
                                    <div class="flex-grow">
                                        <h6 class="preview-subject">{{ $product_get->name }}</h6>
                                        <p class="text-muted mb-0">Clasificación : {{ $prod }}</p>
                                    </div>
                                    <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                        <p class="text-muted">{{ $voter }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-sm-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <h5>Total Admin</h5>
                <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                            <h2 class="mb-0">{{ $admin }}</h2>
                            <p class="text-danger ms-2 mb-0 font-weight-medium"></p>
                        </div>
                        <h6 class="text-muted font-weight-normal"></h6>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-monitor text-success ms-auto"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Mejores productos vendidos</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="text-align:center;"> Producto ID </th>
                                <th style="text-align:center;"> Nombre del producto </th>
                                <th style="text-align:center;"> Precio </th>
                                <th style="text-align:center;"> Cantidad </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach($product_cart as $prod)
                            @if($i>5)
                            @break
                            @endif
                            @php
                            $index_search = array_search($prod, $copy_cart);
                            $product_get=DB::table('products')->where('id',$index_search)->first();
                            $copy_cart[$index_search]=NULL;
                            $i++;
                            @endphp

                            @if($product_get)
                            <tr>
                                <td style="text-align:center;"> {{ $product_get->id }} </td>
                                <td style="text-align:center;"> {{ $product_get->name }} </td>
                                <td style="text-align:center;"> {{ $product_get->price }} </td>
                                <td style="text-align:center;"> {{ $prod }} </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection()

<script type="text/javascript">
window.onload = function () {
    var cash_pay_value = "<?php echo $cash_on_payment; ?>";
    var online_pay_value = "<?php echo $online_payment; ?>";
    console.log(cash_pay_value);
    console.log(online_pay_value);

    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "dark2", // "light2", "dark1", "dark2"
        animationEnabled: false, // change to true		
        title:{
            text: ""
        },
        data: [
        {
            // Change type to "bar", "area", "spline", "pie",etc.
            type: "column",
            dataPoints: [
                { label: "Completados",  y: +cash_pay_value  },
                { label: "En proceso", y: +online_pay_value  },
            ]
        }
        ]
    });
    chart.render();
}
</script>

<style>
canvas {
    background-color: ;
    color: ;
}
</style>
