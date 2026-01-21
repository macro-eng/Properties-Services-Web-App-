<!-- resources/views/company/profile.blade.php -->
<x-company-layout>
    <div class="max-w-xl mx-auto p-6 bg-white shadow rounded-2xl">
        <div class="flex items-center space-x-4">
            <img src="{{ $com->user->profile_photo_url ?? '/images/default-company.png' }}"
                 class="w-20 h-20 rounded-full shadow">
            <div>
                <h2 class="text-xl font-bold">{{$com->name}}</h2>
                <p class="text-gray-500">{{$com->user->email}}</p>
            </div>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-4">معلومات الشركة</h3>
              <p><span class="font-medium">البريد:</span> {{$com->user->email}}</p>
              <p><span class="font-medium">فائة:</span> {{$com->user->role}}</p>
              <p><span class="font-medium">الحالة:</span> {{$com->status}}</p>
            {{-- <p><span class="font-medium">الهاتف:</span> 737283328</p>
            <p><span class="font-medium">العنوان:</span>Yemen,Sanna</p>
            <p><span class="font-medium">عدد الخدمات:</span> 20</p> --}}
            <p><span class="font-medium">عدد الخدمات:</span> {{$com->serviceList->count()}}</p>
             <div class="grid md:grid-cols-2 gap-6">
            @foreach($com->serviceList as $s)
            <div class="bg-white shadow rounded-xl p-6">
                <h3 class="font-bold text-gray-700"> {{ $s->title}} </h3>
                <p class="text-gray-500 mt-2">{{ $s->description }}</p>
                <p class="text-orange-600 font-bold mt-2">${{$s->price }}</p>
                <p class="text-orange-600 font-bold mt-2">
                    {{ ($s->frequency === "yearly" ? ("سنوية" ):  ($s->frequency === "monthly" ? ("شهريا") :  ($s->frequency === "weekly" ? "اسبوعية" :"في واقت المطلوب")))}}
                </p>
            </div>
            @endforeach
        </div>
        </div>
    </div>
</x-company-layout>
