
{*/ ліва колонка*}

<div id="leftColumn">

    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
            {foreach $rsCategories as $item}
                <a href="/category/{$item['id']}/">{$item['name']}</a><br />
                    {*/ Те саме якщо записати $row['children'] Спочатку послідовно виведе дітей першої записі потім планшетів*}
                {if isset($item['children'])}
                {foreach $item['children'] as $itemChild}
                    --<a href="/category/{$itemChild['id']}/">{$itemChild['name']}</a><br/>
                {/foreach}
                {/if}

            {/foreach}
    </div>

    <div class="menuCaption">Корзина</div>
    <a href="/cart/" title="Перейти в корзину">В корзину</a>
    <span id="cartCntItems">
        {if $cartCntItems > 0}{$cartCntItems}{else}порожньо{/if}
    </span>
</div>