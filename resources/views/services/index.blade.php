<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Services | Glowithsya</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .management-page {
            min-height: 100vh;
            padding: 75px 7% 100px;

            background: #f8f5ef;
        }

        .management-wrapper {
            max-width: 1200px;
            margin: auto;
        }

        .management-header {
            margin-bottom: 45px;

            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 30px;
        }

        .management-label {
            margin-bottom: 9px;

            color: #b39455;

            font-size: 10px;
            font-weight: 600;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .management-header h1 {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 52px;
            font-weight: 500;
            line-height: 1;

            color: #1e1d1b;
        }

        .management-header h1 span {
            color: #b39455;
            font-style: italic;
        }

        .management-description {
            max-width: 530px;
            margin-top: 15px;

            color: #77736d;

            font-size: 12px;
            line-height: 1.8;
        }

        .add-service {
            min-height: 48px;
            padding: 0 23px;

            display: inline-flex;
            justify-content: center;
            align-items: center;

            color: #ffffff;
            background: #b39455;

            border: 1px solid #b39455;

            text-decoration: none;

            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.3px;
            text-transform: uppercase;

            transition: .3s;
            white-space: nowrap;
        }

        .add-service:hover {
            background: #92743d;
            border-color: #92743d;
        }

        .success-message {
            margin-bottom: 30px;
            padding: 17px 20px;

            color: #5c684b;
            background: #f4f7ef;

            border-left: 3px solid #899c70;

            font-size: 12px;
        }

        .service-list {
            display: grid;
            gap: 16px;
        }

        .management-card {
            padding: 27px 30px;

            display: grid;
            grid-template-columns: 60px 1.1fr 170px 2fr auto;
            gap: 25px;
            align-items: center;

            background: #ffffff;

            border: 1px solid #e7e0d5;

            transition: .3s;
        }

        .management-card:hover {
            border-color: #d7c39a;

            box-shadow: 0 12px 35px rgba(78, 65, 40, .06);

            transform: translateY(-2px);
        }

        .service-index-number {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 27px;

            color: #b39455;
        }

        .service-info h2 {
            margin-bottom: 5px;

            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 26px;
            font-weight: 600;

            color: #25231f;
        }

        .service-info span {
            color: #aaa49a;

            font-size: 8px;
            letter-spacing: 1.8px;
            text-transform: uppercase;
        }

        .service-price-label {
            display: block;
            margin-bottom: 4px;

            color: #a19b91;

            font-size: 8px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .service-price-value {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 21px;
            font-weight: 600;

            color: #92743d;
        }

        .service-description {
            color: #77736d;

            font-size: 11px;
            line-height: 1.8;
        }

        .service-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .service-actions form {
            margin: 0;
        }

        .edit-button,
        .delete-button {
            min-height: 39px;
            padding: 0 15px;

            display: inline-flex;
            justify-content: center;
            align-items: center;

            font-size: 9px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;

            cursor: pointer;
            text-decoration: none;

            transition: .3s;
        }

        .edit-button {
            color: #92743d;
            background: #ffffff;

            border: 1px solid #d7c39a;
        }

        .edit-button:hover {
            color: #ffffff;
            background: #b39455;
        }

        .delete-button {
            color: #9d5555;
            background: #ffffff;

            border: 1px solid #e1c5c5;
        }

        .delete-button:hover {
            color: #ffffff;
            background: #9d5555;
            border-color: #9d5555;
        }

        .empty-state {
            padding: 75px 30px;

            text-align: center;

            background: #ffffff;
            border: 1px solid #e7e0d5;
        }

        .empty-state span {
            color: #b39455;

            font-size: 10px;
            letter-spacing: 3px;
        }

        .empty-state h2 {
            margin: 10px 0;

            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 35px;
            font-weight: 500;
        }

        .empty-state p {
            margin-bottom: 25px;

            color: #77736d;
            font-size: 12px;
        }

        .management-footer {
            margin-top: 35px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            color: #9b958c;

            font-size: 9px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .back-home {
            color: #92743d;
            text-decoration: none;
        }

        .back-home:hover {
            color: #b39455;
        }

        @media (max-width: 950px) {
            .management-card {
                grid-template-columns: 45px 1fr 150px;
            }

            .service-description {
                grid-column: 2 / 4;
            }

            .service-actions {
                grid-column: 2 / 4;
            }
        }

        @media (max-width: 700px) {
            .management-page {
                padding: 55px 5%;
            }

            .management-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .management-header h1 {
                font-size: 42px;
            }

            .management-card {
                grid-template-columns: 40px 1fr;
                gap: 15px;
            }

            .service-price,
            .service-description,
            .service-actions {
                grid-column: 2;
            }

            .management-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <a href="{{ route('home') }}" class="logo">
            Glowithsya
        </a>

        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('services.index') }}">Services</a>
        </div>

    </nav>


    <main class="management-page">

        <div class="management-wrapper">


            <div class="management-header">

                <div>

                    <p class="management-label">
                        Service Management
                    </p>

                    <h1>
                        Glowithsya <span>Pricelist</span>
                    </h1>

                    <p class="management-description">
                        Kelola layanan dan harga makeup Glowithsya.
                        Data pada halaman ini digunakan untuk menampilkan
                        pricelist pada website.
                    </p>

                </div>


                <a
                    href="{{ route('services.create') }}"
                    class="add-service"
                >
                    + Tambah Service
                </a>

            </div>


            @if(session('success'))

                <div class="success-message">
                    ✓ {{ session('success') }}
                </div>

            @endif


            <div class="service-list">

                @forelse($services as $service)

                    <article class="management-card">

                        <div class="service-index-number">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </div>


                        <div class="service-info">

                            <h2>
                                {{ $service->name }}
                            </h2>

                            <span>
                                Glowithsya Service
                            </span>

                        </div>


                        <div class="service-price">

                            <span class="service-price-label">
                                Price
                            </span>

                            <span class="service-price-value">
                                IDR {{ number_format($service->price, 0, ',', '.') }}
                            </span>

                        </div>


                        <div class="service-description">
                            {{ $service->description ?: 'Belum ada deskripsi untuk service ini.' }}
                        </div>


                        <div class="service-actions">

                            <a
                                href="{{ route('services.edit', $service) }}"
                                class="edit-button"
                            >
                                Edit
                            </a>


                            <form
                                action="{{ route('services.destroy', $service) }}"
                                method="POST"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-button"
                                    onclick="return confirm('Yakin ingin menghapus service {{ $service->name }}?')"
                                >
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </article>

                @empty

                    <div class="empty-state">

                        <span>NO SERVICE YET</span>

                        <h2>
                            Belum ada service.
                        </h2>

                        <p>
                            Tambahkan paket makeup pertama Glowithsya
                            untuk mulai mengisi pricelist.
                        </p>

                        <a
                            href="{{ route('services.create') }}"
                            class="add-service"
                        >
                            + Tambah Service
                        </a>

                    </div>

                @endforelse

            </div>


            <div class="management-footer">

                <a href="{{ route('home') }}" class="back-home">
                    ← Kembali ke Website
                </a>

                <span>
                    {{ $services->count() }} Service Tersedia
                </span>

            </div>

        </div>

    </main>

</body>
</html>