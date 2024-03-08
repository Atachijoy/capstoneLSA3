<template>
    <div class="color">
        <div v-if="rol_descripcion == 4 || rol_descripcion == 3">
            <component :is="'modal_listado_muestra'" :analista="analista"></component>
        </div>

        <!-- En este if debe ir el rol GERENTE Y SUPERVISOR-->
        <div v-else-if="rol_descripcion == 6 || rol_descripcion == 1 || rol_descripcion == 2">
            <b-nav tabs justified>
                <b-nav-item @click="cambiarModal('plantilla1')"
                    :disabled="bloquearPlantilla === 'plantilla1'">Gráficos</b-nav-item>
                <b-nav-item @click="cambiarModal('plantilla2')" :disabled="bloquearPlantilla === 'plantilla2'">Análisis
                    realizados</b-nav-item>
                <b-nav-item @click="cambiarModal('plantilla3')" :disabled="bloquearPlantilla === 'plantilla3'">Muestras
                    mensuales y atrasadas</b-nav-item>
            </b-nav>

            <component :is="plantilla"></component>

        </div>

        <div v-else-if="rol_descripcion == 'descripcion_rol'">

            <div class="home">
                <modal_registrarMaterial @materialRegistrado="obtenerMateriales" />
                <modal_actualizar_ingreso_egreso :modal_data="modal_data" @ingreso_egreso_actualizado="obtenerMateriales"/>
                <modal_actualizar_material ref="modalActualizarMaterial" :modal_items="items" @materialActualizado="obtenerMateriales"/>


                <div>
                    <b-navbar toggleable="lg" type="light" variant="faded">
                        <b-navbar-brand href="#"></b-navbar-brand>

                        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                        <b-collapse id="nav-collapse" is-nav class="navbar-text">
                            <b-navbar-nav>

                                <b-nav-item href="#" class="navbar-item" to="/inicio"> Inventario materiales</b-nav-item>
                                <b-nav-item href="#" class="navbar-item" to="/visualizarMovimientos"> Aseo </b-nav-item>
                                <b-nav-item href="#" class="navbar-item" to="/visualizarReactivos"> Reactivos </b-nav-item>
                                <b-nav-item href="#" class="navbar-item" to="/visualizarEquipos"> Equipos </b-nav-item>
                                <b-nav-item href="#" class="navbar-item" to="/SolicitudesCompra"> Solicitudes de compra
                                </b-nav-item>
                                <b-nav-item href="#" class="navbar-item" to="/SolicitudesProducto"> Solicitudes de
                                    materiales
                                </b-nav-item>
                                <b-nav-item href="#" class="navbar-item" to="/visualizarProveedores"> Proveedores
                                </b-nav-item>

                            </b-navbar-nav>

                        </b-collapse>
                    </b-navbar>

                </div>





                <div style="text-align: center; padding-bottom: 3%; padding-top: 2%; font-weight: bold; font-size: 2rem; display: flex; 
                flex-direction: column; justify-content: center; height: 10vh;">
                    Inventario de materiales
                </div>

                <div style="padding-bottom: 1%; padding-top: 2%; display:flex; width: 100%;margin-left: 10%;">
                    <b-button-group style="width: 70%;">
                        <div style="display: flex;  ">
                            <b-button @click="abrirRegistrarMaterial()"
                                style="color: white; background-color: #001c57;">Registrar material</b-button>
                            <b-button @click="abrirActualizarMaterial()"
                                style="color: white; background-color: #001c57;">Modificar material</b-button>

                        </div>

                    </b-button-group>

                    <div style="align-items: right; display:flex">
                        <b-icon icon="search" style="margin-top: 4%; margin-right: 1%;"></b-icon>
                        <b-form-input v-model="terminoBusqueda" placeholder="Buscar material..."></b-form-input>
                    </div>

                </div>

                <div style="display: flex">
                    <b-table fixed bordered show-empty :fields="fields" :items="filtrarMateriales" :busy="loading">
                        <template #empty>
                            <div class="text-center lsa-light-blue-text my-2 row">
                                <div class="col">
                                    <div style=" color:gray"> No hay materiales registrados </div>
                                </div>
                            </div>
                        </template>

                        <template #cell(accion)="row">

                            <b-button @click="abrirActualizarIngresoEgreso(row.item)"
                                style="color: white; background-color: #b86125;">Actualizar</b-button>

                        </template>

                        <template #table-busy>
                            <div class="text-center lsa-orange-text my-2">
                                <b-spinner class="align-middle"></b-spinner>
                                <strong> Cargando...</strong>
                            </div>
                        </template>

                    </b-table>

                </div>

            </div>
        </div>



        <!-- En este final if debe ir el rol Adquisicion y Jefa de laboratorio-->



    </div>
</template>

<script>
import user_roles from "@/helpers/enums/roles.js";
import store from "@/store/store";

import modal_listado_muestra from "../components/dashboard/plantillas/modal_listado_muestras.vue"
import modal_grafico from "../components/dashboard/plantillas/modal_graficos.vue"
import modal_muestras_mes_y_atrasado from "../components/dashboard/plantillas/modal_muestras_mes_y_atrasado.vue"

import modal_actualizar_material from '@/components/admProducto/admMaterial/modal_actualizar_material.vue'
import modal_registrarMaterial from '@/components/admProducto/admMaterial/modal_registrarMaterial'
import modal_actualizar_ingreso_egreso from '@/components/admProducto/admMaterial/moda_modificarIngresoEgreso.vue'
import axios from "axios";

export default {
    data() {
        return {
            rol_descripcion: "descripcion_rol",
            analista: true,
            selectedTab: null,

            plantilla: "modal_grafico",
            bloquearPlantilla: "plantilla1",
            terminoBusqueda: "",
            //datos modulo adquisicion y mantenimiento
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
                {
                    key: 'accion',
                    label: 'Acción'
                }

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
            loading: true
        }


    },

    computed: {
        filtrarMateriales() {
            // Filtrar los materiales según el término de búsqueda
            return this.items.filter((material) =>
                material.nombre.toLowerCase().includes(this.terminoBusqueda.toLowerCase())
            );
        }
    },
    mounted() {
        this.obtenerMateriales();
        this.mostrarInfo();

    },
    name: 'HomeView',
    components: {
        modal_listado_muestra,
        modal_grafico,
        modal_muestras_mes_y_atrasado,
        modal_registrarMaterial,
        modal_actualizar_ingreso_egreso,
        modal_actualizar_material
    },
    watch: {
    },
    methods: {
        mostrarInfo() {
            this.rol_descripcion = user_roles.find(user => user.id_rol == store.getters.rol).id_rol;
        },
        cambiarModal(respuesta) {

            setTimeout(() => {
                if (respuesta == 'plantilla2') {
                    this.plantilla = "modal_listado_muestra";
                    this.bloquearPlantilla = "plantilla2";
                }
                else if (respuesta == 'plantilla3') {
                    this.plantilla = "modal_muestras_mes_y_atrasado";
                    this.bloquearPlantilla = "plantilla3";
                }
                else if (respuesta == 'plantilla1') {
                    this.plantilla = "modal_grafico";
                    this.bloquearPlantilla = "plantilla1";
                }
            }, 500);
        },
        abrirRegistrarEntradas() {

            this.$bvModal.show('modal-registrar-entrada');
        },
        abrirRegistrarSalidas() {
            this.$bvModal.show('modal-registrar-salida');
        },
        abrirRegistrarMaterial() {
            this.$bvModal.show('modal-registrar-material');
        },
        abrirActualizarIngresoEgreso(datos) {
            this.modal_data = [datos.ingresos, datos.egresos, datos.id]

            this.$bvModal.show('modal-ingreso-egreso', this.modal_data);
        },
        abrirActualizarMaterial() {
            this.$bvModal.show('modal-actualizar-material');
        },
        obtenerMeses() {
            const fecha = new Date();
            const mes_actual = fecha.getMonth();

            return this.meses.filter((meses, index) => index <= mes_actual).reverse();
        },
        obtenerMateriales() {
            axios.get('http://127.0.0.1:8000/api/productos').then((response => {
                console.log('materiales a mostrar', response.data);
                this.items = response.data;
                this.loading = false
            })).catch(error => {
                console.log('error', error)
            })
        },
        actualizarMaterial() {
            axios.get('http://127.0.0.1:8000/api/productos').then((response => {
                console.log('materiales a mostrar', response.data);
                this.items = response.data;
            })).catch(error => {
                console.log('error', error)
            })
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
}</style>