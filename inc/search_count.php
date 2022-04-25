<?php if(isset($_GET['search_word'])) :?>
<div class="search_hit">
    <!--検索結果表示-->
    <p>検索ワード：<?php echo $search_word; ?><br /></p>
    <p>ヒット件数：<?php echo $totalCount; ?><br /><br /></p>
</div>
<?php endif;?>