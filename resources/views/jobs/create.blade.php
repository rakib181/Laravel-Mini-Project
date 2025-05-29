<x-layouts>
    <x-slot:heading>
        Create a New Job
    </x-slot:heading>
    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Job Info</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Give us your job details</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="title" id="title" placeholder="Jon Doe" required/>
                            <x-form-error name="title"/>
                        </div>
                    </x-form-field>

                    <div class="col-span-full">
                        <x-form-label for="description">Description</x-form-label>
                        <x-form-textarea name="description" id="description" rows="3" placeholder="Description please..."></x-form-textarea>
                        <x-form-error name="description"/>
                    </div>
                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="number" name="salary" id="salary" placeholder="100000" requierd/>
                            <x-form-error name="salary"/>
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="employer_id">Company ID</x-form-label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                               <select name="employer_id">
                                   @foreach($employers as $employer)
                                       <option>{{ $employer->id }}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('jobs.index') }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <x-form-button>ADD</x-form-button>
        </div>
    </form>
</x-layouts>
