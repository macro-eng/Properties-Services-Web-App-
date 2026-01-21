<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'لوحة الشركة' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans">

    <div class="flex min-h-screen">

        <!-- ✅ الشريط الجانبي -->
        <aside class="w-64 bg-gradient-to-b from-orange-600 to-amber-500  flex flex-col shadow-lg">
            
            <!-- شعار -->
            <div class="p-6 text-center font-extrabold text-2xl border-b border-orange-400">
                🏢 شركتي
            </div>

            <!-- روابط -->
            <nav class="flex-1 p-4 space-y-2">
                <a href="/company/dashboard" class="flex items-center px-4 py-2 rounded-lg hover:bg-orange-400 transition">
                    📊 <span class="mr-2">لوحة التحكم</span>
                </a>
                <a href="/company/services" class="flex items-center px-4 py-2 rounded-lg hover:bg-orange-400 transition">
                    🛠️ <span class="mr-2">الخدمات</span>
                </a>
                <a href="/company/requests" class="flex items-center px-4 py-2 rounded-lg hover:bg-orange-400 transition">
                    📥 <span class="mr-2">الطلبات</span>
                </a>
                <a href="/company/contracts" class="flex items-center px-4 py-2 rounded-lg hover:bg-orange-400 transition">
                    📑 <span class="mr-2">العقود</span>
                </a>
                <a href="/company/payments" class="flex items-center px-4 py-2 rounded-lg hover:bg-orange-400 transition">
                    💰 <span class="mr-2">المدفوعات</span>
                </a>
                <a href="/company/reports" class="flex items-center px-4 py-2 rounded-lg hover:bg-orange-400 transition">
                    📈 <span class="mr-2">التقارير</span>
                </a>
                <a href="/company/profile" class="flex items-center px-4 py-2 rounded-lg hover:bg-orange-400 transition">
                    👤 <span class="mr-2">الملف الشخصي</span>
                </a>
            </nav>

            <!-- زر تسجيل الخروج -->
            <div class="p-4 border-t border-orange-400">
                <a href="/logout" class="block w-full text-center bg-red-500 hover:bg-red-600 py-2 rounded-xl font-semibold">
                    🚪 تسجيل الخروج
                </a>
            </div>
        </aside>

        <!-- ✅ المحتوى الرئيسي -->
        <main class="flex-1 flex flex-col">
            
            <!-- ✅ التوب بار -->
            <header class="bg-white shadow px-6 py-4 flex items-center justify-between">
                <h1 class="text-lg font-bold text-gray-700">
                    {{ $title ?? 'لوحة الشركة' }}
                </h1>

                <div class="flex items-center space-x-6 space-x-reverse">
                    <!-- البحث -->
                    <div class="relative">
                        <input type="text" placeholder="بحث..." class="pl-8 pr-3 py-2 border rounded-xl focus:ring-2 focus:ring-orange-400">
                        <span class="absolute left-2 top-2 text-gray-400">🔍</span>
                    </div>

                    <!-- الإشعارات -->
                    <button class="relative hover:scale-110 transition">
                        🔔
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1 rounded-full">5</span>
                    </button>

                    <!-- الحساب -->
                    <div class="flex items-center space-x-2 space-x-reverse">
                        <img src="https://i.pravatar.cc/40?u=company" class="w-9 h-9 rounded-full border">
                        <span class="text-gray-700 font-medium">شركة التشغيل</span>
                    </div>
                </div>
            </header>

            <!-- ✅ محتوى الصفحة -->
            <section class="p-6 flex-1">
                {{ $slot }}
            </section>
        </main>
    </div>

</body>
</html>
