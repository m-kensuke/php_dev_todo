<?php if(!isset($_GET['search_word'])) :?>
    <div class="d-flex flex-row">
        <div class="">
            <!--新規作成-->
            <form action="create_and_edit.php">
                <button class="btn btn-primary me-md-2" type="submit" style="padding: 10px;font-size: 30px;margin-bottom: 10px">New Todo</button>
            </form>
        </div>
        <!--検索機能-->
        <div class ="col align-self-center">
            <form method="post" action="class/branch.php">
                <input class="form-control-lg" type="text" placeholder="検索ワードを入力" name="search_word" style="font-size: 20px; margin-bottom: 15px">
                <input class="btn btn-primary" type="submit" name="search" style="font-size: 20px;margin-bottom: 7px" value="検索">
            </form>
        </div>
    </div>    
<?php endif;?>