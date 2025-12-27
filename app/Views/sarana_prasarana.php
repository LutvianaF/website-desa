<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="sarpra">
  <h3 class="mb-4 text-center">SARANA DAN PRASARANA DESA</h3>
  <p class="text-center mb-5">
    Berikut adalah data lengkap mengenai berbagai sarana dan prasarana yang mendukung kegiatan masyarakat desa.
  </p>

  <?php if (!empty($sarpras)): ?>
    <div class="row g-4 mb-3">
      <?php foreach ($sarpras as $row): ?>
        <!-- SARANA -->
        <div class="col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <h5 class="mb-3 text-primary"><?= esc($row['judul_sarana']) ?></h5>
              <ul class="mb-0">
                <?php foreach (explode(',', $row['isi_sarana']) as $item): ?>
                  <li><?= esc(trim($item)) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>

        <!-- PRASARANA -->
        <div class="col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <h5 class="mb-3 text-success"><?= esc($row['judul_prasarana']) ?></h5>
              <ul class="mb-0">
                <?php foreach (explode(',', $row['isi_prasarana']) as $item): ?>
                  <li><?= esc(trim($item)) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <p class="text-center text-muted">Belum ada data sarana dan prasarana.</p>
<?php endif; ?>

<!-- WEB GIS -->
<div id="map"></div>
</section>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
  integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
  crossorigin="">
</script>

<script>
  // ================== INIT MAP ==================
  const map = L.map("map").setView([-7.9702853, 112.6556096], 17);

  L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution: "&copy; OpenStreetMap"
  }).addTo(map);

  // ================== DATA DARI CI4 ==================
  const prasaranaData = <?= json_encode($prasarana ?? []); ?>;
  const tanahData = <?= json_encode(
                      $tanah ?? [],
                      JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT
                    ); ?>;

  const layers = [];

  // ================== HELPER ==================
  function truncateText(text, maxLength = 80) {
    if (!text) return '';
    return text.length > maxLength ?
      text.substring(0, maxLength) + '...' :
      text;
  }

  // ================== MARKER PRASARANA ==================
  if (Array.isArray(prasaranaData)) {
    prasaranaData.forEach(item => {
      if (!item.lat_prasarana || !item.long_prasarana) return;

      const foto = item.foto_prasarana ?
        `<?= base_url('uploads/prasarana'); ?>/${item.foto_prasarana}` :
        `<?= base_url('assets/img/no-image.png'); ?>`;

      const popupContent = `
        <div style="max-width:220px">
          <strong>${item.nama_prasarana ?? '-'}</strong><br>

          <img src="${foto}"
               style="width:100%;height:auto;margin:6px 0;
                      border-radius:6px;display:block">

          <small>${truncateText(item.deskripsi_prasarana)}</small><br>

          <a href="<?= base_url('detailPrasarana'); ?>/${item.id_prasarana}"
             target="_blank"
             style="display:inline-block;margin-top:6px;color:#0d6efd">
            Detail Lengkap Data →
          </a>
        </div>
      `;

      const marker = L.marker([
        item.lat_prasarana,
        item.long_prasarana
      ]).addTo(map).bindPopup(popupContent);

      layers.push(marker);
    });
  }

  // ================== POLYGON TANAH ==================
  if (Array.isArray(tanahData)) {
    tanahData.forEach(t => {
      if (!t.koordinat) return;

      const polygonCoords = t.koordinat.split('|').map(c => {
        const [lat, lng] = c.split(',');
        return [parseFloat(lat), parseFloat(lng)];
      });

      const polygon = L.polygon(polygonCoords, {
        color: '#e52c2c',
        weight: 2,
        fillColor: '#e25d5d',
        fillOpacity: 0.5,
        dashArray: '5,5'
      }).addTo(map);

      const fotoTanah = t.foto_tanah ?
        `<?= base_url('uploads/tanah'); ?>/${t.foto_tanah}` :
        `<?= base_url('assets/img/no-image.png'); ?>`;

      polygon.bindPopup(`
      <div style="max-width:220px">
        <h6>${t.nama_tanah ?? '-'}</h6>

        <img src="${fotoTanah}"
             style="width:100%;height:120px;object-fit:cover;
                    border-radius:6px;margin-bottom:6px">

        <p style="font-size:13px">
          ${truncateText(t.deskripsi_tanah ?? '-', 120)}
        </p>

        <a href="<?= base_url('detailTanah'); ?>/${t.id_tanah}"
           target="_blank"
           style="font-size:13px;color:#e52c2c">
           Detail Lengkap Data
        </a>
      </div>
    `);

      layers.push(polygon);
    });
  }

  // ================== AUTO ZOOM ==================
  if (layers.length > 0) {
    const group = L.featureGroup(layers);
    map.fitBounds(group.getBounds(), {
      padding: [30, 30]
    });
  }
</script>

<?= $this->endSection() ?>