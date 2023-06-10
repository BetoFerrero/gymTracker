<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!--<link href="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.1/dist/locomotive-scroll.min.css" rel="stylesheet"/>-->
        <!-- Styles -->
        @livewireStyles()
        @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/Welcome.css' ])
        <script>
            window.frases = [
                "qué andabas buscando, ¡A entrenar!",
                "¡Ups! Parece que te desviaste del entrenamiento",
                "¡El entrenamiento ha desaparecido en el éter digital!",
                "¿Buscabas tu entrenamiento de pierna?"
                
            ];
        
            function RandomFrase() {
                const randomIndex = Math.floor(Math.random() * window.frases.length);
                return window.frases[randomIndex];
            }
        </script>

        
        
    </head>
    <body class="antialiased">

    

<main class="bg-white dark:bg-gray-900" x-data="{ frase: getRandomFrase() }">
    <div class="py-8 px-4 mx-auto flex flex-col h-screen lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-md text-center">
            <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">
                404</h1>
            <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">
                ☹</p>
            <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400" x-text="frase"></p>
            <a href="{{url('/')}}" class="inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Volver</a>
        </div>   
    </div>
</section>

</body>
</html>




