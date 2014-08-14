<?php

class CommentTest extends CDbTestCase
{
	/**
	 * We use both 'Post' and 'Comment' fixtures.
	 * @see CWebTestCase::fixtures
	 */
	public $fixtures=array(
		'users'=>'Users',
	);

	public function testFindRecentComments()
	{
		$user = Users::model()->findbyPk(101);
		$this->assertInstanceOf('Users',$user, 'user not found');
		$this->assertEquals($user->username,3);
	}
	public function add($x,$y){
		return $x+$y;
	}
}