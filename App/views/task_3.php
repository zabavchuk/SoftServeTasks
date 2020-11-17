<h2><?=$title?></h2>
<form action="/App/task_3.php" enctype="multipart/form-data" method='post'>
    <fieldset >
        <legend>Import</legend>
        <div class='container'>

        Import database: <input id="import" name="import" type="file" />

            <input type='submit' name='submit' value='import' />

        <div class="success"><?=$massage?></div>
        </div>
    </fieldset>
</form>

<form action="/App/task_3.php" enctype="multipart/form-data" method='post'>
    <fieldset >
        <legend>Export</legend>
        <div class='container'>
            <label for="sql">
                <input type="radio" id="sql" name="type" value="sql">
                .sql
            </label>

            <label for="xlsx">
                <input type="radio" id="xlsx" name="type" value="Xlsx">
                .xlsx
            </label>

            <input type='submit' name='export' value='Export database' />

            <div class="success"><?=$massage?></div>
        </div>
    </fieldset>
</form>