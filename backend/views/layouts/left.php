<aside class="main-sidebar">
    <section class="sidebar">
        <?php

        // Workspaces
        use common\models\WorkspaceChild;

        $WorkspaceChild = new WorkspaceChild();
        $parent = [];

        function getChildIds($array)
        {
            $WorkspaceChild = new WorkspaceChild();
            $ids = [];

            foreach ($array as $key => $item) {
                $childs = $WorkspaceChild->getChilds($item['id']);
                if (isset($item['id']) && !empty($childs)) {
                    $ids = array_merge($ids, getChildIds($childs));
                    $ids[] = $item['id'];
                } else {
                    $ids[] = $item['id'];
                }
            }
            return $ids;
        }

        function createMenuTree($array, $ident = [])
        {
            $WorkspaceChild = new WorkspaceChild();
            $menu = [];
            foreach ($array as $key => $item) {
                if (isset($item['id']) && !empty($WorkspaceChild->getChilds($item['id']))) {
                    $childs = $WorkspaceChild->getChilds($item['id']);
                    $ids = getChildIds($childs);
                    $ids[] = $item['id'];
                    var_dump($item);
                    $menu[] = [
                        'label' => $item['name'],
                        'icon' => $item['ico'] ? $item['ico'] : 'circle-thin',
                        'url' => '/su/workspace/public/*?id=' . $item['id'],
                        'template' => '<i class="fa fa-circle-thin" style="margin-left: 15px"></i><a href="{url}" class="url-class left" style="display: inline-block; padding-left: -4px;">{label}</a> <a href="{url}" style="float: right"><span></span> <i class="fa fa-angle-left pull-right"></i></a>',
                        'items' => createMenuTree($childs, $ids),
                        'active' => Yii::$app->controller->id === 'workspace' && in_array(Yii::$app->request->get('id'), $ids),
                    ];
                } else {
                    $menu[] = [
                        'label' => $item['name'],
                        'icon' => $item['ico'] ? $item['ico'] : 'circle-thin',
                        'url' => '/su/workspace/public/*?id=' . $item['id'],
                        'active' => Yii::$app->controller->id === 'workspace' && Yii::$app->request->get('id') == $item['id']
                    ];
                }
            }
            return $menu;
        }

        $workspacesMenuTree = createMenuTree($WorkspaceChild->getMainNames());

        ?>

        <?php

        $items = [
            ['label' => $profile->surname . ' ' . mb_substr($profile->name, 0, 1) . '. ' . mb_substr($profile->patronymic, 0, 1) . '.', 'icon' => 'user-o', 'url' => ['profile/update/*?id=' . $profile->user_id]],
            ['label' => Yii::t('app', 'Logout'), 'icon' => 'power-off', 'url' => ['./site/logout']],
            ['label' => 'Меню пользователя', 'options' => ['class' => 'header']],
        ];

        $items = array_merge($items, $workspacesMenuTree);

        $userRoles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
        if (array_key_exists('Administrator', $userRoles)) {
            $adminItems = [
                ['label' => 'Меню администратора', 'options' => ['class' => 'header']],
                ['label' => 'Рабочая зона', 'icon' => 'folder-open', 'url' => ['/workspace'],
                    'active' => in_array($this->context->route, [
                        'workspace/index',
                        'workspace/view',
                        'workspace/update',
                        'workspace/create',
                    ])
                ],
                ['label' => 'Документы', 'icon' => 'file-o', 'url' => ['/document'],
                    'active' => in_array($this->context->route, [
                        'document/index',
                        'document/view',
                        'document/update',
                        'document/create',
                    ])
                ],
                ['label' => 'Отчеты', 'icon' => 'line-chart', 'url' => ['/reports'],
                    'active' => in_array($this->context->route, [
                        'reports/index',
                        'reports/view',
                        'reports/update',
                        'reports/create',
                    ])
                ],
                ['label' => Yii::t('app', 'Параметры документов'),
                    'icon' => 'file-text',
                    'url' => '#',
                    'active' => in_array($this->context->route, [
                        'document/index',
                        'document/view',
                        'document/update',
                        'document/create',
                        'document-param/index',
                        'document-param/view',
                        'document-param/update',
                        'document-param/create',
                        'document-form/index',
                        'document-form/view',
                        'document-form/update',
                        'document-form/create',
                        'document-form-params/index',
                        'document-form-params/view',
                        'document-form-params/update',
                        'document-form-params/create',
                        'document-type/index',
                        'document-type/view',
                        'document-type/update',
                        'document-type/create',
                    ]),
                    'items' => [
                        ['label' => 'Параметры документа', 'icon' => 'file-archive-o', 'url' => ['/document-param'],
                            'active' => in_array($this->context->route, [
                                'document-param/index',
                                'document-param/view',
                                'document-param/update',
                                'document-param/create',
                            ])
                        ],
                        ['label' => 'Формы документов', 'icon' => 'list-alt', 'url' => ['/document-form'],
                            'active' => in_array($this->context->route, [
                                'document-form/index',
                                'document-form/view',
                                'document-form/update',
                                'document-form/create',
                            ])
                        ],
                        ['label' => 'Параметры формы', 'icon' => 'cogs', 'url' => ['/document-form-params'],
                            'active' => in_array($this->context->route, [
                                'document-form-params/index',
                                'document-form-params/view',
                                'document-form-params/update',
                                'document-form-params/create',
                            ])
                        ],
                        ['label' => 'Типы документов', 'icon' => 'exchange', 'url' => ['/document-type'],
                            'active' => in_array($this->context->route, [
                                'document-type/index',
                                'document-type/view',
                                'document-type/update',
                                'document-type/create',
                            ])
                        ],
                    ]
                ],
                [
                    'label' => Yii::t('app', 'Пользователи'),
                    'icon' => 'user',
                    'url' => ['/admin/user'],
                    'active' => $this->context->route == 'admin/user/index',
                ],
                [
                    'label' => 'Профили пользователей',
                    'icon' => 'user-secret',
                    'url' => ['/profile'],
                    'active' => in_array($this->context->route, [
                        'profile/index',
                        'profile/view',
                        'profile/update',
                        'profile/create',
                    ])
                ],
                ['label' => Yii::t('app', 'Распределение доступа'),
                    'icon' => 'id-card-o',
                    'url' => '#',
                    'active' => in_array($this->context->route, [
                        'admin/route/index',
                        'admin/permission/index',
                        'admin/permission/view',
                        'admin/permission/update',
                        'admin/permission/create',
                        'admin/menu/index',
                        'admin/role/index',
                        'admin/role/view',
                        'admin/role/update',
                        'admin/assignment/index',
                        'admin/assignment/view',
                        'admin/rule/index',
                        'admin/rule/create',
                        'admin/rule/view',
                        'admin/rule/update',
                    ]),
                    'items' => [
                        [
                            'label' => Yii::t('app', 'Уровни доступа'),
                            'icon' => 'paperclip',
                            'url' => ['/admin/assignment'],
                            'active' => in_array($this->context->route, [
                                'admin/assignment/index',
                                'admin/assignment/view',
                            ])
                        ],
                        [
                            'label' => Yii::t('app', 'Маршруты'),
                            'icon' => 'map-signs',
                            'url' => ['/admin/route'],
                            'active' => $this->context->route == 'admin/route/index',
                        ],
                        // [
                        // 'label' => Yii::t('app', 'Правила'),
                        // 'icon' => 'cubes',
                        // 'url' => ['/admin/rule'],
                        // 'active' => in_array($this->context->route, [
                        // 'admin/rule/index',
                        // 'admin/rule/view',
                        // 'admin/rule/create',
                        // 'admin/rule/update',
                        // ])
                        // ],
                        [
                            'label' => Yii::t('app', 'Разрешения'),
                            'icon' => 'file-text-o',
                            'url' => ['/admin/permission'],
                            'active' => in_array($this->context->route, [
                                'admin/permission/index',
                                'admin/permission/view',
                                'admin/permission/create',
                                'admin/permission/update',
                            ])
                        ],
                        [
                            'label' => Yii::t('app', 'Роли'),
                            'icon' => 'star',
                            'url' => ['/admin/role'],
                            'active' => in_array($this->context->route, [
                                'admin/role/index',
                                'admin/role/view',
                            ])
                        ],

                    ],
                ],
                ['label' => 'Файлы', 'icon' => 'file', 'url' => ['/files'],
                    'active' => in_array($this->context->route, [
                        'files/index',
                        'files/view',
                        'files/update',
                        'files/create',
                    ])
                ],
                ['label' => 'Виджеты', 'icon' => 'eye', 'url' => ['/widget'],
                    'active' => in_array($this->context->route, [
                        'widget/index',
                        'widget/view',
                        'widget/update',
                        'widget/create',
                    ])
                ],
                ['label' => 'Типы данных', 'icon' => 'puzzle-piece', 'url' => ['/data-type'],
                    'active' => in_array($this->context->route, [
                        'data-type/index',
                        'data-type/view',
                        'data-type/update',
                        'data-type/create',
                    ])
                ],
                // ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
            ];
            $items = array_merge($items, $adminItems);
        }
        ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => $items,
            ]
        ) ?>

    </section>
</aside>
