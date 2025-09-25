<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>InnovQube - Accueil</title>
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="m-0 p-0 h-screen">

  <div class="flex h-full">
    <a href="/admin" class="flex-1 bg-gradient-to-br from-blue-900 to-blue-700 text-white text-4xl font-bold flex items-center justify-center hover:from-blue-800 hover:to-blue-600 transition-all duration-300">
      <div class="text-center">
        <div class="text-6xl mb-4">🔐</div>
        ADMIN
      </div>
    </a>
    <a href="/user" class="flex-1 bg-gradient-to-br from-purple-900 to-purple-700 text-white text-4xl font-bold flex items-center justify-center hover:from-purple-800 hover:to-purple-600 transition-all duration-300">
      <div class="text-center">
        <div class="text-6xl mb-4">👥</div>
        USER
      </div>
    </a>
  </div>

  <!-- Footer optionnel -->
  <div class="fixed bottom-0 w-full text-center p-2 bg-black bg-opacity-50 text-white text-sm">
    &copy; {{ date('Y') }} InnovQube - Gestion de réservations
  </div>

</body>
</html>