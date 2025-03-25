@props([
    "label" => null,
    "name" => "",
    "options"  => [],
    "value" => ""

])


<div class="mb-4">
    @if ($label)
    <label class="block text-gray-700" for="{{$name}}"
    >{{$label}}</label
>
    @endif
    
    <select
    id="{{$name}}"
    name="{{$name}}"
    class="w-full px-4 py-2 border rounded focus:outline-none"
>
    @foreach ($options as $option => $optionLabel )
    <option value="{{$option}}"
        {{old($name,$value) == $option ? "selected":"" }}
        >{{$optionLabel  }}</option>        
    @endforeach

</select>
    

    @error($name)
        
    <p class="text-red-500  text-sm mt-1">{{$message}}</p>
@enderror
</div>