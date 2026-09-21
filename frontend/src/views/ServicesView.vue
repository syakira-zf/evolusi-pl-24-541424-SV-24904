<script setup>
import { onMounted, ref } from 'vue'

const services = ref([])
const loading = ref(true)
const error = ref('')

const formatPrice = (price) => {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    maximumFractionDigits: 0,
  }).format(price)
}

const fetchServices = async () => {
  try {
    const apiUrl = import.meta.env.VITE_API_URL

    const response = await fetch(`${apiUrl}/services`)

    if (!response.ok) {
      throw new Error('Gagal mengambil data service.')
    }

    services.value = await response.json()
  } catch (err) {
    error.value = err.message
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchServices()
})
</script>

<template>
  <main class="services-page">
    <section class="services-hero">
      <p class="eyebrow">OUR SERVICES</p>

      <h1>
        Find Your
        <span>Perfect Look</span>
      </h1>

      <p class="hero-description">
        Pilih layanan makeup Glowithsya yang sesuai dengan kebutuhan
        dan momen spesialmu.
      </p>
    </section>

    <section class="services-section">
      <div v-if="loading" class="message">
        Memuat layanan Glowithsya...
      </div>

      <div v-else-if="error" class="message error">
        {{ error }}
      </div>

      <div v-else-if="services.length === 0" class="message">
        Belum ada service yang tersedia.
      </div>

      <div v-else class="services-grid">
        <article
          v-for="service in services"
          :key="service.id"
          class="service-card"
        >
          <div class="service-image">
            <img
              v-if="service.image_url"
              :src="service.image_url"
              :alt="service.name"
            />

            <div v-else class="image-placeholder">
              Glowithsya
            </div>
          </div>

          <div class="service-content">
            <p class="service-label">
              MAKEUP SERVICE
            </p>

            <h2>{{ service.name }}</h2>

            <p class="price">
              {{ formatPrice(service.price) }}
            </p>

            <div class="divider"></div>

            <p class="description">
              {{ service.description }}
            </p>

            <a
              href="https://wa.me/6281215726710"
              target="_blank"
              rel="noopener noreferrer"
              class="booking-button"
            >
              Book This Service
            </a>
          </div>
        </article>
      </div>
    </section>
  </main>
</template>

<style scoped>
.services-page {
  min-height: 100vh;
  background: #faf8f3;
  color: #2e251f;
}

.services-hero {
  padding: 100px 24px 65px;
  text-align: center;
  background:
    radial-gradient(
      circle at top,
      rgba(194, 164, 103, 0.13),
      transparent 45%
    ),
    #faf8f3;
}

.eyebrow,
.service-label {
  margin: 0 0 16px;
  color: #b08b48;
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 4px;
}

.services-hero h1 {
  max-width: 800px;
  margin: 0 auto;
  font-family: Georgia, 'Times New Roman', serif;
  font-size: clamp(45px, 7vw, 78px);
  font-weight: 400;
  line-height: 0.95;
}

.services-hero h1 span {
  display: block;
  margin-top: 10px;
  color: #b08b48;
  font-style: italic;
  font-weight: 400;
}

.hero-description {
  max-width: 600px;
  margin: 30px auto 0;
  color: #756b63;
  font-size: 14px;
  line-height: 1.9;
}

.services-section {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px 24px 100px;
}

.services-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 26px;
}

.service-card {
  overflow: hidden;
  background: #ffffff;
  border: 1px solid #e8e0d2;
  transition:
    transform 0.3s ease,
    box-shadow 0.3s ease;
}

.service-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 18px 45px rgba(72, 55, 37, 0.1);
}

.service-image {
  width: 100%;
  height: 330px;
  overflow: hidden;
  background: #eee7da;
}

.service-image img {
  width: 100%;
  height: 100%;
  display: block;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.service-card:hover .service-image img {
  transform: scale(1.04);
}

.image-placeholder {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background:
    linear-gradient(135deg, #f5efe5, #e7dcc8);
  color: #b08b48;
  font-family: Georgia, 'Times New Roman', serif;
  font-size: 30px;
  font-style: italic;
}

.service-content {
  padding: 30px;
}

.service-label {
  margin-bottom: 12px;
  font-size: 9px;
  letter-spacing: 3px;
}

.service-content h2 {
  margin: 0;
  font-family: Georgia, 'Times New Roman', serif;
  font-size: 29px;
  font-weight: 400;
}

.price {
  margin: 12px 0 0;
  color: #b08b48;
  font-size: 17px;
  font-weight: 600;
}

.divider {
  width: 45px;
  height: 1px;
  margin: 22px 0;
  background: #c4a467;
}

.description {
  min-height: 110px;
  margin: 0 0 28px;
  color: #756b63;
  font-size: 13px;
  line-height: 1.8;
}

.booking-button {
  display: block;
  padding: 15px 18px;
  border: 1px solid #b08b48;
  color: #8f6c31;
  font-size: 10px;
  font-weight: 600;
  letter-spacing: 2px;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  transition: 0.3s ease;
}

.booking-button:hover {
  background: #b08b48;
  color: white;
}

.message {
  padding: 70px 20px;
  color: #756b63;
  text-align: center;
}

.error {
  color: #9b3d3d;
}

@media (max-width: 900px) {
  .services-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 600px) {
  .services-hero {
    padding-top: 70px;
  }

  .services-grid {
    grid-template-columns: 1fr;
  }

  .service-image {
    height: 380px;
  }

  .description {
    min-height: auto;
  }
}
</style>