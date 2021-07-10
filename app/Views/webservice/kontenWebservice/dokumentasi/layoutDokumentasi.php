<?= $this->extend('webservice/layoutWebservice/templateWebserviceLogin.php'); ?>

<?= $this->section('content'); ?>

<div class="w-full">
    <div class="flex w-full h-full relative">
        <div id="sidebarDok" class="md:top-20 sm:top-16 top-11 bottom-0 xl:w-80 lg:w-64 lg:left-0 -left-64 w-64 transition-all duration-500 easy-out md:-mt-20 sm:-mt-16 -mt-11 fixed z-20 bg-primarySidebar">
            <!-- start sidebar posisi buka -->

            <img src="/img/components/logo/logo_sia.png" class="md:w-20 sm:w-16 w-10 md:mb-1.5 md:mt-2.5 my-2 mx-auto" alt="Logo SIA">
            <div class="text-secondary text-xl font-bold mb-3 text-center">DOKUMENTASI</div>
            <form class="flex justify-center mt-2 mb-5 h-9 relative w-full" id="f1" name="f1" action="">
                <input type="text" name="search" class="input w-5/6 pl-2 pr-8 border-2 rounded-lg border-gray-400 md:text-base outline-none text-gray-500 focus:border-secondary" spellcheck="false" id="search" placeholder="Pencarian">
                <button type="submit" class="relative right-8 flex items-center text-gray-500">
                    <svg class="absolute text-gray-500 hover:text-gray-600 w-7 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>

            <div class="flex justify-center items-center text-secondary bg-primaryHover md:text-xl font-bold py-3">
                <div class="flex items-center cursor-pointer" onclick="location.href='/developer';">
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <path d="M0.778756 9.95506C0.626631 9.95354 0.478292 9.90744 0.352104 9.82246C0.225917 9.73749 0.127423 9.61737 0.068816 9.47698C0.0102093 9.33658 -0.00593613 9.18209 0.0223786 9.03261C0.0506934 8.88314 0.122225 8.74525 0.228117 8.63602L8.6277 0.236433C8.77022 0.0897825 8.96457 0.00489081 9.16901 7.13166e-09C9.37535 -2.78609e-05 9.57332 0.081619 9.71965 0.2271L18.1192 8.62669C18.2653 8.77272 18.3473 8.9708 18.3473 9.17733C18.3473 9.38385 18.2653 9.58193 18.1192 9.72797C17.9732 9.874 17.7751 9.95605 17.5686 9.95605C17.3621 9.95605 17.164 9.874 17.018 9.72797L9.16901 1.86657L1.3294 9.73419C1.18225 9.87768 0.984278 9.95709 0.778756 9.95506Z" fill="#FFAA00" />
                            <path d="M12.9261 18H5.42869C4.56534 17.9967 3.73847 17.6515 3.12916 17.0398C2.51984 16.4282 2.17773 15.6 2.17773 14.7366V7.02145C2.17773 6.81518 2.25967 6.61736 2.40553 6.47151C2.55138 6.32565 2.7492 6.24371 2.95547 6.24371C3.16174 6.24371 3.35956 6.32565 3.50542 6.47151C3.65127 6.61736 3.73321 6.81518 3.73321 7.02145V14.7366C3.73321 15.1896 3.91315 15.624 4.23345 15.9443C4.39204 16.1029 4.58032 16.2287 4.78754 16.3145C4.99475 16.4004 5.21684 16.4445 5.44113 16.4445H12.9385C13.3872 16.438 13.8152 16.2552 14.1302 15.9356C14.4451 15.616 14.6216 15.1853 14.6216 14.7366V7.02145C14.6216 6.81518 14.7035 6.61736 14.8494 6.47151C14.9952 6.32565 15.193 6.24371 15.3993 6.24371C15.6056 6.24371 15.8034 6.32565 15.9493 6.47151C16.0951 6.61736 16.177 6.81518 16.177 7.02145V14.7366C16.1771 15.6 15.8349 16.4282 15.2256 17.0398C14.6163 17.6515 13.7894 17.9967 12.9261 18Z" fill="#FFAA00" />
                            <path d="M11.3553 15.2002H6.99991C6.89766 15.2006 6.79635 15.1807 6.7018 15.1418C6.60725 15.1029 6.52135 15.0456 6.44905 14.9733C6.37675 14.901 6.31948 14.8151 6.28054 14.7205C6.2416 14.626 6.22176 14.5247 6.22217 14.4224V12.2914C6.22217 11.5076 6.53355 10.7559 7.08779 10.2016C7.64204 9.64737 8.39376 9.336 9.17758 9.336C9.96141 9.336 10.7131 9.64737 11.2674 10.2016C11.8216 10.7559 12.133 11.5076 12.133 12.2914V14.4224C12.1334 14.5247 12.1136 14.626 12.0746 14.7205C12.0357 14.8151 11.9784 14.901 11.9061 14.9733C11.8338 15.0456 11.7479 15.1029 11.6534 15.1418C11.5588 15.1807 11.4575 15.2006 11.3553 15.2002ZM7.77765 13.6447H10.5775V12.2914C10.5775 11.9201 10.43 11.564 10.1675 11.3015C9.90495 11.039 9.54887 10.8915 9.17758 10.8915C8.8063 10.8915 8.45022 11.039 8.18768 11.3015C7.92515 11.564 7.77765 11.9201 7.77765 12.2914V13.6447Z" fill="#FFAA00" />
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="18.3546" height="18" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="ml-2">SIA WEB SERVICE</p>
                </div>

            </div>

            <div class="mr-4 mt-5" id="menuDok">
                <a href="#memintaData">
                    <div class="pl-7 rounded-r-lg md:text-xl text-secondary font-semibold mb-1 md:py-1.5 py-1 hover:bg-primary">
                        Meminta Data
                    </div>
                </a>
                <div class="text-secondary relative mb-1">
                    <div id="side-drop-down" class="select-none cursor-pointer md:py-1.5 py-1 pl-5 rounded-r-lg flex justify-between items-center pr-4 md:text-xl font-semibold hover:bg-primary">
                        <p class="px-2 cursor-pointer">Data</p>
                        <img src="/img/components/icon/drop-down.svg" class="transform transition-all duration-300" alt="icon drop-down">
                    </div>
                    <div class="text-white transition-all duration-300 easy-out absolute overflow-hidden open-submenu w-full">
                        <a href="#dataUser">
                            <div class="pl-12 md:py-1 py-0.5 rounded-r-lg md:text-lg hover:bg-primary">
                                Detail User
                            </div>
                        </a>
                        <a href="#dataAlumni">
                            <div class="pl-12 md:py-1 py-0.5 rounded-r-lg md:text-lg hover:bg-primary">
                                Detail Alumni
                            </div>
                        </a>
                        <a href="#dataListAlumni">
                            <div class="pl-12 md:py-1 py-0.5 rounded-r-lg md:text-lg hover:bg-primary">
                                Daftar Detail Alumni
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end sidebar posisi buka -->

        </div>

        <!-- content edit di sini -->
        <div class="xl:mx-4 lg:mx-0 relative w-full xl:left-72 lg:left-64 -left-4 transition-all duration-500 easy-out xl:ml-10 xl:mr-80 xl:pr-2 lg:mr-72 ">
            <?php $this->renderSection('dokumentasi'); ?>
        </div>
        <!-- end content edit -->
    </div>

</div>
<?= $this->endSection(); ?>