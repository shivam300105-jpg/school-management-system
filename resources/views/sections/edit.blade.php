<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Section
        </h2>
    </x-slot>

<div class="py-6">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow-md rounded-lg p-6">

            <form action="/sections/{{ $section->id }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label class="block text-gray-700 font-medium mb-2">
                        Select Class
                    </label>

                    <select
                        name="class_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2"
                    >

                        @foreach($classes as $class)

                            <option
                                value="{{ $class->id }}"
                                {{ $class->id == $section->class_id ? 'selected' : '' }}
                            >
                                {{ $class->name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-4">

                    <label class="block text-gray-700 font-medium mb-2">
                        Section Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ $section->name }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2"
                    >

                </div>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg"
                >
                    Update Section
                </button>

            </form>

        </div>

    </div>
</div>
</x-app-layout>