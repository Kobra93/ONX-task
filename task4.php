class Thesaurus
{
    private $synonyms = [];

    public function __construct(array $thesaurus)
    {
        foreach ($thesaurus as $word => $synonyms) {
            $this->addSynonyms($word, $synonyms);
        }
    }

    public function addSynonyms(string $word, array $synonyms)
    {
        $this->synonyms[$word] = $synonyms;
    }
}