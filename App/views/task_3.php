<h2>Import/export MySQL <-> XLSX</h2>
<form action="/App/task_3.php" enctype="multipart/form-data" method='post' >
    <fieldset >
        <legend>Import</legend>
        <div class='container'>

        Import in table book: <input id="import" name="import" type="file" class="btn btn-primary btn-ghost"/>

            <input class="btn btn-primary btn-ghost" type='submit' name='submit' value='import' />

        <div class="success"><?=isset($import_massage) ? $import_massage : ''?></div>
        </div>
    </fieldset>
</form>

<form action="/App/task_3.php" enctype="multipart/form-data" method='post'>
    <fieldset>
        <legend>Export</legend>
        <div class='container'>
            <div class="form-input-material">
                <label for="sql">
                    <input type="radio" id="sql" name="type" value="sql" class="form-control-material">
                    .sql
                </label>
            </div>
            <div class="form-input-material">
                <label for="xlsx">
                    <input type="radio" id="xlsx" name="type" value="Xlsx" class="form-control-material">
                    .xlsx
                </label>
            </div>
            <div class="form-input-material">
            <input class="btn btn-primary btn-ghost" type='submit' name='export' value='Export database'/>
            </div>
            <div class="success"><?= isset($export_massage) ? $export_massage : '' ?></div>
        </div>
    </fieldset>
</form>