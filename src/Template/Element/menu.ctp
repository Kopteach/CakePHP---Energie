<nav class="navbar navbar-inverse nav-users">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?= $this->Html->link('INTRANET', ['controller' => 'Sites', 'action' => 'index'], ['class' => 'navbar-brand']) ?>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
             <?php if($loggedIn) : ?>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <?=  $this->Html->link('List of sites', ['controller' => 'Sites', 'action' => 'index']) ?>
                            </li>
                            <li>
                                <?=  $this->Html->link('Transport routes', ['controller' => 'Transports', 'action' => 'index']) ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                   <?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']) ?>
              </li>
            </ul>
            <?php else: ?>
            <ul class="nav navbar-nav navbar-right">
              <li>
                   <?= $this->Html->link('Register', ['controller' => 'Users', 'action' => 'add']) ?>
              </li>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>
