@props([
    "label" => null,
    "name" => "",
    "placeholder"=> "",
    "rows" => "7",
    "cols" => "30",
    "value"=> "",

])

<div class="mb-4">
    @if ($label)
    <label class="block text-gray-700" for="$name"
    >{{$label}}</label
>
        
    @endif
   
    <textarea
        cols="{{$cols}}"
        rows="{{$rows}}"
        id="{{$name}}"
        {{-- value="{{$value}}" --}}
        name="{{$name}}"
        class="w-full px-4 py-2 border rounded focus:outline-none {{ $errors->has($name) ? 'border-red-500' : '' }}"
    >{{old($name,$value)}}
</textarea>

@error($name)
        
<p class="text-red-500  text-sm mt-1">{{$message}}</p>
@enderror
</div>