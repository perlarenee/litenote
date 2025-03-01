@if(session('success'))
<p class="mb-4 py-2 bg-green-100 border-green-200 text-green-7-00 rounded-md">{{  $slot }}
</p>
@endif
