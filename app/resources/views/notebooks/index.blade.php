<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Notebooks
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <x-link-button href="{{ route('notebooks.create') }}">
                + New Notebook
            </x-link-button>
           {{-- @foreach($notes as $note) --}}
            @forelse($notebooks as $notebook)
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-2xl text-indigo-600"><a class="hover:underline" href="{{ route('notebooks.show', $notebook) }}">{{ $notebook->name }}</a></h2>
            </div>
            @empty
            <p>You have no notebooks yet</p>
            @endforelse
            {{  $notebooks->links()  }}

        </div>
    </div>
</x-app-layout>
