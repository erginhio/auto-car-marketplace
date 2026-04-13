@props(['carDescription'=>''])
<div class="bg-white rounded-lg p-4 space-y-4">
    <h1 class="text-xl md:text-2xl font-semibold mt-4">Detailed Description</h1>
    <p class="details overflow-hidden"></p>
    <button
        class="bg-main-500 hover:bg-main-700 flex items-center text-white font-bold py-2 px-4 rounded-full duration-500"
        id="show-more-details" onclick="toggleDetails()">
        See More Details 
    </button>
</div>
<script>
    let content = @json($carDescription);
    let toggleDesc = false;
    const details = document.querySelector('.details');
    details.innerHTML=content.substring(0,800);
    
    function toggleDetails() {
        const button = document.getElementById('show-more-details');
        toggleDesc =!toggleDesc;
        if (toggleDesc===true) {
            details.innerHTML = content;
            console.log('yes');
            button.innerHTML = 'See Less Details ';
        } else {
            details.innerHTML=content.substring(0,800);
            button.innerHTML = 'See More Details';
            console.log('no');
            
        }
    }
</script>