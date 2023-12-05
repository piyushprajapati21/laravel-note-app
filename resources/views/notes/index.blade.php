<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('notes.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">+ New Note</a>
             @forelse($notes as $note)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg mt-6">
                    <h2 class="font-bold text-2xl"><b><a href="{{ route('notes.show',$note->uuid) }}">{{  $note->title }}</a></b></h2>
                    <p class="mt-2">{{ Str::limit($note->text,200) }} </p>
                    <span class="block mt-4 text-sm opacity-70">{{ $note->updated_at->diffForHumans() }}</span>
                </div>
            @empty 
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg mt-6">
                    <h2 class="font-bold text-2xl"><b>Notes not found</b></h2>
                </div> 
             @endforelse
             <div class="mt-6"> {{ $notes->links()}}</div>
        </div>
    </div>
</x-app-layout>