<?php

use PHPUnit\Framework\TestCase;
include(dirname(__FILE__)."/../user_dao.php");

class DatabaseTest extends TestCase
{
	public function testAdd()
	{
		$user_operations = new UserOperations();		
		$this->assertEquals(2,$user_operations->add());
	}
	
	public function testUserAdd()
	{
		$_POST['first_name']="Car";
		$_POST['last_name']="Per";
		$_POST['city_name']="Ben";
		$user_operations = new UserOperations();
		$returnVal = $user_operations->add_user(true);

		$this->assertInternalType('array', $returnVal);		
		$this->assertContains("Car", $returnVal);
		$this->assertContains("Per", $returnVal);
		$this->assertContains("Ben", $returnVal);
	}
	
	public function testUserEdit()
	{
		$_POST['first_name']="Car";
		$_POST['last_name']="Per";
		$_POST['city_name']="Ben";
		$user_operations = new UserOperations();
		$returnVal = $user_operations->edit_user(true);

		$this->assertInternalType('array', $returnVal);		
		$this->assertContains("Car", $returnVal);
		$this->assertContains("Per", $returnVal);
		$this->assertContains("Ben", $returnVal);
	}
	
	public function testUserGet()
	{
		$_GET['edit_id']="21";
		$user_operations = new UserOperations();
		$returnVal = $user_operations->get_user(true);

		$this->assertInternalType('array', $returnVal);		
		$this->assertContains("21", $returnVal);
	}
	
	public function testUserDelete()
	{
		$_GET['delete_id']="21";
		$user_operations = new UserOperations();
		$returnVal = $user_operations->delete_user(true);

		$this->assertInternalType('array', $returnVal);		
		$this->assertContains("21", $returnVal);
	}
}
?>