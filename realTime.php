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
    <title>Taxi Service | Real Time</title>
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

            <h2>Real time Location</h2>
            <div hidden id='time1'></div>
            <div hidden id='coordenadas1'></div>
            <div hidden id='time2'></div>
            <div hidden id='coordenadas2'></div>
            
            <center>
            <div id="TablaT1" class="TABLAT1">
                <table align="center" , class="tg" ,>
                    <tbody>
                        <tr>
                            <td class="tg-9wq8" rowspan=2>
                                <FONT COLOR="red">TAXI 1</FONT>
                            </td>
                            <td class="tg-baqh">FECHA</td>
                            <td class="tg-baqh">HORA</td>
                            <td class="tg-baqh">LONGITUD</td>
                            <td class="tg-baqh">LATITUD</td>
                            <td class="tg-baqh">RPM</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">
                                <div id='Fecha1'></div>
                            </td>
                            <td class="tg-0lax">
                                <div id='Hora1'></div>
                            </td>
                            <td class="tg-0lax">
                                <div id='Longitud1'></div>
                            </td>
                            <td class="tg-0lax">
                                <div id='Latitud1'></div>
                            </td>
                            <td class="tg-0lax">
                                <div id='rpmid'></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </center>
            <br>
            <center>
            <div id="TablaT2" hidden>
                <table align="center" , class="tg" ,>
                    <tbody>
                        <tr>
                            <td class="tg-9wq8" rowspan=2>
                                <FONT COLOR="blue">TAXI 2</FONT>
                            </td>
                            <td class="tg-baqh"> FECHA</td>
                            <td class="tg-baqh">HORA</td>
                            <td class="tg-baqh">LONGITUD</td>
                            <td class="tg-baqh">LATITUD</td>
                            <td class="tg-baqh">RPM</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">
                                <div id='Fecha2'></div>
                            </td>
                            <td class="tg-0lax">
                                <div id='Hora2'></div>
                            </td>
                            <td class="tg-0lax">
                                <div id='Longitud2'></div>
                            </td>
                            <td class="tg-0lax">
                                <div id='Latitud2'></div>
                            </td>
                            <td class="tg-0lax">No disponible</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </center>

            <div class="form">
            </div>
            <center>
                <select id="Taxi" style="height: 50px; width:100px;">
                    <option value=1> Taxi 1 </option>
                    <option value=2> Taxi 2 </option>
                    <option value=3> Ambos </option>
                </select>
            </center>
            <br>
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
<script src="RT.js"></script>