<x-layout>
    <section class="flex flex-col gap-4 md:flex-row" >
{{-- profile --}}
<div class="bg-white p-8 rounded-lg shadow-md w-full">
    <h3 class="text-3xl text-center font-bold mb-4">Profile Info</h3>

    @if ($user->avatar)
    <div class="mt-2 flex justify-center">
        <img src="{{asset('storage/'.$user->avatar)}}" class="w-32 h-32 object-cover rounded-full" alt="{{$user->name}}">
    </div>
    @endif


    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <x-inputs.text
        name="name"
        label="Name"
        value="{{$user->name}}"
        />
        <x-inputs.text
        name="email"
        type="email"
        label="email"
         value="{{$user->email}}"
        />

        <x-inputs.file
        name="avatar"
        label="Upload Avatar"
        />

        <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 border rounded cursor-pointer hover:bg-green-600 focus:outline-none">save</button>

    </form>
    
</div>


    <div class="bg-white p-8 rounded-lg shadow-md w-full">
        <h3 class="text-3xl text-center font-bold mb-4">My Job Listings</h3>

        @forelse ($jobs as $job)
        <div class="flex justify-between items-center border b-2 border-gray-200 py-2">
            <div>
                <h3 class="text-xl font-semibold">{{$job->title}}</h3>
                <p class="text-gray-700">{{$job->job_type}}</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{route('jobs.edit',$job->id)}}" class="bg-blue-500 text-white px-4 py-2 rounded text-sm">edit</a>

                <form
                onsubmit="return confirm('Are you sure that you want to delete this job?')"
                action="{{route('jobs.destroy',$job->id)}}?from=dashboard"
                 method="POST">
                    @csrf
                    @method("DELETE")
                    <button
                        type="submit"
                        class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded text-sm"
                    >
                        Delete
                    </button>
                </form>
            </div>

        </div>
            
        @empty
            <p class="text-gray-700">You have not job listings</p>
            
        @endforelse

    </div>
</section>


<x-bottom-banner/>
</x-layout>