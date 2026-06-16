<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Roles & Permissions
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <h3 class="text-lg font-bold mb-4">
                    Available Roles
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    @foreach($roles as $role)

        <div class="bg-white border rounded-xl shadow p-5">

            <div class="flex justify-between items-center mb-4">

                <h3 class="text-xl font-bold">
                    {{ $role->name }}
                </h3>

                <a
                    href="/roles-permissions/{{ $role->id }}/edit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">

                    Edit
                </a>

            </div>

            <div class="flex flex-wrap gap-2">

                @foreach($role->permissions as $permission)

                    <span
                        class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">

                        {{ $permission->name }}

                    </span>

                @endforeach

            </div>

        </div>

    @endforeach

</div>

            </div>

        </div>
    </div>

</x-app-layout>