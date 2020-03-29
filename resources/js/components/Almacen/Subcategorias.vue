<template>
    <div>
    <div class="col s12 m7">
     <div class="header col s12 m6 l3">
        <h4 class="center-align header">Listado de Subcategorias</h4> 
     </div> 
     <div class="input-field col s12">
          <i class="material-icons prefix">search</i>
          <input type="search" id="autocomplete-input" class="autocomplete">
          <label for="autocomplete-input">Buscar Subcategoria</label>
        </div>
    <div>
         <table class="responsive-table">
        <thead>
          <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Categoria</th>
              <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item,index) in subcategorias" :key="index">
            <td>{{item.id}}</td>
            <td>{{item.nombre_subcategoria}}</td>
            <td>{{item.categoria.nombre}}</td>
            <td>
                <a  class="teal btn modal-trigger" href="#modal2" @click="editarSubcategoria(item)" style="width:140px"><i class="material-icons left">mode_edit</i>Editar</a> 
                <a v-if="item.deleted_at == null" class="red darken-4 btn"  @click="desactivarSubcategoria(item)" style="width:140px"><i class="material-icons left" >delete</i>Eliminar</a>
                <a v-else-if="item.deleted_at !=''" class="orange darken-4 btn"  @click="activarSubcategoria(item)" style="width:140px"><i class="material-icons left" >warning</i>Activar</a>

            </td>
          </tr>
        </tbody>
      </table>
        </div>
        <div>
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
      </div>
  <!-- inicia boton para crear categoria -->
  <div class="fixed-action-btn">
  <a class="btn-floating btn-large red modal-trigger" href="#modal1" @click="activarSelect()">
    <i class="large material-icons">add</i>
  </a>
</div>
  <!-- Estructura crear Modal -->
  <div id="modal1" class="modal">
    <form  @submit.prevent="crearSubcategorias">
    <div class="modal-content">
      <h4 class="header center">Nueva Subcategoria</h4>
    <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <input  id="first_name" type="text" class="validate" v-model="subcategoria.nombre_subcategoria">
          <label for="first_name">Nombre </label>
        </div>
        <div class="input-field col s12">
            <select v-model="subcategoria.categoria_id">
            <option value=""  disabled selected>Selecciona una categoria</option>
            <option v-for="(item,index) in categorias" :key="index" :value="item.id">{{item.nombre}}</option> 
            </select>
            <label>Categoria</label>
        </div>    
      </div>
    </div>
    </div>
    <div class="modal-footer">
      <a class="modal-close  red btn"  @click="cancelar()"><i class="material-icons left">cancel</i>Cancelar</a>
      <button type="submit" class="modal-close  blue btn"><i class="material-icons left">save</i>Guardar</button>
    </div>
    </form>
  </div>
      <!-- Estructura editar Modal -->
    <div id="modal2" class="modal">
      <form @submit.prevent="GuardarEditSubcategoria">
      <div class="modal-content">
        <h4 class="header center">Editar Subcategoria</h4>
      <div class="row">
        <div class="row">
          <div class="input-field col s12">
            <input placeholder="Nombre Categoria" type="text" v-model="subcategoria.nombre_subcategoria">
            <label >Nombre</label>
          </div> 
          <div class="input-field col s12">
            <select v-model="subcategoria.categoria_id">
            <option value="" disabled selected>Escoge una categoria</option>
            <option  v-for="(item,index) in categorias" :key="index" :value="item.id">{{item.nombre}}</option>
            </select>
            <label>Categoria</label>
        </div>  
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <a class="modal-close red btn"  @click="cancelar()"><i class="material-icons left">cancel</i>Cancelar</a>
        <button type="submit" class="modal-close  blue btn"><i class="material-icons left">save</i>Guardar</button>
      </div>
      </form>
    </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            categorias:[],
            subcategorias:[],
            subcategoria:{nombre_subcategoria:'',categoria_id:''}
        }
    },
    mounted() {
    this.ObtenerListaSubcategorias();
    this.ObtenerListaCategorias();
    },
    methods: {
     activarSelect(){
     $('select').formSelect();
     },
     //Metodo para listar todas las categorias
     ObtenerListaSubcategorias(){
         let me = this;
         let url ='subcategorias'
         axios.get(url).then(response=>{
         me.subcategorias = response.data.subcategorias
         $('.fixed-action-btn').floatingActionButton();
         $('.modal').modal();
         });
         
     },
     ObtenerListaCategorias(){
      let me = this;
      let url = 'listado-categorias'
      axios.get(url).then(response=>{
      me.categorias = response.data.categorias;
     })
     },
     //Metodo para crear una nueva categoria
     crearSubcategorias(){
      let me = this;
      let url = 'subcategorias'
       const params = {nombre_subcategoria:this.subcategoria.nombre_subcategoria,categoria_id:this.subcategoria.categoria_id}
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
          this.ObtenerListaSubcategorias();
          me.subcategoria.nombre_subcategoria = '';
          me.subcategoria.categoria_id= '';
          me.subcategoria.id = '';
         }   
         
      });
     },

     //Metodo para editar una categoria especifica
     editarSubcategoria(item){
       let me = this;
       me.subcategoria.nombre_subcategoria = item.nombre_subcategoria;
       me.subcategoria.categoria_id = item.categoria_id;   
       me.subcategoria.id = item.id;  
       $('select').formSelect();
     },

     //Metodo para guardar las ediciones de las categorias
     GuardarEditSubcategoria(){
       let me = this;
       let url = 'subcategorias/'+ this.subcategoria.id;
       const params = {nombre_subcategoria:me.subcategoria.nombre_subcategoria,categoria_id:me.subcategoria.categoria_id}
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
           this.subcategoria.nombre_subcategoria = '';
           this.subcategoria.id = '';
           this.subcategoria.categoria_id = '';
           Toast.fire({
           icon: 'error',
           title: response.data.mensaje
          });
         }else{
           this.subcategoria.nombre_subcategoria = '';
           this.subcategoria.id = '';
           this.subcategoria.categoria_id = '';
           this.ObtenerListaSubcategorias();
           Toast.fire({
           icon: 'success',
           title: response.data.mensaje
          });
         }
         
       });
     },
     desactivarSubcategoria(item){
      let me = this;
      let url = 'subcategorias/'+ item.id;
        Swal.fire({
          title: 'Estas seguro?',
          text: "¿Quieres desactivar esta subcategoria?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si,Desactivar!'
        }).then((result) => {
          if (result.value) {
           axios.delete(url).then(response=>{
              this.ObtenerListaSubcategorias();
               Swal.fire(
              'Desactivado!',
              response.data.mensaje,
              'success'
            )
           });
          }
        })
     },
     activarSubcategoria(item){
       let me = this;
       let url = 'activar-subcategoria/'+ item.id; 
        Swal.fire({
          title: '¿Estas seguro?',
          text: "¿Quieres activar esta subcategoria?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Activar!'
        }).then((result) => {
          if (result.value) {
           axios.post(url).then(response=>{
              this.ObtenerListaSubcategorias();
               Swal.fire(
              'Activada!',
              response.data.mensaje,
              'success'
            )
           });
          }
        })
     },
     cancelar(){
         this.subcategoria.nombre_subcategoria = '';
         this.subcategoria.categoria_id = '';
         this.subcategoria.id = '';
     }
  },
}
</script>