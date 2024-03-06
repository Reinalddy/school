@extends('partials.body')
@section('title') Dashboard @endsection

@section('content')
    <section id="navbar">
      <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Smart School</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          {{-- navbar menu --}}
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">SPP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Exam</a>
            </li>

          </ul>
          {{-- button logout and profile menu --}}
          <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
            <div class="d-flex justify-content-end mr-5">
              <h5 class="text-white text-capitalize mt-2" style="margin-right: 20px;">{{ Auth::user()->name }}</h5>
              <a href="{{ route('logout.user') }}" class="btn btn-danger" style="margin-right: 20px;">Logout</a>
            </div>
          </div>

        </div>
      </nav>
    </section>


    <section id="body">
      <h1>Dashboard User</h1>
    </section>
@endsection