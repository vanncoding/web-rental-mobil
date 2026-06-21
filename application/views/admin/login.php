<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - PremiumRental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --gold: #D4AF37; --dark: #0B1A33; }
        body {
            background: #0A0A0A;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card {
            background: #1A1A2E;
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 20px;
            padding: 40px 35px;
            max-width: 420px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0,0,0,0.8);
        }
        .login-card .logo {
            color: var(--gold);
            font-size: 2rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 8px;
        }
        .login-card .subtitle {
            color: #aaa;
            text-align: center;
            margin-bottom: 30px;
            font-size: 0.9rem;
        }
        .login-card .form-control {
            background: #0F0F1A;
            border: 1px solid #333;
            color: #fff;
            border-radius: 12px;
            padding: 12px 16px;
        }
        .login-card .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
        }
        .btn-gold {
            background: var(--gold);
            color: #000;
            font-weight: 700;
            border: none;
            padding: 12px;
            border-radius: 50px;
            width: 100%;
            transition: 0.3s;
        }
        .btn-gold:hover {
            background: #C09C2E;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
        }
        .text-gold { color: var(--gold); }
        .alert-custom {
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.3);
            color: var(--gold);
            border-radius: 12px;
            padding: 10px 16px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo"><i class="bi bi-star-fill"></i> PremiumRental</div>
        <div class="subtitle">Admin Dashboard</div>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert-custom mb-3"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('admin/login') ?>">
            <div class="mb-3">
                <label class="form-label text-white">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-white">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn-gold">Login</button>
        </form>
        <p class="text-center text-secondary mt-3 small">
            <i class="bi bi-shield-lock"></i> Akses terbatas untuk admin
        </p>
    </div>
</body>
</html>