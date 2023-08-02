<x-app-layout>
    <x-slot name="title">Pays</x-slot>
    <div class="py-4 px-4">
        <form action = "{{ route('pays.update',$pays->id)}}" method = "post">
            @csrf
            @method('PUT')
        <p>
            Nom:
            <input type = "text" value = " {{$pays->name}}" name = "name" required>
</p>
<p>
            Capital:
            <input type = "text" value = " {{$pays->capital}}" name = "capital" required>
</p>
<input type = "submit" class = "btn btn-primary" value= "Enregistrer"/>
            
</form>
</div>
</x-app-layout>