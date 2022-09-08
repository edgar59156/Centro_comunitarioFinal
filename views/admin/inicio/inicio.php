<!-- Section: Main chart -->
<section class="mb-4 ">
  <div class="card mb-12">
    <div class="card-header py-3">
      <h5 class="mb-0 text-center"><strong>Talleres</strong></h5>
    </div>

    <div class="row justify-content-md-center align-items-center">
      <div class="card-body ">

      
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load("current", {
              packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Talleres/Eventos', '#'],
                ['Talleres', <?php echo $datosTaller ?>],
                ['Eventos', <?php echo $datosEvento ?>]
              ]);

              var options = {
                title: 'Eventos y talleres totales',
                is3D: true,
              };

              var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
              chart.draw(data, options);
            }
          </script>
          <div class="offset-md-3" id="piechart_3d" style="width: 900px; height: 500px;"></div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Main chart -->
<!-- Section: Main chart -->
<section class="mb-4 ">
  <div class="card mb-12">
    <div class="card-header py-3">
      <h5 class="mb-0 text-center"><strong>Usuarios totales</strong></h5>
    </div>

    <div class="row justify-content-md-center align-items-center">
      <div class="card-body ">


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {
            packages: ['corechart']
          });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Usuarios", "Numero", {
                role: "style"
              }],
              ["Usuarios", <?php echo $datosUsuario ?>, "#b87333"],
              ["Clientes", <?php echo $datosCliente ?>, "silver"],
              ["Talleristas", <?php echo $datosTallerista ?>, "gold"]
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
              {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
              },
              2
            ]);

            var options = {
              title: "Usuarios registrados",
              width: 600,
              height: 400,
              bar: {
                groupWidth: "95%"
              },
              legend: {
                position: "none"
              },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
          }
        </script>
        <div class="offset-md-4" id="columnchart_values" style="width: 900px; height: 300px;"></div>
        <br>
        <br>
        <br>
      </div>
    </div>
  </div>
</section>
<!-- Section: Main chart -->