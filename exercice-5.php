<?php

interface expression_tree_node {

    public function evaluate();
    
    public function render();
    
}
class calculated implements expression_tree_node
{
    public function evaluate(){
        return "SUS";
    }
    public function render()
    {
        return "Aboba";
    }
}