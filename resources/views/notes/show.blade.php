<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
            <x-alert-success>{{ session('success') }}</x-alert-success>

                <div class="flex mb-6"><p>
                    <strong>Created : </strong> {{ $note->created_at->diffForHumans() }}
                    <strong>Updated : </strong> {{ $note->updated_at->diffForHumans() }}&nbsp;&nbsp;&nbsp;
                    <p class="ml-auto"><a href="{{ route('notes.edit',$note->uuid) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit Note</a></p>&nbsp;&nbsp;&nbsp;
                    <p class="ml-auto">
                        <form action="{{ route('notes.destroy',$note) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Delete</button>
                        </form>
                    </p>
                 </div>
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg mt-6"> 
                    <h2 class="font-bold text-4xl"><b>{{  $note->title }}</b></h2>
                    <p class="mt-6 whitespace-pre-wrap">{{  ($note->text ) }} </p> 
                </div>
            
        </div>
    </div>
</x-app-layout>