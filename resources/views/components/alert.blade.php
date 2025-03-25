@props([
    "type","message", "timeout"=> "3000"
])

@if (session() -> has($type))
<div class="p-4 text-sm text-white rounded {{$type == "success" ? 'bg-green-500':'bg-red-500'  }} "
x-data="{show:true}" x-init="setTimeOut(()=> show = false,{{$timeout}})"
x-show="show"
>
    {{$message}}
</div>
    
@endif
