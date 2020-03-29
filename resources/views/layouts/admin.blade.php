<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <header>
              <nav>
                <div class="nav-wrapper deep-purple">
                  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                  <a href="#!" class="brand-logo center"><i class="material-icons">cloud</i>Logo</a>
                  <ul class="right hide-on-med-and-down">
                    <li><a href="sass.html"><i class="material-icons">search</i></a></li>
                    <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
                    <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
                    <li>
                      <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                     </form>
                    </li>
                  </ul>
                </div>
              </nav>
            </header>
            <ul id="sidenav-1" class="sidenav sidenav-fixed">
             <li>
                <div class="user-view">
                  <div class="background">
                    <img src="https://image.freepik.com/vector-gratis/fondo-abstracto-formas-geometricas-neon_23-2148244291.jpg">
                  </div>
                  <a href="#user"><img class="circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQI9LD2ynYXhO4hGik4QBElcwKhheX3i7bLaQA2v97P1ql1IyzZ"></a>
                <a href="#name"><span class="white-text name">{{Auth::user()->name}}</span></a>
                <a href="#email"><span class="white-text email">{{Auth::user()->email}}</span></a>
                </div>
              </li>
              <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                  <li class="tab side text-teal">
                    <a class="collapsible-header "><i class="material-icons">add_shopping_cart</i>Almacen</a>
                    <div class="collapsible-body">
                      <ul>
                        <li class="tab side text-teal"><router-link :to="{name:'almacen-categorias'}"><i class="material-icons">shop</i>Categorias</router-link></li>
                        <li class="tab side text-teal"><router-link :to="{name:'almacen-subcategorias'}"><i class="material-icons">shop_two</i>Subcategorias</router-link></li>
                        <li class="tab side text-teal"><router-link :to="{name:'almacen-productos'}"><i class="material-icons">shopping_basket</i>Productos</router-link></li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                  <li class="tab side text-teal">
                    <a class="collapsible-header"><i class="material-icons">monetization_on</i>Ventas</a>
                    <div class="collapsible-body">
                      <ul>
                        <li><a href="#!">First</a></li>
                        <li><a href="#!">Second</a></li>
                        <li><a href="#!">Third</a></li>
                        <li><a href="#!">Fourth</a></li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </li>   
            </ul>
            <ul id="slide-out" class="sidenav">
                <li><div class="user-view">
                  <div class="background">
                    <img src="images/office.jpg">
                  </div>
                  <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
                  <a href="#name"><span class="white-text name">John Doe</span></a>
                  <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                </div></li>
                <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
                <li><a href="#!">Second Link</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Subheader</a></li>
                <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
              </ul>
              <main>
                <div class="container">
                  
                   <router-view></router-view>
                </div>
              </main>
            </div>

           
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
             $(document).ready(function(){
                $('.sidenav').sidenav();
                $('.collapsible').collapsible();
                $('.dropdown-trigger').dropdown();
                $('.carousel').carousel();
                $('.modal').modal();
            });
        </script>
    </body>
</html>