<ul class="nav">
            <li class="nav-item mb-4">
                <a class="nav-link" href="<?php print Main::url_for("/app/") ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box link-icon">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mb-4">
                <a class="nav-link" href="<?php print Main::url_for("/app/statements.php") ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar link-icon">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span class="menu-title">Transactions</span>
                </a>
            </li>

            <li class="nav-item mb-4">
                <a class="nav-link" data-toggle="collapse" href="#ecommerce" aria-expanded="false" aria-controls="ecommerce">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart link-icon">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span class="menu-title">Fund Transfer</span>
                    <i class="ti-angle-right"></i>
                </a>
                <div class="collapse" id="ecommerce">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item mb-4"> <a class="nav-link" href="<?php print Main::url_for("/app/transfer.php") ?>">Overseas</a></li>
                        <li class="nav-item mb-4"> <a class="nav-link" href="<?php print Main::url_for("/app/transfer.php") ?>">Inter Bank</a></li>
                        <li class="nav-item mb-4"> <a class="nav-link" href="<?php print Main::url_for("/app/transfer.php") ?>">Intra Bank</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item mb-4">
                <a class="nav-link" data-toggle="collapse" href="#advanced" aria-expanded="false" aria-controls="advanced">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit link-icon">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    <span class="menu-title">Virtual Card</span>
                    <i class="ti-angle-right"></i>
                </a>
                <div class="collapse" id="advanced">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item mb-4"> <a class="nav-link" href="#">Card list</a></li>
                        <li class="nav-item mb-4"> <a class="nav-link" href="#">Request New</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item mb-4">
                <a class="nav-link" data-toggle="collapse" href="#email" aria-expanded="false" aria-controls="email">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail link-icon">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <span class="menu-title">Contact Us</span>
                    <i class="ti-angle-right"></i>
                </a>
                <div class="collapse" id="email">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item mb-4"><a class="nav-link" href="mailto:<?php print SITE_EMAIL ?>">Account Manager</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item mb-4">
                <a class="nav-link" href="<?php print Main::url_for("/app/profile.php") ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users link-icon">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span class="menu-title">Profile</span>
                </a>
            </li>
           
            <li class="nav-item mb-4">
                <a class="nav-link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list link-icon">
                        <line x1="8" y1="6" x2="21" y2="6"></line>
                        <line x1="8" y1="12" x2="21" y2="12"></line>
                        <line x1="8" y1="18" x2="21" y2="18"></line>
                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                        <line x1="3" y1="18" x2="3.01" y2="18"></line>
                    </svg>
                    <span class="menu-title">Loans and mortgages</span>
                </a>
            </li>
            
    
        </ul>