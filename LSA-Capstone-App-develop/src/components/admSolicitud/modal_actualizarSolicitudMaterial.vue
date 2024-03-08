<template>
    <b-modal id="modal-actualizar-solicitud-material" title="Actualizar solicitud">
        <div style="display: grid; width:100%">
            <div style="display: flex; width:100%; margin-bottom: 5%">
                <div style="display: grid; width:90%">
                    <span>Solicitud:</span>
                    <b-select v-model="solicitud" @change="actualizarCantidad(solicitud)">
                        <option v-for="solicitudes in items" :key="solicitudes.id" :value="solicitudes.id">
                            {{ solicitudes.nombre_producto }} ({{ solicitudes.nombre }} {{ solicitudes.apellido }})</option>
                    </b-select>
                </div>
            </div>

            <div style="display: flex; width:100%;">
                <div style="display: grid; width:40%;  margin-right:3%">
                    <span>Lote:</span>
                    <b-input v-model="lote"></b-input>
                </div>

                <div style="display: grid; width:50%">
                    <span>Fecha de vencimiento:</span>
                    <b-input v-model="fecha_vencimiento"></b-input>
                </div>
            </div>
            <div style="display: grid; width:30%; margin-top: 3%;">
                <span>Cantidad solicitada:</span>
                <b-input type="number" v-model="cantidad_solicitada"></b-input>
            </div>
        </div>

        <template #modal-footer="{ close }">
            <b-button variant="primary" size="xl" class="float-right reactive-button" style="font-weight:bold"
                @click="actualizarMaterial()">
                Guardar
            </b-button>
            <b-button @click="close()" variant="primary" size="xl" class="float-right reactive-button"
                style="font-weight:bold">
                Cancelar
            </b-button>
        </template>
    </b-modal>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            solicitud: '',
            cantidad_solicitada: 0,
            lote: '',
            fecha_vencimiento: '',
            items: []
        }
    },

    mounted() {
        this.obtenerSolicitudes()
    },
    methods: {
        obtenerSolicitudes() {
            axios.get('https://lsa.laboratorioquimico.cl/public/api/solicitudes/obtenerSolicitudMaterialAceptada').then((response) => {
                this.items = response.data

            }).catch(error => {
                console.log('error', error)
            })

        },
        actualizarCantidad(id_material) {
            if (id_material != '') {
                let cantidad1 = this.items.find(s => s.id === id_material)
                this.cantidad_solicitada = cantidad1.cantidad;
                this.fecha_vencimiento = cantidad1.fecha_vencimiento
                this.lote = cantidad1.lote
            }
        },
        actualizarMaterial() {
            if (this.solicitud != '') {
                let data = {
                    'id_solicitud': this.solicitud,
                    'lote': this.lote,
                    'cantidad_solicitada': parseInt(this.cantidad_solicitada),
                    'fecha_vencimiento': this.fecha_vencimiento
                }
                axios.post('https://lsa.laboratorioquimico.cl/public/api/solicitudes/actualizarSolicitudMaterial', data).then((response) => {
                    if (response != null) {
                        if (response.status == 200) {
                            this.$bvToast.toast(`Solicitud actualizada.`, {
                                title: 'Exito',
                                toaster: 'b-toaster-top-center',
                                solid: true,
                                variant: "success",
                                appendToast: true
                            })
                            this.resetearDatos()
                        this.$emit('productoActualizado');

                        this.$bvModal.hide('modal-actualizar-solicitud-material');
                        }
                       
                    }
                })
            } else {
                this.$bvToast.toast(`Debe seleccionar una solicitud para realizar esta operación.`, {
                    title: 'Advertencia',
                    toaster: 'b-toaster-top-center',
                    solid: true,
                    variant: "warning",
                    appendToast: true
                })
            }
        },
        resetearDatos()
        {
            this.solicitud = '';
            this.lote = ''
            this.cantidad_solicitada = 0
            this.fecha_vencimiento = ''
        }
    }
}

</script>