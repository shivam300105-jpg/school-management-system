<div class="space-y-6">

    <!-- Profile Header -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg shadow-lg p-8">

        <h1 class="text-3xl font-bold">
            {{ $name }}
        </h1>

        <p class="mt-2 text-blue-100">
            {{ $role }}
        </p>

    </div>

    <!-- Information -->
    <div class="bg-white rounded-lg shadow p-6">

        <h3 class="text-xl font-bold mb-4 border-b pb-2">
            Profile Information
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            @foreach($details as $label => $value)

                <div>
                    <p class="text-sm text-gray-500">
                        {{ $label }}
                    </p>

                    <p class="font-semibold">
                        {{ $value }}
                    </p>
                </div>

            @endforeach

        </div>

    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @foreach($actions as $action)

            <a
                href="{{ $action['url'] }}"
                class="bg-blue-600 text-white rounded-lg p-6 shadow hover:shadow-lg transition">

                <h3 class="text-xl font-bold">
                    {{ $action['title'] }}
                </h3>

                <p class="mt-2">
                    {{ $action['description'] }}
                </p>

            </a>

        @endforeach

    </div>

</div>