<!-- resources/views/owner/contacts/index.blade.php -->
<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">📇 جهات الاتصال</h1>

        <div class="mb-4 flex justify-between items-center">
            <form action="" method="GET" class="flex space-x-2">
                <input type="text" name="search" placeholder="ابحث بالاسم أو البريد"
                       class="border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500">
                <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700">بحث</button>
            </form>
            <a href="{{ route('owner.contacts.create') }}"
               class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700">➕ إضافة جهة اتصال</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow rounded-2xl">
                <thead class="bg-gray-100 text-gray-600 text-sm">
                    <tr>
                        <th class="p-3 text-right">الاسم</th>
                        <th class="p-3 text-right">البريد</th>
                        <th class="p-3 text-right">الهاتف</th>
                        <th class="p-3 text-right">النوع</th>
                        <th class="p-3 text-right">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr class="border-t">
                            <td class="p-3">{{ $contact->name }}</td>
                            <td class="p-3">{{ $contact->email }}</td>
                            <td class="p-3">{{ $contact->phone }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 rounded-lg text-xs font-medium
                                    {{ $contact->type == 'شركة' ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700' }}">
                                    {{ $contact->type }}
                                </span>
                            </td>
                            <td class="p-3 flex space-x-2">
                                <a href="{{ route('owner.contacts.show', $contact->id) }}"
                                   class="text-indigo-600 hover:underline">عرض</a>
                                <a href="{{ route('owner.contacts.edit', $contact->id) }}"
                                   class="text-yellow-600 hover:underline">تعديل</a>
                                <form action="{{ route('owner.contacts.destroy', $contact->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
