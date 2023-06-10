<!-- style -->
<style>
  a {
    text-decoration: none;
  }

  .h-icon {
    opacity: .5;
    width: 45px;
    height: 45px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .h-link {

    cursor: pointer;
  }

  .h-link:hover {
    text-decoration: underline;

  }

  .h-card {
    /* border: none; */
    border-left: 5px solid #198754;
    border-color: #19875499;
  }
</style>
<!-- html page content -->


<script src="<?= assets("vendor/diag/diag-1/Chart.min.js") ?>"></script>

<div class="container-fluid p-0 py-2">
  <h3 class="text text-dark">Dashboard</h3>

  <div class="row m-0 ">
    <?php foreach ($counts as $key => $value): ?>
      <div class=" col-lg-3 col-md-6 p-1">
        <div class="card h-card shadow-sm py-3 px-3 d-flex flex-row align-items-center justify-content-between">
          <div>
            <a href="<?= route("admin/$key") ?>">
              <div class="text fs-5 text-success h-link">
                <?= $key ?>
              </div>
            </a>
            <div class="fs-4 fw-bold text-secondary">
              <?= $value['total'] ?>
            </div>
          </div>
          <div class="alert-success rounded rounded-circle h-icon">
            <i class="bi bi-<?= $value['icon'] ?> fs-4"></i>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="row m-0">

    <?php if (isset($charts['populations'])): ?>
      <div class="col-md-6 p-1 ">
        <div class="card p-2">
          <h6>Changements dans la population au cours des 6 derniers mois</h6>
          <canvas id="populations-canvas"></canvas>
        </div>
      </div>
      <script>
        const populations = <?= json_encode($charts['populations']) ?>;
        const populationsContext = document.getElementById(`populations-canvas`);

        const labels = populations.months;
        new Chart(populationsContext, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: `homme`,
              data: Object.values(populations.H),
              borderWidth: 2,
              borderColor: 'blue'
            },
            {
              label: `femme`,
              data: Object.values(populations.F),
              borderWidth: 2,
              borderColor: 'pink'
            },
            ]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
    <?php endif; ?>
    <?php if (isset($charts['katafa'])): ?>
      <div class="col-md-6 p-1 ">
        <div class="card  p-2">
          <h6>Densité de population au cours des 12 derniers mois</h6>
          <canvas id="katafa-chart"></canvas>
        </div>
      </div>
      <script>
        new Chart(document.getElementById("katafa-chart"), {
          type: "doughnut",
          data: {
            labels: [
              'Saknia',
              'Maamoura'
            ],
            datasets: [{
              // label: 'My First Dataset',
              data: [<?= $charts['katafa']['S'] ?>, <?= $charts['katafa']['M'] ?>],
              backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)'
              ],
              // hoverOffset: 4
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
    <?php endif; ?>
    <?php if (isset($charts['articles'])): ?>
      <div class="col-md-6 p-1 ">
        <div class="card p-2">
          <h6>Nombre d'articles au cours de l'année</h6>
          <canvas id="articles-canvas"></canvas>
        </div>
      </div>
      <script>
        const articlesChartData = <?= json_encode($charts['articles']) ?>;
        const articlesContext = document.getElementById(`articles-canvas`);

        new Chart(articlesContext, {
          type: 'line',
          data: {
            labels: Object.keys(articlesChartData),

            datasets: [{
              label: `nombre de articles par mois`,
              data: Object.values(articlesChartData),
              borderWidth: 2,
              borderColor: '#19875499'
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
    <?php endif; ?>
    <?php if (isset($charts['rapports'])): ?>
      <div class="col-md-6 p-1 ">
        <div class="card p-2">
          <h6>Nombre de rapports au cours de l'année</h6>
          <canvas id="rapports-canvas"></canvas>
        </div>
      </div>
      <script>
        const rapportsChartData = <?= json_encode($charts['rapports']) ?>;
        const rapportsContext = document.getElementById(`rapports-canvas`);

        new Chart(rapportsContext, {
          type: 'line',
          data: {
            labels: Object.keys(rapportsChartData),

            datasets: [{
              label: `nombre de rapports par mois`,
              data: Object.values(rapportsChartData),
              borderWidth: 2,
              borderColor: '#19875499'
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
    <?php endif; ?>
  </div>
</div>