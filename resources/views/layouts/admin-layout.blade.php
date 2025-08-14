<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pushpas BMS - Bootstrap 5</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/adminLayout.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Logo Section -->
        <div class="logo-section">
            <div class="d-flex align-items-center">
                <div class="me-4">
                    <img src="{{ asset('logo.png') }}" alt="SR Foundation Logo" class="img-fluid" style="max-height: 30px;">
                </div>
                <span class="fw-semibold fs-6 text-dark flex-grow-1">SR Foundation</span>
                <i class="bi bi-chevron-down text-muted" style="font-size: 12px;"></i>
            </div>
        </div>

        <!-- Navigation Items -->
        <div class="nav-item-custom active d-flex align-items-center">
            <i class="bi bi-house nav-icon me-3 text-dark"></i>
            <strong class="flex-grow-1 text-dark">Dashboard</strong>
        </div>

        <!-- Public Profile with Dropdown -->
        <div class="nav-item-custom d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#purchaseDropdown">
            <i class="bi bi-cart-check nav-icon me-3 text-dark"></i>
            <strong class="flex-grow-1 text-dark">Purchases</strong>
            <i class="bi bi-chevron-down text-dark fs-bold" style="font-size: 10px;"></i>
        </div>
        <div class="collapse" id="purchaseDropdown">
            <div class="dropdown-custom">
                <div class="dropdown-item-custom text-dark">Purchase List</div>
                <div class="dropdown-item-custom text-dark">Purchase Add</div>
                <div class="dropdown-item-custom text-dark">Purchase Draft</div>
                <div class="dropdown-item-custom text-dark active">Purchase Review</div>
                <div class="dropdown-item-custom text-dark">Purchase Archived</div>
                <div class="dropdown-item-custom text-dark">Purchase Deleted</div>
            </div>
        </div>

        <!-- My Account with Dropdown -->
        <div class="nav-item-custom d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#accountDropdown">
            <i class="bi bi-graph-up-arrow nav-icon me-3"></i>
            <strong class="flex-grow-1 text-dark">Sales</strong>
            <i class="bi bi-chevron-down" style="font-size: 10px;"></i>
        </div>
        <div class="collapse" id="accountDropdown">
            <div class="dropdown-custom">
                <div class="dropdown-item-custom text-dark">Sales List</div>
                <div class="dropdown-item-custom text-dark">Add Sales</div>
                <div class="dropdown-item-custom text-dark">Sales Draft</div>
                <div class="dropdown-item-custom text-dark">Sales Review</div>
                <div class="dropdown-item-custom text-dark">Sales Archived</div>
                <div class="dropdown-item-custom text-dark">Sales Deleted</div>
            </div>
        </div>

        <!-- Network with Dropdown -->
        <div class="nav-item-custom d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#hsdDropdown">
            <i class="bi bi-fuel-pump nav-icon me-3"></i>
            <strong class="flex-grow-1 text-dark">HSD</strong>
            <i class="bi bi-chevron-down text-dark fw-bold" style="font-size: 10px;"></i>
        </div>
        <div class="collapse" id="hsdDropdown">
            <div class="dropdown-custom">
                <div class="dropdown-item-custom">HSD Usage</div>
                <div class="dropdown-item-custom">HSD Settings</div>
            </div>
        </div>

        <div class="nav-item-custom d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#vendorDropdown">
            <i class="bi bi-shop nav-icon me-3"></i>
            <strong class="flex-grow-1 text-dark">Vendors</strong>
            <i class="bi bi-chevron-down" style="font-size: 10px;"></i>
        </div>
        <div class="collapse" id="vendorDropdown">
            <div class="dropdown-custom">
                <div class="dropdown-item-custom">Vendor List</div>
                <div class="dropdown-item-custom">Add Vendors</div>
                <div class="dropdown-item-custom">Manage Vendors</div>
            </div>
        </div>
         <!-- Store - Client with Dropdown -->
        <div class="nav-item-custom d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#storeDropdown">
            <i class="bi bi-people nav-icon me-3"></i>
            <strong class="flex-grow-1 text-dark">Client</strong>
            <i class="bi bi-chevron-down text-dark" style="font-size: 10px;"></i>
        </div>
        <div class="collapse" id="storeDropdown">
            <div class="dropdown-custom">
                <div class="dropdown-item-custom">Clients List</div>
                <div class="dropdown-item-custom">Add Clients</div>
                <div class="dropdown-item-custom">Manage Clients</div>
            </div>
        </div>
        <!-- Store - Client with Dropdown -->
        <div class="nav-item-custom d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#crusherDropdown">
            <i class="bi bi-wrench nav-icon me-3"></i>
            <strong class="flex-grow-1 text-dark">Crushers</strong>
            <i class="bi bi-chevron-down text-dark" style="font-size: 10px;"></i>
        </div>
        <div class="collapse {{ Request::is('crusher*') ? 'show' : '' }}" id="crusherDropdown">
            <div class="dropdown-custom">
                <div class="my-2">
                    <a href="{{ route('crusher.list') }}" class="dropdown-item-custom text-decoration-none text-dark">
                        Crushers
                    </a>
                </div>
                <div class="my-2">
                    <a href="{{ route('crusher.create') }}" class="dropdown-item-custom text-decoration-none text-dark">
                        Add Crushers
                    </a>
                </div>
                <div class="dropdown-item-custom text-dark">Manage Crushers</div>
            </div>
        </div>
        <!-- Store - Client with Dropdown -->
        <div class="nav-item-custom d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#productsDropdown">
            <i class="bi bi-bag nav-icon me-3"></i>
            <strong class="flex-grow-1 text-dark">Products</strong>
            <i class="bi bi-chevron-down text-dark" style="font-size: 10px;"></i>
        </div>
        <div class="collapse" id="productsDropdown">
            <div class="dropdown-custom">
                <div class="dropdown-item-custom text-dark">Products List</div>
                <div class="dropdown-item-custom text-dark">Add Products</div>
                <div class="dropdown-item-custom text-dark">Manage Products</div>
            </div>
        </div>
        <!-- Authentication with Dropdown -->
        <div class="nav-item-custom d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#authDropdown">
            <i class="bi bi-shield-lock nav-icon me-3"></i>
            <strong class="flex-grow-1 text-dark">Authentication</strong>
            <i class="bi bi-chevron-down" style="font-size: 10px;"></i>
        </div>
        <div class="collapse {{ Request::is('authentication*') ? 'show' : '' }}" id="authDropdown">
            <div class="dropdown-custom">
                <div class="my-2">
                    <a href="{{ route('users.list') }}" class="dropdown-item-custom text-decoration-none text-dark">Admins</a>
                </div>
                <div class="my-2">
                    <a href="{{ route('employees.index') }}" class="dropdown-item-custom text-decoration-none text-dark">Employees</a>
                </div>
                <div class="my-1">
                    <a class="dropdown-item-custom text-decoration-none text-dark">Activity Logs</a>
                </div>
            </div>
        </div>



        <!-- Spaces Section -->
        <div class="section-title d-flex align-items-center">
            Accounting
            <span class="ms-auto text-primary" style="cursor: pointer;">+</span>
        </div>

        <!-- Replace the existing sections with these accounting-related items -->
        <div class="nav-item-custom d-flex align-items-center">
            <i class="bi bi-journal-text nav-icon me-3 text-dark"></i>
            <span class="flex-grow-1 text-dark">General Ledger</span>
        </div>

        <div class="nav-item-custom d-flex align-items-center">
            <i class="bi bi-cash-coin nav-icon me-3 text-dark"></i>
            <span class="flex-grow-1 text-dark">Cash Flow</span>
        </div>

        <div class="nav-item-custom d-flex align-items-center">
            <i class="bi bi-file-earmark-spreadsheet nav-icon me-3 text-dark"></i>
            <span class="flex-grow-1 text-dark">Financial Reports</span>
        </div>

        <!-- User Section -->
        <div class="user-section d-flex align-items-center">
            <div class="user-avatar rounded-circle me-3"></div>
            <div class="ms-auto d-flex gap-2">
                <button class="btn user-action-btn rounded d-flex align-items-center justify-content-center">
                    <i class="bi bi-folder"></i>
                </button>
                <button class="btn user-action-btn rounded d-flex align-items-center justify-content-center">
                    <i class="bi bi-arrow-repeat"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-wrapper border border-light-subtle">
            @yield('content')
            <!-- Header -->
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Handle dropdown arrow rotation
        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Create mobile menu button if it doesn't exist
            if (!document.querySelector('.mobile-menu-btn')) {
                const mobileBtn = document.createElement('button');
                mobileBtn.className = 'mobile-menu-btn';
                mobileBtn.innerHTML = '<i class="bi bi-list"></i>';
                document.body.appendChild(mobileBtn);
            }

            // Create sidebar overlay if it doesn't exist
            if (!document.querySelector('.sidebar-overlay')) {
                const overlay = document.createElement('div');
                overlay.className = 'sidebar-overlay';
                document.body.appendChild(overlay);
            }

            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.sidebar-overlay');

            // Toggle sidebar on mobile
            mobileMenuBtn.addEventListener('click', function() {
                sidebar.classList.toggle('sidebar-open');
                overlay.classList.toggle('show');
                document.body.style.overflow = sidebar.classList.contains('sidebar-open') ? 'hidden' : '';
            });

            // Close sidebar when clicking overlay
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('sidebar-open');
                overlay.classList.remove('show');
                document.body.style.overflow = '';
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 768 &&
                    !sidebar.contains(e.target) &&
                    !mobileMenuBtn.contains(e.target) &&
                    sidebar.classList.contains('sidebar-open')) {
                    sidebar.classList.remove('sidebar-open');
                    overlay.classList.remove('show');
                    document.body.style.overflow = '';
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('sidebar-open');
                    overlay.classList.remove('show');
                    document.body.style.overflow = '';
                }
            });
        });

        


    </script>
    @stack('scripts')
</body>
</html>
