@extends('admin/adminlayout')

@section('container')





<div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Detalle de comentarios</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                          
           
                            <th> Día </th>
                            <th> Nombre </th>
                            <th> Gmail </th>
                            <th> Teléfono</th>
                            <th> Mensaje </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($reservations as $reservation)
                          <tr>
                           
                            <td>
                              <span class="ps-2">{{ $reservation->date }}</span>
                            </td>
                            <td> {{ $reservation->name }} </td>
                            <td>


                            {{ $reservation->email }}


                            </td>


                            <td>  {{  $reservation->phone }}</td>
                     
                 

                            <td>

                            {{ $reservation->message }}

                              </td>
                          </tr>

                        @endforeach
                       
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>





@endsection()