<template>
    <div class="home">
        <modal_actualizar_solicitud @productoActualizado="obtenerSolicitudes" />

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

        <div style="text-align: center; padding-bottom: 3%; padding-top: 2%; font-weight: bold; font-size: 2rem; display: flex; 
            flex-direction: column; justify-content: center; height: 10vh;">
            Solicitudes de materiales y reactivos
        </div>

        <div style="padding-bottom: 1%; padding-top: 2%; display:flex; width: 100%;margin-left: 10%;">
            <b-button @click="abrirActualizarSolicitud()" style="color: white; background-color: #001c57">Modificar
                solicitud
            </b-button>
        </div>
        <b-table bordered show-empty :fields="fields" :items="items" :busy="loading">
            <template #empty>
                <div class="text-center lsa-light-blue-text my-2 row">
                    <div class="col">
                        <div style=" color:gray"> No hay productos registrados para mostrar </div>
                    </div>
                </div>
            </template>
            <template #cell(solicitante)="row">
                {{ row.item.nombre }} {{ row.item.apellido }}
            </template>

            <template #cell(accion)="row">
                <div style="display: flex;">
                    <b-button @click="handleButtonClickAceptar(row.item)" variant="success"
                        style="margin-right: 6px;">Aceptar</b-button>
                    <b-button @click="handleButtonClick(row.item.id)" variant="danger">Rechazar</b-button>
                </div>

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
import axios from 'axios'
import modal_actualizar_solicitud from '@/components/admSolicitud/modal_actualizarSolicitudMaterial'

export default {
    data() {
        return {
            fields: [
                {
                    key: 'cantidad',
                    label: 'Cantidad'
                },
                {
                    key: 'unidad',
                    label: 'Unidad'
                },
                {
                    key: 'nombre_producto',
                    label: 'Producto (Descripción)'
                },
                {
                    key: 'lote',
                    label: 'Lote'
                },
                {
                    key: 'fecha_vencimiento',
                    label: 'Fecha vencimiento'
                },
                {
                    key: 'solicitante',
                    label: 'Solicitante'
                },
                {
                    key: 'nombre_area',
                    label: 'Area'
                },
                {
                    key: 'cantidad_producto',
                    label: 'Disponibilidad producto'
                },
                {
                    key: 'accion',
                    label: 'Acción'
                }

            ],
            items: [],  
            loading: true
        }
    },
    mounted() {
        this.obtenerSolicitudes()
    },
    components: {
        modal_actualizar_solicitud
    },
    methods:
    {
        obtenerSolicitudes() {
            axios.get('https://lsa.laboratorioquimico.cl/public/api/solicitudes/obtenerSolicitudMaterialAceptada').then((response) => {
                this.items = response.data
                this.loading = false

            }).catch(error => {
                console.log('error', error)
            })

        },
        abrirActualizarSolicitud() {
            this.$bvModal.show('modal-actualizar-solicitud-material')
        },
        handleButtonClickAceptar(datos_solicitud) {
            if (datos_solicitud.id != null) {
                if (datos_solicitud.cantidad >= datos_solicitud.cantidad_producto) {
                    if (window.confirm('La siguiente acción dejará sin saldo al producto solicitado, ¿está seguro de continuar?.')) {
                        let cantidad = parseInt(datos_solicitud.cantidad)
                        let egreso = parseInt(datos_solicitud.cantidad_producto)
                        let data = {
                            'ingreso': 0,
                            'egreso': egreso + cantidad,
                            'id_solicitud': datos_solicitud.id,
                            'id_producto': datos_solicitud.id_producto
                        }
                        axios.put('https://lsa.laboratorioquimico.cl/public/api/solicitudes/validarSolicitudAceptada/', data).then((response) => {
                            if (response != null && response.status == 200) {
                                this.eliminarRegistro(datos_solicitud.id);
                            }
                        })
                    }

                }
                else if (window.confirm('¿Está seguro(a) de aceptar esta solicitud?')) {
                    let data = {
                        'ingreso': 0,
                        'egreso': datos_solicitud.cantidad,
                        'id_solicitud': datos_solicitud.id,
                        'id_producto': datos_solicitud.id_producto
                    }
                    axios.put('https://lsa.laboratorioquimico.cl/public/api/solicitudes/validarSolicitudAceptada/', data).then((response) => {
                        if (response != null && response.status == 200) {
                            this.eliminarRegistro(datos_solicitud.id);
                        }
                    })
                }
            } else {
                console.log(datos_solicitud)
            }
        },
        async eliminarRegistro(id_solicitud) {
            const index = this.items.findIndex(item => item.id === id_solicitud);
            if (index !== -1) {
                this.items.splice(index, 1)
            }
        },
        handleButtonClick(id_solicitud){
            axios.put('https://lsa.laboratorioquimico.cl/public/api/solicitudes/rechazarSolicitud/' + id_solicitud).then((response) =>
            {
                if(response != null)
                {
                    if(response.status == 200)
                    {
                        console.log('solicitud rechazada correctamente');
                        
                    }
                }
                this.eliminarRegistro(id_solicitud);
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