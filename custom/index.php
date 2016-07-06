<?php
$title = $DB->readSingle('custom', 'title', 1);
$title = $title->title;

$content = $DB->readSingle('custom', 'content', 1);
$content = $content->content;

echo "<div style='margin: auto; text-align: center;'>";
echo $title;
echo $content;
?>

</div>
