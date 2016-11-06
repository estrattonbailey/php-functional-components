<?php

function attrs($props){
  $output = '';

  foreach($props as $attr => $val){
    $output .= $output."$attr='$val' ";
  }

  return $output;
}

function isArray($arg){
  return 'array' === gettype($arg);
}

function isProps( $arr ){
  $firstVal = array_values($arr)[0];

  return isArray($arr) 
    && 'string' === gettype($firstVal)
    && !preg_match("/<\/|\/>/", $firstVal);
}

function createElement( $tag, $props = false ){
  return function( $args = '' ) use( $tag, $props ){
    if (isArray($args) && isProps($args)){
      $newArgs = array_merge($props, $args);

      return createElement($tag, $newArgs);
    } else {
      $attrs = $props ? attrs($props) : '';
      $children = '';

      if (isArray($args)){
        foreach($args as $index => $child){
          $children .= $child;
        } 
      } else {
        $children = $args;
      }

      return "<{$tag} {$attrs}>{$children}</${tag}>";
    }
  };
}

function h( $tag ){
  return function( $args ) use ( $tag ) {
    if (isArray($args) && isProps($args)) {
      return createElement( $tag, $args );
    } else {
      return createElement( $tag )( $args );
    }
  };
}

$h1 = h('h1');
$p = h('p');

$hero_content = h('div')([
  'style' => "
    position: absolute;
    width: 40%;
    height: 200px;
    top: 0; left: 0; right: 0; bottom: 0;
    margin: auto;
  "
])([
  $h1('This is a hero'),
  $p('This is paragraph text')
]);

$hero = h('section')([
  'style' => '
    height: 100vh;
    background: whitesmoke;
  '
])($hero_content);

echo $hero;
