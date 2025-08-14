@props(['users'])
<div class="bg-white rounded-3 shadow-sm border border-light">
    <!-- Section Header with Search and Filter -->
    <div class="p-4 border-bottom">
        <div class="row g-4 align-items-end">
            <div class="col-lg-6">
                <div class="d-flex align-items-center">
                    <div class="me-3 p-2 rounded-circle" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="h4 fw-semibold text-dark mb-1">Team Members</h2>
                        <p class="text-muted mb-0">Manage and view all users ({{ $users->count() }} total)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Cards Grid -->
    <div class="p-4">
        @if($users->count() > 0)
            <div class="row g-4">
                @foreach($users as $user)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: all 0.3s ease;">
                            <div class="card-body p-4">
                                <!-- User Header -->
                                <div class="d-flex align-items-center mb-3">
                                    <div class="position-relative me-3">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background={{ ['3b82f6', '10b981', 'f59e0b', 'ef4444', '8b5cf6', '06b6d4'][$loop->index % 6] }}&color=fff&size=48"
                                             class="rounded-circle" width="48" height="48" alt="{{ $user->name }}">

                                        <!-- Status indicator based on user status -->
                                        @if($user->status === 'active' || !isset($user->status))
                                            <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle"
                                                  style="width: 14px; height: 14px;" title="Active"></span>
                                        @elseif($user->status === 'pending')
                                            <span class="position-absolute bottom-0 end-0 bg-warning border border-white rounded-circle"
                                                  style="width: 14px; height: 14px;" title="Pending"></span>
                                        @else
                                            <span class="position-absolute bottom-0 end-0 bg-secondary border border-white rounded-circle"
                                                  style="width: 14px; height: 14px;" title="Inactive"></span>
                                        @endif
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="fw-semibold text-dark mb-1">{{ $user->name }}</h6>
                                        <div class="small text-muted">
                                            {{ ucfirst($user->role ?? 'Standard') }} Access
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm border-0 shadow-sm" data-bs-toggle="dropdown"
                                                style="border-radius: 8px; width: 32px; height: 32px;">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="12" cy="12" r="1"/>
                                                <circle cx="12" cy="5" r="1"/>
                                                <circle cx="12" cy="19" r="1"/>
                                            </svg>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="border-radius: 12px;">
                                            <li><a class="dropdown-item small" href="#"><i class="bi bi-eye me-2"></i>View Profile</a></li>
                                            <li><a class="dropdown-item small" href="#"><i class="bi bi-pencil me-2"></i>Edit User</a></li>
                                            <li><a class="dropdown-item small" href="#"><i class="bi bi-key me-2"></i>Reset Password</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <button class="dropdown-item small text-danger border-0 bg-transparent w-100 text-start" 
                                                        onclick="showDeleteModal('{{ $user->uuid }}', '{{ addslashes($user->name) }}', '{{ $user->email }}', '{{ $user->role ?? 'Standard' }}')">
                                                    <i class="bi bi-trash me-2"></i>Delete User
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Contact Information -->
                                <div class="mb-3">
                                    <!-- Email -->
                                    <div class="d-flex align-items-center mb-2">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" class="me-2">
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                            <polyline points="22,6 12,13 2,6"/>
                                        </svg>
                                        <span class="small text-dark">{{ $user->email }}</span>
                                    </div>

                                    <!-- Phone -->
                                    @if($user->phone)
                                        <div class="d-flex align-items-center mb-2">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" class="me-2">
                                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                            </svg>
                                            <span class="small text-muted">{{ $user->phone }}</span>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-center mb-2">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" class="me-2">
                                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                            </svg>
                                            <span class="small text-muted">No phone number</span>
                                        </div>
                                    @endif

                                    <!-- UUID (Copyable) -->
                                    @if($user->uuid)
                                        <div class="d-flex align-items-center">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" class="me-2">
                                                <path d="M9 9h6v6H9z"/>
                                                <path d="M21 9v6a1 1 0 0 1-1 1h-1V9a2 2 0 0 0-2-2H9v1a1 1 0 0 1-1 1H4a2 2 0 0 1-2-2V6a1 1 0 0 1 1-1h3a2 2 0 0 1 2 2v1h8a2 2 0 0 1 2 2v1z"/>
                                            </svg>
                                            <div class="d-flex align-items-center uuid-container"
                                                style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 4px 8px; cursor: pointer; transition: all 0.2s ease;"
                                                data-uuid="{{ $user->uuid }}"
                                                title="Click to copy UUID">
                                                <code class="small text-muted me-2 uuid-text" style="background: transparent; font-size: 0.7rem; font-family: 'Courier New', monospace;">
                                                    {{ Str::limit($user->uuid, 8) }}...
                                                </code>
                                                <svg class="copy-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2">
                                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/>
                                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                                                </svg>
                                                <!-- Success checkmark (hidden by default) -->
                                                <svg class="check-icon d-none" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2">
                                                    <path d="M20 6L9 17l-5-5"/>
                                                </svg>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Status and Joined Date -->
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="badge rounded-pill px-3 py-2" style="background-color: #dcfce7; color: #16a34a; font-size: 0.75rem;">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                            <polyline points="22,4 12,14.01 9,11.01"/>
                                        </svg>
                                        Active
                                    </span>
                                    <small class="text-muted">
                                        Joined {{ $user->created_at ? $user->created_at->format('M d, Y') : 'Unknown' }}
                                    </small>
                                </div>

                                <!-- Quick Actions -->
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-primary btn-sm" style="border-radius: 8px;">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                        </svg>
                                        Edit Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-5">
                <div class="mb-4">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="1" class="mx-auto">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
                <h5 class="text-muted mb-2">No Users Found</h5>
                <p class="text-muted mb-4">There are no users in the system yet.</p>
                <a href="javascript:window.location.reload();" class="btn btn-primary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="16"/>
                        <line x1="8" y1="12" x2="16" y2="12"/>
                    </svg>
                    Add First User
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-header border-0 pb-0">
                <div class="d-flex align-items-center">
                    <div class="me-3 p-2 rounded-circle" style="background: rgba(239, 68, 68, 0.1);">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2">
                            <path d="M3 6h18"/>
                            <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                            <line x1="10" y1="11" x2="10" y2="17"/>
                            <line x1="14" y1="11" x2="14" y2="17"/>
                        </svg>
                    </div>
                    <div>
                        <h5 class="modal-title fw-semibold text-dark mb-1" id="deleteUserModalLabel">Delete User Account</h5>
                        <p class="text-muted small mb-0">This action cannot be undone</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-3">
                <!-- User Info Card -->
                <div class="p-3 mb-4 rounded-3" style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);">
                    <div class="d-flex align-items-center">
                        <img id="deleteUserAvatar" src="" class="rounded-circle me-3" width="48" height="48" alt="">
                        <div class="flex-grow-1">
                            <h6 class="fw-semibold text-dark mb-1" id="deleteUserName"></h6>
                            <div class="small text-muted" id="deleteUserEmail"></div>
                            <div class="small text-muted" id="deleteUserRole"></div>
                        </div>
                    </div>
                </div>

                <!-- Warning Message -->
                <div class="alert alert-danger border-0" style="background: rgba(239, 68, 68, 0.05); border-radius: 12px;">
                    <div class="d-flex align-items-start">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" class="me-3 mt-1 flex-shrink-0">
                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                            <line x1="12" y1="9" x2="12" y2="13"/>
                            <line x1="12" y1="17" x2="12.01" y2="17"/>
                        </svg>
                        <div>
                            <h6 class="fw-semibold text-danger mb-1">Warning: Permanent Deletion</h6>
                            <p class="text-danger small mb-2">
                                Deleting this user will permanently remove:
                            </p>
                            <ul class="text-danger small mb-0 ps-3">
                                <li>User profile and account information</li>
                                <li>All associated data and permissions</li>
                                <li>Login access and authentication</li>
                                <li>Any linked records or activities</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Confirmation Input -->
                <div class="mb-3">
                    <label for="confirmDeleteInput" class="form-label small fw-semibold text-dark">
                        Type "DELETE" to confirm:
                    </label>
                    <input type="text" 
                           class="form-control" 
                           id="confirmDeleteInput" 
                           placeholder="Type DELETE here"
                           style="border-radius: 8px; border: 2px solid #e5e7eb;">
                </div>

                <!-- Optional: Reason for deletion -->
                <div class="mb-3">
                    <label for="deleteReason" class="form-label small fw-semibold text-dark">
                        Reason for deletion (optional):
                    </label>
                    <select class="form-select" id="deleteReason" style="border-radius: 8px; border: 2px solid #e5e7eb;">
                        <option value="">Select a reason</option>
                        <option value="inactive">User inactive/no longer needed</option>
                        <option value="duplicate">Duplicate account</option>
                        <option value="security">Security concerns</option>
                        <option value="request">User requested deletion</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal" style="border-radius: 8px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                    Cancel
                </button>
                <button type="button" 
                        class="btn btn-danger" 
                        id="confirmDeleteBtn" 
                        disabled
                        style="border-radius: 8px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2">
                        <path d="M3 6h18"/>
                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                        <line x1="10" y1="11" x2="10" y2="17"/>
                        <line x1="14" y1="11" x2="14" y2="17"/>
                    </svg>
                    Delete User
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Form (Hidden) -->
<form id="deleteUserForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
    <input type="hidden" name="reason" id="deleteReasonInput">
</form>

<style>
    /* Enhanced Card Hover Effects */
    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
    }

    /* Responsive grid adjustments */
    @media (max-width: 768px) {
        .col-xl-3, .col-lg-4, .col-md-6 {
            margin-bottom: 1rem;
        }

        .card-body {
            padding: 1rem !important;
        }
    }

    /* Input group styling */
    .input-group:focus-within {
        box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.1);
    }

    .form-select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.1);
    }

    /* Empty state styling */
    .text-center svg {
        opacity: 0.5;
    }

    .uuid-container:hover {
        background: #f1f5f9 !important;
        border-color: #cbd5e1 !important;
        transform: scale(1.02);
    }

    .uuid-container.copied {
        background: #f0fdf4 !important;
        border-color: #10b981 !important;
    }

    .uuid-text {
        user-select: none;
        letter-spacing: 0.5px;
    }

    /* Icon transitions */
    .copy-icon, .check-icon {
        transition: all 0.2s ease;
    }

    .uuid-container:hover .copy-icon {
        stroke: #3b82f6;
    }

    /* Tooltip styling */
    .uuid-container[title] {
        position: relative;
    }

    /* Modal Enhancements */
    .modal-content {
        backdrop-filter: blur(10px);
    }

    /* Confirmation Input Styling */
    #confirmDeleteInput:focus {
        border-color: #ef4444;
        box-shadow: 0 0 0 0.25rem rgba(239, 68, 68, 0.1);
    }

    #confirmDeleteInput.valid {
        border-color: #10b981;
        background-color: rgba(16, 185, 129, 0.05);
    }

    /* Delete Button States */
    #confirmDeleteBtn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    #confirmDeleteBtn:not(:disabled) {
        animation: pulse 1s infinite;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(239, 68, 68, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(239, 68, 68, 0);
        }
    }

    /* Loading state for delete button */
    .btn-loading {
        position: relative;
        color: transparent !important;
    }

    .btn-loading::after {
        content: '';
        position: absolute;
        width: 16px;
        height: 16px;
        top: 50%;
        left: 50%;
        margin-left: -8px;
        margin-top: -8px;
        border: 2px solid transparent;
        border-top-color: #ffffff;
        border-radius: 50%;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentUserUuid = null;

    // Handle UUID copy functionality
    document.querySelectorAll('.uuid-container').forEach(container => {
        container.addEventListener('click', async function() {
            const uuid = this.getAttribute('data-uuid');
            const copyIcon = this.querySelector('.copy-icon');
            const checkIcon = this.querySelector('.check-icon');

            try {
                await navigator.clipboard.writeText(uuid);

                // Show success feedback
                this.classList.add('copied');
                copyIcon.classList.add('d-none');
                checkIcon.classList.remove('d-none');

                // Update tooltip
                const originalTitle = this.getAttribute('title');
                this.setAttribute('title', 'Copied!');

                // Reset after 2 seconds
                setTimeout(() => {
                    this.classList.remove('copied');
                    copyIcon.classList.remove('d-none');
                    checkIcon.classList.add('d-none');
                    this.setAttribute('title', originalTitle);
                }, 2000);

            } catch (err) {
                // Fallback for older browsers
                const textArea = document.createElement('textarea');
                textArea.value = uuid;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);

                // Show success feedback (same as above)
                this.classList.add('copied');
                copyIcon.classList.add('d-none');
                checkIcon.classList.remove('d-none');

                setTimeout(() => {
                    this.classList.remove('copied');
                    copyIcon.classList.remove('d-none');
                    checkIcon.classList.add('d-none');
                }, 2000);
            }
        });
    });

    // Delete User Modal Functionality
    window.showDeleteModal = function(uuid, name, email, role) {
        currentUserUuid = uuid;
        
        // Populate modal with user data
        document.getElementById('deleteUserName').textContent = name;
        document.getElementById('deleteUserEmail').textContent = email;
        document.getElementById('deleteUserRole').textContent = role + ' Access';
        
        // Set avatar
        const avatarUrl = `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=ef4444&color=fff&size=48`;
        document.getElementById('deleteUserAvatar').src = avatarUrl;
        
        // Reset form
        document.getElementById('confirmDeleteInput').value = '';
        document.getElementById('deleteReason').value = '';
        document.getElementById('confirmDeleteBtn').disabled = true;
        document.getElementById('confirmDeleteInput').classList.remove('valid');
        
        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('deleteUserModal'));
        modal.show();
    };

    // Confirmation input validation
    const confirmInput = document.getElementById('confirmDeleteInput');
    const confirmBtn = document.getElementById('confirmDeleteBtn');

    confirmInput.addEventListener('input', function() {
        const isValid = this.value.trim().toUpperCase() === 'DELETE';
        confirmBtn.disabled = !isValid;
        
        if (isValid) {
            this.classList.add('valid');
        } else {
            this.classList.remove('valid');
        }
    });

    // Handle delete confirmation
    confirmBtn.addEventListener('click', function() {
        if (!currentUserUuid) return;

        // Show loading state
        this.classList.add('btn-loading');
        this.disabled = true;

        // Get reason
        const reason = document.getElementById('deleteReason').value;
        document.getElementById('deleteReasonInput').value = reason;

        // Set form action and submit with correct path
        const form = document.getElementById('deleteUserForm');
        form.action = `/authentication/users/${currentUserUuid}`;
        form.submit();
    });

    // Reset modal when closed
    document.getElementById('deleteUserModal').addEventListener('hidden.bs.modal', function() {
        currentUserUuid = null;
        document.getElementById('confirmDeleteInput').value = '';
        document.getElementById('deleteReason').value = '';
        document.getElementById('confirmDeleteBtn').disabled = true;
        document.getElementById('confirmDeleteBtn').classList.remove('btn-loading');
        document.getElementById('confirmDeleteInput').classList.remove('valid');
    });

    // Keyboard shortcuts for modal
    document.addEventListener('keydown', function(e) {
        const modal = document.getElementById('deleteUserModal');
        if (modal.classList.contains('show')) {
            // Escape to close
            if (e.key === 'Escape') {
                bootstrap.Modal.getInstance(modal).hide();
            }
            // Enter to confirm (if input is valid)
            else if (e.key === 'Enter' && !confirmBtn.disabled) {
                confirmBtn.click();
            }
        }
    });

    // Auto-focus confirmation input when modal opens
    document.getElementById('deleteUserModal').addEventListener('shown.bs.modal', function() {
        document.getElementById('confirmDeleteInput').focus();
    });
});
</script>
