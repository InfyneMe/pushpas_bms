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
                            <a href="" class="breadcrumb-link-modern">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                </svg>
                                Dashboard
                            </a>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="breadcrumb-separator-modern">
                                <polyline points="9,18 15,12 9,6"/>
                            </svg>
                            <span class="breadcrumb-current-modern">Crushers</span>
                        </nav>
                        <div class="title-section">
                            <h1 class="page-title-modern">
                                <div class="title-icon">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                                    </svg>
                                </div>
                                Crushers Management
                            </h1>
                            <p class="page-subtitle-modern">Manage all crusher entries, locations and specifications</p>
                        </div>
                    </div>
                    <div class="header-right-modern">
                        <a href="{{ route('crusher.create') }}" class="btn-primary-modern">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Add New Crusher
                        </a>
                    </div>
                </div>
            </div>

            <!-- Filters and Search -->
            <div class="filters-card-modern">
                <div class="filters-content">
                    <div class="search-section">
                        <div class="search-wrapper">
                            <input type="text" 
                                   id="searchInput" 
                                   class="search-input-modern" 
                                   placeholder="Search crushers by name, location, or GST..."
                                   value="{{ request('search') }}">
                            <div class="search-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="11" cy="11" r="8"/>
                                    <path d="m21 21-4.35-4.35"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <div class="filter-section">
                        <select id="statusFilter" class="filter-select-modern">
                            <option value="">All Status</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>🟢 Active</option>
                            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>🔴 Inactive</option>
                            <option value="maintenance" {{ request('status') == 'maintenance' ? 'selected' : '' }}>🟡 Maintenance</option>
                        </select>
                        
                        <select id="weightFilter" class="filter-select-modern">
                            <option value="">Weight Bridge</option>
                            <option value="1" {{ request('has_weight') == '1' ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ request('has_weight') == '0' ? 'selected' : '' }}>Not Available</option>
                        </select>

                        <button type="button" class="btn-filter-reset" id="resetFilters">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/>
                                <path d="M21 3v5h-5"/>
                                <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/>
                                <path d="M3 21v-5h5"/>
                            </svg>
                            Reset
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table Container -->
            <div class="table-container-modern">
                <div class="table-header-modern">
                    <div class="table-info">
                        <span class="results-count">
                            <strong>{{ $crushers->total() }}</strong> crushers found
                        </span>
                    </div>
                    <div class="table-actions">
                        <button class="btn-export-modern" onclick="exportData()">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                <polyline points="7,10 12,15 17,10"/>
                                <line x1="12" y1="15" x2="12" y2="3"/>
                            </svg>
                            Export
                        </button>
                    </div>
                </div>

                @if($crushers->count() > 0)
                <div class="table-wrapper">
                    <table class="table-modern">
                        <thead>
                            <tr>
                                <th class="sortable" data-sort="name">
                                    <div class="th-content">
                                        <span>Crusher Details</span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M8 9l4-4 4 4"/>
                                            <path d="M16 15l-4 4-4-4"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="sortable" data-sort="status">
                                    <div class="th-content">
                                        <span>Status</span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M8 9l4-4 4 4"/>
                                            <path d="M16 15l-4 4-4-4"/>
                                        </svg>
                                    </div>
                                </th>
                                <th>Location</th>
                                <th class="sortable" data-sort="capacity">
                                    <div class="th-content">
                                        <span>Capacity</span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M8 9l4-4 4 4"/>
                                            <path d="M16 15l-4 4-4-4"/>
                                        </svg>
                                    </div>
                                </th>
                                <th>Features</th>
                                <th>Business Info</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($crushers as $crusher)
                            <tr class="table-row-modern">
                                <td>
                                    <div class="crusher-info">
                                        <div class="crusher-icon">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                                            </svg>
                                        </div>
                                        <div class="crusher-details">
                                            <div class="crusher-name">{{ $crusher->name }}</div>
                                            <div class="crusher-uuid">ID: {{ substr($crusher->uuid, 0, 8) }}...</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $crusher->status }}">
                                        @if($crusher->status == 'active')
                                            <span class="status-dot bg-success"></span>
                                            Active
                                        @elseif($crusher->status == 'inactive')
                                            <span class="status-dot bg-danger"></span>
                                            Inactive
                                        @else
                                            <span class="status-dot bg-warning"></span>
                                            Maintenance
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <div class="location-info">
                                        <div class="location-icon">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                                <circle cx="12" cy="10" r="3"/>
                                            </svg>
                                        </div>
                                        <div class="location-text">
                                            {{ Str::limit($crusher->location, 50) }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="capacity-info">
                                        <span class="capacity-value">{{ number_format($crusher->capacity, 2) }}</span>
                                        <span class="capacity-unit">tons/hour</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="features-list">
                                        <span class="feature-badge {{ $crusher->has_weight ? 'feature-available' : 'feature-unavailable' }}">
                                            @if($crusher->has_weight)
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                                    <polyline points="22,4 12,14.01 9,11.01"/>
                                                </svg>
                                                Weight Bridge
                                            @else
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <line x1="18" y1="6" x2="6" y2="18"/>
                                                    <line x1="6" y1="6" x2="18" y2="18"/>
                                                </svg>
                                                No Weight Bridge
                                            @endif
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    @if($crusher->gst_number)
                                        <div class="gst-info">
                                            <div class="gst-label">GST:</div>
                                            <div class="gst-number">{{ $crusher->gst_number }}</div>
                                        </div>
                                    @else
                                        <span class="text-muted-modern">—</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-view" onclick="viewCrusher('{{ $crusher->uuid }}')" title="View Details">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                                <circle cx="12" cy="12" r="3"/>
                                            </svg>
                                        </button>
                                        <a href="" class="btn-action btn-edit" title="Edit Crusher">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M12 20h9"/>
                                                <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                                            </svg>
                                        </a>
                                        <button class="btn-action btn-delete" onclick="deleteCrusher('{{ $crusher->uuid }}', '{{ $crusher->name }}')" title="Delete Crusher">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="3,6 5,6 21,6"/>
                                                <path d="m19,6v14a2,2 0 0,1 -2,2H7a2,2 0 0,1 -2,-2V6m3,0V4a2,2 0 0,1 2,-2h4a2,2 0 0,1 2,2v2"/>
                                                <line x1="10" y1="11" x2="10" y2="17"/>
                                                <line x1="14" y1="11" x2="14" y2="17"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination-wrapper-modern">
                    <div class="pagination-info">
                        <span>Showing {{ $crushers->firstItem() }} to {{ $crushers->lastItem() }} of {{ $crushers->total() }} entries</span>
                    </div>
                    <div class="pagination-links">
                        {{ $crushers->appends(request()->query())->links() }}
                    </div>
                </div>
                @else
                <!-- Empty State -->
                <div class="empty-state-modern">
                    <div class="empty-icon">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                        </svg>
                    </div>
                    <h3>No Crushers Found</h3>
                    <p>There are no crushers matching your current filters.</p>
                    <a href="{{ route('crusher.create') }}" class="btn-primary-modern">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Add First Crusher
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    /* CSS Variables (same as form) */
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

    /* Header Styles (reusing from form) */
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

    .btn-primary-modern {
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
        background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
        color: white;
        box-shadow: var(--shadow-md);
    }

    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        background: linear-gradient(135deg, var(--primary-hover), #3730a3);
        text-decoration: none;
        color: white;
    }

    /* Filters Card */
    .filters-card-modern {
        background: var(--surface-color);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-color);
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .filters-content {
        padding: 1.5rem 2rem;
        display: flex;
        gap: 2rem;
        align-items: center;
        flex-wrap: wrap;
    }

    .search-section {
        flex: 1;
        min-width: 300px;
    }

    .search-wrapper {
        position: relative;
    }

    .search-input-modern {
        width: 100%;
        padding: 0.875rem 1rem;
        padding-right: 3rem;
        border: 2px solid var(--border-color);
        border-radius: var(--radius-md);
        font-size: 0.875rem;
        background: var(--surface-color);
        transition: var(--transition);
    }

    .search-input-modern:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .search-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-secondary);
    }

    .filter-section {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .filter-select-modern {
        padding: 0.75rem 1rem;
        border: 2px solid var(--border-color);
        border-radius: var(--radius-md);
        font-size: 0.875rem;
        background: var(--surface-color);
        color: var(--text-primary);
        cursor: pointer;
        transition: var(--transition);
        min-width: 140px;
    }

    .filter-select-modern:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .btn-filter-reset {
        padding: 0.75rem 1rem;
        background: transparent;
        border: 2px solid var(--border-color);
        border-radius: var(--radius-md);
        color: var(--text-secondary);
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
    }

    .btn-filter-reset:hover {
        border-color: var(--danger-color);
        color: var(--danger-color);
        background: rgba(239, 68, 68, 0.05);
    }

    /* Table Container */
    .table-container-modern {
        background: var(--surface-color);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--border-color);
        overflow: hidden;
    }

    .table-header-modern {
        padding: 1.5rem 2rem;
        background: linear-gradient(135deg, #fafbfc, #f8fafc);
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .results-count {
        color: var(--text-secondary);
        font-size: 0.875rem;
    }

    .btn-export-modern {
        padding: 0.5rem 1rem;
        background: var(--surface-color);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-sm);
        color: var(--text-secondary);
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
    }

    .btn-export-modern:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    /* Table Styles */
    .table-wrapper {
        overflow-x: auto;
    }

    .table-modern {
        width: 100%;
        border-collapse: collapse;
    }

    .table-modern th {
        background: #fafbfc;
        padding: 1rem 1.5rem;
        text-align: left;
        font-weight: 600;
        font-size: 0.875rem;
        color: var(--text-primary);
        border-bottom: 2px solid var(--border-color);
        white-space: nowrap;
    }

    .table-modern th.sortable {
        cursor: pointer;
        user-select: none;
        transition: var(--transition);
    }

    .table-modern th.sortable:hover {
        background: #f1f5f9;
    }

    .th-content {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .table-modern td {
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .table-row-modern {
        transition: var(--transition);
    }

    .table-row-modern:hover {
        background: #fafbfc;
    }

    /* Crusher Info */
    .crusher-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .crusher-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        flex-shrink: 0;
    }

    .crusher-name {
        font-weight: 600;
        color: var(--text-primary);
        font-size: 0.875rem;
    }

    .crusher-uuid {
        font-size: 0.75rem;
        color: var(--text-secondary);
        font-family: monospace;
    }

    /* Status Badge */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .status-active {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .status-inactive {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
    }

    .status-maintenance {
        background: rgba(245, 158, 11, 0.1);
        color: var(--warning-color);
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }

    .bg-success { background: var(--success-color); }
    .bg-danger { background: var(--danger-color); }
    .bg-warning { background: var(--warning-color); }

    /* Location Info */
    .location-info {
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
        max-width: 200px;
    }

    .location-icon {
        color: var(--text-secondary);
        margin-top: 0.125rem;
        flex-shrink: 0;
    }

    .location-text {
        font-size: 0.875rem;
        color: var(--text-primary);
        line-height: 1.4;
    }

    /* Capacity Info */
    .capacity-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .capacity-value {
        font-weight: 600;
        color: var(--text-primary);
        font-size: 0.875rem;
    }

    .capacity-unit {
        font-size: 0.75rem;
        color: var(--text-secondary);
    }

    /* Features */
    .feature-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.25rem 0.625rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .feature-available {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .feature-unavailable {
        background: rgba(107, 114, 128, 0.1);
        color: var(--text-secondary);
    }

    /* GST Info */
    .gst-info {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .gst-label {
        font-size: 0.75rem;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .gst-number {
        font-size: 0.75rem;
        color: var(--text-primary);
        font-family: monospace;
        font-weight: 500;
    }

    .text-muted-modern {
        color: var(--text-secondary);
        font-size: 0.875rem;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .btn-action {
        width: 32px;
        height: 32px;
        border-radius: var(--radius-sm);
        border: 1px solid var(--border-color);
        background: var(--surface-color);
        color: var(--text-secondary);
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    .btn-view:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
        background: rgba(79, 70, 229, 0.05);
    }

    .btn-edit:hover {
        border-color: var(--warning-color);
        color: var(--warning-color);
        background: rgba(245, 158, 11, 0.05);
    }

    .btn-delete:hover {
        border-color: var(--danger-color);
        color: var(--danger-color);
        background: rgba(239, 68, 68, 0.05);
    }

    /* Pagination */
    .pagination-wrapper-modern {
        padding: 1.5rem 2rem;
        background: #fafbfc;
        border-top: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pagination-info {
        color: var(--text-secondary);
        font-size: 0.875rem;
    }

    /* Empty State */
    .empty-state-modern {
        padding: 4rem 2rem;
        text-align: center;
        color: var(--text-secondary);
    }

    .empty-icon {
        margin-bottom: 1.5rem;
        opacity: 0.5;
    }

    .empty-state-modern h3 {
        margin-bottom: 0.5rem;
        color: var(--text-primary);
    }

    .empty-state-modern p {
        margin-bottom: 2rem;
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

        .filters-content {
            flex-direction: column;
            align-items: stretch;
            gap: 1rem;
        }

        .search-section {
            min-width: auto;
        }

        .filter-section {
            justify-content: space-between;
        }

        .table-wrapper {
            overflow-x: scroll;
        }

        .action-buttons {
            flex-wrap: wrap;
        }

        .pagination-wrapper-modern {
            flex-direction: column;
            gap: 1rem;
            align-items: center;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const weightFilter = document.getElementById('weightFilter');
        const resetButton = document.getElementById('resetFilters');

        let searchTimeout;

        // Debounced search
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                applyFilters();
            }, 300);
        });

        // Filter changes
        statusFilter.addEventListener('change', applyFilters);
        weightFilter.addEventListener('change', applyFilters);

        // Reset filters
        resetButton.addEventListener('click', function() {
            searchInput.value = '';
            statusFilter.value = '';
            weightFilter.value = '';
            applyFilters();
        });

        function applyFilters() {
            const params = new URLSearchParams();
            
            if (searchInput.value) params.set('search', searchInput.value);
            if (statusFilter.value) params.set('status', statusFilter.value);
            if (weightFilter.value) params.set('has_weight', weightFilter.value);

            const url = new URL(window.location);
            url.search = params.toString();
            window.location.href = url.toString();
        }

        // Sortable columns
        document.querySelectorAll('.sortable').forEach(header => {
            header.addEventListener('click', function() {
                const sort = this.dataset.sort;
                const currentUrl = new URL(window.location);
                const currentSort = currentUrl.searchParams.get('sort');
                const currentDirection = currentUrl.searchParams.get('direction');

                let newDirection = 'asc';
                if (currentSort === sort && currentDirection === 'asc') {
                    newDirection = 'desc';
                }

                currentUrl.searchParams.set('sort', sort);
                currentUrl.searchParams.set('direction', newDirection);
                window.location.href = currentUrl.toString();
            });
        });
    });

    // View crusher details
    function viewCrusher(uuid) {
        // You can implement a modal or redirect to view page
        window.location.href = `/crushers/${uuid}`;
    }

    // Delete crusher with confirmation
    function deleteCrusher(uuid, name) {
        if (confirm(`Are you sure you want to delete "${name}"? This action cannot be undone.`)) {
            // Create form and submit
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/crushers/${uuid}`;
            
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (csrfToken) {
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = csrfToken.content;
                form.appendChild(csrfInput);
            }

            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            form.appendChild(methodInput);

            document.body.appendChild(form);
            form.submit();
        }
    }

    // Export functionality
    function exportData() {
        const params = new URLSearchParams(window.location.search);
        params.set('export', 'csv');
        window.location.href = `${window.location.pathname}?${params.toString()}`;
    }
</script>
@endsection
