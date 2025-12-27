<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>


<div class="container py-4">
    <a href="javascript:window.close()" class="btn btn-secondary mb-3">← Tutup</a>

    <div class="card shadow">
        <div class="card-body">
            <h3><?= esc($tanah['nama_tanah']) ?></h3>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <img src="<?= $tanah['foto_tanah']
                                    ? base_url('uploads/tanah/' . $tanah['foto_tanah'])
                                    : base_url('assets/img/no-image.png') ?>"
                        class="img-fluid rounded"
                        style="max-height:300px; width:100%; object-fit:cover;">
                </div>
                <div class="col-md-6 mb-3">
                    <div id="map-detail" style="height:300px; width:100%;" class="rounded"></div>
                </div>
            </div>
            <?php
            $koordinatArr = explode('|', $tanah['koordinat']);
            ?>
            <table class="table table-bordered">
                <tr>
                    <th width="30%">Deskripsi</th>
                    <td><?= esc($tanah['deskripsi_tanah']) ?></td>
                </tr>
                <tr>
                    <th>Jumlah Titik Polygon</th>
                    <td><?= count($koordinatArr) ?> titik</td>
                </tr>
            </table>
            <h5 class="mt-4">Koordinat Tanah</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Koordinat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($koordinatArr as $i => $k): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($k) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    const map = L.map('map-detail');

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    let bounds = L.latLngBounds();

    <?php if (!empty($tanah)): ?>
        const polygonCoords = "<?= $tanah['koordinat']; ?>".split('|').map(c => {
            const [lat, lng] = c.split(',');
            return [parseFloat(lat), parseFloat(lng)];
        });

        const polygon = L.polygon(polygonCoords, {
            color: '#841e1e',
            fillColor: '#cc2e2e',
            fillOpacity: 0.6
        }).addTo(map);

        polygon.bindPopup(`
    <div style="max-width:220px">
      <img src="<?= $tanah['foto_tanah']
                    ? base_url('uploads/tanah/' . $tanah['foto_tanah'])
                    : base_url('assets/img/no-image.png') ?>"
          style="width:100%;height:120px;object-fit:cover;
                 border-radius:6px;margin-bottom:6px">

      <strong><?= esc($tanah['nama_tanah']); ?></strong><br>
      <small><?= esc($tanah['deskripsi_tanah']); ?></small>
    </div>
  `);

        map.fitBounds(polygon.getBounds());
    <?php endif; ?>

    // =========================
    // AUTO ZOOM
    // =========================
    if (bounds.isValid()) {
        map.fitBounds(bounds, {
            padding: [30, 30]
        });
    } else {
        map.setView([-7.97, 112.65], 15);
    }
</script>

<?= $this->endSection() ?>