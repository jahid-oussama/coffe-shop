<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> --}}
                {{-- <x-jet-welcome /> --}}
                <div class="coucou">

                    <div class="loader">
                        Loading
                    </div>
                    
                </div>
                     
                      <style>
.coucou {
  background-color: #121212;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}


.loader {
  font-size: 2rem;
  font-family: sans-serif;
  font-variant: small-caps;
  font-weight: 900;
  background: conic-gradient(
    #dff2ae 0 25%,
    #ff904f 25% 50%,
    #feefe7 50% 75%,
    #ffde2b 75%
  );
  background-size: 200% 200%;
  animation: animateBackground 4.5s ease-in-out infinite;
  color: transparent;
  background-clip: text;
  -webkit-background-clip: text;
}

@keyframes animateBackground {
  25% {
    background-position: 0 100%;
  }

  50% {
    background-position: 100% 100%;
  }

  75% {
    background-position: 100% 0%;
  }

  100% {
    background-position: 0 0;
  }
}


                  </style>
{{-- 
            </div>
        </div>
    </div> --}}
</x-app-layout>
