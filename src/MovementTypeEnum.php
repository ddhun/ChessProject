<?php

namespace LogicNow;

class MovementTypeEnum
{
    private static $instance = false;
    private static $move;
    private static $capture;

    private $id;

    private function __construct($id)
    {
        $this->id = $id;
    }

    /** @return: MovementTypeEnum */
    public static function MOVE()
    {
        self::initialise();

        return self::$move;
    }

    /** @return: MovementTypeEnum */
    public static function CAPTURE()
    {
        self::initialise();

        return self::$capture;
    }

    private static function initialise()
    {
        if (self::$instance) {
            return;
        }

        self::$move = new MovementTypeEnum(1);
        self::$capture = new MovementTypeEnum(2);
    }
}
