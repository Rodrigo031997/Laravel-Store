<template>
    <div>
        <div class="row">
        <div class="col s12 m4"  v-for="(item,index) in productos" :key="index">
            <div class="card">
                <div class="card-image">
                <img src="https://www.dhresource.com/0x0/f2/albu/g10/M01/D1/73/rBVaWVxhS82AW7PoAAcYh9slWsU662.jpg">
                <a class="btn-floating halfway-fab  blue left modal-trigger" href="#modal2"><i class="material-icons">mode_edit</i></a>
                <a class="btn-floating halfway-fab  red right modal-trigger" href="#modal3"><i class="material-icons">delete</i></a>
                </div>
                <div class="card-content ">
                <h6 class="header">Producto:</h6>
                <p>{{item.nombre}}</p>
                </div>
            </div>
            </div> 
             <div class="fixed-action-btn">
                <a class="btn-floating btn-large red">
                    <i class="large material-icons">add</i>
                </a>
                <ul>
                    <li><a class="btn-floating blue modal-trigger" href="#modal1"><i class="material-icons">library_add</i></a></li>
                    <li><a class="btn-floating green darken-1"><i class="material-icons">visibility</i></a></li>
                </ul>
           </div> 
        </div>
          <!-- Modal Structure create -->
            <div id="modal1" class="modal">
                <div class="modal-content">
                <h4 class="header center">Nuevo Producto</h4>
                <p>A bunch of text</p>
                </div>
                <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                </div>
            </div>
            <!-- Modal Structure edit -->
            <div id="modal2" class="modal">
                <div class="modal-content">
                <h4 class="header center">Editar Producto</h4>
                <p>A bunch of text</p>
                </div>
                <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                </div>
            </div>
            <!-- Modal Structure delete -->
            <div id="modal3" class="modal">
                <div class="modal-content">
                <h4 class="header center">Desactivar Producto</h4>
                <p>A bunch of text</p>
                </div>
                <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                </div>
            </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            productos:[]
        }
    },
    mounted() {
     this.ObtenerlistaProductos();
    },
    methods:{
    ObtenerlistaProductos(){
        let me = this;
        let url = 'productos'
        axios.get(url).then(response=>{
         me.productos = response.data.productos;
        })
    }

    }
    
}
</script>