<div class="terms-container">
    <h5>Terms and Conditions</h5>
    <div class="terms-text">
        <p><strong>Terms and Conditions for WebEducatorz School Management System!</strong></p>

        <p><strong>1. Introduction</strong></p>
        <p>Welcome to WebEducatorz School Management System! These Terms and Condition govern your use of our services, including the creation of a school and the establishment of the first owner/principal account. By creating a school and registering the initial owner/principal, you agree to abide by these Terms. Please read them carefully.</p>

        <p><strong>2. Creation of School</strong></p>
        <p>By creating a school in our system, you acknowledge and agree to the following:</p>
        <ul>
            <li><strong>Irrevocability of Information:</strong> The data provided during the initial school creation process, including the school name, address, and contact details, will be considered final and cannot be changed after submission. Please ensure all information is accurate and complete before finalizing the creation process.</li>
            <li><strong>Designation of Main Branch:</strong> The first school created will be designated as the main branch if multiple branches are established in the future. This designation is permanent and serves as the primary point of reference for all administrative purposes.</li>
        </ul>

        <p><strong>3. Creation of Owner/Principal Account</strong></p>
        <p>When setting up the first owner/principal account, you agree to the following:</p>
        <ul>
            <li><strong>Irrevocability of Account Information:</strong> The details entered for the initial owner/principal, including name, contact information, and role, are final and cannot be modified after submission. Ensure that the provided information is correct and up-to-date.</li>
            <li><strong>Primary Role:</strong> The first owner/principal will hold primary administrative authority for the school and will be responsible for managing all aspects of the school’s administration.</li>
        </ul>

        <p><strong>4. User Responsibilities</strong></p>
        <ul>
            <li><strong>Accuracy of Information:</strong> You are responsible for providing accurate and truthful information during the school and owner/principal setup process. Any discrepancies or errors in the information provided are your responsibility.</li>
            <li><strong>System Use:</strong> You agree to use the School Management System in compliance with all applicable laws and regulations and to adhere to the guidelines and best practices provided by [School Management System Name].</li>
        </ul>

        <p><strong>5. Changes and Updates</strong></p>
        <ul>
            <li><strong>Data Changes:</strong> Due to the permanent nature of the initial data, please verify all information carefully before finalizing the setup. We are not responsible for any issues arising from incorrect information provided during the initial setup.</li>
            <li><strong>Service Updates:</strong> We reserve the right to update or modify our services and these Terms from time to time. Any significant changes will be communicated to you, and continued use of the system constitutes acceptance of any updated Terms.</li>
        </ul>

        <p><strong>6. Limitation of Liability</strong></p>
        <p>WebEducatorz School Management System! shall not be liable for any direct, indirect, incidental, or consequential damages arising from errors or issues related to the initial setup of the school or owner/principal account.</p>

        <p><strong>7. Contact Information</strong></p>
        <p>If you have any questions or need assistance regarding these Terms or the setup process, please contact our support team at [support email/phone number].</p>

        <p>By proceeding with the creation of a school and owner/principal account, you acknowledge that you have read, understood, and agreed to these Terms and Conditions.</p>

        <p><strong>---</strong></p>

        <p>These Terms are effective as of Today.</p>

        <p><strong>WebEducatorz School Management System!</strong><br>
        [Company Address]<br>
        [Website URL]</p>
    </div>
    <div class="form-check">
        <input class="form-check-input mx-1" type="checkbox" id="acceptTerms" wire:model="acceptTerms">
        <label class="form-check-label" for="acceptTerms">
            I have read and agree to the Terms and Conditions
        </label>
    </div>
    @error('acceptTerms') <span class="text-danger">{{ $message }}</span> @enderror
</div>
