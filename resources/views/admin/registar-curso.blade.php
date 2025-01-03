
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
      Registar Curso | Dziva Ngutu
>>>>>>> test
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body
    x-data="{ page: 'registarCurso', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
          darkMode = JSON.parse(localStorage.getItem('darkMode'));
          $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}"
  >
    <!-- ===== Preloader Start ===== -->
    @include('admin.partials.preloader')
    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
    <!-- ===== Sidebar Start ===== -->
    @include('admin.partials.sidebar')
    <!-- ===== Sidebar End ===== -->

    <!-- ===== Content Area Start ===== -->
    <div
        class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden"
    >
        <!-- ===== Header Start ===== -->
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
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
<<<<<<< HEAD
                Formulário de Registo
=======
                Registar Curso
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
                <li class="font-medium text-primary">Registar Curso</li>
                </ol>
            </nav>
            </div>
            <!-- Breadcrumb End -->

            <!-- ====== Form Elements Section Start ===== -->
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
                            Registe o Curso
                        </h3>
                    </div>
<<<<<<< HEAD
                    <form action="#">
=======
                    <form action="{{ route('curso.criar') }}" method="POST">
                        @csrf
>>>>>>> test
                        <div class="p-6.5">
                            <div class="mb-4.5">
                                <label
                                    class="mb-3 block text-sm font-medium text-black dark:text-white"
                                >
                                    Designação
                                </label>
                                <input
                                    type="text"
<<<<<<< HEAD
                                    placeholder="Nome"
                                    name=""
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                />
                            </div>
                            
=======
                                    placeholder="Ex: Informática aplicada"
                                    name="name"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                />
                            </div>

>>>>>>> test
                            <div class="mb-4.5">
                                <label
                                    class="mb-3 block text-sm font-medium text-black dark:text-white"
                                >
                                    Duração
                                </label>
                                <input
                                    type="number"
<<<<<<< HEAD
                                    placeholder="Maputo/exemplo"
                                    name=""
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                />
                            </div>
                            
=======
                                    placeholder="Quantos anos dura o curso"
                                    name="duration"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                />
                            </div>

>>>>>>> test
                            <div class="mb-4.5">
                                <label
                                class="mb-3 block text-sm font-medium text-black dark:text-white"
                                >
<<<<<<< HEAD
                                Facldade
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
                                    -- Selecione a Faculdade
                                    </option>
                                    <option value="" class="text-body">USA</option>
                                    <option value="" class="text-body">UK</option>
                                    <option value="" class="text-body">Canada</option>
                                </select>
                                
=======
                                    name="faculty_id"
                                >
                                    <option value="faculdade" class="text-body">
                                    -- Selecione a Faculdade
                                    </option>
                                    @foreach ($faculties as $f)
                                    <option value="{{ $f->id }}" class="text-body">{{ $f->name }}</option>
                                    @endforeach
                                </select>

>>>>>>> test
                                </div>
                            </div>
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
            <!-- ====== Form Elements Section End ===== -->
        </div>
        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->

    <script>
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
