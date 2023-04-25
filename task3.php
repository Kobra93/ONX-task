class RankingTable {
    private $players = array();

    public function __construct($players) {
        $this->players = $players;
        $this->scores = array();
        foreach ($players as $player) {
            $this->scores[$player] = array('score' => 0, 'games' => 0);
        }
    }
