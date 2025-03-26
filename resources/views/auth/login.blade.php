<x-layout>
    <div class="bg-white md:max-w-xl rounded-lg shadow-md w-full mx-auto mt-12 p-8 py-12">
        <h2 class="text-4xl text-center font-bold mb-4">Login</h2>

        <form action="{{route('login.authenticate')}}" method="POST">
            @csrf
          

            <x-inputs.text
                name="email"
                type="email"
                placeholder="email..."
            />
            <x-inputs.text
                name="password"
                type="password"
                placeholder="password..."
            />
       

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none cursor-pointer">Login</button>

            <p class="mt-4 text-gray-500 ">Don't have an account yet?
                <a class="text-blue-900" href="{{route('register')}}">Register</a>

            </p>
        </form>

    </div>




</x-layout>