<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="" alt="<?=env("APP_NAME")?>" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?=env("APP_NAME")?></span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="" class="img-circle elevation-2" alt="User">
            </div>
            <div class="info">
                <a href="#" class="d-block">Hamza Hajjaji</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="<?=path("app_home")?>" class="nav-link <?=isset($isHome)?"active":""?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="<?=path("app_category")?>" class="nav-link <?=isset($isCategory)?"active":""?>">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>Category</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>