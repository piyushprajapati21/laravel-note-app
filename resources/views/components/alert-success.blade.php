@if(session('success'))
    <div class="mt-6 mb-6 bg-green-100 border-greeen-100 text-green-700 rounded"> 
        {{  $slot }} </div>

@endif