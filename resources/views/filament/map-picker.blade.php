
@props([
      'lat'=>null,
      'lng'=>null,
      'editable'=>true,
      'height'=>'300px',
      'latFieldId'=>'latInput',
      'lngFieldId'=>'lngInput',
])


{{-- <div class="relative"> --}}
    <label for="" class=" block mb-2 text-sm text-gray-600">حدد الموقع على الخريطة</label>
        <div 
        class="rounded-lx shadow mb-4 overflow-hidden" 
        id="map" 
        style="z-index: 10;height: 400px;"
        >
        {{ $lat }}
      </div>
      @if($editable) 
          <input
           type="hidden" 
           id="{{ $latFieldId }}"
           name="latitude"
           value="{{ old('latitude', $lat)}}"
          >
         <input
          type="hidden" id="{{ $lngFieldId }}" 
          name="longitude"
          value="{{ old('longitude', $lng)}}"
          >
      @endif
  

{{-- </div> --}}

@push("styles")
      <link rel="stylesheet" href="{{asset('vendor/leaflet/leaflet.css')}}">
@endpush

@push("scripts")

<script src="{{asset('vendor/leaflet/leaflet.js')}}"></script>


<script>
    const customIcon= L.icon({
        iconUrl:'/vendor/leaflet/images/marker-icon-2x.png',
        shadowUrl:'/vendor/leaflet/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor : [12, 41],
        shadowSize : [41, 41]
    });
    document.addEventListener("DOMContentLoaded", function(){
        console.log($lat);
        const map = L.map('map').setView([
            {{ $lat ??  15.3694 }},{{ $lng ?? 44.1910 }}
        ],14);
        let marker;
        
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{
            maxZoom:19,
            attribution: '@ حدد مواقع عقارك بدقة'
        }).addTo(map);
        
        
        
        if({{ $lat  && $lng ? 'true' : 'false' }}){
            alert('sssssssss');
            marker=L.marker([{{ $lat }},{{ $lng }}]).addTo(map);
            alert($lat);
        }
        map.on('click', function(e){
                    const lat = e.latlng.lat.toFixed(6);
                    const lng = e.latlng.lng.toFixed(6);
                    if(!marker){
                       marker = L.marker([lat, lng]).addTo(map);
                    }else{
                        marker = marker.setLatLng([lat, lng])
                    }
                    marker.openPopup();
                   document.getElementById('{{ $latFieldId }}').value =lat;
                   document.getElementById('{{ $lngFieldId }}').value =lng;


                    // if(latInput && lngInput){
                    //     latInput.value = lat;
                    //     lngInput.value = lng;
                    // }
                });
                
                
            
            })

</script>
@endpush