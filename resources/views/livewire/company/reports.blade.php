
{{-- <div>
    
    <h2 class="text-xl font-bold mb-4">التقارير</h2>
    
    <div class="bg-white rounded-xl shadow p-6">
        <form class="flex gap-4 mb-4">
            <input type="date" class="border rounded-lg px-3 py-2">
            <input type="date" class="border rounded-lg px-3 py-2">
            <button class="bg-orange-600 text-white px-4 py-2 rounded-lg">📊 عرض التقرير</button>
        </form>
        
        <table class="w-full text-right">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="p-3">الخدمة</th>
                    <th class="p-3">عدد الطلبات</th>
                    <th class="p-3">الإيرادات</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="p-3">نظافة يومية</td>
                    <td class="p-3">25</td>
                    <td class="p-3 text-green-600">$1,250</td>
                </tr>
            </tbody>
        </table>
        
        <button class="mt-6 bg-blue-600 text-white px-4 py-2 rounded-lg">🖨️ طباعة PDF</button>
    </div>
    
</div> --}}
<!-- resources/views/company/contacts/report.blade.php -->
{{-- <x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">📊 تقرير العملاء</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="p-6 bg-white shadow rounded-2xl">
                <h2 class="text-sm font-medium text-gray-500">إجمالي العملاء</h2>
                <p class="text-3xl font-bold">{{ $stats['total'] }}</p>
            </div>

            <div class="p-6 bg-white shadow rounded-2xl">
                <h2 class="text-sm font-medium text-gray-500">العملاء النشطون</h2>
                <p class="text-3xl font-bold text-green-600">{{ $stats['active'] }}</p>
            </div>

            <div class="p-6 bg-white shadow rounded-2xl">
                <h2 class="text-sm font-medium text-gray-500">الطلبات المكتملة</h2>
                <p class="text-3xl font-bold text-blue-600">{{ $stats['completed_orders'] }}</p>
            </div>

            <div class="p-6 bg-white shadow rounded-2xl">
                <h2 class="text-sm font-medium text-gray-500">الطلبات الملغاة</h2>
                <p class="text-3xl font-bold text-red-600">{{ $stats['cancelled_orders'] }}</p>
            </div>
        </div>

        <div class="bg-white shadow rounded-2xl p-6">
            <h2 class="text-lg font-semibold mb-4">📈 أداء العملاء</h2>
            <canvas id="clientsChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('clientsChart'), {
            type: 'bar',
            data: {
                labels: @json($stats['months']),
                datasets: [{
                    label: 'عدد الطلبات',
                    data: @json($stats['orders_per_month']),
                    backgroundColor: '#6366f1'
                }]
            }
        });
    </script>
</x-app-layout> --}}
