<?php

use yii\db\Migration;

class m180139_000003_insert extends Migration
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
            INSERT INTO `user`
            VALUES
                (1,'admin','admin@mail.ru','\$2y\$13\$EWW8egGrjbc4rGB6OoHiK.qqr4wsfJU0mVkLjXcW4Fo482PE9Jgti','blOa7HKXIMtTAkifCnjotn3NdCg0ZkpU',1513762134,NULL,NULL,NULL,1513762134,1513762134,0,1517871007,10,NULL),
                (4,'test','test@mail.ru','\$2y\$13\$EWW8egGrjbc4rGB6OoHiK.qqr4wsfJU0mVkLjXcW4Fo482PE9Jgti','a7p5YmLyPLv112ocYwjFOVv3JHQeVnPA',1513762134,NULL,NULL,NULL,1513763893,1513763893,0,1516600355,10,NULL);");

        $this->execute("
			INSERT INTO `profile`
			VALUES
				( 1, 'Василий', 'Vasso@yandex.ru', 'Козырев', 'Иванович', 'Студент', '9515559966', '3 курс физико-математического факультета по  специальности «Прикладная математика и информатика»' ),
				( 4, 'Иван', 'i.ivanov@smolgu.ru', 'Иванов', 'Иванович', 'Аспирант', '', '' );
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
