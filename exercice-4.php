<style>
    .container{
        display:flex;
        flex-direction: column;
        justify-content: space-between;
        height: 300px;
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
</style>
<?php
echo "<div class=container>";
function evaluate($expression){
    // TODO : add rendering code here
	for($i = 0; $i <= count($expression); $i++){
		if ($expression["type"] == "add"){
			
		    $summ += ($expression["children"][$i]["value"]);

            if ($expression["children"][1]["type"] == "fraction"){

                $summ += ($expression['children'][1]["top"]["value"] / $expression['children'][1]["bottom"]["value"]);
                $secondExample=$expression["children"]["0"]["value"]." + "."<div class='example'> <span>".($expression["children"]["1"]["top"]["value"]."</span>"."<span class=bottom>".$expression["children"]["1"]["bottom"]["value"]."</span></div>");
                echo "<div>".$secondExample;
                return $summ;

            }
                
		}
    }
    $firstExample=$expression["children"][0]["value"]." + ".$expression["children"][1]["value"]." + ".$expression["children"][2]["value"];
    echo "<div>".$firstExample;
    return $summ;
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

// 1 + 100 / 1000
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
echo $firstExample." = " . evaluate($expression1)."</div>";
echo $secondExample." = ". evaluate($expression2)."</div>";
echo "</div>";
?>

