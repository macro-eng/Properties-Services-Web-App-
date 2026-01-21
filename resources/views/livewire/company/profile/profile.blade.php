
<div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow">
    <h1 class="text-2xl font-bold mb-6">بيانات الشركة والمستخدم</h1>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save" class="space-y-6">
        <!-- User Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium">اسم المستخدم</label>
                <input type="text" wire:model="user_name" class="w-full border rounded p-2">
                @error('user_name') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block font-medium">البريد الإلكتروني</label>
                <input type="email" wire:model="user_email" class="w-full border rounded p-2">
                @error('user_email') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block font-medium">كلمة المرور</label>
                <input type="password" wire:model="user_password" class="w-full border rounded p-2">
                <small class="text-gray-500">اتركه فارغاً إذا لم ترغب بتغيير كلمة المرور</small>
                @error('user_password') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block font-medium">الدور</label>
                <select wire:model="user_role" class="w-full border rounded p-2">
                    <option value="tanant">مستأجر</option>
                    <option value="owner">مالك</option>
                    <option value="admin">مدير</option>
                    <option value="visitor">زائر</option>
                    <option value="company">شركة</option>
                </select>
                @error('user_role') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block font-medium">صورة الملف الشخصي</label>
                <input type="file" wire:model="profile_photo" class="w-full border rounded p-2">
                @if($profile_photo)
                    <img src="{{ $profile_photo instanceof \Livewire\TemporaryUploadedFile ? $profile_photo->temporaryUrl() : asset('storage/'.$profile_photo) }}" class="mt-2 w-32 h-32 object-cover rounded-full">
                @endif
                @error('profile_photo') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Company Info -->
        <div>
            <label class="block font-medium">اسم الشركة</label>
            <input type="text" wire:model="company_name" class="w-full border rounded p-2">
            @error('company_name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        {{-- <div>
            <label class="block font-medium">الحالة</label>
            <select wire:model="company_status" class="w-full border rounded p-2">
                <option value="accepted">مقبول</option>
                <option value="rejected">مرفوض</option>
                <option value="pending">قيد المراجعة</option>
            </select>
            @error('company_status') <span class="text-red-600">{{ $message }}</span> @enderror
        </div> --}}

        <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            حفظ البيانات
        </button>
    </form>
</div>

