
<template>
    <div>

        <div>
            <select v-model="respuesta">
                <option disabled selected value="" >Selecciona un formulario</option>
                <option v-for="(opcion,index) in formularios" :key="index" :value="opcion.form_id">Formulario {{ index + 1 }}</option>
            </select>
        </div>

        <div v-if="mostrar=='Si'">
    <section class="imagenes" style="width:100%;">

            <div class="ucn">
                <img src="@/assets/ucn.png">
            </div>

            <div class="version">
                <h2 style="text-align:center; font-size:16px">Hidrocarburos Fijos-Aceite y Grasas</h2>
                <h3 style="text-align:center; color:rgb(50, 50, 237); font-size: 10px;">14° Versión</h3>
                
            </div>

            <div class="lsa">
                <img src="@/assets/isologo-LSA.png">
            </div>

        </section>


        <section class="grupo1-2">
            <div  class="informe borde">
                <label style="font-weight: bold; font-size: 12px; width: 100%; height:60%">Informe N°: <input v-model="formulario.Numero_Informe" style="width:100%; height: 100%; text-align: center; border: none;" type="text"></label>
            </div>

            <div class="fechaIF borde">
                <div class="fechaI borde">
                    <label style="font-weight: bold; font-size: 12px; width:100%; margin:0%;">Fecha y hora de inicio: 
                        <input v-model="formulario.Fecha_Hora_Inicio" style="width: 63%; text-align: center; border:none;" type="datetime-local"> 
                    </label>
                </div>

                <div class="fechaF borde">
                    <label style="font-weight: bold; font-size: 12px; width:100%; margin:0%;">Fecha y hora de término: 
                        <input v-model="formulario.Fecha_Hora_Termino" style="width: 61%; text-align: center; border:none;" type="datetime-local"> 
                    </label>
                </div>
            </div>


            <div  class="TipoM borde">
                <label style="font-weight: bold; font-size: 12px; width:100%; margin:0%; text-align:left; margin-left:10%">Normal <input v-model="formulario.Normal_Urgente" value="Normal" style="margin-left: 10%;" type="radio" name="eleccion"></label>
                <label style="font-weight: bold; font-size: 12px; width:100%; margin:0%; text-align:left; margin-left:10%">Urgente <input v-model="formulario.Normal_Urgente" value="Urgente" style="margin-left: 9%;" type="radio" name="eleccion"></label>
            </div>

            


        </section>

        <section class="grupo3-2">
            <div class="idmuestra borde">
                <label style="font-weight: bold; width:100%; font-size: 12px; text-align:left;">Tipo de muestra: <input v-model="formulario.Tipo_de_Muestra" style="width:93%; text-align:center; border:none;" type="text"></label>
            </div>
        </section>
        <section class="grupo3-2">
            <div class="idmuestra borde">
                <label style="font-weight: bold; width:100%; font-size: 12px; text-align:left;">N° de Muestras: <input v-model="formulario.Numero_de_Muestras" style="width:93.5%; text-align:center; border:none;" type="text"></label>
            </div>
        </section>
        <section class="grupo3-2">
            <div class="idmuestra borde">
                <label style="font-weight: bold; width:100%; font-size: 12px; text-align:left;">Identificación de muestra: <input v-model="formulario.Identificacion_de_Muestra" style="width:89.5%; text-align:center; border:none;" type="text"></label>
            </div>
        </section>


        <section class="grupo4-2">
            <div class="m1 borde">
                <label style="font-size: 12px; width:100%;">M-1 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px; width:100%;">M-2 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px; width:100%;">M-3 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px; width:100%;">M-4 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px; width:100%;">M-5 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px; width:100%;">M-6 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
        </section>

        <section class="grupo3-2">
            <div class="idmuestra borde">
                <label style="font-weight: bold; width:100%; font-size: 12px; text-align:left;">pH de Muestras: <input v-model="formulario.Ph_de_Muestra" style="width:93.5%; text-align:center; border:none;" type="text"></label>
            </div>
        </section>

        <section class="grupo4-2">
            <div class="m1 borde">
                <label style="font-size: 12px; width:100%;" >M-1  <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px; width:100%;" >M-2 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px; width:100%;" >M-3 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px; width:100%;" >M-4 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px; width:100%;" >M-5 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px; width:100%;" >M-6 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
        </section>


        <section class="grupo6-2">
            <div  class="analisis borde">
                <label style="font-size: 12px; font-weight: bold; width:100%;">Análisis de: <input v-model="formulario.Analisis_de" style="width:87%; border:none;" type="text"></label>
            </div>

            <div  class="metodoEnsayo borde">
                <label style="font-size: 12px; font-weight: bold; width:100%">Método de ensayo: <input v-model="formulario.Metodo_de_Ensayo" style="width:79%; border:none;" type="text"> </label>
            </div>

        </section>

        <section class="grupo5-2">
            <div class="tratamiento borde">
                <label style="font-weight: bold; font-size: 12px; width:100%; text-align:left;">Tratamiento preliminar: 
                    <input v-model="formulario.Tratamiento_Preliminar" value="Filtración" type="radio" style="transform: scale(0.8); margin-left:10%;" name="analisisR-2"> <span style="font-size: 11px;">Filtracion</span>
                    <input v-model="formulario.Tratamiento_Preliminar" value="Destilación" type="radio" style="transform: scale(0.8); margin-left:10%;" name="analisisR-2"> <span style="font-size: 11px;">Destilación</span>
                    <input v-model="formulario.Tratamiento_Preliminar" value="Extracción" type="radio" style="transform: scale(0.8);margin-left:10%;" name="analisisR-2"> <span style="font-size: 11px;">extracción</span>
                    <input v-model="formulario.Tratamiento_Preliminar" value="Otro" type="radio" style="transform: scale(0.8);margin-left:10%;" name="analisisR-2"> <span style="font-size: 11px;">Otros: <input v-model="formulario.Otro_Tratamiento_Preliminar" style="width:80px" type="text"></span>
                    <input v-model="formulario.Tratamiento_Preliminar" value="No" type="radio" style="transform: scale(0.8);margin-left:10%;" name="analisis2-2"> <span style="font-size: 11px;">No</span>
                </label>
            </div>
        </section>

        <section class="grupo3-2">
            <div class="idmuestra borde">
                <label style="font-weight: bold; width:100%; font-size: 12px; text-align:left;">Porosidad papel filtro: <input v-model="formulario.Porosidad_Papel_Filtro" style="width:91%; text-align:center; border:none;" type="text"></label>
            </div>
        </section>

        <section class="grupo32-2">
            <div class="idmuestra borde">
                <label style="font-weight: bold; width:100%; font-size: 12px; text-align:left;">N° de ciclos/hr: <input v-model="formulario.Numero_de_Ciclos_Por_Hora" style="text-align:center; width:81%; border:none;" type="number"></label>
            </div>
            <div class="ciclos borde">
                <label style="font-weight: bold; width:100%; font-size: 12px; text-align:left;">N° de ciclos/min: <input v-model="formulario.Numero_de_Ciclos_Por_Minuto" style="text-align:center; width:80%; border:none;" type="number"></label>
            </div>
            <div class="Destilacion borde">
                <label style="font-weight: bold; width:100%; font-size: 12px; text-align:left;">T° de destilación (°C): <input v-model="formulario.Temperatura_de_Destilacion" style="text-align:center; width:74.3%; border:none;" type="number"></label>
            </div>
        </section>
        <section class="grupo42-2">
            <div class="idmuestra borde">
                <label style="font-weight: bold; width:100%; font-size: 12px; text-align:left;">Tiempo de reacción (hr): <input v-model="formulario.Tiempo_de_Reaccion" style="text-align:center; width:81%; border:none;" type="number"></label>
            </div>
            <div class="Destilacion borde">
                <label style="font-weight: bold; width:100%; font-size: 12px; text-align:left;">T° de secado (°C): <input v-model="formulario.Temperatura_de_Secado" style="text-align:center; width:74.3%; border:none;" type="number"></label>
            </div>
        </section>


        <section class="grupo5-2">
            <div class="tratamiento borde">
                <label style="font-weight: bold; font-size: 12px; width:100%; text-align:left;">Reactivos utilizados: 
                    <input v-model="formulario.Reactivos_Utilizados" value="Hexano" type="radio" style="transform: scale(0.8); margin-left:10%;" name="Reactivo-2"> <span style="font-size: 11px;">Hexano</span>
                    <input v-model="formulario.Reactivos_Utilizados" value="Tierra de diatomea" type="radio" style="transform: scale(0.8); margin-left:10%;" name="Reactivo-2"> <span style="font-size: 11px;">Tierra de diatomea</span>
                    <input v-model="formulario.Reactivos_Utilizados" value="Otro" type="radio" style="transform: scale(0.8);margin-left:10%;" name="Reactivo-2"> <span style="font-size: 11px;">Otros: <input v-model="formulario.Otro_Reactivo_Utilizado" style="width:80px" type="text"></span>
                </label>
            </div>
        </section>
        <section class="grupo5-2">
            <div class="tratamiento borde">
                <label style="font-weight: bold; font-size: 12px; width:100%; text-align:left;">Resultado Final: 
                    <input v-model="formulario.Resultado_Final" value="mg/L" type="radio" style="transform: scale(0.8); margin-left:10%;" name="Resultado-2"> <span style="font-size: 11px;">mg/L</span>
                    <input v-model="formulario.Resultado_Final" value="g/L" type="radio" style="transform: scale(0.8); margin-left:10%;" name="Resultado-2"> <span style="font-size: 11px;">g/L</span>
                    <input v-model="formulario.Resultado_Final" value="Otro" type="radio" style="transform: scale(0.8);margin-left:10%;" name="Resultado-2"> <span style="font-size: 11px;">Otros: <input v-model="formulario.Otro_Resultado_Final" style="width:80px" type="text"></span>
                </label>
            </div>
        </section>


        <section class="grupo8-2">
            <div  class="Muestra borde">
                <label style="font-size: 12px; font-weight: bold;">Muestra</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; font-weight: bold;">M-1</label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; font-weight: bold;">M-2</label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; font-weight: bold;">M-3</label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; font-weight: bold;">M-4</label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; font-weight: bold;">M-5</label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; font-weight: bold;">M-6</label>
            </div>
        </section>

        <section class="grupo9-2">
            <div class="pj borde">
                <label style="font-size: 12px">Alícuota (ml)</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo10-2">
            <div class="pj borde">
                <label style="font-size: 12px">Masa inicial (g)</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Inicial_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Inicial_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Inicial_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Inicial_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Inicial_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Inicial_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo11-2">
            <div class="pj borde">
                <label style="font-size: 12px">Masa final (g)(M-1)</label>
            </div>


            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_M1_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_M1_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_M1_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_M1_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_M1_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_M1_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo12-2">
            <div class="pj borde">
                <label style="font-size: 12px">Masa final (g)(M-2)</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_M2_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_M2_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_M2_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_M2_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_M2_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_M2_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo13-2">
            <div class="pj borde">
                <label style="font-size: 12px">Masa Final (g)</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Final_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo14-2">
            <div class="pj borde">
                <label style="font-size: 12px">Masa Obtenida (g)</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Obtenida_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Obtenida_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Obtenida_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Obtenida_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Obtenida_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Obtenida_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo15-2">
            <div class="pj borde">
                <label style="font-size: 12px">%Recuperación</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo16-2">
            <div class="pj borde">
                <label style="font-size: 12px">Promedio</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>


        <section class="grupo17-2">
            <div class="pj borde">
                <label style="font-size: 12px">$RSD</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo18-2">
            <div  class="pj borde">
                <label style="font-size: 12px">Resultado final</label>
            </div>

            <div class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="informacion1" style="text-align: left;">
         <label style="text-align: left; font-size: 10px; font-weight: bold">Nota: La masa final M-2 de la muestra corresponde al resultado de peso constante cuya diferencia es 
            &lt; 0,5 mg, con respecto a la masa final M-1, Diferencia entre duplicados ≤ al 10% </label>
        </section>

        <section class="grupo19">
            <label style=" font-size: 12px; width:100%">Condiciones agua de análisis: ph: <input v-model="formulario.Condicion_Agua_de_Analisis_pH" type="number" style="width:30%;">  </label>
            <label style="font-size: 12px;">Conductividad μs/cm: <input v-model="formulario.Conductividad" type="number">  </label>
            <label style=" font-size: 12px;">T°Obs: <input v-model="formulario.Temperatura_Observada" type="number"> </label>
            <label style=" font-size: 12px;">T°Corre: <input v-model="formulario.Temperatura_Corregida" type="number"> </label>
            <label style="font-size: 12px;">(T° Obs*: Temperatura Observada T°Corr*: Temperatura corregida aplicando el factor de corrección) </label>
        </section>

        <section class="grupo20">

            <label style="font-weight: bold; font-size: 12px">Realizado por: <input v-model="formulario.Realizado_Por" type="text"></label>

            <label style="font-size: 12px;">Revisado por: <input v-model="formulario.Revisado_Por" type="text"></label>
            <label style="font-size: 12px;">Aprobado por: <input v-model="formulario.Aprobado_Por" type="text"></label>
            
        </section>

        <section class="grupo21">
            <p style="color: blue; font-size: 10px">PT-6F-11 (14°versión) <br> 07-09-2023</p>

            <p style="color: blue; font-size: 10px">Página 1</p>

            <p style="color: blue; font-size: 10px">Laboratorio de Servicios Analiticos <br> Avda. Angamos 0610, Pabellón Ñ-1 2° piso * Antofagasta <br>
            Fono 552355613 - 552355633 <br> LSA@UCN.CL, ADM.LSA@UCN.CL</p>
        </section>

        <button @click="confirmarActualizacion(formulario)">Actualizacion</button>
        <button @click="confirmarEnvio(formulario)">Guardar</button>

        </div>
    </div>
</template>


<script>
import axios from 'axios';

import { getUserInfo } from '@/helpers/api-services/Auth.service';

import { isLoggedIn } from '@/helpers/api-services/Auth.service';

export default{
    data(){
        return {
            dato: '',
            respuesta: '',
            mostrar: '',
            rut_empleado: '',
            formulario: {
                Numero_Informe: '',
                Fecha_Hora_Inicio: '',
                Fecha_Hora_Termino: '',
                Normal_Urgente: '',
                Tipo_de_Muestra: '',
                Numero_de_Muestras: '',
                Identificacion_de_Muestra: '',
                Ph_de_Muestra: '',

                Analisis_de: '',
                Metodo_de_Ensayo: '',
                Tratamiento_Preliminar: '',
                Otro_Tratamiento_Preliminar: '',
                Porosidad_Papel_Filtro: '',
                Numero_de_Ciclos_Por_Hora: '',
                Numero_de_Ciclos_Por_Minuto: '',
                Temperatura_de_Destilacion: '',
                Tiempo_de_Reaccion: '',
                Temperatura_de_Secado: '',
                Reactivos_Utilizados: '',
                Otro_Reactivo_Utilizado: '',

                Resultado_Final: '',
                Otro_Resultado_Final: '',
                
                Alicuota_Muestra_1: '',
                Alicuota_Muestra_2: '',
                Alicuota_Muestra_3: '',
                Alicuota_Muestra_4: '',
                Alicuota_Muestra_5: '',
                Alicuota_Muestra_6: '',


                Masa_Inicial_Muestra_1: '',
                Masa_Inicial_Muestra_2: '',
                Masa_Inicial_Muestra_3: '',
                Masa_Inicial_Muestra_4: '',
                Masa_Inicial_Muestra_5: '',
                Masa_Inicial_Muestra_6: '',

                Masa_Final_M1_Muestra_1: '',
                Masa_Final_M1_Muestra_2: '',
                Masa_Final_M1_Muestra_3: '',
                Masa_Final_M1_Muestra_4: '',
                Masa_Final_M1_Muestra_5: '',
                Masa_Final_M1_Muestra_6: '',

                Masa_Final_M2_Muestra_1: '',
                Masa_Final_M2_Muestra_2: '',
                Masa_Final_M2_Muestra_3: '',
                Masa_Final_M2_Muestra_4: '',
                Masa_Final_M2_Muestra_5: '',
                Masa_Final_M2_Muestra_6: '',

                Masa_Final_Muestra_1: '',
                Masa_Final_Muestra_2: '',
                Masa_Final_Muestra_3: '',
                Masa_Final_Muestra_4: '',
                Masa_Final_Muestra_5: '',
                Masa_Final_Muestra_6: '',

                Masa_Obtenida_Muestra_1: '',
                Masa_Obtenida_Muestra_2: '',
                Masa_Obtenida_Muestra_3: '',
                Masa_Obtenida_Muestra_4: '',
                Masa_Obtenida_Muestra_5: '',
                Masa_Obtenida_Muestra_6: '',

                Recuperacion_Muestra_1: '',
                Recuperacion_Muestra_2: '',
                Recuperacion_Muestra_3: '',
                Recuperacion_Muestra_4: '',
                Recuperacion_Muestra_5: '',
                Recuperacion_Muestra_6: '',

                Promedio_Muestra_1: '',
                Promedio_Muestra_2: '',
                Promedio_Muestra_3: '',
                Promedio_Muestra_4: '',
                Promedio_Muestra_5: '',
                Promedio_Muestra_6: '',

                RSD_Muestra_1: '',
                RSD_Muestra_2: '',
                RSD_Muestra_3: '',
                RSD_Muestra_4: '',
                RSD_Muestra_5: '',
                RSD_Muestra_6: '',

                Resultado_Final_Muestra_1: '',
                Resultado_Final_Muestra_2: '',
                Resultado_Final_Muestra_3: '',
                Resultado_Final_Muestra_4: '',
                Resultado_Final_Muestra_5: '',
                Resultado_Final_Muestra_6: '',



                Condicion_Agua_de_Analisis_pH: '',
                Conductividad: '',
                Temperatura_Observada: '',
                Temperatura_Corregida: '',

                Realizado_Por: '',
                Revisado_Por: '',
                Aprobado_Por: '',

                tecnica: this.idTecnica,

            }
        }
    },
    props:{
        data: Number,
        idTecnica: Number,
        formularios: Array,
    },
    mounted(){
        //this.rellenar(this.formulario);
        this.retornarDatoUsuario();
    },
    watch:{
        respuesta(valor){
            if(valor!=''){
                this.rellenar(this.formulario,valor);
            }
        }
    },
    methods: {
        retornarDatoUsuario(){
            if(isLoggedIn()){
                this.datosUser = getUserInfo();
                console.log('Obteniendo datos del usuario.')
                console.log(this.datosUser.rut);
                this.rut_empleado = this.datosUser.rut;
                console.log(this.$route.params.RUM);
            }
        },

        confirmarActualizacion(formulario){
            const mensaje = "¿Estás seguro de que quieres realizar está acción?\n\n" + 
                            "Una vez confirmado, el sistema actualizará el registro."
            if(window.confirm(mensaje)){
                console.log("Se ha confirmado la acción");
                this.editarFormulario(formulario,'No');
            }
            else{
                console.log("Acción cancelada");
            }
        },
        confirmarEnvio(formulario){
            const mensaje = "¿Estás seguro de que quieres realizar está acción?\n\n" +
                            "Una vez confirmado, el sistema creará un nuevo registro"
            if(window.confirm(mensaje)){
                this.enviarFormulario(formulario);
            }
        },
        rellenar(formulario,valor){
            console.log('ENTRANDO');
            axios.post('http://127.0.0.1:8000/api/actualizar-formulario/'+ valor).then(response => {
                console.log('respuesta');
                console.log(this.data);

                console.log(response.data);

                if(response.data.length > 0){
                    this.tecnica = response.data[response.data.length-1].tecnica;

                    const campos_formulario = Object.keys(formulario);
                    for (let i = 0; i < (response.data.length -1); i++) {
                        const valor = response.data[i].Valor;
                        this.formulario[campos_formulario[i]] = valor;
                    }

                    this.mostrar= 'Si';

                }
            })
            .catch(error => {
                console.log(this.$route.params.id_formulario);
                console.log('Error', error);
            });
            console.log(formulario);
            //for(let key in formulario){
            //    formulario[key] = '';
            //}
        },
        editarFormulario(formulario,clonar){
            axios.put('http://127.0.0.1:8000/api/editar-formulario/'+this.respuesta,formulario).then(response => {
                console.log('respuesta');
                console.log(response);
                if(clonar == 'No'){
                    //this.$router.back();
                }
            })
            .catch(error => {
                console.log('Error', error);
            });

            this.$bvToast.toast('Se ha actualizado con exito',{
                    title: "Estimado Usuario",
                    variant: 'success',
                    solid: true,
                    appendToast: true,
                    toaster: 'b-toaster-top-center'
                });
            setTimeout(() =>{
                this.$router.back();
            }, 2000);
        },
        enviarFormulario(formulario){
            axios.post('http://127.0.0.1:8000/api/crear-formulario/'+this.$route.params.RUM+'/'+this.rut_empleado,formulario).then(response => {
                console.log('respuesta');
                console.log(response);
            })
            .catch(error => {
                console.log('Error', error);
            });

            this.$bvToast.toast('Se ha creado un nuevo registro con exito',{
                    title: "Estimado Usuario",
                    variant: 'success',
                    solid: true,
                    appendToast: true,
                    toaster: 'b-toaster-top-center'
                });
            setTimeout(() =>{
                this.$router.back();
            }, 2000);
        },
    }
    
}
</script>


<style scoped>
    .borde{
        border: 1px solid #333;
    }

    .imagenes{
        display: grid;
        grid-template-columns: 33% 33% 33%;
    }

    .ucn img{
        width: 100px;
        height: 100px;
    }

    .lsa img{
        width: 300px;
        height: 100px;
        margin-left: 100px;
    }

    /**    FORMULARIO 2   */

    .grupo1-2{
        display: grid;
        grid-template-columns: 50% 30% 20%;
    }

    .grupo2-2{
        display: grid;
        grid-template-columns: 80% 20%;
    }

    .grupo3-2{
        display:grid;
        grid-template-columns: 100%;
    }
    
    .grupo4-2{
        display:grid;
        grid-template-columns: repeat(6,16.6667%);
    }

    .grupo5-2{
        display: grid;
        grid-template-columns: 100%;
    }
    .grupo55-2{
        display:grid;
        grid-template-columns: repeat(8,12.5%); 
    }
    .grupo6-2{
        display:grid;
        grid-template-columns: repeat(2,50%);
    }

    .grupo7-2{
        display:grid;
        grid-template-columns: 50% 25% 25%;
    }

    .grupo8-2, .grupo9-2, .grupo10-2, .grupo11-2,.grupo12-2, .grupo13-2, .grupo14-2,
    .grupo15-2, .grupo16-2, .grupo17-2, .grupo18-2{
        display:grid;
        grid-template-columns: 140px repeat(5,16.15%) auto;
    }

    .grupo20-2{
        display:grid;
        grid-template-columns: repeat(3,33.33%);
    }

    .grupo20-2 .secciones{
        display:grid;
        grid-template-columns: 100%;
    }


    .grupo61-2{
        display:grid;
        grid-template-columns: 20% 80%;
    }

    .grupo81-2, .grupo91-2{
        display:grid;
        grid-template-columns: 13.16% repeat(6,6.14%) 25% 25%;
    }

    .grupo32-2{
        display:grid;
        grid-template-columns: repeat(3,33.33%); 
    }

    .grupo42-2{
        display:grid;
        grid-template-columns: repeat(2,50%);
    }

    .grupo19{
        display: grid;
        grid-template-columns:  repeat(5,20%);
    }
    .grupo20{
        display:grid;
        grid-template-columns: repeat(3,33.33%);
    }

    .grupo21{
        display:grid;
        grid-template-columns: repeat(3,33.33%);
        margin-top: 2%;
    }
    
</style>