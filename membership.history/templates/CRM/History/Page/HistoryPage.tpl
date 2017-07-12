






<table class="selector row-highlight">
<thead class="sticky">
<tr><th scope="col">S.no</th><th scope="col">Start Date</th><th scope="col">End Date</th></tr>
</thead><tbody>
{foreach from=$periods item=table}
  <tr class="{cycle values="odd-row,even-row"}">
  {foreach from=$table item=val}
    <td>{$val}</td>
  {/foreach}
  </tr>
{/foreach}
</tbody>
</table>
