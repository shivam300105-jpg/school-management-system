<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Permissions - {{ $role->name }}
        </h2>
    </x-slot>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">
                <form method="POST"
                    action="/roles-permissions/{{ $role->id }}">
                        @csrf
                        @method('PUT')
                            <h3 class="text-lg font-bold mb-4">
                                Permissions
                            </h3>

                        @foreach($permissions as $permission)

                            <div class="mb-2">

                                <label>

                                    <input
                                        type="checkbox"
                                        name="permissions[]"
                                        value="{{ $permission->name }}"

                                            {{ $role->hasPermissionTo($permission->name)
                                            ? 'checked'
                                            : '' }}
                                    >

                                    {{ $permission->name }}

                                </label>
                            </div>
                        @endforeach
                        <div class="mt-6">
                            <button
                                type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded">
                                    Update Permissions
                            </button>

                        </div>
                </form>
            </div>

        </div>
    </div>

</x-app-layout>