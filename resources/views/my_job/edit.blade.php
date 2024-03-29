<x-layout>
    <x-breadcrumbs :links="[
            'My Jobs' => route('my-jobs.index'),
            'Edit Job' => '#'
        ]" class="mb-4"
    />
    <x-card class="mb-8">
        <form action="{{route('my-jobs.update', $job)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" :value="$job->title"/>
                </div>
                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" :value="$job->location"/>
                </div>
                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" :value="$job->salary"/>
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input name="description" type="textarea" :value="$job->description"/>
                </div>
                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group :all-option="false" name="experience" 
                    :options="array_combine(
                        array_map('ucfirst', \App\Models\Job::$experience),\App\Models\Job::$experience
                    )" 
                    :value="$job->experience"/>
                </div>
                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group :all-option="false" name="category" 
                    :options="\App\Models\Job::$category" 
                    :value="$job->category" />
                </div>
            </div>
            <x-button class="w-full">Edit Job Vacancy</x-button>
        </form>
    </x-card>
</x-layout>