class TextInput {
  protected $value = '';

  public function add($text) {
    $this->value .= $text;
  }
  public function getValue() {
    return $this->value;
  }
}
