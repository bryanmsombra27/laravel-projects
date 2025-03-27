{{-- @extends("layout") --}}

{{-- @section("content") --}}

    {{-- FORMA DE IMPRIMIR VARIABLES CON BLADE --}}
    {{-- <h1>{{$title}}</h1> --}}
    
{{-- FORMA 1 DE USAR CICLOS PARA IMPRIMIR INFORMACION DE FORMA CONDICIONAL --}}
    {{-- @if(!empty($jobs)) --}}
    {{-- <ul> --}}
        {{-- DIRECTIVA FOR EACH --}}
        {{-- @foreach ($jobs as $job) --}}
                {{-- <li> --}}
                    {{-- {{$job}} --}}
                {{-- </li> --}}

        {{-- @endforeach --}}
    {{-- </ul> --}}

    {{-- @else  --}}
        {{-- <p>No jobs available</p> --}}
    
    {{-- @endif --}}

    {{-- <ul> --}}
        {{-- @forelse ($jobs as $job ) --}}
            {{-- <li>{{$loop -> index}}  {{$job}}</li> --}}
            
        {{-- @empty --}}
            {{-- <p>No jobs available</p --}}
        {{-- @endforelse --}}
        
    {{-- </ul> --}}

{{-- @endsection --}}

{{-- 
FORMA DE IMPRIMIR VARIABLES CON PHP PURO 

<h1>< $title ?> </h1>

<ul>
< foreach($jobs as $job) :  ?>
    <li>< htmlspecialchars($job,ENT_QUOTES,'UTF-8') ;  ?></li>
    
< endforeach; ?>
</ul> --}}

<x-layout>

    <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-3">
        @forelse ($jobs as $job )
        <x-job-card  :job="$job" />

        @empty
            <p>No jobs available</p
@endforelse

    </div>

    {{-- pagination --}}
    {{$jobs->links()}}

</x-layout>