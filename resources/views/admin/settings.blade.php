
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Conta | Dziva Ngutu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body
    x-data="{ page: 'settings', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
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
          <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
              <!-- Breadcrumb Start -->
              <div
                class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
              >
                <h2 class="text-title-md2 font-bold text-black dark:text-white">
                  Minha conta
                </h2>

                <nav>
                  <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="{{ route('index') }}">Inicio /</a>
                    </li>
                    <li class="font-medium text-primary">Conta</li>
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
                      class="border-b border-stroke px-7 py-4 dark:border-strokedark"
                    >
                      <h3 class="font-medium text-black dark:text-white">
                        Informação Pessoal
                      </h3>
                    </div>
                    <div class="p-7">
                      <form action="#">
                        <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
                          <div class="w-full sm:w-1/2">
                            <label
                              class="mb-3 block text-sm font-medium text-black dark:text-white"
                              for="fullName"
                              >Nome Completo</label
                            >
                            <div class="relative">
                              <span class="absolute left-4.5 top-4">
                                <svg
                                  class="fill-current"
                                  width="20"
                                  height="20"
                                  viewBox="0 0 20 20"
                                  fill="none"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <g opacity="0.8">
                                    <path
                                      fill-rule="evenodd"
                                      clip-rule="evenodd"
                                      d="M3.72039 12.887C4.50179 12.1056 5.5616 11.6666 6.66667 11.6666H13.3333C14.4384 11.6666 15.4982 12.1056 16.2796 12.887C17.061 13.6684 17.5 14.7282 17.5 15.8333V17.5C17.5 17.9602 17.1269 18.3333 16.6667 18.3333C16.2064 18.3333 15.8333 17.9602 15.8333 17.5V15.8333C15.8333 15.1703 15.5699 14.5344 15.1011 14.0655C14.6323 13.5967 13.9964 13.3333 13.3333 13.3333H6.66667C6.00363 13.3333 5.36774 13.5967 4.8989 14.0655C4.43006 14.5344 4.16667 15.1703 4.16667 15.8333V17.5C4.16667 17.9602 3.79357 18.3333 3.33333 18.3333C2.8731 18.3333 2.5 17.9602 2.5 17.5V15.8333C2.5 14.7282 2.93899 13.6684 3.72039 12.887Z"
                                      fill=""
                                    />
                                    <path
                                      fill-rule="evenodd"
                                      clip-rule="evenodd"
                                      d="M9.99967 3.33329C8.61896 3.33329 7.49967 4.45258 7.49967 5.83329C7.49967 7.214 8.61896 8.33329 9.99967 8.33329C11.3804 8.33329 12.4997 7.214 12.4997 5.83329C12.4997 4.45258 11.3804 3.33329 9.99967 3.33329ZM5.83301 5.83329C5.83301 3.53211 7.69849 1.66663 9.99967 1.66663C12.3009 1.66663 14.1663 3.53211 14.1663 5.83329C14.1663 8.13448 12.3009 9.99996 9.99967 9.99996C7.69849 9.99996 5.83301 8.13448 5.83301 5.83329Z"
                                      fill=""
                                    />
                                  </g>
                                </svg>
                              </span>
                              <input
                                class="w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                type="text"
                                name="fullName"
                                id="fullName"
                                placeholder="Seu nome"
                                value="{{ $user->name.' '.$user->lastname }}"
                              />
                            </div>
                          </div>

                          <div class="w-full sm:w-1/2">
                            <label
                              class="mb-3 block text-sm font-medium text-black dark:text-white"
                              for="phoneNumber"
                              >{{ $user->role === 'admin' ? 'Privilegio' : 'Ocupação'}}</label
                            >
                            <input
                              class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                              type="text"
                              id="phoneNumber"
                              value="{{ $user->role === 'admin' ? $user->role : $user->type }}"
                            />
                          </div>
                        </div>

                        <div class="mb-5.5">
                          <label
                            class="mb-3 block text-sm font-medium text-black dark:text-white"
                            for="emailAddress"
                            >Endereço de Email</label
                          >
                          <div class="relative">
                            <span class="absolute left-4.5 top-4">
                              <svg
                                class="fill-current"
                                width="20"
                                height="20"
                                viewBox="0 0 20 20"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <g opacity="0.8">
                                  <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M3.33301 4.16667C2.87658 4.16667 2.49967 4.54357 2.49967 5V15C2.49967 15.4564 2.87658 15.8333 3.33301 15.8333H16.6663C17.1228 15.8333 17.4997 15.4564 17.4997 15V5C17.4997 4.54357 17.1228 4.16667 16.6663 4.16667H3.33301ZM0.833008 5C0.833008 3.6231 1.9561 2.5 3.33301 2.5H16.6663C18.0432 2.5 19.1663 3.6231 19.1663 5V15C19.1663 16.3769 18.0432 17.5 16.6663 17.5H3.33301C1.9561 17.5 0.833008 16.3769 0.833008 15V5Z"
                                    fill=""
                                  />
                                  <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M0.983719 4.52215C1.24765 4.1451 1.76726 4.05341 2.1443 4.31734L9.99975 9.81615L17.8552 4.31734C18.2322 4.05341 18.7518 4.1451 19.0158 4.52215C19.2797 4.89919 19.188 5.4188 18.811 5.68272L10.4776 11.5161C10.1907 11.7169 9.80879 11.7169 9.52186 11.5161L1.18853 5.68272C0.811486 5.4188 0.719791 4.89919 0.983719 4.52215Z"
                                    fill=""
                                  />
                                </g>
                              </svg>
                            </span>
                            <input
                              class="w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                              type="email"
                              name="email"
                              id="emailAddress"
                              placeholder="devidjond45@gmail.com"
                              value="{{ $user->email }}"
                            />
                          </div>
                        </div>

                        <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
                            <div class="w-full sm:w-1/2">
                              <label
                                class="mb-3 block text-sm font-medium text-black dark:text-white"
                                for="Username"
                                >Faculdade</label
                              >
                              <input
                                class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                type="text"
                                name="Username"
                                id="Username"
                                placeholder="A faculdade a qual pertence"
                                value=""
                              />
                            </div>
                            <div class="w-full sm:w-1/2">
                                <label
                                  class="mb-3 block text-sm font-medium text-black dark:text-white"
                                  for="Username"
                                  >Curso</label
                                >
                                <input
                                  class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                  type="text"
                                  name="Username"
                                  id="Username"
                                  placeholder="O curso que frequenta"
                                  value=""
                                />
                            </div>
                        </div>

                        <div class="flex justify-end gap-4.5">
                          <button
                            class="flex justify-center rounded border border-stroke px-6 py-2 font-medium text-black hover:shadow-1 dark:border-strokedark dark:text-white"
                            type="submit"
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
                <div class="col-span-5 xl:col-span-2">
                  <div
                    class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
                  >
                    <div
                      class="border-b border-stroke px-7 py-4 dark:border-strokedark"
                    >
                      <h3 class="font-medium text-black dark:text-white">
                        Resetar Password
                      </h3>
                    </div>
                    <div class="p-7">
                      <form action="#">

                        <div class="mb-5.5">
                          <label
                            class="mb-3 block text-sm font-medium text-black dark:text-white"
                            for="Username"
                            >Passord Atual</label
                          >
                          <input
                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                            type="password"
                            name="current_password"
                            id="current_password"
                            placeholder="****"
                            value=""
                          />
                        </div>

                        <div class="mb-5.5">
                          <label
                            class="mb-3 block text-sm font-medium text-black dark:text-white"
                            for="Username"
                            >Passord Nova</label
                          >
                          <input
                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                            type="password"
                            name="password"
                            id="password"
                            placeholder="****"
                            value=""
                          />
                        </div>

                        <div class="mb-5.5">
                          <label
                            class="mb-3 block text-sm font-medium text-black dark:text-white"
                            for="Username"
                            >Confirme Password</label
                          >
                          <input
                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                            type="password"
                            name="password_confirmation"
                            id="password_confirmationZ"
                            placeholder="****"
                            value=""
                          />
                        </div>

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
              <!-- ====== Settings Section End -->
            </div>
          </div>
        </main>
        <!-- ===== Main Content End ===== -->
      </div>
      <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
  </body>
</html>
