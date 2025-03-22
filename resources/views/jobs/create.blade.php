{{-- @extends("layout")

@section("title")
Create Job
@endsection

@section("content")
    <h1><?=$title ?></h1>


    <form action="/jobs" method="POST" >
        @csrf

        <input type="text" name="title" placeholder="enter title...">
        <input type="text" name="description" placeholder="enter description...">
        <input type="text" name="name" placeholder="enter name...">
   
        <button type="submit">Submit</button>
    </form>

@endsection --}}

<x-layout>
    <h1><?=$title ?></h1>


    <form action="/jobs" method="POST" >
        @csrf

        <input type="text" name="title" value="{{old('title')}}" placeholder="enter title...">
        @error("title")
        <div class="text-red-500 mt-2 text-sm">
            {{$message}}
        </div>
        @enderror

        <input type="text"
        {{old('description')}}
        name="description" placeholder="enter description...">
        @error("description")
        <div class="text-red-500 mt-2 text-sm">
            {{$message}}
        </div>
        @enderror
   
        <button type="submit">Submit</button>
    </form>



</x-layout>