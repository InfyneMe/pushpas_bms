@extends('layouts.admin-layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Modern Header -->
            <div class="page-header-modern">
                <div class="header-content-modern">
                    <div class="header-left-modern">
                        <nav class="breadcrumb-modern">
                            <a href="{{ route('crusher.list') }}" class="breadcrumb-link-modern">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                </svg>
                                Crushers
                            </a>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="breadcrumb-separator-modern">
                                <polyline points="9,18 15,12 9,6"/>
                            </svg>
                            <span class="breadcrumb-current-modern">Add New</span>
                        </nav>
                        <div class="title-section">
                            <h1 class="page-title-modern">
                                <div class="title-icon">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                                    </svg>
                                </div>
                                Add New Crusher
                            </h1>
                            <p class="page-subtitle-modern">Create a new crusher entry with location and capacity details</p>
                        </div>
                    </div>
                    <div class="header-right-modern">
                        <a href="{{ route('crusher.list') }}" class="btn-back-modern">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="m15 18-6-6 6-6"/>
                            </svg>
                            Back to List
                        </a>
                    </div>
                </div>
            </div>

            <!-- Modern Form Container -->
            <div class="form-wrapper-modern">
                <form action="{{ route('crusher.store') }}" method="POST" id="crusherForm" class="modern-form">
                    @csrf
                    
                    <div class="form-card-modern">
                        <div class="card-body-modern">
                            
                            <!-- Basic Information Section -->
                            <div class="form-section-modern">
                                <div class="section-header-modern">
                                    <div class="section-icon-modern">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                            <circle cx="12" cy="7" r="4"/>
                                        </svg>
                                    </div>
                                    <div class="section-text-modern">
                                        <h3>Basic Information</h3>
                                        <p>Essential details about the crusher</p>
                                    </div>
                                </div>
                                
                                <div class="form-grid-modern">
                                    <div class="form-group-modern">
                                        <label for="name" class="form-label-modern required">
                                            <span class="label-text">Crusher Name</span>
                                        </label>
                                        <div class="input-wrapper-modern">
                                            <input type="text" 
                                                   id="name" 
                                                   name="name" 
                                                   class="form-control-modern @error('name') is-invalid @enderror"
                                                   value="{{ old('name') }}"
                                                   placeholder="Enter crusher name"
                                                   required>
                                            <div class="input-icon">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        @error('name')
                                            <div class="error-message-modern">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group-modern">
                                        <label for="status" class="form-label-modern required">
                                            <span class="label-text">Operational Status</span>
                                        </label>
                                        <div class="select-wrapper-modern">
                                            <select id="status" 
                                                    name="status" 
                                                    class="form-control-modern @error('status') is-invalid @enderror"
                                                    required>
                                                <option value="">Choose status</option>
                                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>🟢 Active</option>
                                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>🔴 Inactive</option>
                                                <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>🟡 Under Maintenance</option>
                                            </select>
                                            <div class="select-icon">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <polyline points="6,9 12,15 18,9"/>
                                                </svg>
                                            </div>
                                        </div>
                                        @error('status')
                                            <div class="error-message-modern">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Location Details Section -->
                            <div class="section-divider-modern"></div>
                            <div class="form-section-modern">
                                <div class="section-header-modern">
                                    <div class="section-icon-modern">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                            <circle cx="12" cy="10" r="3"/>
                                        </svg>
                                    </div>
                                    <div class="section-text-modern">
                                        <h3>Location Details</h3>
                                        <p>Physical location and address information</p>
                                    </div>
                                </div>

                                <div class="form-group-modern full-width">
                                    <label for="location" class="form-label-modern required">
                                        <span class="label-text">Complete Address</span>
                                    </label>
                                    <div class="textarea-wrapper-modern">
                                        <textarea id="location" 
                                                  name="location" 
                                                  class="form-control-modern @error('location') is-invalid @enderror"
                                                  rows="4"
                                                  placeholder="Enter complete address including city, state, and postal code"
                                                  required>{{ old('location') }}</textarea>
                                        <div class="textarea-icon">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                                <circle cx="12" cy="10" r="3"/>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('location')
                                        <div class="error-message-modern">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Technical Specifications Section -->
                            <div class="section-divider-modern"></div>
                            <div class="form-section-modern">
                                <div class="section-header-modern">
                                    <div class="section-icon-modern">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M12 20h9"/>
                                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                                        </svg>
                                    </div>
                                    <div class="section-text-modern">
                                        <h3>Technical Specifications</h3>
                                        <p>Capacity and operational features</p>
                                    </div>
                                </div>

                                <div class="form-grid-modern">
                                    <div class="form-group-modern">
                                        <label for="capacity" class="form-label-modern required">
                                            <span class="label-text">Processing Capacity</span>
                                        </label>
                                        <div class="input-group-modern">
                                            <div class="input-wrapper-modern">
                                                <input type="number" 
                                                       id="capacity" 
                                                       name="capacity" 
                                                       class="form-control-modern @error('capacity') is-invalid @enderror"
                                                       value="{{ old('capacity') }}"
                                                       placeholder="0.00"
                                                       min="0.01"
                                                       step="0.01"
                                                       required>
                                                <div class="input-icon">
                                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <path d="M3 3v18h18"/>
                                                        <path d="m19 9-5 5-4-4-3 3"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="input-suffix-modern">tons/hour</div>
                                        </div>
                                        @error('capacity')
                                            <div class="error-message-modern">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            <span class="label-text">Weight Bridge Facility</span>
                                        </label>
                                        <div class="radio-group-modern">
                                            <label class="radio-option-modern">
                                                <input type="radio" 
                                                       id="has_weight_yes" 
                                                       name="has_weight" 
                                                       value="1" 
                                                       {{ old('has_weight') == '1' ? 'checked' : '' }}>
                                                <span class="radio-custom-modern"></span>
                                                <span class="radio-label-modern success">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                                        <polyline points="22,4 12,14.01 9,11.01"/>
                                                    </svg>
                                                    Available
                                                </span>
                                            </label>
                                            <label class="radio-option-modern">
                                                <input type="radio" 
                                                       id="has_weight_no" 
                                                       name="has_weight" 
                                                       value="0" 
                                                       {{ old('has_weight') == '0' ? 'checked' : '' }}>
                                                <span class="radio-custom-modern"></span>
                                                <span class="radio-label-modern danger">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <circle cx="12" cy="12" r="10"/>
                                                        <line x1="15" y1="9" x2="9" y2="15"/>
                                                        <line x1="9" y1="9" x2="15" y2="15"/>
                                                    </svg>
                                                    Not Available
                                                </span>
                                            </label>
                                        </div>
                                        @error('has_weight')
                                            <div class="error-message-modern">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Business Information Section -->
                            <div class="section-divider-modern"></div>
                            <div class="form-section-modern">
                                <div class="section-header-modern">
                                    <div class="section-icon-modern">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"/>
                                            <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"/>
                                        </svg>
                                    </div>
                                    <div class="section-text-modern">
                                        <h3>Business Information</h3>
                                        <p>Tax and regulatory details (optional)</p>
                                    </div>
                                </div>

                                <div class="form-group-modern two-thirds">
                                    <label for="gst_number" class="form-label-modern">
                                        <span class="label-text">GST Registration Number</span>
                                    </label>
                                    <div class="input-wrapper-modern">
                                        <input type="text" 
                                               id="gst_number" 
                                               name="gst_number" 
                                               class="form-control-modern @error('gst_number') is-invalid @enderror"
                                               value="{{ old('gst_number') }}"
                                               placeholder="22AAAAA0000A1Z5">
                                        <div class="input-icon">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                                <polyline points="14,2 14,8 20,8"/>
                                                <line x1="16" y1="13" x2="8" y2="13"/>
                                                <line x1="16" y1="17" x2="8" y2="17"/>
                                                <polyline points="10,9 9,9 8,9"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="field-hint-modern">15-digit GST number (optional)</div>
                                    @error('gst_number')
                                        <div class="error-message-modern">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Modern Form Actions -->
                            <div class="form-actions-modern">
                                <button type="button" class="btn-modern btn-secondary-modern" onclick="window.history.back()">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="18" y1="6" x2="6" y2="18"/>
                                        <line x1="6" y1="6" x2="18" y2="18"/>
                                    </svg>
                                    Cancel
                                </button>
                                <div class="action-group-modern">
                                    <button type="reset" class="btn-modern btn-outline-modern">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/>
                                            <path d="M21 3v5h-5"/>
                                            <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/>
                                            <path d="M3 21v-5h5"/>
                                        </svg>
                                        Reset Form
                                    </button>
                                    <button type="submit" class="btn-modern btn-primary-modern" id="submitBtn">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                                            <polyline points="17,21 17,13 7,13 7,21"/>
                                            <polyline points="7,3 7,8 15,8"/>
                                        </svg>
                                        Save Crusher
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* CSS Variables for Modern Design */
    :root {
        --primary-color: #4f46e5;
        --primary-hover: #4338ca;
        --secondary-color: #6b7280;
        --success-color: #10b981;
        --danger-color: #ef4444;
        --warning-color: #f59e0b;
        --background-color: #f8fafc;
        --surface-color: #ffffff;
        --border-color: #e5e7eb;
        --text-primary: #111827;
        --text-secondary: #6b7280;
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --radius-sm: 6px;
        --radius-md: 8px;
        --radius-lg: 12px;
        --transition: all 0.2s ease-in-out;
    }

    /* Modern Page Header */
    .page-header-modern {
        background: linear-gradient(135deg, var(--surface-color) 0%, #f9fafb 100%);
        border-radius: var(--radius-lg);
        padding: 2rem 2rem 1.5rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-color);
        position: relative;
        overflow: hidden;
    }

    .page-header-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--success-color));
    }

    .header-content-modern {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1.5rem;
    }

    .breadcrumb-modern {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
        font-size: 0.875rem;
    }

    .breadcrumb-link-modern {
        color: var(--text-secondary);
        text-decoration: none;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.25rem 0.5rem;
        border-radius: var(--radius-sm);
    }

    .breadcrumb-link-modern:hover {
        color: var(--primary-color);
        background: rgba(79, 70, 229, 0.1);
        text-decoration: none;
    }

    .breadcrumb-separator-modern {
        margin: 0 0.5rem;
        color: var(--border-color);
    }

    .breadcrumb-current-modern {
        color: var(--text-primary);
        font-weight: 500;
    }

    .title-section {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .page-title-modern {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .title-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        box-shadow: var(--shadow-md);
    }

    .page-subtitle-modern {
        color: var(--text-secondary);
        font-size: 1rem;
        margin: 0;
        margin-left: 64px;
    }

    .btn-back-modern {
        padding: 0.75rem 1.25rem;
        background: var(--surface-color);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-md);
        color: var(--text-secondary);
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 500;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: var(--shadow-sm);
    }

    .btn-back-modern:hover {
        background: #f9fafb;
        color: var(--text-primary);
        text-decoration: none;
        border-color: var(--text-secondary);
        transform: translateY(-1px);
        box-shadow: var(--shadow-md);
    }

    /* Modern Form Container */
    .form-wrapper-modern {
        margin-bottom: 2rem;
    }

    .form-card-modern {
        background: var(--surface-color);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--border-color);
        overflow: hidden;
    }

    .card-body-modern {
        padding: 2rem;
    }

    /* Modern Form Sections */
    .form-section-modern {
        margin-bottom: 2rem;
    }

    .section-header-modern {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .section-icon-modern {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        flex-shrink: 0;
        box-shadow: var(--shadow-md);
    }

    .section-text-modern h3 {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--text-primary);
        margin: 0 0 0.25rem 0;
    }

    .section-text-modern p {
        font-size: 0.875rem;
        color: var(--text-secondary);
        margin: 0;
    }

    .section-divider-modern {
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--border-color), transparent);
        margin: 2rem 0;
    }

    /* Modern Form Grid */
    .form-grid-modern {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-group-modern {
        display: flex;
        flex-direction: column;
    }

    .form-group-modern.full-width {
        grid-column: 1 / -1;
    }

    .form-group-modern.two-thirds {
        grid-column: 1 / span 2;
        max-width: 66.666%;
    }

    /* Modern Form Labels */
    .form-label-modern {
        margin-bottom: 0.75rem;
        display: block;
    }

    .label-text {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-label-modern.required .label-text::after {
        content: '*';
        color: var(--danger-color);
        font-weight: 500;
    }

    /* Modern Input Wrappers */
    .input-wrapper-modern, .textarea-wrapper-modern {
        position: relative;
        display: flex;
        align-items: center;
    }

    .select-wrapper-modern {
        position: relative;
    }

    /* Modern Form Controls */
    .form-control-modern {
        width: 100%;
        padding: 0.875rem 1rem;
        padding-right: 3rem;
        border: 2px solid var(--border-color);
        border-radius: var(--radius-md);
        font-size: 0.875rem;
        font-weight: 500;
        background: var(--surface-color);
        transition: var(--transition);
        color: var(--text-primary);
    }

    .form-control-modern:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        transform: translateY(-1px);
    }

    .form-control-modern.is-invalid {
        border-color: var(--danger-color);
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    textarea.form-control-modern {
        resize: vertical;
        min-height: 100px;
        padding-top: 1rem;
        line-height: 1.5;
    }

    /* Input Icons */
    .input-icon, .textarea-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-secondary);
        pointer-events: none;
        transition: var(--transition);
    }

    .textarea-icon {
        top: 1rem;
        transform: none;
    }

    .form-control-modern:focus + .input-icon,
    .form-control-modern:focus ~ .input-icon,
    .input-wrapper-modern:focus-within .input-icon,
    .textarea-wrapper-modern:focus-within .textarea-icon {
        color: var(--primary-color);
    }

    .select-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-secondary);
        pointer-events: none;
    }

    /* Modern Input Group */
    .input-group-modern {
        display: flex;
        align-items: stretch;
        gap: 0;
    }

    .input-group-modern .input-wrapper-modern {
        flex: 1;
    }

    .input-group-modern .form-control-modern {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-right: none;
    }

    .input-suffix-modern {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border: 2px solid var(--border-color);
        border-left: none;
        border-top-right-radius: var(--radius-md);
        border-bottom-right-radius: var(--radius-md);
        padding: 0.875rem 1rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-secondary);
        display: flex;
        align-items: center;
        white-space: nowrap;
    }

    /* Modern Radio Group */
    .radio-group-modern {
        display: flex;
        gap: 1.5rem;
        margin-top: 0.5rem;
    }

    .radio-option-modern {
        display: flex;
        align-items: center;
        cursor: pointer;
        padding: 0.75rem 1rem;
        border: 2px solid var(--border-color);
        border-radius: var(--radius-md);
        transition: var(--transition);
        background: var(--surface-color);
        flex: 1;
    }

    .radio-option-modern:hover {
        border-color: var(--primary-color);
        background: rgba(79, 70, 229, 0.02);
    }

    .radio-option-modern input[type="radio"] {
        display: none;
    }

    .radio-custom-modern {
        width: 20px;
        height: 20px;
        border: 2px solid var(--border-color);
        border-radius: 50%;
        margin-right: 0.75rem;
        position: relative;
        transition: var(--transition);
        flex-shrink: 0;
    }

    .radio-option-modern input[type="radio"]:checked + .radio-custom-modern {
        border-color: var(--primary-color);
        background: var(--primary-color);
    }

    .radio-option-modern input[type="radio"]:checked + .radio-custom-modern::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 8px;
        height: 8px;
        background: white;
        border-radius: 50%;
    }

    .radio-option-modern input[type="radio"]:checked ~ .radio-label-modern {
        color: var(--primary-color);
        font-weight: 600;
    }

    .radio-label-modern {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        transition: var(--transition);
    }

    .radio-label-modern.success {
        color: var(--success-color);
    }

    .radio-label-modern.danger {
        color: var(--danger-color);
    }

    /* Field Hints and Errors */
    .field-hint-modern {
        font-size: 0.75rem;
        color: var(--text-secondary);
        margin-top: 0.5rem;
        padding-left: 0.25rem;
    }

    .error-message-modern {
        font-size: 0.75rem;
        color: var(--danger-color);
        margin-top: 0.5rem;
        padding: 0.5rem 0.75rem;
        background: rgba(239, 68, 68, 0.05);
        border-radius: var(--radius-sm);
        border-left: 3px solid var(--danger-color);
    }

    /* Modern Form Actions */
    .form-actions-modern {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid var(--border-color);
        background: linear-gradient(135deg, #fafbfc, #f8fafc);
        margin-left: -2rem;
        margin-right: -2rem;
        margin-bottom: -2rem;
        padding-left: 2rem;
        padding-right: 2rem;
        padding-bottom: 2rem;
    }

    .action-group-modern {
        display: flex;
        gap: 1rem;
    }

    /* Modern Buttons */
    .btn-modern {
        padding: 0.875rem 1.5rem;
        border-radius: var(--radius-md);
        font-size: 0.875rem;
        font-weight: 600;
        border: 2px solid transparent;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: var(--transition);
        text-decoration: none;
        min-width: 120px;
        justify-content: center;
    }

    .btn-primary-modern {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
        color: white;
        box-shadow: var(--shadow-md);
    }

    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        background: linear-gradient(135deg, var(--primary-hover), #3730a3);
    }

    .btn-secondary-modern {
        background: var(--surface-color);
        color: var(--text-secondary);
        border-color: var(--border-color);
    }

    .btn-secondary-modern:hover {
        background: #f9fafb;
        color: var(--text-primary);
        border-color: var(--text-secondary);
    }

    .btn-outline-modern {
        background: transparent;
        color: var(--text-secondary);
        border-color: var(--border-color);
    }

    .btn-outline-modern:hover {
        background: var(--surface-color);
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .header-content-modern {
            flex-direction: column;
            gap: 1rem;
        }

        .page-title-modern {
            font-size: 1.5rem;
        }

        .page-subtitle-modern {
            margin-left: 0;
        }

        .card-body-modern {
            padding: 1.5rem;
        }

        .form-grid-modern {
            grid-template-columns: 1fr;
        }

        .form-group-modern.two-thirds {
            max-width: 100%;
        }

        .form-actions-modern {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }

        .action-group-modern {
            width: 100%;
            justify-content: space-between;
        }

        .radio-group-modern {
            flex-direction: column;
            gap: 1rem;
        }

        .section-header-modern {
            flex-direction: column;
            gap: 0.75rem;
        }

        .section-icon-modern {
            align-self: flex-start;
        }
    }

    @media (max-width: 576px) {
        .page-header-modern {
            padding: 1.5rem;
        }

        .card-body-modern {
            padding: 1rem;
        }

        .form-actions-modern {
            padding-left: 1rem;
            padding-right: 1rem;
            margin-left: -1rem;
            margin-right: -1rem;
        }
    }

    /* Loading Animation */
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .fa-spin, .loading-spin {
        animation: spin 1s linear infinite;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('crusherForm');
        const submitBtn = document.getElementById('submitBtn');
        
        // Form submission handler with modern loading state
        form.addEventListener('submit', function(e) {
            submitBtn.innerHTML = `
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="loading-spin">
                    <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
                </svg>
                Saving...
            `;
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.7';
        });

        // GST number formatting with validation
        const gstInput = document.getElementById('gst_number');
        gstInput.addEventListener('input', function(e) {
            let value = e.target.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
            e.target.value = value;
            
            // Add visual feedback for GST format
            if (value.length === 15) {
                e.target.style.borderColor = 'var(--success-color)';
            } else if (value.length > 0) {
                e.target.style.borderColor = 'var(--warning-color)';
            } else {
                e.target.style.borderColor = 'var(--border-color)';
            }
        });

        // Enhanced auto-resize textarea
        const locationTextarea = document.getElementById('location');
        locationTextarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 200) + 'px';
        });

        // Capacity input validation with visual feedback
        const capacityInput = document.getElementById('capacity');
        capacityInput.addEventListener('input', function(e) {
            const value = parseFloat(e.target.value);
            if (value <= 0 && e.target.value !== '') {
                e.target.setCustomValidity('Capacity must be greater than 0');
                e.target.style.borderColor = 'var(--danger-color)';
            } else {
                e.target.setCustomValidity('');
                e.target.style.borderColor = 'var(--border-color)';
            }
        });

        // Add smooth focus transitions for all inputs
        const inputs = document.querySelectorAll('.form-control-modern');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.transform = 'translateY(-1px)';
            });
            
            input.addEventListener('blur', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Enhanced radio button interactions
        const radioOptions = document.querySelectorAll('.radio-option-modern');
        radioOptions.forEach(option => {
            option.addEventListener('click', function() {
                const input = this.querySelector('input[type="radio"]');
                input.checked = true;
                
                // Update visual state for all options in the group
                const groupName = input.name;
                const allOptions = document.querySelectorAll(`input[name="${groupName}"]`);
                allOptions.forEach(radio => {
                    const parent = radio.closest('.radio-option-modern');
                    if (radio.checked) {
                        parent.style.borderColor = 'var(--primary-color)';
                        parent.style.background = 'rgba(79, 70, 229, 0.05)';
                    } else {
                        parent.style.borderColor = 'var(--border-color)';
                        parent.style.background = 'var(--surface-color)';
                    }
                });
            });
        });
    });
</script>
@endsection
