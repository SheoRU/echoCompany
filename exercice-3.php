<style>
    .container{
        display:flex;
        flex-direction: column;
        justify-content: space-between;
        height:100px;
</style>
<?php

function evaluate($expression){
    // TODO : add rendering code here
	for($i = 0; $i <= count($expression); $i++){
		if ($expression["type"] == "add"){
			
		    $summ += ($expression["children"][$i]["value"]);
			
            if ($expression["children"][1]["type"] == "multiply"){

                    $summ += ($expression['children'][1]["children"][0]["value"] * ($expression['children'][1]["children"][1]["children"][0]["value"] + $expression['children'][1]["children"][1]["children"][1]["value"]));
                    return $summ;

            } elseif ($expression["children"][1]["type"] == "fraction") {

                $summ += ($expression['children'][1]["top"]["value"] / $expression['children'][1]["bottom"]["value"]);
                return $summ;
            }
		}
    }
    return $summ;
}

// 100 + 200 + 300
$expression1 = [
    "type" => "add",
    'children'=> [
        [
            "type" => "number",
            "value"=>100
        ],
        [
            "type" => "number",
            "value"=> 200
        ],
        [
            "type" => "number",
            "value"=> 300
        ]
    ]
];

// 100 + 2 * (50 +5)
$expression2 = [
       "type" => "add",
        'children'=> [
                [
                        "type" => "number",
                        "value"=>100
                ],
                [
                        "type" => "multiply",
                        "children" =>[
                                [
                                        "type" => "number",
                                        "value"=>2
                                ],
                                [
                                        "type" => "add",
                                        "children" =>[
                                            [
                                                "type" => "number",
                                                "value"=>5
                                            ],
                                            [
                                                "type" => "number",
                                                "value"=>45
                                            ]
                        ]
                                ]
                        ]
                ]
        ]
];



// 1 + 100 / 1000
$expression3 = [
    "type" => "add",
    'children'=> [
        [
            "type" => "number",
            "value"=>1
        ],
        [
            "type" => "fraction",
            "top"=>
                [
                    "type" => "number",
                    "value"=>100
                ],
            "bottom"=>
                [
                    "type" => "number",
                    "value"=>1000
                ]
        ]
    ]
];

echo "<div class=container>";
echo "<div> Expression 1 evaluates to: " . evaluate($expression1)."</div>";
echo "<div> Expression 2 evaluates to: " . evaluate($expression2)."</div>";
echo "<div> Expression 3 evaluates to: " . evaluate($expression3)."</div>";
echo "</div>";
?>
