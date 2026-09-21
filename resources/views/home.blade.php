<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Glowithsya | Makeup Artist</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="#home" class="logo">
            Glowithsya
        </a>

        <div class="nav-links">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#services">Pricelist</a>
            <a href="#booking">Booking</a>
        </div>
    </nav>


    <!-- HERO -->
    <section class="hero" id="home">

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
    <section class="about" id="about">

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
                    <p>Riasan yang disesuaikan dengan karakter wajahmu.</p>
                </div>

                <div class="value-item">
                    <span>02</span>
                    <h3>Higienis</h3>
                    <p>Peralatan dan produk dijaga untuk kenyamanan setiap klien.</p>
                </div>

                <div class="value-item">
                    <span>03</span>
                    <h3>Personal</h3>
                    <p>Setiap look dibuat sesuai kebutuhan dan momen spesialmu.</p>
                </div>

            </div>

        </div>

    </section>


    <!-- SERVICES -->
    <section class="services" id="services">

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


        <div class="service-container">

            @forelse ($services as $service)

                <article class="service-card">

    @if ($service->image)
        <div class="service-image">
            <img
                src="{{ asset('storage/' . $service->image) }}"
                alt="{{ $service->name }}"
            >
        </div>
    @else
        <div class="service-image service-image-empty">
            <span>Glowithsya</span>
        </div>
    @endif


                    <div class="service-top">

                        <span class="service-number">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <span class="service-category">
                            GLOWITHSYA
                        </span>

                    </div>

                    <div class="service-content">

                        <h3>
                            {{ $service->name }}
                        </h3>

                        <p>
                            {{ $service->description ?: 'Layanan makeup Glowithsya untuk menemani momen spesialmu.' }}
                        </p>

                    </div>

                    <div class="service-bottom">

                        <div class="price-wrapper">
                            <span class="price-label">
                                START FROM
                            </span>

                            <span class="price">
                                IDR {{ number_format($service->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <a
                            href="https://wa.me/6281215726710?text={{ urlencode('Halo Glowithsya, saya ingin bertanya tentang paket ' . $service->name) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="service-link"
                        >
                            →
                        </a>

                    </div>

                </article>

            @empty

                <div class="empty-services">

                    <p class="section-label">
                        OUR SERVICES
                    </p>

                    <h3>
                        Pricelist sedang disiapkan.
                    </h3>

                    <p>
                        Data layanan belum tersedia. Tambahkan service
                        melalui halaman pengelolaan Service.
                    </p>

                    <a href="{{ route('services.create') }}" class="btn-primary">
                        Tambah Service
                    </a>

                </div>

            @endforelse

        </div>

    </section>


    <!-- BOOKING -->
    <section class="booking" id="booking">

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
                href="https://wa.me/6281215726710?text={{ urlencode('Halo Glowithsya, saya ingin booking makeup.') }}"
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


    <!-- FOOTER -->
    <footer>

        <div class="footer-main">

            <div class="footer-brand">
                <h3>Glowithsya</h3>

                <p>
                    Makeup Artist · Yogyakarta & Klaten
                </p>
            </div>

            <div class="footer-contact">

                <div>
                    <span>WHATSAPP</span>
                    <p>+62 812-1572-6710</p>
                </div>

                <div>
                    <span>INSTAGRAM</span>
                    <p>@glowithsya</p>
                </div>

                <div>
                    <span>EMAIL</span>
                    <p>zahrasyakira776@gmail.com</p>
                </div>

            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2026 Glowithsya. All Rights Reserved.</p>
            <p>Made for your special moment.</p>
        </div>

    </footer>

</body>
</html>