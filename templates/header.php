<div class="header">
    <div class="logo">
        Your Logo
    </div>
    <?php 
        //количество обращений 
        $all = makeRequest("SELECT * FROM appeal");
        $count = count($all) + 1;
    ?>
    <div class="count-appeal">
        Подано:  <?= $count ?> 
    </div>
</div>