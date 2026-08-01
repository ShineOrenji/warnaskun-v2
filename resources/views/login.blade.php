<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Warung Nasi Kuning Ibu Opik</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* ---------- RESET & BASE ---------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --gold: hsl(45, 80%, 50%);
            --gold-light: #e8c96e;
            --gold-dark: #b8922f;
            --gold-bg: rgba(212, 168, 67, 0.08);
            
            --bg-primary: #0d0d0d;
            --bg-card: #1a1a1a;
            --bg-hover: #222222;
            
            --text-primary: #ffffff;
            --text-secondary: #a0a0a0;
            --text-muted: #6b6b6b;
            
            --border-color: #2a2a2a;
            --radius: 12px;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg-primary);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            background-image: 
                radial-gradient(ellipse at 10% 20%, rgba(212, 168, 67, 0.05) 0%, transparent 50%),
                radial-gradient(ellipse at 90% 80%, rgba(212, 168, 67, 0.05) 0%, transparent 50%);
        }

        /* ---------- LOGIN CARD ---------- */
        .card {
            background: var(--bg-card);
            padding: 40px 36px;
            border-radius: var(--radius);
            width: 100%;
            max-width: 400px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            border: 1px solid var(--border-color);
            animation: fadeInUp 0.5s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ---------- LOGO ---------- */
        .login-logo {
            text-align: center;
            margin-bottom: 28px;
        }

        .login-logo .logo-icon {
            width: 56px;
            height: 56px;
            background: var(--gold);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            font-size: 26px;
            color: #000;
        }

        .login-logo h1 {
            font-family: 'Forum', cursive;
            font-size: 24px;
            font-weight: 400;
            color: var(--text-primary);
            letter-spacing: 2px;
        }

        .login-logo small {
            display: block;
            font-size: 12px;
            color: var(--text-muted);
            font-weight: 400;
            margin-top: 2px;
        }

        /* ---------- TITLE ---------- */
        .card h2 {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 20px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .card h2 i {
            color: var(--gold);
        }

        /* ---------- ERROR ---------- */
        .error {
            color: #ef4444;
            margin-bottom: 16px;
            padding: 10px 14px;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 8px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .error i {
            font-size: 16px;
        }

        /* ---------- FORM ---------- */
        form {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        /* ---------- INPUT ---------- */
        .input-group {
            position: relative;
            margin-bottom: 8px;
        }

        .input-group i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 14px;
            transition: var(--transition);
        }

        input {
            width: 100%;
            padding: 12px 16px 12px 44px;
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            color: var(--text-primary);
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
            outline: none;
            transition: var(--transition);
            box-sizing: border-box;
        }

        input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 168, 67, 0.1);
        }

        input::placeholder {
            color: var(--text-muted);
        }

        /* ---------- BUTTON ---------- */
        button {
            width: 100%;
            padding: 12px;
            background: var(--gold);
            color: #000;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 700;
            font-family: 'DM Sans', sans-serif;
            transition: var(--transition);
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        button:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(212, 168, 67, 0.3);
        }

        button:active {
            transform: translateY(0);
        }

        button i {
            font-size: 16px;
        }

        /* ---------- FOOTER ---------- */
        .login-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: var(--text-muted);
            border-top: 1px solid var(--border-color);
            padding-top: 16px;
        }

        .login-footer a {
            color: var(--gold);
            text-decoration: none;
            transition: var(--transition);
        }

        .login-footer a:hover {
            color: var(--gold-light);
            text-decoration: underline;
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 480px) {
            .card {
                padding: 28px 20px;
                border-radius: 10px;
            }

            .login-logo .logo-icon {
                width: 48px;
                height: 48px;
                font-size: 22px;
            }

            .login-logo h1 {
                font-size: 20px;
            }

            .card h2 {
                font-size: 16px;
            }

            input {
                padding: 10px 14px 10px 38px;
                font-size: 13px;
            }

            .input-group i {
                font-size: 13px;
                left: 12px;
            }

            button {
                padding: 10px;
                font-size: 14px;
            }

            .error {
                font-size: 12px;
                padding: 8px 12px;
            }
        }

        @media (max-width: 380px) {
            .card {
                padding: 20px 16px;
            }

            .login-logo .logo-icon {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }

            .login-logo h1 {
                font-size: 18px;
            }

            .card h2 {
                font-size: 14px;
            }

            input {
                padding: 8px 12px 8px 34px;
                font-size: 12px;
            }

            button {
                padding: 8px;
                font-size: 13px;
            }

            .login-footer {
                font-size: 11px;
            }
        }
    </style>
</head>
<body>

<div class="card">

    <!-- Logo -->
    <div class="login-logo">
        <div class="logo-icon">
            <i class="fas fa-utensils"></i>
        </div>
        <h1>Ibu Opik</h1>
        <small>Warung Nasi Kuning</small>
    </div>

    <h2>
        <i class="fas fa-lock"></i>
        Login Admin
    </h2>

    @if($errors->any())
        <div class="error">
            <i class="fas fa-exclamation-circle"></i>
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.process') }}">
        @csrf

        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input
                type="email"
                name="email"
                placeholder="Email"
                required
            >
        </div>

        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input
                type="password"
                name="password"
                placeholder="Password"
                required
            >
        </div>

        <button type="submit">
            <i class="fas fa-sign-in-alt"></i>
            Login
        </button>

    </form>

    <div class="login-footer">
        &copy; {{ date('Y') }} Warung Nasi Kuning Ibu Opik
    </div>

</div>

</body>
</html>