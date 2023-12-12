<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="<?php echo base_url('/'); ?>">
            <span class="text">Timesheet Web</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>
    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Menu</div>
                <div class="nav-item active">
                    <a href="<?php echo base_url('/'); ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                </div>
                
                <!-- menu administração -->
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-settings"></i><span>Administração</span></a>
                    <div class="submenu-content">
                        <a href="<?php echo base_url('usuario'); ?>" class="menu-item">Usuários</a>
                        <a href="<?php echo base_url('sistema'); ?>" class="menu-item">Sistema</a>
                        <a href="#" class="menu-item">Auditoria</a>
                    </div>
                </div>                
                
                <!-- menu cadastro -->
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-archive"></i><span>Cadastros</span></a>
                    <div class="submenu-content">
                        <a href="<?php echo base_url('cliente'); ?>" class="menu-item">Clientes</a>
                        <a href="<?php echo base_url('projeto'); ?>" class="menu-item">Projetos</a>
                        <a href="<?php echo base_url('atividade'); ?>" class="menu-item">Atividades</a>
                        <a href="<?php echo base_url('usuario'); ?>" class="menu-item">Grupos de Usuário</a>
                    </div>
                </div>                
                
                <!-- menu apontamento -->                
                <div class="nav-item has-sub">                    
                    <a href="javascript:void(0)"><i class="ik ik-box"></i><span>Operação</span></a>
                    <div class="submenu-content">
                        <a href="<?php echo base_url('apontamento'); ?>" class="menu-item">Apontamento</a>
                    </div>
                </div>
                
            </nav>
        </div>
    </div>
</div>
