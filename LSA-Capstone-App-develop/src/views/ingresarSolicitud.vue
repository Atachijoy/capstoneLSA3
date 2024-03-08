<template>
    <div class="home">

        <b-container>

            <b-col>
                <div style="text-align: left; padding-bottom: 3%; padding-top: 2%; font-weight: bold; font-size: 2rem; display: flex; 
                flex-direction: column; justify-content: center; height: 10vh;">
                Ingresar Solicitud
            </div>
            <b-form-select v-model="solicitud" :options="options" class="custom-select" placeholder="Ingrese tipo de solicitud" title="Tipo solicitud"></b-form-select>
            </b-col>

            <b-col style="padding-bottom: 8%;">
                <component v-bind:is='optionSelected'></component>
            </b-col>
        </b-container>

    </div>
</template>

<script>

import solicitudCompra from '../components/admSolicitud/ingresarSolicitudCompra.vue'
import solicitudMaterial from '../components/admSolicitud/ingresarSolicitudMaterial.vue'


export default {

    data() {
        return {
            solicitud: 'Ingrese ',

            options: [{
                value: 'solicitudCompra',
                text: 'Solicitud de Compra',
            },
            {
                value: 'solicitudMaterial',
                text: 'Solicitud de Materiales y reactivos'
            }
            ]
        }
    },
    components: {
        solicitudCompra,
        solicitudMaterial
    },

    computed: {
        optionSelected() {
            if (this.solicitud === 'solicitudCompra') {
                return 'solicitudCompra'
            }
            else if (this.solicitud === 'solicitudMaterial') {
                return 'solicitudMaterial'
            }

            return null
        }

    }


}

</script>


<style scoped>
.custom-select {
    width: 350px;
    height: 40px;
    border: 1px solid #000;
    margin-right: 70%;
/* }.selector{
    
 */}
</style>