<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />

    <title>
      REMAX
    </title>
    <link rel="icon" href=" {{Vite::asset('resources/images/LOGO BALON REMAX.png')}} ">
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap bg-light">
          <div class="site-navigation">
            <a href="index.html" class="logo m-0 float-start"><img src="{{ Vite::asset('resources/images/LOGO 1.png') }}" alt="Logo" height="30" class="d-inline-block align-text-top"></a>

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li class="active"><a href="index.html">HOME</a></li>
              <li class="has-children">
                <a href="properties.html">PROPERTI</a>
                <ul class="dropdown">
                  <li><a href="#">BELI PROPERTI</a></li>
                  <li><a href="#">JUAL PROPERTI</a></li>
                  <li class="has-children">
                    <a href="#">Dropdown</a>
                    <ul class="dropdown">
                      <li><a href="#">Sub Menu satu</a></li>
                      <li><a href="#">Sub Menu dua</a></li>
                      <li><a href="#">Sub Menu tiga</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="services.html">LAYANAN</a></li>
              <li><a href="about.html">TENTANG</a></li>
              <li><a href="contact.html">KONTAK</a></li>
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
