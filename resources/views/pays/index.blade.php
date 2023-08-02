<x-app-layout>
    <x-slot name="title">Pays</x-slot>
    <div class="py-4 px-4">
        <p><a href="{{route('pays.export')}}" target= "_bank" class="btn btn-success">Exporter</a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
  Importer Pays
</button>
    </p>
    <p>
     {{ Auth::user()->is_admin}}
    </p>
        <table class="table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Capital</th>
                    <th>Regions</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pays as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->capital }}</td>
                    <td>
                        @forelse($item->regions as $region)
                        <li>{{ $region->name}}  : {{ $region->pivot->adhesion }}</li>
                        @empty
                         AUCUN
                        @endforelse
                        </td>
                    <td>
                        <a href="{{ route('pays.edit', $item->id)}}" class="btn btn-primary">Editer</a>
                        <button class="btn btn-warning">Supprimer</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <style>svg.w-5 { width:25px ! important;} </style>
        {{ $pays->links()}}
    </div>
    <x-pays.import/>
</x-app-layout>
