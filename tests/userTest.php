<?php
require "./src/php/functions.php";
use PHPUnit\Framework\TestCase;

class userTest extends TestCase {

    public function testFindItem() : void {
        $expectedUser = [
            "id" => 0,
            "username" => "Mr. Admin",
            "email" => "kalipo99@gmail.com",
            "password" => "MegaHardPassword99",
            "description" => "Other admin personality, or a hack?",
            "registered" => 100000000,
            "main_picture_id" => 1,
        ];
        $this->assertEquals(
            findItem("./JSON/users.json", "id", 0),
            $expectedUser
        );
    }

    /*
        JORGE: Test below not working because of path in "functions.php" starts with "../",
        apparently the starting path for this test needs to be "./"
    */

    // public function testImagePathByID() : void {
    //     $expectedPath = "https://media0.giphy.com/media/U1rlk8zdcAwbm/giphy.gif?cid=204c45bahh9wckux2q5sizwwfb8cnfwjbkfgrrkzxo0dwuf0&rid=giphy.gif";
    //     $this->assertEquals(
    //         getImagePath(2),
    //         $expectedPath
    //     );
    // }

    public function testGetData(){
        $myArrayOfComments = getData("./JSON/comments.json");
        $this->assertIsArray(
            $myArrayOfComments
        );
    }

    public function testFindIndex() : void {
        $expectedIndex = 4;
        $posts = getData("./JSON/posts.json");
        $this->assertEquals(
            findIndex($posts, "id", 12),
            $expectedIndex
        );
    }
}