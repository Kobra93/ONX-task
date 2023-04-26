class RankingTable {
    private $players = array();

    public function __construct($players) {
        $this->players = $players;
        $this->scores = array();
        foreach ($players as $player) {
            $this->scores[$player] = array('score' => 0, 'games' => 0);
        }
    }
    public function recordResult($player, $score) {
        if (!array_key_exists($player, $this->scores)) {
            throw new Exception('Unknown player');
        }
        $this->scores[$player]['score'] += $score;
        $this->scores[$player]['games']++;
    }
    public function playerRank($rank) {
        arsort($this->scores);
        $ranked = array();
        foreach ($this->scores as $player => $score) {
            $ranked[] = $player;
        }
        $ranked = array_unique($ranked);
        if ($rank > count($ranked) || $rank < 1) {
            throw new Exception('Invalid rank');
        }
        return $ranked[$rank - 1];
    }
}
$table = new RankingTable(array('Jan', 'Maks', 'Monika'));
$table->recordResult('Jan', 2);
$table->recordResult('Maks', 3);
$table->recordResult('Monika', 5);
echo $table->playerRank(1);