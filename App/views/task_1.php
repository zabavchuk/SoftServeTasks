<h2><?=$title?></h2>
<table>
    <thead>
    <tr>
        <th>Author</th>
        <th>Title</th>
        <th>Description</th>
        <th>Language</th>
        <th>Pages</th>
        <th>Image</th>
    </tr>
    </thead>
    <tbody>
    <? if (count($data) > 0): ?>
        <? foreach ($data as $value): ?>
            <tr>
                <td data-label="Author"><?=$value['author']?></td>
                <td data-label="Title"><?=$value['title']?></td>
                <td data-label="Description"><?=substr($value['description'],0,90).'...';?></td>
                <td data-label="Language"><?=$value['lang']?></td>
                <td data-label="Pages"><?=$value['pages']?></td>
                <td data-label="Image"><img src="/upload/<?=$value['image']?>" alt="<?=$value['title']?>" style="width: 50%"></td>
            </tr>
        <?endforeach;?>
    <?endif;?>
    </tbody>
</table>