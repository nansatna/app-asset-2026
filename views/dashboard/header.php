 <header class="d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-light border d-lg-none" id="mobileToggle">
            <i data-lucide="menu"></i>
        </button>
        <div class="d-none d-md-block">
            <div class="text-muted small fw-bold">Pages / Overview</div>
            <div class="fw-bold text-dark">Dashboard</div>
        </div>
    </div>

    <div class="d-flex align-items-center gap-4">
        <div class="d-none d-md-block text-muted cursor-pointer hover-dark">
            <i data-lucide="search" size="20"></i>
        </div>
        
        <div class="position-relative cursor-pointer">
            <i data-lucide="bell" size="20" class="text-muted"></i>
            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
        </div>

        <div class="dropdown">
            <div class="d-flex align-items-center gap-3 cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                <div class="text-end d-none d-sm-block">
                    <p class="mb-0 fw-bold small">Alex Morgan</p>
                    <p class="mb-0 text-muted" style="font-size: 0.7rem;">Super Admin</p>
                </div>
                <img src="https://ui-avatars.com/api/?name=Alex+Morgan&background=4f46e5&color=fff" width="40" height="40" class="rounded-circle border border-2 border-white shadow-sm">
            </div>

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-premium mt-2">
                <li class="px-3 py-2 border-bottom mb-2 bg-light rounded-top">
                    <p class="mb-0 fw-bold small text-dark">Alex Morgan</p>
                    <p class="mb-0 text-muted" style="font-size: 0.75rem;">alex@nexus-core.io</p>
                </li>
                <li><a class="dropdown-item dropdown-item-premium" href="#"><i data-lucide="user" size="16"></i> My Profile</a></li>
                <li><a class="dropdown-item dropdown-item-premium" href="#"><i data-lucide="credit-card" size="16"></i> Billing</a></li>
                <li><a class="dropdown-item dropdown-item-premium" href="#"><i data-lucide="settings" size="16"></i> Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item dropdown-item-premium text-danger" href="?pg=logout"><i data-lucide="log-out" size="16"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</header>