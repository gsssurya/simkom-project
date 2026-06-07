<aside class="w-[290px] bg-[#111C44] text-white flex flex-col justify-between shrink-0 min-h-screen">
    <div>
        <div class="p-6 flex items-center gap-3 border-b border-[#252F5A]">
            <div class="w-10 h-10 bg-[#FFB800] rounded-xl flex items-center justify-center text-[#111C44]">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM3.86 10.5L12 14.94l8.14-4.44L12 6.06 3.86 10.5zM6 13.11V17c0 1.66 2.69 3 6 3s6-1.34 6-3v-3.89l-6 3.27-6-3.27z"/>
                </svg>
            </div>
            <div>
                <h1 class="font-bold text-lg tracking-wider">SIMKOM</h1>
                <p class="text-xs text-gray-400 font-medium">BENDAHARA ORMAWA</p>
            </div>
        </div>

        <div class="px-6 py-6 flex items-center gap-4">
            <div class="relative w-12 h-12 rounded-full bg-[#FFB800] text-[#111C44] font-bold text-lg flex items-center justify-center shadow-lg">
                MW
                <span class="absolute bottom-0 right-0 w-4 h-4 bg-gray-600 border-2 border-[#111C44] rounded-full flex items-center justify-center text-[8px] text-white">
                    📷
                </span>
            </div>
            <div>
                <h2 class="font-semibold text-sm text-white">Made Wijaya</h2>
                <p class="text-xs text-gray-400">Bendahara Ormawa</p>
            </div>
        </div>

        <nav class="mt-2 space-y-1 px-3">
            <a href="{{ route('dashboard.index') }}" 
            class="flex items-center gap-4 px-4 py-3 rounded-xl transition text-sm {{ request()->routeIs('dashboard.index') ? 'bg-[#1B254B] text-white font-semibold border-l-4 border-[#FFB800]' : 'text-gray-400 hover:bg-[#1B254B] hover:text-white' }}">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.24374 1.74805H2.33055C2.00877 1.74805 1.74791 2.0089 1.74791 2.33068V6.40915C1.74791 6.73093 2.00877 6.99178 2.33055 6.99178H5.24374C5.56552 6.99178 5.82638 6.73093 5.82638 6.40915V2.33068C5.82638 2.0089 5.56552 1.74805 5.24374 1.74805Z" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.6528 1.74805H8.73956C8.41778 1.74805 8.15693 2.0089 8.15693 2.33068V4.0786C8.15693 4.40038 8.41778 4.66123 8.73956 4.66123H11.6528C11.9745 4.66123 12.2354 4.40038 12.2354 4.0786V2.33068C12.2354 2.0089 11.9745 1.74805 11.6528 1.74805Z" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.6528 6.9917H8.73956C8.41778 6.9917 8.15693 7.25255 8.15693 7.57434V11.6528C8.15693 11.9746 8.41778 12.2354 8.73956 12.2354H11.6528C11.9745 12.2354 12.2354 11.9746 12.2354 11.6528V7.57434C12.2354 7.25255 11.9745 6.9917 11.6528 6.9917Z" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5.24374 9.32227H2.33055C2.00877 9.32227 1.74791 9.58312 1.74791 9.9049V11.6528C1.74791 11.9746 2.00877 12.2355 2.33055 12.2355H5.24374C5.56552 12.2355 5.82638 11.9746 5.82638 11.6528V9.9049C5.82638 9.58312 5.56552 9.32227 5.24374 9.32227Z" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <span>Dashboard</span>
            </a>

            <a href="{{ route('info-ormawa.index') }}" 
            class="flex items-center gap-4 px-4 py-3 rounded-xl transition text-sm {{ request()->routeIs('info-ormawa.index') ? 'bg-[#1B254B] text-white font-semibold border-l-4 border-[#FFB800]' : 'text-gray-400 hover:bg-[#1B254B] hover:text-white' }}">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_75_11442)">
                    <path d="M3.49582 12.8178V2.33031C3.49582 2.02126 3.61859 1.72487 3.83713 1.50634C4.05566 1.28781 4.35205 1.16504 4.6611 1.16504H9.3222C9.63125 1.16504 9.92764 1.28781 10.1462 1.50634C10.3647 1.72487 10.4875 2.02126 10.4875 2.33031V12.8178H3.49582Z" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3.49583 6.9917H2.33055C2.0215 6.9917 1.72511 7.11447 1.50658 7.333C1.28805 7.55153 1.16528 7.84792 1.16528 8.15697V11.6528C1.16528 11.9618 1.28805 12.2582 1.50658 12.4768C1.72511 12.6953 2.0215 12.8181 2.33055 12.8181H3.49583" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.4875 5.24365H11.6528C11.9618 5.24365 12.2582 5.36642 12.4767 5.58495C12.6953 5.80349 12.818 6.09988 12.818 6.40893V11.6527C12.818 11.9617 12.6953 12.2581 12.4767 12.4766C12.2582 12.6952 11.9618 12.8179 11.6528 12.8179H10.4875" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5.82637 3.49561H8.15692" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5.82637 5.82617H8.15692" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5.82637 8.15674H8.15692" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5.82637 10.4873H8.15692" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_75_11442">
                    <rect width="13.9833" height="13.9833" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>

                <span>Info Ormawa</span>
            </a>

            <a href="{{ route('input-keuangan.create') }}" 
            class="flex items-center gap-4 px-4 py-3 rounded-xl transition text-sm {{ request()->routeIs('input-keuangan.create') ? 'bg-[#1B254B] text-white font-semibold border-l-4 border-[#FFB800]' : 'text-gray-400 hover:bg-[#1B254B] hover:text-white' }}">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_75_11454)">
                    <path d="M11.0701 4.0786V2.33068C11.0701 2.17616 11.0087 2.02796 10.8995 1.9187C10.7902 1.80943 10.642 1.74805 10.4875 1.74805H2.91319C2.60414 1.74805 2.30775 1.87082 2.08921 2.08935C1.87068 2.30788 1.74791 2.60427 1.74791 2.91332C1.74791 3.22237 1.87068 3.51876 2.08921 3.7373C2.30775 3.95583 2.60414 4.0786 2.91319 4.0786H11.6528C11.8073 4.0786 11.9555 4.13998 12.0647 4.24925C12.174 4.35851 12.2354 4.50671 12.2354 4.66123V6.99178M12.2354 6.99178H10.4875C10.1784 6.99178 9.88203 7.11455 9.6635 7.33309C9.44497 7.55162 9.3222 7.84801 9.3222 8.15706C9.3222 8.46611 9.44497 8.7625 9.6635 8.98103C9.88203 9.19956 10.1784 9.32233 10.4875 9.32233H12.2354C12.3899 9.32233 12.5381 9.26095 12.6474 9.15168C12.7566 9.04242 12.818 8.89422 12.818 8.7397V7.57442C12.818 7.4199 12.7566 7.2717 12.6474 7.16243C12.5381 7.05317 12.3899 6.99178 12.2354 6.99178Z" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M1.74791 2.91309V11.07C1.74791 11.3791 1.87068 11.6755 2.08921 11.894C2.30775 12.1125 2.60414 12.2353 2.91319 12.2353H11.6528C11.8073 12.2353 11.9555 12.1739 12.0647 12.0646C12.174 11.9554 12.2354 11.8072 12.2354 11.6526V9.3221" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_75_11454">
                    <rect width="13.9833" height="13.9833" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>

                <span>Input Keuangan</span>
            </a>
            
            <a href="{{ route('laporan.index') }}" 
            class="flex items-center gap-4 px-4 py-3 rounded-xl transition text-sm {{ request()->routeIs('laporan.*') ? 'bg-[#1B254B] text-white font-semibold border-l-4 border-[#FFB800]' : 'text-gray-400 hover:bg-[#1B254B] hover:text-white' }}">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_75_11461)">
                    <path d="M8.73956 1.16504H3.49583C3.18678 1.16504 2.89038 1.28781 2.67185 1.50634C2.45332 1.72487 2.33055 2.02126 2.33055 2.33031V11.6525C2.33055 11.9616 2.45332 12.258 2.67185 12.4765C2.89038 12.695 3.18678 12.8178 3.49583 12.8178H10.4875C10.7965 12.8178 11.0929 12.695 11.3114 12.4765C11.53 12.258 11.6528 11.9616 11.6528 11.6525V4.07823L8.73956 1.16504Z" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8.15693 1.16504V3.49559C8.15693 3.80464 8.2797 4.10103 8.49823 4.31956C8.71676 4.53809 9.01315 4.66086 9.3222 4.66086H11.6528" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5.82638 5.24365H4.6611" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.3222 7.57422H4.6611" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.3222 9.90479H4.6611" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_75_11461">
                    <rect width="13.9833" height="13.9833" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>

                <span>Laporan</span>
            </a>
            
            <a href="{{ route('log-aktivitas.index') }}" 
            class="flex items-center gap-4 px-4 py-3 rounded-xl transition text-sm {{ request()->routeIs('log-aktivitas.index') ? 'bg-[#1B254B] text-white font-semibold border-l-4 border-[#FFB800]' : 'text-gray-400 hover:bg-[#1B254B] hover:text-white' }}">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_75_11471)">
                    <path d="M8.73956 6.9917H5.82637" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8.73956 4.66113H5.82637" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.0701 9.90497V2.91332C11.0701 2.60427 10.9473 2.30788 10.7288 2.08935C10.5103 1.87082 10.2139 1.74805 9.90484 1.74805H2.33055" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M4.6611 12.2355H11.6528C11.9618 12.2355 12.2582 12.1128 12.4767 11.8942C12.6953 11.6757 12.818 11.3793 12.818 11.0702V10.4876C12.818 10.3331 12.7566 10.1849 12.6474 10.0756C12.5381 9.96636 12.3899 9.90497 12.2354 9.90497H6.40901C6.25449 9.90497 6.10629 9.96636 5.99703 10.0756C5.88776 10.1849 5.82638 10.3331 5.82638 10.4876V11.0702C5.82638 11.3793 5.70361 11.6757 5.48507 11.8942C5.26654 12.1128 4.97015 12.2355 4.6611 12.2355ZM4.6611 12.2355C4.35205 12.2355 4.05566 12.1128 3.83713 11.8942C3.6186 11.6757 3.49583 11.3793 3.49583 11.0702V2.91332C3.49583 2.60427 3.37306 2.30788 3.15452 2.08935C2.93599 1.87082 2.6396 1.74805 2.33055 1.74805C2.0215 1.74805 1.72511 1.87082 1.50658 2.08935C1.28805 2.30788 1.16528 2.60427 1.16528 2.91332V4.0786C1.16528 4.23312 1.22666 4.38132 1.33593 4.49058C1.44519 4.59985 1.59339 4.66123 1.74791 4.66123H3.49583" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_75_11471">
                    <rect width="13.9833" height="13.9833" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>

                <span>Log Aktivitas</span>
            </a>

            <a href="{{ route('profile.index') }}" 
            class="flex items-center gap-4 px-4 py-3 rounded-xl transition text-sm {{ request()->routeIs('profile.*') ? 'bg-[#1B254B] text-white font-semibold border-l-4 border-[#FFB800]' : 'text-gray-400 hover:bg-[#1B254B] hover:text-white' }}">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.0701 12.2356V11.0703C11.0701 10.4522 10.8246 9.85941 10.3875 9.42235C9.95045 8.98529 9.35766 8.73975 8.73956 8.73975H5.24374C4.62564 8.73975 4.03285 8.98529 3.59579 9.42235C3.15873 9.85941 2.91319 10.4522 2.91319 11.0703V12.2356" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.99165 6.40915C8.27878 6.40915 9.3222 5.36572 9.3222 4.0786C9.3222 2.79147 8.27878 1.74805 6.99165 1.74805C5.70452 1.74805 4.6611 2.79147 4.6611 4.0786C4.6611 5.36572 5.70452 6.40915 6.99165 6.40915Z" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <span>Profil</span>
            </a>
        </nav>
    </div>

    <div class="p-4 border-t border-[#252F5A]">
        <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-xl text-red-400 hover:bg-red-950/30 transition font-medium text-sm">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.24374 12.2355H2.91319C2.60414 12.2355 2.30775 12.1128 2.08921 11.8942C1.87068 11.6757 1.74791 11.3793 1.74791 11.0702V2.91332C1.74791 2.60427 1.87068 2.30788 2.08921 2.08935C2.30775 1.87082 2.60414 1.74805 2.91319 1.74805H5.24374" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.3222 9.90499L12.2354 6.9918L9.3222 4.07861" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.2354 6.9917H5.24374" stroke="white" stroke-opacity="0.8" stroke-width="1.16527" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            Logout
        </a>
    </div>
</aside>