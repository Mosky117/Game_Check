<x-layout>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <x-form.input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus></x-form.input>

        <x-form.input id="password" type="password" name="password" required></x-form.input>

        <x-form.input id="password_confirmation" type="password" name="password_confirmation" required></x-form.input>
        
        <x-form.button>Reset Password</x-form.button>
    </form>
</x-layout>