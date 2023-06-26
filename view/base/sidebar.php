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
                <li class="nav-item">
                    <a href="<?=path("app_admin_home")?>" class="nav-link <?=isset($isHome)?"active":""?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=path("app_admin_category")?>" class="nav-link <?=isset($isCategory)?"active":""?>">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=path("app_admin_quiz")?>" class="nav-link <?=isset($isQuiz)?"active":""?>">
                        <i class="nav-icon fas fa-broom"></i>
                        <p>Quiz</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=path("app_admin_exam")?>" class="nav-link <?=isset($isExam)?"active":""?>">
                        <i class="nav-icon fas fa-star"></i>
                        <p>Exam</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=path("app_admin_user")?>" class="nav-link <?=isset($isUser)?"active":""?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=path("app_admin_setting")?>" class="nav-link <?=isset($isSeting)?"active":""?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Setting</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>