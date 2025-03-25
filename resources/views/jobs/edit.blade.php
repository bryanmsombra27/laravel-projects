{{-- @extends("layout")

@section("title")
Create Job
@endsection

@section("content")
    <h1><?=$title ?></h1>


    <form action="/jobs" method="POST" >
        @csrf

        <input type="text" name="title" placeholder="enter title...">
        <input type="text" name="description" placeholder="enter description...">
        <input type="text" name="name" placeholder="enter name...">
   
        <button type="submit">Submit</button>
    </form>

@endsection --}}

<x-layout>
    <div
    class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl"
>
    <h2 class="text-4xl text-center font-bold mb-4">
       Edit Job Listing
    </h2>
    <form
        method="POST"
        {{-- action="{{route('jobs.edit')}}" --}}
        action="{{route('jobs.update',$job->id)}}"
        enctype="multipart/form-data"
    >
    @csrf
    @method("PUT")

        <h2
            class="text-2xl font-bold mb-6 text-center text-gray-500"
        >
            Job Info
        </h2>

      <x-inputs.text
        name="title"
        label="Job Title"
        placeholder="Software Engineer"
        :value="old('title',$job->title)"
      />

      <x-inputs.text-area
        name="description"
        label="Job Description"
        placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team..."
        :value="old('description',$job->description)"
        />
        <x-inputs.text
        name="salary"
        type="number"
        label="Annual Salary"
        placeholder="90000"
        :value="old('salary',$job->salary)"
      />

      <x-inputs.text-area
        name="requirements"
        label="Requirements"
        placeholder="Bachelor's degree in Computer Science"
        :value="old('requirements',$job->requirements)"
      />
      <x-inputs.text-area
        name="benefits"
        label="Benefits"
        placeholder="Health insurance, 401k, paid time off"
        :value="old('benefits',$job->benefits)"
      />

      <x-inputs.text
        name="tags"
        label="Tags (comma-separated)"
        placeholder="development,coding,java,python"
        :value="old('tags',$job->tags)"
      />
        
        
      <x-inputs.select
        name="job_type"
        label="Job Type"
        :options="[
        'Full-Time'=> 'Full-Time',
        'Part-Time' =>'Part-Time',
        'Contract'=>'Contract',
        'Temporary'=>'Temporary',
        'Internship'=>'Internship',
        'Volunteer'=>'Volunteer',
        'On-Call'=>'On-Call',
        ]"
        value="{{old('job_type',$job->title)}}"
      />

        <x-inputs.select
            name="remote"
            label="Remote"
            :options="[
            0 => 'No',
            1 => 'Yes',
            ]"
            :value="old('remote',$job->remote)"
        />

    

        <x-inputs.text
        name="address"
        label="Address"
        placeholder="123 Main St"
        :value="old('address',$job->address)"
      />
        <x-inputs.text
        name="city"
        label="City"
        placeholder="Albany"
        :value="old('city',$job->city)"
      />
        <x-inputs.text
        name="state"
        label="State"
        placeholder="NY"
        :value="old('state',$job->state)"
      />
        <x-inputs.text
        name="zipcode"
        label="Zip Code"
        placeholder="12201"
        :value="old('zipcode',$job->zipcode)"
      />
        <h2
            class="text-2xl font-bold mb-6 text-center text-gray-500"
        >
            Company Info
        </h2>

        <x-inputs.text
        name="company_name"
        label="Company Name"
        placeholder="Company name"
        :value="old('company_name',$job->company_name)"
      />

      <x-inputs.text-area
      name="company_description"
      label="Company Description"
      placeholder="Company Description"
      :value="old('company_description',$job->company_description)"
    />
        <x-inputs.text
        name="company_website"
        type="url"
        label="Company Website"
        placeholder="Enter website"
        :value="old('company_website',$job->company_website)"
      />
        <x-inputs.text
        name="contact_phone"
        label="Contact Phone"
        placeholder="Enter phone"
        :value="old('contact_phone',$job->contact_phone)"
      />
        <x-inputs.text
        name="contact_email"
        label="Contact Email"
        placeholder="Email where you want to receive applications"
        :value="old('contact_email',$job->contact_email)"
      />
    <x-inputs.file
        label="Company Logo"
        name="company_logo"
    />
  

        <button
            type="submit"
            class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none"
        >
            Save
        </button>
    </form>
</div>
    





</x-layout>