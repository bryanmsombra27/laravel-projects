@props([
    "label" => null,
    "name" => "",
    "type" => "text",
    "value" => "",
    "placeholder"=> ""
])

<div class="mb-4">
    @if ($label)
    <label class="block text-gray-700" for="{{$name}}"
    >{{$label}}</label
>   
    @endif
 
    <input
        value="{{old($name,$value)}}"
        id="{{$name}}"
        placeholder="{{$placeholder}}"
        type="{{$type}}"
        name="{{$name}}"
        class="w-full px-4 py-2 border rounded focus:outline-none {{ $errors->has($name) ? 'border-red-500' : '' }} "
        placeholder="Software Engineer"
    />
    @error($name)
        
        <p class="text-red-500  text-sm mt-1">{{$message}}</p>
    @enderror
</div>