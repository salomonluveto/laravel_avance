<x-app-layout>
    <x-slot name="title">Région</x-slot>
    <div class="py-4 px-4">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Ajouter Région
</button>


        <table class="table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Pays</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($region as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                    @forelse($item->pays as $pays)
                        <li>{{ $pays->name}}  : {{ $pays->pivot->adhesion }}</li>
                        @empty
                         AUCUN
                        @endforelse
</td>
            
                    <td>
                        <a data-bs-toggle="modal" onclick="editer(event)" data-bs-target="#editModal" href="{{ route('region.update', $item->id)}}" class="btn btn-primary">Editer</a>
                        <a data-bs-toggle="modal" onclick="supprimer(event)" data-bs-target="#deleteModal" href="{{ route('region.destroy', $item->id)}}" class="btn btn-danger">Supprimer</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-regions.create/>
    <x-regions.edit/>
    <x-delete :title="__('Region')"/>
    <script>
        function editer(event){
            var route = event.target.getAttribute('href')
            var tr = event.target.closest('tr')
            var name = tr.children[1].textContent
            var form = document.querySelector('#editModal form')
            form.setAttribute('action',route)
            form.name.value = name

            //alert(route)
        }

        
    </script>
</x-app-layout>
