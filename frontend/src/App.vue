<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <div class="app">
    <header class="navbar">
      <RouterLink to="/" class="brand">
        Glowithsya
      </RouterLink>

      <nav>
        <RouterLink to="/">
          Home
        </RouterLink>

        <RouterLink to="/services">
          Services
        </RouterLink>
      </nav>
    </header>

    <RouterView />

    <footer class="footer">
      <div>
        <h2>Glowithsya</h2>
        <p>Makeup Artist · Beauty & Confidence</p>
      </div>

      <p class="copyright">
        © 2026 Glowithsya
      </p>
    </footer>
  </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Montserrat:wght@300;400;500;600&display=swap');

* {
  box-sizing: border-box;
}

html {
  scroll-behavior: smooth;
}

body {
  margin: 0;
  min-width: 320px;
  min-height: 100vh;
  background: #faf8f3;
  color: #2e251f;
  font-family: 'Montserrat', Arial, sans-serif;
}

button,
input,
textarea,
select {
  font: inherit;
}

a {
  color: inherit;
}

#app {
  width: 100%;
  min-height: 100vh;
}

.navbar {
  position: sticky;
  top: 0;
  z-index: 100;
  width: 100%;
  height: 82px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 max(6vw, 30px);
  background: rgba(250, 248, 243, 0.96);
  border-bottom: 1px solid #e8e0d2;
  backdrop-filter: blur(10px);
}

.brand {
  color: #2e251f;
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 31px;
  font-style: italic;
  font-weight: 500;
  text-decoration: none;
}

.navbar nav {
  display: flex;
  align-items: center;
  gap: 38px;
}

.navbar nav a {
  position: relative;
  padding: 31px 0 27px;
  color: #6e6258;
  font-size: 10px;
  font-weight: 600;
  letter-spacing: 2px;
  text-decoration: none;
  text-transform: uppercase;
  transition: color 0.25s ease;
}

.navbar nav a:hover,
.navbar nav a.router-link-active {
  color: #b08b48;
}

.navbar nav a::after {
  position: absolute;
  bottom: 21px;
  left: 0;
  width: 0;
  height: 1px;
  background: #b08b48;
  content: '';
  transition: width 0.25s ease;
}

.navbar nav a:hover::after,
.navbar nav a.router-link-active::after {
  width: 100%;
}

.footer {
  min-height: 180px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 30px;
  padding: 45px max(6vw, 30px);
  background: #2e251f;
  color: #f8f3e9;
}

.footer h2 {
  margin: 0 0 6px;
  font-family: 'Cormorant Garamond', Georgia, serif;
  font-size: 31px;
  font-style: italic;
  font-weight: 400;
}

.footer p {
  margin: 0;
  color: #cfc3b4;
  font-size: 11px;
  letter-spacing: 1px;
}

.copyright {
  text-transform: uppercase;
}

@media (max-width: 600px) {
  .navbar {
    height: 70px;
    padding: 0 20px;
  }

  .brand {
    font-size: 26px;
  }

  .navbar nav {
    gap: 20px;
  }

  .navbar nav a {
    padding: 26px 0 22px;
    font-size: 9px;
  }

  .navbar nav a::after {
    bottom: 17px;
  }

  .footer {
    flex-direction: column;
    align-items: flex-start;
    padding: 40px 24px;
  }
}
</style>