<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Letra Sopa</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@3.0.0/dist/vue.global.prod.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        fondoMenu: '#333745',
                        fondoWeb: '#E63462',
                        fondoBtn: '#E63462', // Cambiado a #333745
                        textoBlanco: '#FFFFFF', // Nuevo color blanco
                        hoverRojo: '#FF3333',
                        fondoBoton: '#B31E4C'
                    }
                }
            }
        }
    </script>

</head>

@include('partials.header')



<body class="text-textoBlanco fondo-imagen">
    <div class="px-6 py-24 sm:py-32 lg:px-8">

        <div class=" mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-textoBlanco sm:text-4xl">Kontaktua</h2>
            <p class="mt-2 text-lg leading-8 text-textoBlanco">Bete ezazu formulario hau gurekin kontaktatzeko.</p>
        </div>


            <form @ id="myForm" method="put" class="mx-auto mt-16 max-w-xl sm:mt-20">

                <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                    <div>
                        <label for="first-name" class="block text-sm font-semibold leading-6 text-textoBlanco">Izena</label>
                        <div class="mt-2.5">
                            <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 px-4 py-2.5 text-black font-bold shadow-sm ring-1 ring-inset ring-textoBlanco placeholder:text-textoBlanco focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <div id="error-first-name" class="text-red-600 font-bold mt-2"></div>
                        </div>
                    </div>
                    <div>
                        <label for="last-name" class="block text-sm font-semibold leading-6 text-textoBlanco">Abizena</label>
                        <div class="mt-2.5">
                            <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-4 py-2.5 text-black font-bold shadow-sm ring-1 ring-inset ring-textoBlanco placeholder:text-textoBlanco focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <div id="error-last-name" class="text-red-600 font-bold mt-2"></div>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="company" class="block text-sm font-semibold leading-6 text-textoBlanco">Enpresa</label>
                        <div class="mt-2.5">
                            <input type="text" name="company" id="company" autocomplete="organization" class="block w-full rounded-md border-0 px-4 py-2.5 text-black font-bold shadow-sm ring-1 ring-inset ring-textoBlanco placeholder:text-textoBlanco focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <div id="error-company" class="text-red-600 font-bold mt-2"></div>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block text-sm font-semibold leading-6 text-textoBlanco">Email</label>
                        <div class="mt-2.5">
                            <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-4 py-2.5 text-black font-bold shadow-sm ring-1 ring-inset ring-textoBlanco placeholder:text-textoBlanco focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <div id="error-email" class="text-red-600 font-bold mt-2"></div>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone-number" class="block text-sm font-semibold leading-6 text-textoBlanco">Mugikorra</label>
                        <div class="relative mt-2.5">
                            <input type="tel" name="phone-number" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 px-4 py-2.5  text-black font-bold shadow-sm ring-1 ring-inset ring-textoBlanco placeholder:text-textoBlanco focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <div id="error-phone-number" class="text-red-600 font-bold mt-2"></div>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="block text-sm font-semibold leading-6 text-textoBlanco">Mezua</label>
                        <div class="mt-2.5">
                            <textarea name="message" id="message" rows="4" class="block w-full rounded-md border-0 px-4 py-2.5 text-black font-bold shadow-sm ring-1 ring-inset ring-textoBlanco placeholder:text-textoBlanco focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                    </div>
                    <div class="flex gap-x-4 sm:col-span-2">
                        <div class="flex h-6 items-center">
                            <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                            <button type="button" class="bg-gray-200 flex w-8 flex-none cursor-pointer rounded-full p-px ring-1 ring-inset ring-textoBlanco/5 transition-colors duration-200 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-textoBlanco" role="switch" aria-checked="false" aria-labelledby="switch-1-label">
                                <span class="sr-only">Baiestatu</span>
                                <!-- Enabled: "translate-x-3.5", Not Enabled: "translate-x-0" -->
                                <span aria-hidden="true" class="translate-x-0 h-4 w-4 transform rounded-full bg-white shadow-sm ring-1 ring-textoBlanco/5 transition duration-200 ease-in-out"></span>
                            </button>
                        </div>
                        <label class="text-sm leading-6 text-textoBlanco" id="switch-1-label">
                            Hau onartuta, <a href="#" class="font-semibold text-textoBlanco">pribatutasun&nbsp;politika</a>. arabera zaude.

                        </label>
                    </div>
                </div>
                <div class="mt-10">
                    <button type="button" onclick="submitForm()" class="block w-full rounded-md bg-fondoWeb  px-4 py-2.5 text-center text-sm font-semibold text-textoBlanco shadow-sm hover:bg-fondoBoton focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-hoverRojo">Bidali</button>
                </div>
            </form>
    </div>
</body>
@include('partials.footer')

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function submitForm() {
        var formData = {
            firstName: document.getElementById('first-name').value.trim(),
            lastName: document.getElementById('last-name').value.trim(),
            company: document.getElementById('company').value.trim(),
            email: document.getElementById('email').value.trim(),
            phoneNumber: document.getElementById('phone-number').value.trim(),
            message: document.getElementById('message').value.trim(),
        };

        var errors = {};

        if (!formData.firstName) {
            errors.firstName = 'Mesedez, zure izena jarri.';
            document.getElementById('error-first-name').innerText = errors.firstName;
        } else {
            document.getElementById('error-first-name').innerText = '';
        }

        if (!formData.lastName) {
            errors.lastName = 'Mesedez, zure abizena jarri.';
            document.getElementById('error-last-name').innerText = errors.lastName;
        } else {
            document.getElementById('error-last-name').innerText = '';
        }

        if (!formData.company) {
            errors.company = 'Mesedez, zure enpresaren izena jarri.';
            document.getElementById('error-company').innerText = errors.company;
        } else {
            document.getElementById('error-company').innerText = '';
        }

        if (!formData.email) {
            errors.email = 'Mesedez, zure email jarri.';
            document.getElementById('error-email').innerText = errors.email;
        } else if (!isValidEmail(formData.email)) {
            errors.email = 'Mesedez, baliozko email bat jarri.';
            document.getElementById('error-email').innerText = errors.email;
        } else {
            document.getElementById('error-email').innerText = '';
        }

        if (!formData.phoneNumber) {
            errors.phoneNumber = 'Mesedez, zure mugikorra jarri.';
            document.getElementById('error-phone-number').innerText = errors.phoneNumber;
        } else {
            document.getElementById('error-phone-number').innerText = '';
        }

        if (Object.keys(errors).length === 0) {
            // Si no hay errores, puedes realizar acciones adicionales
            Swal.fire({
                title: 'Formularioa bidali da',
                text: 'Eskerrik asko zure mezuagatik.',
                icon: 'success',
                confirmButtonText: 'Itxi'
            }).then(() => {
                location.reload();
            });
        } else {
            console.log('Formulario inválido. Por favor, corrige los errores.', errors);
        }
    }

    function isValidEmail(email) {
        // Función de validación simple para verificar si es un correo electrónico válido
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
</script>



<style>
    body{
        font-family: 'Zen Dots';
    }
    body.fondo-imagen {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('images/fondoimagen.jpg');
        background-size: cover;

    }
</style>
