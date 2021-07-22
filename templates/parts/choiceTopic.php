<!-- Модальное окно для выбора темы обращения-->
<div id="choice-topic" class="modalwin">
    <div class="choice-area-window">
        <div class="modal-win-header">
            Выберете тему обращения
        </div>
        <div class="input-block">
            <select id="select-topic">
                <option selected="selected"  disabled>Выберите тему</option>
                <?php 
                //Будем добавлять option (все темы)
                    $data = makeRequest("SELECT name FROM topic");
                ?>
                <?php foreach($data as $name):?>
                    <option value="<?= $name["name"]?>"><?= $name["name"]?></option>
                <?php endforeach ?>
                
            </select>
           
        </div>
    </div>

</div>

<!-- TODO Надо переделать все под базу данных 
-->

