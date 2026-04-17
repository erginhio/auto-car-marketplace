@props(['primaryImage' => '', 'images' => [], 'imageTitle' => ''])
<div class="flex flex-col md:flex-row gap-2  md:max-h-[500px] lg:max-h-[600px] h-full w-full ">
    {{-- primary image --}}
    <div class="rounded-lg  w-full hover:shadow-xl hover:scale-105 duration-500">
        <img id="primaryImage" class="w-full h-full object-fit rounded-lg" src="{{ asset('/storage/'.$primaryImage) }}" alt="{{ $imageTitle }}">
    </div>
    {{-- images --}}
    <div class="flex flex-row md:flex-col gap-1 w-full md:max-w-[200px] overflow-y-auto ">
        @foreach ($images as $image)
        <div id="images"  class=" rounded-lg  w-full cursor-pointer  md:w-44 shadow-sm">
            <img class="h-32 min-w-32 object-fit w-full rounded-lg  hover:scale-90 overflow-hidden  duration-500 ease-in-out"
                src="{{ asset('/storage/'.$image->image_path) }}" alt="{{ $imageTitle }}">
        </div>
        @endforeach
    </div>
</div>
<script>
    const primaryImage = document.getElementById('primaryImage');
    const images = document.querySelectorAll('#images img');

    for(i=0;i<images.length;i++){
        images[i].addEventListener('click', (e) => {
            primaryImage.src = e.target.src;
        })
    }
    
    
</script>
