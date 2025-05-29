<x-layouts>
    <x-slot:heading>
        Edit Job : {{ $job->title }}
    </x-slot:heading>
    <form action="{{ route('jobs.update', ['job' => $job->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Job Info</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Edit your job details</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="title" id="title" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Jon Doe" value="{{ $job->title }}">
                            </div>
                            @error('title')
                                 <p class="mt-3 text-sm/6 text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea name="description" id="description" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Description please...">{{ $job->description }}</textarea>
                        </div>
                        @error('description')
                             <p class="mt-3 text-sm/6 text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="number" name="salary" id="salary" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="100000" value="{{ $job->salary }}">
                            </div>
                            @error('salary')
                                 <p class="mt-3 text-sm/6 text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="employer_id" class="block text-sm/6 font-medium text-gray-900">Company Id</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                               <select name="employer_id">
                                   @foreach($employers as $employer)
                                       <option value="{{ $employer->id }}" {{ ($employer->id === $job->employer_id) ? "selected" : ''}}>{{ $employer->id }}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('jobs.show', ['job' => $job->id])}}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <button form="delete_form" type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
    </form>
    <form action="{{ route('jobs.destroy', ['job' => $job->id]) }}" method="POST" id="delete_form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layouts>
