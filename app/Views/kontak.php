<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="contact">
  <div class="container">

    <div class="section-title text-center mb-5">
      <h2>Kontak Kami</h2>
      <p>Hubungi kami untuk informasi lebih lanjut</p>
    </div>
    <div class="info bg-light p-4 rounded shadow-sm h-100">
      <div class="mb-3">
        <div class="map rounded shadow-sm overflow-hidden">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.747760558396!2d106.827153!3d-6.175392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5c4e0f9c3f5%3A0x9d2bcb14f0a63d2!2sMonas!5e0!3m2!1sid!2sid!4v1633673636165!5m2!1sid!2sid" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
          </iframe>
        </div>
      </div>

      <div class="mb-3">
        <h5><i class="bi bi-telephone-fill me-2 text-primary"></i>Telepon</h5>
        <p>+62 812 3456 7890</p>
      </div>
      <div>
        <h5><i class="bi bi-envelope-fill me-2 text-primary"></i>Email</h5>
        <p>info@contoh.com</p>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>