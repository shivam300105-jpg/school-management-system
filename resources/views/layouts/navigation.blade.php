<nav
    x-data="{ open: false, scrolled: false }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 20
        })
    "
:class="scrolled
? 'sticky top-0 z-50 border-b border-gray-200 bg-white/80 backdrop-blur-sm shadow-sm'
: 'sticky top-0 z-50 bg-white border-b border-gray-100'"
>
    
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
@if(auth()->user()->role == 'admin')
    <a href="{{ route('admin.dashboard') }}">
@endif

@if(auth()->user()->role == 'student')
    <a href="/student/dashboard">
@endif

@if(auth()->user()->role == 'staff')
    <a href="/staff/dashboard">
@endif

@if(auth()->user()->role == 'parent')
    <a href="/parent/dashboard">
@endif

    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />

</a>
                </div>

                <!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
@if(auth()->user()->role == 'admin')
    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
        Dashboard
    </x-nav-link>

    @can('manage_classes')
<x-nav-link
    :href="url('/classes')"
    :active="request()->is('classes*')">
    Classes
</x-nav-link>
    @endcan

    @can('manage_sections')
<x-nav-link
    :href="url('/sections')"
    :active="request()->is('sections*')">
    Sections
</x-nav-link>
    @endcan

    @can('manage_students')
<x-nav-link
    :href="url('/students')"
    :active="request()->is('students*')">
    Students
</x-nav-link>
    @endcan

@can('manage_staff')
<x-nav-link
    :href="url('/staff')"
    :active="request()->is('staff*')">
    Staff
</x-nav-link>
@endcan

@can('manage_parents')
<x-nav-link
    :href="url('/parents')"
    :active="request()->is('parents*')">
    Parents
</x-nav-link>
@endcan

@can('manage_fees')
<x-nav-link
    :href="url('/fees')"
    :active="request()->is('fees*')">
    Fees
</x-nav-link>
@endcan

@can('manage_leaves')
<x-nav-link
    :href="url('/leaves')"
    :active="request()->is('leaves*')">
    Leave Requests
</x-nav-link>
@endcan

@can('view_reports')
<div class="relative inline-block group">

<button
    class="inline-flex items-center h-full text-sm font-medium hover:text-gray-700
    {{ request()->is('reports/*')
        ? 'border-b-2 border-indigo-500 text-gray-900'
        : 'text-gray-500' }}">

    Reports

    <svg
        class="ml-1 h-4 w-4"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24">

        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"/>

    </svg>

</button>

    <div
        class="absolute left-0 hidden group-hover:block bg-white shadow-lg rounded-md w-48 z-50">

        <a href="/reports/students"
           class="block px-4 py-2 hover:bg-gray-100">
            Student Report
        </a>

        <a href="/reports/fees"
           class="block px-4 py-2 hover:bg-gray-100">
            Fees Report
        </a>

        <a href="/reports/leaves"
           class="block px-4 py-2 hover:bg-gray-100">
            Leave Report
        </a>

    </div>

</div>
@endcan

<x-nav-link
    :href="url('/roles-permissions')"
    :active="request()->is('roles-permissions*')">

    Roles & Permissions

</x-nav-link>


    @endif

    @if(auth()->user()->role == 'student')

<x-nav-link
    href="/student/dashboard"
    :active="request()->is('student/dashboard')">
    Dashboard
</x-nav-link>

@can('view_profile')
<x-nav-link
    href="/user/profile"
    :active="request()->is('user/profile')">
    My Profile
</x-nav-link>
@endcan

@can('view_leave_history')
<x-nav-link
    href="/my-leaves"
    :active="request()->is('my-leaves')">
    My Leaves
</x-nav-link>
@endcan

@can('view_fees')
<x-nav-link
    href="/my-fees"
    :active="request()->is('my-fees')">
    My Fees
</x-nav-link>
@endcan

@endif

@if(auth()->user()->role == 'staff')

<x-nav-link
    href="/staff/dashboard"
    :active="request()->is('staff/dashboard')">
    Dashboard
</x-nav-link>

<x-nav-link
    href="/staff/profile"
    :active="request()->is('staff/profile')">
    My Profile
</x-nav-link>

<x-nav-link
    href="/my-leaves"
    :active="request()->is('my-leaves')">
    My Leaves
</x-nav-link>

@can('manage_students')
<x-nav-link href="/students">
    Students
</x-nav-link>
@endcan

@can('manage_fees')
<x-nav-link href="/fees">
    Fees
</x-nav-link>
@endcan

@can('manage_classes')
<x-nav-link href="/classes">
    Classes
</x-nav-link>
@endcan

@can('manage_sections')
<x-nav-link href="/sections">
    Sections
</x-nav-link>
@endcan

@can('manage_staff')
<x-nav-link href="/staff">
    Staff
</x-nav-link>
@endcan

@can('manage_parents')
<x-nav-link href="/parents">
    Parents
</x-nav-link>
@endcan

@can('view_reports')
<x-nav-link href="/reports/students">
    Reports
</x-nav-link>
@endcan

@endif


@if(auth()->user()->role == 'parent')

<x-nav-link
    href="/parent/dashboard"
    :active="request()->is('parent/dashboard')">
    Dashboard
</x-nav-link>

@can('view_fees')
<x-nav-link
    :href="url('/my-fees')"
    :active="request()->is('my-fees')"
>
    Fees
</x-nav-link>
@endcan

<x-nav-link
    :href="url('/parent/leaves')"
    :active="request()->is('parent/leaves')"
>
    Leaves
</x-nav-link>

@can('view_profile')
<x-nav-link
    :href="url('/parent/profile')"
    :active="request()->is('parent/profile')"
>
    My Profile
</x-nav-link>
@endcan


@endif
</div>  

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        {{--
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                            --}}
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

@if(auth()->user()->role == 'admin')

    <x-responsive-nav-link :href="route('admin.dashboard')">
        Dashboard
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="url('/classes')">
        Classes
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="url('/sections')">
        Sections
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="url('/students')">
        Students
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="url('/staff')">
        Staff
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="url('/parents')">
        Parents
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="url('/fees')">
        Fees
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="url('/leaves')">
        Leave Requests
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="url('/reports/students')">
        Student Report
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="url('/reports/fees')">
        Fees Report
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="url('/reports/leaves')">
        Leave Report
    </x-responsive-nav-link>

@endif

@if(auth()->user()->role == 'student')

    <x-responsive-nav-link href="/student/dashboard">
        Dashboard
    </x-responsive-nav-link>

    <x-responsive-nav-link href="/user/profile">
        My Profile
    </x-responsive-nav-link>

    <x-responsive-nav-link href="/my-leaves">
        My Leaves
    </x-responsive-nav-link>

    <x-responsive-nav-link href="/my-fees">
        My Fees
    </x-responsive-nav-link>

@endif


@if(auth()->user()->role == 'staff')

<x-responsive-nav-link href="/staff/dashboard">
    Dashboard
</x-responsive-nav-link>

<x-responsive-nav-link href="/staff/profile">
    My Profile
</x-responsive-nav-link>

<x-responsive-nav-link href="/my-leaves">
    My Leaves
</x-responsive-nav-link>

@endif

@if(auth()->user()->role == 'parent')

<x-responsive-nav-link href="/parent/dashboard">
    Dashboard
</x-responsive-nav-link>

<x-responsive-nav-link href="/user/profile">
    My Profile
</x-responsive-nav-link>

@endif

</div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                {{--
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                    --}}
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
