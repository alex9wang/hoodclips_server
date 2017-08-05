{include file='header.tpl' p="article"} 
<div id="wrapper" class="container primary-content">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    {if $show_addthis_widget == '1'}
    {include file='widget-addthis.tpl'}
    {/if}
    <div class="heading">
        <h1 class="single-page-title">
            {assign var = "splitArray" value = " "|explode:$page.title}
            {$page.titleFirstWord}
            <mark>{$page.titleSndWord}</mark>
        </h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 extra-space">
            <div id="primary">
                <p class="single-page-desc">{$page.content}</p>
            </div><!-- #primary -->
        </div><!-- #content -->
      </div><!-- .row-fluid -->
    </div><!-- .container-fluid -->
</div>
    </div>
</div>
{include file='footer.tpl'}