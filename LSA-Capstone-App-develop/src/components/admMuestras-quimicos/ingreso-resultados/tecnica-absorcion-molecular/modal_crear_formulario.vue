<template>
    <div>
    <section class="imagenes" style="width:100%;">

            <div class="ucn">
                <img src="@/assets/ucn.png">
            </div>

            <div class="version">
                <h2 style="text-align:center; font-size:16px">TÉCNICA ABSORCION-MOLECULAR</h2>
                <h3 style="text-align:center; color:rgb(50, 50, 237); font-size: 10px;">18° Versión</h3>
                
            </div>

            <div class="lsa">
                <img src="@/assets/isologo-LSA.png">
            </div>

        </section>


        <section class="grupo1-2">
            <div  class="informe borde">
                <label style="font-weight: bold; font-size: 12px; width: 100%; height:80%">Informe N°: <input v-model="formulario.Numero_Informe" style="width:100%; height: 100%; text-align: center; border: none;" type="text"></label>
            </div>

            <div  class="analisis borde">
                <label style="font-size: 12px; font-weight: bold; width:100%; height:80%">Análisis de: <input v-model="formulario.Analisis_de" style="width:100%; height:100%; text-align: center; border:none;" type="text"></label>
            </div>

            <div class="fechaIF borde">
                <div class="fechaI borde">
                    <label style="font-weight: bold; font-size: 12px; width:100%">Fecha y hora de inicio: 
                        <input v-model="formulario.Fecha_Hora_Inicio" style="width: 63%; text-align: center; border:none; margin-top:5px;" type="datetime-local"> 
                    </label>
                </div>

                <div class="fechaF borde">
                    <label style="font-weight: bold; font-size: 12px; width:100%">Fecha y hora de término: 
                        <input v-model="formulario.Fecha_Hora_Termino" style="width: 60%; text-align: center; border:none; margin-top:5px;" type="datetime-local"> 
                    </label>
                </div>
            </div>

            <div class="metodologia borde">
                    <label style="font-weight: bold; font-size: 12px; width:100%; height:80%">Metodología: <input v-model="formulario.Metodologia" style="text-align: center; border:none; width: 100%; height:100%;" type="text"> </label>
            </div>

            <div  class="TipoM borde">
                <label style="font-weight: bold; font-size: 12px; width:100%;">Tipo de muestra agua: 
                    <input v-model="formulario.Tipo_de_Muestra_Agua" value="Industrial" type="radio" style="transform: scale(0.8);" name="analisis-2"> <span style="font-size: 11px;">Industrial</span>
                    <input v-model="formulario.Tipo_de_Muestra_Agua" value="Mar" type="radio" style="transform: scale(0.8); margin-left:2%;" name="analisis-2"> <span style="font-size: 11px;">Mar</span>
                    <input v-model="formulario.Tipo_de_Muestra_Agua" value="Residual" type="radio" style="transform: scale(0.8);margin-left:2%;" name="analisis-2"> <span style="font-size: 11px;">Residual</span>
                    <input v-model="formulario.Tipo_de_Muestra_Agua" value="Cruda" type="radio" style="transform: scale(0.8);margin-left:2%;" name="analisis-2"> <span style="font-size: 11px;">Cruda</span>
                    <input v-model="formulario.Tipo_de_Muestra_Agua" value="Otro" type="radio" style="transform: scale(0.8);margin-left:2%;" name="analisis-2"> <span style="font-size: 11px;">Otros: <input v-model="formulario.Otro_Tipo_de_Muestra_Agua" style="width:80px" type="text"></span>
                </label>
                
            </div>


        </section>

        <section class="grupo3-2">
            <div class="idmuestra borde">
                <label style="font-weight: bold; width:100%; font-size: 12px">Identificación de la muestra: <input v-model="formulario.Identificacion_Muestra" style="width:85%; text-align:center;" type="number"></label>
            </div>
        </section>


        <section class="grupo4-2">
            <div class="m1 borde">
                <label style="font-size: 12px">M-1 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px">M-3 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px">M-5 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px">M-7 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px">M-9 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px">M-11 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px">M-13 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px">M-15 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>

        </section>


        <section class="grupo55-2">
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%; text-align:left;">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_1" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%; text-align:left;">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_2" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%; text-align:left;">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_3" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%; text-align:left;">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_4" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%; text-align:left;">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_5" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%; text-align:left;">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_6" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%; text-align:left;">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_7" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%; text-align:left;">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_8" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
        </section>


        <section class="grupo4-2">
            <div class="m1 borde">
                <label style="font-size: 12px">M-2 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px">M-4 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px">M-6 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px">M-8 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px">M-10 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px">M-12 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px">M-14 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m1 borde">
                <label style="font-size: 12px">M-16 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
        </section>


        <section class="grupo55-2">
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_9" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_10" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_11" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_12" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_13" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_14" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_15" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
            <label class="borde" style="font-weight: bold; font-size: 10px; width:100%">Fecha y hora de inicio: 
                <input v-model="formulario.Fecha_Hora_Inicio_Muestra_16" style="width: 100%; text-align: center; border:none;" type="datetime-local"> 
            </label>
        </section>

        <section class="grupo61-2">
            <div  class="parte1 borde">
                <label style="font-weight: bold; font-size: 12px; width: 100%;">Longitud de onda (nm): <input v-model="formulario.Longitud_de_Onda" style="width:100%; text-align: center; border: none;" type="text"></label>
            </div>
            <div class="tratamiento borde">
                <label style="font-weight: bold; font-size: 12px; width:100%;">Pretratamiento: 
                    <input v-model="formulario.Tratamiento_Preliminar" value="Destilación" type="radio" style="transform: scale(0.8); margin-left:1%;" name="analisisR-2"> <span style="font-size: 11px;">Destilación</span>
                    <input v-model="formulario.Tratamiento_Preliminar" value="Ajuste pH" type="radio" style="transform: scale(0.8); margin-left:1%;" name="analisisR-2"> <span style="font-size: 11px;">Ajuste pH</span>
                    <input v-model="formulario.Tratamiento_Preliminar" value="Digestión" type="radio" style="transform: scale(0.8);margin-left:1%;" name="analisisR-2"> <span style="font-size: 11px;">Digestión</span>
                    <input v-model="formulario.Tratamiento_Preliminar" value="HCl" type="radio" style="transform: scale(0.8);margin-left:1%;" name="analisisR-2"> <span style="font-size: 11px;">HCL</span>
                    <input v-model="formulario.Tratamiento_Preliminar" value="Filtrado" type="radio" style="transform: scale(0.8);margin-left:1%;" name="analisisR-2"> <span style="font-size: 11px;">Filtrado</span>
                    <input v-model="formulario.Tratamiento_Preliminar" value="Digestión" type="radio" style="transform: scale(0.8);margin-left:1%;" name="analisisR-2"> <span style="font-size: 11px;">T° Digestión.</span>
                    <input v-model="formulario.Tratamiento_Preliminar" value="Otro" type="radio" style="transform: scale(0.8);margin-left:1%;" name="analisisR-2"> <span style="font-size: 11px;">Otro: <input v-model="formulario.Otro_Tratamiento_Preliminar" style="width:80px" type="text"></span>
                    <input v-model="formulario.Tratamiento_Preliminar" value="No Posee pretratamiento" type="radio" style="transform: scale(0.8);margin-left:1%;" name="analisis2-2"> <span style="font-size: 11px;">No posee pretratamiento</span>
                </label>
            </div>
        </section>

        <section class="grupo71-2 borde" style="width:100%" >
            <div class="Control1" style="width:22%">
                <label style="font-weight: bold; font-size: 12px; width:100%;">Control de Calidad: 
                    <input v-model="formulario.Control_de_Calidad" value="mg/L" type="radio" style="transform: scale(0.8); margin-left:1%;" name="Control11-2"> <span style="font-size: 11px;">mg/L</span>
                    <input v-model="formulario.Control_de_Calidad" value="μg/L" type="radio" style="transform: scale(0.8); margin-left:1%;" name="Control11-2"> <span style="font-size: 11px;">μg/L</span>
                </label>
            </div>
        </section>

        <section class="grupo81-2">
            <div class="curvaCalibracion borde"><label style="font-weight: bold; font-size:12px; margin-top:5%;">Curva de Calibración</label></div>
            <div class="St1 borde"><label style="font-weight: bold; font-size:12px">St.1 <input style="width:100%; border:none; text-align:center;" type="text"></label></div>
            <div class="St2 borde"><label style="font-weight: bold; font-size:12px">St.2 <input style="width:100%; border:none; text-align:center;" type="text"></label></div>
            <div class="St3 borde"><label style="font-weight: bold; font-size:12px">St.3 <input style="width:100%; border:none; text-align:center;" type="text"></label></div>
            <div class="St4 borde"><label style="font-weight: bold; font-size:12px">St.4 <input style="width:100%; border:none; text-align:center;" type="text"></label></div>
            <div class="St5 borde"><label style="font-weight: bold; font-size:12px">St.5 <input style="width:100%; border:none; text-align:center;" type="text"></label></div>
            <div class="St6 borde"><label style="font-weight: bold; font-size:12px">St.6 <input style="width:100%; border:none; text-align:center;" type="text"></label></div>
            <div class="Coef borde"><label style="font-weight: bold; font-size:12px; width:100%; height:100%; text-align:left; margin-left:2%;">Coef. correlación <input style="width:70%; border:none; text-align:center;" type="text"></label></div>
            <div class="RSD borde"><label style="font-weight: bold; font-size:12px; width:100%; text-align:left; margin-left:2%">%RSD: <input v-model="formulario.RSD_Curva_Calibracion" type="number" style="width:85%; border:none; text-align: center;"></label></div>
        </section>


        <section class="grupo91-2">
            <div class="absorbancia borde"><label style="font-weight: bold; font-size:12px;">Absorbancia</label></div>
            <div class="St1 borde"><label style="font-weight: bold; font-size:12px; width:100%; height:100%">
                <input v-model="formulario.Absorbancia_St_1" style="width:100%; height:100%" type="number">
            </label></div>
            <div class="St1 borde"><label style="font-weight: bold; font-size:12px; width:100%; height:100%">
                <input v-model="formulario.Absorbancia_St_2" style="width:100%; height:100%" type="number">
            </label></div>
            <div class="St1 borde"><label style="font-weight: bold; font-size:12px; width:100%; height:100%">
                <input v-model="formulario.Absorbancia_St_3" style="width:100%; height:100%" type="number">
            </label></div>
            <div class="St1 borde"><label style="font-weight: bold; font-size:12px; width:100%; height:100%">
                <input v-model="formulario.Absorbancia_St_4" style="width:100%; height:100%" type="number">
            </label></div>
            <div class="St1 borde"><label style="font-weight: bold; font-size:12px; width:100%; height:100%">
                <input v-model="formulario.Absorbancia_St_5" style="width:100%; height:100%" type="number">
            </label></div>
            <div class="St1 borde"><label style="font-weight: bold; font-size:12px; width:100%; height:100%">
                <input v-model="formulario.Absorbancia_St_6" style="width:100%; height:100%" type="number">
            </label></div>
            <div class="Coef borde"><label style="font-weight: bold; font-size:12px; width:100%; height:100%; text-align:left; margin-left:2%;">Pendiente: <input v-model="formulario.Pendiente" type="text" style="width:80%; border:none;"></label></div>
            <div class="RSD borde"><label style="font-weight: bold; font-size:12px; width:100%; text-align:left; margin-left:2%">Factor de cálculo (si procede): <input v-model="formulario.Factor_de_Calculo" type="number" style="width:50%; border:none; text-align: center;"></label></div>
        </section>


        <section class="grupo101-2 borde">
            <div class="Control1" style="width:30%">
                <label style="font-weight: bold; font-size: 12px; width:100%;">Valores informados en: 
                    <input v-model="formulario.Valores_Informados" value="mg/L" type="radio" style="transform: scale(0.8); margin-left:1%;" name="Control-2"> <span style="font-size: 11px;">mg/L</span>
                    <input v-model="formulario.Valores_Informados" value="μg/L" type="radio" style="transform: scale(0.8); margin-left:1%;" name="Control-2"> <span style="font-size: 11px;">μg/L</span>
                    <input v-model="formulario.Valores_Informados" value="mg/Kg" type="radio" style="transform: scale(0.8); margin-left:1%;" name="Control-2"> <span style="font-size: 11px;">mg/Kg</span>
                    <input v-model="formulario.Valores_Informados" value="%" type="radio" style="transform: scale(0.8); margin-left:1%;" name="Control-2"> <span style="font-size: 11px;">%</span>
                    <input v-model="formulario.Valores_Informados" value="g/L" type="radio" style="transform: scale(0.8); margin-left:1%;" name="Control-2"> <span style="font-size: 11px;">g/L</span>
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
            <div  class="m7 borde">
                <label style="font-size: 12px; font-weight: bold;">M-7</label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; font-weight: bold;">M-8</label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; font-weight: bold;">M-9</label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; font-weight: bold;">M-10</label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; font-weight: bold;">M-11</label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; font-weight: bold;">M-12</label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; font-weight: bold;">M-13</label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; font-weight: bold;">M-14</label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; font-weight: bold;">M-15</label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; font-weight: bold;">M-16</label>
            </div>
        </section>

        <section class="grupo9-2">
            <div class="pj borde">
                <label style="font-size: 12px">Masa (g)</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_11" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_12" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_13" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_14" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_15" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Masa_Muestra_16" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo10-2">
            <div class="pj borde">
                <label style="font-size: 12px">Aforo (ml)</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_11" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_12" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_13" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_14" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_15" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Aforo_Muestra_16" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo11-2">
            <div class="pj borde">
                <label style="font-size: 12px">Alicuota (ml)</label>
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
            <div  class="m3 borde">
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
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_11" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_12" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_13" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_14" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_15" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_16" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo12-2">
            <div class="pj borde">
                <label style="font-size: 12px">pH / T°C</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra10" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra11" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra12" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra13" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra14" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra15" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.pH_Temperatura_Muestra16" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo13-2">
            <div class="borde">
                <label style="font-weight: bold; font-size: 12px; width:100%; height:90%; margin-top:5%;">
                    <input v-model="formulario.Fd_Fc" value="Fd" type="radio" style="transform: scale(0.8);" name="analisis-2"> <span style="font-size: 11px;">Fd</span>
                    <input v-model="formulario.Fd_Fc" value="Fc" type="radio" style="transform: scale(0.8); margin-left:2%;" name="analisis-2"> <span style="font-size: 11px;">Fc</span>
                </label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_11" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_12" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_13" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_14" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_15" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Fd_Fc_Muestra_16" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo14-2">
            <div class="pj borde">
                <label style="font-size: 12px">Absorbancia</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_11" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_12" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_13" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_14" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_15" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Absorbancia_Muestra_16" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo15-2">
            <div class="borde">
                <label style="font-weight: bold; font-size: 12px; width:100%; height:90%; margin-top:5%;">Conc: 
                    <input v-model="formulario.Concentracion" value="mg/L" type="radio" style="transform: scale(0.8);" name="analisis-2"> <span style="font-size: 11px;">mg/L</span>
                    <input v-model="formulario.Concentracion" value="µg/L" type="radio" style="transform: scale(0.8); margin-left:2%;" name="analisis-2"> <span style="font-size: 11px;">µg/L</span>
                </label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_11" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_12" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_13" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_14" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_15" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Concentracion_Muestra_16" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo16-2">
            <div class="pj borde">
                <label style="font-size: 12px">Resultado Final</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
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
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_11" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_12" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_13" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_14" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_15" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Final_Muestra_16" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>


        <section class="grupo17-2">
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
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_11" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_12" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_13" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_14" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_15" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Promedio_Muestra_16" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo18-2">
            <div  class="pj borde">
                <label style="font-size: 12px">Expresado como</label>
            </div>

            <div class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_11" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_12" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_13" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_14" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_15" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Expresado_Como_Muestra_16" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>
        <section class="grupo18-2">
            <div  class="pj borde">
                <label style="font-size: 12px">%RSD</label>
            </div>

            <div class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m3 borde">
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
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_11" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_12" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_13" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_14" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_15" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_16" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>
        <section class="grupo18-2">
            <div  class="pj borde">
                <label style="font-size: 12px">%Recuperación</label>
            </div>

            <div class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m3 borde">
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
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_11" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_12" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_13" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_14" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_15" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_16" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="informacion1" style="text-align: left;">
            <label style="text-align: left; font-size: 10px; font-weight: bold">Nota: La masa final M-2 de la muestra corresponde al resultado de peso constante cuya diferencia es 
                &lt; 0,5 mg, con respecto a la masa final M-1, Diferencia entre duplicados ≤ al 10% </label>
            <label style="text-align: left; font-size: 10px; font-weight: bold">-Fd: Factor de dilución, Fc: Factor de concentración</label>
            <label style="text-align: left; font-size: 10px; font-weight: bold">-Rango %Recuperación entre 90 a 110%</label>
            <label style="text-align: left; font-size: 10px; font-weight: bold">-T° Obs: Temperatura observada, T° Corr: Temperatura corregida aplicando el factor de corrección</label>
        
        
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
            <p style="color: blue; font-size: 10px">PT-6F-12 (19°versión) <br> 25-08-2021</p>

            <p style="color: blue; font-size: 10px">Página 1</p>

            <p style="color: blue; font-size: 10px">Laboratorio de Servicios Analiticos <br> Avda. Angamos 0610, Pabellón Ñ-1 2° piso * Antofagasta <br>
            Fono 552355613 - 552355633 <br> LSA@UCN.CL, ADM.LSA@UCN.CL</p>
        </section>

        <button @click="confirmarEnvio(formulario,'No')">Guardar</button>
        <button @click="confirmarEnvio(formulario,'Si')">Duplicar</button>
       

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
            rut_empleado: '',
            formulario:{          
                Numero_Informe: '',
                Analisis_de: '',
                Fecha_Hora_Inicio: '',
                Fecha_Hora_Termino: '',
                Metodologia: '',
                Tipo_de_Muestra_Agua: '',
                Otro_Tipo_de_Muestra_Agua: '',
                Identificacion_Muestra: '',

                Fecha_Hora_Inicio_Muestra_1: '',
                Fecha_Hora_Inicio_Muestra_2: '',
                Fecha_Hora_Inicio_Muestra_3: '',
                Fecha_Hora_Inicio_Muestra_4: '',
                Fecha_Hora_Inicio_Muestra_5: '',
                Fecha_Hora_Inicio_Muestra_6: '',
                Fecha_Hora_Inicio_Muestra_7: '',
                Fecha_Hora_Inicio_Muestra_8: '',
                Fecha_Hora_Inicio_Muestra_9: '',
                Fecha_Hora_Inicio_Muestra_10: '',
                Fecha_Hora_Inicio_Muestra_11: '',
                Fecha_Hora_Inicio_Muestra_12: '',
                Fecha_Hora_Inicio_Muestra_13: '',
                Fecha_Hora_Inicio_Muestra_14: '',
                Fecha_Hora_Inicio_Muestra_15: '',
                Fecha_Hora_Inicio_Muestra_16: '',

                Longitud_de_Onda: '',
                Tratamiento_Preliminar: '',
                Otro_Tratamiento_Preliminar: '',
                Control_de_Calidad: '',

                CoeficienteCorrelacion: '',
                RSD_Curva_Calibracion: '',

                Pendiente: '',
                Factor_de_Calculo: '',

                Valores_Informados: '',

                Masa_Muestra_1:'',
                Masa_Muestra_2:'',
                Masa_Muestra_3:'',
                Masa_Muestra_4:'',
                Masa_Muestra_5:'',
                Masa_Muestra_6:'',
                Masa_Muestra_7:'',
                Masa_Muestra_8:'',
                Masa_Muestra_9:'',
                Masa_Muestra_10:'',
                Masa_Muestra_11:'',
                Masa_Muestra_12:'',
                Masa_Muestra_13:'',
                Masa_Muestra_14:'',
                Masa_Muestra_15:'',
                Masa_Muestra_16:'',

                Aforo_Muestra_1: '',
                Aforo_Muestra_2: '',
                Aforo_Muestra_3: '',
                Aforo_Muestra_4: '',
                Aforo_Muestra_5: '',
                Aforo_Muestra_6: '',
                Aforo_Muestra_7: '',
                Aforo_Muestra_8: '',
                Aforo_Muestra_9: '',
                Aforo_Muestra_10: '',
                Aforo_Muestra_11: '',
                Aforo_Muestra_12: '',
                Aforo_Muestra_13: '',
                Aforo_Muestra_14: '',
                Aforo_Muestra_15: '',
                Aforo_Muestra_16: '',

                Alicuota_Muestra_1: '',
                Alicuota_Muestra_2: '',
                Alicuota_Muestra_3: '',
                Alicuota_Muestra_4: '',
                Alicuota_Muestra_5: '',
                Alicuota_Muestra_6: '',
                Alicuota_Muestra_7: '',
                Alicuota_Muestra_8: '',
                Alicuota_Muestra_9: '',
                Alicuota_Muestra_10: '',
                Alicuota_Muestra_11: '',
                Alicuota_Muestra_12: '',
                Alicuota_Muestra_13: '',
                Alicuota_Muestra_14: '',
                Alicuota_Muestra_15: '',
                Alicuota_Muestra_16: '',

                pH_Temperatura_Muestra1: '',
                pH_Temperatura_Muestra2: '',
                pH_Temperatura_Muestra3: '',
                pH_Temperatura_Muestra4: '',
                pH_Temperatura_Muestra5: '',
                pH_Temperatura_Muestra6: '',
                pH_Temperatura_Muestra7: '',
                pH_Temperatura_Muestra8: '',
                pH_Temperatura_Muestra9: '',
                pH_Temperatura_Muestra10: '',
                pH_Temperatura_Muestra11: '',
                pH_Temperatura_Muestra12: '',
                pH_Temperatura_Muestra13: '',
                pH_Temperatura_Muestra14: '',
                pH_Temperatura_Muestra15: '',
                pH_Temperatura_Muestra16: '',

                Fd_Fc: '',
                
                Fd_Fc_Muestra_1: '',
                Fd_Fc_Muestra_2: '',
                Fd_Fc_Muestra_3: '',
                Fd_Fc_Muestra_4: '',
                Fd_Fc_Muestra_5: '',
                Fd_Fc_Muestra_6: '',
                Fd_Fc_Muestra_7: '',
                Fd_Fc_Muestra_8: '',
                Fd_Fc_Muestra_9: '',
                Fd_Fc_Muestra_10: '',
                Fd_Fc_Muestra_11: '',
                Fd_Fc_Muestra_12: '',
                Fd_Fc_Muestra_13: '',
                Fd_Fc_Muestra_14: '',
                Fd_Fc_Muestra_15: '',
                Fd_Fc_Muestra_16: '',

                AbsorbanciaM1: '',
                AbsorbanciaM2: '',
                AbsorbanciaM3: '',
                AbsorbanciaM4: '',
                AbsorbanciaM5: '',
                AbsorbanciaM6: '',
                AbsorbanciaM7: '',
                AbsorbanciaM8: '',
                AbsorbanciaM9: '',
                AbsorbanciaM10: '',
                AbsorbanciaM11: '',
                AbsorbanciaM12: '',
                AbsorbanciaM13: '',
                AbsorbanciaM14: '',
                AbsorbanciaM15: '',
                AbsorbanciaM16: '',

                Absorbancia_St_1: '',
                Absorbancia_St_2: '',
                Absorbancia_St_3: '',
                Absorbancia_St_4: '',
                Absorbancia_St_5: '',
                Absorbancia_St_6: '',

                Concentracion: '',

                Concentracion_Muestra_1: '',
                Concentracion_Muestra_2: '',
                Concentracion_Muestra_3: '',
                Concentracion_Muestra_4: '',
                Concentracion_Muestra_5: '',
                Concentracion_Muestra_6: '',
                Concentracion_Muestra_7: '',
                Concentracion_Muestra_8: '',
                Concentracion_Muestra_9: '',
                Concentracion_Muestra_10: '',
                Concentracion_Muestra_11: '',
                Concentracion_Muestra_12: '',
                Concentracion_Muestra_13: '',
                Concentracion_Muestra_14: '',
                Concentracion_Muestra_15: '',
                Concentracion_Muestra_16: '',

                Resultado_Final_Muestra_1: '',
                Resultado_Final_Muestra_2: '',
                Resultado_Final_Muestra_3: '',
                Resultado_Final_Muestra_4: '',
                Resultado_Final_Muestra_5: '',
                Resultado_Final_Muestra_6: '',
                Resultado_Final_Muestra_7: '',
                Resultado_Final_Muestra_8: '',
                Resultado_Final_Muestra_9: '',
                Resultado_Final_Muestra_10: '',
                Resultado_Final_Muestra_11: '',
                Resultado_Final_Muestra_12: '',
                Resultado_Final_Muestra_13: '',
                Resultado_Final_Muestra_14: '',
                Resultado_Final_Muestra_15: '',
                Resultado_Final_Muestra_16: '',

                Promedio_Muestra_1: '',
                Promedio_Muestra_2: '',
                Promedio_Muestra_3: '',
                Promedio_Muestra_4: '',
                Promedio_Muestra_5: '',
                Promedio_Muestra_6: '',
                Promedio_Muestra_7: '',
                Promedio_Muestra_8: '',
                Promedio_Muestra_9: '',
                Promedio_Muestra_10: '',
                Promedio_Muestra_11: '',
                Promedio_Muestra_12: '',
                Promedio_Muestra_13: '',
                Promedio_Muestra_14: '',
                Promedio_Muestra_15: '',
                Promedio_Muestra_16: '',

                Expresado_Como_Muestra_1: '',
                Expresado_Como_Muestra_2: '',
                Expresado_Como_Muestra_3: '',
                Expresado_Como_Muestra_4: '',
                Expresado_Como_Muestra_5: '',
                Expresado_Como_Muestra_6: '',
                Expresado_Como_Muestra_7: '',
                Expresado_Como_Muestra_8: '',
                Expresado_Como_Muestra_9: '',
                Expresado_Como_Muestra_10: '',
                Expresado_Como_Muestra_11: '',
                Expresado_Como_Muestra_12: '',
                Expresado_Como_Muestra_13: '',
                Expresado_Como_Muestra_14: '',
                Expresado_Como_Muestra_15: '',
                Expresado_Como_Muestra_16: '',

                RSD_Muestra_1: '',
                RSD_Muestra_2: '',
                RSD_Muestra_3: '',
                RSD_Muestra_4: '',
                RSD_Muestra_5: '',
                RSD_Muestra_6: '',
                RSD_Muestra_7: '',
                RSD_Muestra_8: '',
                RSD_Muestra_9: '',
                RSD_Muestra_10: '',
                RSD_Muestra_11: '',
                RSD_Muestra_12: '',
                RSD_Muestra_13: '',
                RSD_Muestra_14: '',
                RSD_Muestra_15: '',
                RSD_Muestra_16: '',

                Recuperacion_Muestra_1: '',
                Recuperacion_Muestra_2: '',
                Recuperacion_Muestra_3: '',
                Recuperacion_Muestra_4: '',
                Recuperacion_Muestra_5: '',
                Recuperacion_Muestra_6: '',
                Recuperacion_Muestra_7: '',
                Recuperacion_Muestra_8: '',
                Recuperacion_Muestra_9: '',
                Recuperacion_Muestra_10: '',
                Recuperacion_Muestra_11: '',
                Recuperacion_Muestra_12: '',
                Recuperacion_Muestra_13: '',
                Recuperacion_Muestra_14: '',
                Recuperacion_Muestra_15: '',
                Recuperacion_Muestra_16: '',

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
    },
    mounted(){
        this.retornarDatoUsuario();
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

        confirmarEnvio(formulario,respuesta){
            if(respuesta == 'No'){
                const mensaje = "¿Estás seguro de que quieres realizar está acción?\n\n" +
                                "Una vez confirmado, el sistema creará un nuevo registro y volveras a la página anterior"
                if(window.confirm(mensaje)){
                    this.enviarFormulario(formulario,'No');
                    console.log("Se ha confirmado la acción");
                }
            }
            else{
                const mensaje = "¿Estás seguro de que quieres realizar está acción?\n\n" + 
                            "Una vez confirmado, el sistema creará un nuevo registro, permaneciendo en la página actual."
                if(window.confirm(mensaje)){
                    this.enviarFormulario(formulario,'Si');
                    console.log("Se ha confirmado la acción");
                }
            }
            

        },

        enviarFormulario(formulario,clonar){
            axios.post('http://127.0.0.1:8000/api/crear-formulario/'+this.data+'/'+this.rut_empleado,formulario).then(response => {
                console.log('respuesta');
                console.log(response);
                if(clonar=='No'){
                    this.$bvToast.toast('Se ha guardado con exito',{
                        title: "Estimado Usuario",
                        variant: 'success',
                        solid: true,
                        appendToast: true,
                        toaster: 'b-toaster-top-center'
                        });
                    setTimeout(() =>{
                        this.$router.back();
                    }, 2000);
                }
                else{
                    this.$bvToast.toast('Se ha guardado con exito, puedes seguir generando nuevos registros',{
                        title: "Estimado Usuario",
                        variant: 'success',
                        solid: true,
                        appendToast: true,
                        toaster: 'b-toaster-top-center'
                    });
                }
            })
            .catch(error => {
                console.log('Error', error);
            });
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
        grid-template-columns: repeat(5,20%);
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
        grid-template-columns: repeat(8,12.5%);
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
        grid-template-columns: 140px repeat(15,5.8%) auto;
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
    .informacion1{
        display: grid;
        grid-template-columns: 100%;
    }
    
</style>