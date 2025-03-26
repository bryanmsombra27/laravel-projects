@props([

])

<form action="{{route('logout')}}" method="POST">
    @csrf
    <button type="submit" class="text-white cursor-pointer">
        <i class="fa fa-sign-out"></i>
        {{$slot}}</button>

</form>