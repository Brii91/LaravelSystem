<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use app\Models\Cart;
use app\Http\Controllers\cartController;
use Illuminate\Http\Request;
class registrodeOrdenes extends TestCase
{
    public function test_registro_de_ordenes()
    {

        // PROBAR CREACION DE RESERVA  
        $request = new Request([
        
    
            
        'name' => 'eso',
        'price' => '10.10',
        'quantity' => '2.0',
        'subtotal' => '10.00',
         
       
        


        ]);


        $response = (new cartController)->store($request);


        $this->assertCount(10, Cart::all());
 

      

}}
