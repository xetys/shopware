{extends file='parent:frontend/checkout/confirm_footer.tpl'}

{block name='frontend_checkout_cart_footer_tax_information'}
	<div class="tablefoot_inner-left"></div>
	<div class="tablefoot_inner">

    {if !$sUserData.additional.charge_vat && {config name=nettonotice}}
        <div class="grid_15 notice">{se name='CheckoutFinishTaxInformation'}{/se}</div>
    {/if}
{/block}

{block name='frontend_checkout_cart_footer_tax_rates'}
        {if $sUserData.additional.charge_vat}
            {foreach $sBasket.sTaxRates as $rate=>$value}
            <div>
                <p class="textright">
                    <strong>{$value|currency}</strong>
                </p>
            </div>
            {/foreach}
        {/if}
	</div>
{/block}