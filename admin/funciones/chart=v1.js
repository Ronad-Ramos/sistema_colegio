
info();

function info(){

    var v = "FECHA_REGISTRO";
    var vv = "FECHA_REGISTRO";

    var parametros = { "tipo" : v };
    $.ajax({
        data:  parametros,
        url:   'controles/code=datos_ajax_v1.php',
        type:  'post',
        beforeSend: function () {
            $('#contenedorGrafica').html('Cargando...');
        },
        success:  function (response) {

          $('#contenedorGrafica').html('');

            var dataObj = JSON.parse(response);
            var registros = dataObj.datos, etiquetas = dataObj.etiquetas;
        
            var opciones = {
                // Los colores. En este caso sólo es uno pero puede haber más si tenemos más datos
                // por ejemplo si mostrásemos del 2018 y 2019
                colors: ['#8BC34A'],
                chart: {
                    height: 380, //La altura. La anchura es tomada como el 100 % del padre
                    type: 'area',// Es una gráfica de tipo area
                },
                stroke: {
                    //La curvatura al unir los puntos
                    //smooth o straight. smooth es más suave y straight es rígido
                    curve: 'smooth',
                },
                dataLabels: {
                    enabled: false, // No mostrar las etiquetas sin hacer hover
                },
                series: [{
                    name: "Total de registros: ", // Lo que describe a nuestros datos
                    data: registros
                },
                ],
                title: {
                    text: 'Registros del año segun el mes', //El título como cadena
                    align: 'left', //Alineación. Puede ser left, right o center
                },
                subtitle: {
                    text: 'v.d.g/reporte.db',//Subtítulo. Si no queremos incluirlo, eliminamos todo este objeto
                    align: 'left', //La alineación aplica igual que para el título
                },
                xaxis: {
                    // Lo que irá en el eje X.
                    // Su longitud debe ser igual a la de los datos
                    // Es decir, si nuestros datos son 12, las etiquetas deben ser 12
                    categories: etiquetas,
                },
                yaxis: {
                    //Si queremos que el eje y esté a la izquierda lo dejamos en false. Si queremos
                    // que esté a la derecha, pues en true
                    opposite: true,
                }
            };
            var elemento = document.querySelector("#contenedorGrafica");//El id del div, con todo y #
            var grafica = new ApexCharts(elemento, opciones);
            grafica.render();// La gráfica no será creada hasta llamar a este método

                }
            });

}