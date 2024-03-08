<template>
<validation-observer ref="registrar_entrada">
       <b-modal id="modal-registrar-salida" ref="modal" title="Registrar entrada">
            <template #modal-header="{ close }">
                <b-row class="d-flex justify-content-around">
                    <div class="pl-3">Registrar salida</div>
                </b-row>

                <button type="button" class="close" aria-label="Close" @click="close()">
                    <span aria-hidden="true" style="color:white">&times;</span>
                </button>
            </template>
            <b-row>
                <div class="pl-3" style="padding-right: 2%;"> Producto: </div>
                <select style="padding-right: 4%;"></select>

                <div class="pl-3" style="padding-right: 2%;"> Cantidad: </div>                
                <input type="number" onkeypress="return event.charCode>=48 && 
                event.charCode<=57" min="0"/>   
            </b-row>

            <template #modal-footer="{ close }">
                <b-button variant="primary" size="xl" 
                class="float-right reactive-button" style="font-weight:bold">
                    Guardar
                </b-button>
                <b-button @click="close()" variant="primary" size="xl" 
                class="float-right reactive-button" style="font-weight:bold">
                    Cancelar
                </b-button>
            </template>
        </b-modal> 
    </validation-observer>

</template>

<script>

</script>