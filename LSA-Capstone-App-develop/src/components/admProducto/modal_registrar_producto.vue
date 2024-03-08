<template>
    <validation-observer ref="registrar_producto">

        <b-modal id="modal-registrar-producto" ref="registrar_proveedor" title="Registrar Producto" size="lg">

            <template #modal-header="{ close }">
                <b-row class="d-flex justify-content-around">
                    <div class="pl-3"> Registrar material </div>
                </b-row>

                <button type="button" class="close" aria-label="Close" @click="close()">
                    <span aria-hidden="true" style="color:white">&times;</span>
                </button>
            </template>

            <b-row class="pb-2">
                <b-col class="col-4">
                    <label>Nombre:</label>
                    <ValidationProvider name="nombre" rules="required" >
                        <b-form-input size="sm" id="nombre-input" class="mb-1" v-model="Nombre"
                            :state="getValidationState(validationContext)"
                            aria-describedby="nombre-live-feedback"></b-form-input>
                    </ValidationProvider>
                    <b-form-invalid-feedback id="nombre-live-feedback">{{
                        validationContext.errors[0] }}
                    </b-form-invalid-feedback>


                </b-col>

            </b-row>

            <!-- <b-container>

                <b-row>
                    <b-col>
                        <label for="input-live">Nombre: </label>
                        <b-form-input size="mb" id="nombre_producto_input" placeholder="Ingrese nombre producto" />

                        <label for="input-live">Marca: </label>
                        <b-form-input size="mb" id="nombre_producto_input" placeholder="Ingrese la marca del producto" />

                        <label for="input-live">Stock inicial: </label>
                        <b-form-input size="mb" id="nombre_producto_input" placeholder="Ingrese nombre producto"
                            type="number" onkeypress="return event.charCode>=48 && 
                            event.charCode<=57" min="0" />
                    </b-col>

                    <b-col>
                        <label for="input-live">Fecha de vencimiento: </label>
                        <b-form-input size="mb" id="nombre_producto_input" placeholder="Ingrese nombre producto" />

                        <label for="input-live">Tipo: </label>
                        <b-form-input size="mb" id="nombre_producto_input" placeholder="Ingrese nombre producto" />

                    </b-col>
                </b-row>

            </b-container>
 -->
            <template #modal-footer="{ close }">
                <b-button variant="primary" size="xl" class="float-right reactive-button" style="font-weight:bold">
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
/* import { ValidationProvider } from 'vee-validate';
 */
export default {
    data() {
        return {
            Nombre: ""
        }
    },

    methods: {
        getValidationState({
            dirty,
            validated,
            valid = null
        }) {
            return dirty || validated ? valid : null;
        }
    }

}


</script>

<style>
.label {
    padding-top: 1.1%;
    padding-left: 1%;
    padding-right: 1%;
}
</style>