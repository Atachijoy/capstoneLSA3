<template>
    <ValidationObserver ref="form">
        <b-modal id="modal-registrar-equipo" title="Registrar equipo" size="lg">

            <form @sumbit.prevent="handleSumbit(onSumbit)">

                <!--                 <ValidationProvider name="Codigo" v-slot="{ errors }">
                    <div class="form-group">
                        <label>Codigo:</label>
                        <input type="text" class="form-control" v-model="Codigo">
                        <span>{{ errors[0] }}</span>
                    </div>
                </ValidationProvider>
 -->

            <div class="centrar-form">
                <ValidationProvider name="Codigo" v-slot="{ errors }" style="margin-right: 3%;">
                    <div class="form-group">
                        <label>Codigo:</label>
                        <input type="text" class="form-control" v-model="Codigo">
                        <span>{{ errors[0] }}</span>
                    </div>
                </ValidationProvider>


                <ValidationProvider name="Nombre" rules="required" v-slot="{ errors }" style="margin-right: 3%;">
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" class="form-control" v-model="Nombre">
                        <span>{{ errors[0] }}</span>
                    </div>
                </ValidationProvider>

                <ValidationProvider name="Marca" v-slot="{ errors }">
                    <div class="form-group">
                        <label>Marca:</label>
                        <input type="text" class="form-control" v-model="Marca">
                        <span>{{ errors[0] }}</span>
                    </div>
                </ValidationProvider>


                <ValidationProvider name="Cantidad" v-slot="{ errors }" style="margin-right: 3%;">
                    <div class="form-group">
                        <label>Cantidad:</label>
                        <input type="number" class="form-control" v-model="Cantidad">
                        <span>{{ errors[0] }}</span>
                    </div>
                </ValidationProvider>

                <ValidationProvider name="Ubicacion" v-slot="{ errors }" style="margin-right: 3%;">
                    <div class="form-group">
                        <label>Ubicacion:</label>
                        <input type="text" class="form-control" v-model="Ubicacion">
                        <span>{{ errors[0] }}</span>
                    </div>
                </ValidationProvider>

                <ValidationProvider name="Valor" v-slot="{ errors }">
                    <div class="form-group">
                        <label>Valor:</label>
                        <input type="text" class="form-control" v-model="Valor">
                        <span>{{ errors[0] }}</span>
                    </div>
                </ValidationProvider>


                <ValidationProvider name="Proveedor" v-slot="{ errors }">
                    <div class="form-group">
                        <label>Proveedor:</label>
                        <select class="form-control" v-model="Proveedor">
                            <option v-for="proveedor in Proveedores" :key="proveedor.rut" :value="proveedor.rut">{{
                                proveedor.nombre_empresa }}
                            </option>
                        </select>
                        <span>{{ errors[0] }}</span>
                        
                    </div>
                </ValidationProvider>

            </div>
            </form>

            <template #modal-footer>

                <b-button @click="onSumbit()" variant="primary" size="xl" class="float-right reactive-button"
                    style="font-weight:bold">
                    Crear y guardar
                </b-button>
            </template>


        </b-modal>

    </ValidationObserver>
</template>

<script>

import axios from 'axios';
import { ValidationProvider } from 'vee-validate';

export default {
    data() {
        return {
            Codigo: "",
            Nombre: "",
            Marca: "",
            Cantidad: 0,
            Ubicacion: "",
            Valor: "",
            Proveedor: "",
            Proveedores: []
        }
    },
    mounted() {
        this.obtenerProveedores();
    },

    methods: {
        onSumbit() {
            this.$refs.form.validate().then(success => {
                if (!success) {
                    return;
                }
                else {
                    if(this.Proveedor === ''){
                        this.Proveedor = 87868451
                    }
                    let data =
                    {
                        "codigo": this.Codigo,
                        "nombre": this.Nombre,
                        "marca": this.Marca,
                        "cantidad": this.Cantidad,
                        "ubicacion": this.Ubicacion,
                        "valor": this.valor,
                        "proveedor": this.Proveedor
                    }
                    axios.post('http://127.0.0.1:8000/api/productos/agregarEquipo', data).then((response) => {
                        if (response != null) {
                            if (response.status == 200) {
                                this.$bvToast.toast(`Registro de equipo exitoso.`, {
                                    title: 'Éxito',
                                    toaster: 'b-toaster-top-center',
                                    solid: true,
                                    variant: "success",
                                    appendToast: true
                                })
                            }
                            this.resetearDatos()
                            this.$bvModal.hide('modal-registrar-material')
                            this.$emit('equipo_actualizado')
                        } else {
                            this.$bvToast.toast(`Error al crear equipo el material.`, {
                                title: 'Error',
                                toaster: 'b-toaster-top-center',
                                solid: true,
                                variant: "warning",
                                appendToast: true
                            })
                        }
                    }).catch(error => {
                        console.log('el error es', error);
                    })
                }
            })
        },
        obtenerProveedores() {
            axios.get('http://127.0.0.1:8000/api/proveedores/').then((response) => {
                this.Proveedores = response.data;
            })

        },
        resetearDatos()
        {
            this.Codigo= "",
            this.Nombre= "",
            this.Marca= "",
            this.Cantidad= 0,
            this.Ubicacion= "",
            this.Valor= "",
            this.Proveedor= ""
        }
    },
    comments: { ValidationProvider }

}

</script>

<style scoped>
.centrar-form{
    display: grid;
    grid-template-columns: repeat(3,33.33%);
}
</style>