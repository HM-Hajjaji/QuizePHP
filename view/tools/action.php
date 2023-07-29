<?php
function action(string $path,string $bg,string $icon,string $text =""):string
{
    return <<<ACTION
        <a href="$path" class="btn $bg"><i class="fas $icon"></i>$text</a>&nbsp;
    ACTION;
}

function delete(string $path):string
{
    return <<<DELETE
        <form class="d-inline" method="post" action="$path" onsubmit="return confirm('Are you sure you want to delete this item?')">
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
        </form>&nbsp;
    DELETE;
}

