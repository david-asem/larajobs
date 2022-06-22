@if(session()->has('message'))
    <div x-data="{show:true}" x-init="setTimeout(()=>show=false, 3000)
     " x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-green-700 text-white text-center px-48 rounded py-3">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
