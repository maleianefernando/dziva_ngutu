
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
      Registar Faculdade | Dziva Ngutu
>>>>>>> test
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body
    x-data="{ page: 'registarFaculdade', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
          darkMode = JSON.parse(localStorage.getItem('darkMode'));
          $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}"
  >
    <!-- ===== Preloader Start ===== -->
    <include src="./partials/preloader.html"></include>
    @include('admin.partials.preloader')
    <!-- ===== Preloader End ===== -->
<<<<<<< HEAD
    
=======

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
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
<<<<<<< HEAD
                Formulário de Registo
=======
                Registar Faculdades
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
                <li class="font-medium text-primary">Registar Faculdade</li>
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
                            Registe a Faculdade
                        </h3>
                    </div>
<<<<<<< HEAD
                    <form action="#">
=======
                    <form action="{{ route('faculdade.criar') }}" method="POST">
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
                                    placeholder="Ex: Faculdade De Engenharias e Tecnologias"
                                    name="name"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                />
                            </div>

>>>>>>> test
                            <div class="mb-4.5">
                                <label
                                    class="mb-3 block text-sm font-medium text-black dark:text-white"
                                >
                                    Local
                                </label>
                                <input
                                    type="text"
<<<<<<< HEAD
                                    placeholder="Maputo/exemplo"
                                    name=""
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                />
                            </div>
                            
=======
                                    placeholder="Ex: Maputo, Av. Trabalho nr 1132"
                                    name="location"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                />
                            </div>

>>>>>>> test
                            <div class="mb-4.5">
                                <label
                                    class="mb-3 block text-sm font-medium text-black dark:text-white"
                                >
                                    Contacto
                                </label>
                                <input
                                    type="text"
                                    placeholder="8* 111 1111"
<<<<<<< HEAD
                                    name=""
=======
                                    name="phone"
>>>>>>> test
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                />
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
            <!-- ====== Form Elements Section End -->
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
