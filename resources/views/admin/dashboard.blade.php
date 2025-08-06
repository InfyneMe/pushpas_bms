@extends('layouts.admin-layout')
@section('content')
    {{-- <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-semibold text-dark mb-0">Overview</h1>
        <div class="d-flex gap-3">
            <button class="btn btn-outline-secondary btn-sm px-3">Export</button>
            <select class="form-select form-select-sm" style="width: auto;">
                <option>September, 2024</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Swift Setup Card -->
            <div class="setup-card mb-4">
                <div class="setup-illustration">👥</div>
                <h2 class="h4 fw-semibold text-dark mb-3">Swift Setup for New Teams</h2>
                <p class="text-muted mb-4">
                    Enhance team formation and management with easy-to-use tools for communication,<br>
                    task organization, and progress tracking, all in one place.
                </p>
                <button class="btn btn-primary px-4">Create Team</button>
            </div>

            <!-- Teams Section -->
            <div class="teams-section">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="h5 fw-semibold text-dark mb-0">Teams</h3>
                    <input type="text" class="form-control form-control-sm" placeholder="Search teams..."
                        style="width: 200px;">
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0 teams-table">
                        <thead>
                            <tr>
                                <th class="border-0 py-3">Team</th>
                                <th class="border-0 py-3">Rating</th>
                                <th class="border-0 py-3">Last Modified</th>
                                <th class="border-0 py-3">Members</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border-0 py-3">
                                    <div class="fw-medium text-dark">Product Management</div>
                                    <div class="team-description">Product development & lifecycle</div>
                                </td>
                                <td class="border-0 py-3"><span class="rating">★★★★★</span></td>
                                <td class="border-0 py-3">21 Oct, 2024</td>
                                <td class="border-0 py-3">
                                    <div class="d-flex">
                                        <div class="member-avatar rounded-circle bg-danger"></div>
                                        <div class="member-avatar rounded-circle bg-info"></div>
                                        <div class="member-avatar rounded-circle bg-primary"></div>
                                        <div class="member-avatar rounded-circle bg-warning"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-0 py-3">
                                    <div class="fw-medium text-dark">Marketing Team</div>
                                    <div class="team-description">Campaigns & market analysis</div>
                                </td>
                                <td class="border-0 py-3"><span class="rating">★★★★☆</span></td>
                                <td class="border-0 py-3">15 Oct, 2024</td>
                                <td class="border-0 py-3">
                                    <div class="d-flex">
                                        <div class="member-avatar rounded-circle bg-success"></div>
                                        <div class="member-avatar rounded-circle bg-secondary"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-0 py-3">
                                    <div class="fw-medium text-dark">HR Department</div>
                                    <div class="team-description">Talent acquisition, employee welfare</div>
                                </td>
                                <td class="border-0 py-3"><span class="rating">★★★★★</span></td>
                                <td class="border-0 py-3">10 Oct, 2024</td>
                                <td class="border-0 py-3">
                                    <div class="d-flex">
                                        <div class="member-avatar rounded-circle" style="background: #6c5ce7;"></div>
                                        <div class="member-avatar rounded-circle" style="background: #a29bfe;"></div>
                                        <div class="member-avatar rounded-circle" style="background: #fd79a8;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-0 py-3">
                                    <div class="fw-medium text-dark">Sales Division</div>
                                    <div class="team-description">Customer relations, sales strategy</div>
                                </td>
                                <td class="border-0 py-3"><span class="rating">★★★★★</span></td>
                                <td class="border-0 py-3">05 Oct, 2024</td>
                                <td class="border-0 py-3">
                                    <div class="d-flex">
                                        <div class="member-avatar rounded-circle" style="background: #00b894;"></div>
                                        <div class="member-avatar rounded-circle" style="background: #00cec9;"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Show 5 per page</small>
                    <small class="text-muted">1-4 of 4 &lt; 1 &gt;</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Block List Card -->
            <div class="block-list-card">
                <h3 class="h5 fw-semibold text-dark mb-3">Block List</h3>
                <p class="small text-muted mb-3">
                    Users on the block list are unable to send chat requests or messages to you anymore, ever, or again
                </p>

                <div class="d-flex mb-3">
                    <input type="text" class="form-control form-control-sm me-2" placeholder="Block new user">
                    <button class="btn btn-primary btn-sm px-3">Add</button>
                </div>

                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="blocked-user-avatar rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="background: #3699ff;">EH</div>
                        <div>
                            <div class="fw-medium" style="font-size: 13px;">Esther Howard</div>
                            <div class="user-commits">2 commits</div>
                        </div>
                    </div>
                    <button class="delete-btn">🗑️</button>
                </div>

                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="blocked-user-avatar rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="background: #50cd89;">TH</div>
                        <div>
                            <div class="fw-medium" style="font-size: 13px;">Tyler Hero</div>
                            <div class="user-commits">24 commits</div>
                        </div>
                    </div>
                    <button class="delete-btn">🗑️</button>
                </div>

                <div class="d-flex justify-content-between align-items-center py-2">
                    <div class="d-flex align-items-center">
                        <div class="blocked-user-avatar rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="background: #a1a5b7;">AM</div>
                        <div>
                            <div class="fw-medium" style="font-size: 13px;">Arlene McCoy</div>
                            <div class="user-commits">34 commits</div>
                            <div style="font-size: 11px; color: #a1a5b7;">Archive Windows</div>
                        </div>
                    </div>
                    <button class="delete-btn">🗑️</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
