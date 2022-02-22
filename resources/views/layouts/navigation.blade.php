<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>

        </div><a class="navbar-brand" href="index.html">
            <div class="d-flex align-items-center py-3"><img class="me-2" src="{{ asset('img/logo.png') }}"
                    alt="" width="84" />
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-chart-pie"></span></span><span
                                class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                    <a class="nav-link" href="/user" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span
                                class="nav-link-text ps-1">Master User</span>
                        </div>
                    </a>
                    <a class="nav-link" href="/activity-user" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user-check"></span></span><span
                                class="nav-link-text ps-1">Activity User</span>
                        </div>
                    </a>
                    <a class="nav-link" href="/info-seminar" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chalkboard-teacher"></span></span><span
                                class="nav-link-text ps-1">Info Seminar</span>
                        </div>
                    </a>
                    <a class="nav-link" href="/info-kemdikbud" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-university"></span></span><span
                                class="nav-link-text ps-1">Info Kemdikbud</span>
                        </div>
                    </a>
                    <a class="nav-link" href="/competition" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-chart-pie"></span></span><span
                                class="nav-link-text ps-1">Competition Update</span>
                        </div>
                    </a>
                    <a class="nav-link" href="/info-training" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-chalkboard-teacher"></span></span><span
                                class="nav-link-text ps-1">Info Training</span>
                        </div>
                    </a>
                    <a class="nav-link" href="/student-ex" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-chart-pie"></span></span><span
                                class="nav-link-text ps-1">Student Exchanges</span>
                        </div>
                    </a>
                    <a class="nav-link" href="/info-scholarship" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-school"></span></span><span
                                class="nav-link-text ps-1">Info Scholarship</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
