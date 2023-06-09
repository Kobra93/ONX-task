class TextInput {
  protected $value = '';

  public function add($text) {
    $this->value .= $text;
  }
  public function getValue() {
    return $this->value;
  }
}
class NumericInput extends TextInput {
  public function add($text) {
    if (is_numeric($text)) {
      $this->value .= $text;
    }
  }
}
$input = new NumericInput();
$input->add('666');
$input->add('abc');
$input->add('777');
echo $input->getValue();