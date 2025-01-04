<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload | Dziva Ngutu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body
    x-data="{ page: 'docUpload', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
          darkMode = JSON.parse(localStorage.getItem('darkMode'));
          $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}"
  >
    <!-- ===== Preloader Start ===== -->
    <include src="./partials/preloader.html"></include>
    @include('admin.partials.preloader')
    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
      <!-- ===== Sidebar Start ===== -->
      <include src="./partials/sidebar.html"></include>
      @include('admin.partials.sidebar')
      <!-- ===== Sidebar End ===== -->

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
            @if(Session('success'))
                @include('components.success-alert')
            @elseif (session('error'))
                @include('components.error-alert')
            @endif
          <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
              <!-- Breadcrumb Start -->
              <div
                class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
              >
                <h2 class="text-title-md2 font-bold text-black dark:text-white">
                  Fazer Upload dos Ficheiros
                </h2>

                <nav>
                  <ol class="flex items-center gap-2">
                    <li>
                      <a class="font-medium" href="{{ route('index') }}">Inicio /</a>
                    </li>
                    <li class="font-medium text-primary">Subir Ficheiro</li>
                  </ol>
                </nav>
              </div>
              <!-- Breadcrumb End -->

              <!-- ====== Settings Section Start -->
              <div class="grid grid-cols-5 gap-8">
                <div class="col-span-5 xl:col-span-3">
                  <div
                    class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
                  >
                    <div
                      class="border-b border-stroke px-4 py-4 dark:border-strokedark"
                    >
                      <h3 class="font-medium text-black dark:text-white">
                        Para ver Ficheiros Anteriormente Submetidos
                      </h3>
                      <div >

                        <div>
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
                                id="first_course"
                            >
                                <option value="" class="text-body">
                                -- Selecione o curso
                                </option>
                                @if ($courses)
                                  @foreach ($courses as $c)
                                  <option value="{{ $c->id }}" class="text-body">
                                    {{ $c->name }}
                                  </option>
                                  @endforeach
                                @endif
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

                        <div>
                            <label
                            class="mb-3 block text-sm font-medium text-black dark:text-white"
                            >
                            Cadeira
                            </label>
                            <div
                            x-data="{ isOptionSelected: false }"
                            class="relative z-20 bg-transparent dark:bg-form-input"
                            >
                            <select
                                class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                :class="isOptionSelected && 'text-black dark:text-white'"
                                @change="isOptionSelected = true"
                                name="subject_id"
                                id="first_subject"
                            >
                                <option value="cadeira" class="text-body">
                                -- Selecione a cadeira
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
                    </div>
                    </div>
                    <div class="p-4">
                      <table class="w-full table-auto" id="list-files-table">
                        <thead>
                            <tr class="bg-gray-2 text-left dark:bg-meta-4">
                            <th
                                class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white"
                            >
                                Nome
                            </th>

                            <th class="px-2 py-4 font-medium text-black dark:text-white ">
                                Ação
                            </th>
                            </tr>
                        </thead>
                      </thead>
                      <tbody id="files-tbody">
                            @foreach ($documents as $d)
                            <tr>
                                <td class="">
                                    <h5 class="font-medium text-black dark:text-white">
                                      {{ $d->file_name }}
                                    </h5>
                                    <p class="text-sm">
                                      {{ $d->description === null ? 'Sem descrição' : $d->description }}
                                    </p>
                                </td>
                                <td class="px-2 py-5">
                                    <div class="flex items-center space-x-3.5">
                                    <button class="hover:text-primary show-file" data-id="{{ $d->id }}" data-filename="{{ $d->file_name }}" onclick="showFile(this)">
                                        <svg
                                        class="fill-current"
                                        width="18"
                                        height="18"
                                        viewBox="0 0 18 18"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        >
                                        <path
                                            d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                            fill=""
                                        />
                                        <path
                                            d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                            fill=""
                                        />
                                        </svg>
                                    </button>
                                    <button class="hover:text-primary delete-file">
                                        <svg
                                        class="fill-current"
                                        width="18"
                                        height="18"
                                        viewBox="0 0 18 18"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        >
                                        <path
                                            d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z"
                                            fill=""
                                        />
                                        <path
                                            d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z"
                                            fill=""
                                        />
                                        <path
                                            d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z"
                                            fill=""
                                        />
                                        <path
                                            d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z"
                                            fill=""
                                        />
                                        </svg>
                                    </button>
                                    <button class="hover:text-primary download-file" data-id="{{ $d->id }}" data-filename="{{ $d->file_name }}" onclick="downloadFile(this)">
                                        <svg
                                        class="fill-current"
                                        width="18"
                                        height="18"
                                        viewBox="0 0 18 18"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        >
                                        <path
                                            d="M16.8754 11.6719C16.5379 11.6719 16.2285 11.9531 16.2285 12.3187V14.8219C16.2285 15.075 16.0316 15.2719 15.7785 15.2719H2.22227C1.96914 15.2719 1.77227 15.075 1.77227 14.8219V12.3187C1.77227 11.9812 1.49102 11.6719 1.12539 11.6719C0.759766 11.6719 0.478516 11.9531 0.478516 12.3187V14.8219C0.478516 15.7781 1.23789 16.5375 2.19414 16.5375H15.7785C16.7348 16.5375 17.4941 15.7781 17.4941 14.8219V12.3187C17.5223 11.9531 17.2129 11.6719 16.8754 11.6719Z"
                                            fill=""
                                        />
                                        <path
                                            d="M8.55074 12.3469C8.66324 12.4594 8.83199 12.5156 9.00074 12.5156C9.16949 12.5156 9.31012 12.4594 9.45074 12.3469L13.4726 8.43752C13.7257 8.1844 13.7257 7.79065 13.5007 7.53752C13.2476 7.2844 12.8539 7.2844 12.6007 7.5094L9.64762 10.4063V2.1094C9.64762 1.7719 9.36637 1.46252 9.00074 1.46252C8.66324 1.46252 8.35387 1.74377 8.35387 2.1094V10.4063L5.40074 7.53752C5.14762 7.2844 4.75387 7.31252 4.50074 7.53752C4.24762 7.79065 4.27574 8.1844 4.50074 8.43752L8.55074 12.3469Z"
                                            fill=""
                                        />
                                        </svg>
                                    </button>
                                    </div>
                                </td>
                              </tr>
                            @endforeach
                      </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-span-5 xl:col-span-2">
                  <div
                    class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
                  >
                    <div
                      class="border-b border-stroke px-7 py-4 dark:border-strokedark"
                    >
                      <h3 class="font-medium text-black dark:text-white">
                        Fazer Upload do Ficheiro
                      </h3>
                    </div>
                    <div class="p-7">
                      <form class="flex flex-col gap-5.5 " action="{{ route('documentos.criar') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                          <label
                            class="mb-3 block text-sm font-medium text-black dark:text-white"
                          >
                            Escolha o Ficheiro
                          </label>
                          <input
                            type="file"
                            name="files[]"
                            multiple
                            class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary"
                          />
                        </div>

                        <div >
                            <label
                                class="mb-3 block text-sm font-medium text-black dark:text-white"
                            >
                                Descrição
                            </label>
                            <input
                                type="text"
                                placeholder="Descrição"
                                name="description"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            />
                        </div>

                        <div>
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
                                <option value="" class="text-body">
                                -- Selecione o curso
                                </option>
                                @foreach ($courses as $c)
                                    <option value="{{ $c->id }}" class="text-body">
                                        {{ $c->name }}
                                    </option>
                                @endforeach
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

                        <div>
                            <label
                            class="mb-3 block text-sm font-medium text-black dark:text-white"
                            >
                            Cadeira
                            </label>
                            <div
                            x-data="{ isOptionSelected: false }"
                            class="relative z-20 bg-transparent dark:bg-form-input"
                            >
                            <select
                                class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                :class="isOptionSelected && 'text-black dark:text-white'"
                                @change="isOptionSelected = true"
                                name="subject_id"
                                id="subject"
                            >
                                <option value="cadeira" class="text-body">
                                -- Selecione a cadeira
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

                        <input type="text" value="{{ $user_id }}" name="user_id" hidden>

                        <div class="flex justify-end gap-4.5">
                          <button
                            class="flex justify-center rounded border border-stroke px-6 py-2 font-medium text-black hover:shadow-1 dark:border-strokedark dark:text-white"
                            type="reset"
                          >
                            Cancel
                          </button>
                          <button
                            class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90"
                            type="submit"
                          >
                            Save
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!v>
          </div>
        </main>
        <!-- ===== Main Content End ===== -->
      </div>
      <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
    <script>
        const firstCourseSelect = document.getElementById('first_course');
        const firstSubjectSelect = document.getElementById('first_subject');
        const courseSelect = document.getElementById('course');
        const subjectSelect = document.getElementById('subject');
        const files_tbody = document.getElementById('files-tbody');
        console.log(files_tbody)

        firstCourseSelect.addEventListener('change', () => {
            fillCourseSelect(firstCourseSelect, firstSubjectSelect);
        });

        firstSubjectSelect.addEventListener('change', () => {
            fetch(`/search_files/${firstSubjectSelect.value}`)
            .then(response => response.json())
            .then(files => {
                files_tbody.innerHTML = ``;
                files.forEach(e => {
                    console.log(e)
                    //${e->description === null ? 'Sem descrição' : $e->description}
                    files_tbody.innerHTML += `
                        <tr>
                            <td class=''>
                                <h5 class='font-medium text-black dark:text-white'>
                                    ${e.file_name}
                                </h5>
                                <p class='text-sm'>
                                    ${e.description === null ? 'Sem descrição' : e.description}
                                </p>
                            </td>
                            <td class="px-2 py-5">
                                <div class="flex items-center space-x-3.5">
                                <button class="hover:text-primary show-file" data-id="${e.id}" data-filename="${d.file_name}" onclick="showFile(this)">
                                    <svg
                                    class="fill-current"
                                    width="18"
                                    height="18"
                                    viewBox="0 0 18 18"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    >
                                    <path
                                        d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                        fill=""
                                    />
                                    <path
                                        d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                        fill=""
                                    />
                                    </svg>
                                </button>
                                <button class="hover:text-primary delete-file">
                                    <svg
                                    class="fill-current"
                                    width="18"
                                    height="18"
                                    viewBox="0 0 18 18"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    >
                                    <path
                                        d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z"
                                        fill=""
                                    />
                                    <path
                                        d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z"
                                        fill=""
                                    />
                                    <path
                                        d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z"
                                        fill=""
                                    />
                                    <path
                                        d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z"
                                        fill=""
                                    />
                                    </svg>
                                </button>
                                <button class="hover:text-primary download-file" data-id="${e.id}" data-filename="${e.file_name}" onclick="downloadFile(this)">
                                    <svg
                                    class="fill-current"
                                    width="18"
                                    height="18"
                                    viewBox="0 0 18 18"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    >
                                    <path
                                        d="M16.8754 11.6719C16.5379 11.6719 16.2285 11.9531 16.2285 12.3187V14.8219C16.2285 15.075 16.0316 15.2719 15.7785 15.2719H2.22227C1.96914 15.2719 1.77227 15.075 1.77227 14.8219V12.3187C1.77227 11.9812 1.49102 11.6719 1.12539 11.6719C0.759766 11.6719 0.478516 11.9531 0.478516 12.3187V14.8219C0.478516 15.7781 1.23789 16.5375 2.19414 16.5375H15.7785C16.7348 16.5375 17.4941 15.7781 17.4941 14.8219V12.3187C17.5223 11.9531 17.2129 11.6719 16.8754 11.6719Z"
                                        fill=""
                                    />
                                    <path
                                        d="M8.55074 12.3469C8.66324 12.4594 8.83199 12.5156 9.00074 12.5156C9.16949 12.5156 9.31012 12.4594 9.45074 12.3469L13.4726 8.43752C13.7257 8.1844 13.7257 7.79065 13.5007 7.53752C13.2476 7.2844 12.8539 7.2844 12.6007 7.5094L9.64762 10.4063V2.1094C9.64762 1.7719 9.36637 1.46252 9.00074 1.46252C8.66324 1.46252 8.35387 1.74377 8.35387 2.1094V10.4063L5.40074 7.53752C5.14762 7.2844 4.75387 7.31252 4.50074 7.53752C4.24762 7.79065 4.27574 8.1844 4.50074 8.43752L8.55074 12.3469Z"
                                        fill=""
                                    />
                                    </svg>
                                </button>
                                </div>
                            </td>
                        </tr>
                    `;
                });
            })
        })

        courseSelect.addEventListener('change', () => {
            fillCourseSelect(courseSelect, subjectSelect);
        })

        function fillCourseSelect(courseSelect, subjectSelect) {
            fetch(`/search_subject/${courseSelect.value}`)
            .then(response => response.json())
            .then(subjects => {
                subjectSelect.innerHTML = `
                    <option value="cadeira" class="text-body">
                        -- Selecione a cadeira
                    </option>
                `;
                subjects.forEach(e => {
                    subjectSelect.innerHTML += `
                        <option value="${e.id}" class="text-body">
                        ${e.name}
                        </option>
                    `
                });
            })
        }

        function showFile(element) {
            const filename = element.dataset.filename;
            window.open(`/file/view/${filename}`, `_blank`);
            // console.log(element.dataset.id)
            // console.log(element.dataset.filename)
        }

        function downloadFile(element) {
            const filename = element.dataset.filename;
            window.location.href = `/file/download/${filename}`;
            // console.log(element.dataset.id)
            // console.log(element.dataset.filename)
        }
    </script>
  </body>
</html>
