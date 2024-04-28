<?php
    function main(string $board): string {
        if (strlen($board) != 9) {
            throw new InvalidArgumentException("Invalid board.");
        }

        $validEntry = ["O", "X", "-"];
        for ($char = 0; $char < 9; $char++){
            if (!in_array($board[$char], $validEntry)) {
                throw new InvalidArgumentException("Invalid board entries.");
            }
        }

        $oWins = checkWin($board, "O");
        $xWins = checkWin($board, "X");

        if ($oWins && $xWins) {
            throw new InvalidArgumentException("Invalid board state.");
        } else if ($oWins) {
            return "O wins.\n";
        } else if ($xWins) {
            return "X wins.\n";
        } else {
            return "No winner.\n";
        }
    }

    function checkWin(string $board, string $winEntry): bool {
        $winConfigs = [
            [0, 1, 2],
            [3, 4, 5],
            [6, 7, 8],
            [0, 3, 6],
            [1, 4, 7],
            [2, 5, 8],
            [0, 4, 8],
            [2, 4, 6]
        ];
        
        $win = false;
        foreach ($winConfigs as $winConfig) {
            $configWin = true;
            foreach ($winConfig as $entry) {
                if ($board[$entry] != $winEntry) {
                    $configWin = false;
                }
            }
            if ($configWin) {
                $win = true;
            }
        }
        return $win;
    }

    echo main($argv[1])
?>