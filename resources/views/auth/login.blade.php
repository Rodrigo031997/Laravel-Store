<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://cdn3.iconfinder.com/data/icons/happily-colored-snlogo/128/medium.png">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Inicia Sesión</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <style>
        body {
       display: flex;
       min-height: 100vh;
       flex-direction: column;
     }
   
     main {
       flex: 1 0 auto;
     }
   .brand-logo >img {
       width: 50px;
       height: 50px;
       margin-top: 5px;
   }
   /* Menu - profile */
   .bg-card-user {
       background: rgba(0,77,64,.5);
       padding: 15px 0;
   }
   .truncate >img {
       width: 180px;
       margin-top: 6px;
       margin-bottom: 6px;
   }
   /* FOOTER */
   footer .foot-text {
       margin-top: 10px;
   }
   
   /* LOGIN */
   .logueo {/* PARALLAX */
       height: 650px!important;
   }
   i.iconis {
       font-size: 1em!important;
       margin-top: 8px;
   }
   .login {
       border: 1px solid #FFF;
       width: 80%;
       margin: 0 auto;
       background-color: rgba(255,255,255,.7);
       padding: 20px;
   }
   </style>
  </head>
  <body>
    <nav class="deep-purple ">
	    <div class="nav-wrapper">
		    <a href="#!" class="brand-logo center"><img src="https://cdn3.iconfinder.com/data/icons/happily-colored-snlogo/128/medium.png"></a>
		    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		    <ul class="right hide-on-med-and-down">
            <li><a href="{{url('/')}}">Inicio</a></li>
            <li><a href="{{url('/register')}}">Registro</a></li>
		    </ul>
		    <ul class="side-nav" id="mobile-demo">
		        <li><a href="#">Inicio</a></li>
		        <li><a href="#">Registro</a></li>
		    </ul>
		</div>
  	</nav>
	<div class="had-container">

	     <div class="parallax-container logueo">
      	<div class="parallax"><img src="https://img.freepik.com/foto-gratis/fondo-conexiones-red-3d-baja-poli_1048-10325.jpg?size=626&ext=jpg"></div>
      	<div class="row"><br>
      		<div class="col m8 s8 offset-m2 offset-s2 center">
      			<h4 class="truncate bg-card-user">
      				<img src="https://cdn3.iconfinder.com/data/icons/happily-colored-snlogo/128/medium.png" alt="" class="circle responsive-img">
					  <div class="row login">
					  	<h4>Inicia sesión.</h4>
                        <form class="col s12" method="POST" action="{{ route('login') }}">
                            @csrf
					      <div class="row">
					         <div class="input-field col m12 s12">
                              <i class="material-icons iconis prefix">account_box</i>
					          <input id="icon_prefix" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                              <label for="icon_prefix">Nombre o Email</label>
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col m12 s12">
                              <i class="material-icons iconis prefix">enhanced_encryption</i>
					          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                              <label for="password">Contraseña</label>
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
					        </div>
					      </div>
					      <div class="row">
                              <button class="btn waves-effect waves-light" type="submit" name="action">Iniciar sesión!</button>
                              @if (Route::has('password.request'))
                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                  {{ __('Forgot Your Password?') }}
                              </a>
                          @endif
					      </div>
					    </form>
					  </div>
      			</h4>
		   	  </div>
	    	</div>
	    </div>
    </div>
    
    </div> <!-- fin del .container -->

<footer class="page-footer deep-purple darken-4">
    <div class="footer-copyright">
        <div class="container center">
        	Copyright © 2017 - Miguel92
        </div>
    </div>
</footer>

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
    		$('.button-collapse').sideNav({
		      menuWidth: 300, // Default is 300
		      edge: 'left', // Choose the horizontal origin
		      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
		      draggable: true, // Choose whether you can drag to open on touch screens,
		      onOpen: function(el) { /* Do Stuff*/ }, // A function to be called when sideNav is opened
		      onClose: function(el) { /* Do Stuff*/ }, // A function to be called when sideNav is closed
		    }
		  );
      		$('.parallax').parallax();
    	});
    </script>
  </body>
</html>




{{-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

