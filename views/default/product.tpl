{*сторінка продукта*}

<h3>{$rsProduct['name']}</h3>

<img width="575" src="/images/products/{$rsProduct['image']}">
Вартість: {$rsProduct['price']}

<a id="removeCart_{$rsProduct['id']}" {if ! $itemInCart}class="hideme"{/if} href="#" onclick="removeFromCart({$rsProduct['id']}); return false;" alt="Видалення з корзини">Видалення з корзини</a>
{* подія onclick  return false - щоб силка не відпрацьовувала, як силка*}
<a id="addCart_{$rsProduct['id']}"   {if $itemInCart}class="hideme"{/if} href="#" onclick="addToCart({$rsProduct['id']}); return false;" alt="Додати в корзину">Додати в корзину</a>
<p>Опис <br />{$rsProduct['description']}</p>