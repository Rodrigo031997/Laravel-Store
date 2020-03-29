<template>
<div>
<li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                  <li>
                    <a class="collapsible-header"><i class="material-icons">add_shopping_cart</i>Almacen</a>
                    <div class="collapsible-body">
                      <ul>
                        <li><router-link to="/categorias"><i class="material-icons">shop</i>Categorias</router-link></li>
                        <li><router-link to="/subcategorias"><i class="material-icons">shop_two</i>Subcategorias</router-link></li>
                        <li><router-link to="/productos"><i class="material-icons">shopping_basket</i>Productos</router-link></li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                  <li>
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
                  <router-view></router-view>
                   
</div>
</template>

<script>
  
</script>