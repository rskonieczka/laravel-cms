<?php namespace Artforwebs\Ankietkaapi\Api;

class AnkietkaException extends \UnexpectedValueException {}
class AnkietkaException400 extends AnkietkaException {}
class AnkietkaException401 extends AnkietkaException {}
class AnkietkaException404 extends AnkietkaException {}
class AnkietkaException406 extends AnkietkaException {}
class AnkietkaException409 extends AnkietkaException {}
class AnkietkaException500 extends AnkietkaException {}