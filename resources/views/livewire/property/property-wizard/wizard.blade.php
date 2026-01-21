<div class="p-6 max-w-6xl mx-auto mb-6 border  p-6 mt-4 bg-white shadow lg:max-w-2xl rounded-xl space-y-6">
    <div class="flex justify-between  items-center   border px-2 rounded-full">
        <a 
        class="{{ $step === 1 ? '
        font-bold  bg-gray-500 rounded-full   p-4
        ': ''}}"
        >معلومات العقار  
            
        </a>
        <button class="{{ $step === 2 ? 'font-bold bg-gray-500 rounded-full p-4 ': ' '}}">تفاصيل العقار</button>
        <button class="{{ $step === 3 ? 'font-bold bg-gray-500 rounded-full p-4 ': ' '}}">صور ل العقار</button>

    </div>
    @if($step === 1)n

    <h2 class="font-bold text-2xl mb-4"> العقار</h2>
    <div class="space-y-4">
        <div class="flex justify-between space-x-20 ">
                <div class="w-full ml-4">
                   <label class="block font-bold">عنون العقار</label>
                    <input placeholder="اسم العقار" type="text" wire:model="name" class="input rounded w-full input-bordered " />
                </div>

                <div class="w-full ml-4">
                    <label class="block font-bold">المحافظة</label>
                    <select id=""  class="select select-bordered rounded w-full" wire:model.lazy="city" >
                            @foreach($cities as $city)
                                 <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                    </select>    
                </div>
        </div>  
        
      <div class="flex justify-between ">
                <div class="w-full ml-4">
                    <label class="block font-bold">المنطقة</label>
                    <select id=""  class="select select-bordered rounded w-full" wire:model.lazy="district" >
                               @foreach($districts as $d)
                                   <option value="{{$d->id}}">{{$d->name}}</option>
                                @endforeach
                    </select>    
                </div>
                
                <div class="w-full ml-4">
                    <label class="block font-bold">الشارع</label>
                    <select id=""  class="select select-bordered rounded w-full" wire:model.lazy="street" >
                              @foreach($streets as $d)
                                <option value="{{$d->id}}">{{$d->title}}</option>
                                @endforeach
                    </select>    
                </div>
        </div>   
        <div class="flex justify-between ">
                <div class="w-full ml-4">
                    <label class="block font-bold">المنطقة</label>
                    <select id=""  class="select select-bordered rounded w-full" wire:model.lazy="district" >
                               @foreach($districts as $d)
                                   <option value="{{$d->id}}">{{$d->name}}</option>
                                @endforeach
                    </select>    
                </div>
                
                <div class="w-full ml-4">
                    <label class="block font-bold">النوع</label>
                    <select id=""  class="select select-bordered rounded w-full" wire:model.lazy="type" >
                            <option value="room">غرفة</option>
                            <option value="apartments">شقة</option>
                            <option value="villa">فيلا</option>
                            <option value="villa">مبنئ</option>
                    </select>    
                </div>
        </div>     
        <div class="flex justify-between ">
                <div class="w-full ml-4">
                    <label class="block font-bold">الغرض</label>
                    <select id=""  class="select select-bordered rounded w-full" wire:model="purpose" >
                            <option value="renting">تاجير</option>
                            <option value="selling">بيع</option>
                    </select>    
                </div>
                
                <div class="w-full ml-4">
                    <label class="block font-bold">الحالة العقار</label>
                    <select id=""  class="select select-bordered rounded w-full" wire:model="status" >
                            <option value="available">متاح</option>
                            <option value="booked">محجوز</option>
                            <option value="pendding">قيد المعالجة</option>
                    </select>    
                </div>
        </div>  
        <div class="flex justify-between ">
                <div class="w-full ml-4">
                    <label class="block font-bold">السعر</label>
                   
                    <input  type="text" wire:model="price" class="mx-2 input rounded w-full input-bordered " />
                </div>
                
                <div class="w-full ml-4">
                    <div class="flex flex-row mt-4">
                        <input type="radio" wire:model="negotiable" class="input input-bordered input-radio rounded" />
                         <label class="block font-bold ml-4">السعر قابل لتفاوض</label>

                     </div>
                </div>
        </div>
        <div class="flex justify-between ">
                <div class="w-full ml-4">
                    <label class="block font-bold">المساحة</label>
                   
                    <input  type="text" wire:model="area_2m" class="mx-2 input rounded w-full input-bordered " />
                </div>
                
                <div class="w-full ml-4">
                           <label class="block font-bold">الصورة الرئسية</label>
                            @if($primary_path)
                                   Photo Preview :
                                   <div class="flex flex-row justify-start ">
                                            <img src="{{ $primary_path->temporaryUrl() }}" width="150">
                                    </div>
                            @endif
                            <input type="file" wire:model="primary_path" class="mx-2 input rounded w-full input-bordered "/>                         
               </div>
        </div>
    </div>  
    <div>
          <div class="bg-white shadow ">
            <h2 class="text-lg font-semibold mt-6 text-center pt-2 mb-2 text-gray-700" >
                <i class="fas fa-map-marked-alt"></i>
                حدد الموقع  عقارك على الخريطة
            </h2>

            <x-map-picker :lat="12.3224" :lng="15.1410" :editable="true" />
        </div>
        <div class="flex justify-between ">
            <div class="w-full ml-4">
                <label class="block font-bold">الصورة الرئسية</label>
                @if($primary_path)
                Photo Preview :
                <div class="flex flex-row justify-start ">
                    <img src="{{ $primary_path->temporaryUrl() }}" width="150">
                </div>
                @endif
                <input type="file" wire:model="primary_path" class="mx-2 input rounded w-full input-bordered "/>                         
            </div>
            <div class="w-full ml-4">
                <label class="block font-bold">الوصف</label>
                <textarea wire:model="description" class="mx-2 input rounded w-full input-bordere" cols="20" rows="6"></textarea>
            </div>
    </div>
    </div>
    @endif
    @if($step === 2 )
          
        @if($a)
            <div class="space-y-4 border rounded-lg px-4 mb-2 py-4">
                <h2 class="font-bold text-2xl mb-4">تفاصيل الشقة</h2>
                    <div class="flex justify-between ">
                        <div class="w-full ml-4">
                            <label class="block font-bold">رقم الغرفة</label>
                            <input type="text" wire:model="room_no" class="input input-bordered rounded w-full">
                        </div>
                        <div class="w-full ml-4">
                            <label class="block font-bold">عداد الغرف</label>
                            <input type="text" wire:model="bedrooms" class="input input-bordered rounded w-full">
                        </div>
                            <div class="w-full ml-4">
                            <label class="block font-bold">رقم الدور</label>
                            <input type="text" wire:model="floor" class="input input-bordered rounded w-full">
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="w-full ml-4">
                            <label class="block font-bold">الحمامات</label>
                            <select id=""  class="select select-bordered rounded w-full" wire:model="bathrooms" >
                                    <option value="one">واحد</option>
                                    <option value="two">اثنين</option>
                                    
                            </select>    
                        </div>
                        <div class="w-full ml-4">
                            <label class="block font-bold">المجلس</label>
                            <select id=""  class="select select-bordered rounded w-full" wire:model="living_room" >
                                    <option value="no_bath">مجلس منعزال</option>
                                    <option value="sperated_path">مجلس مع حمام منعزال</option>
                                    <option value="no_existing">لا يوجد مجلس</option>

                            </select>    
                        </div>
                </div>      
                <div class="flex justify-between">
                        <div class="w-full ml-4">
                            <label class="block font-bold">الصالة</label>
                            <select id=""  class="select select-bordered rounded w-full" wire:model="hall" >
                                    <option value="wide">واسعة</option>
                                    <option value="small">صغيرة</option>
                                    <option value="middle">متوسطة</option>
                                    <option value="no-exists">لايوجد</option>
                            </select>    
                        </div>
                    </div>
                    <div class="flex justify-between">
                            <div class="w-full ml-4">
                                    <div class="flex flex-row mt-4">
                                        <input type="radio" wire:model="kitchen" class="input input-bordered input-radio rounded" />
                                        <label class="block font-bold ml-4">يوجد مطبخ</label>
                
                                    </div>
                            </div>
                        <div class="w-full ml-4">
                            <div class="flex flex-row mt-4">
                                <input type="radio" wire:model="balcony" class="input input-bordered mt-1 input-radio rounded" />
                                <label class="block font-bold ml-4">يوجد بلكونة</label>
                            </div>
                        </div>
                </div> 
            </div>
        @endif
        @if($v)
            <div class="space-y-4 border rounded-lg px-4 mb-2 py-4">
                <h2 class="font-bold text-2xl mb-4">تفاصيل فيلا</h2>
                        <div class="border px-4 rounded-lg py-4 mt-2">
                                <div class="flex justify-between ">
                                    <div class="w-full ml-4">
                                        <label class="block font-bold">عدد الطوابق</label>
                                        <input type="text" wire:model="floors" class="input input-bordered rounded w-full">
                                    </div>
                                    <div class="w-full ml-4">
                                        <label class="block font-bold">عدد المدخل</label>
                                        <select id=""  class="select select-bordered rounded w-full" wire:model="entrance" >
                                            <option value="one">واحد</option>
                                            <option value="two">اثنين</option>
                                            
                                        </select>    
                                    </div>
                                </div> 
                                <div class="flex justify-between">
                                    <div class="w-full ml-4">
                                            <div class="flex flex-row mt-4">
                                                <input type="radio" wire:model="has_gardan" class="input input-bordered input-radio rounded" />
                                                <label class="block font-bold ml-4">محواش</label>
                                                
                                            </div>
                                    </div>
                                    <div class="w-full ml-4">
                                            <div class="flex flex-row mt-4">
                                                <input type="radio" wire:model="has_grash" class="input input-bordered mt-1 input-radio rounded" />
                                                <label class="block font-bold ml-4">يوجد جراش</label>
                                            </div>
                                    </div>    
                                    <div class="w-full ml-4">
                                        <div class="flex flex-row mt-4">
                                            <input type="radio" wire:model="has_pool" class="input input-bordered mt-1 input-radio rounded" />
                                            <label class="block font-bold ml-4">يوجد مسبح</label>
                                        </div>
                                    </div>
                            </div>
                    </div>
                    <p> تفاصيل كل طابق</p>
                    <div class="px-4 border rounded-lg py-4 mt-2">
                     
                        <div class="flex justify-between">
                                <div class="w-full ml-4">
                                        <label class="block font-bold">عدد اشقق</label>
                                        <input type="text" wire:model="floors" class="input input-bordered rounded w-full">
                                </div>
                                  <div class="w-full ml-4">
                                        <label class="block font-bold">عدد الغرف</label>
                                        <input type="text" wire:model="rooms" class="input input-bordered rounded w-full">
                                </div>
                                  <div class="w-full ml-4">
                                        <label class="block font-bold">عدد دورات المياه</label>
                                        <input type="text" wire:model="bathrooms" class="input input-bordered rounded w-full">
                                </div>
                            <div class="w-full ml-4">
                                <label class="block font-bold">المجلس</label>
                                <select id=""  class="select select-bordered rounded w-full" wire:model="living_room" >
                                    <option value="no_bath">مجلس منعزال</option>
                                    <option value="sperated_path">مجلس مع حمام منعزال</option>
                                    <option value="no_existing">لا يوجد مجلس</option>
                                    
                                </select>    
                            </div>
                        </div>      
                        <div class="flex justify-between">
                            <div class="w-full ml-4">
                                <label class="block font-bold">الصالة</label>
                                <select id=""  class="select select-bordered rounded w-full" wire:model="hall" >
                                    <option value="wide">واسعة</option>
                                    <option value="small">صغيرة</option>
                                    <option value="middle">متوسطة</option>
                                </select>    
                            </div>
                        </div>
                      
                    </div> 
                </div>
            </div>
                @endif
    @endif
    @if($step === 3)
            <div class="col-span-6 sm:col-span">
                            <h2 for="" class="text-2xl mb-4 mt-2  font-bold">قم بداخل صور تفصيلية عن العقار </h2>
                            @if($photos)
                                   Photo Preview :
                                   <div class="flex flex-row justify-start ">
                                       @foreach($photos as $photo)
                                            <img src="{{ $photo->temporaryUrl() }}" width="150">
                                        @endforeach
                                    </div>
                            @endif
                            <input type="file" wire:model="photos" multiple />
                            @error("photos.*")
                            <span>{{$message}}</span>
                            @enderror
            </div>
    @endif
    <div class="flex justify-between mt-6">
        <button 
        @if($step>1)
        @disabled(false)
        @else
        @disabled(true)
        @endif
            wire:click="previousStep"
            class="px-4 py-2 bg-gray-400 rounded">
                السابق
            </button>
        @if($step <3)
            <button 
            wire:click="nextStep"
            class="px-4 py-2 bg-gray-800 rounded text-white">
                التالي
            </button>
        @else 
           <button 
            {{-- wire:click="nextStep" --}}
            class="px-4 py-2 bg-green-400 rounded">
                حفظ
            </button>
        @endif
        
    </div>
</div>