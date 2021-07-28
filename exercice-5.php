<style>
    .example{
        vertical-align: middle;
        text-align:center;
        display: inline-block;
        padding-left: 30px;
        font-size:60px;
    }
    .bottom{
        border-top: solid black 3px;
    }
    .example span{
        display: block;
    }
    .firstElem{
        vertical-align: middle;
        font-size:60px;
    }
</style>

<?php

interface expression_tree_node {

    public function evaluate($expression);
    
    public function render($a,$b,$c,$d);
    
}
class calculated implements expression_tree_node
{
    public function evaluate($expression){
        $sum="123";
        echo $sum;
    }
    public function render($a,$b,$c,$d)
    {
        if ($d == "fraction"){
            echo "<span class=firstElem> $a + </span> <div class='example'> <span>$b</span><span class=bottom>$c</span>=
            </div></span>";
        }else{
            echo "<span class=firstElem>$a + $b + $c</span>";
        }
    }
}

$expression1 = [
    "type" => "add",
    'children'=> [
        [
            "type" => "number",
            "value"=>350
        ],
        [
            "type" => "number",
            "value"=> 350
        ],
        [
            "type" => "number",
            "value"=> 300
        ]
    ]
];

$expression2 = [
    "type" => "add",
    'children'=> [
        [
            "type" => "number",
            "value"=>5
        ],
        [
            "type" => "fraction",
            "top"=>
                [
                    "type" => "number",
                    "value"=>50
                ],
            "bottom"=>
                [
                    "type" => "number",
                    "value"=>2
                ]
        ]
    ]
];

$firstExample=new calculated;
$firstExample->render(350,350,300,"fraction");