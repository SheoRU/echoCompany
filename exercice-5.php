<style>
      .container{
        display:flex;
        flex-direction: column;
        justify-content: space-between;
        height: 250px;
        font-size:60px;
    }
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
    
    public function render($a,$b,$c,$symbol);
    
}

class calculated implements expression_tree_node
{

    public function evaluate($expression){ 
        for($i = 0; $i <= count($expression); $i++){
            if ($expression["type"] == "add"){
                $summ += ($expression["children"][$i]["value"]);                    
            }
        }
        if ($expression["children"][1]["type"] == "fraction"){
            $summ += ($expression['children'][1]["top"]["value"] / $expression['children'][1]["bottom"]["value"]);
            echo "<span class=firstElem> = ".$summ."</span></div>";
            return;
        }
        echo "<span class=firstElem> = ".$summ."</span></div>";
        return;
    }

    public function render($a,$b,$c,$symbol)
    {
        echo "<div>";   
        //symbol==fraction||add

        if ($symbol == "fraction"){
            echo "<span class=firstElem> $a + </span> <div class='example'> <span>$b</span><span class=bottom>$c</span>
            </div></span>";
        }elseif ($symbol == "add"){
            echo "<span class=firstElem>$a + $b + $c</span>";
        }
    }
}

echo "<div class=container>";

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
$firstExample->render(350,350,300,"add");
$firstExample->evaluate($expression1);

$secondExample=new calculated;
$secondExample->render(5,50,2,"fraction");
$secondExample->evaluate($expression2);
?>