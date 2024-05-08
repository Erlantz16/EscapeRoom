<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap">

</head>

<header>
    <nav class="bg-fondoMenu h-20 p-8 flex items-center justify-end">
        <div class="h-fit w-1/4">
            <a href="portada" class="text-fondoWeb">
                <div class="h-full w-fit flex items-center">
                    <img src="images/logoMenu.png" alt="Escape Room-aren logoa" class="w-10 h-10" />
                    <div class="h-full w-fit ml-4">
                        <h1 class="text-sm">CITT: Irratiaren misterioa</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="w-3/4 flex justify-end">
            <nav class="text-fondoWeb">
                <ul class="text-medium" style="text-align: center;">
                    <li class="inline-block mr-8 p-2 rounded-lg hover:bg-fondoWeb hover:text-fondoMenu"><a href="clasificacion">Klasifikazioa</a></li>
                    <li class="inline-block mr-8 p-2 rounded-lg hover:bg-fondoWeb hover:text-fondoMenu align-middle w-10" id="dropdown-trigger">
                        <img src="images/usuarioIcono.png" alt="">
                        <ul class="dropdown-menu bg-fondoWeb">
                            <li><a href="perfil">Perfila</a></li>
                            @auth
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit">Saioa Itxi</button>
                                </form>
                            </li>
                            @endauth

                            @if (optional(auth()->user())->rol == 1)
                                <li><a href="admin">Admin</a></li>
                            @endif

                        </ul>
                    </li>
                </ul>
            </nav>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var dropdownTrigger = document.getElementById("dropdown-trigger");
                    dropdownTrigger.addEventListener("mouseover", function() {
                        dropdownTrigger.classList.add("active");
                    });
                    dropdownTrigger.addEventListener("mouseout", function() {
                        dropdownTrigger.classList.remove("active");
                    });
                });
            </script>
</header>
<style>
    header,
    h1,
    a {
        font-family: 'Zen Dots', cursive;
        font-size: 12px;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        padding: 8px;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    #dropdown-trigger:hover .dropdown-menu {
        display: block;
    }
</style>
