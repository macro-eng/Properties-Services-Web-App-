<!-- resources/views/company/contacts/report.blade.php -->
<x-company-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">📊 تقرير العملاء</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- كارت -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-gray-500">الطلبات الجديدة</h3>
                <p class="text-3xl font-bold text-orange-600 mt-2">12</p>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-gray-500">العقود النشطة</h3>
                <p class="text-3xl font-bold text-orange-600 mt-2">7</p>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-gray-500">الإيرادات الشهرية</h3>
                <p class="text-3xl font-bold text-green-600 mt-2">$4,230</p>
            </div>
        </div>

        <div class="bg-white shadow rounded-2xl p-6">
            <h2 class="text-lg font-semibold mb-4">📈 أداء العملاء</h2>
            <canvas id="clientsChart"></canvas>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            new Chart(document.getElementById('clientsChart'), {
            type: 'bar',
            data: {
                labels: ["YA","May","March","Jar","Feb"],
                datasets: [{
                    label: 'عدد الطلبات',
                    data: [12,24,23,90,23],
                    backgroundColor: '#6366f1'
                }]
            }
        });
        </script>

    </div>
</x-company-layout>
