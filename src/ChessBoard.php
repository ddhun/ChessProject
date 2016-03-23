<?php

namespace LogicNow;

class ChessBoard
{

    const MAX_BOARD_WIDTH = 7;
    const MAX_BOARD_HEIGHT = 7;

    private $_pieces;

    public function __construct()
    {
        $this->_pieces = array_fill(0, self::MAX_BOARD_WIDTH, array_fill(0, self::MAX_BOARD_HEIGHT, 0));
    }

    public function add(Pawn $pawn, $_xCoordinate, $_yCoordinate, PieceColorEnum $pieceColor)
    {
        $currentPiece = $this->_pieces[$_xCoordinate][$_yCoordinate];

        if ($currentPiece instanceof Pawn) {
            if ($currentPiece->getPieceColor() == $pieceColor) {
                $pawn->setXCoordinate(-1);
                $pawn->setYCoordinate(-1);
            }
        } else {
            $this->_pieces[$_xCoordinate][$_yCoordinate] = $pawn;
            $pawn->setXCoordinate($_xCoordinate);
            $pawn->setYCoordinate($_yCoordinate);
        }
    }

    /** @return: boolean */
    public function isLegalBoardPosition($_xCoordinate, $_yCoordinate)
    {
        if ($_xCoordinate < 0 || $_xCoordinate > self::MAX_BOARD_WIDTH-1) {
            return false;
        }

        if ($_yCoordinate < 0 || $_yCoordinate > self::MAX_BOARD_HEIGHT-1) {
            return false;
        }

        return true;
    }
}