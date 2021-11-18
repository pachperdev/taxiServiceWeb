
  
  $(document).ready(function() {

    Ntaxi=1;
    var map = L.map('map').setView([0, 0], 15);
    var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    OpenStreetMap_Mapnik.addTo(map);
    polyline1= L.polyline([]).addTo(map); 
    polyline2= L.polyline([],{color:'red'}); 

    var inicio = new L.Icon({
      iconUrl: 'startpoint.png',
      shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
      iconSize: [40, 40],
      iconAnchor: [10, 20],
      popupAnchor: [0, 0],
      shadowSize: [41, 41]
    });

    var inicio2 = new L.Icon({
      iconUrl: 'startpoint2.png',
      iconSize: [40, 40],
      iconAnchor: [10, 20],
      popupAnchor: [0, 0]
    });

    var fin = new L.Icon({
      iconUrl: 'finalpoint.png',
      shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
      iconSize: [40, 40],
      iconAnchor: [12, 30],
      popupAnchor: [1, -34],
      shadowSize: [41, 41]
    });


    Marcador1 = L.marker([0, 0], {
      icon: fin
    }).addTo(map)
    Marcador2 = L.marker([0, 0], {
        icon: fin
      })

   
    $('#coordenadas1').load("./Latitud1.php", function() {

        var coordenadas1 = ($("#coordenadas1").text());

        var coordenadas_1 = coordenadas1.split("_");

        var Latitud1 = "" + coordenadas_1[1] + "";

        var Longitud1 = "" + coordenadas_1[0] + "";
  
        Inicio1 = L.marker([parseFloat(Latitud1), parseFloat(Longitud1)], {
          icon: inicio2
        }).addTo(map);
  
      });

    $('#coordenadas2').load("./Latitud2.php", function() {

        var coordenadas2 = ($("#coordenadas2").text());

        var coordenadas_2 = coordenadas2.split("_");

        var Latitud2 = "" + coordenadas_2[1] + "";

        var Longitud2 = "" + coordenadas_2[0] + "";
  
        Inicio2 = L.marker([parseFloat(Latitud2), parseFloat(Longitud2)], {
          icon: inicio
        })
  
      });
      i=2;
    setInterval(

      function() {
        $('#rpmid').load("rpm.php");
          if(i==1){i=2}else{i=1};
        $('#time'+i).load("./Fecha"+i+".php", function() {
          var date = new Date(parseFloat($("#time"+i).text()));
          
          var date2 = date.toString();

          var Fecha_Hora = date2.split(" ");

          var Fecha = "" + Fecha_Hora[0] + " - " + Fecha_Hora[1] + " - " + Fecha_Hora[2] + " - " + Fecha_Hora[3] + "";

          var Hora= "" + Fecha_Hora[4] + "";
          $('#Fecha'+i).text(Fecha);
          $('#Hora'+i).text(Hora);
        });
        $('#coordenadas'+i).load("./Latitud"+i+".php", function() {
          var coordenadas = ($("#coordenadas"+i).text());

          var coordenadas_1 = coordenadas.split("_");

          var Latitud = "" + coordenadas_1[1] + "";

          var Longitud = "" + coordenadas_1[0] + "";

          $('#Latitud'+i).text(Latitud);
          $('#Longitud'+i).text(Longitud);

          if (i==1){
            polyline1.addLatLng([parseFloat($('#Latitud1').text()), parseFloat($('#Longitud1').text())]);
            Marcador1.setLatLng([parseFloat($('#Latitud1').text()), parseFloat($('#Longitud1').text())]);
          }else{
            polyline2.addLatLng([parseFloat($('#Latitud2').text()), parseFloat($('#Longitud2').text())]);
            Marcador2.setLatLng([parseFloat($('#Latitud2').text()), parseFloat($('#Longitud2').text())]);
          }
        });
        if(Ntaxi!=3){
        map.panTo(new L.LatLng(parseFloat($('#Latitud'+Ntaxi).text()), parseFloat($('#Longitud'+Ntaxi).text())));
        }

      }, 500
    );

  

  const taxi = document.getElementById('Taxi');
      taxi.addEventListener('change', (event) => {
        Ntaxi=document.getElementById('Taxi').value;
        if (Ntaxi==1){
            $('#TablaT1').show();
            $('#TablaT2').hide();
            map.addLayer(polyline1);
            map.removeLayer(polyline2);
            map.addLayer(Marcador1);
            map.removeLayer(Marcador2);
            map.addLayer(Inicio1);
            map.removeLayer(Inicio2);
        };
        if (Ntaxi==2){
            $('#TablaT1').hide();
            $('#TablaT2').show();

            map.addLayer(polyline2);
            map.removeLayer(polyline1);
            map.addLayer(Marcador2);
            map.removeLayer(Marcador1);
            map.addLayer(Inicio2);
            map.removeLayer(Inicio1);

        }; 
        if (Ntaxi==3){
            $('#TablaT1').show();
            $('#TablaT2').show();
            map.addLayer(polyline1);
            map.addLayer(Marcador1);
            map.addLayer(Inicio1);
            map.addLayer(polyline2);
            map.addLayer(Marcador2);
            map.addLayer(Inicio2);
        };
        
      });
});
