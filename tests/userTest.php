<?php
require "../src/php/functions.php";
use PHPUnit\Framework\TestCase;

class userTest extends TestCase {
    public function testNameByID() : void {
        $expectedUsername = "Mr. Admin";
        $this->assertEquals(
            findItem("../JSON/users.json", "id", 0),
            $expectedUsername
        );
    }

    public function testImagePathByID() : void {
        $expectedPath = "https:\/\/media0.giphy.com\/media\/U1rlk8zdcAwbm\/giphy.gif?cid=204c45bahh9wckux2q5sizwwfb8cnfwjbkfgrrkzxo0dwuf0&rid=giphy.gif";
        $this->assertEquals(
            getImagePath(2),
            $expectedPath
        );
    }
}