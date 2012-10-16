<?php

/**
 * Description of MazeTest
 *
 * @author cris
 */
class MazeTest extends PHPUnit_Framework_TestCase
{
    public function testMaze()
    {
        $game = new GOF\Creationals\Maze\MazeGame();
        $maze = $game->createMaze();
        $this->assertTrue($maze instanceof GOF\Creationals\Maze\Maze);
    }
}

?>
