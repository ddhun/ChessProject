<?php

namespace LogicNow;

class PieceColorEnum
{
    private static $instance = false;
    private static $white;
    private static $black;

    private $id;

    private function __construct($id)
    {
        $this->id = $id;
    }

    /** @return: PieceColorEnum */
    public static function WHITE()
    {
        self::initialise();

        return self::$white;
    }

    /** @return: PieceColorEnum */
    public static function BLACK()
    {
        self::initialise();

        return self::$black;
    }

    private static function initialise()
    {
        if (self::$instance) {
            return;
        }

        self::$white = new PieceColorEnum(1);
        self::$black = new PieceColorEnum(2);
    }
}
