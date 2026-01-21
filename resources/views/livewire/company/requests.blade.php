<div>
{{-- <x-company-layout title="الطلبات"> --}}
    
    <h2 class="text-xl font-bold mb-4">الطلبات الواردة</h2>

    <table class="w-full bg-white rounded-xl shadow overflow-hidden">
        <thead class="bg-gray-100 text-gray-600">
            <tr>
                <th class="p-3">المالك</th>
                <th class="p-3">العقار</th>
                <th class="p-3">الخدمة</th>
                <th class="p-3">الحالة</th>
                <th class="p-3">إجراءات</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b">
                <td class="p-3">محمد حسن</td>
                <td class="p-3">شقة - صنعاء</td>
                <td class="p-3">نظافة يومية</td>
                <td class="p-3 text-yellow-600">قيد المراجعة</td>
                <td class="p-3 flex gap-2">
                    <button class="bg-green-500 text-white px-3 py-1 rounded-lg">✅ قبول</button>
                    <button class="bg-red-500 text-white px-3 py-1 rounded-lg">❌ رفض</button>
                </td>
            </tr>
        </tbody>
    </table>

</div>
{{-- </x-company-layout> --}}
