<div>
    <!-- Reset Database Button -->
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-danger text-white text-center">
            <h3 class="mb-0"><i class="fa fa-database"></i> Danger Zone</h3>
        </div>
        <div class="card-body text-center">
            <h5 class="fw-bold text-danger"><i class="fa fa-warning"></i> Warning: Irreversible Action!</h5>
            <p class="text-muted">
                Resetting the database will <strong>permanently delete all data</strong> except essential system records.  
                You will also be logged out immediately after the reset.
            </p>

            <div class="alert alert-warning text-start">
                <i class="fa fa-exclamation-circle"></i>
                <strong> Note:</strong> This action should only be performed by administrators.  
                Please make sure you have backed up your data before proceeding.
            </div>

            <button class="btn btn-md btn-danger px-5 py-3 shadow-sm"
                    wire:click="$set('showModal', true)">
                <i class="fa fa-exclamation-triangle"></i> Reset Database <i wire:loading class="fa fa-spin fa-spinner"></i>
            </button>
        </div>
    </div>
</div>


    <!-- Custom Modal -->
    @if($showModal)
    <div class="custom-modal-overlay">
        <div class="custom-modal">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Database Reset</h5>
                <button type="button" class="btn-close" wire:click="$set('showModal', false)"></button>
            </div>

            <div class="modal-body">
                <p class="text-danger fw-bold">
                    ⚠️ This action will reset the database and log you out. Please enter your password to continue.
                </p>

                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" id="password" wire:model="password" class="form-control">
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                @if($processing)
                    <div class="progress mt-3">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" 
                             role="progressbar" 
                             style="width: {{ $progress }}%">
                            {{ $progress }}%
                        </div>
                    </div>
                @endif
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" wire:click="$set('showModal', false)">Cancel</button>
                <button class="btn btn-danger" wire:click="resetDatabase" @if($processing) disabled @endif wire:confirm="Are you sure? You want to reset complete software.">
                    Reset & Logout <i class="fa fa-spinner fa-spin" wire:loading></i>
                </button>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Custom Modal CSS -->
<style>
.custom-modal-overlay {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.6);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1050;
}
.custom-modal {
    background: #fff;
    width: 500px;
    border-radius: 12px;
    overflow: hidden;
    animation: fadeInDown 0.3s ease;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}
@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
