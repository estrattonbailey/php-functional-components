<?php
require 'lib/h0.php';

require 'elements/index.php';
require 'components/index.php';

use element\button as button;

echo button\primary([
  'class'=>'mt1 pt05',
  'onclick'=>'console.log(event)'
])(
  h('span')(['class'=>'italic'])('Click Me!')
);

exit;

$arr = [
  'Book Title One',
  'Book Title Two'
];

$table = function( $children ){
  return h('table')(['class'=>'wrapper__table'])(
    h('thead')(
      h('tr')( $children )
    )
  );
};

echo component\container\large([
  component\cta('This is text content', 'Click Me'),
  array_reduce($arr, function($return, $data){
    $return .= h('p')(['style'=>'block'])($data);
    return $return;
  }, ''),
  $table([
    h('td')('tabular content'),
    h('td')('tabular content'),
    h('td')('tabular content'),
    h('td')('tabular content'),
  ])
]);
