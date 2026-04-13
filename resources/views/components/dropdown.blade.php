@props(['dropdownContent' => '', 'id' => 'dropdown', 'default' => true])

<div class="relative cursor-pointer" id="{{ $id }}-container">
    @if ($default)
        <button onclick="toggleDropdown('{{ $id }}')" class="flex gap-2 items-center">
            {{ $slot }}
        </button>
    @else
        <span onclick="toggleDropdown('{{ $id }}')">
            {{ $slot }}
        </span>
    @endif
    <div id="{{ $id }}" class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg hidden">
        {{ $dropdownContent }}
    </div>
</div>
<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        dropdown.classList.toggle('hidden');
        document.addEventListener('click', function(event) {
        if (!event.target.closest(`#${id}-container`)) {
                dropdown.classList.add('hidden');
            }
        });
    }
</script>

