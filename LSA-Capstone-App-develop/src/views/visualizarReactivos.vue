<template>
    <div class="home">

        <div>
            <modal_registrarReactivo @refrescar="obtenerReactivos" />
            <modal_actualizar_ingreso_egreso :modal_data="modal_data" @ingreso_egreso_actualizado="obtenerReactivos" />
            <modal_actualizar_reactivo @reactivo_actualizado="obtenerReactivos" />
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
            Reactivos
        </div>

        <div style="padding-bottom: 1%; padding-top: 2%; display:flex; width: 100%;margin-left: 10%;">

            <b-button-group style="width: 70%;">

                <div style="display: flex;">
                    <b-button @click="abrirRegistrarReactivo()" style="color: white; background-color: #001c57">Registrar
                        reactivo</b-button>
                    <b-button @click="abrirActualizarReactivo()" style="color: white; background-color: #001c57">Modificar
                        reactivo</b-button>
                </div>
            </b-button-group>

            <div style="align-items: right; display:flex">
                <b-icon icon="search" style="margin-top: 4%; margin-right: 1%;"></b-icon>
                <b-form-input v-model="terminoBusqueda" placeholder="Buscar reactivo..."></b-form-input>
            </div>
        </div>


        <b-table bordered show-empty :fields="fields" :items="filtrarMateriales" :busy="loading">

            <template #empty>
                <div class="text-center lsa-light-blue-text my-2 row">
                    <div class="col">
                        <div style=" color:gray"> No hay productos registrados para mostrar </div>
                    </div>
                </div>
            </template>
            <template #cell(accion)="row">
                <b-button style="color: white; background-color: #b86125;"
                    @click="abrirActualizarIngresoEgreso(row.item)">Actualizar</b-button>
            </template>

            <template #table-busy>
                <div class="text-center lsa-orange-text my-2">
                    <b-spinner class="align-middle"></b-spinner>
                    <strong> Cargando...</strong>
                </div>
            </template>

            <b-icon style="height: 80%; width: 80%; align-items: center;" icon="three-dots" variant="dark"
                aria-hidden="true"></b-icon>
        </b-table>



    </div>
</template>

<script>
import modal_registrarReactivo from '@/components/admProducto/admMaterial/modal_registrarReactivo.vue'
import modal_actualizar_ingreso_egreso from '@/components/admProducto/admMaterial/moda_modificarIngresoEgreso.vue'
import modal_actualizar_reactivo from '@/components/admProducto/admMaterial/modal_actualizar_reactivo.vue'
import axios from 'axios';

export default {
    data() {
        return {
            fields: [
                {
                    key: 'codigo',
                    label: 'CODIGO'
                },
                {
                    key: 'nombre',
                    label: 'NOMBRE'
                },
                {
                    key: 'formula',
                    label: 'FORMULA'
                },
                {
                    key: 'marca',
                    label: 'MARCA'
                },
                {
                    key: 'unidad',
                    label: 'UN'
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
                    label: 'EGR.'
                },
                {
                    key: 'saldo',
                    label: 'SDO.'
                },
                {
                    key: 'ubicacion',
                    label: 'UB.'

                },
                {
                    key: 'peligrosidad',
                    label: 'PELIGROSIDAD'
                },
                {
                    key: 'clase',
                    label: 'Clase o division'
                },
                {
                    key: 'riesgo_secundario',
                    label: 'Riesgo secundario'
                },
                {
                    key: 'grupo_embalaje',
                    label: 'Grupo de embalaje'
                },
                {
                    key: 'diposiciones',
                    label: 'DISPOSICION'
                },
                {
                    key: 'n_guia',
                    label: 'N° de guia'
                },
                {
                    key: 'accion',
                    label: 'Actualizar'
                }

            ],
            items: [],
            modal_data: [],
            terminoBusqueda: '',
            loading: true
        }
    },
    mounted() {
        this.obtenerReactivos();
    },
    components:
    {
        modal_registrarReactivo,
        modal_actualizar_ingreso_egreso,
        modal_actualizar_reactivo
    },
    computed: {
        filtrarMateriales() {
            // Filtrar los materiales según el término de búsqueda
            return this.items.filter((material) =>
                material.nombre.toLowerCase().includes(this.terminoBusqueda.toLowerCase())
            );
        }
    },
    methods:
    {
        abrirRegistrarReactivo() {
            this.$bvModal.show('modal-registrar-reactivo');
        },
        obtenerReactivos() {
            axios.get('https://lsa.laboratorioquimico.cl/public/api/productos/obtenerReactivos').then((response) => {
                this.items = response.data
                this.loading = false
            }).catch(error => {
                console.log('error', error)
            })

        },


        abrirActualizarIngresoEgreso(datos) {
            this.modal_data = [datos.ingresos, datos.egresos, datos.id]
            console.log('IDDDDDD', datos.id)
            this.$bvModal.show('modal-ingreso-egreso', this.modal_data);
        },

        abrirActualizarReactivo() {
            this.$bvModal.show('modal-actualizar-reactivo')
        }
    }
}
</script>


<style scoped>
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