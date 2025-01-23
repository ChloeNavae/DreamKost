<x-layout>
    <h3>Home</h3>
    {{ Auth::check()==false ? 'Guess' : Auth::user()->name }}
    
</x-layout>