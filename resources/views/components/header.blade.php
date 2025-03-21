{{-- con esta directiva puede colocarse cualquier codigo de php --}}
{{-- @php
    $isActive = request() -> is("jobs");
    echo $isActive ? "active":"";
    
@endphp --}}


<header class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="{{url('/') }}">Workopia</a>
        </h1>
        <nav class="hidden md:flex items-center space-x-4">
            {{-- <x-nav-link href="{{url('/jobs') }}" active="{{request()-> is('jobs')}}" > --}}
                {{-- CUANDO SE ANTEPONEN LOS : EN UNA PROPIEDAD DE HTML ESO INDICA A BLADE QUE SU CONTENIDO ES UNA EXPRESION QUE DEBE EVALUAR COMO CODIGO Y NO COMO STRING --}}
            <x-nav-link url="/"  :active="request()-> is('/')" >
                Home
            </x-nav-link>
            <x-nav-link url="/jobs"  :active="request()-> is('jobs')" >
                All jobs
            </x-nav-link>

            <x-nav-link url="/jobs/saved"  :active="request()-> is('jobs/saved')" >
                Saved Jobs
            </x-nav-link>
            <x-nav-link url="/login"  :active="request()-> is('login')" >
                Login
            </x-nav-link>
            <x-nav-link url="/register"  :active="request()-> is('register')" icon="user" >
                Login
            </x-nav-link>
         
            <x-nav-link url="/dashboard"  :active="request()-> is('dashboard')" icon="box" >
                Dashboard
            </x-nav-link>
           
            <x-button-link url="/jobs/create"  icon="edit">

                 Create Job

            </x-button-link>

        
        </nav>

        <button
            id="hamburger"
            class="text-white md:hidden flex items-center"
        >
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>
    <!-- Mobile Menu -->
    <nav
        id="mobile-menu"
        class="hidden md:hidden bg-blue-900 text-white mt-5 pb-4 space-y-2"
    >
    <x-nav-link url="/jobs" :mobile="true"  :active="request()-> is('jobs')" >
        All jobs
    </x-nav-link>

    <x-nav-link url="/jobs/saved" :mobile="true"  :active="request()-> is('jobs/saved')" >
        Saved Jobs
    </x-nav-link>
    <x-nav-link url="/login"  :mobile="true" :active="request()-> is('login')" >
        Login
    </x-nav-link>
    <x-nav-link url="/register"  :mobile="true" :active="request()-> is('register')" >
        Login
    </x-nav-link>
 
    <x-nav-link url="/dashboard" :mobile="true"  :active="request()-> is('dashboard')" >
        Dashboard
    </x-nav-link>

   
    
    <x-button-link url="/jobs/create"  icon="edit" :block="true">

        Create Job

   </x-button-link>
</nav>


</header>