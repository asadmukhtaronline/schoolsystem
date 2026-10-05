<?php

namespace App\Http\Livewire\Admin\GeneralSetting;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Databasereset extends Component
{
    public $showModal = false;
    public $password;
    public $processing = false;
    public $progress = 0;

    public function resetDatabase()
    {
        $this->validate([
            'password' => 'required',
        ]);

        if (!Hash::check($this->password, Auth::user()->password)) {
            $this->addError('password', 'Password is incorrect.');
            return;
        }

        $this->processing = true;

        // fake progress bar animation
        for ($i = 10; $i <= 100; $i += 10) {
            $this->progress = $i;
            usleep(200000); // sleep 0.2s for effect
            $this->dispatchBrowserEvent('progress-updated', ['progress' => $i]);
        }

        try {
            // Disable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            // Get all tables
            $tables = DB::select('SHOW TABLES');

            foreach ($tables as $table) {
                $tableName = array_values((array)$table)[0];

                // Skip specific tables
                if (in_array($tableName, ['migrations', 'permissions', 'assignpermissions', 'timetables', 'timeslots', 'days'])) {
                    continue;
                }

                // Special case: role table (delete except id=1)
                if ($tableName === 'roles') {
                    DB::table($tableName)->where('id', '!=', 1)->delete();
                    continue;
                }

                // Check if table exists before truncating
                if (DB::table($tableName)->count() > 0) {
                    DB::table($tableName)->truncate();
                }
            }

            // Re-enable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=1');

            Auth::logout();
            return redirect()->route('login')->with('status', 'Database has been reset!');

        } catch (\Exception $e) {
            // Re-enable foreign key checks even if error occurs
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            $this->processing = false;
            $this->addError('error', 'Failed to reset database: ' . $e->getMessage());
            return;
        }
    }

    public function render()
    {
        return view('livewire.admin.general-setting.databasereset')->layout('Layouts.app');
    }
}