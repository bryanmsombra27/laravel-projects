{{-- @extends("layout")

@section("content")
<h1>Home page</h1>


@endsection --}}

<x-layout>
    <h1 class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">Welcome to Workopia!</h1>

    <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-3">
        @forelse ($jobs as $job )
        <x-job-card  :job="$job" />

        @empty
            <p>No jobs available</p
@endforelse
    </div>
    <a href="{{route('jobs.index')}}" class="block text-xl text-center">
        <i class="fa fa-arrow-alt-circle-right"></i> 
        Show All Jobs

    </a>


    <x-bottom-banner />
</x-layout>