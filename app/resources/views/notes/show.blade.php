<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{  $note->trashed() ? 'Trash' : 'Note'}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

           <x-alert-success>{{  session('success') }}</x-alert-success>

           <span class="px-2 py-1 border-indigo-400 bg-indigo-100 rounded font-semibold text-sm">{{ $note->notebook->name }}</span>

           @if($note->trashed())

           <div class="flex gap-6">
               <p class="opacity-70"><strong>Deleted:</strong> {{ $note->deleted_at->diffForHumans() }}</p>

               {{-- <x-link-button href="{{  route('notes.edit', $note) }}" class="ml-auto">Edit Note</x-link-button>
                <form action="{{  route('notes.destroy', $note) }}" method="post">
                    @method('delete')
                    @csrf
                    <x-primary-button class="bg-red-500 hover:bg-red-600 focus:bg-red-600" onclick="return confirm('Are you sure you want to move this note to trash?')">Move to Trash</x-primary-button>
                </form> --}}
                <form class="ml-auto" action="{{  route('trashed.update', $note) }}" method="post">
                    @method('put')
                    @csrf
                    <x-primary-button>Restore Note</x-primary-button>
                </form>
                <form action="{{  route('trashed.destroy', $note) }}" method="post">
                    @method('delete')
                    @csrf
                    <x-primary-button class="bg-red-500 hover:bg-red-600 focus:bg-red-600" onclick="return confirm('Are you sure you want to delete this note forever? This action cannot be undone.')">Delete Forever</x-primary-button>
                </form>

            </div>
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl text-indigo-600">{{ $note->title }}</h2>
                <p class="mt-4 whitespace-pre-wrap">{{ $note->text }}</p>
            </div>

           @else

           <div class="flex gap-6">
                <p class="opacity-70"><strong>Created:</strong> {{ $note->created_at->diffForHumans() }}</p>
                <p class="opacity-70"><strong>Last Changed:</strong> {{ $note->updated_at->diffForHumans() }}</p>

                <x-link-button href="{{  route('notes.edit', $note) }}" class="ml-auto">Edit Note</x-link-button>
                <form action="{{  route('notes.destroy', $note) }}" method="post">
                    @method('delete')
                    @csrf
                    <x-primary-button class="bg-red-500 hover:bg-red-600 focus:bg-red-600" onclick="return confirm('Are you sure you want to move this note to trash?')">Move to Trash</x-primary-button>
                </form>
            </div>
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl text-indigo-600">{{ $note->title }}</h2>
                <p class="mt-4 whitespace-pre-wrap">{{ $note->text }}</p>
            </div>


           @endif

        </div>
    </div>
</x-app-layout>
