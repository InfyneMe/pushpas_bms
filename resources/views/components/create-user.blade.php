<div class="bg-white shadow-sm border-0 p-0 mb-5" style="border-radius: 20px; overflow: hidden;">
    <!-- Enhanced Header -->
    <div class="p-4 border-bottom" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="me-3 p-2 rounded-circle"
                    style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);">
                    <svg width="25" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>
                <div>
                    <h2 class="h4 fw-bold text-dark mb-0">Create New User</h2>
                    <p class="text-muted mb-0 small">Add a new team member to your organization</p>
                </div>
            </div>
            <button id="toggleForm" class="btn btn-light shadow-sm d-flex align-items-center"
                style="border-radius: 12px; border: 1px solid #e2e8f0;">
                <svg id="toggleIcon" class="me-2" width="16" height="16" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" style="transition: transform 0.3s ease;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                    </path>
                </svg>
                <span id="toggleText" class="fw-medium small">Collapse</span>
            </button>
        </div>
    </div>

    <div id="createForm" class="p-0" style="transition: all 0.4s ease;">
        <form action="{{ route('user.store') }}" method="POST" class="p-4">
            @csrf
            <!-- Progress Indicator -->
            <div class="px-4 pt-4 pb-2">
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-primary me-2">Step 1</span>
                    <small class="text-muted">Personal & Account Information</small>
                </div>
                <div class="progress mb-4" style="height: 4px; border-radius: 4px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; border-radius: 4px;">
                    </div>
                </div>
            </div>

            <!-- System Access Alert -->
            <div class="mx-4 mb-4">
                <div class="alert alert-info border-0 rounded-3 d-flex align-items-center"
                    style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);">
                    <div class="me-3 p-2 rounded-circle bg-primary bg-opacity-20">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#dbeafe"
                            stroke-width="2">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 16v-4" />
                            <path d="M12 8h.01" />
                        </svg>
                    </div>
                    <div>
                        <h6 class="mb-1 fw-semibold text-primary">Full System Access</h6>
                        <p class="mb-0 small text-primary">The user being created will have access to all BMS
                            system functionality including purchases, sales, HSD management, vendors, clients,
                            crushers, products, and accounting features.</p>
                    </div>
                </div>
            </div>

            <!-- Add this right after the System Access Alert section -->
            @if (session('success'))
                <div class="mx-4 mb-4">
                    <div class="alert alert-success border-0 rounded-3 d-flex align-items-center"
                        style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);">
                        <div class="me-3 p-2 rounded-circle bg-success bg-opacity-20">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#10b981"
                                stroke-width="2">
                                <path d="M20 6L9 17l-5-5" />
                            </svg>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-semibold text-success">Success!</h6>
                            <p class="mb-0 small text-success">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mx-4 mb-4">
                    <div class="alert alert-danger border-0 rounded-3 d-flex align-items-center"
                        style="background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);">
                        <div class="me-3 p-2 rounded-circle bg-danger bg-opacity-20">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ef4444"
                                stroke-width="2">
                                <path d="M18 6L6 18" />
                                <path d="M6 6l12 12" />
                            </svg>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-semibold text-danger">Validation Errors</h6>
                            <div class="mb-0 small text-danger">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <!-- Personal Information Section -->
            <div class="mx-4 mb-4 p-4 rounded-3" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                <div class="d-flex align-items-center mb-3">
                    <div class="p-1 me-2 rounded-circle"
                        style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                        <svg width="21" height="19" viewBox="0 0 24 24" fill="none" stroke="white"
                            stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </div>
                    <h5 class="mb-0 fw-semibold text-dark">Personal Information</h5>
                </div>

                <div class="row g-3">
                    <!-- First Name -->
                    <div class="col-md-6">
                        <label for="first_name" class="form-label fw-medium text-dark small">
                            First Name <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" style="border-color: #e2e8f0;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="#6b7280" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </span>
                            <input type="text"
                            id="first_name"
                            name="first_name"
                            class="form-control border-start-0 @error('first_name') is-invalid @enderror"
                            style="border-color: #e2e8f0; border-radius: 0 10px 10px 0; padding: 12px 16px;"
                            placeholder="Enter first name"
                            value="{{ old('first_name') }}">
                        </div>
                        @error('first_name')
                            <div class="invalid-feedback d-block">
                                <small class="text-danger">{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div class="col-md-6">
                        <label for="last_name" class="form-label fw-medium text-dark small">
                            Last Name <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" style="border-color: #e2e8f0;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="#6b7280" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </span>
                            <input type="text"
                                id="last_name"
                                name="last_name"
                                class="form-control border-start-0 @error('last_name') is-invalid @enderror"
                                style="border-color: #e2e8f0; border-radius: 0 10px 10px 0; padding: 12px 16px;"
                                placeholder="Enter last name"
                                value="{{ old('last_name') }}">
                        </div>
                        @error('last_name')
                            <div class="invalid-feedback d-block">
                                <small class="text-danger">{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <label for="email" class="form-label fw-medium text-dark small">
                            Email Address <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" style="border-color: #e2e8f0;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="#6b7280" stroke-width="2">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                            </span>
                            <input type="email"
                            id="email"
                            name="email"
                            class="form-control border-start-0 @error('email') is-invalid @enderror"
                            style="border-color: #e2e8f0; border-radius: 0 10px 10px 0; padding: 12px 16px;"
                            placeholder="user@company.com"
                            value="{{ old('email') }}"
                            required>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                <small class="text-danger">{{ $message }}</small>
                            </div>
                        @enderror
                        <div class="form-text text-muted small">We'll use this for account notifications</div>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6">
                        <label for="phone" class="form-label fw-medium text-dark small">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" style="border-color: #e2e8f0;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="#6b7280" stroke-width="2">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                            </span>
                            <input type="tel"
                            id="phone"
                            name="phone"
                            class="form-control border-start-0 @error('phone') is-invalid @enderror"
                            style="border-color: #e2e8f0; border-radius: 0 10px 10px 0; padding: 12px 16px;"
                            placeholder="+1 (555) 000-0000"
                            value="{{ old('phone') }}"
                            pattern="[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}">
                        </div>
                        @error('phone')
                            <div class="invalid-feedback d-block">
                                <small class="text-danger">{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Account Security Section -->
            <div class="mx-4 mb-4 p-4 rounded-3" style="background-color: #fef7ff; border: 1px solid #e879f9;">
                <div class="d-flex align-items-center mb-3">
                    <div class="p-1 me-2 rounded-circle"
                        style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white"
                            stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                            <circle cx="12" cy="16" r="1" />
                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                        </svg>
                    </div>
                    <h5 class="mb-0 fw-semibold text-dark">Account Security</h5>
                </div>

                <div class="row g-3">
                    <!-- Password Field -->
                    <!-- Password Field -->
                    <div class="col-md-6">
                        <label for="password" class="form-label fw-medium text-dark small">
                            Password <span class="text-danger">*</span>
                        </label>
                        <div class="position-relative">
                            <input type="password" id="password" name="password" class="form-control"
                                style="border-color: #e2e8f0; border-radius: 12px; padding: 14px 100px 14px 16px; font-size: 15px;"
                                placeholder="Enter secure password">

                            <!-- Bootstrap validation feedback icon (positioned further left) -->
                            <div class="valid-feedback-icon position-absolute top-50 translate-middle-y d-none"
                                style="right: 55px; z-index: 5;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="#10b981" stroke-width="2">
                                    <path d="M20 6L9 17l-5-5" />
                                </svg>
                            </div>

                            <div class="invalid-feedback-icon position-absolute top-50 translate-middle-y d-none"
                                style="right: 55px; z-index: 5;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="#ef4444" stroke-width="2">
                                    <path d="M18 6L6 18" />
                                    <path d="M6 6l12 12" />
                                </svg>
                            </div>

                            <!-- Eye Toggle Button (positioned at the far right) -->
                            <button type="button" class="btn p-0 position-absolute top-50 end-0 translate-middle-y"
                                id="togglePassword" style="border: none; background: none; z-index: 10; right: 14px;">
                                <svg id="eyeIcon" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="#6b7280" stroke-width="2"
                                    style="transition: all 0.2s ease;">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>

                        <!-- Password Strength Indicator -->
                        <div class="mt-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-muted fw-medium">Password Strength</small>
                                <small id="strengthText" class="text-muted fw-medium">Enter password</small>
                            </div>
                            <div class="progress"
                                style="height: 6px; border-radius: 10px; background-color: #f1f5f9;">
                                <div id="strengthBar" class="progress-bar" role="progressbar"
                                    style="width: 0%; transition: all 0.4s ease; border-radius: 10px;"></div>
                            </div>
                        </div>

                        <!-- Password Requirements -->
                        <div class="mt-3 p-3 rounded-3" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                            <div class="small text-muted fw-medium mb-2">Password Requirements:</div>
                            <div class="row g-1">
                                <div class="col-6">
                                    <div id="req-length" class="small text-muted d-flex align-items-center">
                                        <span class="requirement-icon me-2 text-center"
                                            style="width: 16px; font-size: 12px;">○</span>
                                        8+ characters
                                    </div>
                                    <div id="req-uppercase" class="small text-muted d-flex align-items-center mt-1">
                                        <span class="requirement-icon me-2 text-center"
                                            style="width: 16px; font-size: 12px;">○</span>
                                        Uppercase letter
                                    </div>
                                    <div id="req-lowercase" class="small text-muted d-flex align-items-center mt-1">
                                        <span class="requirement-icon me-2 text-center"
                                            style="width: 16px; font-size: 12px;">○</span>
                                        Lowercase letter
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div id="req-number" class="small text-muted d-flex align-items-center">
                                        <span class="requirement-icon me-2 text-center"
                                            style="width: 16px; font-size: 12px;">○</span>
                                        Number
                                    </div>
                                    <div id="req-special" class="small text-muted d-flex align-items-center mt-1">
                                        <span class="requirement-icon me-2 text-center"
                                            style="width: 16px; font-size: 12px;">○</span>
                                        Special character
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label fw-medium text-dark small">
                            Confirm Password <span class="text-danger">*</span>
                        </label>
                        <div class="position-relative">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control"
                                style="border-color: #e2e8f0; border-radius: 12px; padding: 14px 100px 14px 16px; font-size: 15px;"
                                placeholder="Confirm your password">

                            <!-- Bootstrap validation feedback icon -->
                            <div class="valid-feedback-icon-confirm position-absolute top-50 translate-middle-y d-none"
                                style="right: 55px; z-index: 5;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="#10b981" stroke-width="2">
                                    <path d="M20 6L9 17l-5-5" />
                                </svg>
                            </div>

                            <div class="invalid-feedback-icon-confirm position-absolute top-50 translate-middle-y d-none"
                                style="right: 55px; z-index: 5;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="#ef4444" stroke-width="2">
                                    <path d="M18 6L6 18" />
                                    <path d="M6 6l12 12" />
                                </svg>
                            </div>

                            <!-- Eye Toggle Button -->
                            <button type="button" class="btn p-0 position-absolute top-50 end-0 translate-middle-y"
                                id="toggleConfirmPassword"
                                style="border: none; background: none; z-index: 10; right: 15px;">
                                <svg id="eyeIconConfirm" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="#6b7280" stroke-width="2"
                                    style="transition: all 0.2s ease;">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>

                        <!-- Password Match Indicator -->
                        <div id="passwordMatch" class="mt-3 p-3 rounded-3"
                            style="display: none; border: 1px solid #e2e8f0;">
                            <div class="d-flex align-items-center">
                                <span id="matchIcon" class="me-2 fw-bold"></span>
                                <span id="matchText" class="small fw-medium"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Action Buttons -->
            <div class="px-4 py-4 border-top" style="background-color: #fafbfc;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="send_invite" checked>
                        <label class="form-check-label small text-muted" for="send_invite">
                            Send invitation email to user
                        </label>
                    </div>
                    <div class="d-flex gap-3">
                        <button type="button" class="btn btn-light border px-4" style="border-radius: 10px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" class="me-2">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                            Cancel
                        </button>
                        <button type="button" class="btn btn-outline-primary px-4" style="border-radius: 10px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" class="me-2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            Preview
                        </button>
                        <button type="submit" class="btn btn-primary px-4 shadow-sm" style="border-radius: 10px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" class="me-2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <polyline points="22,4 12,14.01 9,11.01" />
                            </svg>
                            Create User
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<style>
    #togglePassword,
    #toggleConfirmPassword {
        right: 30px !important;
        /* Moved 15px to the left */
    }

    /* Ensure validation icons don't overlap */
    .valid-feedback-icon,
    .invalid-feedback-icon,
    .valid-feedback-icon-confirm,
    .invalid-feedback-icon-confirm {
        right: 70px !important;
    }

    .form-control {
        padding-right: 115px !important;
    }

    /* Override Bootstrap's default validation icons positioning */
    .form-control:not(.is-invalid):not(.is-valid)~.valid-feedback-icon,
    .form-control:not(.is-invalid):not(.is-valid)~.invalid-feedback-icon,
    .form-control:not(.is-invalid):not(.is-valid)~.valid-feedback-icon-confirm,
    .form-control:not(.is-invalid):not(.is-valid)~.invalid-feedback-icon-confirm {
        display: none !important;
    }

    .form-control.is-valid~.valid-feedback-icon,
    .form-control.is-valid~.valid-feedback-icon-confirm {
        display: block !important;
    }

    .form-control.is-invalid~.invalid-feedback-icon,
    .form-control.is-invalid~.invalid-feedback-icon-confirm {
        display: block !important;
    }

    /* Hide Bootstrap's built-in validation icons */
    .form-control.is-valid {
        background-image: none !important;
        border-color: #10b981;
        box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.15);
    }

    .form-control.is-invalid {
        background-image: none !important;
        border-color: #ef4444;
        box-shadow: 0 0 0 0.2rem rgba(239, 68, 68, 0.15);
    }

    .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.15);
    }

    /* Eye icon hover effects */
    button:hover svg {
        stroke: #3b82f6 !important;
        transform: scale(1.05);
    }

    /* Requirement indicators */
    .requirement-met {
        color: #10b981 !important;
    }

    .requirement-met .requirement-icon {
        color: #ffffff;
        background-color: #10b981;
        border-radius: 50%;
        width: 16px;
        height: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .requirement-icon {
        font-weight: bold;
        transition: all 0.3s ease;
        font-size: 10px;
    }

    /* Password match styles */
    .password-match {
        background-color: #f0fdf4 !important;
        border-color: #10b981 !important;
        color: #10b981;
    }

    .password-no-match {
        background-color: #fef2f2 !important;
        border-color: #ef4444 !important;
        color: #ef4444;
    }

    /* Strength indicator colors */
    .strength-weak {
        background: linear-gradient(90deg, #ef4444 0%, #f87171 100%);
    }

    .strength-fair {
        background: linear-gradient(90deg, #f97316 0%, #fb923c 100%);
    }

    .strength-good {
        background: linear-gradient(90deg, #eab308 0%, #facc15 100%);
    }

    .strength-strong {
        background: linear-gradient(90deg, #10b981 0%, #34d399 100%);
    }

    /* Input field animations */
    .form-control {
        transition: all 0.3s ease;
    }

    /* Mobile responsive adjustments */
    @media (max-width: 768px) {
        .col-md-6:first-child {
            margin-bottom: 1.5rem;
        }

        .form-control {
            padding: 12px 90px 12px 14px !important;
        }

        .valid-feedback-icon,
        .invalid-feedback-icon,
        .valid-feedback-icon-confirm,
        .invalid-feedback-icon-confirm {
            right: 50px !important;
        }

        button[id^="toggle"] {
            right: 10px !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');
        const togglePasswordBtn = document.getElementById('togglePassword');
        const toggleConfirmPasswordBtn = document.getElementById('toggleConfirmPassword');
        const eyeIcon = document.getElementById('eyeIcon');
        const eyeIconConfirm = document.getElementById('eyeIconConfirm');
        const strengthBar = document.getElementById('strengthBar');
        const strengthText = document.getElementById('strengthText');
        const passwordMatch = document.getElementById('passwordMatch');
        const matchIcon = document.getElementById('matchIcon');
        const matchText = document.getElementById('matchText');
        const createUserBtn = document.querySelector('button[type="submit"]');

        // Validation icon elements
        const validIcon = document.querySelector('.valid-feedback-icon');
        const invalidIcon = document.querySelector('.invalid-feedback-icon');
        const validIconConfirm = document.querySelector('.valid-feedback-icon-confirm');
        const invalidIconConfirm = document.querySelector('.invalid-feedback-icon-confirm');

        // Password requirements elements
        const requirements = {
            length: document.getElementById('req-length'),
            uppercase: document.getElementById('req-uppercase'),
            lowercase: document.getElementById('req-lowercase'),
            number: document.getElementById('req-number'),
            special: document.getElementById('req-special')
        };

        // Eye icons SVG paths
        const eyeOpenSvg = `
        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
        <circle cx="12" cy="12" r="3"/>
    `;

        const eyeClosedSvg = `
        <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
        <line x1="1" y1="1" x2="23" y2="23"/>
    `;

        // Toggle password visibility function
        function togglePasswordVisibility(input, eyeIcon) {
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            eyeIcon.innerHTML = type === 'text' ? eyeClosedSvg : eyeOpenSvg;
        }

        // Password toggle event listeners
        togglePasswordBtn.addEventListener('click', function() {
            togglePasswordVisibility(passwordInput, eyeIcon);
        });

        toggleConfirmPasswordBtn.addEventListener('click', function() {
            togglePasswordVisibility(confirmPasswordInput, eyeIconConfirm);
        });

        // Password strength checker
        function checkPasswordStrength(password) {
            let score = 0;
            const checks = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /\d/.test(password),
                special: /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)
            };

            // Update requirement indicators
            Object.keys(checks).forEach(req => {
                const element = requirements[req];
                const icon = element.querySelector('.requirement-icon');

                if (checks[req]) {
                    element.classList.add('requirement-met');
                    icon.textContent = '✓';
                    score++;
                } else {
                    element.classList.remove('requirement-met');
                    icon.textContent = '○';
                }
            });

            return {
                score,
                checks
            };
        }

        // Update strength indicator
        function updateStrengthIndicator(score) {
            const percentage = (score / 5) * 100;
            strengthBar.style.width = percentage + '%';

            // Remove all strength classes
            strengthBar.classList.remove('strength-weak', 'strength-fair', 'strength-good', 'strength-strong');

            if (score === 0) {
                strengthText.textContent = 'Enter password';
                strengthBar.classList.add('strength-weak');
            } else if (score <= 2) {
                strengthText.textContent = 'Weak';
                strengthBar.classList.add('strength-weak');
            } else if (score === 3) {
                strengthText.textContent = 'Fair';
                strengthBar.classList.add('strength-fair');
            } else if (score === 4) {
                strengthText.textContent = 'Good';
                strengthBar.classList.add('strength-good');
            } else {
                strengthText.textContent = 'Strong';
                strengthBar.classList.add('strength-strong');
            }
        }

        // Check password match
        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            if (confirmPassword === '') {
                passwordMatch.style.display = 'none';
                confirmPasswordInput.classList.remove('is-valid', 'is-invalid');
                return false;
            }

            passwordMatch.style.display = 'block';

            if (password === confirmPassword && password !== '') {
                matchIcon.innerHTML = '✅';
                matchText.textContent = 'Passwords match perfectly!';
                passwordMatch.className = 'mt-3 p-3 rounded-3 password-match';
                confirmPasswordInput.classList.remove('is-invalid');
                confirmPasswordInput.classList.add('is-valid');
                return true;
            } else {
                matchIcon.innerHTML = '❌';
                matchText.textContent = 'Passwords do not match';
                passwordMatch.className = 'mt-3 p-3 rounded-3 password-no-match';
                confirmPasswordInput.classList.remove('is-valid');
                confirmPasswordInput.classList.add('is-invalid');
                return false;
            }
        }

        // Validate form
        function validateForm() {
            const password = passwordInput.value;
            const {
                score,
                checks
            } = checkPasswordStrength(password);
            const passwordsMatch = checkPasswordMatch();

            // Check if all requirements are met
            const allRequirementsMet = Object.values(checks).every(check => check);

            // Update password field styling
            if (password === '') {
                passwordInput.classList.remove('is-valid', 'is-invalid');
            } else if (allRequirementsMet) {
                passwordInput.classList.remove('is-invalid');
                passwordInput.classList.add('is-valid');
            } else {
                passwordInput.classList.remove('is-valid');
                passwordInput.classList.add('is-invalid');
            }

            // Enable/disable submit button
            if (allRequirementsMet && passwordsMatch && password !== '') {
                createUserBtn.disabled = false;
                createUserBtn.classList.remove('btn-secondary');
                createUserBtn.classList.add('btn-primary');
            } else {
                createUserBtn.disabled = true;
                createUserBtn.classList.remove('btn-primary');
                createUserBtn.classList.add('btn-secondary');
            }

            return allRequirementsMet && passwordsMatch;
        }

        // Event listeners
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const {
                score
            } = checkPasswordStrength(password);
            updateStrengthIndicator(score);
            validateForm();
        });

        confirmPasswordInput.addEventListener('input', function() {
            validateForm();
        });

        // Form submission validation
        document.querySelector('form').addEventListener('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault();
                alert('Please ensure all password requirements are met and passwords match.');
            }
        });

        // Initialize form state
        validateForm();
    });
</script>
