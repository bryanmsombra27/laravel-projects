@props([
    "name" => "",
    "label" => null
])


<div class="mb-4">
    @if ($label)
    <label class="block text-gray-700" for="{{$name}}"
    >{{$label}}</label
>
    @endif

       
            <input
                id="{{$name}}"
                type="file"
                name="{{$name}}"
                class="w-full px-4 py-2 border rounded focus:outline-none {{ $errors->has($name) ? 'border-red-500' : '' }}"
            />
            @error($name)
                
            <p class="text-red-500  text-sm mt-1">{{$message}}</p>
        @enderror
        </div>