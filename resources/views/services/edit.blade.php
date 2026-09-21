<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Service | Glowithsya</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .admin-page {
            min-height: 100vh;
            padding: 70px 7%;
            background: #f8f5ef;
        }

        .admin-wrapper {
            max-width: 760px;
            margin: 0 auto;
        }

        .admin-back {
            display: inline-block;
            margin-bottom: 35px;

            color: #92743d;
            text-decoration: none;

            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .form-card {
            padding: 55px;

            background: #ffffff;
            border: 1px solid #e7e0d5;
        }

        .form-header {
            margin-bottom: 42px;
        }

        .form-label-top {
            margin-bottom: 10px;

            color: #b39455;

            font-size: 10px;
            font-weight: 600;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .form-header h1 {
            margin-bottom: 10px;

            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 48px;
            font-weight: 500;

            color: #1e1d1b;
        }

        .form-header h1 span {
            color: #b39455;
            font-style: italic;
        }

        .form-header p {
            color: #77736d;
            font-size: 13px;
            line-height: 1.8;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;

            color: #3c3934;

            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.3px;
            text-transform: uppercase;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;

            padding: 15px 16px;

            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 13px;

            color: #2b2925;
            background: #fdfcf9;

            border: 1px solid #ddd5c8;
            outline: none;

            transition: .3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            background: #ffffff;
            border-color: #b39455;

            box-shadow: 0 0 0 3px rgba(179, 148, 85, .08);
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
            line-height: 1.8;
        }

        .field-note {
            display: block;
            margin-top: 7px;

            color: #99938a;
            font-size: 10px;
        }

        .form-actions {
            display: flex;
            gap: 12px;

            margin-top: 35px;
            padding-top: 30px;

            border-top: 1px solid #eee8dd;
        }

        .admin-submit,
        .admin-cancel {
            min-height: 48px;
            padding: 0 25px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            text-decoration: none;

            cursor: pointer;
            transition: .3s;
        }

        .admin-submit {
            color: #ffffff;
            background: #b39455;

            border: 1px solid #b39455;
        }

        .admin-submit:hover {
            background: #92743d;
            border-color: #92743d;
        }

        .admin-cancel {
            color: #5d5850;
            background: transparent;

            border: 1px solid #d8d0c3;
        }

        .admin-cancel:hover {
            color: #92743d;
            border-color: #b39455;
        }

        .validation-error {
            margin-bottom: 30px;
            padding: 18px 20px;

            color: #8f4545;
            background: #fff7f7;

            border-left: 3px solid #b96868;

            font-size: 12px;
            line-height: 1.8;
        }

        .validation-error ul {
            margin: 0;
            padding-left: 18px;
        }

        @media (max-width: 700px) {
            .admin-page {
                padding: 40px 5%;
            }

            .form-card {
                padding: 35px 25px;
            }

            .form-header h1 {
                font-size: 39px;
            }

            .form-actions {
                flex-direction: column;
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


    <main class="admin-page">

        <div class="admin-wrapper">

            <a href="{{ route('services.index') }}" class="admin-back">
                ← Kembali ke Services
            </a>


            <div class="form-card">

                <div class="form-header">

                    <p class="form-label-top">
                        Service Management
                    </p>

                    <h1>
                        Edit <span>Service</span>
                    </h1>

                    <p>
                        Perbarui informasi paket makeup.
                        Perubahan akan ikut tampil pada pricelist Glowithsya.
                    </p>

                </div>


                @if($errors->any())
                    <div class="validation-error">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form
                    action="{{ route('services.update', $service) }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')


                    <div class="form-group">

                        <label for="name">
                            Nama Service
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name', $service->name) }}"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="price">
                            Harga
                        </label>

                        <input
                            id="price"
                            type="number"
                            name="price"
                            value="{{ old('price', $service->price) }}"
                            min="0"
                            required
                        >

                        <span class="field-note">
                            Masukkan angka tanpa Rp dan tanpa titik.
                        </span>

                    </div>


                    <div class="form-group">

                        <label for="description">
                            Deskripsi
                        </label>

                        <textarea
                            id="description"
                            name="description"
                        >{{ old('description', $service->description) }}</textarea>

                    </div>


                    <div class="form-actions">

                        <button type="submit" class="admin-submit">
                            Simpan Perubahan
                        </button>

                        <a
                            href="{{ route('services.index') }}"
                            class="admin-cancel"
                        >
                            Batal
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>
</html>