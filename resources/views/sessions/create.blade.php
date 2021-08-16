<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log In!</h1>

                <form method="POST" action="{{route('loginpost')}}" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" required value="joe@doe.com" />
                    <x-form.input name="password" type="password" autocomplete="current-password" required value="password" />

                    <x-form.button>Log In</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>

