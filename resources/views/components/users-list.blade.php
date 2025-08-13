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
                                            <li><a class="dropdown-item small text-danger" href="#"><i class="bi bi-trash me-2"></i>Delete User</a></li>
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
                <a href="{{ route('users.create') ?? '#' }}" class="btn btn-primary">
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
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
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
});
</script>

