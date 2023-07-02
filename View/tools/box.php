<?php
function box(string $mainText,string $subText,string $bg,string $icon):string
{
    return <<<BOX
        <div class='col'>
            <div class='small-box $bg'>
                <div class='inner'>
                    <h3>$mainText</h3>

                    <p>$subText</p>
                </div>
                <div class='icon'>
                    <i class='fas $icon'></i>
                </div>
                <a href='#' class='small-box-footer'>More info <i class='fas fa-arrow-circle-right'></i></a>
            </div>
        </div>
    BOX;
}