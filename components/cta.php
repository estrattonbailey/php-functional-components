<?php
namespace component;

function cta( $text, $cta ){
  return h('div')(['class'=>'cta'])([
    h('p')($text),
    \element\button\primary($cta)
  ]);
};
