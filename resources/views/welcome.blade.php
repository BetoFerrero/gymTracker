
<x-web-layout>
    <div data-scroll-container class="smooth-scroll">
        <section data-scroll-section style="background-image: url('{{ asset('images/plano_picado_gym.jpg')}}')" class=" bg-gray-700 bg-center bg-no-repeat bg-blend-multiply bg-cover max-h-screen-xl max-w-screen">
          <div class="mx-auto px-4 py-24 text-center lg:py-56" x-data="{
                          text: '',
                          textArray : ['La revolución del fitness', 'Enfoca tus entrenamientos', 'Tu compañero definitivo'],
                          textIndex: 0,
                          charIndex: 0,
                          pauseEnd: 3000,
                          cursorSpeed: 420,
                          pauseStart: 20,
                          typeSpeed: 80,
                          direction: 'forward'
                       }" x-init="(() => { 
                       
                          let typingInterval = setInterval(startTyping, $data.typeSpeed);
                       
                       function startTyping(){
                          let current = $data.textArray[ $data.textIndex ];
                          if($data.charIndex > current.length){
                               $data.direction = 'backward';
                               clearInterval(typingInterval);
                               setTimeout(function(){
                                  typingInterval = setInterval(startTyping, $data.typeSpeed);
                               }, $data.pauseEnd);
                          }   
                             
                          $data.text = current.substring(0, $data.charIndex);
                          if($data.direction == 'forward'){
                              $data.charIndex += 1;
                           } else {
                              if($data.charIndex == 0){
                                  $data.direction = 'forward';
                                  clearInterval(typingInterval);
                                  setTimeout(function(){
                                  
                                      $data.textIndex += 1;
                                      if($data.textIndex >= $data.textArray.length){
                                          $data.textIndex = 0;
                                      }
                                  
                                      typingInterval = setInterval(startTyping, $data.typeSpeed);
                                  }, $data.pauseStart);
                              }
                              $data.charIndex -= 1;
                           }
                        
                       }
                   
                   })()">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-white md:text-5xl lg:text-6xl">
              <!--La evolución del fitness--><span x-text="text"></span>:<p> entrena con inteligencia y alcanza un nuevo nivel de rendimiento.</p>
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-300 sm:px-16 lg:px-48 lg:text-xl">No pierdas más tiempo en cuadernos y hojas de cálculo. Descubre la comodidad de llevar tu plan de entrenamiento al siguiente nivel.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-x-4 sm:space-y-0">
              <a href="#" class="inline-flex items-center justify-center rounded-lg bg-blue-700 px-5 py-3 text-center text-base font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Comencemos 💪
              </a>
              <a href="#" class="inline-flex items-center justify-center rounded-lg border border-white px-5 py-3 text-center text-base font-medium text-white hover:bg-gray-100 hover:text-gray-900 focus:ring-4 focus:ring-gray-400"> Learn more </a>
            </div>
          </div>
        </section>
      
        <!--historial de entrenamientos-->
        <section data-scroll-section id="learnMoreTarget" class="bg-white dark:bg-gray-900 max-w-screen max-h-screen data-scroll-section">
          <span class="line line-1"></span>
          <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
              <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Tus entrenamientos, tus récords 🏋🏽</h1>
              <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Conquista tus marcas con tu <b>historial de entrenamientos.</b></p>
      
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
              <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup">
            </div>
          </div>
        </section>
      
        <section data-scroll-section class="horizontalScrolling pt-32 pb-32 bg-gray-600" >
          <div class="section-inner">
      
          <div class="flex space-x-1 bg-gray-600" data-scroll-in-section>
            <img class="item object-cover rounded-lg mt-8" src="http://d205bpvrqc9yn1.cloudfront.net/0213.gif"></img>
            <img class="item object-cover rounded-lg mb-8" src="http://d205bpvrqc9yn1.cloudfront.net/0233.gif"></img> 
            <img class="item object-cover rounded-lg mt-8" src="http://d205bpvrqc9yn1.cloudfront.net/0805.gif"></img> 
            <img class="item object-cover rounded-lg mb-8" src="http://d205bpvrqc9yn1.cloudfront.net/0010.gif"></img> 
            <img class="item object-cover rounded-lg mt-8" src="http://d205bpvrqc9yn1.cloudfront.net/0864.gif"></img> 
            <img class="item object-cover rounded-lg mb-8" src="http://d205bpvrqc9yn1.cloudfront.net/0009.gif"></img>
            <img class="item object-cover rounded-lg mt-8" src="http://d205bpvrqc9yn1.cloudfront.net/0650.gif"></img>
            <img class="item object-cover rounded-lg mb-8" src="http://d205bpvrqc9yn1.cloudfront.net/0023.gif"></img>
            <img class="item object-cover rounded-lg mt-8" src="http://d205bpvrqc9yn1.cloudfront.net/0155.gif"></img>
            <img class="item object-cover rounded-lg mb-8" src="http://d205bpvrqc9yn1.cloudfront.net/0286.gif"></img>
          </div>
      
            <!--Texto encima-->
            <div class="absolute inset-0 flex items-center justify-center backdrop-blur-2">
              <div class="text-white text-center">
              <h1 class="underline decoration-orange-600 text-9xl font-extrabold mix-blend-difference antialiased text-gray-400">+1200 EJERCICIOS</h1>
              <p class="mt-10 font-semibold text-center text-xl mb-8 text-gray-700"> con recomendaciones 
                <span class="text-extrabold">basadas en tus rutinas<span></p>
                  </div>
            </div>
      </div>
        </section>
      
      </div>
</x-web-layout>