<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>


<div class="container py-4">
    <a href="javascript:window.close()" class="btn btn-secondary mb-3">← Tutup</a>

    <!-- ================= PRASARANA ================= -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h3><?= esc($prasarana['nama_prasarana']) ?></h3>

            <div class="row">
                <!-- KOLOM GAMBAR -->
                <div class="col-md-6 mb-3">
                    <img src="<?= $prasarana['foto_prasarana']
                                    ? base_url('uploads/prasarana/' . $prasarana['foto_prasarana'])
                                    : base_url('assets/img/no-image.png') ?>"
                        class="img-fluid rounded"
                        style="max-height:300px; width:100%; object-fit:cover;">
                </div>

                <!-- KOLOM PETA -->
                <div class="col-md-6 mb-3">
                    <div id="map-detail" style="height:300px; width:100%;" class="rounded"></div>
                </div>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th width="30%">Deskripsi</th>
                    <td><?= esc($prasarana['deskripsi_prasarana']) ?></td>
                </tr>
                <tr>
                    <th>Latitude</th>
                    <td><?= esc($prasarana['lat_prasarana']) ?></td>
                </tr>
                <tr>
                    <th>Longitude</th>
                    <td><?= esc($prasarana['long_prasarana']) ?></td>
                </tr>
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

    // =========================
    // MARKER PRASARANA
    // =========================
    <?php if (!empty($prasarana)): ?>
        const marker = L.marker([
            <?= $prasarana['lat_prasarana'] ?>,
            <?= $prasarana['long_prasarana'] ?>
        ]).addTo(map);

        marker.bindPopup(`
            <div style="max-width:220px">
                <img 
                    src="<?= $prasarana['foto_prasarana']
                                ? base_url('uploads/prasarana/' . $prasarana['foto_prasarana'])
                                : base_url('assets/img/no-image.png') ?>"
                    style="width:100%; height:120px; object-fit:cover; border-radius:6px; margin-bottom:6px">

                <strong><?= esc($prasarana['nama_prasarana']) ?></strong><br>
                <small><?= esc($prasarana['deskripsi_prasarana']) ?></small>
            </div>
        `);

        bounds.extend(marker.getLatLng());
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