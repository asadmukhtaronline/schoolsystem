<?php

namespace App\Http\Livewire\Admin\Generalsetting;

use Livewire\Component;
use App\Models\GeneralSetting;
use App\Models\Branch;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class AddSchool extends Component
{   
    use WithFileUploads;

    // Properties for School
    public $name;
    public $n = 0;
    public $email;
    public $alternative_email;
    public $whatsapp;
    public $landline;
    public $website;
    public $address;
    public $photo;
    public $city;
    public $country;
    public $state;
    public $post_code;

    // Properties for Principal
    public $fullname;
    public $principal_email;
    public $principal_whatsapp;
    public $alternative_contact;
    public $principal_address;
    public $principal_city;
    public $principal_country;
    public $principal_photo;

    public $acceptTerms;
    public $principal_designation;

    public function mount()
    {
        $downloader = GeneralSetting::first();

        if (!empty($downloader)) {
            return redirect(route('login'));
        }
    }

    public function render()
    {
        return view('livewire.admin.generalsetting.add-school')->layout('Layouts.guest');
    }

    public function nextStep()
    {
         if ($this->n == 0) {
        $this->validate([
            'name' => 'required', 'email'=>'required|email', 'whatsapp'=>'required', 'address'=>'required'
            // only step-1 rules
            ]);
        } elseif ($this->n == 1) {
            $this->validate([
            'fullname'=>'required','principal_email'=>'required|email','principal_whatsapp'=>'required',
            'principal_designation' => 'required',
            ]);
        }
        $this->n++;
    }

    public function prevStep()
    {
        $this->n--;
    }

    public function save()
    {
            try {
                    $this->validate([
                        // Step 1 - School Information
                        'name' => 'required|string|max:255',
                        'email' => 'required|email|max:255',
                        'whatsapp' => 'required',
                        'landline' => 'nullable',
                        'website' => 'nullable',
                        'alternative_email' => 'nullable|email|max:255',
                        'address' => 'required|string|max:255',
                        'photo' => 'required|image|max:1024',
                        'city' => 'required|string|max:255',
                        'state' => 'required|string|max:255',
                        'post_code' => 'required|string|max:255',
                        'country' => 'required|string|max:255',

                        // Step 2 - Principal Information
                        'principal_photo' => 'required',
                        'fullname' => 'required',
                        'principal_email' => 'required|email',
                        'principal_whatsapp' => 'required',
                        'alternative_contact' => 'nullable',
                        'principal_city' => 'required',
                        'principal_designation' => 'required',
                        'principal_country' => 'required|string|max:255',
                        'principal_address' => 'required|string|max:255',
                        // add any other validated fields here (eg. 'institute_name')
                    ]);
                } catch (\Illuminate\Validation\ValidationException $e) {

                    // Which fields failed?
                    $failedFields = array_keys($e->validator->errors()->toArray());

                    // Define which fields belong to which step
                    $step1 = ['name','email','whatsapp','address','city','state','post_code','country','photo'];
                    $step2 = ['fullname','principal_email','principal_whatsapp','principal_city','principal_designation','principal_country','principal_address','principal_photo','alternative_contact','institute_name'];

                    if (count(array_intersect($failedFields, $step1)) > 0) {
                        $this->n = 0;
                    } elseif (count(array_intersect($failedFields, $step2)) > 0) {
                        $this->n = 1;
                    } else {
                        $this->n = 2;
                    }

                    // Populate Livewire error bag so @error() receives messages
                    foreach ($e->validator->errors()->getMessages() as $field => $messages) {
                        foreach ($messages as $message) {
                            $this->addError($field, $message);
                        }
                    }

                    // Optional: scroll to top
                    $this->dispatchBrowserEvent('scrollToTop');

                    // Stop further execution (do not re-throw)
                    return;
                }


        // --- If validation passes, continue with your save logic ---
       // dd('worker');
        // Emit progress bar start event
        $this->dispatchBrowserEvent('startProgressBar');

        // Save School
        $photoPath = $this->photo ? $this->photo->store('photos', 'public') : null;

        $school = new GeneralSetting;
        $school->name = $this->name;
        $school->email = $this->email;
        $school->whatsapp = $this->whatsapp;
        $school->landline = $this->landline;
        $school->website = $this->website;
        $school->address = $this->address;
        $school->photo = $photoPath;
        $school->city = $this->city;
        $school->state = $this->state;
        $school->post_code = $this->post_code;
        $school->country = $this->country;
        $school->save();

        // Save Branch Details
        $branch = new Branch;
        $branch->name = $this->name;
        $branch->campus_name = 'Main Branch';
        $branch->landline = $this->landline;
        $branch->location = $this->address;
        $branch->city = $this->city;
        $branch->country = $this->country;

        //Principal Details
        $principalPhotoPath = $this->principal_photo ? $this->principal_photo->store('photos/principal', 'public') : null;
        
        $branch->principal_photo = $principalPhotoPath;
        $branch->fullname = $this->fullname;
        $branch->principal_email = $this->principal_email;
        $branch->principal_whatsapp = $this->principal_whatsapp;
        $branch->alternative_contact = $this->alternative_contact;
        $branch->principal_city = $this->principal_city;
        $branch->principal_country = $this->principal_country;
        $branch->principal_address = $this->principal_address;
        $branch->save();
        
        $branchId = $branch->id;
        
        //User Create
        $user = new User;
        $user->image = $principalPhotoPath;
        $user->name = $this->fullname;
        $user->phone = $this->principal_whatsapp;
        $user->email = $this->principal_email;
        $user->password = Hash::make('12344321');
        $user->is_admin = '1';
        $user->role_id = '1';
        $user->branch_id = $branchId;
        $user->save();

        // Success Notification
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'School saved successfully!'
        ]);
        
        // Reset properties 
        $this->reset([
            'name', 'email', 'whatsapp', 'landline', 'website', 'address', 'photo', 'city', 'state', 'post_code', 'country',
            'fullname', 'principal_email', 'principal_whatsapp', 'alternative_contact', 'principal_address', 'principal_city', 'principal_country', 'principal_photo'
        ]);

        return redirect()->route('login');

    }
}