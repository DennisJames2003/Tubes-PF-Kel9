<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/sass/app.scss')
    <link rel="stylesheet" href="{{ URL::asset('css/style.css'); }}">

    <style>
        .gambar-container {
            display: flex;
        }
        .gambar-container img {
            margin-right: 10px; /* Atur margin antara gambar */
        }
        .gambar-container {
            width: 100px; /* Atur lebar gambar sesuai kebutuhan */
            height: 400px; /* Biarkan tinggi otomatis agar gambar tetap proporsional */
        }
        .gambar-container {
            margin-top: 30px;
        }
        .video-container {
            margin-top: 30px
        }
    </style>
</head>
<body>
    <nav class="site-nav">
        <div class="container">
          <div class="menu-bg-wrap">
            <div class="site-navigation">
              <a href="index.html" class="logo m-0 float-start">Website Resmi RE/MAX Eagle Indonesia</a>

              <ul
                class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
              >
                <li class="active"><a href="index.html">Home</a></li>
                <li class="has-children">
                  <a href="properties.html">Properties</a>
                  <ul class="dropdown">
                    <li><a href="#">Buy Property</a></li>
                    <li><a href="#">Sell Property</a></li>
                    <li class="has-children">
                      <a href="#">Dropdown</a>
                      <ul class="dropdown">
                        <li><a href="#">Sub Menu One</a></li>
                        <li><a href="#">Sub Menu Two</a></li>
                        <li><a href="#">Sub Menu Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="services.html">Services</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact Us</a></li>
              </ul>

              <a
                href="#"
                class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                data-toggle="collapse"
                data-target="#main-navbar"
              >
                <span></span>
              </a>
            </div>
          </div>
        </div>
      </nav>

{{-- @extends('layouts.app')

@section('content') --}}
    {{-- @include('default') --}}
    <div class="container mt-4">
        <h4>Home</h4>
        <hr>
        <div class="d-flex align-items-center py-2 px-4 bg-light rounded-3 border">
            <div class="bi-house-fill me-3 fs-1"></div>
            <h4 class="mb-0">Kabar Berita RE/MAX Eagle Indonesia </h4>
        </div>
    </div>
{{-- @endsection --}}
    @vite('resources/js/app.js')

    <div class="gambar-container">
        <img src="{{ Vite::asset('resources/images/remax.jpg') }}" alt="Gambar 1">
        <img src="{{ Vite::asset('resources/images/remax2.jpg') }}" alt="Gambar 2">
    </div>

    <div class="video-container">
    <video width="640" height="360" controls>
    <source src="rumahdijual.mp4" type="video/mp4">
    </div>

<form action="{{ route('user.upload.photo') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="photo" id="photo">
    <button type="submit">Unggah Foto</button>
</form>

<video width="320" height="240" controls>
  <source src="rumahdijual.mp4" type="video/mp4">
  <source src="rumahdijual.mp4" type="video/ogg">
  Your browser does not support the video tag.
</video>

</body>
</html
