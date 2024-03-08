<template>
    <div class="home">

        <div>
            <b-navbar toggleable="lg" type="light" variant="faded">
                <b-navbar-brand href="#"></b-navbar-brand>

                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                <b-collapse id="nav-collapse" is-nav class="navbar-text">
                    <b-nav>

                        <b-nav-item href="#" class="navbar-item" to="/MAM-vistaInicio"> Inventario materiales</b-nav-item>
                        <b-nav-item href="#" class="navbar-item" to="materialesAseo"> Aseo </b-nav-item>
                        <b-nav-item href="#" class="navbar-item" to="materialReactivo"> Reactivos </b-nav-item>
                        <b-nav-item href="#" class="navbar-item" to="vistaEquipo"> Equipos </b-nav-item>
                        <b-nav-item href="#" class="navbar-item" to="vistaProveedores"> Proveedores </b-nav-item>

                    </b-nav>

                </b-collapse>
            </b-navbar>

        </div>





        <div style="text-align: center; padding-bottom: 3%; padding-top: 2%; font-weight: bold; font-size: 2rem; display: flex; 
                flex-direction: column; justify-content: center; height: 10vh;">
            Inventario de materiales
        </div>
        <div style="padding-bottom: 1%; padding-top: 2%; display:flex; width: 100%;margin-left: 10%;">


            <div style="align-items: right; display:flex">
                <b-icon icon="search" style="margin-top: 3%; margin-right: 1%;"></b-icon>
                <b-form-input v-model="terminoBusqueda" placeholder="Buscar material..."></b-form-input>
            </div>
        </div>


        <div>
            <b-table fixed bordered show-empty :busy="loading" :fields="fields" :items="filtrarMateriales">
                <template #empty>
                    <div class="text-center lsa-light-blue-text my-2 row">
                        <div class="col">
                            <div style=" color:gray"> No hay materiales registrados </div>
                        </div>
                    </div>
                </template>




            </b-table>

        </div>

    </div>
</template>
        
<script>


// @ is an alias to /src

import user_roles from "../helpers/enums/roles.js";
// import Barchart from "../components/dashboard/Grafico.vue" 
import personalService from "@/helpers/api-services/Personal.service"
import store from "@/store/store";
import axios from "axios";



export default {
    data() {
        return {
            titulo_modal: "registrar",
            rol_descripcion: "descripcion_rol",
            modal_data: [],
            fields: [/* {
                    key: 'id_Producto',
                    label: 'Codigo Producto'
                }, */
                {
                    key: 'nombre',
                    label: 'NOMBRE'
                },
                {
                    key: 'capacidad',
                    label: 'CAP.'
                },
                {
                    key: 'unidad',
                    label: 'UNI.'
                },
                {
                    key: 'cantidad',
                    label: 'CANT.'
                },
                {
                    key: 'ingresos',
                    label: 'ING.'
                },
                {
                    key: 'egresos',
                    label: 'EGRE.'
                },
                {
                    key: 'saldo',
                    label: 'SALDO'
                },
                {
                    key: 'ubicacion',
                    label: 'U'
                },

            ],
            meses: [
                { nombre: 'Enero', numero: 1 },
                { nombre: 'Febrero', numero: 2 },
                { nombre: 'Marzo', numero: 3 },
                { nombre: 'Abril', numero: 4 },
                { nombre: 'Mayo', numero: 5 },
                { nombre: 'Junio', numero: 6 },
                { nombre: 'Julio', numero: 7 },
                { nombre: 'Agosto', numero: 8 },
                { nombre: 'Septiembre', numero: 9 },
                { nombre: 'Octubre', numero: 10 },
                { nombre: 'Noviembre', numero: 11 },
                { nombre: 'Diciembre', numero: 12 }
            ],
            items: [],
            terminoBusqueda: ''
        }
    },
    computed: {
    filtrarMateriales() {
        // Filtrar los materiales según el término de búsqueda
        const itemsFiltrados = this.items.filter((material) =>
            material.nombre.toLowerCase().includes(this.terminoBusqueda.toLowerCase())
        );

        // Ordenar el resultado filtrado de menor a mayor según el campo "saldo"
        return itemsFiltrados.sort((a, b) => a.saldo - b.saldo);
    }
},
    mounted() {
        this.mostrarInfo();
        this.obtenerUsuarios();
        this.obtenerMateriales();
    },
    name: 'HomeView',
    methods: {
        mostrarInfo() {
            this.rol_descripcion = user_roles.find(user => user.id_rol == store.getters.rol).descripcion;
        },
        obtenerUsuarios() {
            personalService.obtenerTodosPersonal().then((response) => {
                if (response != null) {
                    for (let index = 0; index < response.data.length; index++) {
                        this.usuario.push(response.data[index].nombre);
                    }
                    console.log("Usuarios")
                    console.log(this.usuario);
                }
            })
        },
        obtenerMeses() {
            const fecha = new Date();
            const mes_actual = fecha.getMonth();

            return this.meses.filter((meses, index) => index <= mes_actual).reverse();
        },
        obtenerMateriales() {
            axios.get('http://127.0.0.1:8000/api/productos/').then((response => {
                console.log('materiales a mostrar', response.data);
                this.items = response.data;
            }))
        }
    }

}
</script>
        
<style scoped>
.card-inicio {
    width: 50%;

}

.image-container {
    background: url('../assets/background-1-large-LSA.jpg');
    width: 100vw;
    height: 100vh;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;

}

.navbar-text {

font-size: 23px;
border-bottom: 1px solid #ccc;
}

.navbar-item {
/*     padding: 103%;
*/
padding-right: 22px;
border-right: 2px solid #ccc;
}
</style>
        
