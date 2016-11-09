<?php
namespace element\button;

function primary( $text ){
  return h('button')(['class'=>'button'])($text);
};
