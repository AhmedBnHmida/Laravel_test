<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'InnovQube') }} - Accueil</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Figtree', sans-serif;
        }
        
        .split-container {
            display: flex;
            height: 100vh;
        }
        
        .admin-section {
            flex: 1;
            background: linear-gradient(135deg, #1E40AF 0%, #2563eb 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .user-section {
            flex: 1;
            background: linear-gradient(135deg, #9333EA 0%, #a855f7 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .admin-section:hover, .user-section:hover {
            flex: 1.2;
            transform: scale(1.02);
        }
        
        .admin-section:hover {
            background: linear-gradient(135deg, #1e3a8a 0%, #1E40AF 100%);
        }
        
        .user-section:hover {
            background: linear-gradient(135deg, #7c3aed 0%, #9333EA 100%);
        }
        
        .section-content {
            text-align: center;
            z-index: 2;
            position: relative;
        }
        
        .icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            display: block;
        }
        
        .title {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        
        .subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 300px;
        }
        
        .click-hint {
            position: absolute;
            bottom: 2rem;
            font-size: 0.9rem;
            opacity: 0.8;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 1; }
        }
        
        /* Effet de vague animé */
        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23ffffff' fill-opacity='0.1' d='M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,213.3C672,192,768,128,864,128C960,128,1056,192,1152,197.3C1248,203,1344,149,1392,122.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            animation: wave 10s linear infinite;
        }
        
        @keyframes wave {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100px); }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .split-container {
                flex-direction: column;
            }
            
            .title {
                font-size: 2rem;
            }
            
            .icon {
                font-size: 3rem;
            }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="split-container">
        <!-- Section Admin -->
        <a href="{{ url('/admin') }}" class="admin-section">
            <div class="wave"></div>
            <div class="section-content">
                <span class="icon">🔐</span>
                <h1 class="title">ADMIN</h1>
                <p class="subtitle">Interface d'administration complète</p>
            </div>
            <div class="click-hint">Cliquez pour accéder</div>
        </a>

        <!-- Section Utilisateur -->
        <a href="{{ url('/user') }}" class="user-section">
            <div class="wave"></div>
            <div class="section-content">
                <span class="icon">👥</span>
                <h1 class="title">UTILISATEUR</h1>
                <p class="subtitle">Découvrez et réservez nos propriétés</p>
            </div>
            <div class="click-hint">Cliquez pour accéder</div>
        </a>
    </div>

    <!-- Footer fixe -->
    <div style="position: fixed; bottom: 0; width: 100%; text-align: center; padding: 1rem; background: rgba(0,0,0,0.5); color: white; z-index: 1000;">
        <p>&copy; {{ date('Y') }} InnovQube - Gestion de réservations immobilières</p>
    </div>
</body>
</html>