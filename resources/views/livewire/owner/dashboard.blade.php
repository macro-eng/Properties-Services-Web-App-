    <div class="p-6 space-y-6">
        <h1 class="text-2xl font-bold text-gray-800">لوحة التحكم</h1>
        <!-- الإحصائيات -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500">عدد العقارات</p>
                <h2 class="text-3xl font-bold text-blue-600">{{$count}}</h2>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500">الحجوزات الحالية</p>
                <h2 class="text-3xl font-bold text-green-600">5</h2>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500">الأرباح الشهرية</p>
                <h2 class="text-3xl font-bold text-purple-600">$1,200</h2>
            </div>
        </div>

        <!-- رسم بياني (مكان مخصص لاحقًا لإضافة Chart.js) -->
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="font-bold text-gray-700 mb-4">الأرباح الشهرية</h2>
            <div class="h-64 flex items-center justify-center text-gray-400">
                [رسم بياني هنا]
            </div>
        </div>
    </div>
