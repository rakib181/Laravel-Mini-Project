<x-layouts>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach($jobs as $job)
            <a class="block px-4 py-6 border border-b-gray-200 rounded-lg"
               href="{{ route('jobs.show', ['job' => $job->id]) }}">
                <p class="font-bold  text-red-800">{{ $job->employer->name }}</p>
                <strong class="myClass">{{ $job->title}}</strong> : pays {{ $job->salary }} per
                year</a>
        @endforeach
        <div class="block px-4 py-6 border border-gray-500 rounded-lg">
            {{ $jobs->links() }}
        </div>
    </div>
</x-layouts>
