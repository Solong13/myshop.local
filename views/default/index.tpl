{* шаблон головної сторіки *}

{* цей foreach має назву  name=products*}
{foreach $rsProducts as $item name=products}
    <div style="float: left; padding: 0px 30px 40px 0px;">
        {* url даного товару *}
        <a href="/product/{$item['id']}/">
            {* вивід шлях картинки *}
            <img src="/images/products/{$item['image']}" width="100" />
        </a><br />
        {* назва картинки  *}
        <a href="/product/{$item['id']}/">{$item['name']}</a>
    </div>
        {* Ми звертаємося до foreach що вище за іменем  products і ітеруємо його щоб залишок від ділення був нуль, тобто за раз виводиться 3 елемента в рядку *}
    {if $smarty.foreach.products.iteration mod 3 == 0}
        {* очищуємо  float щоб після виводу 3 елементів далі не виводились наступні очищужмо поле і переносимо на наступний ряд*}
        <div style="clear: both;"></div>
    {/if}
{/foreach}
