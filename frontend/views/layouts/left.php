<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
		
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
					['label' => Yii::t('app', 'Logout'), 'icon' => 'power-off', 'url' => ['./site/logout']],
					['label' => Yii::t('app', 'RBAC'),
							'icon' => 'circle-o',
							'url' => '#',
							'active' => in_array($this->context->route, [
								'admin/route/index',
								'admin/permission/index',
								'admin/permission/view',
								'admin/permission/update',
								'admin/menu/index',
								'admin/role/index',
								'admin/role/view',
								'admin/role/update',
								'admin/assignment/index',
								'admin/assignment/view',
								'admin/user/index',
								'admin/user/view',
							]),
							'items' => [
								[
									'label' => Yii::t('app', 'Route'),
									'icon' => 'circle-o',
									'url' => ['/admin/route'],
									'active' => $this->context->route == 'control/index',
								],
								[
									'label' => Yii::t('app', 'Permission'),
									'icon' => 'circle-o',
									'url' => ['/admin/permission'],
									'active' => $this->context->route == 'control-param/index',
								],
								[
									'label' => Yii::t('app', 'Menu'),
									'icon' => 'circle-o',
									'url' => ['/admin/menu'],
									'active' => $this->context->route == 'map/index',
								],
								[
									'label' => Yii::t('app', 'Role'),
									'icon' => 'circle-o',
									'url' => ['/admin/role'],
									'active' => $this->context->route == 'map/index',
								],
								[
									'label' => Yii::t('app', 'Assignment'),
									'icon' => 'circle-o',
									'url' => ['/admin/assignment'],
									'active' => $this->context->route == 'map/index',
								],
								[
									'label' => Yii::t('app', 'User'),
									'icon' => 'circle-o',
									'url' => ['/admin/user'],
									'active' => $this->context->route == 'map/index',
								],
							],
						],
                ],
            ]
        ) ?>

    </section>
</aside>
