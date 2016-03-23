<?php

namespace LogicNow;

class Pawn
{

    /** @var PieceColorEnum */
    private $pieceColorEnum;
    /** @var  ChessBoard */
    private $chessBoard;
    /** @var  int */
    private $xCoordinate;
    /** @var  int */
    private $yCoordinate;

    public function __construct(PieceColorEnum $pieceColorEnum)
    {
        $this->pieceColorEnum = $pieceColorEnum;
    }

    public function getChesssBoard()
    {
        return $this->chessBoard;
    }

    public function setChessBoard(ChessBoard $chessBoard)
    {
        $this->chessBoard = $chessBoard;
    }

    /** @return int */
    public function getXCoordinate()
    {
        return $this->xCoordinate;
    }

    /** @var int */
    public function setXCoordinate($value)
    {
        $this->xCoordinate = $value;
    }

    /** @return int */
    public function getYCoordinate()
    {
        return $this->yCoordinate;
    }

    /** @var int */
    public function setYCoordinate($value)
    {
        $this->yCoordinate = $value;
    }

    public function getPieceColor()
    {
        return $this->pieceColorEnum;
    }

    public function setPieceColor(PieceColorEnum $value)
    {
        $this->pieceColorEnum = $value;
    }

    public function move(MovementTypeEnum $movementTypeEnum, $newX, $newY)
    {
        if ($this->chessBoard->isLegalBoardPosition($newX, $newY)) {
            if ($newX === $this->xCoordinate
                && $movementTypeEnum == MovementTypeEnum::MOVE()) {
                $this->xCoordinate = $newX;
                $this->yCoordinate = $newY;
            }
        }
    }

    public function toString()
    {
        return $this->currentPositionAsString();
    }

    protected function currentPositionAsString()
    {
        $result = "Current X: " . $this->xCoordinate . PHP_EOL;
        $result .= "Current Y: " . $this->yCoordinate . PHP_EOL;
        $result .= "Piece Color: " . $this->pieceColorEnum;
        return $result;
    }
}
