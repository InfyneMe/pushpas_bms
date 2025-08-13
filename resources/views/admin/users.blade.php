@extends('layouts.admin-layout')
@section('content')
    <div class="">
        <!-- Page Header -->
        <div class="mb-5 position-relative border border-light-subtle rounded-3 shadow-sm"
            style="background: white; border-radius: 20px; padding: 2.5rem; border: 1px solid #f1f5f9;">
            <!-- Subtle background pattern -->
            <div class="position-absolute w-100 h-100 top-0 start-0 opacity-3">
                <svg width="100%" height="100%" viewBox="0 0 400 140">
                    <defs>
                        <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="#e2e8f0" stroke-width="1" />
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid)" />
                </svg>
            </div>

            <div class="row align-items-center position-relative">
                <div class="col-lg-9">
                    <div class="d-flex align-items-center">
                        <!-- Modern icon -->
                        <div class="me-4 p-3 rounded-3"
                            style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); border: 2px solid #e2e8f0;">
                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#475569"
                                stroke-width="1.5">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="display-6 fw-bold mb-2" style="color: #1e293b;">User Management</h1>
                            <p class="text-muted mb-0 fs-6 d-flex align-items-center">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" class="me-2">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M8 14s1.5 2 4 2 4-2 4-2" />
                                    <line x1="9" y1="9" x2="9.01" y2="9" />
                                    <line x1="15" y1="9" x2="15.01" y2="9" />
                                </svg>
                                Create new users and manage existing ones
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-end d-none d-lg-block">
                    <!-- Clean organizational chart -->
                    <svg width="120" height="90" viewBox="0 0 120 90">
                        <defs>
                            <linearGradient id="nodeGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#f1f5f9" />
                                <stop offset="100%" style="stop-color:#e2e8f0" />
                            </linearGradient>
                        </defs>

                        <!-- Organizational structure -->
                        <g fill="url(#nodeGrad)" stroke="#cbd5e1" stroke-width="1">
                            <!-- Top level -->
                            <rect x="45" y="10" width="30" height="20" rx="10" />

                            <!-- Second level -->
                            <rect x="15" y="50" width="25" height="18" rx="9" />
                            <rect x="47.5" y="50" width="25" height="18" rx="9" />
                            <rect x="80" y="50" width="25" height="18" rx="9" />
                        </g>

                        <!-- Connection lines -->
                        <g stroke="#94a3b8" stroke-width="1.5" fill="none">
                            <line x1="60" y1="30" x2="60" y2="40" />
                            <line x1="30" y1="40" x2="90" y2="40" />
                            <line x1="27.5" y1="40" x2="27.5" y2="50" />
                            <line x1="60" y1="40" x2="60" y2="50" />
                            <line x1="92.5" y1="40" x2="92.5" y2="50" />
                        </g>

                        <!-- User icons -->
                        <g fill="#64748b">
                            <!-- Top user -->
                            <circle cx="60" cy="17" r="3" />
                            <rect x="57" y="20" width="6" height="6" rx="3" />

                            <!-- Bottom users -->
                            <circle cx="27.5" cy="56" r="2.5" />
                            <rect x="25" y="58.5" width="5" height="5" rx="2.5" />

                            <circle cx="60" cy="56" r="2.5" />
                            <rect x="57.5" y="58.5" width="5" height="5" rx="2.5" />

                            <circle cx="92.5" cy="56" r="2.5" />
                            <rect x="90" y="58.5" width="5" height="5" rx="2.5" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
        <!-- Create User Form Section -->
        <x-create-user />

        <!-- User List Section -->
        {{-- <x-users-list :users="$users"/> --}}
    </div>

    <script>
        // Collapsible form functionality
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggleForm');
            const createForm = document.getElementById('createForm');
            const toggleIcon = document.getElementById('toggleIcon');
            const toggleText = document.getElementById('toggleText');

            toggleButton.addEventListener('click', function() {
                const isVisible = !createForm.classList.contains('d-none');

                if (isVisible) {
                    // Hide form
                    createForm.classList.add('d-none');
                    toggleIcon.style.transform = 'rotate(-90deg)';
                    toggleText.textContent = 'Expand';
                } else {
                    // Show form
                    createForm.classList.remove('d-none');
                    toggleIcon.style.transform = 'rotate(0deg)';
                    toggleText.textContent = 'Collapse';
                }
            });
        });
    </script>

    <style>
        /* Custom styles to match the original design exactly */
        .form-control:focus,
        .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
        }

        .btn-primary {
            background-color: #2563eb;
            border-color: #2563eb;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(249, 250, 251, 0.8);
        }

        .btn-link:hover {
            opacity: 0.8;
        }

        .border-secondary-subtle {
            border-color: #e5e7eb !important;
        }

        .rounded-3 {
            border-radius: 0.75rem !important;
        }

        /* Responsive table improvements */
        @media (max-width: 768px) {
            .table-responsive {
                font-size: 0.875rem;
            }

            .d-flex.gap-3 {
                flex-direction: column;
                gap: 0.5rem !important;
            }
        }
    </style>
@endsection
