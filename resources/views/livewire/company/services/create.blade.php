<!-- resources/views/company/services/create.blade.php -->
    <div class="max-w-2xl mx-auto p-6 bg-white shadow rounded-2xl">

        @if (session()->has('message'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
        @endif
        <form wire:submit.prevent="save">
            <div class="mb-4">
                <label class="block mb-2 font-medium">اسم الخدمة</label>
                <input type="text" wire:model="title" class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500">
                @error('title') <span class="text-red-600">{{ $message }}</span> @enderror

            </div>
            <div class="mb-4">
                <label class="block mb-2 font-medium">الوصف</label>
                <textarea wire:model="description" rows="3" class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500"></textarea>
                @error('description') <span class="text-red-600">{{ $message }}</span> @enderror

            </div>

            <div>
                <label class="block font-medium">المدة</label>
                <select wire:model="frequency" class="w-full border rounded p-2">
                    <option value="weekly">اسبوعي</option>
                    <option value="monthly">شهريا</option>
                    <option value="yearly">سنوي</option>
                    <option value="on-time">واقت المطلوب</option>
                </select>
                @error('frequency') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-2 font-medium">السعر</label>
                <input type="number" wire:model="price"
                       class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500">
                       @error('price') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>


            <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700">
                حفظ الخدمة
            </button>
        </form>
    </div>

{{-- <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow">
    <h1 class="text-2xl font-bold mb-6">خدمات الشركة</h1>

    @if(session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <div class="space-y-6">
        @foreach($services as $index => $service)
            <div class="border p-4 rounded-lg shadow relative">
                <button type="button" wire:click="removeService({{ $index }})" class="absolute top-2 right-2 text-red-600">✖</button>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium">عنوان الخدمة</label>
                        <input type="text" wire:model="services.{{ $index }}.title" class="w-full border rounded p-2">
                    </div>
                    <div>
                        <label class="block font-medium">السعر</label>
                        <input type="number" wire:model="services.{{ $index }}.price" class="w-full border rounded p-2">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-medium">الوصف</label>
                        <textarea wire:model="services.{{ $index }}.description" class="w-full border rounded p-2"></textarea>
                    </div>
                    <div>
                        <label class="block font-medium">تكرار الخدمة</label>
                        <select wire:model="services.{{ $index }}.frequency" class="w-full border rounded p-2">
                            <option value="daily">يومي</option>
                            <option value="weekly">أسبوعي</option>
                            <option value="monthly">شهري</option>
                        </select>
                    </div>
                </div>
            </div>
        @endforeach

        <button type="button" wire:click="addService" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
            + إضافة خدمة جديدة
        </button>

        <button type="button" wire:click="save" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            حفظ الخدمات
        </button>
    </div>
</div> --}}
