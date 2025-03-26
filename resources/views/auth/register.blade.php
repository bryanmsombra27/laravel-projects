<x-layout>
    <div class="bg-white md:max-w-xl rounded-lg shadow-md w-full mx-auto mt-12 p-8 py-12">
        <h2 class="text-4xl text-center font-bold mb-4">Register</h2>

        <form action="{{route('register.store')}}" method="POST">
            @csrf
            <x-inputs.text
                name="name"
                placeholder="full name..."
            />

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
            <x-inputs.text
                name="password_confirmation"
                type="password"
                placeholder="confirm password..."
            />

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none cursor-pointer">Register</button>

            <p class="mt-4 text-gray-500 ">Already have an account?
                <a class="text-blue-900" href="{{route('login')}}">Login</a>

            </p>
        </form>

    </div>




</x-layout>