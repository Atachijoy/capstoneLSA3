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

        <div style="text-align: center; padding-bottom: 3%; padding-top: 2%; font-weight: bold; font-size: 2rem; display: flex; 
            flex-direction: column; justify-content: center; height: 10vh;">
            Solicitudes de compra
        </div>


        <b-table show-empty :fields="fields" :items="items">
            <template #empty>
                <div class="text-center lsa-light-blue-text my-2 row">
                    <div class="col">
                        <div style=" color:gray"> No hay productos registrados para mostrar </div>
                    </div>
                </div>
            </template>
            <template #cell(accion)="row">
                <div style="display: flex;">
                    <b-button @click="handleButtonClickAceptar(row.item.id)" variant="success"
                        style="margin-right: 6px;">Aceptar</b-button>
                    <b-button @click="handleButtonClick(row.item.id)" variant="danger">Rechazar</b-button>

                </div>
            </template>

            <b-icon style="height: 80%; width: 80%; align-items: center;" icon="three-dots" variant="dark"
                aria-hidden="true"></b-icon>
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
                    key: 'nombre_producto',
                    label: 'PRODUCTO'
                },
                {
                    key: 'cantidad',
                    label: 'CANT'
                },
                {
                    key: 'unidad',
                    label: 'UNID'
                },
                {
                    key: 'especificaciones',
                    label: 'ESPECIFICACIONES'
                },
                {
                    key: 'nombre_area',
                    label: 'AREA'
                },
                {
                    key: 'nombre_empresa',
                    label: 'PROVEEDOR'
                },
                {
                    key: 'estado',
                    label: 'ESTADO'
                },
                {
                    key: 'nombre',
                    label: 'SOLICITANTE'
                },
                {
                    key: 'accion',
                    label: 'Accion'
                }
            ],
            items: []
        }
    },
    mounted() {
        this.obtenerSolicitudes();
    },
    methods:
    {
        obtenerSolicitudes() {
            axios.get('https://lsa.laboratorioquimico.cl/public/api/solicitudes/obtenerSolicitudCompraAceptada').then((response) => {
                if (response != null) {
                    if (response.status == 200) {
                        this.items = response.data
                    }
                }
            }).catch(error => {
                console.log('error solicitudes de compra', error);
            })
        },
        handleButtonClick(id_solicitud) {
            axios.put('https://lsa.laboratorioquimico.cl/public/api/solicitudes/rechazarSolicitud/' + id_solicitud).then((response) => {
                if (response != null) {
                    if (response.status == 200) {
                        console.log('solicitud rechazada correctamente');

                    }
                }
                this.eliminarRegistro(id_solicitud);
            })
        },
        async eliminarRegistro(id_solicitud) {
            const index = this.items.findIndex(item => item.id === id_solicitud);
            if (index !== -1) {
                this.items.splice(index, 1)
            }
        },
        handleButtonClickAceptar(id_solicitud) {
            axios.put('https://lsa.laboratorioquimico.cl/public/api/solicitudes/aceptarSolicitud/'+ id_solicitud).then((response) => {
                if (response != null && response.status == 200) {
                    this.eliminarRegistro(id_solicitud);
                }else{
                    console.log('error');
                }
            })
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