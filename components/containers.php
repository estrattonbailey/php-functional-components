<?php
namespace component\container;

function large($child){
  return h('section')(['class'=>'container--l'])($child);
};

function med($child){
  return h('section')(['class'=>'container--m'])($child);
};
