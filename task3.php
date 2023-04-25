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