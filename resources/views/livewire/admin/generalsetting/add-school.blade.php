@section('title', 'Add School')
<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .stepper-wrapper {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 30px;
            border-bottom: 3px solid #ccc;
        }

        .stepper-item {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        .stepper-item::before {
            position: absolute;
            content: "";
            border-bottom: 2px solid #ccc;
            width: 100%;
            top: 20px;
            left: -50%;
            z-index: 2;
        }

        .stepper-item::after {
            position: absolute;
            content: "";
            border-bottom: 2px solid #ccc;
            width: 100%;
            top: 20px;
            left: 50%;
            z-index: 2;
        }

        .stepper-item .step-counter {
            position: relative;
            z-index: 5;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #ccc;
            margin-bottom: 6px;
        }

        .stepper-item.active {
            font-weight: bold;
        }

        .stepper-item.completed .step-counter {
            background-color: #17a2b8;
        }

        .stepper-item.completed::after {
            position: absolute;
            content: "";
            border-bottom: 2px solid #17a2b8;
            width: 100%;
            top: 20px;
            left: 50%;
            z-index: 3;
        }

        .stepper-item:first-child::before {
            content: none;
        }

        .stepper-item:last-child::after {
            content: none;
        }

        .form-control {
            border-radius: 0px;
        }

        .n2 {
            color: green;
            font-size: 72px;
        }

        .terms-container {
            margin: 20px 0;
            padding: 10px;
            border-radius: 5px;
        }

        .terms-container h5 {
            margin-top: 0;
        }

        .terms-container textarea {
            width: 100%;
            height: 150px;
            margin-bottom: 10px;
            resize: none;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .loading-spinner {
            display: none;
            justify-content: center;
            align-items: center;
            height: 100%;
            
        }

        .loading-spinner.show {
            display: flex;
        }
    </style>
    <div class="container" style="padding:1%;">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <i class="fa fa-plus-circle"></i>
                        @if($n == 0)
                        Create Your School
                        @else
                        Principal Details
                        @endif
                        <div wire:loading class="float-right">
                            <i class="fa fa-spinner fa-spin"></i>
                        </div>
                    </div>
                    <div class="text-center pt-4">
                        <div class="stepper-wrapper">
                            <div class="stepper-item {{ $n >= 0 ? 'completed' : '' }}">
                                <div class="step-counter text-light">1</div>
                                Add Your School Information
                            </div>
                            <div class="stepper-item {{ $n >= 1 ? 'completed' : '' }}">
                                <div class="step-counter text-light">2</div>
                                Add School Principle/Owner Details
                            </div>
                            <div class="stepper-item {{ $n >= 2 ? 'active' : '' }}">
                                <div class="step-counter text-light">3</div>
                                Please Agree With Terms And Conditions
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-0" style="height: dvh;">
                        <div>
                            @if($n == 0)
                            @include('livewire.admin.generalsetting.school-form')
                            @elseif ($n == 1)
                            @include('livewire.admin.generalsetting.principal-form')
                            @elseif($n == 2)
                            @include('livewire.admin.generalsetting.terms&conditions')
                            @endif
                        </div>
                    </div>
                    @if($n == 0) 
                    <div class="card-footer bg-info text-white">
                        <button type="button" wire:click="nextStep" class="btn btn-danger btn-sm float-right m-2">
                            Next Step <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                    @elseif ($n == 1)
                    <div class="card-footer bg-info text-white">
                        <button type="button" wire:click="prevStep" class="btn btn-danger btn-sm float-left m-2">
                            <i class="fa fa-arrow-left"></i> Previous Step
                        </button>
                        <button type="button" wire:click="nextStep" class="btn btn-danger btn-sm float-right m-2">
                            Next Step <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                    @else
                    <div class="card-footer bg-info text-white">
                        <button type="button" wire:click="prevStep" class="btn btn-danger btn-sm float-left m-2">
                            <i class="fa fa-arrow-left"></i> Previous Step
                        </button>
                        <button type="button" id="save-button" wire:click="save" class="btn btn-warning float-right btn-sm m-2">
                            <div wire:loading><i class="fa fa-spinner fa-spin"></i> </div><i class="fa fa-save"></i>  Start Installation
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
