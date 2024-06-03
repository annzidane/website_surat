<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar with Dropdown Menu</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar .nav-item .nav-link {
            color: #fff;
        }
        .sidebar .nav-item .nav-link:hover {
            background-color: #2e59d9;
        }
        .sidebar .nav-item.hidden {
            display: none;
        }
        .sidebar {
            width: 300px;
            height: 100vh;
            position: sticky;
            top: 0;
            overflow-x: hidden;
            overflow-y: auto;
        }

    </style>
</head>
<body>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand sticky d-flex align-items-center justify-content-center" href="dashboard">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Nav Item - Profile -->
        <li class="nav-item">
            <a class="nav-link" href="/admin/users">
                <i class="fas fa-fw fa-user"></i>
                <span>Users</span>
            </a>
        </li>

        <!-- Nav Item - Pengajuan -->
        <li class="nav-item">
            <a class="nav-link" href="#" id="pengajuanMenu">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pengajuan</span>
            </a>
        </li>

        <!-- Hidden Menu Items -->
        <li class="nav-item hidden">
            <a class="nav-link" href="/admin/kematian">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Surat Keterangan Kematian</span>
            </a>
        </li>
        <li class="nav-item hidden">
            <a class="nav-link" href="/admin/usaha">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Surat Keterangan Usaha</span>
            </a>
        </li>
        <li class="nav-item hidden">
            <a class="nav-link" href="/admin/domisili">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Surat Keterangan Domisili</span>
            </a>
        </li>
        <li class="nav-item hidden">
            <a class="nav-link" href="/admin/nikah">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Surat Pengantar Nikah</span>
            </a>
        </li>
        <li class="nav-item hidden">
            <a class="nav-link" href="/admin/kelahiran">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Surat Keterangan Kelahiran</span>
            </a>
        </li>
        <li class="nav-item hidden">
            <a class="nav-link" href="/admin/pindah">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Surat Pengajuan Pindah</span>
            </a>
        </li>
        <li class="nav-item hidden">
            <a class="nav-link" href="/admin/sktm">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Surat Keterangan Tidak Mampu</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('pengajuanMenu').addEventListener('click', function(event) {
            event.preventDefault();
            const hiddenItems = document.querySelectorAll('.nav-item.hidden');
            hiddenItems.forEach(item => {
                if (item.style.display === "none" || item.style.display === "") {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>
