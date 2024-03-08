<template>
    <div class="home">

        <div>

            <b-navbar toggleable="lg" type="light" variant="faded">
                <b-navbar-brand href="#"></b-navbar-brand>

                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                <b-collapse id="nav-collapse" is-nav class="navbar-text">
                    <b-navbar-nav>

                        <b-nav-item href="#" class="navbar-item" to="/visualizarSolicitudesMateriales"> Solicitudes de materiales y reactivos</b-nav-item>
                        <b-nav-item href="#" class="navbar-item" to="/visualizarSolicitudesCompra"> Solicitudes de compras </b-nav-item>

                    </b-navbar-nav>

                </b-collapse>
            </b-navbar>
            <h1 style="padding-bottom: 3%;">Solicitudes de compra</h1>
        </div>

        <b-table show-empty :fields="fields" :items="items">
            <template #empty>
                <div class="text-center lsa-light-blue-text my-2 row">
                    <div class="col">
                        <div style=" color:gray"> No hay productos registrados para mostrar </div>
                    </div>
                </div>
            </template>
            <template #cell(Accion)="row">
                <b-button @click="handleButtonClickAceptar(row.item.id)" variant="success" style="margin-right: 6px;">Aceptar</b-button>
                <b-button @click="handleButtonClick(row.item.id)" variant="danger">Rechazar</b-button>
            </template>

            <template #cell(nombre)="row">
                {{ row.item.nombre }}  {{ row.item.apellido }}
            </template>
            <template #cell(accion)>
                
            </template>
            <b-icon style="height: 80%; width: 80%; align-items: center;" icon="three-dots" variant="dark"
                aria-hidden="true"></b-icon>
        </b-table>



    </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return {
            fields: [
                {
                    key: 'nombre_producto',
                    label: 'Nombre'
                },
                {
                    key: 'cantidad',
                    label: 'Cantidad'
                },
                {
                    key: 'unidad',
                    label: 'Unidad'
                },
                {
                    key: 'especificaciones',
                    label: 'Especificaciones'
                },
                {
                    key: 'fecha_solicitud',
                    label: 'Fecha'
                },
                {
                    key: 'nombre',
                    label: 'Solicitante'
                },
                {
                    key: 'nombre_area',
                    label: 'Area'
                },
                {
                    key: 'nombre_empresa',
                    label: 'Proveedor'
                },
                {
                    key: 'Accion',
                    label: 'Acción'
                },
            ],
            items:[]
        }
    },
    mounted()
    {
        this.obtenerSolicitudes();
    },

    methods: {
        obtenerSolicitudes()
        {
            axios.get('https://lsa.laboratorioquimico.cl/public/api/solicitudes/obtenerSolicitudCompra').then((response) =>
            {
                if(response != null)
                {
                    if(response.status == 200)
                    {
                        this.items = response.data
                    }
                }
            }).catch(error =>{
                console.log('error solicitudes de compra', error);
            })
        },      
        async handleButtonClickAceptar(id_solicitud)
        {
            axios.put('https://lsa.laboratorioquimico.cl/public/api/solicitudes/actualizarSolicitud/' + id_solicitud).then((response) =>
            {
                if(response != null)
                {
                    if(response.status == 200)
                    {
                        console.log('solicitud aceptada');
                        this.eliminarRegistro(id_solicitud);
                    }
                }
            })
        },
        async eliminarRegistro(id_solicitud){
            const index = this.items.findIndex(item => item.id === id_solicitud);
            if(index !== -1){
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
    }

}

</script>

<style scoped>
.navbar-text {

font-size: 25px;
border-bottom: 1px solid #ccc;
}
.navbar-text {

    font-size: 23px;
    border-bottom: 1px solid #ccc;
}
</style>
