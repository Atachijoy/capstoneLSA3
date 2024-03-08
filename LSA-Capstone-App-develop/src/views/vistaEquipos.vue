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
            Equipos
        </div>

        <div style="padding-bottom: 1%; padding-top: 2%; display:flex; width: 100%;margin-left: 10%;">

            <div style="align-items: right; display:flex">
                <b-icon icon="search" style="margin-top: 4%; margin-right: 1%;"></b-icon>
                <b-form-input v-model="terminoBusqueda" placeholder="Buscar equipo..."></b-form-input>
            </div>

        </div>


        <b-table bordered fixed show-empty :fields="fields" :items="filtrarMateriales">
            <template #empty>
                <div class="text-center lsa-light-blue-text my-2 row">
                    <div class="col">
                        <div style=" color:gray"> No hay productos registrados para mostrar </div>
                    </div>
                </div>
            </template>

            <template #cell(cantidad)="data">
                <textarea v-model="data.value" @b-form-input="onCantidadEdit(data.value)"
                    style="border: none; text-align: center; resize: none; width: 100%;"></textarea>
            </template>
            <b-icon style="height: 80%; width: 80%; align-items: center;" icon="three-dots" variant="dark"
                aria-hidden="true"></b-icon>
            <template #cell(accion)="row">
                <b-button style="color: white; background-color: #b86125;"
                    @click="abrirActualizarIngresoEgreso(row.item)">Actualizar</b-button>
            </template>
        </b-table>


    </div>
</template>

<script>
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
                    key: 'marca',
                    label: 'MARCA'
                },
                {
                    key: 'cantidad',
                    label: 'CANTIDAD'
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
                    label: 'SDO'
                },
                {
                    key: 'ubicacion',
                    label: 'UBICACION'
                },
                {
                    key: 'valor',
                    label: 'VALOR'
                },
                {
                    key: 'fecha_ingreso',
                    label: 'FECHA INGRESO',
                    with: '2px'
                },
                {
                    key: 'fecha_egreso',
                    label: 'FECHA EGRESO'
                },
            ],
            items: [],
            modal_data: [],
            terminoBusqueda: ''
        };
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
        this.obtenerEquipos();
    },
    methods: {
        obtenerEquipos() {
            axios.get('https://lsa.laboratorioquimico.cl/public/api/productos/obtenerEquipos').then((response) => {
                this.items = response.data
            }).catch(error => {
                console.log('error', error)
            })

        }

    },
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