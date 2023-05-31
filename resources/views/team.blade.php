@extends('layout')

@section('content')
<div class="col-12">
  <div class="container-fluid d-flex flex-column justify-content-center _div-azul">
    <h3 class="mx-3">Our Team</h3>
</div>
    <div class="container-fluid d-flex flex-column align-items-center pt-5">
        <div class="text-center w-50"><h4>From AtiveLife team</h4></div>
        <div class="text-center w-75"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
    </div>

    <div class="c-12 d-flex flex-row flex-wrap justify-content-center pt-5 _div-treat" mb-5>

        <div class="card w-25 m-3">
            <img src="{{ asset('img/fisio1.jpg') }}" class="card-img-top align-self-center w-50" alt="...">
            <div class="card-body">
              <h5 class="card-title">Robert McFadden</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>              
            </div>
          </div>
          <div class="card w-25 m-3">
            <img src="{{ asset('img/fisio2.jpg') }}" class="card-img-top align-self-center w-50" alt="...">
            <div class="card-body">
              <h5 class="card-title">Kirsty Samuels</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>              
            </div>
          </div>
          <div class="card w-25 m-3">
            <img src="{{ asset('img/fisio3.jpg') }}" class="card-img-top align-self-center w-50" alt="...">
            <div class="card-body">
              <h5 class="card-title">Lidia Dominguez</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>              
            </div>
          </div>
    </div>
</div>
@endsection