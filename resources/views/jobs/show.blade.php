<x-layouts>
    <x-slot:heading>
        Job Page
    </x-slot:heading>
    <h1 class="text-blue-500">{{ $job->title }}</h1>
    <p>Description : {{ $job->description }}</p>
    <p>Salary : {{ $job->salary}}</p>
    <p>Employer ID : {{ $job->employer_id }}</p>

    @can('edit', $job)
        <div class="mt-5 sm:flex gap-5 sm:justify-end">
            <x-button href="{{ route('jobs.edit', ['job' => $job->id]) }}">Edit Job</x-button>
        </div>
    @endcan
</x-layouts>
