
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
<<<<<<< HEAD
      Form Elements | TailAdmin - Tailwind CSS Admin Dashboard Template
=======
      Registar Estudantes | Dziva Ngutu
>>>>>>> test
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body
    x-data="{ page: 'registarEstudante', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
          darkMode = JSON.parse(localStorage.getItem('darkMode'));
          $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}"
  >
<<<<<<< HEAD
    <!-- ===== Preloader Start ===== -->
    <include src="./partials/preloader.html"></include>
    @include('admin.partials.preloader')
    <!-- ===== Preloader End ===== -->
    
=======
  <!-- ===== Preloader Start ===== -->
  <include src="./partials/preloader.html"></include>
    @include('admin.partials.preloader')
    <!-- ===== Preloader End ===== -->

>>>>>>> test
    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
        <!-- ===== Sidebar Start ===== -->
        <include src="./partials/sidebar.html"></include>
        @include('admin.partials.sidebar')
        <!-- ===== Sidebar End ===== -->
<<<<<<< HEAD
        
=======

>>>>>>> test
        <!-- ===== Content Area Start ===== -->
        <div
        class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden"
        >
        <!-- ===== Header Start ===== -->
        <include src="./partials/header.html" />
        @include('admin.partials.header')
        <!-- ===== Header End ===== -->

        <!-- ===== Main Content Start ===== -->
        <main>
<<<<<<< HEAD
=======
            @if(Session('success'))
                @include('components.success-alert')
            @elseif (session('error'))
                @include('components.error-alert')
            @endif
>>>>>>> test
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <!-- Breadcrumb Start -->
            <div
            class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
            >
<<<<<<< HEAD
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Formulário de Registo
=======
            {{-- Mensagem de alerta --}}
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Registar Estudante
>>>>>>> test
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                <li>
<<<<<<< HEAD
                    <a class="font-medium" href="index.html">Dashboard /</a>
=======
                    <a class="font-medium" href="{{ route('index') }}">Inicio /</a>
>>>>>>> test
                </li>
                <li class="font-medium text-primary">Registar Estudante</li>
                </ol>
            </nav>
            </div>
            <!-- Breadcrumb End -->

            <!-- ====== Form Elements Section Start -->
            <div class="grid grid-cols-1 gap-9 sm:grid-cols-1">
                <div class="flex flex-col gap-9">
                    <!-- Contact Form -->
                    <div
                    class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
                    >
                    <div
                        class="border-b border-stroke px-6.5 py-4 dark:border-strokedark"
                    >
                        <h3 class="font-medium text-black dark:text-white">
                            Registe o Estudante
                        </h3>
                    </div>
<<<<<<< HEAD
                    <form action="#">
=======
                    <form action="{{ route('utilizadores.criar') }}" method="POST">
                        @csrf
>>>>>>> test
                        <div class="p-6.5">
                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                            <div class="w-full xl:w-1/2">
                            <label
                                class="mb-3 block text-sm font-medium text-black dark:text-white"
                            >
                                Nome
                            </label>
                            <input
                                type="text"
                                placeholder="Primeiro Nome"
<<<<<<< HEAD
                                name=""
=======
                                name="name"
                                value="{{ @old('name') }}"
>>>>>>> test
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            />
                            </div>

                            <div class="w-full xl:w-1/2">
                            <label
                                class="mb-3 block text-sm font-medium text-black dark:text-white"
                            >
                                Apelido
                            </label>
                            <input
                                type="text"
                                placeholder="Apelido"
<<<<<<< HEAD
                                name=""
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
=======
                                name="lastname"
                                value="{{ @old('lastname') }}"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                id="lastname"
>>>>>>> test
                            />
                            </div>
                        </div>

                        <div class="mb-4.5">
                            <label
                            class="mb-3 block text-sm font-medium text-black dark:text-white"
                            >
                            Email <span class="text-meta-1">*</span>
                            </label>
                            <input
                            type="email"
                            placeholder="abc@exemplo.ac.mz"
<<<<<<< HEAD
                            name=""
=======
                            name="email"
                            value="{{ @old('email') }}"
>>>>>>> test
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            />
                        </div>

                        <div class="mb-4.5">
                            <label
                            class="mb-3 block text-sm font-medium text-black dark:text-white"
                            >
<<<<<<< HEAD
                            Curso
=======
                            Faculdade
>>>>>>> test
                            </label>
                            <div
                            x-data="{ isOptionSelected: false }"
                            class="relative z-20 bg-transparent dark:bg-form-input"
                            >
                            <select
                                class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                :class="isOptionSelected && 'text-black dark:text-white'"
                                @change="isOptionSelected = true"
<<<<<<< HEAD
                            >
                                <option value="" class="text-body">
                                -- Selecione o Curso
                                </option>
                                <option value="" class="text-body">USA</option>
                                <option value="" class="text-body">UK</option>
                                <option value="" class="text-body">Canada</option>
=======
                                name="faculty_id"
                                id="faculty"
                            >
                                <option value="faculdade" class="text-body">
                                -- Selecione a faculdade
                                </option>
                                @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}" class="text-body">{{ $faculty->name }}</option>
                                @endforeach
>>>>>>> test
                            </select>
                            <span
                                class="absolute right-4 top-1/2 z-30 -translate-y-1/2"
                            >
                                <svg
                                class="fill-current"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <g opacity="0.8">
                                    <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                    fill=""
                                    ></path>
                                </g>
                                </svg>
                            </span>
                            </div>
                        </div>

<<<<<<< HEAD
=======
                        <div class="mb-4.5">
                            <label
                            class="mb-3 block text-sm font-medium text-black dark:text-white"
                            >
                            Curso
                            </label>
                            <div
                            x-data="{ isOptionSelected: false }"
                            class="relative z-20 bg-transparent dark:bg-form-input"
                            >
                            <select
                                class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                :class="isOptionSelected && 'text-black dark:text-white'"
                                @change="isOptionSelected = true"
                                name="course_id"
                                id="course"
                            >
                                <option value="curso" class="text-body">
                                -- Selecione o Curso
                                </option>
                            </select>
                            <span
                                class="absolute right-4 top-1/2 z-30 -translate-y-1/2"
                            >
                                <svg
                                class="fill-current"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <g opacity="0.8">
                                    <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                    fill=""
                                    ></path>
                                </g>
                                </svg>
                            </span>
                            </div>
                        </div>

                        <div class="mb-4.5">
                            <input
                            type="text"
                            name="role"
                            value="normal"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            style="display: none;"
                            />
                        </div>

                        <div class="mb-4.5">
                            <input
                            type="text"
                            name="type"
                            value="estudante"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            style="display: none;"
                            />
                        </div>

                        <div class="mb-4.5">
                            <input
                            type="text"
                            name="password"
                            value=""
                            value="{{ @old('password') }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            id="password"
                            style="display: none;"
                            />

                            <input
                            type="text"
                            name="password_confirmation"
                            value=""
                            value="{{ @old('password_confirmation') }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            id="password_confirmation"
                            style="display: none;"
                            />
                        </div>

>>>>>>> test
                        <button
                            type="submit"
                            class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90"
                        >
                            Submeter
                        </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- ====== Form Elements Section End -->
        </div>
        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->

    <script>
<<<<<<< HEAD
=======
    fillCourseSelect();
    createPassword();

    function fillCourseSelect() {
        const facultySelect = document.getElementById('faculty');
        const courseSelect = document.getElementById('course');

        facultySelect.addEventListener('change', () => {
            fetch(`/search_course/${facultySelect.value}`)
            .then(response => response.json())
            .then(courses => {
                courseSelect.innerHTML = `
                <option value="curso" class="text-body">
                -- Selecione o Curso
                </option>`;
                courses.forEach(e => {
                    courseSelect.innerHTML += `
                        <option value="${e.id}" class="text-body">
                        ${e.name}
                        </option>
                    `
                });
            })
        })
    }

    function createPassword() {
        const password = document.getElementById('password');
        const confirmation = document.getElementById('password_confirmation');
        const lastname = document.getElementById('lastname');
        lastname.addEventListener('keyup', () => {
            if(lastname.value.length < 8){
                password.value = `${lastname.value.toLowerCase()}${lastname.value.toLowerCase()}`;
                confirmation.value = password.value;
            } else {
                password.value = lastname.value.toLowerCase();
                confirmation.value = password.value;
            }
            console.log(password.value.length)
            console.log(password.value)
        })
    }

    window.onload = () => {
        const lastname = document.getElementById('lastname');
        const password = document.getElementById('password');
        const confirmation = document.getElementById('password_confirmation');

        if(lastname.value.length < 8){
            password.value = `${lastname.value.toLowerCase()}${lastname.value.toLowerCase()}`;
            confirmation.value = password.value;
        } else {
            password.value = lastname.value.toLowerCase();
            confirmation.value = password.value;
        }
    }

>>>>>>> test
    function dropdown() {
        return {
        options: [],
        selected: [],
        show: false,
        open() {
            this.show = true;
        },
        close() {
            this.show = false;
        },
        isOpen() {
            return this.show === true;
        },
        select(index, event) {
            if (!this.options[index].selected) {
            this.options[index].selected = true;
            this.options[index].element = event.target;
            this.selected.push(index);
            } else {
            this.selected.splice(this.selected.lastIndexOf(index), 1);
            this.options[index].selected = false;
            }
        },
        remove(index, option) {
            this.options[option].selected = false;
            this.selected.splice(index, 1);
        },
        loadOptions() {
            const options = document.getElementById("select").options;
            for (let i = 0; i < options.length; i++) {
            this.options.push({
                value: options[i].value,
                text: options[i].innerText,
                selected:
                options[i].getAttribute("selected") != null
                    ? options[i].getAttribute("selected")
                    : false,
            });
            }
        },
        selectedValues() {
            return this.selected.map((option) => {
            return this.options[option].value;
            });
        },
        };
    }
    </script>
  </body>
</html>
