<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes - Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
             
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg mt-6"> 
                         
                        <form action="{{ route('notes.store') }}" method="POST">@csrf
                            <div class="w-full "> 
                                 <label>Title:</label>
                                <input type="text" name="title" id="title" placeholder="Title" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                                @error('title') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                            </div>
                            <div class="w-full mt-6">
                                <label>Description:</label>
                                <textarea name="text" id="text" cols="30" rows="10" placeholder="Description Here..." class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                                @error('text') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                            </div>
                            <div class="mt-6">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Submit</button>
                            </div>

                        </form>

                </div>
            
        </div>
    </div>
</x-app-layout>