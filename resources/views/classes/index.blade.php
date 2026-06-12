<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Classes
        </h2>
    </x-slot>

<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow-md rounded-lg p-6">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold text-gray-800">
                    All Classes
                </h2>

                <a href="/classes/create"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    + Add Class
                </a>

            </div>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">

                <table class="min-w-full border border-gray-200">

                    <thead class="bg-gray-100">

                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Class Name</th>
                            <th class="px-4 py-3 text-left">Edit</th>
                            <th class="px-4 py-3 text-left">Delete</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($classes as $class)

                        <tr class="border-t">

                            <td class="px-4 py-3">
                                {{ $class->id }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $class->name }}
                            </td>

                            <td class="px-4 py-3">

                                <a href="/classes/{{ $class->id }}/edit"
                                   class="text-blue-600 hover:underline">
                                    Edit
                                </a>

                            </td>

                            <td class="px-4 py-3">

                                <form action="/classes/{{ $class->id }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Are you sure?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</div>

</x-app-layout>