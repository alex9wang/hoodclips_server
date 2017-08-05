{include file='header.tpl' p="article"} 
<div id="wrapper">
{if $show_addthis_widget == '1'}
{include file='widget-addthis.tpl'}
{/if}
    <section>
        <div class="heading">
            <h1 class="single-page-title">
                {assign var = "splitArray" value = " "|explode:$page.title}
                {foreach from = splitArray item = key}

                {/foreach}
                {$page.titleFirstWord}
                <mark>{$page.titleSndWord}</mark>
            </h1>
        </div>
    </section>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12 extra-space">
		<div id="primary">
                    <p class="single-page-desc">{$page.content}</p>
		</div><!-- #primary -->
        </div><!-- #content -->
      </div><!-- .row-fluid -->
    </div><!-- .container-fluid -->
{include file='footer.tpl'}