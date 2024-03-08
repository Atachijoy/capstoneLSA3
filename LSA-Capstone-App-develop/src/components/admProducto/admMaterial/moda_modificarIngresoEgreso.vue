

<template>
    <b-modal id="modal-ingreso-egreso" title="Actualizar el ingreso o egreso">
        <div style="display: flex;">

            <div style="display: grid;">
                <span>Ingresos:</span>
                <input v-model="ingresos" type="number" onkeypress="return event.charCode>=48 && 
                event.charCode<=57" min="-9999" style="width: 70%;" />
            </div>
            <div style="display: grid;">
                <span>Egresos:</span>

                
                <input v-model="egresos" type="number" onkeypress="return event.charCode>=48 && 
                event.charCode<=57" min="-9999" style="width: 70%;" />
            </div>
        </div>

        <template #modal-footer="{close}">

            <b-button @click="actualizarIngresoEgreso()" variant="primary" size="xl" class="float-right reactive-button"
                style="font-weight:bold">
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
    props: {
        modal_data: {
            type: Array,
            default: () => []
        }
    },
    data() {
        return {
            ingresos: 0,
            egresos: 0,
            id: ''
        };
    },
    mounted() {
        console.log(this.id)
    },
    watch: {
        modal_data: {
            handler(newVal) {
                this.ingresos = newVal[0];
                this.egresos = newVal[1];
                this.id = newVal[2];
            },
            immediate: true
        }
    },
    methods: {
        actualizar() {
            this.$emit('actualizarIngresoEgreso', [this.ingresos, this.egresos, this.id]);

        },

        actualizarIngresoEgreso() {
            let data = {
                'ingreso': this.ingresos,
                'egreso': this.egresos,
                'id_producto': this.id
            }
            axios.put('http://127.0.0.1:8000/api/productos/actualizarIngresoEgreso', data).then((response) => {
                if (response != null) {
                    if (response.status == 200) {
                        this.$bvToast.toast(`Actualización exitosa.`, {
                            title: 'Éxito',
                            toaster: 'b-toaster-top-center',
                            solid: true,
                            variant: "success",
                            appendToast: true
                        })
                        this.$bvModal.hide('modal-ingreso-egreso')
                        this.$emit('ingreso_egreso_actualizado')
                    }
                }
            }).catch(error => {
                console.log('error', error)
            })
        }


    }
};
</script>
