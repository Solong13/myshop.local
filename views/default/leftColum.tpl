
{*/ ліва колонка*}

<div id="leftColumn">

    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
            {foreach $rsCategories as $item}
                <a href="#">{$item['name']}</a><br />
                    {*/ Те саме якщо записати $row['children'] Спочатку послідовно виведе дітей першої записі потім планшетів*}
                {if isset($item['children'])}
                {foreach $item['children'] as $itemChild}
                    --<a href="#"> {$itemChild['name']} </a><br/>
                {/foreach}
                {/if}

            {/foreach}
    </div>

</div>