@props(['listing'])


<div class="flex">
    <img
        class="hidden w-48 mr-6 md:block"
        src="{{asset('images/no-image.png')}}"
        alt=""
    />
    <div>
        <h3 class="text-2xl">
            <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
        </h3>
        <div class="text-xl font-bold mb-4">{{$listing->company_name}}</div>
        <x-listing-tags :tagsCsv="$listing->tags" />

        <div class="text-sm font-bold mb-4">{{$listing->job_id}}</div>
        <div class="text-sm font-bold mb-4">{{$listing->name_of_team}}</div>

        <div class="text-lg mt-4">
            <i class="fa-solid fa-location-dot"></i>{{$listing->location}}
        </div>
    </div>
</div>
