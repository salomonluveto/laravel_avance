<x-app-layout>
    <x-slot name="title">Pays</x-slot>
    <div class="py-4 px-4">
        <form action = "{{ route('pays.store')}}" method = "post">
            @csrf
        <p>
            Nom:
            <input type = "text" name = "name" required>
</p>
<p>
            Capital:
            <input type = "text" name = "capital" required>
</p>
<div>
    @forelse ($regions as $item)
   <p>
    {{ $item->name }}
    <input type = "checkbox" value = "{{ $item->id }}" name = "regions[]" id="">
    <input type = "date" name ="adhesion{{ $item->id }}" id = "">

   </p> 

    @empty
    <p>
    Aucune region
</p>
    @endforelse
</div>
<input type = "submit" class = "btn btn-primary" value= "Enregistrer"/>
            
</form>
</div>
</x-app-layout>