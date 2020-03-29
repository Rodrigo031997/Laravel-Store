<template>
    <div>
    <div class="col s12 m7">
     <div class="header col s12 m6 l3">
        <h4 class="center-align header">Listado de Categorias</h4> 
     </div> 
     <div class="input-field col s12">
          <i class="material-icons prefix">search</i>
          <input type="search" id="autocomplete-input" class="autocomplete">
          <label for="autocomplete-input">Buscar Categoria</label>
        </div>
    <div>
         <table class="responsive-table">
        <thead>
          <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(item,index) in categorias" :key="index">
            <td>{{item.id}}</td>
            <td>{{item.nombre}}</td>
            <td>
                <a  class="teal btn modal-trigger" href="#modal2" @click="editarCategoria(item)" style="width:140px"><i class="material-icons left">mode_edit</i>Editar</a> 
                <a v-if="item.deleted_at == null" class="red darken-4 btn"  @click="desactivarCategoria(item)" style="width:140px"><i class="material-icons left" >delete</i>Eliminar</a>
                <a v-else-if="item.deleted_at !=''" class="orange darken-4 btn"  @click="activarCategoria(item)" style="width:140px"><i class="material-icons left" >warning</i>Activar</a>

            </td>
          </tr>
        </tbody>
      </table>
          <!-- empieza paginación -->
          <ul class="pagination right">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
          </ul>
        </div>
  <!-- inicia boton para crear categoria -->
  <div class="fixed-action-btn">
  <a class="btn-floating btn-large red modal-trigger" href="#modal1">
    <i class="large material-icons">add</i>
  </a>
</div>
  <!-- Estructura crear Modal -->
  <div id="modal1" class="modal">
    <form  @submit.prevent="crearCategorias">
    <div class="modal-content">
      <h4 class="header center">Nueva Categoria</h4>
    <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <input  id="first_name" type="text" class="validate" v-model="categoria.nombre">
          <label for="first_name">Nombre Categoria</label>
        </div>   
      </div>
    </div>
    </div>
    <div class="modal-footer">
      <a class="modal-close  red btn"><i class="material-icons left">cancel</i>Cancelar</a>
      <button type="submit" class="modal-close  blue btn"><i class="material-icons left">save</i>Guardar</button>
    </div>
    </form>
  </div>
      <!-- Estructura editar Modal -->
    <div id="modal2" class="modal">
      <form @submit.prevent="GuardarEditCategoria">
      <div class="modal-content">
        <h4 class="header center">Editar Categoria</h4>
      <div class="row">
        <div class="row">
          <div class="input-field col s12">
            <input placeholder="Nombre Categoria" type="text" v-model="categoria.nombre">
            <label >Nombre Categoria</label>
          </div>   
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <a class="modal-close  red btn"><i class="material-icons left">cancel</i>Cancelar</a>
        <button type="submit" class="modal-close  blue btn"><i class="material-icons left">save</i>Guardar</button>
      </div>
      </form>
    </div>
    </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            categorias:[],
            categoria:{nombre:''}
        }
    },
    mounted() {
    this.ObtenerListaCategorias();
    },
    methods: {
     //Metodo para listar todas las categorias
     ObtenerListaCategorias(){
         let me = this;
         let url ='categorias'
         axios.get(url).then(response=>{
         me.categorias = response.data.categorias
         $('.fixed-action-btn').floatingActionButton();
         $('.modal').modal();
         });
     },
     //Metodo para crear una nueva categoria
     crearCategorias(){
      let me = this;
      let url = 'categorias'
      const params = {nombre:this.categoria.nombre}
       const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        onOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
      })
      axios.post(url,params).then(response=>{
        if (response.data.error == true) {
           Toast.fire({
           icon: 'error',
           title: response.data.mensaje
          });
         }else{
           Toast.fire({
           icon: 'success',
           title: response.data.mensaje
          });
          this.ObtenerListaCategorias();
          me.categoria = '';
         }   
         
      });
     },

     //Metodo para editar una categoria especifica
     editarCategoria(item){
       let me = this;
       me.categoria.nombre = item.nombre;   
       me.categoria.id = item.id;      
     },

     //Metodo para guardar las ediciones de las categorias
     GuardarEditCategoria(){
       let me = this;
       let url = 'categorias/'+ this.categoria.id;
       const params = {nombre:me.categoria.nombre}
       const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        onOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
      });
       axios.put(url,params).then(response=>{
         if (response.data.error == true) {
           this.categoria.nombre = '';
           this.categoria.id = '';
           Toast.fire({
           icon: 'error',
           title: response.data.mensaje
          });
         }else{
           this.categoria.nombre = '';
           this.categoria.id = '';
           this.ObtenerListaCategorias();
           Toast.fire({
           icon: 'success',
           title: response.data.mensaje
          });
         }
         
       });
     },
     desactivarCategoria(item){
      let me = this;
      let url = 'categorias/'+ item.id;


        Swal.fire({
          title: 'Estas seguro?',
          text: "¿Quieres desactivar esta categoria?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si,Desactivar!'
        }).then((result) => {
          if (result.value) {
           axios.delete(url).then(response=>{
              this.ObtenerListaCategorias();
               Swal.fire(
              'Desactivado!',
              response.data.mensaje,
              'success'
            )
           });
          }
        })
     },
     activarCategoria(item){
       let me = this;
       let url = 'activar/'+ item.id; 
        Swal.fire({
          title: '¿Estas seguro?',
          text: "¿Quieres activar esta categoria?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Activar!'
        }).then((result) => {
          if (result.value) {
           axios.post(url).then(response=>{
              this.ObtenerListaCategorias();
               Swal.fire(
              'Activada!',
              response.data.mensaje,
              'success'
            )
           });
          }
        })
     }
  },
}
</script>