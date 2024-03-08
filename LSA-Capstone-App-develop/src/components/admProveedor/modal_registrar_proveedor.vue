<template>
    <ValidationObserver ref="form">

        <b-modal id="modal-registrar-proveedor" title="Registrar proveedor" size="lg">

            <form @sumbit.prevent="handleSumbit(onSumbit)">

                <b-col class="column">
                    <b-row>

                        <ValidationProvider name="Rut" rules="required|rut|rutSinPuntoGuion" v-slot="{ errors }">
                            <div class="form-group">
                                <label>Rut:</label>
                                <input type="text" class="form-control" v-model="Rut">
                                <span>{{ errors[0] }}</span>
                            </div>
                        </ValidationProvider>

                        <ValidationProvider name="Nombre" rules="required" v-slot="{ errors }">
                            <div class="form-group">
                                <label>Nombre proveedor</label>
                                <input type="text" class="form-control" v-model="Nombre">
                                <span>{{ errors[0] }}</span>
                            </div>
                        </ValidationProvider>


                        <ValidationProvider name="Contacto:" rules="required" v-slot="{ errors }">
                            <div class="form-group">
                                <label>Contacto</label>
                                <textarea type="text" class="form-control" v-model="Contacto"></textarea>
                                <!--                                 <input type="text" class="form-control" v-model="Contacto">
 --> <span>{{ errors[0] }}</span>
                            </div>
                        </ValidationProvider>

                    </b-row>
                </b-col>

                <b-col class="column">
                    <b-row>

                        <ValidationProvider name="Telefono" rules="required" v-slot="{ errors }">
                            <div class="form-group">
                                <label>Telefono:</label>
                                <input type="text" class="form-control" v-model="Telefono">
                                <span>{{ errors[0] }}</span>
                            </div>
                        </ValidationProvider>


                        <ValidationProvider name="Email" rules="required" v-slot="{ errors }">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" class="form-control" v-model="Email">
                                <span>{{ errors[0] }}</span>
                            </div>
                        </ValidationProvider>


                        <ValidationProvider name="Direccion" rules="required" v-slot="{ errors }">
                            <div class="form-group">
                                <label>Dirección:</label>
                                <input type="text" class="form-control" v-model="Direccion">
                                <span>{{ errors[0] }}</span>
                            </div>
                        </ValidationProvider>

                    </b-row>
                </b-col>

                <b-col>

                    <b-row>

                        <ValidationProvider name="Giro" rules="required" v-slot="{ errors }">
                            <div class="form-group">
                                <label>Giro:</label>
                                <input type="text" class="form-control" v-model="Giro">
                                <span>{{ errors[0] }}</span>
                            </div>
                        </ValidationProvider>

                    </b-row>
                </b-col>
            </form>


            <template #modal-footer>

                <b-button @click="onSumbit()" variant="primary" size="xl" class="float-right reactive-button"
                    style="font-weight:bold">
                    Crear y guardar
                </b-button>

                <!--                 <b-button @click="Salir()" variant="primary" size="xl" class="float-right reactive-button"
                        style="font-weight:bold">
                        Cerrar
                    </b-button>
    -->

            </template>

        </b-modal>

    </ValidationObserver>
</template>

<script>
import axios from 'axios';
import { ValidationObserver, ValidationProvider } from 'vee-validate';


export default {
    data() {
        return {
            Rut: '',
            Nombre: '',
            Contacto: '',
            Telefono: '',
            Email: '',
            Direccion: '',
            Giro: '',
            /*             Fecha_evaluacion: null,
                        Aprobacion: 0
             */
        }
    },

    methods: {
        onSumbit() {
            this.$refs.form.validate().then(success => {
                if (!success)
                    return;

                else {
                    let data = {
                        "rut_proveedor": this.Rut,
                        "nombre_proveedor": this.Nombre,
                        "contacto": this.Contacto,
                        "telefono": this.Telefono,
                        "email": this.Email,
                        "direccion": this.Direccion,
                        "giro": this.Giro,
                        "fecha_evaluacion": null,
                        "aprobacion": 0
                    }
/*                     console.log("data a enviar", data)
 */                    axios.post('http://127.0.0.1:8000/api/proveedores/agregarProveedor', data).then(response => {
                        if (response != null) {
                            if (response.status == 200) {
                                this.$bvToast.toast(`Creación de Proveedor exitosa.`, {
                                    title: 'Éxito',
                                    toaster: 'b-toaster-top-center',
                                    solid: true,
                                    variant: "success",
                                    appendToast: true
                                })
                                this.$emit('refrescar');
                            }
                            this.$bvModal.hide('modal-registrar-proveedor')
/*                             this.reiniciarDatos();
 */                            this.$refs.form.reset();
                        } else {
                            this.$bvToast.toast(`Error al crear el Proveedor.`, {
                                title: 'Error',
                                toaster: 'b-toaster-top-center',
                                solid: true,
                                variant: "warning",
                                appendToast: true
                            })
                        }

                    }).catch(error => {
                        console.log('error', error)
                    });
                }
            })
        },
        
    },
    components: { ValidationObserver, ValidationProvider }
}

</script>



<style>
.column {
    padding-right: 4%;
}

.txtSize {
    size: 12%;
}

.row {
    padding-right: 4%
}

.form-group textarea {
    white-space: pre-line;
}</style>