@extends('layout')

@section('content')

<div class="col-12">
    <div class="container-fluid d-flex flex-column justify-content-center _div-azul" id="section">
        <h3 class="mx-3 align-self-start">Admin</h3>
    </div>
    <div class="col-12 d-flex flex-column">
        <div class="col-2 align-self-start m-3">
            <div class="d-flex flex-column justify-content-center w-50">
                <img src="{{ asset('img/profile.png') }}" alt="" class="rounded-circle" height="110vh">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Username</span>
                <input type="text" class="form-control" placeholder="ID" aria-label="ID" aria-describedby="basic-addon1" value="{{ session('username') }}" disabled>
              </div>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <div>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{ route('admin-appo') }}">Appointments</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin-pat') }}">Patients</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin-emp') }}">Employees</a>    
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin-usr') }}">Users</a>    
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin-ther') }}">Therapies</a>    
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin-ch') }}">Clinic History</a>    
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin-trau') }}">Traumatology</a>    
                    </li>
                  </ul>
            </div>
        </div>

        <div class="col-3 align-self-center m-3">
            <h3 class="_h3">New Traumatology Doctor</h3>
            <form action="{{ route('admin-new-trau') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Name Doctor</span>
                    <input type="text" class="form-control" name="name" placeholder="Name Doctor" aria-label="fn" aria-describedby="basic-addon1">
                </div>
                <button class="btn btn-success" type="submit">Create Doctor</button>
            </form>
        </div>
@endsection