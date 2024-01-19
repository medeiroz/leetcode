<?php

require_once '../../helpers.php';

$input = [
    [100,   -42,    -46,    -41],
    [31,    97,     10,     -10],
    [-58,   -51,    82,     89],
    [51,    81,     69,     -51],
];

$solution = new Solution;

echo benchmark(fn () => $solution->minFallingPathSum($input));

class Solution {
    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    function minFallingPathSum(array $matrix): int
    {
        $n = count($matrix);
        for ($i = $n - 2; $i >= 0; $i--) {
            for ($j = 0; $j < $n; $j++) {
                // O valor mínimo entre os três vizinhos inferiores
                $minBelow = $matrix[$i + 1][$j];
                if ($j > 0) {
                    $minBelow = min($minBelow, $matrix[$i + 1][$j - 1]);
                }
                if ($j < $n - 1) {
                    $minBelow = min($minBelow, $matrix[$i + 1][$j + 1]);
                }
                $matrix[$i][$j] += $minBelow;
            }
        }
        // O valor mínimo na primeira linha é a soma mínima do caminho de queda
        return min($matrix[0]);
    }
}