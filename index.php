<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Zoo Kids</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
  
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Fredoka', 'sans-serif'] },
          colors: {
            green: '#34c759',
            orange: '#ff9500',
            yellow: '#ffcc00',
            pink: '#ff2d92',
            blue: '#5ac8fa',
          }
        }
      }
    }
  </script>
  <style>
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 48 }
    .material-symbols-filled { font-variation-settings: 'FILL' 1 }
  </style>
</head>

<body class="bg-gradient-to-br from-sky-50 to-white font-sans min-h-screen flex flex-col">

  <div class="sticky top-0 bg-white/95 backdrop-blur shadow-md z-50">
    <div class="flex items-center justify-between px-5 py-4">
      <div class="flex items-center gap-3">
        <span class="material-symbols-outlined text-5xl text-green">pets</span>
        <h1 class="text-2xl font-bold text-green">Zoo Kids</h1>
      </div>
      
      <!-- Language Icon (top right) -->
      <button class="flex items-center gap-2 bg-gray-100 rounded-full px-4 py-2 text-sm font-medium">
        <span class="material-symbols-outlined text-green">language</span>
        <span>English</span>
        <span class="text-xs">▼</span>
      </button>
    </div>

   
  </div>

  <main class="flex-1 px-5 pt-6 pb-28 max-w-6xl mx-auto w-full">
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

      
      <a href="liste_animaux.php" class="group block transform transition hover:-translate-y-2">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden h-full flex flex-col">
          <div class="h-48 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1546182990-dffeafbe841d?w=800&auto=format&fit=crop&q=80')"></div>
          <div class="p-6 flex-1 flex flex-col">
            <h3 class="text-xl font-bold text-gray-800 mb-2">My Animals</h3>
          
            <div class="mt-auto bg-green text-white py-3 rounded-full text-center font-bold group-hover:bg-emerald-600 transition">
              Manage Animals →
            </div>
          </div>
        </div>
      </a>

      <a href="liste_habitat.php" class="group block transform transition hover:-translate-y-2">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden h-full flex flex-col">
          <div class="h-48 bg-cover bg-center" style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuADT-EUSJ0NamPq_8vSpYGYERHsVTna76xfAP0FxTU2ds4PwW30OFmy6bQSfJCy2FYGQ5sbH5PusCLtXLHnzU-hrrmd88zLca_oF0OBaNiW4bVUT1ucsRcua2m46P-WDaL9Eh_Q0torUoIaKDzvuk5QChChKgtvvxM5owpPWF11cJ071p99V7BE1HbREkYmi7Vc7RCTo1Ak-pJXBOAr4jdLB4oyZ7rO9zcPUjyfnPAGHMolQ4ZvTPZhnFrKUHFItrdwRGy4YxkAMts')"></div>
          <div class="p-6 flex-1 flex flex-col">
            <h3 class="text-xl font-bold text-gray-800 mb-2">Habitats</h3>
            <p class="text-gray-600 text-sm mb-4">Savanna • Ocean • Rainforest</p>
            <div class="mt-auto bg-orange text-white py-3 rounded-full text-center font-bold group-hover:bg-orange-600 transition">
              Explore Worlds →
            </div>
          </div>
        </div>
      </a>

      <!-- Zoo Stats -->
      <a href="statistique.php" class="group block transform transition hover:-translate-y-2">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden h-full flex flex-col">
          <div class="h-48 bg-cover bg-center" style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuB_uRheoRww8gon6nE0IOaiR91-z8QNQlGvtSrVUwEF-3UEm_XIkGYah1LQLsBDudN2jbPusW9LT5NzIuD0P4ZrOOGGNhwiIogFTM1Vw0CpYGkAl2z3ITSoZ80ITS7jR3KYgysxNIhepOLUZiSv8DQZEfFahahXkblpGEoDc1HONIpjnFauUAlk9baJ4YM6iPbsy5-dIV-ppQFf4E7KmlEyOJvDMurYk-RbaPAjXT68qaU_Jh_JRWx4JO_eS_gdjsyJcmahjWjYatU')"></div>
          <div class="p-6 flex-1 flex flex-col">
            <h3 class="text-xl font-bold text-gray-800 mb-2">Zoo Stats</h3>
          
            <div class="mt-auto bg-yellow text-gray-800 py-3 rounded-full text-center font-bold group-hover:bg-yellow-400 transition">
              See Rankings →
            </div>
          </div>
        </div>
      </a>

  
      <a href="jeux.php" class="group block transform transition hover:-translate-y-2">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden h-full flex flex-col">
          <div class="h-48 bg-cover bg-center" style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuDLUuzzzcuyYkDhPDruwN3wFRkgd_Xi9KeWDP4EnosHNCJEjND4Nrpx1zyfDp-BPjiEwe5JlfbwUQfCpxN-wMktvcMuo_EwA3LID9Je5_JoL-5eGJSJwlijaPltA1zTGucYtIAZYeeYrXfm33WAiJtoVG6SiILgkTiu3m9rJzMP71x-l_baCGZRCH86eKL_A-WmMc1iMRmrhIfA205CQAtW0zTeZLnfrwJ7YWzliwnJ3LtjBUildXPEJCK2-fLjc2gcKa-IuApaQRE')"></div>
          <div class="p-6 flex-1 flex flex-col">
            <h3 class="text-xl font-bold text-gray-800 mb-2">jeux</h3>
           
            <div class="mt-auto bg-pink text-white py-3 rounded-full text-center font-bold group-hover:bg-pink-600 transition">
              Play Now →
            </div>
          </div>
        </div>
      </a>

    </div>
  </main>

  <!-- Bottom Navigation (Mobile) -->
<div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-50">

    <div class="flex justify-around py-3">
      <a href="index.php" class="flex flex-col items-center text-green">
        <span class="material-symbols-filled text-3xl">dashboard</span>
        <span class="text-xs font-bold">Home</span>
      </a>
      <a href="liste_animaux.php" class="flex flex-col items-center text-gray-600">
        <span class="material-symbols-outlined text-3xl">cruelty_free</span>
        <span class="text-xs">Animals</span>
      </a>
      <a href="liste_habitat.php" class="flex flex-col items-center text-gray-600">
        <span class="material-symbols-outlined text-3xl">forest</span>
        <span class="text-xs">Habitats</span>
      </a>
      <a href="statistique.php" class="flex flex-col items-center text-gray-600">
        <span class="material-symbols-outlined text-3xl">bar_chart</span>
        <span class="text-xs">Statistique</span>
      </a>
      <a href="jeux.php" class="flex flex-col items-center text-gray-600">
        <span class="material-symbols-outlined text-3xl">joystick</span>
        <span class="text-xs">jeux</span>
      </a>
    </div>
</div>
</body>
</html>