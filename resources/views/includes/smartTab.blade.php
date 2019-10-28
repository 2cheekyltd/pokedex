<?php
const TAB_NAME  = 'smarttab_name';
const TAB_SEPE  = 'smarttab_seperator';
const TAB_ONLY  = 'smarttab_only';
const TAB_TITLE = 'Pokedex';

$pageOnly = array_key_exists(TAB_ONLY, View::getSections());
$pageName = array_key_exists(TAB_NAME, View::getSections());
$pageSepe = (array_key_exists(TAB_SEPE, View::getSections()))? View::getSections()[TAB_SEPE] : ' | ';

if ($pageOnly) {
    $tabTitle = View::getSections()[TAB_NAME];
} else {
    if ($pageName) {
        $tabTitle = TAB_TITLE . $pageSepe . View::getSections()[TAB_NAME];
    } else {
        $tabTitle = TAB_TITLE;
    }
}
?>
<title>{{ $tabTitle }}</title>
