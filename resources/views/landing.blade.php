
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RealEstate - Find Your Dream Property</title>
  <style>
    ::-webkit-scrollbar {
      display: none;
    }
  </style>
</head>
<body class="bg-white text-gray-800">

  <!-- Header -->
  <header class="fixed top-0 w-full z-50 bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-indigo-600">RealEstate</h1>
      <nav class="space-x-4">
        <a href="#features" class="text-gray-700 hover:text-indigo-600 text-sm">Features</a>
        <a href="#how" class="text-gray-700 hover:text-indigo-600 text-sm">How It Works</a>
        <a href="/login" class="text-sm text-gray-700 hover:text-indigo-600">Login</a>
        <a href="/register" class="bg-indigo-600 text-white px-4 py-2 rounded-full text-sm hover:bg-indigo-700">Get Started</a>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c');">
    <div class="text-center text-white bg-black bg-opacity-50 p-10 rounded-lg">
      <h2 class="text-4xl md:text-5xl font-extrabold mb-4">Find Your Next Home</h2>
      <p class="text-lg mb-6">Explore properties, rent or sell easily. All in one platform.</p>
      <a href="/register" class="bg-indigo-600 px-6 py-3 text-white rounded-full hover:bg-indigo-700">Get Started</a>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
      <h3 class="text-3xl font-bold text-center mb-12">Why Choose Us?</h3>
      <div class="grid md:grid-cols-3 gap-10">
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition">
          <div class="text-4xl mb-4">🏠</div>
          <h4 class="font-semibold text-lg mb-2">Browse Properties</h4>
          <p class="text-sm text-gray-600">Filter and explore properties by city, type, or price instantly.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition">
          <div class="text-4xl mb-4">🗺️</div>
          <h4 class="font-semibold text-lg mb-2">Map Integration</h4>
          <p class="text-sm text-gray-600">Search and list properties using interactive maps.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition">
          <div class="text-4xl mb-4">📊</div>
          <h4 class="font-semibold text-lg mb-2">Dashboard & Reports</h4>
          <p class="text-sm text-gray-600">Manage your listings, bookings, and analytics with ease.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- How It Works -->
  <section id="how" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
      <h3 class="text-3xl font-bold text-center mb-12">How It Works</h3>
      <div class="grid md:grid-cols-3 gap-10 text-center">
        <div>
          <div class="text-5xl mb-3">📝</div>
          <h5 class="font-semibold text-lg mb-1">1. Sign Up</h5>
          <p class="text-gray-600 text-sm">Register as owner, tenant, or guest.</p>
        </div>
        <div>
          <div class="text-5xl mb-3">🏡</div>
          <h5 class="font-semibold text-lg mb-1">2. Add or Browse</h5>
          <p class="text-gray-600 text-sm">Add your properties or browse available listings.</p>
        </div>
        <div>
          <div class="text-5xl mb-3">💬</div>
          <h5 class="font-semibold text-lg mb-1">3. Connect & Deal</h5>
          <p class="text-gray-600 text-sm">Contact owners, book properties, and finalize deals.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-20 bg-indigo-600 text-white text-center">
    <h4 class="text-3xl font-bold mb-4">Ready to find your dream place?</h4>
    <a href="/register" class="mt-4 inline-block bg-white text-indigo-600 px-6 py-3 rounded-full font-bold hover:bg-gray-100">
      Join Now
    </a>
  </section>

  <!-- Footer -->
  <footer class="bg-white border-t py-6 text-center text-sm text-gray-500">
    &copy; {{ date('Y') }} RealEstate Platform. All rights reserved.
  </footer>

</body>
</html>
