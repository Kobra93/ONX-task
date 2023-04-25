class Pipeline {
  public static function make(...$functions) {
    return function($arg) use ($functions) {
      $result = $arg;
      foreach ($functions as $function) {
        $result = $function($result);
      }
      return $result;
    };
  }
}
