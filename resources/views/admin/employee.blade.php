@extends('layouts.admin-layout')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1 fw-bold text-dark">Employees</h1>
            <p class="text-muted mb-0">Manage your team members and their information</p>
        </div>
        <button class="btn btn-primary px-4 py-2 rounded-3 shadow-sm" data-bs-toggle="collapse" data-bs-target="#addEmployeeForm" aria-expanded="false">
            <i class="bi bi-plus-circle me-2"></i>Add Employee
        </button>
    </div>

    <!-- Collapsible Add Employee Form -->
    <div class="collapse mb-4" id="addEmployeeForm">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-light border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-semibold text-dark">Add New Employee</h5>
                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#addEmployeeForm">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label fw-semibold">First Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Enter first name">
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label fw-semibold">Last Name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Enter last name">
                        </div>
                        <div class="col-md-6">
                            <label for="empEmail" class="form-label fw-semibold">Email Address</label>
                            <input type="email" class="form-control" id="empEmail" placeholder="employee@company.com">
                        </div>
                        <div class="col-md-6">
                            <label for="empPhone" class="form-label fw-semibold">Phone Number</label>
                            <input type="tel" class="form-control" id="empPhone" placeholder="+1 (555) 000-0000">
                        </div>
                        <div class="col-md-6">
                            <label for="empDepartment" class="form-label fw-semibold">Department</label>
                            <select class="form-select" id="empDepartment">
                                <option value="">HSD</option>
                                <option value="hr">Crusher</option>
                                <option value="it">Accounting</option>
                                <option value="finance">Finance</option>
                                <option value="marketing">Sales</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="empRole" class="form-label fw-semibold">Job Title</label>
                            <input type="text" class="form-control" id="empRole" placeholder="Enter job title">
                        </div>
                        <div class="col-12">
                            <label for="empAddress" class="form-label fw-semibold">Address</label>
                            <textarea class="form-control" id="empAddress" rows="3" placeholder="Enter full address"></textarea>
                        </div>
                    </div>
                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-check-circle me-2"></i>Add Employee
                        </button>
                        <button type="button" class="btn btn-light px-4" data-bs-toggle="collapse" data-bs-target="#addEmployeeForm">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Filter & Search Section -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body py-3">
            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0 ps-0" placeholder="Search employees..." id="searchInput">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="departmentFilter">
                        <option value="">All Departments</option>
                        <option value="hr">Human Resources</option>
                        <option value="it">Information Technology</option>
                        <option value="finance">Finance</option>
                        <option value="marketing">Marketing</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-secondary w-100" id="clearFilters">
                        <i class="bi bi-arrow-clockwise me-1"></i>Reset
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Employee Table -->
    <div class="card border-0 shadow-sm rounded">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 py-3 px-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                </div>
                            </th>
                            <th class="border-0 py-3">Employee</th>
                            <th class="border-0 py-3">Department</th>
                            <th class="border-0 py-3">Role</th>
                            <th class="border-0 py-3">Status</th>
                            <th class="border-0 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-bottom">
                            <td class="px-4 py-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar bg-primary bg-gradient rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <span class="text-white fw-semibold">JD</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">John Doe</h6>
                                        <small class="text-muted">john.doe@company.com</small>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-light text-dark px-3 py-2 rounded-pill">Human Resources</span>
                            </td>
                            <td class="py-3">
                                <span class="text-dark fw-medium">HR Manager</span>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                                    <i class="bi bi-circle-fill me-1" style="font-size: 6px;"></i>Active
                                </span>
                            </td>
                            <td class="py-3 text-center">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-outline-primary rounded-start" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary" title="View">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger rounded-end" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="px-4 py-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar bg-info bg-gradient rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <span class="text-white fw-semibold">JS</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">Jane Smith</h6>
                                        <small class="text-muted">jane.smith@company.com</small>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-light text-dark px-3 py-2 rounded-pill">Information Technology</span>
                            </td>
                            <td class="py-3">
                                <span class="text-dark fw-medium">Senior Developer</span>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                                    <i class="bi bi-circle-fill me-1" style="font-size: 6px;"></i>Active
                                </span>
                            </td>
                            <td class="py-3 text-center">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-outline-primary rounded-start" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary" title="View">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger rounded-end" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-between align-items-center mt-4">
        <small class="text-muted">Showing 2 of 2 employees</small>
        <nav>
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
                <li class="page-item active">
                    <span class="page-link">1</span>
                </li>
                <li class="page-item disabled">
                    <span class="page-link">Next</span>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection
