<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Section
        </h2>
    </x-slot>

<div class="py-6">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow-md rounded-lg p-6">

            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Add Section
            </h2>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/sections" method="POST">

                @csrf

                <div class="mb-4">

                    <label class="block text-gray-700 font-medium mb-2">
                        Select Class
                    </label>

                    <select
                        name="class_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                        <option value="">
                            Select Class
                        </option>

                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">
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
                        placeholder="Enter Section Name"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                </div>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg"
                >
                    Save Section
                </button>

            </form>

        </div>

    </div>
</div>
</x-app-layout>