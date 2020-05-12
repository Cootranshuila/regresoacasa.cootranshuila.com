@extends('layouts.app')
@section('add-links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row row-height">
        <div class="col-xl-4 col-lg-4 content-left">
            <div class="content-left-wrapper">
                <a href="/" id="logo"><img src="{{ asset('assets/img/logo2.png') }}" alt="" width="160"></a>
                <!-- /social -->
                <div>
                    <figure><img src="{{ asset('assets/img/info_graphic_1.svg') }}" alt="" class="img-fluid" width="270" height="270"></figure>
                    <h2>Formulario para programación de viaje durante aislamiento preventivo obligatorio</h2><br>
                    <p>Registra tus datos y te indicaremos las instrucciones y los requisitos para tu VIAJE.</p>
                </div>
                <div class="copy">© 2020 Cootranshuila.</div>
            </div>
            <!-- /content-left-wrapper -->
        </div>
        <!-- /content-left -->
        <div class="col-xl-8 col-lg-8 content-right" id="start">
            <div id="wizard_container">
                <div id="top-wizard">
                    <span id="location"></span>
                    <div id="progressbar"></div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-center">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (isset($_GET['success']))
                    
                    <div class="summary">
                        <div class="wrapper" style="padding: 60px 8px !important;">
                            <h3>Gracias por confiar en nosotros</h3>
                            <p>{{ $_GET['success'] }}</p>
                            <p>Por favor revise la bandeja de entrada de su correo electronico.</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="form-group">
                                <a href="https://www.cootranshuila.com/" class="btn_1">Aceptar</a>
                            </div>
                        </div>
                    </div>

                @elseif(isset($_GET['error']))
                    
                    <div class="summary">
                        <div class="wrapper" style="padding: 60px 8px !important;">
                            <h3>Gracias por confiar en nosotros</h3>
                            <p>{{ $_GET['error'] }}</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="form-group">
                                <a href="/registrar" class="btn_1">Volver a intentarlo</a>
                            </div>
                        </div>
                    </div>

                @else
                    
                    <!-- /top-wizard -->
                    <form id="wrapped" method="post" enctype="multipart/form-data">
                        @csrf

                        <input id="website" name="website" type="text" value="">
                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">
                            <div class="step">
                                <h2 class="section_title">Crear Usuario</h2>
                                <h3 class="main_question">Informacion Personal</h3>
                                <div class="form-group add_top_30">
                                    <label for="name">Nombre Completo</label>
                                    <input type="text" name="name" id="name" class="form-control required" onchange="getVals(this, 'name_field');">
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo Electronico</label>
                                    <input type="email" name="email" id="email" class="form-control required" onchange="getVals(this, 'email_field');">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" id="password" class="form-control required">
                                </div>
                            </div>
                            <!-- /step-->

                            <!-- /Start Branch ============================== -->
                            <div class="step">
                                <h2 class="section_title">Informacion Personal</h2>
                                <h3 class="main_question">Informacion para programar el viaje</h3>

                                <h6 class="main_question">Tipo de excepción (Excepciones definidas en el Decreto 593 Art. 3 y Resolución 498) </h6>
                                <div class="styled-select">
                                    <select class="text-justify required" id="tipo_excepcion" style="width:100%; height:38px;" name="tipo_excepcion">
                                        <option value="">Seleccione tipo de excepción</option>
                                        <option value="1. Asistencia y prestación de servicios de salud.">1. Asistencia y prestación de servicios de salud.</option>
                                        <option value="2. Adquisición de bienes de primera necesidad -alimentos,bebidas, medicamentos, dispositivos médicos, aseo, limpieza, y mercancías de ordinario consumo en la población.">2. Adquisición de bienes de primera necesidad -alimentos,bebidas, medicamentos, dispositivos médicos, aseo, limpieza, y mercancías de ordinario consumo en la población.</option>
                                        <option value="3. Desplazamiento a servicios bancarios, financieros y de operadores de pago, casas de cambio, operaciones de juegosde suerte y azar en la modalidad de novedosos y territoriales de apuestas permanentes, chance y lotería, y a servicios notariales y de registro de instrumentos públicos.">3. Desplazamiento a servicios bancarios, financieros y de operadores de pago, casas de cambio, operaciones de juegosde suerte y azar en la modalidad de novedosos y territoriales de apuestas permanentes, chance y lotería, y a servicios notariales y de registro de instrumentos públicos.</option>
                                        <option value="4. Asistencia y cuidado a niños, niñas, adolescentes, personas mayores de 70 años, personas con discapacidad y enfermos con tratamientos especiales que requieren asistencia de personal capacitado.">4. Asistencia y cuidado a niños, niñas, adolescentes, personas mayores de 70 años, personas con discapacidad y enfermos con tratamientos especiales que requieren asistencia de personal capacitado.</option>
                                        <option value="5. Por causa de fuerza mayor o caso fortuito.">5. Por causa de fuerza mayor o caso fortuito.</option>
                                        <option value="6. Las labores de las misiones médicas de la Organización Panamericana de la Salud -OPS¬ y de todos los organismos internacionales humanitarios y de salud, la prestación de los servicios profesionales, administrativos, operativos y técnicosde salud públicos y privados.">6. Las labores de las misiones médicas de la Organización Panamericana de la Salud -OPS¬ y de todos los organismos internacionales humanitarios y de salud, la prestación de los servicios profesionales, administrativos, operativos y técnicosde salud públicos y privados.</option>
                                        <option value="7. La cadena de producción, abastecimiento, almacenamiento, transporte, comercialización y distribución de medicamentos, productos farmacéuticos, insumos, productos de limpieza, desinfección y aseo personal para hogares y hospitales,equipos y dispositivos de tecnologías en salud, al igual que el mantenimiento y soporte para garantizar la continua prestación de los servicios de salud. El funcionamiento de establecimientos y locales comerciales para la comercialización de los medicamentos, productos farmacéuticos, insumos, equipos y dispositivos de tecnologías en salud.">7. La cadena de producción, abastecimiento, almacenamiento, transporte, comercialización y distribución de medicamentos, productos farmacéuticos, insumos, productos de limpieza, desinfección y aseo personal para hogares y hospitales,equipos y dispositivos de tecnologías en salud, al igual que el mantenimiento y soporte para garantizar la continua prestación de los servicios de salud. El funcionamiento de establecimientos y locales comerciales para la comercialización de los medicamentos, productos farmacéuticos, insumos, equipos y dispositivos de tecnologías en salud.</option>
                                        <option value="8. Las actividades relacionadas con servicios de emergencia, incluidas las emergencias veterinarias.">8. Las actividades relacionadas con servicios de emergencia, incluidas las emergencias veterinarias.</option>
                                        <option value="9. Los servicios funerarios, entierros y cremaciones.">9. Los servicios funerarios, entierros y cremaciones.</option>
                                        <option value="10. La cadena de producción, abastecimiento, almacenamiento, transporte, comercialización y distribución de: (i) insumos paraproducir bienes de primera necesidad; (ii) bienes de primera necesidad -alimentos, bebidas, medicamentos, dispositivos médicos, aseo, limpieza, y mercancías de ordinario consumo en la población-, (iii) reactivos de laboratorio, y (iv) alimentos ymedicinas para mascotas, y demás elementos y bienesnecesarios para atender la emergencia sanitaria, así como la cadena de insumos relacionados con la producción de estosbienes.">10. La cadena de producción, abastecimiento, almacenamiento, transporte, comercialización y distribución de: (i) insumos paraproducir bienes de primera necesidad; (ii) bienes de primera necesidad -alimentos, bebidas, medicamentos, dispositivos médicos, aseo, limpieza, y mercancías de ordinario consumo en la población-, (iii) reactivos de laboratorio, y (iv) alimentos ymedicinas para mascotas, y demás elementos y bienesnecesarios para atender la emergencia sanitaria, así como la cadena de insumos relacionados con la producción de estosbienes.</option>
                                        <option value="11. La cadena de siembra, fumigación, cosecha, producción, empaque, embalaje, importación, exportación, transporte,almacenamiento, distribución y comercialización de: semillas, insumos y productos agrícolas, piscícolas, pecuarios y agroquímicos -fertilizantes, plaguicidas, fungicidas, herbicidas, y alimentos para animales, mantenimiento de la sanidad animal, el funcionamiento de centros de procesamiento primario y secundario de alimentos, la operación de la infraestructura de comercialización, riego mayor y menor para el abastecimiento de agua poblacional y agrícola, y la asistencia técnica. Se garantizará la logística y el transporte de las anteriores actividades.">11. La cadena de siembra, fumigación, cosecha, producción, empaque, embalaje, importación, exportación, transporte,almacenamiento, distribución y comercialización de: semillas, insumos y productos agrícolas, piscícolas, pecuarios y agroquímicos -fertilizantes, plaguicidas, fungicidas, herbicidas, y alimentos para animales, mantenimiento de la sanidad animal, el funcionamiento de centros de procesamiento primario y secundario de alimentos, la operación de la infraestructura de comercialización, riego mayor y menor para el abastecimiento de agua poblacional y agrícola, y la asistencia técnica. Se garantizará la logística y el transporte de las anteriores actividades.</option>
                                        <option value="12. La comercialización presencial de productos de primeranecesidad se hará en mercados, abastos, bodegas, mercados, supermercados mayoristas y minoristas y mercados al detal en establecimientos y locales comerciales a nivel nacional, y podrán comercializar sus productos mediante plataformas decomercio electrónico y/o para entrega a domicilio.">12. La comercialización presencial de productos de primeranecesidad se hará en mercados, abastos, bodegas, mercados, supermercados mayoristas y minoristas y mercados al detal en establecimientos y locales comerciales a nivel nacional, y podrán comercializar sus productos mediante plataformas decomercio electrónico y/o para entrega a domicilio.</option>
                                        <option value="13. Las actividades de los servidores públicos y contratistas del Estado que sean estrictamente necesarias para prevenir, mitigar y atender la emergencia sanitaria por causa del coronavirus covid-19, y garantizar el funcionamiento de los servicios indispensables del Estado.">13. Las actividades de los servidores públicos y contratistas del Estado que sean estrictamente necesarias para prevenir, mitigar y atender la emergencia sanitaria por causa del coronavirus covid-19, y garantizar el funcionamiento de los servicios indispensables del Estado.</option>
                                        <option value="14. Las actividades del personal de las misiones diplomáticas y consulares debidamente acreditas ante el Estado colombiano, estrictamente necesarias para prevenir, mitigar y atender la emergencia sanitaria por causa del coronavirus covid-19.">14. Las actividades del personal de las misiones diplomáticas y consulares debidamente acreditas ante el Estado colombiano, estrictamente necesarias para prevenir, mitigar y atender la emergencia sanitaria por causa del coronavirus covid-19.</option>
                                        <option value="15. Las actividades de las Fuerzas Militares, la Policía Nacional y organismos de seguridad del Estado, así como de la industria militar y de defensa.">15. Las actividades de las Fuerzas Militares, la Policía Nacional y organismos de seguridad del Estado, así como de la industria militar y de defensa.</option>
                                        <option value="16. Las actividades de los puertos de servicio público y privado, exclusivamente para el transporte de carga.">16. Las actividades de los puertos de servicio público y privado, exclusivamente para el transporte de carga.</option>
                                        <option value="17. Las actividades de dragado marítimo y fluvial.">17. Las actividades de dragado marítimo y fluvial.</option>
                                        <option value="18. La ejecución de obras de infraestructura de transporte y obrapública, así como la cadena de suministros de materiales e insumos relacionados con la ejecución de las mismas.">18. La ejecución de obras de infraestructura de transporte y obrapública, así como la cadena de suministros de materiales e insumos relacionados con la ejecución de las mismas.</option>
                                        <option value="19. La ejecución de obras de construcción de edificaciones y actividades de garantía legal sobre la misma construcción, así como el suministro de materiales e insumos exclusivamente destinados a la ejecución de las mismas.">19. La ejecución de obras de construcción de edificaciones y actividades de garantía legal sobre la misma construcción, así como el suministro de materiales e insumos exclusivamente destinados a la ejecución de las mismas.</option>
                                        <option value="20. La intervención de obras civiles y de construcción, las cuales, por su estado de avance de obra o de sus características, presenten riesgos de estabilidad técnica, amenaza de colapso o requieran acciones de reforzamiento estructural.">20. La intervención de obras civiles y de construcción, las cuales, por su estado de avance de obra o de sus características, presenten riesgos de estabilidad técnica, amenaza de colapso o requieran acciones de reforzamiento estructural.</option>
                                        <option value="21. La construcción de infraestructura de salud estrictamentenecesaria para prevenir, mitigar y atender la emergencia sanitaria par causa del Coronavirus covid-19.">21. La construcción de infraestructura de salud estrictamentenecesaria para prevenir, mitigar y atender la emergencia sanitaria par causa del Coronavirus covid-19.</option>
                                        <option value="22. La operación aérea y aeroportuaria de conformidad con loestablecido en el artículo 6 del presente decreto, y su respectivo mantenimiento.">22. La operación aérea y aeroportuaria de conformidad con loestablecido en el artículo 6 del presente decreto, y su respectivo mantenimiento.</option>
                                        <option value="23. La comercialización de los productos de los establecimientos y locales gastronómicos mediante plataformas de comercioelectrónico o por entrega a domicilio. Los restaurantes ubicados dentro de las instalaciones hoteleras solo podrán prestar servicios a sus huéspedes.">23. La comercialización de los productos de los establecimientos y locales gastronómicos mediante plataformas de comercioelectrónico o por entrega a domicilio. Los restaurantes ubicados dentro de las instalaciones hoteleras solo podrán prestar servicios a sus huéspedes.</option>
                                        <option value="24. Las actividades de la industria hotelera para atender a sus huéspedes, estrictamente necesarias para prevenir, mitigar y atender la emergencia sanitaria por causa del Coronaviruscovid-19.">24. Las actividades de la industria hotelera para atender a sus huéspedes, estrictamente necesarias para prevenir, mitigar y atender la emergencia sanitaria por causa del Coronaviruscovid-19.</option>
                                        <option value="25. El funcionamiento de la infraestructura crítica -computadores,sistemas computacionales, redes de comunicaciones, datos e información, cuya destrucción o interferencia puede debilitar o impactar en la seguridad de la economía, salud pública o la combinación de ellas.">25. El funcionamiento de la infraestructura crítica -computadores,sistemas computacionales, redes de comunicaciones, datos e información, cuya destrucción o interferencia puede debilitar o impactar en la seguridad de la economía, salud pública o la combinación de ellas.</option>
                                        <option value="26. El funcionamiento y operación de los centros de llamadas, los centros de contactos, los centros de soporte técnico y loscentros de procesamiento de datos que presten servicios en el territorio nacional y de las plataformas de comercio electrónico.">26. El funcionamiento y operación de los centros de llamadas, los centros de contactos, los centros de soporte técnico y loscentros de procesamiento de datos que presten servicios en el territorio nacional y de las plataformas de comercio electrónico.</option>
                                        <option value="27. El funcionamiento de la prestación de los servicios de vigilancia y seguridad privada, los servicios carcelarios y penitenciarios yde empresas que prestan el servicio de limpieza y aseo en edificaciones públicas, zonas comunes de edificaciones y las edificaciones en las que se desarrollen las actividades de quetrata el presente artículo.">27. El funcionamiento de la prestación de los servicios de vigilancia y seguridad privada, los servicios carcelarios y penitenciarios yde empresas que prestan el servicio de limpieza y aseo en edificaciones públicas, zonas comunes de edificaciones y las edificaciones en las que se desarrollen las actividades de quetrata el presente artículo.</option>
                                        <option value="28. Las actividades necesarias para garantizar la operación,mantenimiento, almacenamiento y abastecimiento de la prestación de: (i) servicios públicos de acueducto, alcantarillado, energía eléctrica, alumbrado público, aseo recolección, transporte, aprovechamiento y disposición final, reciclaje, incluyendo los residuos biológicos o sanitarios); (ii) de la cadena logística de insumos, suministros para la producción, el abastecimiento, importación, exportación y suministro de hidrocarburos, combustibles líquidos, biocombustibles, gas natural, gas licuado de petróleo -GLP-, (iii) de la cadena logística de insumos, suministros para la producción, el abastecimiento, importación, exportación y suministro de minerales, y (iv) el servicio de internet y telefonía.">28. Las actividades necesarias para garantizar la operación,mantenimiento, almacenamiento y abastecimiento de la prestación de: (i) servicios públicos de acueducto, alcantarillado, energía eléctrica, alumbrado público, aseo recolección, transporte, aprovechamiento y disposición final, reciclaje, incluyendo los residuos biológicos o sanitarios); (ii) de la cadena logística de insumos, suministros para la producción, el abastecimiento, importación, exportación y suministro de hidrocarburos, combustibles líquidos, biocombustibles, gas natural, gas licuado de petróleo -GLP-, (iii) de la cadena logística de insumos, suministros para la producción, el abastecimiento, importación, exportación y suministro de minerales, y (iv) el servicio de internet y telefonía.</option>
                                        <option value="29. La prestación de servicios bancarios y financieros, de operadores postales de pago, casas de cambio, operaciones de juegos de suerte y azar en la modalidad de novedosos yterritoriales de apuestas permanentes, chance y lotería,centrales de riesgo, transporte de valores y actividades notariales y de registro de instrumentos públicos, así como la prestación de los servicios relacionados con la expedición licencias urbanísticas.">29. La prestación de servicios bancarios y financieros, de operadores postales de pago, casas de cambio, operaciones de juegos de suerte y azar en la modalidad de novedosos yterritoriales de apuestas permanentes, chance y lotería,centrales de riesgo, transporte de valores y actividades notariales y de registro de instrumentos públicos, así como la prestación de los servicios relacionados con la expedición licencias urbanísticas.</option>
                                        <option value="30. El funcionamiento de los servicios postales, de mensajería, radio, televisión, prensa y distribución de los medios decomunicación.">30. El funcionamiento de los servicios postales, de mensajería, radio, televisión, prensa y distribución de los medios decomunicación.</option>
                                        <option value="31. El abastecimiento y distribución de bienes de primera necesidad: alimentos, bebidas, medicamentos, dispositivosmédicos, aseo, limpieza, y mercancías de ordinario consumo en la población, en virtud de programas sociales del Estado y de personas privadas.">31. El abastecimiento y distribución de bienes de primera necesidad: alimentos, bebidas, medicamentos, dispositivosmédicos, aseo, limpieza, y mercancías de ordinario consumo en la población, en virtud de programas sociales del Estado y de personas privadas.</option>
                                        <option value="32. Las actividades del sector interreligioso relacionadas con los programas institucionales de emergencia, ayuda humanitaria, espiritual y psicológica.">32. Las actividades del sector interreligioso relacionadas con los programas institucionales de emergencia, ayuda humanitaria, espiritual y psicológica.</option>
                                        <option value="33. Las actividades estrictamente necesarias para operar y realizar los mantenimientos indispensables de empresas, plantas industriales o minas, del sector público o privado, que por la naturaleza de su proceso productivo requieran mantener su operación ininterrumpidamente.">33. Las actividades estrictamente necesarias para operar y realizar los mantenimientos indispensables de empresas, plantas industriales o minas, del sector público o privado, que por la naturaleza de su proceso productivo requieran mantener su operación ininterrumpidamente.</option>
                                        <option value="34. Las actividades de los operadores de pagos de salarios, honorarios, pensiones, prestaciones económicas públicos yprivados; beneficios económicos periódicos sociales -BEPS-, y los correspondientes a los sistemas y subsistemas de Seguridad Social y Protección Social.">34. Las actividades de los operadores de pagos de salarios, honorarios, pensiones, prestaciones económicas públicos yprivados; beneficios económicos periódicos sociales -BEPS-, y los correspondientes a los sistemas y subsistemas de Seguridad Social y Protección Social.</option>
                                        <option value="35. El desplazamiento estrictamente necesario del personal directivo y docente de las instituciones educativas públicas y privadas, para prevenir, mitigar y atender la emergencia sanitaria por causa del coronavirus covid-19.">35. El desplazamiento estrictamente necesario del personal directivo y docente de las instituciones educativas públicas y privadas, para prevenir, mitigar y atender la emergencia sanitaria por causa del coronavirus covid-19.</option>
                                        <option value="36. La cadena de producción, abastecimiento, almacenamiento,reparación, mantenimiento, transporte, comercialización y distribución de las manufacturas de productos textiles, de cueroy prendas de vestir; de transformación de madera; defabricación de papel, cartón y sus productos y derivados; y fabricación de productos químicos, metales, eléctricos,maquinaria y equipos. Todos los anteriores productos deberáncomercializarse mediante plataformas de comercio electrónico o para entrega a domicilio.">36. La cadena de producción, abastecimiento, almacenamiento,reparación, mantenimiento, transporte, comercialización y distribución de las manufacturas de productos textiles, de cueroy prendas de vestir; de transformación de madera; defabricación de papel, cartón y sus productos y derivados; y fabricación de productos químicos, metales, eléctricos,maquinaria y equipos. Todos los anteriores productos deberáncomercializarse mediante plataformas de comercio electrónico o para entrega a domicilio.</option>
                                        <option value="37. El desarrollo de actividades físicas y de ejercicio al aire libre de personas que se encuentren en el rango de edad de 18 a 60años, por un período máximo de una (1) hora diaria, deacuerdo con las medidas, instrucciones y horarios que fijen losalcaldes en sus respectivas jurisdicciones territoriales. En todo caso se deberán atender los protocolos debioseguridad que para los efectos se establezcan.">37. El desarrollo de actividades físicas y de ejercicio al aire libre de personas que se encuentren en el rango de edad de 18 a 60años, por un período máximo de una (1) hora diaria, deacuerdo con las medidas, instrucciones y horarios que fijen losalcaldes en sus respectivas jurisdicciones territoriales. En todo caso se deberán atender los protocolos debioseguridad que para los efectos se establezcan.</option>
                                        <option value="38. La realización de avalúos de bienes y realización de estudios de títulos que tengan por objeto la constitución de garantías, ante entidades vigiladas por la Superintendencia Financiera deColombia.">38. La realización de avalúos de bienes y realización de estudios de títulos que tengan por objeto la constitución de garantías, ante entidades vigiladas por la Superintendencia Financiera deColombia.</option>
                                        <option value="39. El funcionamiento de las comisarías de familia e inspecciones de Policía, así como los usuarios de estas.">39. El funcionamiento de las comisarías de familia e inspecciones de Policía, así como los usuarios de estas.</option>
                                        <option value="40. La fabricación, reparación, mantenimiento y compra y venta de repuestos y accesorios de bicicletas convencionales yeléctricas.">40. La fabricación, reparación, mantenimiento y compra y venta de repuestos y accesorios de bicicletas convencionales yeléctricas.</option>
                                        <option value="41. Parqueaderos públicos para vehículos.">41. Parqueaderos públicos para vehículos.</option>
                                    </select>
                                </div>
                                
                                <h6 class="main_question add_top_10">Origen</h6>
                                <div class="row">
                                    <div class="styled-select col-6">
                                        <select class="form-control required" id="departamento_origen" name="departamento_origen" onchange="dptOrigen(this.value)">
                                            <option value="">Departamento</option>
                                        </select>
                                    </div>
                                    <div class="styled-select col-6">
                                        <select class="form-control required" id="ciudad_origen" name="ciudad_origen">
                                            <option value="">Ciudad</option>
                                        </select>
                                    </div>
                                </div>
                                <h6 class="main_question add_top_10">Destino</h6>
                                <div class="row">
                                    <div class="styled-select col-6">
                                        <select class="form-control required" id="departamento_destino" name="departamento_destino" onchange="dptDestino(this.value)">
                                            <option value="">Departamento</option>
                                        </select>
                                    </div>
                                    <div class="styled-select col-6">
                                        <select class="form-control required" id="ciudad_destino" name="ciudad_destino">
                                            <option value="">Ciudad</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="styled-select add_top_20">
                                    <select class="form-control required" id="tipo_identificacion" name="tipo_identificacion">
                                        <option value="">Tipo de Identificacion</option>
                                        <option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
                                        <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                        <option value="DNI">DNI</option>
                                        <option value="RUC">RUC</option>
                                    </select>
                                </div>

                                <div class="form-group add_top_20">
                                    <label for="numero_identificacion">Numero de Identificacion</label>
                                    <input type="number" name="numero_identificacion" id="numero_identificacion" class="form-control required">
                                </div>

                                <div class="form-group add_top_20">
                                    <label for="telefono">Numero de Telefono</label>
                                    <input type="number" name="telefono" id="telefono" class="form-control required">
                                </div>
                            </div>

                            <!-- /Start Branch ============================== -->
                            <div class="step">
                                <h2 class="section_title">Informacion Personal</h2>
                                <h3 class="main_question">Informacion para programar el viaje</h3>
                                <label>¿Viaja con un menor de edad?</label>
                                <div class="form-group radio_input">
                                    <label class="container_radio mr-3">Si
                                        <input type="radio" name="menor_edad" id="menor_edad_si" value="Si" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container_radio">No
                                        <input type="radio" name="menor_edad" id="menor_edad_no" value="No" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group add_top_20">
                                    <label for="edad_del_menor">Edad del menor</label>
                                    <input type="text" name="edad_del_menor" id="edad_del_menor" class="form-control d-none">
                                </div>
                                <div class="form-group add_bottom_30 d-none" id="div_registro_civil">
                                    <label>Subir registro civil del menor.<br><small>(Archivos aceptados: .jpg, .png, .jpeg, .pdf - Tamaño Maximo: 2MB)</small></label>
                                    <div class="fileupload">
                                        <input type="file" name="file_registro_civil" id="file_registro_civil" class="d-none" accept="image/png,image/jpg,image/jpeg">  {{-- ,application/pdf --}}
                                    </div>
                                </div>

                                <div class="form-group add_top_20">
                                    <label for="dir_actual">Direccion Actual</label>
                                    <input type="text" name="dir_actual" id="dir_actual" class="form-control required">
                                </div>
                                <div class="form-group add_top_20">
                                    <label for="dir_destino">Direccion de Destino</label>
                                    <input type="text" name="dir_destino" id="dir_destino" class="form-control required">
                                </div>
                                
                            </div>

                            <div class="submit step" id="end">
                                <div class="summary">
                                    <div class="wrapper" style="padding: 60px 8px !important;">
                                        <h3>Gracias por confiar en nosotros <br><span id="name_field"></span>!</h3>
                                        <p>Revisa tu bandeja de entrada, te enviaremos un mensaje de confirmación a <strong id="email_field"></strong></p>
                                    </div>
                                    <div class="form-group add_bottom_30">
                                        <label>Subir documento que certifique su lugar de residencia.<br><small>(Archivos aceptados: .jpg, .png, .jpeg, .pdf - Tamaño Maximo: 2MB)</small></label>
                                        <div class="fileupload">
                                            <input type="file" name="file_certificado" accept="image/png,image/jpg,image/jpeg" required>  {{-- ,application/pdf --}}
                                        </div>
                                    </div>
                                    <div class="form-group add_bottom_30">
                                        <label>Subir DECLARACION JURAMENTADA PARA SOLICITUD DE PERMISO ESPECIAL. <a href="{{ asset('assets/docs/DECLARACION JUTAMENTADA PARA SOLICITUD DE PERMISO ESPECIAL.docx') }}" download >(DESCARGAR DOCUMENTO)</a><br><small>(Archivos aceptados: .pdf - Tamaño Maximo: 2MB)</small></label>
                                        <div class="fileupload">
                                            <input type="file" name="file_solicitud" accept="application/pdf" required>  {{-- , --}}
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <div class="form-group terms">
                                            <label class="container_check">Por favor acepta los <a href="#" data-toggle="modal" data-target="#terms-txt">Terminos y Condiciones</a> antes de enviar
                                                <input type="checkbox" name="terms" value="Yes" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step last-->

                        </div>
                        <!-- /middle-wizard -->
                        <div id="bottom-wizard">
                            <button type="button" name="backward" class="backward btn_1">Anterior</button>
                            <button type="button" name="forward" class="forward btn_1">Siguiente</button>
                            <button type="submit" name="process" class="submit btn_1">Enviar</button>
                        </div>
                        <!-- /bottom-wizard -->
                    </form>

                @endif
                
            </div>
            <!-- /Wizard container -->
        </div>
        <!-- /content-right-->
    </div>
    <!-- /row-->
</div>

<!-- Modal terms -->
<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="termsLabel">Terminos y Condiciones</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Autorizo A COOTRANSHUILA LTDA.; Para que recolecte, almacene, use, transfiera, suprima o inactive mi información personal, financiera y legal existente en su base de datos, incluyendo datos sensibles como mis huellas digitales, fotografías, videos y demás datos que puedan llegar a ser considerados como sensibles de conformidad con la Ley, contribuyendo con el fin de cumplir el objeto social de la entidad, mediante procesos de contratación de personal, selección y evaluación proveedores, contratación para la adquisición de bienes y/o servicios, la realización de pagos a terceros o cualquier actividad administrativa que sea requerida para garantizar la seguridad de sus instalaciones; así como documentar las actividades gremiales.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn_1" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/common_scripts.js') }}"></script>
<script src="{{ asset('assets/js/velocity.min.js') }}"></script>
<script src="{{ asset('assets/js/common_functions.js') }}"></script>
<script src="{{ asset('assets/js/file-validator.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>

<!-- Wizard script-->
<script src="{{ asset('assets/js/func_1.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#tipo_excepcion').select2()
    })
</script>

@endsection