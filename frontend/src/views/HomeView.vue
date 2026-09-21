<script setup>
import { onMounted, ref } from 'vue'

const services = ref([])
const loading = ref(true)

const formatPrice = (price) => {
  return new Intl.NumberFormat('id-ID').format(price)
}

const bookingUrl = (serviceName) => {
  const message =
    `Halo Glowithsya, saya ingin bertanya tentang paket ${serviceName}`

  return `https://wa.me/6281215726710?text=${encodeURIComponent(message)}`
}

const fetchServices = async () => {
  try {
    const apiUrl = import.meta.env.VITE_API_URL
    const response = await fetch(`${apiUrl}/services`)

    if (!response.ok) {
      throw new Error('Gagal mengambil service')
    }

    services.value = await response.json()
  } catch (error) {
    console.error(error)
  } finally {
    loading.value = false
  }
}

onMounted(fetchServices)
</script>

<template>
  <main>
    <!-- HERO -->
    <section id="home" class="hero">
      <div class="hero-decoration">
        G
      </div>

      <div class="hero-content">
        <p class="small-title">
          MAKEUP ARTIST · YOGYAKARTA & KLATEN
        </p>

        <h1>
          Bersinar dengan
          <span>gaya yang kamu mau.</span>
        </h1>

        <p class="hero-description">
          Temukan tampilan terbaik untuk setiap momen spesialmu
          bersama Glowithsya.
        </p>

        <div class="hero-buttons">
          <a href="#services" class="btn-primary">
            Lihat Pricelist
          </a>

          <a href="#booking" class="btn-secondary">
            Booking Sekarang
          </a>
        </div>
      </div>

      <div class="hero-side-text">
        EST. 2023
      </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="about">
      <div class="about-inner">
        <p class="section-label">
          ABOUT GLOWITHSYA
        </p>

        <h2>
          Beauty That Feels
          <span>Like You.</span>
        </h2>

        <div class="gold-line"></div>

        <p class="about-lead">
          Percaya diri dan tampil cantik adalah hak setiap wanita.
        </p>

        <p class="about-description">
          Bagi Glowithsya, makeup bukan sekadar alat kecantikan,
          tetapi juga sarana untuk mengekspresikan diri dan membangun
          rasa percaya diri. Kami menggunakan produk pilihan dan teknik
          modern yang disesuaikan dengan karakter wajah serta kebutuhan
          setiap klien.
        </p>

        <div class="about-values">
          <div class="value-item">
            <span>01</span>
            <h3>Detail</h3>
            <p>
              Riasan yang disesuaikan dengan karakter wajahmu.
            </p>
          </div>

          <div class="value-item">
            <span>02</span>
            <h3>Higienis</h3>
            <p>
              Peralatan dan produk dijaga untuk kenyamanan setiap klien.
            </p>
          </div>

          <div class="value-item">
            <span>03</span>
            <h3>Personal</h3>
            <p>
              Setiap look dibuat sesuai kebutuhan dan momen spesialmu.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- SERVICES -->
    <section id="services" class="services">
      <div class="section-heading">
        <p class="section-label">
          MAKEUP PRICELIST
        </p>

        <h2>
          Choose Your
          <span>Perfect Look</span>
        </h2>

        <p class="section-description">
          Pilih layanan makeup yang sesuai dengan kebutuhan
          dan momen spesialmu.
        </p>
      </div>

      <div v-if="loading" class="loading">
        Memuat pricelist...
      </div>

      <div v-else-if="services.length" class="service-container">
        <article
          v-for="(service, index) in services"
          :key="service.id"
          class="service-card"
        >
          <div
            v-if="service.image_url"
            class="service-image"
          >
            <img
              :src="service.image_url"
              :alt="service.name"
            />
          </div>

          <div
            v-else
            class="service-image service-image-empty"
          >
            <span>Glowithsya</span>
          </div>

          <div class="service-top">
            <span class="service-number">
              {{ String(index + 1).padStart(2, '0') }}
            </span>

            <span class="service-category">
              GLOWITHSYA
            </span>
          </div>

          <div class="service-content">
            <h3>{{ service.name }}</h3>

            <p>
              {{
                service.description ||
                'Layanan makeup Glowithsya untuk menemani momen spesialmu.'
              }}
            </p>
          </div>

          <div class="service-bottom">
            <div class="price-wrapper">
              <span class="price-label">
                START FROM
              </span>

              <span class="price">
                IDR {{ formatPrice(service.price) }}
              </span>
            </div>

            <a
              :href="bookingUrl(service.name)"
              target="_blank"
              rel="noopener noreferrer"
              class="service-link"
            >
              →
            </a>
          </div>
        </article>
      </div>

      <div v-else class="empty-services">
        <p class="section-label">
          OUR SERVICES
        </p>

        <h3>
          Pricelist sedang disiapkan.
        </h3>

        <p>
          Data layanan belum tersedia.
        </p>
      </div>
    </section>

    <!-- BOOKING -->
    <section id="booking" class="booking">
      <div class="booking-inner">
        <p class="section-label light">
          BOOK YOUR MAKEUP
        </p>

        <h2>
          Ready to Glow?
        </h2>

        <p class="booking-intro">
          Sudah menemukan makeup yang kamu mau?
          Yuk, amankan jadwal untuk momen spesialmu.
        </p>

        <div class="booking-steps">
          <div class="booking-step">
            <span>01</span>
            <p>Hubungi Admin</p>
          </div>

          <div class="booking-line"></div>

          <div class="booking-step">
            <span>02</span>
            <p>Pilih Tanggal & Paket</p>
          </div>

          <div class="booking-line"></div>

          <div class="booking-step">
            <span>03</span>
            <p>Pembayaran DP</p>
          </div>

          <div class="booking-line"></div>

          <div class="booking-step">
            <span>04</span>
            <p>Booking Confirmed</p>
          </div>
        </div>

        <a
          href="https://wa.me/6281215726710?text=Halo%20Glowithsya%2C%20saya%20ingin%20booking%20makeup."
          target="_blank"
          rel="noopener noreferrer"
          class="btn-whatsapp"
        >
          Booking via WhatsApp
        </a>

        <p class="booking-note">
          Slot akan diamankan setelah data lengkap dan DP diterima.
        </p>
      </div>
    </section>
  </main>
</template>

<style scoped>
:global(:root) {
  --gold: #b39455;
  --gold-dark: #92743d;
  --gold-light: #d7c39a;
  --cream: #f8f5ef;
  --cream-dark: #eee8dd;
  --white: #ffffff;
  --black: #1e1d1b;
  --gray: #77736d;
  --border: #e7e0d5;
}

.hero {
  min-height: calc(100vh - 82px);
  padding: 110px 8%;
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
  background:
    linear-gradient(
      115deg,
      rgba(248, 245, 239, 1) 0%,
      rgba(248, 245, 239, .98) 58%,
      rgba(238, 232, 221, .85) 100%
    );
}

.hero::before {
  content: '';
  position: absolute;
  width: 430px;
  height: 430px;
  right: -110px;
  top: -100px;
  border: 1px solid rgba(179, 148, 85, .23);
  border-radius: 50%;
}

.hero::after {
  content: '';
  position: absolute;
  width: 260px;
  height: 260px;
  right: 80px;
  bottom: -120px;
  border: 1px solid rgba(179, 148, 85, .2);
  border-radius: 50%;
}

.hero-content {
  max-width: 820px;
  position: relative;
  z-index: 2;
}

.small-title,
.section-label {
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 4px;
  color: var(--gold-dark);
}

.small-title {
  margin-bottom: 26px;
}

.hero h1 {
  max-width: 780px;
  margin: 0 0 30px;
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: clamp(58px, 7vw, 96px);
  font-weight: 500;
  line-height: .93;
  letter-spacing: -2px;
}

.hero h1 span {
  display: block;
  color: var(--gold);
  font-style: italic;
}

.hero-description {
  max-width: 560px;
  margin-bottom: 38px;
  font-size: 15px;
  line-height: 1.9;
  color: var(--gray);
}

.hero-buttons {
  display: flex;
  align-items: center;
  gap: 14px;
  flex-wrap: wrap;
}

.btn-primary,
.btn-secondary,
.btn-whatsapp {
  min-height: 50px;
  padding: 0 28px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 1.4px;
  text-transform: uppercase;
  text-decoration: none;
  transition: all .3s ease;
}

.btn-primary,
.btn-whatsapp {
  color: var(--white);
  background: var(--gold);
  border: 1px solid var(--gold);
}

.btn-primary:hover {
  background: var(--gold-dark);
}

.btn-secondary {
  color: var(--gold-dark);
  background: transparent;
  border: 1px solid var(--gold-light);
}

.btn-secondary:hover {
  background: var(--white);
}

.hero-decoration {
  position: absolute;
  right: 6%;
  top: 50%;
  transform: translateY(-50%);
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: min(39vw, 560px);
  font-style: italic;
  line-height: 1;
  color: rgba(179, 148, 85, .07);
  user-select: none;
}

.hero-side-text {
  position: absolute;
  right: 3%;
  bottom: 50%;
  transform: rotate(90deg) translateX(50%);
  transform-origin: right bottom;
  font-size: 9px;
  letter-spacing: 4px;
  color: var(--gold-dark);
}

.about {
  padding: 125px 8%;
  background: var(--white);
}

.about-inner {
  max-width: 1050px;
  margin: auto;
  text-align: center;
}

.about .section-label {
  margin-bottom: 18px;
}

.about h2,
.section-heading h2 {
  margin: 0;
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: clamp(42px, 5vw, 64px);
  font-weight: 500;
  line-height: 1.05;
}

.about h2 span,
.section-heading h2 span {
  color: var(--gold);
  font-style: italic;
}

.gold-line {
  width: 45px;
  height: 1px;
  margin: 27px auto;
  background: var(--gold);
}

.about-lead {
  margin-bottom: 15px;
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 23px;
  font-style: italic;
  color: #494640;
}

.about-description {
  max-width: 760px;
  margin: auto;
  font-size: 14px;
  line-height: 2;
  color: var(--gray);
}

.about-values {
  margin-top: 70px;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
}

.value-item {
  padding: 35px 28px;
}

.value-item + .value-item {
  border-left: 1px solid var(--border);
}

.value-item span {
  display: block;
  margin-bottom: 8px;
  font-size: 10px;
  letter-spacing: 2px;
  color: var(--gold);
}

.value-item h3 {
  margin: 0 0 8px;
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 26px;
  font-weight: 600;
}

.value-item p {
  margin: 0;
  font-size: 12px;
  line-height: 1.8;
  color: var(--gray);
}

.services {
  padding: 125px 7%;
  background: var(--cream);
}

.section-heading {
  max-width: 700px;
  margin: 0 auto 65px;
  text-align: center;
}

.section-heading .section-label {
  margin-bottom: 17px;
}

.section-description {
  max-width: 520px;
  margin: 20px auto 0;
  font-size: 13px;
  line-height: 1.9;
  color: var(--gray);
}

.service-container {
  max-width: 1200px;
  margin: auto;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

.service-card {
  min-height: 620px;
  padding: 30px;
  display: flex;
  flex-direction: column;
  background: var(--white);
  border: 1px solid var(--border);
  transition:
    transform .35s ease,
    box-shadow .35s ease,
    border-color .35s ease;
}

.service-card:hover {
  transform: translateY(-7px);
  border-color: var(--gold-light);
  box-shadow: 0 22px 50px rgba(78, 65, 40, .09);
}

.service-image {
  width: calc(100% + 60px);
  height: 260px;
  margin: -30px -30px 28px;
  overflow: hidden;
  background: var(--cream-dark);
}

.service-image img {
  width: 100%;
  height: 100%;
  display: block;
  object-fit: cover;
  transition: transform .5s ease;
}

.service-card:hover .service-image img {
  transform: scale(1.04);
}

.service-image-empty {
  display: flex;
  align-items: center;
  justify-content: center;
}

.service-image-empty span {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 30px;
  font-style: italic;
  color: var(--gold);
}

.service-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-bottom: 25px;
  border-bottom: 1px solid var(--border);
}

.service-number {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 30px;
  color: var(--gold);
}

.service-category {
  font-size: 8px;
  letter-spacing: 2px;
  color: #aaa49a;
}

.service-content {
  padding: 42px 0 35px;
  flex: 1;
}

.service-card h3 {
  margin: 0 0 18px;
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 32px;
  font-weight: 600;
  line-height: 1.05;
}

.service-card p {
  margin: 0;
  font-size: 12px;
  line-height: 1.9;
  color: var(--gray);
}

.service-bottom {
  padding-top: 25px;
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  border-top: 1px solid var(--border);
}

.price-wrapper {
  display: flex;
  flex-direction: column;
}

.price-label {
  margin-bottom: 4px;
  font-size: 8px;
  letter-spacing: 2px;
  color: #9e998f;
}

.price {
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 25px;
  font-weight: 600;
  color: var(--gold-dark);
}

.service-link {
  width: 42px;
  height: 42px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid var(--gold-light);
  color: var(--gold-dark);
  font-size: 21px;
  text-decoration: none;
  transition: all .3s ease;
}

.service-link:hover {
  color: var(--white);
  background: var(--gold);
}

.loading,
.empty-services {
  max-width: 1200px;
  margin: auto;
  padding: 70px 30px;
  text-align: center;
  background: var(--white);
  border: 1px solid var(--border);
}

.booking {
  padding: 125px 8%;
  text-align: center;
  color: var(--white);
  background: #26231f;
}

.booking-inner {
  max-width: 980px;
  margin: auto;
}

.section-label.light {
  color: var(--gold-light);
}

.booking h2 {
  margin: 13px 0 15px;
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: clamp(48px, 6vw, 72px);
  font-weight: 500;
  font-style: italic;
  color: var(--gold-light);
}

.booking-intro {
  max-width: 560px;
  margin: 0 auto;
  font-size: 13px;
  line-height: 1.9;
  color: #c9c4bc;
}

.booking-steps {
  margin: 65px 0 55px;
  display: flex;
  justify-content: center;
  align-items: flex-start;
}

.booking-step {
  width: 150px;
}

.booking-step span {
  width: 42px;
  height: 42px;
  margin: 0 auto 15px;
  display: flex;
  justify-content: center;
  align-items: center;
  border: 1px solid var(--gold);
  border-radius: 50%;
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 17px;
  color: var(--gold-light);
}

.booking-step p {
  margin: 0;
  font-size: 10px;
  line-height: 1.5;
  letter-spacing: 1px;
  text-transform: uppercase;
  color: #d8d3ca;
}

.booking-line {
  width: 70px;
  height: 1px;
  margin-top: 21px;
  background: rgba(179, 148, 85, .4);
}

.btn-whatsapp:hover {
  background: transparent;
  color: var(--gold-light);
}

.booking-note {
  margin-top: 18px;
  font-size: 10px;
  letter-spacing: .5px;
  color: #969088;
}

@media (max-width: 900px) {
  .service-container {
    grid-template-columns: 1fr;
  }

  .service-card {
    min-height: 330px;
  }
}

@media (max-width: 700px) {
  .hero {
    min-height: 680px;
    padding: 85px 7%;
  }

  .hero h1 {
    font-size: 55px;
  }

  .hero-decoration,
  .hero-side-text {
    display: none;
  }

  .about,
  .services,
  .booking {
    padding: 90px 7%;
  }

  .about-values {
    grid-template-columns: 1fr;
  }

  .value-item + .value-item {
    border-left: 0;
    border-top: 1px solid var(--border);
  }

  .booking-steps {
    flex-direction: column;
    align-items: center;
    gap: 15px;
  }

  .booking-line {
    width: 1px;
    height: 28px;
    margin: 0;
  }
}
</style>