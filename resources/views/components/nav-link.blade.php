@props(["active" => false, "url" => "/", "icon"=> null , "mobile" => null])

@if($mobile)
<a href="{{url("$url") }}" class="block px-4 py-2 hover:bg-blue-700 {{$active ? "text-yellow-500 font-bold":""  }}"
>
@if ($icon)
<i class="fa fa-{{$icon}}  mr-1"></i>
@endif
{{$slot}}

</a
>
@else
<a  {{$attributes}}
 href="{{url("$url") }}"
  class="text-white hover:underline py-2 {{$active ? "text-yellow-500 font-bold":""  }}
  ">
    @if ($icon)
    <i class="fa fa-{{$icon}}  mr-1"></i>
    @endif
  {{$slot}}
</a>

@endif