<template>
    <div class="home">
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
                        <b-nav-item href="#" class="navbar-item" to="/SolicitudesProducto"> Solicitudes de materiales
                        </b-nav-item>
                        <b-nav-item href="#" class="navbar-item" to="/visualizarProveedores"> Proveedores </b-nav-item>


                    </b-navbar-nav>

                </b-collapse>
            </b-navbar>

        </div>
        <modal_actualizar_proveedor />
        <modal_registrar_proveedor @refrescar="obtenerProveedores"/>
        <moda_evaluar_proveedor @refrescar="obtenerProveedores"/>

        <div style="text-align: center; padding-bottom: 3%; padding-top: 2%; font-weight: bold; font-size: 2rem; display: flex; 
            flex-direction: column; justify-content: center; height: 10vh;">
            Proveedores
        </div>

        <div>
            <div style="padding-bottom: 1%; padding-top: 2%; display:flex; width: 100%;margin-left: 10%;">

                <b-button-group style="width: 70%;">
                    <div>
                        <b-button @click="mostrarActualizarproveedor()" style="color: white; background-color: #001c57"> Actualizar proveedor </b-button>

                        <b-button @click="mostrarRegistrarProveedor()" style="color: white; background-color: #001c57"> Registrar proveedor</b-button>

                        <b-button @click="mostrarevaluarProveedor()" style="color: white; background-color: #001c57"> Evaluar proveedor</b-button>

                    </div>

                </b-button-group>
                <div style="align-items: right; display:flex">
                    <b-icon icon="search" style="margin-top: 4%; margin-right: 1%;"></b-icon>
                    <b-form-input v-model="terminoBusqueda" placeholder="Buscar proveedor..."></b-form-input>
                </div>
            </div>




            <b-table bordered show-empty :fields="fields" :items="filtrarProveedores" style="font-size: 13px; text-align: left;" :busy="loading">
                <template #empty>
                    <div class="text-center lsa-light-blue-text my-2 row">
                        <div class="col">
                            <div style=" color:gray"> No hay proveedores registrados para mostrar </div>
                        </div>
                    </div>
                </template>
                <template #cell(Contacto)="data">
                    <div v-html="formatoSaltosDeLinea(data.value)"></div>
                </template>

                <template #cell(rut)="row">
                    {{ row.item.rut }} - {{ row.item.nombre_empresa }}
                </template>

                <template #cell(aprobacion)="row">
                    <span style="padding-left: 40%">{{ row.item.aprobacion }}</span>
                </template>

                <template #cell(accion)="row">
                    <b-button variant="danger" @click="eliminarProveedor(row.item.rut)" class="ml-2">
                        <b-icon-trash-fill></b-icon-trash-fill>
                    </b-button>


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
</template>

<script>
import axios from 'axios'
import modal_actualizar_proveedor from '@/components/admProveedor/modal_actualizar_proveedor.vue'
import modal_registrar_proveedor from '@/components/admProveedor/modal_registrar_proveedor.vue'
import moda_evaluar_proveedor from '@/components/admProveedor/moda_evaluar_proveedor.vue'

export default {
    data() {
        return {
            fields: [{
                key: 'rut',
                label: 'Empresa'
            },
            {
                key: 'contacto',
                label: 'Contacto'
            },
            {
                key: 'telefono',
                label: 'Telefono'
            },
            {
                key: 'email',
                label: 'E-mail'
            },
            {
                key: 'dirección',
                label: 'Dirección'
            },
            {
                key: 'giro',
                label: 'GIRO'
            },
            {
                key: 'fecha_evaluacion',
                label: 'Fecha evaluación'
            },
            {
                key: 'aprobacion',
                label: '%Aprobación'
            },
            {
                key: 'accion',
                label: ''
            }],
            items: [],
            terminoBusqueda: '',
            loading: true
        }
    },
    computed: {
        filtrarProveedores() {
            // Filtrar los materiales según el término de búsqueda
            return this.items.filter((proveedor) =>
                proveedor.nombre_empresa.toLowerCase().includes(this.terminoBusqueda.toLowerCase())
            );
        }
    },
    mounted() {
        this.obtenerProveedores();
    },
    components: {
        modal_actualizar_proveedor,
        modal_registrar_proveedor,
        moda_evaluar_proveedor
    },
    methods: {
        mostrarActualizarproveedor() {
            this.$bvModal.show('modal-actualizar-proveedor');
        },
        mostrarRegistrarProveedor() {
            this.$bvModal.show('modal-registrar-proveedor');
        },
        mostrarevaluarProveedor() {
            this.$bvModal.show('modal-evaluar-proveedor');
        },
        obtenerProveedores() {
            axios.get('http://127.0.0.1:8000/api/proveedores/').then((response) => {
                this.items = response.data
                this.loading = false
            }).catch(error => {
                console.log('error', error)
            })
        },
        formatoSaltosDeLinea(valor) {
            // Reemplaza los saltos de línea con la etiqueta <br>
            return valor.replace(/\n/g, ',');
        },
        eliminarProveedor(rut_proveedor) {
            if (rut_proveedor != null) {
                if (window.confirm('¿Estas seguro de eliminar al proveedor?')) {
                    axios.delete('http://127.0.0.1:8000/api/proveedores/eliminarProveedor/' + rut_proveedor).then((response) => {
                        if (response != null) {
                            if (response.status == 200) {
                                this.$bvToast.toast(`Proveedor eliminado.`, {
                                    title: 'Exito',
                                    toaster: 'b-toaster-top-center',
                                    solid: true,
                                    variant: "success",
                                    appendToast: true
                                })
                                this.obtenerProveedores()
                            }
                        }
                    })
                }
            }
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