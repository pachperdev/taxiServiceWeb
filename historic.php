<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="tablet.css" media="only screen and (min-width:768px)">
    <link rel="stylesheet" href="desktop.css" media="only screen and (min-width:1024px)">
    <title>Taxi Service | Historic</title>
    <style>
        #map {
            width: 100%;
            height: 540px;
            box-shadow: 5px 5px 5px #888;
        }
    </style>
</head>

<body>
    <header class="header">
        <figure class="logo">
            <strong>Taxi Service</strong>
        </figure>
        <nav class="navbar">
            <ul class="menu">
                <li>
                    <a href="">Home</a>
                </li>
                <li>
                    <a href="realTime.php">Real Time</a>
                </li>
                <li>
                    <a href="historic.php">Historic</a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <aside class="control-bar">
            
            <h2>Historical Travels</h2>
            <div class="head">
                <center>
                    <label for="start">Desde:</label>
                    <input type="date" id="FechaIn" name="FechaIn" value="2021-10-07" min="2021-01-01" max="2022-12-31">

                    <input type="time" id="MinIn" name="MinIn" value="02:30" min="00:00" max="24:00" required>
                    <br><br>
                    <label for="appt">Hasta:</label>
                    <input type="date" id="FechaFn" name="FechaFn" value="2021-10-07" min="2021-01-01" max="2022-12-31">

                    <input type="time" id="MinFn" name="MinFn" value="23:30" min="00:00" max="24:00" required>
                    <br><br>
                    <p><select id="Taxi" name="Taxi" style="height: 38px; width:75px;">
                            <option value="1">Taxi 1</option>
                            <option value="2">Taxi 2</option>
                            <option value="3">Ambos</option>
                        </select></p>
                    <br>
                    <p><button type="button" values="Enviar" name="btn1" id='enviar'>Enviar </button>
                        <button type="button" id='Boton'>Centrar</button>
                    </p>
                </center>
            </div>
            <br>
            <script>
                const FI = document.getElementById('FechaIn');
                FI.addEventListener('focusout', (event) => {
                    document.getElementById('FechaFn').min = document.getElementById('FechaIn').value;

                    if (document.getElementById('FechaFn').min > document.getElementById('FechaFn').value) {
                        document.getElementById('FechaFn').value = document.getElementById('FechaFn').min;
                    };
                });
                const HF = document.getElementById('MinFn');
                HF.addEventListener('focusin', (event) => {
                    if (document.getElementById('FechaFn').value == document.getElementById('FechaIn').value) {
                        document.getElementById('MinFn').min = document.getElementById('MinIn').value;
                    }
                });
            </script>
            <div style="margin: auto; width: 100%;">
                <div style="float: left; width: 33%;">
                    <table align="center" , class="tg" width="100%" hidden id="TablaT1">
                        <tbody>
                            <tr>
                                <td class="tg-baqh">
                                    <FONT COLOR="blue">TAXI 1</FONT>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-baqh">
                                    <div id='dateid1'></div>, RPM: <div id='rpmid'></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="float: left; width: 33%;">
                    <table align="center" , class="tg" width="100%">
                        <tbody>
                            <tr>
                                <td class="tg-9wq8">
                                    <div class="slider-wrapper" id="range1div" hidden>
                                        <input type="range" id="range1" min="0" step="1" value="0"> Taxi 1
                                    </div>

                                    <div class="slider-wrapper" id="range2div" hidden>
                                        <input type="range" id="range2" min="0" step="1" value="0"> Taxi 2
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div style="float: left; width: 33%;">
                    <table align="center" , class="tg" width="100%" hidden id="TablaT2">
                        <tbody>
                            <tr>
                                <td class="tg-baqh">
                                    <FONT COLOR="red">TAXI 2</FONT>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-baqh">
                                    <div id='dateid2'>, RPM: NaN
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="clear: both;"></div>
            </div>
        </aside>
        <section class="content">
            <div class="mapa">
                <div id='map'></div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <p>Design with ❤️ by pachperdev</p>
    </footer>
</body>
</html>

<script src="Icons.js"></script>;

<script type="text/javascript">
    $(document).ready(function() {

        var map = L.map('map').setView([0, 0], 15);
        var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
        OpenStreetMap_Mapnik.addTo(map);

        Inicio1 = new L.marker([0, 0], {
            icon: inicio2
        });
        Inicio2 = new L.marker([0, 0], {
            icon: inicio
        });
        Fin1 = new L.marker([0, 0], {
            icon: fin
        });
        Fin2 = new L.marker([0, 0], {
            icon: fin
        });
        Apuntador1 = new L.marker([0, 0], {
            icon: pointer
        });
        Apuntador2 = new L.marker([0, 0], {
            icon: pointer2
        });

        polyline1 = L.polyline([]);
        polyline2 = L.polyline([], {
            color: 'red'
        });
        var Mensaje_date1 = new String("");
        var Mensaje_rpm1 = new String("");
        var Mensaje_date2 = new String("");

        const Enviar = document.getElementById('enviar');
        Enviar.addEventListener('click', (event) => {

            $.post('Consulta.php', {
                FechaIn: document.getElementById('FechaIn').value,
                MinIn: document.getElementById('MinIn').value,
                FechaFn: document.getElementById('FechaFn').value,
                MinFn: document.getElementById('MinFn').value
            }, function(data) {
                Marcadores1 = [];
                Marcadores2 = [];
                polyline1.setLatLngs([]);
                polyline2.setLatLngs([]);
                M1 = 0;
                M2 = 0;
                Tabla = JSON.parse(data);

                for (i = 0; i < Tabla.length; i++) {
                    if (Tabla[i][4] == 1) {
                        Marcadores1.push(Tabla[i]);
                        polyline1.addLatLng([parseFloat(Tabla[i][0]), parseFloat(Tabla[i][1])]);
                        M1++;
                    } else {
                        Marcadores2.push(Tabla[i]);
                        polyline2.addLatLng([parseFloat(Tabla[i][0]), parseFloat(Tabla[i][1])]);
                        M2++;
                    }
                }

                if (M1 != 0) {
                    Inicio1.setLatLng([parseFloat(Marcadores1[0][0]), parseFloat(Marcadores1[0][1])]);
                    Fin1.setLatLng([parseFloat(Marcadores1[Marcadores1.length - 1][0]), parseFloat(Marcadores1[Marcadores1.length - 1][1])]);
                }
                if (M2 != 0) {
                    Inicio2.setLatLng([parseFloat(Marcadores2[0][0]), parseFloat(Marcadores2[0][1])]);
                    Fin2.setLatLng([parseFloat(Marcadores2[Marcadores2.length - 1][0]), parseFloat(Marcadores2[Marcadores2.length - 1][1])]);
                }

                Ntaxi = document.getElementById('Taxi').value;
                if (Ntaxi == 1) {
                    $('#TablaT1').show();
                    $('#TablaT2').hide();
                    $('#range1div').show();
                    $('#range2div').hide();

                    map.addLayer(polyline1);
                    map.removeLayer(polyline2);
                    map.addLayer(Fin1);
                    map.removeLayer(Fin2);
                    map.addLayer(Inicio1);
                    map.removeLayer(Inicio2);
                    map.addLayer(Apuntador1);
                    map.removeLayer(Apuntador2);

                };
                if (Ntaxi == 2) {
                    $('#TablaT1').hide();
                    $('#TablaT2').show();
                    $('#range1div').hide();
                    $('#range2div').show();

                    map.addLayer(polyline2);
                    map.removeLayer(polyline1);
                    map.addLayer(Fin2);
                    map.removeLayer(Fin1);
                    map.addLayer(Inicio2);
                    map.removeLayer(Inicio1);
                    map.addLayer(Apuntador2);
                    map.removeLayer(Apuntador1);

                };
                if (Ntaxi == 3) {
                    $('#TablaT1').show();
                    $('#TablaT2').show();
                    $('#range1div').show();
                    $('#range2div').show();
                    map.addLayer(polyline1);
                    map.addLayer(Fin1);
                    map.addLayer(Inicio1);
                    map.addLayer(polyline2);
                    map.addLayer(Fin2);
                    map.addLayer(Inicio2);
                    map.addLayer(Apuntador1);
                    map.addLayer(Apuntador2);
                };

                var recorrido1 = document.getElementById('range1');
                recorrido1.setAttribute("max", Marcadores1.length - 1);

                var recorrido2 = document.getElementById('range2');
                recorrido2.setAttribute("max", Marcadores2.length - 1);

                var range1 = document.getElementById('range1');
                var range2 = document.getElementById('range2');
                if (M1 != 0) {

                    Mensaje_date1 = Marcadores1[0][2];
                    Mensaje_rpm1 = Marcadores1[0][3];
                    Apuntador1.setLatLng([parseFloat(Marcadores1[0][0]), parseFloat(Marcadores1[0][1])]);
                    range1.addEventListener('input', function() {
                        var valor1 = range1.value;

                        Mensaje_date1 = Marcadores1[valor1][2];
                        Mensaje_rpm1 = Marcadores1[valor1][3];
                        Apuntador1.setLatLng([parseFloat(Marcadores1[valor1][0]), parseFloat(Marcadores1[valor1][1])]);
                        $("#rpmid").text(Mensaje_rpm1);
                        $("#dateid1").text(Mensaje_date1);
                    });
                }
                if (M2 != 0) {
                    Mensaje_date2 = Marcadores2[0][2];
                    Apuntador2.setLatLng([parseFloat(Marcadores2[0][0]), parseFloat(Marcadores2[0][1])]);
                    range2.addEventListener('input', function() {
                        var valor2 = range2.value;
                        Mensaje_date2 = Marcadores2[valor2][2];
                        Apuntador2.setLatLng([parseFloat(Marcadores2[valor2][0]), parseFloat(Marcadores2[valor2][1])]);
                        $("#dateid2").text(Mensaje_date2);
                    });
                }

                if (document.getElementById('Taxi').value == 1) {
                    map.fitBounds(polyline1.getBounds());
                };
                if (document.getElementById('Taxi').value == 2) {
                    map.fitBounds(polyline2.getBounds());
                };

            });
        });

        const boton = document.getElementById('Boton');
        boton.addEventListener('click', (event) => {
            if (document.getElementById('Taxi').value == 1) {
                map.fitBounds(polyline1.getBounds());
            };
            if (document.getElementById('Taxi').value == 2) {
                map.fitBounds(polyline2.getBounds());
            };
        });

    });
</script>