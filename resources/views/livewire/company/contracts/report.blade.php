<!-- resources/views/company/contacts/index.blade.php -->
<div>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">👥 عملاء الشركة</h1>

        <div class="mb-4 flex justify-between items-center">
            <form action="" method="GET" class="flex space-x-2">
                <input type="text" name="search" placeholder="ابحث عن عميل"
                       class="border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500">
                <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700">بحث</button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow rounded-2xl">
                <thead class="bg-gray-100 text-gray-600 text-sm">
                    <tr>
                        <th class="p-3 text-right">الاسم</th>
                        <th class="p-3 text-right">الهاتف</th>
                        <th class="p-3 text-right">عدد الطلبات</th>
                        <th class="p-3 text-right">آخر طلب</th>
                        <th class="p-3 text-right">الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr class="border-t">
                            <td class="p-3">{{ $client->name }}</td>
                            <td class="p-3">{{ $client->phone }}</td>
                            <td class="p-3">{{ $client->orders_count }}</td>
                            <td class="p-3">{{ $client->last_order_date }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 rounded-lg text-xs font-medium
                                    {{ $client->active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $client->active ? 'نشط' : 'غير نشط' }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
