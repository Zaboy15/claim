<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="A layout example that shows off a responsive product landing page.">
        <meta name="token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/png">
        <title>Klaim Hadiah | EPSON</title>
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/grids-responsive-min.css" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/base.css') }}">
        <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    </head>
    <body>
        <header class="header">
            <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
                <a class="pure-menu-heading" href="/"><img src="{{ asset('images/icon2.png') }}" alt="Klaim Hadiah | EPSON" srcset="{{ asset('images/icon2.png') }}" class="head-icon"></a>
                <ul class="menu-header pure-menu-list">
                    <li class="pure-menu-item pure-menu-selected"><a href="/" class="pure-menu-link">Home</a></li>
                    <li class="pure-menu-item">
                        @if(Session::has('auth'))
                        <a href="{{ route('DashboardView') }}" class="login-btn pure-menu-link">Dashboard</a>
                        @else
                        <a href="#" class="login-btn pure-menu-link" data-toggle="modal" data-target="#modal-login">Login</a>
                        @endif
                    </li>
                </ul>
                <div class="mobile-toggle">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="mobile-menu">
                    <ul class="menu-list">
                        <li><a href="">Home</a></li>
                        <li><a href="/login" data-toggle="modal" class="login-btn" data-target="#modal-login">Login</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="wrapper">
                            <img src="{{ asset('images/slider/test1.png') }}" alt="" srcset="{{ asset('images/slider/test1.png') }}">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="wrapper">
                            <img src="{{ asset('images/slider/test2.png') }}" alt="" srcset="{{ asset('images/slider/test2.png') }}">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="wrapper">
                            <img src="{{ asset('images/slider/test3.png') }}" alt="" srcset="{{ asset('images/slider/test3.png') }}">
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="content">
                <h3 class="content-head is-center">Klaim Hadiah</h3>
                <hr class="divider">
                <h6 class="content-head is-center">Isi data dibawah ini untuk klaim hadiah anda.</h6>
                <div class="pure-g">
                    <div class="l-box-lrg pure-u-1-5"></div>
                    <div class="1-box-1rg pure-u-3-5">
                        <form class="form-claim" method="post" action="">
                            <div class="form-group row">
                                <label for="city" class="col-sm-3 col-form-label">Kota</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="city" id="city" action="{{ route('getStore') }}" required>
                                        <option selected="true" disabled>Nama Kota</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->city}}">{{$city->city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label for="store" class="col-sm-3 col-form-label">Toko</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="store" id="store" required>
                                        <option selected="true" disabled>Nama Toko</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="product" class="col-sm-3 col-form-label">Produk</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="product" id="product" required>
                                        <option selected="true" disabled>Jenis Produk</option>
                                        @foreach($products as $product)
                                        <option value="{{$product->name}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fullname" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nama Lengkap anda ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 col-form-label">Nomor Telpon</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="No. HP 088800008888 ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sn" class="col-sm-3 col-form-label">Serial Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="sn" id="sn" placeholder="Serial Number ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto" class="col-sm-3 col-form-label">Upload Foto</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control-file" id="foto" name="foto" accept="image/png, image/jpg, image/jpeg">
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="button" class="submit-claim btn btn-primary btn-lg">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="1-box-1rg pure-u-1-5"></div>
                </div>
            </div>
            <div class="ribbon l-box-lrg pure-g">
                <div class="is-center pure-u-1 pure-u-lg-1-4">
                    <a class="pure-menu-heading" href="/"><img src="{{ asset('images/icon.png') }}" alt="Klaim Hadiah | EPSON" srcset="{{ asset('images/icon.png') }}" class="foot-icon"></a>
                </div>
                <div class="pure-u-1 pure-u-lg-1-4">
                    <h4 class="footer-heading content-head content-head-ribbon">Company</h4>
                    <div class="pure-menu custom-restricted-width">
                        <ul class="pure-menu-list">
                            <li class="pure-menu-item">
                                <a href="#" class="pure-menu-link">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="pure-u-1 pure-u-lg-1-4">
                    <h4 class="footer-heading content-head content-head-ribbon">Region</h4>
                    <div class="pure-menu custom-restricted-width">
                        <ul class="pure-menu-list">
                            <li class="pure-menu-item">
                                <a href="#" class="pure-menu-link">Indonesia</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="pure-u-1 pure-u-lg-1-4">
                    <h2 class="footer-heading content-head content-head-ribbon">Help</h2>
                    <div class="pure-menu custom-restricted-width">
                        <ul class="pure-menu-list">
                            <li class="pure-menu-item">
                                <a href="#" class="pure-menu-link">FAQ</a>
                            </li>
                            <li class="pure-menu-item">
                                <a href="#" class="pure-menu-link">Contact Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-loginLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-loginLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="login-form" method="post" action="{{ route('LoginSubmit') }}" to="{{ route('DashboardView') }}">
                            <div class="form-group row">
                              <label for="email" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                <input type="email" class="email-login form-control" id="email" name="email" placeholder="Email" required>
                                {{-- <small id="email-error" class="form-text text-muted">Your email address still empty</small> --}}
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="password" class="col-sm-2 col-form-label">Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="password-login form-control" id="password" name="password" placeholder="Password">
                                {{-- <small id="password-error" class="form-text text-muted">Your password still empty</small> --}}
                              </div>
                            </div>
                          </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="login-cancel btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="login-submit btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script>
            var mySwiper = new Swiper('.swiper-container', {
            // Optional parameters
                direction: 'horizontal',
                autoHeight: true,
                loop: true,
                centeredSlides: true,
                lazy: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                },
            });
        </script>
        <script>
            var fileInput = document.getElementById("foto");
            var allowedExtension = ".jpg, .png, .jpeg";

            fileInput.addEventListener("change", function() {
            // Check that the file extension is supported.
            // If not, clear the input.
            var hasInvalidFiles = false;
            for (var i = 0; i < this.files.length; i++) {
                var file = this.files[i];
                
                if (!file.name.endsWith(allowedExtension)) {
                    hasInvalidFiles = true;
                }
            }
            
            if(hasInvalidFiles) {
                fileInput.value = ""; 
                alert("Unsupported file selected.");
            }
            });
        </script>
    </body>
</html>
