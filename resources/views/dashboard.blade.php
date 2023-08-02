<x-app-layout>
    <x-slot name="title">Tableau de bord</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    @php
                        $contenu = "composant blade";
                        $contenu2 = "Deuxième composant";
                    @endphp
                    <x-test :color="__('red')" class="mt-5" :contenu="$contenu">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quas illum ad ratione accusamus commodi consequuntur magnam consectetur, voluptate, corporis assumenda ullam dignissimos eveniet aliquid possimus, sunt maxime dolores nulla.</p>
                    </x-test>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
