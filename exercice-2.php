<style>
    .example{
        vertical-align: middle;
        text-align:center;
        display: inline-block;
        padding-left: 15px;
        font-size:60px;
    }
    .example span{
        display: block;
    }
    .bottom{
        border-top: solid black 3px;
    }
    .firstElem{
        vertical-align: middle;
        font-size:60px;
    }
</style>

<?php

function render($a, $b, $c){
    echo "<span class=firstElem> $a + </span> <div class='example'> <span>$b</span><span class=bottom>$c</span>
    </div></span><br>";
}

render(1,100,10000);

render(10000,100,1);
