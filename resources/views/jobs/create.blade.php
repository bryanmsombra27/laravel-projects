@extends("layout")

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

@endsection