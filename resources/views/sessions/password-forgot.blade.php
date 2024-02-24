<x-layout>
    <form method="POST" action="{{route('password.email')}}" class="mt-10">
        @csrf

        <x-form.input id="email" type="email" name="email" required autofocus></x-form.input>
        <x-form.button>Send password reset link</x-form.button>
        
    </form>
</x-layout>