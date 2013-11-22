<?php

class m130707_154857_modify_item_img_table extends CDbMigration
{
	public function up()
    {
//        $this->execute('ALTER TABLE item_img DROP PRIMARY KEY');
        $this->execute('ALTER TABLE  `item_img` ADD  `img_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST');
	}

	public function down()
	{
		echo "m130707_154857_modify_item_img_table does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
