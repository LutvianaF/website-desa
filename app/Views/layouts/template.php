<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= esc($meta_title ?? 'Website Desa') ?></title>
  <meta name="description" content="<?= esc($meta_desc ?? 'Website resmi desa yang menyajikan informasi, agenda, dan layanan masyarakat.') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>" />
  <!-- Bootstrap CSS CDN -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="icon" href="<?= base_url('favicon.ico') ?>">

  <!-- Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin="" />

</head>

<body>
  <header>
    <?= $this->include('layouts/navbar'); ?>
  </header>

  <main class="container py-5">
    <?= $this->renderSection('content') ?>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white py-5">
    <?= $this->include('layouts/footer'); ?>
  </footer>

  <!-- Bootstrap JS Bundle (untuk dropdown) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/js/script.js'); ?>"></script>
  <script src="<?= base_url('assets/js/chart.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
  <script>
    const labels = [
      "Pendidikan",
      "Transportasi",
      "Kesehatan",
      "Ekonomi",
      "Sosial & Budaya",
      "Lingkungan",
    ];
    const dataValues = [86, 63, 59, 43, 23, 13];
    const colors = [
      "#9b59b6",
      "#ff9999",
      "#66b3ff",
      "#ffcc99",
      "#99ccff",
      "#99ff99",
    ];
    const total = dataValues.reduce((a, b) => a + b, 0);

    const options = {
      responsive: true,
      cutout: "30%",
      plugins: {
        legend: {
          position: "right",
          labels: {
            usePointStyle: true,
          },
        },
        datalabels: {
          color: "#000",
          font: {
            weight: "bold",
            size: 10
          },
          formatter: (value, ctx) => {
            let percentage = ((value / total) * 100).toFixed(2) + "%";
            return value + " (" + percentage + ")";
          },
        },
      },
    };

    // Plugin untuk teks tengah
    const centerText = {
      id: "centerText",
      beforeDraw: (chart) => {
        const {
          ctx,
          chartArea: {
            width,
            height
          },
        } = chart;
        ctx.save();
        ctx.font = "bold 22px Arial";
        ctx.fillStyle = "#000";
        ctx.textAlign = "center";
        ctx.textBaseline = "middle";
        ctx.fillText(total, width / 2, height / 2);
      },
    };

    // Chart Sarana
    new Chart(document.getElementById("chartSarana"), {
      type: "doughnut",
      data: {
        labels: labels,
        datasets: [{
          data: dataValues,
          backgroundColor: colors
        }],
      },
      options: options,
      plugins: [ChartDataLabels, centerText],
    });

    // Chart Prasarana
    new Chart(document.getElementById("chartPrasarana"), {
      type: "doughnut",
      data: {
        labels: labels,
        datasets: [{
          data: dataValues,
          backgroundColor: colors
        }],
      },
      options: options,
      plugins: [ChartDataLabels, centerText],
    });
  </script>
  <script>
    // Chart SARANA
    if (typeof saranaData !== "undefined") {
      new Chart(document.getElementById("chartSarana"), {
        type: "bar",
        data: {
          labels: Object.keys(saranaData),
          datasets: [{
            label: "Jumlah",
            data: Object.values(saranaData)
          }]
        }
      });
    }

    // Chart PRASARANA
    if (typeof prasaranaData !== "undefined") {
      new Chart(document.getElementById("chartPrasarana"), {
        type: "bar",
        data: {
          labels: Object.keys(prasaranaData),
          datasets: [{
            label: "Jumlah",
            data: Object.values(prasaranaData)
          }]
        }
      });
    }
  </script>

  <!-- chart js penduduk -->
  <script>
    const ctxPenduduk = document.getElementById("myChartPenduduk").getContext("2d");
    const myChartPenduduk = new Chart(ctxPenduduk, {
      type: "line",
      data: {
        labels: ["MEI", "JUNI", "JULI", "AGUSTUS"],
        datasets: [{
            label: "Total",
            data: [560, 570, 580, 590],
            borderColor: "blue",
            backgroundColor: "rgba(0, 0, 255, 0.2)",
            fill: true,
          },
          {
            label: "Laki-Laki",
            data: [180, 185, 190, 192],
            borderColor: "red",
            backgroundColor: "rgba(255, 0, 0, 0.1)",
            fill: true,
          },
          {
            label: "Perempuan",
            data: [170, 172, 175, 178],
            borderColor: "cyan",
            backgroundColor: "rgba(0, 255, 255, 0.1)",
            fill: true,
          },
          {
            label: "Remaja",
            data: [80, 82, 84, 85],
            borderColor: "orange",
            backgroundColor: "rgba(255, 165, 0, 0.1)",
            fill: true,
          },
          {
            label: "Balita",
            data: [30, 32, 33, 35],
            borderColor: "purple",
            backgroundColor: "rgba(128, 0, 128, 0.1)",
            fill: true,
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: "bottom",
          },
        },
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });
  </script>
  <script>
    const ctxDetail = document.getElementById("myChartDetail").getContext("2d");
    const myChartDetail = new Chart(ctxDetail, {
      type: "line",
      data: {
        labels: ["MEI", "JUNI", "JULI", "AGUSTUS"],
        datasets: [{
            label: "Total",
            data: [560, 570, 580, 590],
            borderColor: "blue",
            backgroundColor: "rgba(0, 0, 255, 0.2)",
            borderWidth: 2,
            fill: true,
            tension: 0.3
          },
          {
            label: "Laki-Laki",
            data: [180, 185, 190, 192],
            borderColor: "red",
            backgroundColor: "rgba(255, 0, 0, 0.1)",
            borderWidth: 2,
            fill: true,
            tension: 0.3
          },
          {
            label: "Perempuan",
            data: [170, 172, 175, 178],
            borderColor: "cyan",
            backgroundColor: "rgba(0, 255, 255, 0.1)",
            borderWidth: 2,
            fill: true,
            tension: 0.3
          },
          {
            label: "Remaja",
            data: [80, 82, 84, 85],
            borderColor: "orange",
            backgroundColor: "rgba(255, 165, 0, 0.1)",
            borderWidth: 2,
            fill: true,
            tension: 0.3
          },
          {
            label: "Balita",
            data: [30, 32, 33, 35],
            borderColor: "purple",
            backgroundColor: "rgba(128, 0, 128, 0.1)",
            borderWidth: 2,
            fill: true,
            tension: 0.3
          },
          {
            label: "Dewasa",
            data: [200, 205, 210, 215],
            borderColor: "green",
            backgroundColor: "rgba(0, 128, 0, 0.1)",
            borderWidth: 2,
            fill: true,
            tension: 0.3
          },
          {
            label: "Lansia",
            data: [60, 62, 65, 68],
            borderColor: "brown",
            backgroundColor: "rgba(165, 42, 42, 0.1)",
            borderWidth: 2,
            fill: true,
            tension: 0.3
          }
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: "bottom",
            labels: {
              usePointStyle: true,
              pointStyle: "circle",
            },
          },
          title: {
            display: true,
            text: "Statistik Penduduk Berdasarkan Kategori (Mei - Agustus)",
            font: {
              size: 16,
              weight: "bold"
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: "Jumlah Penduduk"
            }
          },
          x: {
            title: {
              display: true,
              text: "Bulan"
            }
          }
        }
      },
    });
  </script>


  <!-- chart js wilayah -->
  <script>
    new Chart(document.getElementById("chartLuasWilayah"), {
      type: "bar",
      data: {
        labels: ["Sumber Rejo", "Mekar Sari", "Sukamaju", "Sidomulyo", "Tegal Asri"],
        datasets: [{
          label: "Luas (Ha)",
          data: [145, 120, 165, 130, 110],
          backgroundColor: "rgba(54, 162, 235, 0.6)",
        }],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          },
        },
        scales: {
          y: {
            beginAtZero: true
          },
        },
      },
    });

    // Grafik Penggunaan Lahan
    new Chart(document.getElementById("chartLahan"), {
      type: "pie",
      data: {
        labels: ["Pemukiman", "Pertanian", "Perkebunan", "Hutan", "Fasilitas Umum"],
        datasets: [{
          data: [25, 45, 15, 10, 5],
          backgroundColor: ["#007bff", "#28a745", "#ffc107", "#17a2b8", "#dc3545"],
        }],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: "bottom"
          }
        },
      },
    });
  </script>

  <script>
    const ctx = document.getElementById("anggaranChart").getContext("2d");
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Pemerintahan", "Pembangunan", "Pemberdayaan"],
        datasets: [{
          label: "Realisasi Anggaran (%)",
          data: [80, 90, 85],
          backgroundColor: ["#007bff", "#28a745", "#ffc107"]
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            max: 100
          }
        }
      }
    });
  </script>

</body>
</html>