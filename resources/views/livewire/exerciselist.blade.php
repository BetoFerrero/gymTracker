<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-4 text-2xl font-medium text-gray-900">
        <div>Ejercicios</div>
    </h1>
    <div class="mt-3">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Imagen</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Nombre</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Parte del cuerpo</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Acción</div>
                    </th>
                </tr>
            </thead>
            <tbody>
               
                @foreach ( $exercises as $exercise )
                    <tr>
                        
                        <td class="px-4 py-2 p" >
                            <img src="{{$exercise->ImageSrc}}" alt="{{$exercise->Name}}" class="object-cover h-20 w-20" onerror="this.onerror = null;this.src='{{ URL::to('/') }}/img/noImage.jpg'"/>    
                        </td>
                        <td>{{$exercise->Name}}</td>
                        <td>{{$exercise->bodyPart}}</td>
                        <td>Editar / Eliminar</td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{$exercises->links()}}
    </div>
</div>
