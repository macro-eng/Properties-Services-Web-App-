<x-company-layout>
<div>

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">خدماتي</h2>
        <a href="/company/services/" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-orange-500">
            ➕ إضافة خدمة
        </a>
    </div>
    
    <div class="grid md:grid-cols-2 gap-6">
        @foreach($coms as $c)
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="font-bold text-gray-700">{{$c->title }}</h3>
            <p class="text-gray-500 mt-2">{{$c->discripiton}}</p>
            <p class="text-orange-600 font-bold mt-2">${{$c->price}}</p>
                    {{ ($c->frequency === "yearly" ? ("سنوية" ):  ($c->frequency === "monthly" ? ("شهريا") :  ($c->frequency === "weekly" ? "اسبوعية" :"في واقت المطلوب")))}}
        </div>
        @endforeach
    </div>

</dev>
</x-company-layout>