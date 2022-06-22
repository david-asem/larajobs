<x-layout>

    @include('partials._hero')
    @include('partials._search')

<x-card class="p-10">

    <div
        class="lg:grid lg:grid-cols-2 gap-y-20 space-y-4 md:space-y-0 mx-4"
    >
        @if(count($listings) ===0)
            <p>No listings found!</p>
        @endif


        @foreach ($listings as $listing)
            <x-listing-card :listing="$listing"/>

        @endforeach

    </div>


    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>
    </x-card>

    </x-layout>

