<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Parents Management
        </h2>
    </x-slot>

<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow-md rounded-lg p-6">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold text-gray-800">
                    All Parents
                </h2>

                <a href="/parents/create"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    + Add Parent
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
                            <th class="px-4 py-3 text-left">Student</th>
                            <th class="px-4 py-3 text-left">Class</th>
                            <th class="px-4 py-3 text-left">Section</th>
                            <th class="px-4 py-3 text-left">Father Name</th>
                            <th class="px-4 py-3 text-left">Mother Name</th>
                            <th class="px-4 py-3 text-left">Phone</th>
                            <th class="px-4 py-3 text-left">Edit</th>
                            <th class="px-4 py-3 text-left">Delete</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($parents as $parent)

                        <tr class="border-t">

                            <td class="px-4 py-3">
                                {{ $parent->student->name ?? 'N/A' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $parent->student->schoolClass->name ?? 'N/A' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $parent->student->section->name ?? 'N/A' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $parent->father_name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $parent->mother_name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $parent->phone }}
                            </td>

                            <td class="px-4 py-3">

                                <a href="/parents/{{ $parent->id }}/edit"
                                   class="text-blue-600 hover:underline">
                                    Edit
                                </a>

                            </td>

                            <td class="px-4 py-3">

                                <form action="/parents/{{ $parent->id }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Are you sure you want to delete this parent?')"
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