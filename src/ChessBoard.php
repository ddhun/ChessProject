<?php

namespace LogicNow;

class ChessBoard
{

    const MAX_BOARD_WIDTH = 7;
    const MAX_BOARD_HEIGHT = 7;

    private $pieces;

    public function __construct()
    {
        $this->pieces = array_fill(0, self::MAX_BOARD_WIDTH, array_fill(0, self::MAX_BOARD_HEIGHT, 0));
    }

    public function add(Pawn $pawn, $xCoordinate, $yCoordinate, PieceColorEnum $pieceColor)
    {
        $currentPiece = $this->pieces[$xCoordinate][$yCoordinate];

        if ($currentPiece instanceof Pawn) {
            if ($currentPiece->getPieceColor() == $pieceColor) {
                $pawn->setXCoordinate(-1);
                $pawn->setYCoordinate(-1);
            }
        } else {
            $this->pieces[$xCoordinate][$yCoordinate] = $pawn;
            $pawn->setXCoordinate($xCoordinate);
            $pawn->setYCoordinate($yCoordinate);
        }
    }

    /** @return: boolean */
    public function isLegalBoardPosition($xCoordinate, $yCoordinate)
    {
        if ($xCoordinate < 0 || $xCoordinate >= self::MAX_BOARD_WIDTH) {
            return false;
        }

        if ($yCoordinate < 0 || $yCoordinate >= self::MAX_BOARD_HEIGHT) {
            return false;
        }

        return true;
    }
}
