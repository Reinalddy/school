@extends('partials.body')
@section('title') Login @endsection

<section class="vh-100">
  <div class="container-fluid h-custom">

    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>

      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
        @elseif (session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
        @endif
        <form action="{{ route('admin.login.process') }}" method="POST">
          @csrf
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start mb-5">
            <h1>Admin Login</h1>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
              placeholder="Enter a valid email address" />
            <label class="form-label" for="email">Email address</label>
          </div>

          @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
              placeholder="Enter password" />
            <label class="form-label" for="password">Password</label>
          </div>

          @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <div class="d-flex justify-content-between align-items-center">
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>

          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2020. All rights reserved.
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
</section>