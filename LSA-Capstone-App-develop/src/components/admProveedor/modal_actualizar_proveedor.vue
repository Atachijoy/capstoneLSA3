<template>
    <validation-observer ref="actualizar_proveedor">
        <b-modal id="modal-actualizar-proveedor" ref="modal_proveedor" title="Actualizar proveedor" size="lg">
            <template #modal-header="{ close }">
                <b-row class="d-flex justify-content-around">
                    <div class="pl-3"> Actualizar proveedor </div>
                </b-row>

                <button type="button" class="close" aria-label="Close" @click="close()">
                    <span aria-hidden="true" style="color:white">&times;</span>
                </button>
            </template>

            <b-row style="padding-bottom: 2%; display: grid;">
                <div class="pl-3" style="padding-right: 2%;margin-left: 2%; display: grid; margin-bottom: 3%;">
                    <span>Proveedor:</span>
                    <select style="width: 40%;" v-model="proveedor" @change="mostrarProveedor()">
                        <option v-for="proveedor in proveedores" :key="proveedor.rut" :value="proveedor.rut">
                            {{ proveedor.nombre_empresa }}
                        </option>
                    </select>
                </div>

                <div style="display: flex; width: 100%;  margin-bottom: 3%;">
                    <div class="pl-3" style="padding-right: 2%;margin-left: 2%; display: grid; width: 100%;">
                        <span>Contacto:</span>
                        <textarea style="width: 80%; height: 150%;" ref="textareacontacto"></textarea>
                    </div>

                    <div class="pl-3" style="padding-right: 2%;margin-left: 2%; display: grid; width: 100%;">
                        <span>Telefono:</span>
                        <textarea style="width: 80%; height: 150%;" ref="textareatelefono"></textarea>
                    </div>

                </div>

                <div style="display: flex; width: 100%; margin-top: 3%;">
                    <div class="pl-3" style="padding-right: 2%;margin-left: 2%; display: grid; width: 100%;">
                        <span>Email:</span>
                        <textarea style="width: 80%; height: 150%;" ref="textareaemail"></textarea>
                    </div>

                    <div class="pl-3" style="padding-right: 2%;margin-left: 2%; display: grid; width: 100%;">
                        <span>Dirección:</span>
                        <textarea style="width: 80%; height: 150%;" ref="textareadireccion"></textarea>
                    </div>

                </div>

                <div style="display: flex; width: 100%; margin-top: 6%;">
                    <div class="pl-3" style="padding-right: 2%;margin-left: 2%; display: grid; width: 100%;">
                        <span>Giro:</span>
                        <textarea style="width: 50%; height: 150%;" ref="textareagiro"></textarea>
                    </div>

                </div>

            </b-row>

            <template #modal-footer="{ close }">
                <b-button variant="primary" size="xl" class="float-right reactive-button" style="font-weight:bold"
                @click="actualizarProvedor()">
                    Guardar
                </b-button>
                <b-button @click="close()" variant="primary" size="xl" class="float-right reactive-button"
                    style="font-weight:bold">
                    Cancelar
                </b-button>
            </template>
        </b-modal>
    </validation-observer>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            proveedor: '',
            proveedores: [],
            contacto: '',
            telefono: '',
            email: '',
            direccion: '',
            giro: ''
        };
    },
    mounted() {
        this.obtenerProveedores()
    },
    methods: {
        obtenerProveedores() {
            axios.get('http://127.0.0.1:8000/api/proveedores').then((response) => {
                if (response != null) {
                    if (response.status == 200) {
                        this.proveedores = response.data;
                    }
                }
            }).catch(error => {
                console.log('error al obtener proveedores', error);
            });
        },
        mostrarProveedor(){
            if(this.proveedor != null || this.proveedor != ''){
                let proveedor = this.proveedores.find(p => p.rut == this.proveedor)
                if(proveedor != null){
                    this.$refs.textareacontacto.value = proveedor.contacto
                    this.$refs.textareadireccion.value = proveedor.dirección
                    this.$refs.textareaemail.value = proveedor.email
                    this.$refs.textareatelefono.value = proveedor.telefono
                    this.$refs.textareagiro.value = proveedor.giro
                }
            } 
        },
        actualizarProvedor(){

            let data ={
                'rut_proveedor': this.proveedor,
                'contacto': this.$refs.textareacontacto.value,
                'telefono': this.$refs.textareatelefono.value,
                'email': this.$refs.textareaemail.value,
                'direccion': this.$refs.textareadireccion.value,
                'giro': this.$refs.textareagiro.value
            }

            axios.put('http://127.0.0.1:8000/api/proveedores/actualizarProveedor', data).then((response) => {
                if(response != null){
                    if(response.status == 200){
                        this.$bvToast.toast(`Proveedor actualizado.`, {
                                title: 'Exito',
                                toaster: 'b-toaster-top-center',
                                solid: true,
                                variant: "success",
                                appendToast: true
                            })
                    }
                }
            })
        }
    }
}
</script>