'use strict';
angular.module('cotizacionApp')
.controller('contratoPdfCtrl',function ($scope,contratosSrc,$controller,$filter){
	angular.extend(this,$controller('NumeroAletraCtrl',{$scope:$scope}));

$scope.definiciones=[{text:'\na)	EQUIPO: ',bold:true},{text:'se entiende al bien señalado en la declaración de EL CLIENTE marcada con el inciso c);\n\n'},
{text:'b)	HERRAMIENTAS: ',bold:true},{text:'se entiende, a todo instrumento propiedad de SMH y que el personal de SMH utiliza para prestar los servicios preventivos y correctivos al equipo;\n\n'},
{text:"c)	INGENIEROS: ",bold:true},{text:'se entiende, al personal designado con credencial de SMH para revisar y dictaminar el estado físico del equipo materia de este contrato, así mismo, facultado cumplir con las obligaciones contraídas;\n\n'},
//{text:'d)	RESPONSABLE: ',bold:true},{text:'se entiende, al representante, empleado o persona presente en el domicilio de EL CLIENTE al momento que se le realizan los servicios referidos en la cláusula primera de este contrato y que por ese hecho esta autorizada para aceptar de conformidad del estado físico y técnico del equipo;\n\n'},
{text:'d)	MANTENIMIENTO PREVENTIVO: ',bold:true},{text:'se entiende, a todas las actividades realizadas por el ingeniero tendientes a realizar acciones de calibración, ajustes y limpieza del equipo y tiene por objeto la conservación del mismo, en condiciones normales de operación, de conformidad con los términos de referencia del fabricante, para prevenir fallas en su funcionamiento, para lo cual SMH llevara a cabo los mantenimientos y periodicidad de los mismos, conforme al presente contrato y en su caso los anexos de referencia. Se recomendará realizar los cambios de ingeniería y las especificaciones técnicas que dicten los manuales y guias de funcionamiento entre otros, los cuales deberán ser entregados por escrito a favor de EL CLIENTE para su manejo e identificación, a efecto de mantener siempre actualizado el equipo, siempre que sean necesarios, incluyendo la revisión periódica de  seguridad  y control de funcionamiento,  ajustes, calibración y lubricación, limpieza  de partes inaccesibles para EL CLIENTE;\n\n'},
{text:'e)	MANTENIMIENTO CORRECTIVO: ',bold:true},{text:'se entiende, todo aquel que se preste a solucionar fallas que en su caso llegasen a ocurrir en el equipo, para lo cual el ingeniero de SMH corregirá las fallas conforme a las condiciones normales de funcionamiento en los términos de referencia del fabricante.'+
"\n\n Las partes convienen en que los servicios de mantenimiento preventivo y/o correctivo tienen como primordial finalidad, mantener en condiciones normales de uso el equipo"+
'\n\nExpuesto lo anterior, exhiben los documentos con los cuales acreditan la personalidad que  ostentan y se reconocen mutuamente, obligándose al tenor de las siguientes:\n'}];
//$scope.acreditacion="\n\n Las partes convienen en que los servicios de mantenimiento preventivo y/o correctivo tienen como primordial finalidad, mantener en condiciones normales de uso el equipo"+
//"\n\nExpuesto lo anterior, exhiben los documentos con los cuales acreditan la personalidad que  ostentan y se reconocen mutuamente, conviniendo en celebrar el presente instrumento al tenor de las siguientes:";
//$scope.clausula_segunda_seis="VI.	Todos los impuestos, contribuciones, arbitrios, gravámenes presentes o futuros derivados directa o indirectamente de la aplicación del presente contrato, serán por cuenta del CLIENTE, salvo las que expresamente por ley deban ser por cuenta de SMH.";
$scope.clausula_cuarta_uno="\nLas partes acuerdan que la prestación de los servicios materia de este contrato serán realizados en el domicilio de EL CLIENTE conforme el Anexo 1 (Descripción del Equipo),y por lo tanto no puede variarse salvo pacto en contrario. Pero si EL CLIENTE tuviese que trasladar los equipos a otro lugar notificará inmediatamente la nueva localización, en el caso de que el nuevo lugar se encuentre en una zona en la que SMH, no preste actualmente servicio de mantenimiento, se dará por terminado el contrato y quedarán entonces inmediatamente resueltas y extinguidas las obligaciones asumidas por SMH en este contrato, así mismo EL CLIENTE se obliga a dejar a favor de SMH todas las cantidades que haya pagado y en caso de que falten mensualidades por pagar, EL CLIENTE se obliga a pagar a SMH la cantidad que resulte de sumar las horas de servicio que no fueron utilizadas.\n\n";
//$scope.clausula_cuarta_dos="Cuando SMH pueda y acepte prestar el servicio en la nueva ubicación de los equipos, el CLIENTE se obliga a pagar un incremento por la cantidad de $600.00 (Seiscientos Pesos 00/100), por cada 100 kilómetros después de la distancia entre el domicilio de SMH y la localización a que hace referencia el Anexo 1. La cantidad a que hace referencia esta cláusula corresponde al tiempo y viáticos empleados por cada ingeniero, para trasladarse más allá de la distancia que corresponde entre SMH y el lugar establecido en el Anexo 1 de este contrato.";
$scope.clausula_cuarta_tres="SMH se obliga a proporcionar el servicio correctivo en el plazo señalado en la fracción tercera de la cláusula séptima de este contrato en su horario hábil, que es de lunes a viernes de 9:00 a 19:00 hrs. exceptuando los días hábiles que son considerados como días festivos por la Ley Federal del Trabajo, igualmente quedarán exceptuados los días que señale como no laborables cualquier autoridad administrativa o judicial.\n\n";
$scope.clausula_quinta_uno="\nSMH y EL CLIENTE no se responsabilizan de demora o incumplimiento causado por circunstancias ajenas a su voluntad o control, entre las que figuran (sin que la mención sea limitativa), guerra, huelgas u otros conflictos laborales, incendio, inundación, resistencia pasiva, desordenes, demoras o pérdidas sufridas en los envíos o embarques, restricciones impuesta por las autoridades, incumplimiento por parte de proveedores de SMH (siempre y cuando SMH justifique debidamente dicho incumplimiento mediante comunicación escrita del proveedor)  y otros casos fortuitos.\n\n"+
"Los contratos denominados “SIN SUMINISTRO DE REFACCIONES” se entenderán sin la obligación de SMH de proporcionar refacciones a EL CLIENTE, por lo tanto, el suministro de refacciones es responsabilidad de EL CLIENTE.\n\n"+
"Con independencia de lo anterior, EL CLIENTE podrá adquirir de SMH las refacciones, las cuales se cotizarán por separado y se instalarán previa autorización por escrito de EL CLIENTE,  refacciones mismas que deberán de ser nuevas,  no re manufacturadas, y las cuales serán revisadas por el  personal designado por  EL CLIENTE, entregando de igual forma SMH a favor de EL CLIENTE los documentos que avalen la adquisición legal y reciente de dichas refacciones,  los cuales podrán ser solicitados en cualquier momento por EL CLIENTE, sin que SMH pueda llevar a cabo objeción alguna, así mismo, podrá adquirirlas de cualquier otro proveedor, siempre y cuando sean nuevas y originales, con el entendido que de que no habrá garantía por parte de SMH de las piezas que no sean adquiridas  con SMH, por lo tanto el uso de refacciones será responsabilidad del cliente y el defecto o daño en las refacciones por motivos de reparación será en su propio perjuicio. \n\n"+
"En caso de que EL CLIENTE no proporcione las refacciones de forma inmediata o que no sean de la calidad requerida para la reparación SMH no se hace responsable del retraso en la reparación, suspendiéndose momentáneamente la obligación de reparar el equipo en los términos convenidos en este contrato, pero EL CLIENTE no podrá retener los pagos a que hace referencia la cláusula segunda.  ";
$scope.clausula_sexta_uno="\nEstán excluidos los servicios por modificaciones técnicas, reformas, desmontajes y la eliminación de fallas y daños causados por operación o uso anormal del equipo y siniestros. También quedan excluidas las amplificaciones del Software que extienden las aplicaciones del equipo más allá de los originalmente adquiridos. ";
$scope.clausula_septima_uno="\nI.	Las obligaciones de SMH están sujetas a la condición de que el equipo se encuentre funcionando conforme a los estándares establecidos por el fabricante, y así deberá de corroborarlo el ingeniero asignado por SMH previo a la iniciación de la prestación de los servicios, haciéndolo constar en la orden de servicio que firmarán las partes.";
$scope.clausula_septima_dos="\nII.	La periodicidad del mantenimiento preventivo será de acuerdo con el programa del Anexo 2 (Programa de mantenimiento);";
$scope.clausula_septima_tres="\nIII.	El mantenimiento correctivo será conforme a las siguientes fracciones;";
$scope.clausula_septima_cuatro="\nIV.	Se atenderá el reporte en un término no mayor a 48 horas después de que sea reportado por EL CLIENTE a la Oficina Técnica de SMH al teléfono 01 (55) 5687-6166. ";
$scope.clausula_septima_cinco="\nV.	SMH se compromete a mantener el equipo en buen estado de funcionamiento programando para ello dos mantenimientos preventivos al año. Para los servicios correctivos se dará atención con un tiempo de reparación máximo de 5 días hábiles contados a partir de la fecha de atención del reporte.";
$scope.clausula_septima_seis="\nVI.	SMH atenderá las dudas técnicas, consultadas por EL CLIENTE con ingenieros calificados en los teléfonos: 01 (55) 56-87-61-64, 56-87-61-75.";
$scope.clausula_septima_siete="\nVII.	Los ingenieros que acudan a realizar Mantenimiento Preventivo y/o Correctivos deberán reportarse al área responsable de EL CLIENTE a su llegada y una vez que hayan terminado el servicio se levantará la orden de servicio correspondiente y deberá ser firmada por las personas que verifiquen dicho servicio;";
$scope.clausula_septima_ocho="\nVIII.	Los ingenieros deberán presentarse con EL CLIENTE con los materiales y herramientas necesarios para realizar los servicios de mantenimiento preventivo y correctivo contratados;";
$scope.clausula_septima_nueve="\nIX.	Los ingenieros de servicio deberán dejar copia e integrar la orden de servicio a la persona que represente a EL CLIENTE para integrar la bitácora de comportamiento del equipo.";
$scope.clausula_septima_diez="\nX.	SMH se compromete a cotizar refacciones nuevas y originales, necesarias para el buen funcionamiento de los equipos materia de este contrato y que no están consideradas en la propuesta;";
$scope.clausula_septima_once="\nXI.		Para los contratos denominados “CON SUMINISTRO DE REFACCIONES”, SMH se obliga a sustituir las partes y refacciones incluidas que no funcionen correctamente, previo dictamen técnico."+
"En su caso para los contratos denominados “SIN SUMINISTRO DE REFACCIONES” SMH se obliga a cotizar las partes y refacciones que no funcionen correctamente, sustituir las refacciones cotizadas y aceptadas por parte de EL CLIENTE; ";
$scope.clausula_septima_doce="\nXII.	SMH responderá totalmente por los daños directos o indirectos, punitivos, negligentes, indebidos, por falta de pericia, habilidad o cualquier otro que hubiese sido consecuencia inmediata de la actuacion de su propio personal, que le sean legalmente imputables, siempre y cuando se encuentren actuando dentro de las actividades encomendadas con motivo del presente contrato. Cualquier otro tipo de indemnización queda excluida.";
$scope.clausula_septima_trece="\nXIII.		SMH se obliga a mantener informado a EL CLIENTE de los ingenieros que atenderán los reportes."+
"\n\nNo será obligación de SMH revisar y reparar los accesorios periféricos mencionando sin limitación, las impresoras, grabadoras, unidades de almacenamiento externo, acrílicos de compresión, UPS, etc. En caso de requerirlo, se cotizará por separado y será objeto de diverso contrato.";
//$scope.clausula_septima_trece="\nXIII.	No serán obligación de SMH revisar y reparar los accesorios periféricos mencionando sin limitación, las impresoras, grabadoras, unidades de almacenamiento externo, acrílicos de compresión, UPS, etc. En caso de requerirlo, se cotizará por separado y será objeto de diverso contrato.";
$scope.clausula_septima_catorce="\n	No será obligación de SMH el traslado total o parcial del equipo o equipos objeto del presente contrato, su desinstalación o reinstalación total o parcial para su reubicación; en caso de requerirlo se cotizará y será objeto de diverso contrato. "+
"\n\n Durante la vigencia del contrato EL CLIENTE se obliga a dar buen uso al equipo y SMH podrá no prestar el servicio ni reparar el equipo en caso de que el daño se deba al mal uso del mismo o el daño provenga de impericia, imprudencia, accidente o negligencia que cause daño total o parcial del equipo. "+
"Esta condición no faculta al cliente a suspender el pago. SMH podrá cotizar su reparación con costo adicional a este contrato."+
'\n\n Para los contratos denominados "SIN SUMINISTRO DE REFACCIONES", la obligación se suspenderá por todo el tiempo que EL CLIENTE tarde en proporcionar las refacciones de la calidad requerida, aceptar la cotización de SMH presente por las refacciones o por la disponibilidad de las mismas con el proveedor, en este último caso SMH se compromete de manera conjunta con el proveedor a dar solución inmediata en un tiempo máximo de respuesta de 4 horas vía telefónica y 24 horas en sitio, fecha en la cual serán entregadas previa revisión del encargado del área designado por EL CLIENTE. En caso de que no exista respuesta favorable por parte de SMH en los termino pactados, EL CLIENTE podrá llevar a cabo y sin responsabilidad alguna negociación con cualquier tercero, respecto de la adquisición de dichas refacciones, sin que ello genere pago o sanción alguna a su cargo.';
$scope.clausula_octava_uno="\nI.	Además de la obligación de pago contenida en la cláusula segunda;";
//$scope.clausula_octava_dos="\nII.	Ampliaciones, traslados y modificados a los equipos, solamente serán efectuados con el consentimiento de SMH y serán presupuestados por separado;";
$scope.clausula_octava_dos="\nII.	EL CLIENTE se obliga a dar acceso al equipo para su mantenimiento preventivo y correctivo únicamente al personal designado por SMH. En caso que EL CLIENTE diera acceso a los equipos para su mantenimiento a personal distinto al designado por SMH, este último se deslinda de cualquier responsabilidad y en caso de daños podrá cotizar su reparación;";
//$scope.clausula_octava_tres="\nIII.	Con el objeto de realizar los mantenimientos sin pérdida de tiempo para ambas partes, el  CLIENTE pondrá a disposición de SMH el equipo correspondiente en los días y horas convenidas la primera parte de la cláusula cuarta. Si no pudiera cumplir con la fecha prevista, el CLIENTE informará de inmediato a SMH en el caso de mantenimiento correctivo y con dos semanas de anticipación y por escrito en el caso de mantenimiento preventivo;";
$scope.clausula_octava_tres="\nIII.		Para la custodia de los esquemas, manuales, descripciones y repuestos necesarios para el mantenimiento preventivo y correctivo, EL CLIENTE pondrá a su disposición de SMH un espacio adecuado en las inmediaciones de la instalación, sin que EL CLIENTE se haga responsable de la custodia de los mismos; y";
$scope.clausula_octava_cuatro="\nIV.	Todas las herramientas, los materiales y repuestos almacenados por SMH en los locales de EL CLIENTE continuarán siendo propiedad de SMH.";
//$scope.clausula_octava_cuatro="\nIV.	El CLIENTE dará al personal de SMH toda clase de facilidades y acceso a los equipos e instalaciones eléctricas, así como cualquier aclaración que solicite respecto a las instalaciones vinculadas con el equipo en términos de lo acordado en el presente contrato y anexos de referencia;";
//$scope.clausula_octava_cinco="\nV.	Para la custodia de los esquemas, manuales, descripciones y repuestos necesarios para el mantenimiento preventivo y correctivo, el CLIENTE pondrá a disposición de SMH un espacio adecuado en las inmediaciones de la instalación, sin que el CLIENTE se haga responsable de la custodia de los mismos;";
//$scope.clausula_octava_seis="\nVI.	Todas las herramientas, los materiales y repuestos almacenados por SMH en los locales del CLIENTE continuarán siendo propiedad de SMH.";
$scope.clausula_novena_uno="\n se obliga a demostrar que servicios de mantenimiento son conforme a lo pactado en este contrato y en base los manuales de funcionamiento del equipo y emitirá los dictámenes necesarios para acreditar que el servicio mantiene al equipo en correcto funcionamiento.";
$scope.clausula_decima_cero="\nLas partes reconocen y convienen que cierta información o documentación que cualquiera de ellas proporcione a la otra para el cumplimiento de sus obligaciones conforme a este Contrato, podrá contener Información Confidencial de cualquiera de ellas. Para efectos del presente Contrato, la Información Confidencial será toda aquella que las partes se intercambien con motivo de la prestación de servicios, materia del presente Contrato. \n\n"+
"Por tal motivo, la Información que las partes intercambien y/o proporcionen, conforme al presente Contrato solamente podrá ser utilizada por las partes para el cumplimiento de sus obligaciones estipuladas en este instrumento. La parte que reciba la información solamente podrá revelar dicha Información a sus empleados, o bien, para cumplir con los términos de una orden expedida por autoridad judicial o administrativa competente y notificará a la parte que divulgue la información sobre dicha orden para la revelación de la Información Confidencial, en caso de que las circunstancias así lo permitan.  En caso contrario, las partes realizarán esfuerzos razonables para proteger la confidencialidad de la Información y en cualquier caso, cooperarán para limitar la revelación de la Información Confidencial, durante la vigencia del presente instrumento y tres años posteriores al vencimiento del mismo.\n\n"+
"EL CLIENTE se obliga a no solicitar información confidencial al personal técnico de SMH, pero en el caso de que SMH entregue o de acceso a su información confidencial se compromete a no revelar a ninguna persona física o moral, ya sea por escrito, oral, o por medios magnéticos, los datos, en caso de contravención, EL CLIENTE será responsable, para lo cual se obliga a resarcir a SMH los posibles daños y perjuicios que ocasione con este motivo. \n\n"+
"Atento a lo anterior, queda estrictamente prohibido a EL CLIENTE, sea por si o a través de terceras personas, contratar a los ingenieros de SMH, comercializar, vender, promocionar, distribuir o anunciar cualquier otro producto igual y con marca idéntica o similar en grado de confusión que sirva para la línea de productos que maneja la empresa o, esta obligación por parte de EL CLIENTE permanecerá vigente con el convenio y por el término de dos años contados a partir de la terminación o rescisión de este contrato.";
$scope.clausula_decima_primera="\nLas partes convienen expresamente y para todos las cuestiones legales correspondientes, que la relación jurídica que se crea por efectos del presente contrato, es única y exclusivamente entre SMH y EL CLIENTE, por lo que deberá entenderse como otra relación jurídica distinta la que exista entre los ingenieros encargados de realizar las obligaciones de SMH, que es quien los contrata; las actividades que desarrollará SMH en virtud de este contrato a EL CLIENTE, serán realizadas ajustándose a los términos y condiciones convenidos en éste instrumento, sin subordinación a EL CLIENTE, con los medios, elementos y personas propias de SMH que libremente contratará para que le brinden servicios personales y subordinados en su beneficio, en las instalaciones de EL CLIENTE, por lo que no implican ni implicarán relación de carácter laboral entre este último y/o el personal que SMH emplee.\n\n"+
"Es competencia exclusiva de SMH, el señalar y aplicar en su caso, los correctivos disciplinarios a que se hagan acreedores los ingenieros, en consecuencia EL CLIENTE, debe de abstenerse de imponer sanciones a los ingenieros asignados por SMH; En caso de cualquier siniestro ilícito relacionado con actos u omisiones por parte del personal de SMH en perjuicio del patrimonio de EL CLIENTE, ambas partes se obligan a realizar conjuntamente o separadamente las acciones legales correspondientes para coadyuvar ante cualquier autoridad judicial o administrativa. \n\n"+
"SMH se obliga a asignar ingenieros capacitados y especializados para proporcionar el servicio de mantenimiento correctivo y preventivo, situación que antes de la celebración de este convenio causo gastos cubiertos únicamente por SMH, y por lo tanto, EL CLIENTE se obliga a no recibir servicios personales y subordinados directamente de los ingenieros y en caso de hacerlo por si o por interpósita persona pagará a SMH una indemnización correspondiente a dos veces el valor del presente convenio, misma que se duplicará en caso de que el ingeniero renuncie a SMH para incorporarse a la plantilla laboral de EL CLIENTE.\n\n"+
"SMH podrá cambiar en cualquier momento al personal que utilice para la prestación de los servicios de mantenimiento, así como subcontratar los servicios especiales de terceros, en el entendido de que dichos cambios no irán en detrimento del propio servicio, y siempre y cuando EL CLIENTE avale por escrito dichos cambios, previa información remitida por SMH. ";
$scope.clausula_decima_segunda="\nLas partes se obligan a no molestarse en el desempeño de sus obligaciones y funciones para la efectiva prestación del servicio en caso contrario SMH podrá suspender, una vez que se avise y señalé la razón al CLIENTE, la prestación de los servicios, obligándose EL CLIENTE a pagar la totalidad del valor de los servicios relacionados en la clausula segunda.";
$scope.clausula_decima_tercera="\nEL CLIENTE se obliga a no ceder, traspasar o enajenar por cualquier título los derechos  que derivan del presente contrato, sin previa autorización por escrito de SMH, y por la naturaleza de las obligaciones de SMH este podrá sin necesidad de autorización ceder, traspasar o enajenar los derechos y obligaciones contraídas en este convenio a dos o más personas que puedan cumplir con el objeto jurídico de este contrato, previa notificación y aceptación por escrito de EL CLIENTE. ";
$scope.clausula_decima_cuarta="\nSMH, previo aviso por escrito a EL CLIENTE, podrá suspender la prestación del servicio, objeto del presente contrato, cuando EL CLIENTE, no haya cumplido con el pago en tiempo y forma. ";
//"De la misma manera EL CLIENTE, previo aviso dirigido a SMH podrá suspender sus pagos, en el caso de que SMH, no cumpla con la calidad de los servicios ofertados en el presente contrato, pudiendo de igual manera y no obstante lo establecido en el presente contrato, dar por terminado el mismo en cualquier tiempo, sin necesidad de encontrase al corriente de los pagos, salvo de aquellos que ya se hubiese consentido como servicios adecuados conforme al acta de aceptación y recepción de servicios firmada por ambas partes, y sin que ello aplique pena o sanción alguna a cargo de EL CLIENTE. ";
$scope.clausula_decima_quinta_uno="\nSerá causa de rescisión del presente contrato, sin necesidad de declaración judicial, además de las que marca la Ley, la violación de cualquiera de las fracciones que a continuación se señalan de manera enunciativa más no limitativa, debiendo ser ejercidas:";
$scope.clausula_decima_quinta_dos="\na)		Si EL CLIENTE no realiza puntualmente el pago a que tiene derecho SMH, haciendo exigibles dichos pagos al momento de la rescisión del contrato;\n\n"+
"b)	Si el cliente no reembolsa los gastos no incluidos, que haya erogado en virtud de sus servicios.\n\n"+
"c)	Cuando el equipo sea cambiado de ubicación, sin haber enterado por escrito y con anticipación a SMH";
$scope.clausula_decima_quinta_tres="\na)	La falta de realización de la prestación de servicios objeto del presente contrato con la calidad,  tiempo y forma convenidos de acuerdo al calendario de mantenimientos.\n\n"+
"b)	La suspensión injustificada de la  prestación de los servicios objeto del presente contrato.\n\n"+
"c)	La falta de responsabilidad, probidad y ética en la prestación de los servicios del presente contrato.";
$scope.clausula_decima_quinta="Cualquier modificación o enmienda en los términos y condiciones del presente contrato, únicamente tendrá validez y surtirán sus efectos en la medida en que ambas partes convengan previamente y por escrito firmen dicha modificación o enmienda, las cuales se agregaran al presente Contrato para que formen parte integral del mismo.";
//$scope.clausula_decima_sexta="SMH, previo aviso por escrito a EL CLIENTE, podrá suspender la prestación del servicio, objeto del presente contrato, cuando EL CLIENTE, no haya cumplido con el pago en tiempo y forma las contraprestaciones señaladas en el presente contrato, no obstante SMH haber cubierto a cabalidad sus obligaciones a cargo. \n\nDe la misma manera EL CLIENTE, previo aviso dirigido a SMH podrá suspender sus pagos, en el caso de que SMH, no cumpla con la calidad de los servicios ofertados en el presente contrato, pudiendo de igual manera y no obstante lo establecido en el presente contrato, dar por terminado el mismo en cualquier tiempo, sin necesidad de encontrase al corriente de los pagos, salvo de aquellos que ya se hubiese consentido como servicios adecuados conforme al acta de aceptación y recepción de servicios firmada por ambas partes, y sin que ello aplique pena o sanción alguna a cargo de EL CLIENTE. ";
$scope.clausula_decima_septima="\nCualquier modificación o enmienda en los términos y condiciones del presente contrato, únicamente tendrá validez y surtirán sus efectos en la medida en que ambas partes convengan previamente y por escrito firmen dicha modificación o enmienda, las cuales se agregaran al presente Contrato para que formen parte integral del mismo.";
$scope.clausula_decima_octava="\nLos títulos o encabezados antepuestos a cada una de las Cláusulas del presente Contrato, sólo tendrán efectos de orientación con el fin de facilitar su lectura y/o identificación, por lo que no deberán afectar su interpretación ni se consideran parte del texto de dichas Cláusulas. Ambas partes acuerdan que todos los anexos descritos en el cuerpo de este contrato son parte integral del mismo, por lo que son reconocidos y válidos para ambas partes, y su cumplimiento es obligatorio.";
$scope.clausula_decima_novena="\nSMH se obliga a no utilizar cualquier forma de trabajo infantil, que para estos efectos,  infantil se refiere a personas más jóvenes de lo que la legislación determina como la edad mínima permitida para trabajar. En ningún caso SMH no contratará a niños menores de 14 años, sin embargo en caso de que la ley permita contrataciones a personas menores de catorce años de edad, SMH obligatoriamente deberá cumplir con todas las restricciones previstas en la ley.\n\n"+
"Así mismo SMH se obliga a no utilizar a cualquier persona cuyo trabajo sea ejecutado de forma forzada o cuyo trabajo sea realizado sin la libre voluntad del trabajador.";
$scope.clausula_vigesima="\nLAS PARTES manifiestán bajo protesta de decir verdad que durante las negociaciones y para la celebración del presente contrato se han abstenido de adoptar conductas de soborno y/o corrupción u otras conductas sancionadas por la ley, y así se conducirán en el cumplimiento de su objeto.";
$scope.clausula_vigesima_primera="\n“EL CLIENTE” bajo protesta de decir verdad manifiesta que, conforme a lo dispuesto en el artículo 17 fracción IV de la Ley Federal para la Prevención e Identificación de Operaciones con Recursos de Procedencia Ilícita, los recursos con los que cuenta para la contratación del servicio al equipo descrito en la Declaración c) de “EL CLIENTE” son de procedencia licita, liberando a SMH de cualquier responsabilidad que pudiera surgir con motivo de la utilización de dichos recursos.";
//$scope.clausula_vigesima_segunda="\nLas partes manifiestán que el presente contrato consta de 9 fojas útiles tamaño carta suscritas  y rubricadas por una sola de sus caras, en el cual no existe dolo, error, violencia, lesión, mala fe o cualquier otro vicio de consentimiento que pudiese invalidarlo, toda vez que lo aquí contratado es su libre voluntad para obligarse.";
$scope.clausula_vigesima_tercera="\nEn caso de controversia sobre interpretación, cumplimiento o incumplimiento de este Contrato, las partes se someten a la jurisdicción de los Tribunales Comunes en la Ciudad de México y renuncian a cualquier otro fuero que por razón de domicilio presente o futuro u otro pudiera corresponderles. Para los efectos de las comunicaciones y notificaciones que las partes deban hacerse con motivo del presente contrato, señalan para recibirlas, hasta nuevo aviso por escrito los siguientes domicilios:";
//$scope.clausula_vigesima_cuarta="Leído que fue el presente contrato y enteradas las partes del contenido y alcances de todas y cada una de las cláusulas que en el mismo se precisan, lo firman por duplicado las partes y los testigos cuyos nombres constan al calce, en la Ciudad de México, a ____________________________________";
 var contratoSmh = {
   background: {image:'sinAprobacion'},//,width:820},
       pageSize: 'letter',
pageOrientation: 'portrait',                  
    pageMargins: [ 40, 50, 40, 50 ],        
         header:{ style: 'texto',
                  margin: 20,
                   table: { widths: ['*', '*', '*', '*'],
                    body: [
                    [{text:'',alignment:'right'},{text:'', alignment:'left'},{text:'',alignment:'right'},{text:'FOLIO', alignment:'right',color:'gray',bold:'true'}],
                   ]
                  },
                   layout: 'noBorders'
                 },
        content:[{ text: 'Nombre fiscal',fontSize:10,bold:true,alignment:'center',decoration:'underline'},//0
                 { text: 'encabezado',fontSize:10,bold:true,alignment:'justify'},//      1           
                 { text: '\n\nDECLARACIONES',fontSize:10,bold:true,decoration:'underline',alignment:'center'},//2
                 { text: '\nI.	Declara EL CLIENTE que:',fontSize:10,bold:true }, //3
                 { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//4
                 { text: '\nII.	Declara SMH que:',fontSize:10,bold:true}, //5
                 { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//6
                 { text: [{text:'\n\nIII.		Reconocen ambas partes, ',fontSize:10,bold:true},{text:'salvo indicación expresa en contrario, o que el contexto de este convenio se haga necesaria otra interpretación, que las siguientes definiciones se aplicarán en todo el texto: ',alignment: 'left',fontSize:10,alignment:'justify'}]},//7
                 { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//8
                 { text: '\n\nC L A U S U L A S',fontSize:10,bold:true,alignment:'center'},//9
                 { text: '\nPRIMERA:	                                   OBJETO DEL CONTRATO.',fontSize:10,bold:true }, //10
                 { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//11
                 { text: '\n\nSEGUNDA:	                                   COSTO Y FORMA DE PAGO.',fontSize:10,bold:true }, //12
                 { text: 'I',alignment: 'left',fontSize:10,alignment:'justify'},//13
                 { text: 'II',alignment: 'left',fontSize:10,alignment:'justify'},//14
                 { //16
                  style:'ocho',
                  margin:[0,0],
                  table: {
                          widths: [150,350], 
                          body: [   
                                    [{text: '.',alignment:'center',bold:true},{text: '.',alignment:'center',bold:true},]
                                ]
                        },
                          layout: 'lightHorizontalLines'
                  }, 
                 { text: 'III',alignment: 'left',fontSize:10,alignment:'justify'},//15
                  { text: 'IV',alignment: 'left',fontSize:10,alignment:'justify'},//17
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//18
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//19
                  { text: '\nTERCERA:	                              LUGAR DE PAGO.',fontSize:10,bold:true }, //20
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//21
                  { text: '\n\nCUARTA:	                             LUGAR  Y TIEMPO PARA PRESTAR EL SERVICIO.',fontSize:10,bold:true }, //22
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//23 uno
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//24 dos nueva ubicacion incremento
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//25
                  { text: '\nQUINTA: 	                                 EXCLUSIÓN DE RESPONSABILIDAD.',fontSize:10,bold:true }, //26
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//27
                  { text: '\n\nSEXTA:	                              EXCLUSIONES.',fontSize:10,bold:true }, //28
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//29
                  { text: '\n\nSÉPTIMA:	                              OBLIGACIONES DE SMH.',fontSize:10,bold:true }, //30
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//31 uno
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//32	dos
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//33	tres
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//34	cuatro
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//35	cinco
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//36	seis
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//37	siete
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//38	ocho
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//39	nueve	
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//40	diez
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//41	once
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//42	doce
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//43	trece
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//44	catorce
                  { text: '\n\nOCTAVA: 	                             OBLIGACIONES DEL CLIENTE.',fontSize:10,bold:true }, //45
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//46 uno
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//47	dos
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//48	tres
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//49	cuatro
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//50	cinco
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//51	seis
                  { text: '\n\nNOVENA: 	            GARANTIA DEL SERVICIO.',fontSize:10,bold:true }, //52
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//53	uno
                  { text: '\n\nDECIMA:	            CONFIDENCIALIDAD Y FIDELIDAD.',fontSize:10,bold:true }, //54
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//55	cero
                  { text: '\n\nDECIMA PRIMERA:		NO DEPENDENCIA LABORAL.',fontSize:10,bold:true }, //56
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//57	uno
                  { text: '\n\nDECIMA SEGUNDA:		USO ININTERRUMPIDO.',fontSize:10,bold:true }, //58
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//59
                  { text: '\n\nDECIMA TERCERA:		CESION DEL CONTRATO ',fontSize:10,bold:true }, //60
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//61	tres
                  { text: '\n\nDÉCIMA CUARTA: 		SUSPENSIÓN DEL SERVICIO Y PAGOS',fontSize:10,bold:true }, //62
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//63	tres
                  { text: '\n\nDECIMA QUINTA:		CAUSALES DE RESCISION ',fontSize:10,bold:true }, //64
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//65	uno
                  { text: '\nI.- Por SMH:',fontSize:10,bold:true }, //66			SMH
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//67
                  { text: '\nII.- Por EL CLIENTE:',fontSize:10,bold:true }, //68
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//69	cliente
                  { text: '\n\nDECIMA SEXTA:		DURACION Y TERMINACION.',fontSize:10,bold:true }, //70
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//71	UNO                  
                  { text: '\n\nDECIMA SEPTIMA:		MODIFICACIONES Y ENMIENDAS',fontSize:10,bold:true }, //72
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//73	UNO
                  { text: '\n\nDÉCIMA OCTAVA: 	TÍTULOS O ENCABEZADOSS',fontSize:10,bold:true }, //74
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//75	uno
                  { text: '\n\nDÉCIMA NOVENA: 	 RESPONSABILIDAD SOCIAL.',fontSize:10,bold:true }, //76
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//77	uno
                  { text: '\n\nVIGÉSIMA:		ANTI CORRUPCIÓN',fontSize:10,bold:true }, //78
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//79	uno
                  { text: '\n\nVIGÉSIMA PRIMERA: PROCEDENCIA DE LOS RECURSOS',fontSize:10,bold:true }, //80
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//81	uno
                  { text: '\n\nVIGÉSIMA SEGUNDA; CONSENTIMIENTO',fontSize:10,bold:true }, //82
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//83	tres
                  { text: '\n\nVIGÉSIMA TERCERA: JURISDICCIÓN Y DOMICILIOS',fontSize:10,bold:true }, //84
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//85	tres
                  { text: '\nSMH',fontSize:10,bold:true }, //86
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//87	tres
                  { text: '\nEL CLIENTE',fontSize:10,bold:true }, //88
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//89	tres
                  { text: '\n\nVIGESIMA CUARTA:		    FECHA.',fontSize:10,bold:true}, //90
                  { text: '',alignment: 'left',fontSize:10,alignment:'justify'},//91
                  { text: '\n',fontSize:12,bold:true,alignment:'center'}, //92
                 {//93
                  style: 'texto',
                  alignment:'left',
                  margin:[20,40],
                  table: {
                          widths: [240,240], 
                          body: [   
									[{text:'',alignment:'center',bold:true},{text:'',alignment:'center',bold:true}],
									[{text:'\n\n\n\n____________________________________________________\n',alignment:'center'},{text:'\n\n\n\n____________________________________________________\n',alignment:'center'}],
									[{text:'DR.',alignment:'center',bold:true},{text:'LIC. JORGE RAMIREZ CAMARILLO',alignment:'center',bold:true}],
									[{text:'\n\n\n\nTESTIGO',alignment:'center'},{text:'\n\n\n\nTESTIGO',alignment:'center'}],
									[{text:'\n\n\n\n____________________________________________________\n\n',alignment:'center'},{text:'\n\n\n\n____________________________________________________\n\n',alignment:'center'}],
									/*[{text:'\n\n\n\n\n\n SIN TEXTO',alignment:'center',bold:true,colSpan:2},{}],*/
                                ]
                        },
                         layout: 'noBorders'
                  },
                  { text: 'ANEXO 1\n',fontSize:12,bold:true,alignment:'center',pageBreak: 'before'}, //94
                  { text: '\nDESCRIPCION DEL(LOS) EQUIPO(S)',fontSize:10,bold:true,alignment:'center',decoration:'underline'}, //95
                  {//96
                  style: 'texto',
                  alignment:'left',
                  margin:[20,10],
                  table: {
                          widths: ['*','*','*','*'], 
                          body: [   
									[{text:'NUM',alignment:'center',fillColor:'GRAY'},{text:'ÉQUIPO',alignment:'center',fillColor:'gray'},{text:'MODELO',alignment:'center',fillColor:'gray'},{text:'NUMERO DE SERIE',alignment:'center',fillColor:'gray'}],
                                ]
                        },
                         //layout: 'noBorders'
                  },
                  {//97
                  style: 'texto',
                  alignment:'left',
                  margin:[20,20],
                  table: {
                          widths: ['*','*','*','*'], 
                          body: [   
									[{text:'.',alignment:'center',fillColor: 'white'},{text:'.',alignment:'center',fillColor: 'white'},{text:'.',alignment:'center',fillColor: 'white'},{text:'.',alignment:'center',fillColor: 'white'}],
									[{text:"\UBICACION",alignment:'center',colSpan:4,decoration:'underline'},{},{},{}],
									[{text:'\nNUM',alignment:'center',fillColor: 'white'},{text:'ÉQUIPO',alignment:'center',fillColor: 'white'},{text:'MODELO',alignment:'center',fillColor: 'white'},{text:'SERIE',alignment:'center',fillColor: 'white'}],
									[{text:"",alignment:'center',colSpan:4,decoration:'underline'},{},{},{}],
									[{text:"",alignment:'center',colSpan:4,decoration:'underline'},{},{},{}],
                                ]
                        },
                         layout: 'noBorders'
                  },
                  { text: 'SIN TEXTO\n',bold:true,alignment:'center'}, //98
                  { text: 'ANEXO 2\n',fontSize:12,bold:true,alignment:'center',pageBreak: 'before'}, //99
                  { text: '\nPROGRAMA DE MANTENIMIENTO PREVENTIVO',fontSize:10,bold:true,alignment:'center',decoration:'underline'}, //100
                  {//101
                  style: 'ocho',
                  alignment:'left',
                  margin:[20,10],
                  table: {
                          widths: ['*','*','*','*','*'], 
                          body: [   
									[{text:'UBICACION',alignment:'center',fillColor: 'gray'},{text:'EQUIPO',alignment:'center',fillColor: 'gray'},{text:'SERVICIO',alignment:'center',fillColor: 'gray'},{text:'FECHA',alignment:'center',fillColor: 'gray'},{text:'HORARIO',alignment:'center',fillColor: 'gray'}],
                                ]
                        },
                         //layout: 'noBorders'
                  },
                  { text: '\n\n\n\n\nFIN DE TEXTO',bold:true,alignment:'center'}, //102
                ],
          footer:{text:''},
         images:{
                  smh:'data:image/jpeg;base64,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',
                  sinAprobacion:'data:image/jpeg;base64,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',
                  conAprobacion:' data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAXwBfAAD/2wBDAAYEBAQFBAYFBQYJBgUGCQsIBgYICwwKCgsKCgwQDAwMDAwMEAwODxAPDgwTExQUExMcGxsbHCAgICAgICAgICD/2wBDAQcHBw0MDRgQEBgaFREVGiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICD/wAARCAKXAm4DAREAAhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAAAAj/xAAUEAEAAAAAAAAAAAAAAAAAAAAA/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/AKpAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB//Z'
                },
         styles: {
                  texto: {
                    fontSize:10,
                    color:'black'
                  },
                  ocho: {
                    //bold: true,
                    fontSize: 8,
                    //color: 'black'
                  }
                },
           info: {
                title: 'ContratosServicio',
               author: 'EMS, JYPA',
              subject: 'Cotizacion_consumibles',
             keywords: 'N/A',
                }
  };


$scope.openContratoPdf = function(id,fondo) { 	console.log(fondo);								console.log(id);
  	contratosSrc.get({id:id},function(d){									console.log(d.objeto);
  		//if(d.objeto.estatus=="GUARDADO" || d.objeto.estatus=="RECHAZADO" || d.objeto.estatus=="CANCELADO" || d.objeto.estatus=="ENVIADO"){      //console.log(cotizacionConsumible.background);
  		if(fondo=='c'){      //console.log(cotizacionConsumible.background);
      		contratoSmh.background.image="sinAprobacion";
      	}else{        console.log("DIFERENTE");
        	contratoSmh.background.image="conAprobacion";
      	}
    if (!d.objeto.contrato || !d.objeto.r_conts_eqps[0]){
    	alert("¡¡ FAVOR DE COMPLETAR EL REGISTRO DE CONTRATO !!");}else{
  		var dat= new Date();            
  		$scope.equipos_f=[];												//$scope.fecha_contrato = moment(dat).format('DD MMMM YYYY');   
  		var date_contrato=d.objeto.contrato.fecha_contrato.split("-");
  		var b=date_contrato[2].substring(0,2);
  		var m=$scope.getMes(parseInt(date_contrato[1]));
  		$scope.fecha_contrato = b+" de "+m+" del "+date_contrato[0];

  		console.log(d.objeto.contrato.tiempo_contrato);
  		if(d.objeto.contrato.tiempo_contrato < 12){						
  				$scope.tiempo_contrato=""; console.log("ES MENOR");
  		}else 
  		if(d.objeto.contrato.tiempo_contrato ==12){
  			$scope.tiempo_contrato=" ANUAL ";									console.log($scope.tiempo_contrato);
  		}else{
  			$scope.tiempo_contrato=" MULTIANUAL ";								console.log($scope.tiempo_contrato);
  		}
  		var i=0;
  		$scope.equipos_formato="";
  		$scope.equipos_f = $scope.arrUnique(d.objeto.r_conts_eqps); //console.log($scope.equipos_f);//console.log($scope.equipos_f.equipo);//console.log($scope.equipos_f[0].equipo);
  		while(i<$scope.equipos_f.length){
                $scope.equipos_formato+=$scope.equipos_f[i].equipo+" MARCA: "+$scope.equipos_f[i].marca+" MODELO: "+$scope.equipos_f[i].modelo+" NO. DE SERIE: "+$scope.equipos_f[i].numero_serie+" ";
                i++;														//console.log($scope.equipos_formato);
    	}
    	if($scope.equipos_f.length==1){
                $scope.equipos_formato=" PARA UN EQUIPO: "+$scope.equipos_formato;
    	}else{
                $scope.equipos_formato=" PARA LOS EQUIPOS: "+$scope.equipos_formato;
    	}

        $scope.objeto=d.objeto;
        $scope.equipos=d.objeto.r_conts_eqps;
        $scope.letras_monto_total=$scope.NumeroALetras(d.objeto.contrato.monto_total_contrato,d.objeto.contrato.moneda);
        $scope.letras_pago_inicial=$scope.NumeroALetras(d.objeto.contrato.monto_pago_inicial,d.objeto.contrato.moneda);
 		if(d.objeto.contrato.refacciones!=''){
    		$scope.refacciones_f=" ASI COMO "+d.objeto.contrato.refacciones;
 	   	}else{
 	   		$scope.refacciones_f="";
    	}
                    //$scope.objeto=d.objeto.contrato;
	$scope.nombre_fiscal=d.objeto.nombre_fiscal;					console.info(d.objeto.contrato.definiciones);									//$scope.refacciones_f+
	if(d.objeto.contrato.definiciones=='FISICA'){	console.info("FISICA"); 
			$scope.encabezado="\nCONTRATO DE "+d.objeto.contrato.tipo_contrato+$scope.tiempo_contrato+$scope.equipos_formato+$scope.refacciones_f+",  QUE CELEBRAN  COMO PRESTADOR DEL SERVICIO “SUMINISTRO PARA USO MEDICO Y HOSPITALARIO, S.A. DE C. V.”, EN LO SUCESIVO IDENTIFICADO COMO “SMH”, REPRESENTADA POR EL C. "+d.objeto.contrato.representante_smh+"; Y COMO SOLICITANTE “"+d.objeto.nombre_fiscal+"”, POR SU PROPIO DERECHO, EN LO SUCESIVO IDENTIFICADO COMO EL “CLIENTE”; ESTANDO PRESENTES LAS PARTES QUE LO SUJETAN A LAS SIGUIENTES DECLARACIONES Y CLAUSULAS:";
			$scope.definiciones=[{text:'\na)	EQUIPO: ',bold:true},{text:'se entiende al bien señalado en la declaración de EL CLIENTE marcada con el inciso b);\n\n'},
{text:'b)	HERRAMIENTAS: ',bold:true},{text:'se entiende, a todo instrumento propiedad de SMH y que el personal de SMH utiliza para prestar los servicios preventivos y correctivos al equipo;\n\n'},
{text:"c)	INGENIEROS: ",bold:true},{text:'se entiende, al personal designado con credencial de SMH para revisar y dictaminar el estado físico del equipo materia de este contrato, así mismo, facultado cumplir con las obligaciones contraídas;\n\n'},
//{text:'d)	RESPONSABLE: ',bold:true},{text:'se entiende, al representante, empleado o persona presente en el domicilio de EL CLIENTE al momento que se le realizan los servicios referidos en la cláusula primera de este contrato y que por ese hecho esta autorizada para aceptar de conformidad del estado físico y técnico del equipo;\n\n'},
{text:'d)	MANTENIMIENTO PREVENTIVO: ',bold:true},{text:'se entiende, a todas las actividades realizadas por el ingeniero tendientes a realizar acciones de calibración, ajustes y limpieza del equipo y tiene por objeto la conservación del mismo, en condiciones normales de operación, de conformidad con los términos de referencia del fabricante, para prevenir fallas en su funcionamiento, para lo cual SMH llevara a cabo los mantenimientos y periodicidad de los mismos, conforme al presente contrato y en su caso los anexos de referencia. Se recomendará realizar los cambios de ingeniería y las especificaciones técnicas que dicten los manuales y guias de funcionamiento entre otros, los cuales deberán ser entregados por escrito a favor de EL CLIENTE para su manejo e identificación, a efecto de mantener siempre actualizado el equipo, siempre que sean necesarios, incluyendo la revisión periódica de  seguridad  y control de funcionamiento,  ajustes, calibración y lubricación, limpieza  de partes inaccesibles para EL CLIENTE;\n\n'},
{text:'e)	MANTENIMIENTO CORRECTIVO: ',bold:true},{text:'se entiende, todo aquel que se preste a solucionar fallas que en su caso llegasen a ocurrir en el equipo, para lo cual el ingeniero de SMH corregirá las fallas conforme a las condiciones normales de funcionamiento en los términos de referencia del fabricante.'+
"\n\n Las partes convienen en que los servicios de mantenimiento preventivo y/o correctivo tienen como primordial finalidad, mantener en condiciones normales de uso el equipo"+
'\n\nExpuesto lo anterior, exhiben los documentos con los cuales acreditan la personalidad que  ostentan y se reconocen mutuamente, obligándose al tenor de las siguientes:\n'}];
			$scope.clausula_vigesima_primera="\n“EL CLIENTE” bajo protesta de decir verdad manifiesta que, conforme a lo dispuesto en el artículo 17 fracción IV de la Ley Federal para la Prevención e Identificación de Operaciones con Recursos de Procedencia Ilícita, los recursos con los que cuenta para la contratación del servicio al equipo descrito en la Declaración b) de “EL CLIENTE” son de procedencia licita, liberando a SMH de cualquier responsabilidad que pudiera surgir con motivo de la utilización de dichos recursos.";
			
	}else{
  	$scope.encabezado="\nCONTRATO DE "+d.objeto.contrato.tipo_contrato+$scope.tiempo_contrato+$scope.equipos_formato+$scope.refacciones_f+",  QUE CELEBRAN  COMO PRESTADOR DEL SERVICIO “SUMINISTRO PARA USO MEDICO Y HOSPITALARIO, S.A. DE C. V.”, EN LO SUCESIVO IDENTIFICADO COMO “SMH”, REPRESENTADA POR EL C. "+d.objeto.contrato.representante_smh+"; Y COMO SOLICITANTE “"+d.objeto.nombre_fiscal+"”, REPRESENTADA EN ESTE ACTO POR EL C. "+d.objeto.contrato.representante_cliente+", EN LO SUCESIVO IDENTIFICADO COMO EL “CLIENTE”; ESTANDO PRESENTES LAS PARTES LO SUJETAN A LAS SIGUIENTES DECLARACIONES Y CLAUSULAS:";
  }
//  	$scope.declaracion_smh="\na)	Es una persona moral debidamente constituida conforme a las leyes de los Estados Unidos Mexicanos, situación que se acredita con el testimonio de la escritura numero 52,038, de fecha 10 de Marzo de 1989, otorgada ante la fe del Notario Público, licenciado Francisco de P. Morales Díaz, titular de la Notaría 60 sesenta con ejercicio en el Distrito Federal.\n\nb)	Su representante, el "+d.objeto.contrato.representante_smh+" con el carácter de Apoderado legal cuenta con las facultades suficientes para obligarla en términos del presente convenio, situación que acredita en términos del testimonio de la escritura pública No 94,773 de fecha 24 de Octubre del 2014, otorgada ante la fe del Notario Público No. 60, 22 y 217, Lic. Francisco de P. Morales Díaz, Lic. Luis Felipe Morales Viesca y Lic. José Ángel Fernández Uría, Notarias Asociadas, de esta Ciudad de México, Distrito Federal, manifestando además, bajo protesta de decir verdad que dicho poder no le ha sido revocado ni modificado.  \n\nc)	Para los efectos del presente convenio señala como su domicilio Fiscal: DIAGONAL # 27 COL. DEL VALLE DELEGACIÓN BENITO JUAREZ, C. P. 03100 EN LA CIUDAD DE MEXICO, D. F. \n\nd)	Que cuenta con el Registro Federal de Causantes: SUM-890327-137";
  	$scope.clausula_primera="\nSMH se compromete a realizar el servicio de "+d.objeto.contrato.tipo_contrato+" sobre el equipo señalado por el CLIENTE en su solicitud de servicio. Los servicios de MANTENIMIENTO PREVENTIVO Y CORRECTIVO materia de este contrato se harán dé acuerdo con las prácticas y estándares establecidos según se describe en el Anexo 1(Descripción del Equipo) que firmado por las partes forma parte integral de este contrato. SMH se obliga a prestar servicios de MANTENIMIENTO PREVENTIVO Y CORRECTIVO, "+d.objeto.contrato.refacciones_excepciones+" , a fin de conservarlos en buen estado de funcionamiento.";//sin que el costo de este contrato incluya
  	$scope.clausula_segunda_uno="\nI.		Valor  total del Contrato: $"+$filter('number')(d.objeto.contrato.monto_total_contrato, 2)+" ("+$scope.letras_monto_total+"), más el Impuesto al Valor Agregado (I.V.A). \n\n";
  	//$scope.clausula_segunda_dos="II.	El CLIENTE pagará a SMH por los servicios de "+d.objeto.contrato.tipo_contrato+", al equipo especificado en la declaración del inciso c) de la declaración del CLIENTE y de acuerdo a lo estipulado en la cláusula séptima la cantidad de: $"+$filter('number')(d.objeto.contrato.monto_total_contrato,2)+" ("+$scope.letras_monto_total+"), más el Impuesto al Valor Agregado  (I.V.A) y será cubierto por el CLIENTE según se describe a continuación.\n\n";
  	var monto_total=d.objeto.contrato.monto_total_contrato;
  	var monto_inicial=d.objeto.contrato.monto_pago_inicial;
  	var numero_pagos=d.objeto.contrato.numeros_pagos;
  	//numero_pagos=numero_pagos-1;console.log(numero_pagos);
  	$scope.monto_pago_mensual=(monto_total-monto_inicial)/(numero_pagos); console.log($scope.monto_pago_mensual);
  	$scope.letras_pago_mensual=$scope.NumeroALetras($scope.monto_pago_mensual,d.objeto.contrato.moneda);
  	console.info(d.objeto.contrato.modalidad_pagos);
  	if(d.objeto.contrato.modalidad_pagos=='1'){ console.info("CADA MES");
  		$scope.modalidad='MES';
  	}else{	console.info("VARIOS MESES");
  		$scope.modalidad=d.objeto.contrato.modalidad_pagos+ ' MESES';
  	}
  	if(d.objeto.contrato.modalidad_pagos==0){ console.info("UNA EXHIBICION");
  		var num_pagos=1;
	  	$scope.clausula_segunda_dos="II.	El unico pago será de $"+$filter('number')(d.objeto.contrato.monto_pago_inicial, 2)+" ("+$scope.letras_pago_inicial+"), más el Impuesto al Valor Agregado (I.V.A.), y se realizará  a la firma del contrato conforme al siguiente calendario:\n\n";
  	}else{
  		var num_pagos=parseInt(d.objeto.contrato.numeros_pagos)+1;
  		$scope.clausula_segunda_dos="II.	El primer pago será de $"+$filter('number')(d.objeto.contrato.monto_pago_inicial, 2)+" ("+$scope.letras_pago_inicial+"), más el Impuesto al Valor Agregado (I.V.A.), y se realizará  a la firma del contrato, el saldo restante deberá ser cubierto cada "+$scope.modalidad+" por la cantidad de $"+$filter('number')($scope.monto_pago_mensual,2)+" ("+$scope.letras_pago_mensual+"), más el Impuesto al Valor Agregado (I.V.A.), cada uno y conforme al siguiente calendario:\n\n";
  	}
  	//$scope.clausula_segunda_tres="III.	El primer pago será de $"+$filter('number')(d.objeto.contrato.monto_pago_inicial, 2)+" ("+$scope.letras_pago_inicial+"), más el Impuesto al Valor Agregado (I.V.A.), y se realizará  a la firma del contrato, el saldo restante deberá efectuarse cada "+$scope.modalidad+" de la siguiente forma:"+numero_pagos+" pagos de $"+$filter('number')($scope.monto_pago_mensual,2)+" ("+$scope.letras_pago_mensual+"), más el Impuesto al Valor Agregado (I.V.A.), dentro de los primeros 10 días de cada mes, pagos que deberán realizarse hasta cubrir el total del adeudo por este concepto, como se relaciona a continuación:\n\n";
  	$scope.letras_interes=$scope.NumeroALetras(d.objeto.contrato.interes_moratorio_cliente,"");
  	//$scope.clausula_segunda_cuatro="III.	La falta del pago oportuno de alguno de los pagos pactados a que se refiere la fracción anterior, facultará a SMH para dar por vencido anticipadamente el plazo para el pago de la totalidad del saldo insoluto de este convenio, incluyendo el importe de todos los abonos restantes y desde entonces, se causarán intereses moratorios a la tasa del "+d.objeto.contrato.interes_moratorio_cliente+"% ("+$scope.letras_interes+" Por ciento) mensual el monto de lo incumplido, hasta la fecha en que se efectúe el pago total del adeudo. Así mismo no se podrán prorrogar los pagos o condicionarse al cumplimiento de cualquier obligación\n\n";
  	$scope.clausula_segunda_tres="III.	La falta del pago oportuno de alguno de los pagos pactados a que se refiere la fracción anterior, facultará a SMH para dar por vencido anticipadamente el plazo para el pago de la totalidad del saldo insoluto de este convenio, incluyendo el importe de todos los abonos restantes y desde entonces, se causarán intereses moratorios a la tasa del "+d.objeto.contrato.interes_moratorio_cliente+"% ("+$scope.letras_interes+" Por ciento) mensual el monto de lo incumplido, hasta la fecha en que se efectúe el pago total del adeudo. Así mismo no se podrán prorrogar los pagos o condicionarse al cumplimiento de cualquier obligación.\n\n";
  	$scope.letras_descuento=$scope.NumeroALetras(d.objeto.contrato.descuento_incumplimiento_smh,"");
	//$scope.clausula_segunda_cinco="IV.  Todos los impuestos, contribuciones, arbitrios, gravámenes presentes o futuros derivados directa o indirectamente de la aplicación del presente contrato, serán por cuenta de EL CLIENTE, salvo las que expresamente por ley deban ser por cuenta de SMH\n\n";
	$scope.clausula_segunda_cuatro="IV.  Todos los impuestos, contribuciones, arbitrios, gravámenes presentes o futuros derivados directa o indirectamente de la aplicación del presente contrato, serán por cuenta de EL CLIENTE, salvo las que expresamente por ley deban ser por cuenta de SMH.\n\n";
	//$scope.clausula_tercera_lugar_pago="El pago se realizará en  las  instalaciones  del  CLIENTE en  el domicilio ubicado en"+ d.objeto.calle_fiscal+" "+d.objeto.colonia_fiscal+", "+d.objeto.c_p_fiscal+" "+d.objeto.ciudad_fiscal+" "+d.objeto.estado_fiscal+" También queda facultado el CLIENTE para pagar en moneda nacional a la cuenta 525245, sucursal 870 con referencia 7998-85, cuenta correspondiente a la Institución de Crédito denominada Banco Nacional de México, S.A. (Banamex). En todos los casos los depósitos se harán a nombre de Suministro para Uso Médico y Hospitalario, S.A. de C.V.";
	//$scope.clausula_tercera_lugar_pago=d.objeto.contrato.lugar_pago_cliente+". También queda facultado el CLIENTE para pagar en moneda nacional a la cuenta 525245, sucursal 870 con referencia 7998-85, cuenta correspondiente a la Institución de Crédito denominada Banco Nacional de México, S.A. (Banamex). En todos los casos los depósitos se harán a nombre de Suministro para Uso Médico y Hospitalario, S.A. de C.V.";
  	$scope.letras_ubicacion=$scope.NumeroALetras(d.objeto.contrato.monto_nueva_ubicacion,'MXN');
	$scope.clausula_cuarta_dos="Cuando SMH pueda y acepte prestar el servicio en la nueva ubicación de los equipos, EL CLIENTE se obliga a pagar un incremento por la cantidad de $"+$filter('number')(d.objeto.contrato.monto_nueva_ubicacion,2)+" ("+$scope.letras_ubicacion+"), por cada 100 kilómetros después de la distancia entre el domicilio de SMH y la localización a que hace referencia el Anexo 1 (Descripción del equipo). La cantidad a que hace referencia esta cláusula corresponde al tiempo y viáticos empleados por cada ingeniero, para trasladarse más allá de la distancia que corresponde entre SMH y el lugar establecido en el Anexo 1 (Descripción del equipo) de este contrato.\n\n";
	$scope.clausula_decima_tercera_smh="a)	Si el CLIENTE no realiza puntualmente el pago de los honorarios a que tiene derecho SMH, haciendo exigibles dichos pagos al momento de la rescisión del contrato.\nb)	Si el cliente no reembolsa a SMH los gastos no incluidos, que haya erogado en virtud de sus servicios, \nc)	Cuando el equipo sea cambiado de ubicación, sin haber enterado por escrito y con anticipación a SMH";
	$scope.clausula_decima_tercera_cliente="a)	La falta de realización de la prestación de servicios profesionales objeto del presente contrato en el tiempo y forma convenidos de acuerdo al calendario de mantenimientos.\nb)	La suspensión injustificada de la  prestación de los servicios profesionales objeto del presente contrato.\nc)	La falta de responsabilidad, probidad y ética en la prestación de los servicios del presente contrato.";
	var d1=d.objeto.contrato.fecha_inicio_contrato.split("-");
	var b1=d1[2].substring(0,2);
	//var b1=d1[2].substring(0,2);
	var m1=$scope.getMes(parseInt(d1[1]));
	var fecha_inicio_contrato=d1[0]+" de "+m1+" del "+d1[2];
	var d2=d.objeto.contrato.fecha_fin_contrato.split("-");
	var b2=d2[2].substring(0,2);
	//var b2=d2[2].substring(0,2);
	var m2=$scope.getMes(parseInt(d2[1]));
	var fecha_fin_contrato=d2[0]+" de "+m2+" del "+d2[2];
	$scope.clausula_decima_sexta_uno="\nI.	Ambas partes están de acuerdo que el presente contrato tendrá una vigencia de "+d.objeto.contrato.tiempo_contrato+" MESES forzosos para ambas partes, plazo que se podrá ampliar y/o dar por terminado anticipadamente, siempre y cuando ambas partes manifieste su consentimiento por escrito con una anticipación mínima de 30 días. La vigencia del presente dará inicio el "+fecha_inicio_contrato+" y terminará el "+fecha_fin_contrato+".\n\n"+
	"II.	En caso de incumplimiento por parte de EL CLIENTE de las obligaciones adquiridas por el presente contrato, SMH a su juicio, podrá exigir el cumplimiento forzoso del presente contrato, o bien, darlo por terminado de inmediato sin que medie aviso previo o resolución judicial alguna. En cualquiera de ambos casos, SMH se reserva el derecho de exigir a EL CLIENTE el pago de daños y perjuicios que le hubiere ocasionado.\n\n"+
	"III.	En caso de suspensión del presente contrato por causas ajenas a las partes provocadas por caso fortuito o fuerza mayor tales como huelgas, paros, clausura, inundación, terremoto, actos terroristas, motines, guerras, rebeliones y disposiciones, de autoridades competentes, y demás acontecimientos, las partes convienen en hacer una liquidación de las obligaciones pendientes hasta ese momento y suspender la vigencia del convenio hasta por un plazo máximo de 30 días calendario, término dentro del cual, si desaparece el evento del caso fortuito o de fuerza mayor, el contrato surtirá todos sus efectos.\n\n"+
	"Si transcurrido el plazo de treinta (30) días de calendario señalados anteriormente, y no desaparecido en forma total y absoluta el evento de caso fortuito o fuerza mayor que originó la suspensión de la vigencia del presente convenio, las partes entonces convienen en hacer una liquidación de obligaciones pendientes hasta ese momento, si no la hubiesen efectuado con anterioridad y darán por concluido el presente instrumento.";
	$scope.pages=function(currentPage, pageCount) { return  pageCount; }; 
	//$scope.clausula_vigesima_primera="\nLas partes manifiestan que el presente contrato consta de hojas útiles tamaño carta suscritas  y rubricadas por una sola de sus caras, en el cual no existe dolo, error, violencia, lesión, mala fe o cualquier otro vicio de consentimiento que pudiese invalidarlo, toda vez que lo aquí contratado es su libre voluntad para obligarse.";
	$scope.clausula_vigesima_cuarta="\nLeído que fue el presente contrato y enteradas las partes del contenido y alcances de todas y cada una de las cláusulas que en el mismo se precisan, lo firman por duplicado las partes y los testigos cuyos nombres constan al calce, en la Ciudad de México, D.F., a "+$scope.fecha_contrato;
	//var folio=d.objeto.folio_contrato.split("-"); console.log(folio);
	//var folio1=$scope.pad(folio[0]);
  	//contratoSmh.header.table.body[0][3]="SER-"+folio1+"-"+folio[1];
  	contratoSmh.header.table.body[0][3]=d.objeto.folio_contrato;
  	//console.log(d.objeto.folio_contrato);
  	//contratoSmh.header.table.body[0][3]=d.objeto.folio_contrato;
  	contratoSmh.content[0].text='"'+d.objeto.nombre_fiscal.trim()+'"';
  	contratoSmh.content[1].text=$scope.encabezado;
  	contratoSmh.content[4].text="\n"+d.objeto.contrato.declaracion_cliente;
  	contratoSmh.content[6].text=d.objeto.contrato.declaracion_smh;
  	contratoSmh.content[8].text=$scope.definiciones;
  	contratoSmh.content[11].text=$scope.clausula_primera;
  	contratoSmh.content[13].text=$scope.clausula_segunda_uno;
  	contratoSmh.content[14].text=$scope.clausula_segunda_dos; 
 	contratoSmh.content[16].text=$scope.clausula_segunda_tres;
	var i=2;
	var j=1;
	var modalidad=d.objeto.contrato.modalidad_pagos; console.info(modalidad);
	//var num_pagos=parseInt(d.objeto.contrato.numeros_pagos)+1;
	var fecha_pago='';
	var fecha_pago_inicial='';

 		var pi1=d.objeto.contrato.fecha_pago_inicial.split("-");
  		var pi2=pi1[2].substring(0,2);
  		var pi3=$scope.getMes(parseInt(pi1[1]));
  		var pi4=parseInt(pi1[1])-1;									//console.log(pi4);
  		//$scope.fecha_pago_inicial = pi2+" - "+pi3+" - "+pi1[0];	console.log($scope.fecha_pago_inicial);//UPDATE 01-02-2017
  		$scope.fecha_pago_inicial = d.objeto.contrato.dia_final_pago+" - "+pi3+" - "+pi1[0];	console.log($scope.fecha_pago_inicial);

var fecha=30;
$scope.fecha_modalidad=30.5*modalidad; console.warn($scope.fecha_modalidad);

 	contratoSmh.content[15].table.body[0]= [{text:j+"/"+num_pagos,alignment:'center'},{text:$scope.fecha_pago_inicial,alignment:'center'}];
	while(j<num_pagos){
		if(num_pagos==2){
			console.warn("2 pagos");
			fecha=$scope.fecha_modalidad;
		}
 		fecha_pago=$scope.sumaFechas(fecha,' - ',pi1[0],pi4,d.objeto.contrato.dia_final_pago);
 		contratoSmh.content[15].table.body[j]= [{text:i+"/"+num_pagos ,alignment:'center'},{text:d.objeto.contrato.dia_final_pago+fecha_pago,alignment:'center'}],
 		console.log(j);
 		fecha=fecha+$scope.fecha_modalidad;
 		i++;
 		j++;
	}
	$scope.clausula_vigesima_segunda="\nLas partes manifiestan que el presente contrato consta de "+d.objeto.contrato.clausula_primera+" fojas útiles tamaño carta suscritas  y rubricadas por una sola de sus caras, en el cual no existe dolo, error, violencia, lesión, mala fe o cualquier otro vicio de consentimiento que pudiese invalidarlo, toda vez que lo aquí contratado es su libre voluntad para obligarse.";
	contratoSmh.content[15].table.body[j]=[{text:".",alignment:'center'},{text:".",alignment:'center'}];//console.log(fecha);
  	contratoSmh.content[17].text=$scope.clausula_segunda_cuatro;
 // 	contratoSmh.content[18].text=$scope.clausula_segunda_cinco;
 // 	contratoSmh.content[19].text=$scope.clausula_segunda_seis;  	//contratoSmh.content[21].text=$scope.clausula_tercera_lugar_pago;
  	contratoSmh.content[21].text="\n"+d.objeto.contrato.lugar_pago_cliente;
  	contratoSmh.content[23].text=$scope.clausula_cuarta_uno;
  	contratoSmh.content[24].text=$scope.clausula_cuarta_dos;
 	contratoSmh.content[25].text=$scope.clausula_cuarta_tres;
  	contratoSmh.content[27].text=$scope.clausula_quinta_uno+"\n";// + " 
  	contratoSmh.content[29].text=$scope.clausula_sexta_uno+"\n";// + " 
  	contratoSmh.content[31].text=$scope.clausula_septima_uno+"\n";// + " 
  	contratoSmh.content[32].text=$scope.clausula_septima_dos+"\n";// + " 
  	contratoSmh.content[33].text=$scope.clausula_septima_tres+"\n";// + " 
  	contratoSmh.content[34].text=$scope.clausula_septima_cuatro+"\n";// + " 
  	contratoSmh.content[35].text=$scope.clausula_septima_cinco+"\n";// + " 
  	contratoSmh.content[36].text=$scope.clausula_septima_seis+"\n";// + " 
  	contratoSmh.content[37].text=$scope.clausula_septima_siete+"\n";// + " 
  	contratoSmh.content[38].text=$scope.clausula_septima_ocho+"\n";// + " 
  	contratoSmh.content[39].text=$scope.clausula_septima_nueve+"\n";// + " 
  	contratoSmh.content[40].text=$scope.clausula_septima_diez+"\n";// + " 
  	contratoSmh.content[41].text=$scope.clausula_septima_once+"\n"+$scope.clausula_septima_doce+"\n";
  	//contratoSmh.content[42].text=$scope.clausula_septima_doce+"..\n";// + " 
  	contratoSmh.content[42].text=$scope.clausula_septima_trece+"\n";// + " 
  	contratoSmh.content[44].text=$scope.clausula_septima_catorce+"\n";// + " 
  	contratoSmh.content[46].text=$scope.clausula_octava_uno+"\n";// + " 
  	contratoSmh.content[47].text=$scope.clausula_octava_dos+"\n";// + " 
  	contratoSmh.content[48].text=$scope.clausula_octava_tres+"\n";// + " 
  	contratoSmh.content[49].text=$scope.clausula_octava_cuatro+"\n";// + " 
  	//contratoSmh.content[50].text=$scope.clausula_octava_cinco+"\n";// + " 
  	//contratoSmh.content[51].text=$scope.clausula_octava_seis+"\n";// + " 
  	contratoSmh.content[53].text=$scope.clausula_novena_uno+"\n";// 

  	contratoSmh.content[55].text=$scope.clausula_decima_cero+"\n";// + " 
  	contratoSmh.content[57].text=$scope.clausula_decima_primera+"\n";// + " 
  	contratoSmh.content[59].text=$scope.clausula_decima_segunda+"\n";// + " 
  	contratoSmh.content[61].text=$scope.clausula_decima_tercera+"\n";// + " "\n";// + " 
  	contratoSmh.content[63].text=$scope.clausula_decima_cuarta+"\n";//
  	contratoSmh.content[65].text=$scope.clausula_decima_quinta_uno+"\n";//
  	contratoSmh.content[67].text=$scope.clausula_decima_quinta_dos;
  	contratoSmh.content[69].text=$scope.clausula_decima_quinta_tres;
  	contratoSmh.content[71].text=$scope.clausula_decima_sexta_uno;
  	contratoSmh.content[73].text=$scope.clausula_decima_septima;
  	contratoSmh.content[75].text=$scope.clausula_decima_octava;
  	contratoSmh.content[77].text=$scope.clausula_decima_novena;
  	contratoSmh.content[79].text=$scope.clausula_vigesima;
  	contratoSmh.content[81].text=$scope.clausula_vigesima_primera;
  	contratoSmh.content[83].text=$scope.clausula_vigesima_segunda;
  	contratoSmh.content[85].text=$scope.clausula_vigesima_tercera;
  
  	contratoSmh.content[87].text="Calle de San Ramón 51 y/o\n Diagonal 29, \nambos en la Colonia del valle\nDelegación Benito Juárez,\nC.P. 03100, D.F.";// + " "\n";// + " 
  	contratoSmh.content[89].text=d.objeto.calle_fiscal+"\n"+d.objeto.colonia_fiscal+"\n"+d.objeto.c_p_fiscal+"\n"+d.objeto.ciudad_fiscal;// + " "\n";// + " 
  	contratoSmh.content[91].text=$scope.clausula_vigesima_cuarta+"\n";// + " "\n";// + " 
  	
 	contratoSmh.content[93].table.body[0][0].text=d.objeto.nombre_fiscal;// + " 
  	contratoSmh.content[93].table.body[0][1].text="SUMINISTRO PARA USO MEDICO Y HOSPITALARIO SA DE CV"; 
  	contratoSmh.content[93].table.body[2][0].text=d.objeto.contrato.representante_cliente;// + " 
  	contratoSmh.content[93].table.body[2][1].text=d.objeto.contrato.representante_smh;//console.log(d.objeto.r_conts_eqps);
//$scope.equipos_f = $scope.arrUnique(d.objeto.r_conts_eqps); //console.log($scope.equipos_f);//console.log($scope.equipos_f.equipo);//console.log($scope.equipos_f[0].equipo);
  	var i=0;
  	var j=1;
  	while(i<$scope.equipos_f.length){
	  	contratoSmh.content[96].table.body[j]= [{text:j+" ",alignment:'center'},{text:$scope.equipos_f[i].equipo+" "+$scope.equipos_f[i].marca,alignment:'center'},{text:$scope.equipos_f[i].modelo,alignment:'center'},{text:$scope.equipos_f[i].numero_serie,alignment:'center'}],
	  	//contratoSmh.content[95].table.body[j]= [{text:j+" ",alignment:'center'},{text:d.objeto.r_conts_eqps[i].equipo+" "+d.objeto.r_conts_eqps[i].marca,alignment:'center'},{text:d.objeto.r_conts_eqps[i].modelo,alignment:'center'},{text:d.objeto.r_conts_eqps[i].numero_serie,alignment:'center'}],
  	i++;
  	j++;
  }
  	//contratoSmh.content[97].table.body[0]= [{text:d.objeto.nombre_fiscal+"\n",alignment:'center',colSpan:4,decoration:'underline',bold:true},{},{},{}];
  	//contratoSmh.content[97].table.body[2]= [{text:d.objeto.calle_fiscal+"\n"+d.objeto.colonia_fiscal+"\n"+d.objeto.c_p_fiscal+"\n"+d.objeto.ciudad_fiscal+"\n"+d.objeto.estado_fiscal,alignment:'center',colSpan:4,bold:true},{},{},{}];
  	contratoSmh.content[97].table.body[2]= [{text:d.objeto.r_conts_eqps[0].calle+"\n"+d.objeto.r_conts_eqps[0].colonia+"\n"+d.objeto.r_conts_eqps[0].c_p+"\n"+d.objeto.r_conts_eqps[0].ciudad+"\n"+d.objeto.r_conts_eqps[0].estado,alignment:'center',colSpan:4,bold:true},{},{},{}];
  	contratoSmh.content[97].table.body[4]= [{text:d.objeto.contrato.conclusion+"\n",alignment:'center',colSpan:4,bold:true},{},{},{}];
  	contratoSmh.content[100].text="\nPROGRAMA DE "+d.objeto.contrato.tipo_contrato+"\n";// + " "\n";// + " 
  	//contratoSmh.content[95].table.body[j+2]= [{text:d.objeto.nombre_fiscal,alignment:'center',colSpan:4,decoration:'underline'},{},{},{}];
  	var i=0;
  	var j=1;
  	var l=1;
  	var m=0;
  	var z=1;
  	var xx=d.objeto.r_conts_eqps[m].numero_serie;
  	while(i<d.objeto.r_conts_eqps.length){	
  		if(xx==d.objeto.r_conts_eqps[m].numero_serie){
  		}else{console.info(z);
  		 z=1;
  		 xx=d.objeto.r_conts_eqps[m].numero_serie;
  		}
  			 console.info(i);
	  	contratoSmh.content[101].table.body[j]= [	
	  												{text:d.objeto.r_conts_eqps[i].calle+" "+d.objeto.r_conts_eqps[i].colonia+" "+d.objeto.r_conts_eqps[i].c_p+" "+d.objeto.r_conts_eqps[i].ciudad+" "+d.objeto.r_conts_eqps[i].estado,alignment:'center'},
	  												{text:d.objeto.r_conts_eqps[i].equipo+" "+d.objeto.r_conts_eqps[i].marca+" "+d.objeto.r_conts_eqps[i].modelo,alignment:'center'},
	  												{text:"PREVENTIVO: "+z,alignment:'center'},
	  												{text:d.objeto.r_conts_eqps[i].fecha_inicio+" \n "+d.objeto.r_conts_eqps[i].fecha_fin,alignment:'center'},
	  												//{text:":"+z+" -- "+d.objeto.r_conts_eqps[i].fecha_inicio+" "+d.objeto.r_conts_eqps[i].fecha_fin,alignment:'center'},
	  												{text:d.objeto.r_conts_eqps[i].hora_atencion,alignment:'center'}
	  											],
  	z++;
  	i++;
  	j++;
  	m++;
  }

  	contratoSmh.footer=function(currentPage, pageCount) { return [{
                      margin:[40,0],
                      table: { widths: [45,45,45,45,45,45,45,45,45,45], 
                               body: [
                               [{text:'',colSpan:2},{},{text:'Página: '+ currentPage.toString() + ' de ' + pageCount,colSpan:6,fontSize:8,alignment:'center'},{},{},{},{},{},{text:'',colSpan:2},{}],
                               [{text:d.objeto.instituto,colSpan:2,fontSize:8},{},{text:'',colSpan:6},{},{},{},{},{},{text:'',colSpan:2},{}]
                               ]
                             }, layout: 'noBorders'
                      }]; 
                    };  
    pdfMake.createPdf(contratoSmh).open();
}
    });
  }



$scope.sumaFecha = function(d,n){
 	var Fecha = new Date();
 	var sFecha = fecha || (Fecha.getDate() + "-" + (Fecha.getMonth() +1) + "-" + Fecha.getFullYear());
 	var sep = sFecha.indexOf('/') != -1 ? '/' : '-'; 
 	var aFecha = sFecha.split(sep);
 	var fecha = aFecha[2]+'-'+aFecha[1]+'-'+aFecha[0];
 	fecha= new Date();
 	fecha.setDate(fecha.getDate()+(parseInt(d)));
 	var anno=fecha.getFullYear();
 	var mes= fecha.getMonth();//+1;
 	var dia= fecha.getDate();
 	var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
 	//mes = (mes < 10) ? ("0" + mes) : mes;
 	dia = (dia < 10) ? ("0" + dia) : dia;
 	//var fechaFinal = dia+sep+meses[mes]+sep+anno;
 	var fechaFinal = n+meses[mes]+n+anno;
 	return (fechaFinal);
 }
 $scope.sumaFechas = function(d,n,ano,mes,dia){ console.log(ano+mes+dia);
 	var Fecha = new Date(ano,mes,dia);console.log(Fecha);
 	var sFecha = fecha || (Fecha.getDate() + "-" + (Fecha.getMonth() +1) + "-" + Fecha.getFullYear());
 	var sep = sFecha.indexOf('/') != -1 ? '/' : '-'; 
 	var aFecha = sFecha.split(sep);
 	var fecha = aFecha[2]+'-'+aFecha[1]+'-'+aFecha[0];
 	fecha= new Date(ano,mes,dia); console.log(fecha);
 	fecha.setDate(fecha.getDate()+(parseInt(d)));
 	var anno=fecha.getFullYear();
 	var mes= fecha.getMonth();//+1;
 	var dia= fecha.getDate();
 	var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
 	//mes = (mes < 10) ? ("0" + mes) : mes;
 	dia = (dia < 10) ? ("0" + dia) : dia;
 	//var fechaFinal = dia+sep+meses[mes]+sep+anno;
 	var fechaFinal = n+meses[mes]+n+anno;
 	return (fechaFinal);
 }

 $scope.getMes = function(mes,n){
 var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
 var fechaFinal = meses[mes-1];
 return (fechaFinal);
 }

 $scope.arrUnique =function (sl) {
            console.log(sl);
        var out = [];
        for (var i = 0, l = sl.length; i < l; i++) {
            var unique = true;
            for (var j = 0, k = out.length; j < k; j++) {
                if ((sl[i].numero_serie === out[j].numero_serie)) {
                    unique = false; console.log(unique);
                }
            }
            if (unique) {
                out.push(sl[i]);
            }
        }
        return out;
        }

$scope.pad=function (number) { console.log(number);
  if (number<=9999) { number = ("000"+parseInt(number)).slice(-4); }
  return number;
}

})