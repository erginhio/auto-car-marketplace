<x-app-layout title="My Favourites Cars">
    <div class="bg-slate-100 px-4 xl:px-12 py-4 flex flex-grow justify-center ">
        <div class="max-w-screen-2xl flex w-full">
            <section class="space-y-2 w-full justify-center flex flex-col ">
                <div class="flex justify-between ">
                    <h1 class="text-3xl font-bold py-4 md:py-6 flex-none">My Favourites Cars</h1>
                    @if($cars->total()>0)
                        <p class="content-center text-gray-600">Showing {{ $cars->firstItem() }} to {{ $cars->lastItem() }}
                            of {{ $cars->total() }} results
                        </p>
                    @endif
                </div>
                @if ($cars->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                        @foreach ($cars as $car)
                            <x-car-card :$car :favorite='true' />
                        @endforeach
                    </div>
                @else
                    <div class="bg-white rounded-lg flex w-full justify-center flex-col items-center flex-1">
                        <p class="text-center text-lg ">No car found in your watchlist. 
                            <a href="{{route('home')}}" class="text-blue-500">View cars</a>
                        </p>
                    </div>
                @endif
                {{-- pagination --}}
                {{ $cars->onEachSide(1)->links('pagination') }}
            </section>
        </div>
    </div>
</x-app-layout>
