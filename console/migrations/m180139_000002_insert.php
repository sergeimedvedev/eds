<?php

use yii\db\Migration;

class m180139_000002_insert extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->_insertInitData();
        echo "Data inserted";
        return true;
    }

    private function _insertInitData()
    {
        $this->execute("
			INSERT INTO `data_types`
			VALUES
				( 1, 'Boolean', 'Логический тип данных, может принимать только два значения: \"ложь\" или \"истина\"' ),
				( 2, 'Integer', 'Целочисленный тип данных, служит для представления целых чисел' ),
				( 3, 'Real', 'Вещественный тип данных, используется для чисел с плавающей точкой' ),
				( 4, 'Date', 'Тип данных для хранения даты' ),
				( 5, 'Text', 'Строковый тип данных, предназначен для хранения текста' ),
				( 6, 'File', 'Файл' );
		");

        $this->execute("
			INSERT INTO `document`
			VALUES
				( 41, 1, 1, 4, '2018-01-01', '2018-01-02', 1, 4 );
		");

        $this->execute("
			INSERT INTO `document_type`
			VALUES
				( 1, 'Входящие', 'sign-in', 'Документы, поступивший в учреждение' ),
				( 2, 'Исходящие', 'sign-out', 'Документы, отправляемые из учреждения' ),
				( 3, 'Внутренние', 'retweet', 'Документы, не выходящие за пределы учреждения' );
		");

        $this->execute("
			INSERT INTO `widget`
			VALUES
				( 1, 'Стандартный документ', 'WStandart' );
		");

        $this->execute("
			INSERT INTO `document_form_params`
			VALUES
				( 1, 4, 4, 'Дата получения', 'Дата получения документа' ),
				( 2, 4, 2, 'Входящий регистрационный номер', '' ),
				( 3, 4, 4, 'Дата документа', 'Дата создания документа (может отличаться от даты получения)' ),
				( 4, 4, 2, 'Регистрационный номер отправителя', '' ),
				( 5, 4, 5, 'Автор', '' ),
				( 6, 4, 5, 'Заголовок', '' ),
				( 7, 4, 5, 'Резолюция', '' ),
				( 10, 4, 6, 'Документ', '' );
		");

        $this->execute("
			INSERT INTO `document_param`
			VALUES
				( 83, 4, 41, 1, '2018-01-01' ),
				( 84, 4, 41, 2, '12' ),
				( 85, 4, 41, 3, NULL ),
				( 86, 4, 41, 4, '445' ),
				( 87, 4, 41, 5, '' ),
				( 88, 4, 41, 6, 'Приказ на зачисление' ),
				( 89, 4, 41, 7, '' ),
				( 91, 4, 41, 10, '14' );
		");

        $this->execute("
			INSERT INTO `files`
			VALUES
				( 14, '/uploads/', '1_5a65343348009826475591', 'docx' );
		");

        $this->execute("
			INSERT INTO `workspace`
			VALUES
				( 1, 'Входящие', '', NULL, 'inbox' ),
				( 2, 'Исходящие', '', 1, 'upload' ),
				( 3, 'Внутренние', '', 1, 'anchor' );
		");

        $this->execute("
			INSERT INTO `auth_item`
			VALUES
				( '/*', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/admin/*', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/admin/assignment/*', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/assignment/assign', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/assignment/index', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/assignment/logout', 2, NULL, NULL, NULL, 1516379805, 1516379805 ),
				( '/admin/assignment/revoke', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/assignment/view', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/default/*', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/default/index', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/default/logout', 2, NULL, NULL, NULL, 1516379805, 1516379805 ),
				( '/admin/menu/*', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/menu/create', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/menu/delete', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/menu/index', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/menu/logout', 2, NULL, NULL, NULL, 1516379805, 1516379805 ),
				( '/admin/menu/update', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/menu/view', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/permission/*', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/permission/assign', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/permission/create', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/permission/delete', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/permission/index', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/permission/logout', 2, NULL, NULL, NULL, 1516379805, 1516379805 ),
				( '/admin/permission/remove', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/permission/update', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/permission/view', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/role/*', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/role/assign', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/role/create', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/role/delete', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/role/index', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/role/logout', 2, NULL, NULL, NULL, 1516379805, 1516379805 ),
				( '/admin/role/remove', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/role/update', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/role/view', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/admin/route/*', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/route/assign', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/route/create', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/route/index', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/route/logout', 2, NULL, NULL, NULL, 1516379805, 1516379805 ),
				( '/admin/route/refresh', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/route/remove', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/rule/*', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/rule/create', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/rule/delete', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/rule/index', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/rule/logout', 2, NULL, NULL, NULL, 1516379805, 1516379805 ),
				( '/admin/rule/update', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/rule/view', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/user/*', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/admin/user/activate', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/admin/user/change-password', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/user/delete', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/user/index', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/user/login', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/user/logout', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/user/reset-password', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/user/signup', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/admin/user/view', 2, NULL, NULL, NULL, 1513764718, 1513764718 ),
				( '/data-type/*', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/data-type/create', 2, NULL, NULL, NULL, 1516379805, 1516379805 ),
				( '/data-type/delete', 2, NULL, NULL, NULL, 1516379805, 1516379805 ),
				( '/data-type/index', 2, NULL, NULL, NULL, 1516379805, 1516379805 ),
				( '/data-type/logout', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/data-type/update', 2, NULL, NULL, NULL, 1516379805, 1516379805 ),
				( '/data-type/view', 2, NULL, NULL, NULL, 1516379805, 1516379805 ),
				( '/debug/*', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/debug/default/*', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/debug/default/db-explain', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/debug/default/download-mail', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/debug/default/index', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/debug/default/toolbar', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/debug/default/view', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/debug/user/*', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/debug/user/reset-identity', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/debug/user/set-identity', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/document-form-params/*', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-form-params/create', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-form-params/delete', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-form-params/index', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-form-params/logout', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-form-params/update', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-form-params/view', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-form/*', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-form/create', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-form/delete', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-form/get-form-by-type', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-form/index', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-form/logout', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-form/update', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-form/view', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document-param/*', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document-param/create', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document-param/delete', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document-param/get-params-by-form', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document-param/index', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document-param/logout', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document-param/update', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document-param/view', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document-type/*', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document-type/create', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document-type/delete', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document-type/index', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document-type/logout', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document-type/update', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document-type/view', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/document/*', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document/create', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document/delete', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document/index', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document/logout', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document/update', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/document/view', 2, NULL, NULL, NULL, 1516379806, 1516379806 ),
				( '/files/*', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/files/create', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/files/delete', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/files/index', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/files/logout', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/files/update', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/files/view', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/gii/*', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/gii/default/*', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/gii/default/action', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/gii/default/diff', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/gii/default/index', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/gii/default/preview', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/gii/default/view', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/profile/*', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/profile/create', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/profile/delete', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/profile/index', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/profile/logout', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/profile/update', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/profile/view', 2, NULL, NULL, NULL, 1516379807, 1516379807 ),
				( '/rbac/*', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/site/*', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/site/error', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/site/index', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/site/login', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/site/logout', 2, NULL, NULL, NULL, 1513764719, 1513764719 ),
				( '/user/*', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/user/admin/*', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/admin/assignments', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/admin/block', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/admin/confirm', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/admin/create', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/admin/delete', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/admin/index', 2, NULL, NULL, NULL, 1513764715, 1513764715 ),
				( '/user/admin/info', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/admin/resend-password', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/admin/switch', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/admin/update', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/admin/update-profile', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/profile/*', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/profile/index', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/profile/show', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/recovery/*', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/recovery/request', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/recovery/reset', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/registration/*', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/registration/confirm', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/registration/connect', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/registration/register', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/registration/resend', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/security/*', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/security/auth', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/security/login', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/security/logout', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/settings/*', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/user/settings/account', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/settings/confirm', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/settings/delete', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/user/settings/disconnect', 2, NULL, NULL, NULL, 1513764717, 1513764717 ),
				( '/user/settings/networks', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/user/settings/profile', 2, NULL, NULL, NULL, 1513764716, 1513764716 ),
				( '/widget/*', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/widget/create', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/widget/delete', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/widget/index', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/widget/logout', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/widget/update', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/widget/view', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/workspace/*', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/workspace/add-new', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/workspace/create', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/workspace/delete', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/workspace/index', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/workspace/logout', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/workspace/public', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/workspace/update', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( '/workspace/view', 2, NULL, NULL, NULL, 1516379808, 1516379808 ),
				( 'Administrator', 1, 'Роль с абсолютным доступом', NULL, NULL, 1513764608, 1516530196 ),
				( 'edit_all_profiles', 2, 'Редактирование всех профилей', NULL, NULL, 1516529813, 1516529813 ),
				( 'User', 1, 'Обычный пользователь', NULL, NULL, 1516229607, 1516229607 ),
				( 'view_all_documentation', 2, 'Чтение всей документации', NULL, NULL, 1516528017, 1516529079 ),
				( 'view_all_in_documentation', 2, 'Просмотр всей входящей документации', NULL, NULL, 1516528897, 1516528897 ),
				( 'view_all_inner_documentation', 2, 'Чтение всей внутренней документации', NULL, NULL, 1516529021, 1516529021 ),
				( 'view_all_out_documentation', 2, 'Чтение всей исходящей документации', NULL, NULL, 1516528951, 1516528951 ),
				( 'view_all_profiles', 2, 'Просмотр всех профилей', NULL, NULL, 1516529831, 1516529831 );
		");

        $this->execute("
			INSERT INTO `auth_assignment`
			VALUES
				( 'Administrator', '1', 1513764735 ),
				( 'User', '4', 1516233665 ),
				( 'view_all_documentation', '1', 1516528194 ),
				( 'view_all_inner_documentation', '4', 1516529310 );
		");

        $this->execute("
			INSERT INTO `auth_item_child`
			VALUES
				( 'Administrator', '/*' ),
				( 'Administrator', '/admin/*' ),
				( 'Administrator', '/admin/assignment/*' ),
				( 'Administrator', '/admin/assignment/assign' ),
				( 'Administrator', '/admin/assignment/index' ),
				( 'Administrator', '/admin/assignment/logout' ),
				( 'Administrator', '/admin/assignment/revoke' ),
				( 'Administrator', '/admin/assignment/view' ),
				( 'Administrator', '/admin/default/*' ),
				( 'Administrator', '/admin/default/index' ),
				( 'Administrator', '/admin/default/logout' ),
				( 'Administrator', '/admin/menu/*' ),
				( 'Administrator', '/admin/menu/create' ),
				( 'Administrator', '/admin/menu/delete' ),
				( 'Administrator', '/admin/menu/index' ),
				( 'Administrator', '/admin/menu/logout' ),
				( 'Administrator', '/admin/menu/update' ),
				( 'Administrator', '/admin/menu/view' ),
				( 'Administrator', '/admin/permission/*' ),
				( 'Administrator', '/admin/permission/assign' ),
				( 'Administrator', '/admin/permission/create' ),
				( 'Administrator', '/admin/permission/delete' ),
				( 'Administrator', '/admin/permission/index' ),
				( 'Administrator', '/admin/permission/logout' ),
				( 'Administrator', '/admin/permission/remove' ),
				( 'Administrator', '/admin/permission/update' ),
				( 'Administrator', '/admin/permission/view' ),
				( 'Administrator', '/admin/role/*' ),
				( 'Administrator', '/admin/role/assign' ),
				( 'Administrator', '/admin/role/create' ),
				( 'Administrator', '/admin/role/delete' ),
				( 'Administrator', '/admin/role/index' ),
				( 'Administrator', '/admin/role/logout' ),
				( 'Administrator', '/admin/role/remove' ),
				( 'Administrator', '/admin/role/update' ),
				( 'Administrator', '/admin/role/view' ),
				( 'Administrator', '/admin/route/*' ),
				( 'Administrator', '/admin/route/assign' ),
				( 'Administrator', '/admin/route/create' ),
				( 'Administrator', '/admin/route/index' ),
				( 'Administrator', '/admin/route/logout' ),
				( 'Administrator', '/admin/route/refresh' ),
				( 'Administrator', '/admin/route/remove' ),
				( 'Administrator', '/admin/rule/*' ),
				( 'Administrator', '/admin/rule/create' ),
				( 'Administrator', '/admin/rule/delete' ),
				( 'Administrator', '/admin/rule/index' ),
				( 'Administrator', '/admin/rule/logout' ),
				( 'Administrator', '/admin/rule/update' ),
				( 'Administrator', '/admin/rule/view' ),
				( 'Administrator', '/admin/user/*' ),
				( 'Administrator', '/admin/user/activate' ),
				( 'Administrator', '/admin/user/change-password' ),
				( 'Administrator', '/admin/user/delete' ),
				( 'Administrator', '/admin/user/index' ),
				( 'Administrator', '/admin/user/login' ),
				( 'Administrator', '/admin/user/logout' ),
				( 'Administrator', '/admin/user/request-password-reset' ),
				( 'Administrator', '/admin/user/reset-password' ),
				( 'Administrator', '/admin/user/signup' ),
				( 'Administrator', '/admin/user/view' ),
				( 'Administrator', '/data-type/*' ),
				( 'Administrator', '/data-type/create' ),
				( 'Administrator', '/data-type/delete' ),
				( 'Administrator', '/data-type/index' ),
				( 'Administrator', '/data-type/logout' ),
				( 'Administrator', '/data-type/update' ),
				( 'Administrator', '/data-type/view' ),
				( 'Administrator', '/debug/*' ),
				( 'Administrator', '/debug/default/*' ),
				( 'Administrator', '/debug/default/db-explain' ),
				( 'Administrator', '/debug/default/download-mail' ),
				( 'Administrator', '/debug/default/index' ),
				( 'Administrator', '/debug/default/toolbar' ),
				( 'Administrator', '/debug/default/view' ),
				( 'Administrator', '/debug/user/*' ),
				( 'Administrator', '/debug/user/reset-identity' ),
				( 'Administrator', '/debug/user/set-identity' ),
				( 'Administrator', '/document-form-params/*' ),
				( 'Administrator', '/document-form-params/create' ),
				( 'Administrator', '/document-form-params/delete' ),
				( 'Administrator', '/document-form-params/index' ),
				( 'Administrator', '/document-form-params/logout' ),
				( 'Administrator', '/document-form-params/update' ),
				( 'Administrator', '/document-form-params/view' ),
				( 'Administrator', '/document-form/*' ),
				( 'Administrator', '/document-form/create' ),
				( 'Administrator', '/document-form/delete' ),
				( 'Administrator', '/document-form/get-form-by-type' ),
				( 'Administrator', '/document-form/index' ),
				( 'Administrator', '/document-form/logout' ),
				( 'Administrator', '/document-form/update' ),
				( 'Administrator', '/document-form/view' ),
				( 'Administrator', '/document-param/*' ),
				( 'Administrator', '/document-param/create' ),
				( 'Administrator', '/document-param/delete' ),
				( 'Administrator', '/document-param/get-params-by-form' ),
				( 'Administrator', '/document-param/index' ),
				( 'Administrator', '/document-param/logout' ),
				( 'Administrator', '/document-param/update' ),
				( 'Administrator', '/document-param/view' ),
				( 'Administrator', '/document-type/*' ),
				( 'Administrator', '/document-type/create' ),
				( 'Administrator', '/document-type/delete' ),
				( 'Administrator', '/document-type/index' ),
				( 'Administrator', '/document-type/logout' ),
				( 'Administrator', '/document-type/update' ),
				( 'Administrator', '/document-type/view' ),
				( 'Administrator', '/document/*' ),
				( 'Administrator', '/document/create' ),
				( 'Administrator', '/document/delete' ),
				( 'Administrator', '/document/index' ),
				( 'Administrator', '/document/logout' ),
				( 'Administrator', '/document/update' ),
				( 'Administrator', '/document/view' ),
				( 'Administrator', '/files/*' ),
				( 'Administrator', '/files/create' ),
				( 'Administrator', '/files/delete' ),
				( 'Administrator', '/files/index' ),
				( 'Administrator', '/files/logout' ),
				( 'Administrator', '/files/update' ),
				( 'Administrator', '/files/view' ),
				( 'Administrator', '/gii/*' ),
				( 'Administrator', '/gii/default/*' ),
				( 'Administrator', '/gii/default/action' ),
				( 'Administrator', '/gii/default/diff' ),
				( 'Administrator', '/gii/default/index' ),
				( 'Administrator', '/gii/default/preview' ),
				( 'Administrator', '/gii/default/view' ),
				( 'Administrator', '/profile/*' ),
				( 'Administrator', '/profile/create' ),
				( 'Administrator', '/profile/delete' ),
				( 'Administrator', '/profile/index' ),
				( 'Administrator', '/profile/logout' ),
				( 'Administrator', '/profile/update' ),
				( 'Administrator', '/profile/view' ),
				( 'Administrator', '/rbac/*' ),
				( 'Administrator', '/site/*' ),
				( 'Administrator', '/site/error' ),
				( 'Administrator', '/site/index' ),
				( 'Administrator', '/site/login' ),
				( 'Administrator', '/site/logout' ),
				( 'Administrator', '/user/*' ),
				( 'Administrator', '/user/admin/*' ),
				( 'Administrator', '/user/admin/assignments' ),
				( 'Administrator', '/user/admin/block' ),
				( 'Administrator', '/user/admin/confirm' ),
				( 'Administrator', '/user/admin/create' ),
				( 'Administrator', '/user/admin/delete' ),
				( 'Administrator', '/user/admin/index' ),
				( 'Administrator', '/user/admin/info' ),
				( 'Administrator', '/user/admin/resend-password' ),
				( 'Administrator', '/user/admin/switch' ),
				( 'Administrator', '/user/admin/update' ),
				( 'Administrator', '/user/admin/update-profile' ),
				( 'Administrator', '/user/profile/*' ),
				( 'Administrator', '/user/profile/index' ),
				( 'Administrator', '/user/profile/show' ),
				( 'Administrator', '/user/recovery/*' ),
				( 'Administrator', '/user/recovery/request' ),
				( 'Administrator', '/user/recovery/reset' ),
				( 'Administrator', '/user/registration/*' ),
				( 'Administrator', '/user/registration/confirm' ),
				( 'Administrator', '/user/registration/connect' ),
				( 'Administrator', '/user/registration/register' ),
				( 'Administrator', '/user/registration/resend' ),
				( 'Administrator', '/user/security/*' ),
				( 'Administrator', '/user/security/auth' ),
				( 'Administrator', '/user/security/login' ),
				( 'Administrator', '/user/security/logout' ),
				( 'Administrator', '/user/settings/*' ),
				( 'Administrator', '/user/settings/account' ),
				( 'Administrator', '/user/settings/confirm' ),
				( 'Administrator', '/user/settings/delete' ),
				( 'Administrator', '/user/settings/disconnect' ),
				( 'Administrator', '/user/settings/networks' ),
				( 'Administrator', '/user/settings/profile' ),
				( 'Administrator', '/widget/*' ),
				( 'Administrator', '/widget/create' ),
				( 'Administrator', '/widget/delete' ),
				( 'Administrator', '/widget/index' ),
				( 'Administrator', '/widget/logout' ),
				( 'Administrator', '/widget/update' ),
				( 'Administrator', '/widget/view' ),
				( 'Administrator', '/workspace/*' ),
				( 'Administrator', '/workspace/add-new' ),
				( 'Administrator', '/workspace/create' ),
				( 'Administrator', '/workspace/delete' ),
				( 'Administrator', '/workspace/index' ),
				( 'Administrator', '/workspace/logout' ),
				( 'Administrator', '/workspace/public' ),
				( 'Administrator', '/workspace/update' ),
				( 'Administrator', '/workspace/view' ),
				( 'Administrator', 'edit_all_profiles' ),
				( 'User', 'edit_all_profiles' ),
				( 'User', 'view_all_documentation' ),
				( 'User', 'view_all_in_documentation' ),
				( 'view_all_documentation', 'view_all_in_documentation' ),
				( 'User', 'view_all_inner_documentation' ),
				( 'view_all_documentation', 'view_all_inner_documentation' ),
				( 'User', 'view_all_out_documentation' ),
				( 'view_all_documentation', 'view_all_out_documentation' ),
				( 'User', 'view_all_profiles' );
		");

        $this->execute("
			INSERT INTO `document_form`
			VALUES
				( 4, 1, 1, 'Простой входящий документ', 'Включает стандартный набор параметров для входящего документа' ),
				( 5, 2, 1, 'Простой исходящий документ', 'Включает стандартный набор параметров для исходящего документа' ),
				( 6, 3, 1, 'Простой внутренний документ', 'Включает стандартный набор параметров для внутреннего документа' );
		");

        $this->execute("
			INSERT INTO `reports`
			VALUES
				( 1, 'Отчет об объеме документооборота за 2018 год (без разбивки по месяцам)', 'SELECT (SELECT count(*) FROM `document` WHERE reg_date between \'2018-01-01\' AND \'2018-12-31\' AND document_type = 1) as \'Входящие: \',\r\n(SELECT count(*) FROM `document` WHERE reg_date between \'2018-01-01\' AND \'2018-12-31\' AND document_type = 2) as \'Исходящие: \',\r\n(SELECT count(*) FROM `document` WHERE reg_date between \'2018-01-01\' AND \'2018-12-31\' AND document_type = 3) as \'Внутреннние: \',\r\n(SELECT count(*) FROM `document` WHERE reg_date between \'2018-01-01\' AND \'2018-12-31\') as \'Всего: \'' );
		");
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->_deleteInitData();
        echo "Data cleared";
        return true;
    }

    private function _deleteInitData()
    {
        $this->execute("
			DELETE FROM `profile`;
			DELETE FROM `user`;
		");
    }
}
